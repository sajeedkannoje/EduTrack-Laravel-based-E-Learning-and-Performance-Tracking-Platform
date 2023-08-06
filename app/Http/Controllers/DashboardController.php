<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Quiz;
use App\Models\UserQuizAttempt;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }
    public function index()
    {

        if (auth()->user()->hasRole('student')) {

            $allModuleCompleted = false;

            if (Module::allModulesCopletedByUser()) {
                $allModuleCompleted = true;
            }

            $moduleCom = Module::studentIntroQuizCompleted() + Module::studentAttemptmodulesCount();

            $cheerInfo = '';
            if ($moduleCom > 0) {
                $cheerInfo = $this->getdashboardMessageGoofyMessage($moduleCom);
            }

            $module = Module::whichModuleNext();

            $section = $module->nextSectionForModule();
            // dd( Module::studentAttemptsCorrectMiniQuiz());
            $studentScore = [
                // 'totalFinalExam' => Module::totalFinalExamsCount(),
                // 'totalFinalExamQuestions' => Module::finalExamQuizCount(),

                'studentCorrectAnswer' => Module::TotalCorrectAnswer(),
                'studentAttemptsQuestion' => Module::TotalQuestionsAttempts(),
                // 'studentCorrectMiniQuiz' => Module::studentAttemptsCorrectMiniQuiz(),
                'cheerInfo' => $cheerInfo,
            ];

            // Iniitially we will show the quiz result for the first module then user can select according to theri need;;;;
            $modules = Module::where('module_type', '=', 'student')->orderBy('sequence', 'ASC')->get();
            // $quizAndscores = $this->quizBasedScore($modules[0]);

            return view('content.dashboard.student', [
                'module' => $module,
                'modules' => $modules,
                'section' => $section,
                // 'quizAndscores' => $quizAndscores,
                'allModuleCompleted' => $allModuleCompleted,
                'studentScore' => $studentScore,
            ]);
        }

        if (auth()->user()->hasRole('teacher')) {
            return view('content.dashboard.teacher');
        }

        if (auth()->user()->hasRole('admin')) {
            return view('content.dashboard.admin');
        }

        if (auth()->user()->hasRole('super-admin')) {
            return view('content.dashboard.super_admin');
        }

        if (auth()->user()->hasRole('subscriber')) {
            return view('content.dashboard.subscriber');
        }
    }

    public function studentInfo()
    {
    }

    // This is for students
    public function quizBasedScore(Module $module)
    {

        $quizzesAndScore = [
            'module_id' => $module->id,
            'quizDetail' => [],
        ];
        // dd($module->sections);

        foreach ($module->sections as $sec) {
            // var_dump('<pre>');
            // print_r($sec->quiz );
            // dd($sec);
            // var_dump($module->finalExam());
            if (! isset($sec->quiz->id)) {
                continue;
            }

            if ($module->finalExam()) {

                if ($sec->quiz->id == $module->finalExam()->id) {
                    continue;
                }
            }

            $userQuizAttempts = $sec->quiz->attempts->where('user_id', auth()->user()->id);

            // Key will be attempts and score will be value for the attempts
            $quizDetail = [
                'section_id' => $sec->id,
                'section_title' => $sec->title,
                'quiz_id' => $sec->quiz->id,
                'quiz_title' => $sec->quiz->title,
                'totalQuestions' => $sec->quiz->questions->count(),
                'attemptScore' => [],
            ];

            $attemptCount = 1;

            if ($userQuizAttempts->count()) {

                foreach ($userQuizAttempts as $attempt) {

                    $quizDetail['attemptScore']["$attemptCount"] = $sec->quiz->calculateUserScoreForQuiz($attempt);
                    $attemptCount++;
                }
            }

            $quizzesAndScore['quizDetail'][] = $quizDetail;
        }

        return $quizzesAndScore;
    }

    // // This is for students
    protected function calculateUserScore(Quiz $quiz, UserQuizAttempt $attempt)
    {
        $score = 0;
        if ($attempt->userQuizAnswers->count()) {
            foreach ($attempt->userQuizAnswers as $answer) {
                if ($answer->quizQuestionOption->is_correct) {
                    $score++;
                }
            }
        }

        return $score;
    }

    // This is for students
    public function quizzesScoreForModule()
    {
        $moduleId = request()->get('moduleId');
        $module = Module::find($moduleId);
        if (! $module) {
            $module = Module::where('module_type', 'student')->orderBy('sequence', 'asc')->first();
        }
        $quizAndscores = $this->quizBasedScore($module);
        // dd($quizAndscores);
        // $view = view('content.dashboard.dashboardComponent.student.student-quiz-mark-row', [
        //     'quizAndscores' => $quizAndscores
        // ]);
        $view = view('content.dashboard.dashboardComponent.student.student-quiz-mark-card', [
            'quizAndscores' => $quizAndscores,
        ]);

        return response([
            'success' => true,
            'html' => $view->render(),
        ]);
    }

    public function getdashboardMessageGoofyMessage($count)
    {
        switch ($count) {
            case '1':
                return $data = [
                    'You are 10 % of the way done.',
                    'Strong start!',
                ];
                break;
            case '2':
                return $data = [
                    'You are 20 % of the way done.',
                    'Keep it up!',
                ];

                break;
            case '3':
                return $data = [
                    'You are 30 % of the way done',
                    'Keep learning!',
                ];
                break;
            case '4':
                return $data = [
                    'You have completed 40 percent of the material.',
                    'You’re on your way!',
                ];

                break;
            case '5':
                return $data = [
                    'You have completed 50 percent of the program.',
                    'Halfway to home!',

                ];
                break;
            case '6':
                return $data = [
                    'You’re 60 percent of the way done.',
                    'Over the hump!',

                ];
                break;
            case '7':
                return $data = [
                    'You are 70 percent of the way done.',
                    'Nice work!',

                ];
                break;
            case '8':
                return $data = [
                    'You’re 80% of the way there.',
                    'Two modules to go.',

                ];

                break;
            case '9':
                return $data = [
                    'That’s 90% of the program completed.',
                    'You got this!',

                ];
                break;
            case '10':
                return $data = [
                    'You did it!  ',
                    '100% complete!',
                ];

                break;

            default:
                return 0;
                break;
        }
    }
}
