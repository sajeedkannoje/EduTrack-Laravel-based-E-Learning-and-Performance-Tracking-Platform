<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Module extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the sections for the Module
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function introVideo()
    {
        if ($this->introduction_video) {
            return $this->introduction_video;
        } else {
            return asset('videos/sss.mp4');
        }
    }

    public function getFeaturesAttribute($value)
    {

        return explode(';', $value);

    }

    public static function allModulesCopletedByUser()
    {
        $moduleCheck = false;
        // dd( self::allQuestions() ,self::quesionsComplate());
        if (self::allQuestions()->count() == self::quesionsComplate()->count()) {
            return $moduleCheck = true;
        }

        return $moduleCheck = false;
    }

    public static function courseCopletedByUser()
    {
        $moduleCheck = false;
        // dd(self::quesionsComplate()->count());
        if (self::allQuestions()->count() == self::quesionsComplate()->count()) {
            return $moduleCheck = true;
        }

        return $moduleCheck = false;
    }

    public static function allQuestions()
    {
        return DB::table('modules')->where('module_type', '=', 'student')
            ->join('sections', 'modules.id', '=', 'sections.module_id')
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->join('quiz_questions', 'quizzes.id', '=', 'quiz_questions.quiz_id')
            ->get();
    }

    public static function quesionsComplate()
    {
        return DB::table('completed_sections')->where('user_id', auth()->user()->id)
            ->join('sections', 'completed_sections.section_id', '=', 'sections.id')
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->join('quiz_questions', 'quizzes.id', '=', 'quiz_questions.quiz_id')
            ->where('quiz_completed', '=', 1)
            ->distinct('completed_sections.section_id')
            ->get();
    }

    public static function remainingQuizByStudent()
    {
        return DB::table('modules')->where('module_type', '=', 'student')
            ->join('sections', 'modules.id', '=', 'sections.module_id')
            ->leftJoin('completed_sections', 'sections.id', '=', 'completed_sections.section_id')
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->distinct('completed_sections.section_id')
            ->where('quiz_completed', '=', 0)
            ->where('completed_sections.user_id', auth()->user()->id)
            ->orderBy('modules.sequence', 'asc')
            ->orderBy('sections.sequence', 'asc')
            ->get();
    }

    public static function getAllQuizCount()  // count of all quizess exist.
    {
        return self::join('sections', 'modules.id', '=', 'sections.module_id')
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->select('quizzes.id')
            ->count();
    }

    public static function moduleCompletedByStudentCount()
    {
        return self::join('sections', 'modules.id', '=', 'sections.module_id')
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->join('completed_sections', 'sections.id', '=', 'completed_sections.section_id')->where('user_id', '=', Auth::ID())
            ->select('completed_sections.id')
            ->count();
    }

    public static function studentAttemptsCorrectMiniQuiz()
    {
        return self::where('has_final_exam', '=', 1)
            ->join('sections', 'modules.id', '=', 'sections.module_id')->where('is_section', 1)  // get final exam
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')
            ->where('user_id', '=', Auth::ID()) // how many final exam user attempt
            ->whereNotNull('mini_quiz_all_correct')
            ->sum('mini_quiz_all_correct');
    }

    public static function studentAttemptmodulesCount()
    {
        return Section::where('is_section', 0)  // get final exam
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')
            ->where('user_id', '=', Auth::ID())
            ->count();
    }

    public static function studentIntroQuizCompleted()
    {
        $count = Module::where('modules.sequence', '=', '1')->where('has_final_exam', '=', 0)->where('module_type', '=', 'student')
            ->join('sections', 'modules.id', '=', 'sections.module_id')
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')->where('user_id', '=', Auth::ID())
            ->count();
        if ($count > 0) {
            return $count = 1;
        }

        return $count = 0;
    }

    public function moduleCompletedByThisUser()
    {

        $query = DB::table('sections')
            ->rightJoin('completed_sections', 'sections.id', '=', 'completed_sections.section_id')
            ->where('sections.module_id', '=', $this->id)
            ->where('completed_sections.user_id', '=', auth()->user()->id);

        if ($query->count() != $this->sections->count()) {
            return false;
        }

        if ($query->where('completed_sections.quiz_completed', '<>', 1)->count()) {
            return false;
        }

        return true;

    }

    public function checkPreviousModule()
    {

        $preModule = self::where('sequence', '<', $this->sequence)->orderBy('sequence', 'desc')->first();

        if (! $preModule) {
            return true;
        }

        if ($preModule->moduleCompletedByThisUser()) {
            return true;
        }

        return false;

    }

    // for students
    public static function whichModuleNext()
    {

        $modules = self::where('module_type', 'student')->orderBy('sequence', 'asc');
        foreach ($modules->get() as $module) {

            $query = DB::table('sections')
                // ->join('modules', 'sections.module_id', '=', 'modules.id')
                ->rightJoin('completed_sections', 'sections.id', '=', 'completed_sections.section_id')
                ->where('sections.module_id', '=', $module->id)
                ->where('user_id', '=', auth()->user()->id);
            if ($query->count() != $module->sections->count()) {
                return $module;
            }

            if ($query->where('completed_sections.quiz_completed', '<>', 1)->count()) {
                return $module;
            }

        }

        return $modules->first();

    }

    public function nextModuleForStudent()
    {
        return self::where('module_type', 'student')->where('sequence', '>', $this->sequence)->orderBy('sequence', 'asc')->first();
    }

    public function nextSectionForModule()
    {
        return Section::where('module_id', $this->id)->orderBy('sequence', 'asc')->first();

    }

    public static function nextSectionForModuleCertif()
    {
        $completedSections = self::remainingQuizByStudent();

        if (count($completedSections)) {
            return $completedSections;
            // $section = Section::where('module_id', $this->id)->where('sequence', '>', $completedSections->sequence)->orderBy('sequence', 'asc')->first();
        }

        return Section::where('module_id', 1)->orderBy('sequence', 'asc')->first();
    }

    public function moduleInfoExerpt()
    {
        return substr($this->description, 0, 400);
    }

    public static function totalFinalExamsCount()
    {
        return Section::where('is_section', '=', 0)->count();

    }

    public static function finalExamQuizCount()
    {
        return Section::where('is_section', 0)
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->join('quiz_questions', 'quizzes.id', '=', 'quiz_questions.quiz_id')
            ->count();
    }

    public static function finalExamResultsCount()
    {
        return Section::where('is_section', 0)  // get final exam
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')->where('user_id', '=', Auth::ID()) // how many final exam user attempt
            ->join('user_quiz_answers', 'user_quiz_attempts.id', '=', 'user_quiz_answers.user_quiz_attempt_id')
            ->join('quiz_question_options', 'user_quiz_answers.quiz_question_option_id', '=', 'quiz_question_options.id')
            ->where('is_correct', '=', 1)
            ->count();
    }

    public static function studentAttemptsQuestions()
    {
        return Section::where('is_section', 0)  // get final exam
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')->where('user_id', '=', Auth::ID()) // how many final exam user attempt
            ->join('user_quiz_answers', 'user_quiz_attempts.id', '=', 'user_quiz_answers.user_quiz_attempt_id')
            ->join('quiz_question_options', 'user_quiz_answers.quiz_question_option_id', '=', 'quiz_question_options.id')
            ->count();
    }

    public function finalExam()
    {
        $finalSection = Section::where('module_id', $this->id)->where('is_section', 'LIKE', 0)->first();

        if ($finalSection) {
            return $finalSection->quiz;
        }

        return false;
    }

    public function finalExamResult($userId = 0)
    {
        $finalExam = $this->finalExam();

        $userQuizAttempts = $finalExam->attempts->where('user_id', auth()->user()->id)->first();
        if ($userId) {
            $userQuizAttempts = $finalExam->attempts->where('user_id', $userId)->first();
        }

        $score = 0;

        if ($finalExam) {

            $score = $finalExam->calculateUserScoreForQuiz($userQuizAttempts);

        }

        return $score;
    }

    public function getAllQuestionCountOfModule()  // FINAL EXAM QUESTION ATTEMPT
    {return Section::where('is_section', 0)->where('module_id', $this->id)  // get final exam
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->join('quiz_questions', 'quizzes.id', '=', 'quiz_questions.quiz_id')
            ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')->where('user_id', '=', Auth::ID())
            ->count();
    }

    public function getAllQuestionCountOfModuleIntro()  // get all questions of one modules intro
    {return Section::where('module_id', $this->id)->where('is_section', 1)
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->join('quiz_questions', 'quizzes.id', '=', 'quiz_questions.quiz_id')
            ->count();
    }

    public function singleModuleFinalExamAnswer()  // FINAL EXAM CORRECT ANSWER
    {return Section::where('is_section', 0)->where('module_id', $this->id)  // get final exam
           ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
           ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')->where('user_id', '=', Auth::ID()) // how many final exam user attempt
           ->join('user_quiz_answers', 'user_quiz_attempts.id', '=', 'user_quiz_answers.user_quiz_attempt_id')
           ->join('quiz_question_options', 'user_quiz_answers.quiz_question_option_id', '=', 'quiz_question_options.id')
           ->where('is_correct', '=', 1)
           ->count();
    }

    public function singleModuleFinalExamAnswerIntro()  // get single module final exam
    {$sections = Section::where('module_id', '=', $this->id)->first();
        $userQuizAttempts = Section::where('is_section', 1)
            ->where('module_id', '=', $this->id)->first()->quiz
            ->attempts->where('user_id', auth()->user()->id);
        if ($userQuizAttempts->count()) {
            foreach ($userQuizAttempts as $attempt) {
                $quizDetail[] = $sections->quiz->calculateUserScoreForQuiz($attempt);
            }

            return max($quizDetail);
        }

        return 0;
    }

    public function allQuestionsAttemptsByStudent()    // MINI QUIZ QUESTION ATTEMPTED IN ONE MODULE
    {return Section::where('is_section', 1)
            ->where('module_id', $this->id)  // get final exam
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->join('quiz_questions', 'quizzes.id', '=', 'quiz_questions.quiz_id')
            ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')->where('user_id', '=', Auth::ID())
            ->count();
    }

    public function allCorrectQuestionsByStudent()  // Mini Quiz ANSWER CORRECT BY student
    {return Section::where('is_section', 1)->where('module_id', $this->id)  // get final exam
           ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
           ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')->where('user_id', '=', Auth::ID()) // how many final exam user attempt
           ->join('user_quiz_answers', 'user_quiz_attempts.id', '=', 'user_quiz_answers.user_quiz_attempt_id')
           ->join('quiz_question_options', 'user_quiz_answers.quiz_question_option_id', '=', 'quiz_question_options.id')
           ->where('is_correct', '=', 1)
           ->count();
    }

    // For teachers
    public function previousModule()
    {
        $module = self::where('module_type', 'teacher')->where('sequence', '<', $this->sequence)->orderBy('sequence', 'desc')->first();

        if ($module) {
            return $module;
        }

        return false;
    }

    public function nextModule()
    {
        $module = self::where('module_type', 'teacher')->where('sequence', '>', $this->sequence)->orderBy('sequence', 'asc')->first();

        if ($module) {
            return $module;
        }

        return false;

    }

    public function moduleCompletedByStudent($studentId)
    {
        $query = DB::table('sections')
            ->rightJoin('completed_sections', 'sections.id', '=', 'completed_sections.section_id')
            ->where('sections.module_id', '=', $this->id)
            ->where('completed_sections.user_id', '=', $studentId);

        // if($query->count() != $this->sections->count()){
        //     return false;
        // }
        $quizCount = [];
        foreach ($query->get() as $section) {
            $quiz = DB::table('quizzes')->where('section_id', $section->section_id)->get();
            array_push($quizCount, $quiz->count());
        }
        if ($query->count() != count($quizCount)) {
            $moduleCheck = false;

        }

        if ($query->where('completed_sections.quiz_completed', '<>', 1)->count()) {
            return false;
        }

        return true;
    }

    public function moduleImages()
    {
        if ($this->introduction_video) {
            // dd($this->images);
            $images = explode(';', $this->introduction_video);
            $imageLinks = [];

            foreach ($images as $imageName) {
                $imageLinks[] = asset('images/teacher_modules/module'.$this->id.'/'.$imageName);
            }

            return $imageLinks;

        }

        return false;
    }

    public static function getModuleCompleted($moduleId)
    {

        $userAttempt = self::join('sections', 'modules.id', '=', 'sections.module_id')->where('modules.id', $moduleId)
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->join('completed_sections', 'sections.id', '=', 'completed_sections.section_id')->where('user_id', '=', Auth::ID())
            ->where('quiz_completed', 1)
            ->select('completed_sections.id')
            ->count();

        $allQuizCount = self::join('sections', 'modules.id', '=', 'sections.module_id')->where('modules.id', $moduleId)
            ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
            ->count();

        return $data = [
            'userAttempt' => $userAttempt,
            'allQuizCorrect' => $allQuizCount,
        ];

    }

    // for final score
    public static function TotalQuestionsAttempts()
    {
        return UserQuizAttempt::where('user_id', Auth::ID())
            ->join('user_quiz_answers', 'user_quiz_attempts.id', '=', 'user_quiz_answers.user_quiz_attempt_id')
            ->join('quiz_question_options', 'user_quiz_answers.quiz_question_option_id', '=', 'quiz_question_options.id')
            ->count();
    }

    public static function TotalCorrectAnswer()
    {
        return UserQuizAttempt::where('user_id', Auth::ID())
            ->join('user_quiz_answers', 'user_quiz_attempts.id', '=', 'user_quiz_answers.user_quiz_attempt_id')
            ->join('quiz_question_options', 'user_quiz_answers.quiz_question_option_id', '=', 'quiz_question_options.id')
            ->where('is_correct', '=', 1)
            ->count();
    }

    public static function cirtificateComplateDate()
    {

        try {
            $ids = Module::where('module_type', 'student')
                ->join('sections', 'modules.id', '=', 'sections.module_id')->where('is_section', 0)->orWhere('module_id', 1)
                ->pluck('module_id');
            $moduleComplateDate = CompletedSection::where('user_id', '=', Auth::ID())->where('is_read', 1)->where('quiz_completed', 1)->whereIn('section_id', $ids)
                ->orderBy('created_at', 'DESC')
                ->first();
            $sectionComplateDate = Section::where('is_section', '=', 1)
                ->join('completed_sections', 'sections.id', '=', 'completed_sections.section_id')->where('user_id', '=', Auth::ID())
                ->where('is_read', '=', 1)
                ->where('quiz_completed', '=', 1)
                ->orderBy('completed_sections.created_at', 'DESC')
                ->first();

            if ($moduleComplateDate->updated_at->gt($sectionComplateDate->updated_at)) {
                return $moduleComplateDate->updated_at->format('d-M-Y');
            }

            return $sectionComplateDate->updated_at->format('d-M-Y');
        } catch (\Throwable $th) {
            return \Carbon\Carbon::now()->format('d-M-Y');
        }

    }
}
