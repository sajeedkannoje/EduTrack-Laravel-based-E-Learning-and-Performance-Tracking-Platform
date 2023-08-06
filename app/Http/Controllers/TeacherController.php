<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Module;
use App\Models\Section;
use App\Models\User;
use App\Models\UserQuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    // This is for the manage scorecard home page...
    public function manageScoreCard()
    {
        // dd();
        // $students = User::role('student')->get();
        $teacherId = Auth::user()->id;
        $students = User::where('referred_by', '=', $teacherId)->get();
        // dd($students);
        return view('content.teachers.ScoreCard.index', [
            'students' => $students,
            'studentRecord' => $this->StudentScoreAndInfoWithReferral(),
        ]);
    }

    public function homepage()
    {
        $modules = Module::where('module_type', 'teacher')->orderBy('sequence', 'asc')->get();

        return view('content.teachers.homepage.home', [
            'modules' => $modules,
        ]);
    }

    public function openModule($id = 0)
    {

        // dd($id);
        if (! $id) {
            $module = Module::where('module_type', 'teacher')
                ->where('sequence', '2')
                ->first();
        } else {
            $module = Module::where('module_type', 'teacher')->where('id', $id)->first();
        }

        $modules = Module::where('module_type', 'teacher')->orderBy('sequence', 'asc')->get();

        $breadcrumbs = [
            ['link' => '/teacher-home', 'name' => 'Home'],
            ['name' => ucfirst($module->title)],
        ];
        $pageConfigs = [
            'changeMenu' => true,
            'courseMenu' => $modules,
            'currentModule' => $module,
            'currentSection' => false,
            'currentQuiz' => false,
        ];

        $menuData = $this->changeMenuForCourse($pageConfigs);

        return view('content.teachers.modules.single_module', [
            'module' => $module,
            'breadcrumbs' => $breadcrumbs,
            'menuData' => $menuData,
            'is_teacher' => true,
        ]);
    }

    public function StudentScoreAndInfo(Request $request)
    {
        $request->validate([
            'emails' => 'array',
            'emails.*' => 'email|required',
        ]);
        $notFoundedEmails = [];
        $studentInformation = [];
        foreach ($request->emails as $email) {

            $user = User::where('email', $email)->first();

            if (! $user) {
                $notFoundedEmails[] = $email;
                $studentInformation[] = [

                    'error' => true,
                    'status' => 'userNotFound',
                    'message' => 'No student found with this email/username',
                ];

                continue;
            }

            if (! $user->hasRole('student')) {

                $notFoundedEmails[] = $user->email;
                $studentInformation[] = [

                    'error' => true,
                    'status' => 'User is not a student',
                    'message' => 'User with this '.$user->email.' email is not a student.',
                ];

                continue;
            }

            $studentInfoArray = [
                'completedModule' => 0,
                'error' => false,
                'percentage' => 0,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,

            ];

            $score = 0;
            $total = 0;
            $modules = Module::where('module_type', 'student')->get();

            foreach ($modules as $module) {

                if ($module->moduleCompletedByStudent($user->id) && $module->finalExam() != false) {

                    $total += $module->finalExam()->questions->count();
                    $studentInfoArray['completedModule'] += 1;
                    $score += $module->finalExamResult($user->id);
                }
            }

            $studentInfoArray['percentage'] = Helper::roundScorePercentage($score, $total);

            $studentInformation[] = $studentInfoArray;
        }

        $html = view('content.teachers.ScoreCard.user-inormation-card', [
            'inforamation' => $studentInformation,
            'notFoundedEmails' => $notFoundedEmails,
        ])->render();

        return response([
            'status' => true,
            'html' => $html,
        ]);
    }

    private function StudentScoreAndInfoWithReferral()
    {

        $studentRecord = [];
        $studentId = User::where('referred_by', '=', Auth::ID())
            ->select('id')
            ->orderBy('created_at')
            ->paginate(10);

        foreach ($studentId as $student) {
            $studentScore = UserQuizAttempt::where('user_id', $student->id)
                ->join('user_quiz_answers', 'user_quiz_attempts.id', '=', 'user_quiz_answers.user_quiz_attempt_id')
                ->join('quiz_question_options', 'user_quiz_answers.quiz_question_option_id', '=', 'quiz_question_options.id')
                ->where('is_correct', '=', 1)
                ->count();
            $finalExamQuizCount = UserQuizAttempt::where('user_id', $student->id)
                ->join('user_quiz_answers', 'user_quiz_attempts.id', '=', 'user_quiz_answers.user_quiz_attempt_id')
                ->join('quiz_question_options', 'user_quiz_answers.quiz_question_option_id', '=', 'quiz_question_options.id')
                ->count();
            $complateModule = Section::where('is_section', 0)    // completed modules
                ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
                ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')
                ->where('user_id', '=', $student->id)->count();
            $complateModule += $this->studentIntroQuizCount($student->id);
            $questionCount = $finalExamQuizCount;
            $scoreCount = $studentScore;
            $studentPercentage = Helper::roundScorePercentage($scoreCount, $questionCount);
            $user = User::where('id', $student->id)->first(['name', 'first_name', 'last_name']);
            $studentInfoArray = [
                'completedModule' => $complateModule,
                'error' => false,
                'percentage' => round($studentPercentage).'%',
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
            ];
            $studentRecord[] = $studentInfoArray;
        }

        $studentInformation['paginate'] = $studentId;
        $studentInformation['record'] = $studentRecord;

        return $studentInformation;
    }

    protected function changeMenuForCourse($pageConfigs)
    {
        $verticalMenuData = (object) config('app_menu.student');
        $horizontalMenuData = (object) config('app_menu.student');
        // $myCourseNavbar = true;
        // dd($verticalMenuData->menu);
        $verticalMenuData->menu = [];
        $horizontalMenuData->menu = [];
        $iconClass = 'bg-site-yellow';

        $dashboardMenu = [
            'url' => '/teacher-home',
            'name' => 'Back To Dashboard',
            'iconClass' => $iconClass,
            'icon' => 'fi-br-arrow-left',
            'slug' => 'dashboard',
            'addDivider' => true,
            'textClass' => 'text-white fw-bolder',
            'my-couse-navbar' => true,
        ];

        $verticalMenuData->menu[] = $dashboardMenu;
        $horizontalMenuData->menu[] = $dashboardMenu;

        foreach ($pageConfigs['courseMenu'] as $module) {
            $submenu = [];

            $classModule = 'module-ele';

            if ($pageConfigs['currentModule']) {
                if ($pageConfigs['currentModule']->id == $module->id) {

                    $classModule = 'active open module-ele current-module-ele';
                }
            }

            $moduleIcon = 'fi fi-br-chart-set-theory';

            $moduleUrl = '/teacher-module'.'/'.$module->id;
            $moduleTextClass = 'text-white fw-bolder';

            $verticalMenuData->menu[] = [
                'url' => $moduleUrl,
                'name' => $module->title,
                'icon' => $moduleIcon,
                'iconClass' => $iconClass,
                'slug' => $module->id,
                'classlist' => $classModule,
                'submenu' => $submenu,
                'addDivider' => true,
                'textClass' => $moduleTextClass,
            ];
            $horizontalMenuData->menu[] = [
                'url' => $moduleUrl,
                'name' => $module->title,
                'icon' => $moduleIcon,
                'iconClass' => $iconClass,
                'slug' => $module->id,
                'classlist' => $classModule,
                'submenu' => $submenu,
                'addDivider' => true,
                'textClass' => $moduleTextClass,

            ];
            // dd($verticalMenuData->menu);
        }

        return [$verticalMenuData, $horizontalMenuData];
    }

    public function introductionModuleHightePoints($userId)
    {  // get single module final exam

        $sections = Section::where('module_id', '=', 1)->first();
        $userQuizAttempts = Section::where('is_section', 1)
            ->where('module_id', '=', 1)->first()->quiz
            ->attempts->where('user_id', $userId);
        if ($userQuizAttempts->count()) {
            foreach ($userQuizAttempts as $attempt) {
                $quizDetail[] = $sections->quiz->calculateUserScoreForQuiz($attempt);
            }

            return [
                'question' => $sections->quiz->questions->count(),
                'answer' => max($quizDetail),
            ];
        }

        return [
            'question' => 0,
            'answer' => 0,
        ];
    }

    public static function studentIntroQuizCount($id)
    {
        $count = Module::where('modules.sequence', '=', '1')->where('has_final_exam', '=', 0)->where('module_type', '=', 'student')
            ->join('sections', 'modules.id', '=', 'sections.module_id')
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')->where('user_id', '=', $id)
            ->count();
        if ($count > 0) {
            return $count = 1;
        }

        return $count = 0;
    }
}
