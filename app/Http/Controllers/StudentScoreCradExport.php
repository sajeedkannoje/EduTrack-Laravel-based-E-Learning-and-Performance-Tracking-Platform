<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Helpers\Helper;
use App\Models\Module;
use App\Models\Section;
use App\Models\User;
use App\Models\UserQuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class StudentScoreCradExport extends Controller
{
    public function exportFile(Request $request)
    {
        $studentId = User::where('referred_by', '=', Auth::ID())
            ->select('id')
            ->orderBy('created_at')
            ->get();
        // dd( $studentId);
        $count = 1;
        $studentRecord = [];
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
                '#' => $count ? $count : '0',
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'percentage' => round($studentPercentage).'%',
                'completedModule' => $complateModule ? $complateModule : '0',
            ];

            $studentRecord[] = $studentInfoArray;
            $count++;
        }
        if ($request->type == 'csv') {
            return Excel::download(new UsersExport($studentRecord), 'StudentsPerformance.csv');
        }
    }

    public function studentpdf()
    {

        $studentId = User::where('referred_by', '=', Auth::ID())
            ->select('id')
            ->orderBy('created_at')
            ->get();
        // dd( $studentId);
        $count = 1;
        $studentRecord = [];
        foreach ($studentId as $student) {

            $studentScore = Section::Where('is_section', 0)  // final exam correct answer.
                ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
                ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')
                ->where('user_id', '=', $student->id)
                ->join('user_quiz_answers', 'user_quiz_attempts.id', '=', 'user_quiz_answers.user_quiz_attempt_id')
                ->join('quiz_question_options', 'user_quiz_answers.quiz_question_option_id', '=', 'quiz_question_options.id')
                ->where('is_correct', '=', 1)
                ->count();

            $complateModule = Section::where('is_section', 0)    // completed modules
                ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
                ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')
                ->where('user_id', '=', $student->id)->count();

            $miniQuizCorrect = Module::where('has_final_exam', '=', 1)
                ->join('sections', 'modules.id', '=', 'sections.module_id')->where('is_section', 1)
                ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
                ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')
                ->where('user_id', '=', $student->id)
                ->whereNotNull('mini_quiz_all_correct')
                ->sum('mini_quiz_all_correct');

            $introMudulePoints = $this->introductionModuleHightePoints($student->id);
            $introMuduleQuestions = $introMudulePoints['question'];
            $introMuduleAnswer = $introMudulePoints['answer'];
            if ($introMudulePoints['question'] != 0) {
                $complateModule += 1;
            }
            // $finalExamQuizCount = Module::finalExamQuizCount();

            $finalExamQuizCount = Section::Where('is_section', 0)  // final exam correct answer.
                ->join('quizzes', 'sections.id', '=', 'quizzes.section_id')
                ->join('user_quiz_attempts', 'quizzes.id', '=', 'user_quiz_attempts.quiz_id')
                ->where('user_id', '=', $student->id)
                ->join('user_quiz_answers', 'user_quiz_attempts.id', '=', 'user_quiz_answers.user_quiz_attempt_id')
                ->join('quiz_question_options', 'user_quiz_answers.quiz_question_option_id', '=', 'quiz_question_options.id')
                // ->where('is_correct', '=',1)
                ->count();
            $questionCount = $finalExamQuizCount + $miniQuizCorrect + $introMuduleQuestions;
            $scoreCount = $studentScore + $miniQuizCorrect + $introMuduleAnswer;
            $studentPercentage = Helper::roundScorePercentage($scoreCount, $questionCount);
            $user = User::where('id', $student->id)->first(['name', 'first_name', 'last_name']);
            // $studentInfoArray = [
            //     '#'=>$count,
            //     'completedModule' => $complateModule,
            //     'percentage' => $studentPercentage,
            //     'first_name' => $user->name,
            //     'last_name' => $user->last_name,
            //     'email' => $user->email
            // ];
            $studentInfoArray = [
                '#' => $count ? $count : '0',
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'percentage' => round($studentPercentage).'%',
                'completedModule' => $complateModule ? $complateModule : '0',
            ];

            $studentRecord[] = $studentInfoArray;
            $count++;
        }

        return view('content.teachers.export.stdent-pdf', compact('studentRecord'));
    }

    public function downloadPdf()
    {
        $studentId = User::where('referred_by', '=', Auth::ID())
            ->select('id')
            ->orderBy('created_at')
            ->get();
        $count = 1;
        $studentRecord = [];
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
                '#' => $count ? $count : '0',
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'percentage' => round($studentPercentage).'%',
                'completedModule' => $complateModule ? $complateModule : '0',
            ];

            $studentRecord[] = $studentInfoArray;
            $count++;
        }
        $pdf = PDF::loadView('content.teachers.export.stdent-pdf', compact('studentRecord'));

        return $pdf->download('StudentsPerformance.pdf');
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
