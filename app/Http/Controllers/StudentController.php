<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\CompletedSection;
use App\Models\Module;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionOption;
use App\Models\Section;
use App\Models\User;
use App\Models\UserQuizAnswer;
use App\Models\UserQuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
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

        // if($module->id != $nextModule->id && $module->sequence > $nextModule->sequence){

        //     $module = $nextModule;
        //     request()->session()->put('completeThisModuleFirst', "You need to complete module ".$module->title." before any other module.");

        // }

        $modules = Module::where('module_type', 'student')->orderBy('sequence', 'asc')->get();

        $contentCount = $module->sections->count();

        // $nextSection = $module->nextSectionForModule();

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
            ],
            [
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

    public function markSectionLastReaded($sectionId)
    {
        $section = Section::find($sectionId);
        $completedSection = CompletedSection::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'section_id' => $section->id,
            ],
            [
                'is_read' => 1,
            ]
        );

        return [
            'success' => true,
            'Url' => route('my-courses', $section->module->nextModuleForStudent()),
        ];
    }

    public function startQuiz($sectionId)
    {
        $quiz = Quiz::where('section_id', $sectionId)->first();

        $userQuizAttempts = $quiz->attempts->where('user_id', auth()->user()->id);

        $showQuizButton = true;
        if ($userQuizAttempts->count() >= config('setting.mini_quiz_attempt_count.count')) {
            $showQuizButton = false;
        }
        // Key will be attempts and score will be value for the attempts
        $scoreArray = [
            'totalQuestions' => $quiz->questions->count(),
            'attemptScore' => [],
            'finalExamCompleted' => false,
            'nextSectionExist' => null,
        ];

        if (! $quiz->section->isItLastSection()) {
            $nextSection = $quiz->section->nextSection();
            $sectionUrl = route('this-section', $nextSection->id);
            $scoreArray['nextSectionExist'] = $sectionUrl;
        }

        $attemptCount = 1;

        if ($quiz->section->module->finalExam()) {

            if ($quiz->section->module->finalExam()->id == $quiz->id && $userQuizAttempts->count() > 0) {
                $scoreArray['finalExamCompleted'] = true;
            }
        }

        if ($quiz->section->is_section == 0) {
            if ($userQuizAttempts->count()) {

                foreach ($userQuizAttempts as $attempt) {

                    $scoreArray['attemptScore']["$attemptCount"] = $quiz->calculateUserScoreForQuiz($attempt);
                    $attemptCount++;
                }
                $scoreArray['attemptScore']['final_exam'] = true;
                $per = Helper::roundScorePercentage($scoreArray['attemptScore'][1], $scoreArray['totalQuestions']);
                $proClass = '';
                if ($per < 25) {
                    $proClass = 'bg-danger';
                } elseif ($per < 50) {
                    $proClass = 'bg-warning';
                } elseif ($per < 75) {
                    $proClass = 'bg-info';
                } else {
                    $proClass = 'bg-success';
                }
                $scoreArray['attemptScore']['circle_class'] = $proClass;
            }
        } else {
            if ($userQuizAttempts->count()) {

                foreach ($userQuizAttempts as $attempt) {

                    $scoreArray['attemptScore']["$attemptCount"] = $quiz->calculateUserScoreForQuiz($attempt);
                    $attemptCount++;
                }
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
            'showQuizButton' => $showQuizButton,
        ]);
    }

    public function submitQuiz(Request $request)
    {

        // In questionOption array we have key is for the question id and value is for the option id
        if (empty($request->questionOption)) {

            return [
                'success' => 'validationError',
            ];
        }

        $quizId = $request->session()->get('currentQuizId');
        $quiz = Quiz::find($quizId);
        $retakeInfo = '';

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
        $per = round($userScore / $quiz->questions->count() * 100);

        $actualper = Helper::roundScorePercentage($userScore, $quiz->questions->count());
        $proClass = '';
        $style = '';
        if ($per < 25) {
            $proClass = 'bg-danger';
            $style = ' <style>.percent_more:after {position: absolute; left: .5em; top:0em; right: 0; bottom: 0; background: #ea5455; content:"";}</style>';
        } elseif ($per < 50) {
            $proClass = 'bg-warning';
            $style = ' <style>.percent_more:after {position: absolute; left: .5em; top:0em; right: 0; bottom: 0; background: #ff9f43; content:"";}</style>';
        } elseif ($per < 75) {
            $proClass = 'bg-info';
            $style = ' <style>.percent_more:after {position: absolute; left: .5em; top:0em; right: 0; bottom: 0; background: #00cfe8; content:"";}</style>';
        } else {
            $proClass = 'bg-success';
            $style = ' <style>.percent_more:after {position: absolute; left: .5em; top:0em; right: 0; bottom: 0; background: #28c76f; content:"";}</style>';
        }
        $scoreArray = [
            'totalQuestions' => $quiz->questions->count(),
            'attemptScore' => [],
        ];
        $attemptCount = 1;
        $userQuizAttempts = $quiz->attempts->where('user_id', auth()->user()->id);
        $attemptsscore = '';
        $attemptC = '';
        if ($quiz->section->is_section != 0) {
            $attemptval = 'Attempt';
            $isFinal = false;
        } else {
            $attemptval = '';
            $attemptC = 'Your Score for this Final Quiz : ';
            $isFinal = true;
        }

        if ($userQuizAttempts->count()) {
            foreach ($userQuizAttempts as $attempt) {
                if ($isFinal) {
                    $attemptCount = '';
                } else {
                    $attemptC = $attemptCount.':';
                }
                $attemptsscore .= "<div class='attempt text-black font-s'>".$attemptval.' '.$attemptC." <span style='font-weight:bold;'> ".$quiz->calculateUserScoreForQuiz($attempt).' of '.$quiz->questions->count().' correct</span> <br>
                    </div>';
                $attemptCount++;
            }
        }
        // print_r($attemptsscore);
        // dd('ok');
        $scoreHtml = ' <div class="row attempt-container quiz-attempt-show">
                <div class="font-m">Attempts and Questions Correct</div><div class="value-of-score">'.$attemptsscore.'</div></div>'.

            $style.'<div class="quiz-after-attempt-left-container">
             
             <div class="quiz-container-div"> <div class="quiz-score-after-result">
                          <p class="attemp-last-para" style="color:forestgreen;"> You Scored:<span style="font-weight:bold; color:#3c3c3c;">'.$quiz->calculateUserScoreForQuiz($quizAttempt).' out of '.$quiz->questions->count().'</span> </p>
                    </div>
                     <div class="module-exam-score">
                        <div class="col-sm-3 col-md-2 module-exam-after-quiz-result-content">
                            <div class="conainer">
                                <div class="circle_percent" data-percent="'.$actualper.'">
                                    <div class="circle_inner">
                                        <div class="round_per '.$proClass.'"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="image"><img  src="'.asset('images/dashboard-img/BGSCORE.png').'" alt=""></div>
                    </div>';
        // $scoreHtml+=    $style;
        // this is for when user attempts one quiz all question correct
        if ($quiz->calculateUserScoreForQuiz($quizAttempt) == $quiz->questions->count()) {
            // check if user attempt all correct answer
            $alreadyCorrect = UserQuizAttempt::where('user_id', '=', Auth::ID())
                ->where('quiz_id', $quiz->id)
                ->where('mini_quiz_all_correct', $quiz->questions->count())
                ->count();

            if (! $alreadyCorrect) { // check if user already attempt the all correct

                UserQuizAttempt::find($quizAttempt->id) // insert the number in to the UserQuizAttemps
                    ->update([
                        'mini_quiz_all_correct' => $quiz->calculateUserScoreForQuiz($quizAttempt),
                    ]);
            }
            $retakeInfo = '';
        } else {
            if ($quiz->section->is_section) {
                $sectionUrl = route('this-section', $quiz->section_id);
                $retakeInfo = "<div class='retake-exam'> <p class=' font-m'>You must retake this quiz and answer all questions correctly (100%) to receive credit for the section.  You may review the material first. </p> <div class='last-quiz-attempt-btn'><a class='btn btn-danger btn-lg my-2' href='{$sectionUrl}'>Retake This Quiz</a></div> </div>";
            }
        }

        // if($quiz->questions->count() != $userScore && !$isItFinalExam){
        //     return [
        //         'success' => true,
        //         'code' => 'success',
        //         'message' =>  'Your must have to correct every question if you want to study further sections.',
        //         'html' => "<div class='card'><div class='m-4 p-5'>".$scoreHtml."<a class='btn btn-bitbucket' href='".route('startQuiz', $quiz->id)."'>Start again</a> <a class='btn btn-primary' href='".route('this-section', $quiz->section->id)."'>Revise Section Again.</a></div></div>"
        //     ];
        // }

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
            if ($quiz->section->module->sequence != 1) {
                $retakeInfo = '';
            }
            if ($quiz->section->is_section == 0) {
                $retakeInfo = '';
            }

            $moduleUrl = route('my-courses', $nextModule->id);
            $html = "<div class='card last-attempt-card'><div class='m-4 p-5 final-attempt-quiz_container'>$scoreHtml</div> $retakeInfo<div class='last-quiz-attempt-btn'><a class='btn btn-bitbucket btn-lg' href='$moduleUrl'>Start Next Module</a></div></div>";

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
        $html = "<div class='card last-attempt-card'>
                    <div class='m-4 p-5 final-attempt-quiz_container'>
                        $scoreHtml
                    </div>$retakeInfo
                    <div class='last-quiz-attempt-btn'><a class='btn btn-bitbucket btn-lg' href='$sectionUrl'>Next Section</a></div>
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
        // how many final exam user attempt
        if (! Module::allModulesCopletedByUser()) {
            return view('content.students.certificate.index', [
                'notCompletedAll' => "You haven't completed all the module you will get your certificate once you are done with all the program.",
                'section' => Module::nextSectionForModuleCertif()->first(),
            ]);
        }

        $finalScore['userScore'] = Module::TotalCorrectAnswer();
        $finalScore['totalScore'] = Module::TotalQuestionsAttempts();

        return view('content.students.certificate.index', [
            'notCompletedAll' => false,
            'finalScore' => $finalScore,
            'completionDate' => Module::cirtificateComplateDate(),
        ]);
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
            'url' => '/dashboard',
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

            foreach ($module->sections->sortBy('sequence') as $section) {
                $icon = 'lock';
                $quizIcon = 'lock';
                $sectionUrl = '#';
                $quizUrl = '#';
                $textSectionClass = 'text-muted fw-bold';
                $textQuizClass = 'text-muted fw-bold';
                // dd($section->checkPreviousSection());
                // if($section->checkPreviousSection()){
                //     $icon = 'book';
                //     $sectionUrl = "/open-section"."/".$section->id;
                //     $textSectionClass = "text-white fw-bolder";
                // }
                // $icon = 'book';
                $icon = 'fi fi-br-sign-in-alt';

                $quizCompleteInfo = $this->sectionInfo($section);
                //    dd( $quizCompleteInfo );
                $sectionUrl = '/open-section'.'/'.$section->id;
                $textSectionClass = 'text-white fw-bolder';

                if ($quizCompleteInfo['is_read']) {
                    $textSectionClass .= ' quiz-readed';
                }

                // if($section->quiz->parentSectionCompleted()){
                //     $quizIcon = "activity";
                //     $quizUrl = "/quiz"."/".$section->id;
                //     $textQuizClass = 'text-white fw-bolder';
                // }
                // $quizIcon = "activity";
                $quizIcon = 'fi fi-br-sign-in-alt';

                $quizUrl = '/quiz'.'/'.$section->id;

                $textQuizClass = 'text-white fw-bolder';
                if ($quizCompleteInfo['quiz_completed']) {
                    $textQuizClass .= ' quiz-completed';
                }
                $submenu[] = [
                    'url' => $sectionUrl,
                    'name' => $section->title,
                    'icon' => $icon,
                    'iconClass' => $iconClass,

                    'slug' => $section->id,

                    'classlist' => $pageConfigs['currentSection'] ? ($section->id == $pageConfigs['currentSection']->id ? 'active module-section current-module-section' : 'module-section') : 'module-section',

                    'textClass' => $textSectionClass,
                ];

                if (isset($section->quiz->title)) {

                    $submenu[] = [
                        'url' => $quizUrl,
                        'name' => $section->quiz->title,
                        'icon' => $quizIcon,
                        'iconClass' => $iconClass,
                        'slug' => 'quiz/'.$section->quiz->id,
                        'classlist' => $pageConfigs['currentQuiz'] ? ($section->id == $pageConfigs['currentQuiz']->id ? ' section-quiz current-section-quiz' : 'section-quiz') : 'section-quiz',
                        'textClass' => $textQuizClass,
                    ];
                }
            }

            $classModule = 'module-ele';

            if ($pageConfigs['currentModule']) {
                if ($pageConfigs['currentModule']->id == $module->id) {
                    if ($pageConfigs['currentSection'] || $pageConfigs['currentQuiz']) {
                        $classModule = 'active1 open module-ele current-module-ele';
                    }
                }
            }

            $moduleIcon = 'lock';
            $moduleUrl = '#';
            $moduleTextClass = 'text-muted fw-bold';
            $userCompleteSection = Section::where('module_id', $module->id) // get final exam
                ->join('completed_sections', 'sections.id', '=', 'completed_sections.section_id')
                ->where('user_id', '=', Auth::ID()) // how many final exam user attempt
                ->count();
            $sectionCount = Section::where('module_id', $module->id)  // all quizzss
                ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
                ->count();
            $moduleCompleted = 0;
            if ($userCompleteSection == $sectionCount) {
                $moduleCompleted = 1;
            }

            // if($module->checkPreviousModule()){
            //     $moduleIcon = 'book';
            //     $moduleUrl = '/my-courses'.'/'.$module->id;
            //     $moduleTextClass = "text-white fw-bolder";
            // }
            // $moduleIcon = 'book';
            $moduleIcon = 'fi fi-br-chart-set-theory';

            $moduleUrl = '/my-courses'.'/'.$module->id;

            $d = $module->getModuleCompleted($module->id);
            $moduleTextClass = 'text-white fw-bolder';

            if ($d['userAttempt'] == $d['allQuizCorrect']) {
                $moduleTextClass = 'text-white fw-bolder module-completed';
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
                'moduleComplete' => $moduleCompleted,
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
                'moduleComplete' => $moduleCompleted,
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

    public function sectionInfo($section)
    {
        $sectionCheck = [
            'is_read' => false,
            'quiz_completed' => false,
            'section_completed' => false,
        ];
        $sectionAvailable = $section->SectionCompltedByAll->where('user_id', auth()->user()->id)->first();

        if ($sectionAvailable) {

            if ($sectionAvailable->is_read) {
                $sectionCheck['is_read'] = true;
            }

            if ($sectionAvailable->quiz_completed) {
                $sectionCheck['quiz_completed'] = true;
            }
        }

        if ($sectionCheck['is_read'] == true && $sectionCheck['quiz_completed'] == true) {
            $sectionCheck['section_completed'] = true;
        }

        return $sectionCheck;
    }
}
