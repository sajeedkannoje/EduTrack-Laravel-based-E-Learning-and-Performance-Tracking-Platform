<?php

namespace App\Http\Controllers;

use App\Models\CompletedSection;
use App\Models\Module;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionOption;
use App\Models\Section;
use App\Models\UserQuizAnswer;
use App\Models\UserQuizAttempt;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        // Get all the module related to the student
        $modules = Module::where('module_type', 'student')->get();

        return view('content.students.modules.index')->with([
            'modules' => $modules,
        ]);
    }

    // Get all the section related to a module
    public function moduleSections($id = 0)
    {
        $module = '';

        $nextModule = Module::whichModuleNext();

        if ($id) {

            $module = Module::find($id);

        }

        if (Module::allModulesCopletedByUser() && $module) {

            $nextModule = $module;
        }

        if (! $module) {
            $module = $nextModule;
        }

        if ($module->id != $nextModule->id && $module->sequence > $nextModule->sequence) {

            $module = $nextModule;
            request()->session()->put('completeThisModuleFirst', 'You need to complete module '.$module->title.' before any other module.');

        }

        $modules = Module::where('module_type', 'student')->orderBy('sequence', 'asc')->get();

        $contentCount = $module->sections->count();

        $nextSection = $module->nextSectionForModule();

        $breadcrumbs = [
            ['link' => '/my-courses', 'name' => 'My Courses'],
            ['name' => $module->title],
        ];

        $pageConfigs = [
            'changeMenu' => true,
            'courseMenu' => $modules,
            'currentModule' => $module,
            'currentSection' => false,
            'currentQuiz' => false,
        ];

        $menuData = $this->changeMenuForCourse($pageConfigs);

        return view('content.students.sections.index')->with([
            'module' => $module,
            'breadcrumbs' => $breadcrumbs,
            'contentCount' => $contentCount,
            'menuData' => $menuData,
        ]);
    }

    // Get single section detail
    public function openSection($id)
    {

        $section = Section::find($id);

        $modules = Module::where('module_type', 'student')->orderBy('sequence', 'asc')->get();

        if (! $section) {
            return redirect()->route('my-courses');
        }

        $module = $section->module;

        $nextModule = Module::whichModuleNext();

        if (Module::allModulesCopletedByUser()) {
            $nextModule = $module;
        }

        if ($module->id != $nextModule->id && $module->sequence > $nextModule->sequence) {
            request()->session()->put('completeThisModuleFirst', 'You need to complete module '.$nextModule->title.' before any other module.');

            return redirect()->route('my-courses', $nextModule->id);

        }

        $nextSection = $section->whichSectionIsNext();

        if ($section->allSectionCompletedByUser()) {
            $nextSection = $section;
        }

        if ($section->id != $nextSection->id && $section->sequence > $nextSection->sequence) {

            $section = $nextSection;

        }

        $breadcrumbs = [
            ['link' => '/my-courses', 'name' => 'My Courses'],
            ['link' => '/my-courses'.'/'.$section->module->id, 'name' => $section->module->title],
            ['name' => $section->title],
        ];

        $pageConfigs = [
            'changeMenu' => true,
            'courseMenu' => $modules,
            'currentModule' => $module,
            'currentSection' => $section,
            'currentQuiz' => false,
        ];

        $menuData = $this->changeMenuForCourse($pageConfigs);

        return view('content.students.sections.singleSection')->with([
            'section' => $section,
            'breadcrumbs' => $breadcrumbs,
            'menuData' => $menuData,
        ]);

    }

    public function markSectionReaded($sectionId)
    {
        $section = Section::find($sectionId);
        // dd($section);
        $completedSection = CompletedSection::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'section_id' => $section->id,
            ], [
                'is_read' => 1,

            ]
        );

        $quizUrl = route('startQuiz', $section->id);
        $html = "<a class='btn btn-bitbucket  start-quiz' href='$quizUrl'>Start Quiz</a>";
        // return response()->json([

        // ]);
        return [
            'success' => true,
            'html' => $html,
            'quizUrl' => $quizUrl,
        ];
    }

    public function startQuiz($sectionId)
    {
        $quiz = Quiz::where('section_id', $sectionId)->first();

        $userQuizAttempts = $quiz->attempts->where('user_id', auth()->user()->id);

        // Key will be attempts and score will be value for the attempts
        $scoreArray = [
            'totalQuestions' => $quiz->questions->count(),
            'attemptScore' => [],
            'finalExamCompleted' => false,
        ];

        $attemptCount = 1;

        if ($quiz->section->module->finalExam()) {

            if ($quiz->section->module->finalExam()->id == $quiz->id && $userQuizAttempts->count() > 0) {
                $scoreArray['finalExamCompleted'] = true;
            }

        }

        if ($userQuizAttempts->count()) {

            foreach ($userQuizAttempts as $attempt) {
                $scoreArray['attemptScore']["$attemptCount"] = $quiz->calculateUserScoreForQuiz($attempt);
                $attemptCount++;
            }
        }

        if (! $quiz->parentSectionCompleted()) {

            request()->session()->put('completeSectionReading', 'Before Starting Quiz you need to read section.');

            return redirect()->route('this-section', $sectionId);

        }

        $section = $quiz->section;
        $module = $section->module;

        $breadcrumbs = [
            ['link' => '/my-courses', 'name' => 'My Courses'],
            ['link' => '/my-courses'.'/'.$section->module->id, 'name' => $section->module->title],
            ['link' => "/open-section/$sectionId", 'name' => $section->title],
            ['name' => 'Quiz'],
        ];

        $allModules = Module::where('module_type', 'student')->orderBy('sequence', 'asc')->get();

        request()->session()->put('currentQuizId', $quiz->id);

        // Change Menu when its courses pages
        $pageConfigs = [
            'changeMenu' => true,
            'courseMenu' => $allModules,
            'currentModule' => $module,
            'currentSection' => false,
            'currentQuiz' => $quiz,
        ];
        $menuData = $this->changeMenuForCourse($pageConfigs);

        return view('content.students.quiz.index')->with([
            'quiz' => $quiz,
            'breadcrumbs' => $breadcrumbs,
            'scoreArray' => $scoreArray,
            'menuData' => $menuData,
        ]);
    }

    public function submitQuiz(Request $request)
    {
        // In questionOption array we have key is for the question id and value is for the option id
        if (empty($request->questionOption)) {

            return [
                'success' => 'ValidationError',
            ];
        }

        $quizId = $request->session()->get('currentQuizId');
        $quiz = Quiz::find($quizId);

        $isItFinalExam = false;
        if ($quiz->section->module->finalExam()) {
            $isItFinalExam = ($quiz->section->module->finalExam()->id == $quiz->id) ? true : false;
        }

        if (count($request->questionOption) != $quiz->questions->count()) {
            return [
                'success' => 'validationError',
            ];
        }

        $quizAttempt = new UserQuizAttempt;
        $quizAttempt->user_id = auth()->user()->id;
        $quizAttempt->quiz_id = $quizId;
        $quizAttempt->save();

        if (! empty($request->questionOption)) {
            foreach ($request->questionOption as $questionId => $optionId) {
                $question = QuizQuestion::find($questionId);
                $option = QuizQuestionOption::find($optionId);

                if ($question->quiz->id == $quizId) {

                    if ($option->quizQuestion->id == $question->id) {

                        UserQuizAnswer::create([
                            'quiz_question_option_id' => $optionId,
                            'user_quiz_attempt_id' => $quizAttempt->id,
                        ]);
                    }

                }

                continue;
            }
        }

        $userScore = $quiz->calculateUserScoreForQuiz($quizAttempt);

        $scoreHtml = '<div class="alert alert-primary p-2 font-medium-3">
            You Score: '.$quiz->calculateUserScoreForQuiz($quizAttempt).' out of '.$quiz->questions->count().'
        </div>';

        if ($quiz->questions->count() != $userScore && ! $isItFinalExam) {

            return [
                'success' => true,
                'code' => 'success',
                'message' => 'Your must have to correct every question if you want to study further sections.',
                'html' => "<div class='card'><div class='m-4 p-5'>".$scoreHtml."<a class='btn btn-bitbucket' href='".route('startQuiz', $quiz->id)."'>Start again</a> <a class='btn btn-primary' href='".route('this-section', $quiz->section->id)."'>Revise Section Again.</a></div></div>",
            ];
        }

        CompletedSection::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'section_id' => $quiz->section->id,
            ],
            [
                'is_read' => 1,
                'quiz_completed' => 1,
            ]
        );

        if ($quiz->section->isItLastSection()) {

            $nextModule = $quiz->section->module->nextModuleForStudent();

            if (! $nextModule) {
                $nextModule = Module::where('module_type', 'student')->orderBy('sequence', 'asc')->first();
            }

            $moduleUrl = route('my-courses', $nextModule->id);
            $html = "<div class='card'><div class='m-4 p-5'>$scoreHtml<a class='btn btn-bitbucket btn-lg' href='$moduleUrl'>Start Next Module</a></div></div>";

            $request->session()->forget('currentQuizId');

            return [
                'success' => true,
                'code' => 'success',
                'message' => 'Your quiz is completed now you can navigate to the next Module',
                'html' => $html,
            ];

        }

        $nextSection = $quiz->section->nextSection();
        $sectionUrl = route('this-section', $nextSection->id);
        $html = "<div class='card'>
                    <div class='m-4 p-5'>                        
                        $scoreHtml
                        <a class='btn btn-bitbucket btn-lg' href='$sectionUrl'>Next Section</a>
                    </div>
                </div>";

        $request->session()->forget('currentQuizId');

        return [
            'success' => true,
            'title' => 'Congratulations',
            'code' => 'success',
            'message' => 'Your quiz is completed now you can navigate to the next section',
            'html' => $html,
        ];

    }

    public function generateCertificate()
    {
        $user = auth()->user();

        if (! Module::allModulesCopletedByUser()) {

            $module = Module::whichModuleNext();

            return view('content.students.certificate.index', [
                'notCompletedAll' => "You haven't completed all the module you will get your certificate once you are done with all the program.",
                'module' => $module,
                'section' => $module->nextSectionForModule(),
            ]);

        }
        $modules = Module::where('module_type', 'student')->orderBy('sequence', 'asc')->get();
        $finalScore = [
            'totalExams' => 0,
            'userScore' => 0,
            'totalScore' => 0,
        ];

        $moduleCount = 0;
        $totalScore = 0;
        $userScore = 0;

        foreach ($modules as $module) {

            if ($module->finalExam()) {
                $totalScore += $module->finalExam()->questions->count();
                $moduleCount += 1;
                $userScore += $module->finalExamResult();
            }

        }

        $finalScore['totalExams'] = $moduleCount;
        $finalScore['userScore'] = $userScore;
        $finalScore['totalScore'] = $totalScore;

        return view('content.students.certificate.index', [
            'notCompletedAll' => false,
            'finalScore' => $finalScore,
        ]);

    }

    protected function changeMenuForCourse($pageConfigs)
    {
        $verticalMenuData = (object) config('app_menu.student');
        $horizontalMenuData = (object) config('app_menu.student');
        // dd($verticalMenuData->menu);
        $verticalMenuData->menu = [];
        $horizontalMenuData->menu = [];
        $iconClass = 'bg-site-yellow';

        $dashboardMenu = [
            'url' => '/dashboard',
            'name' => 'Back To Dashboard',
            'iconClass' => $iconClass,
            'icon' => 'arrow-left',
            'slug' => 'dashboard',
            'addDivider' => true,
            'textClass' => 'text-white fw-bolder',
        ];

        $verticalMenuData->menu[] = $dashboardMenu;
        $horizontalMenuData->menu[] = $dashboardMenu;
        foreach ($pageConfigs['courseMenu'] as $module) {
            $submenu = [];
            foreach ($module->sections as $section) {
                $icon = 'lock';
                $quizIcon = 'lock';
                $sectionUrl = '#';
                $quizUrl = '#';
                $textSectionClass = 'text-muted fw-bold';
                $textQuizClass = 'text-muted fw-bold';
                $disabledClass = 'disabled';
                if ($section->checkPreviousSection()) {
                    $icon = 'book';
                    $sectionUrl = '/open-section'.'/'.$section->id;
                    $textSectionClass = 'text-white fw-bolder';
                    $disabledClass = '';
                }

                if ($section->quiz->parentSectionCompleted()) {
                    $quizIcon = 'activity';
                    $quizUrl = '/quiz'.'/'.$section->id;
                    $textQuizClass = 'text-white fw-bolder';
                    $disabledClass = '';
                }

                $submenu[] = [
                    'url' => $sectionUrl,
                    'name' => $section->title,
                    'icon' => $icon,
                    'iconClass' => $iconClass,

                    'slug' => $section->id,

                    'classlist' => $pageConfigs['currentSection'] ? ($section->id == $pageConfigs['currentSection']->id ? "active module-section current-module-section $disabledClass" : "module-section $disabledClass") : "module-section $disabledClass",

                    'textClass' => $textSectionClass,
                ];

                $submenu[] = [
                    'url' => $quizUrl,
                    'name' => $section->quiz->title,
                    'icon' => $quizIcon,
                    'iconClass' => $iconClass,
                    'slug' => 'quiz/'.$section->quiz->id,

                    'classlist' => $pageConfigs['currentQuiz'] ? ($section->id == $pageConfigs['currentQuiz']->id ? "active section-quiz current-section-quiz $disabledClass" : "section-quiz $disabledClass") : "section-quiz $disabledClass",

                    'textClass' => $textQuizClass,
                ];
            }

            $classModule = 'module-ele open';

            if ($pageConfigs['currentModule']) {
                if ($pageConfigs['currentModule']->id == $module->id) {
                    if ($pageConfigs['currentSection'] || $pageConfigs['currentQuiz']) {
                        $classModule = 'active open module-ele current-module-ele';
                    }
                }
            }

            $moduleIcon = 'lock';
            $moduleUrl = '#';
            $moduleTextClass = 'text-muted fw-bold';
            if ($module->checkPreviousModule()) {
                $moduleIcon = 'book';
                $moduleUrl = '/my-courses'.'/'.$module->id;
                $moduleTextClass = 'text-white fw-bolder';
            }

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
}
