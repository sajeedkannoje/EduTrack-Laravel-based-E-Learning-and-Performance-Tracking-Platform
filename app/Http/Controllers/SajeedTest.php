<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionOption;
use App\Models\Section;
use Illuminate\Http\Request;

class SajeedTest extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('index_add_modules');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->module_type);
        $moduleId = 10;
        $sectionId = '';
        $quizId = '';
        $quizQuestionId = '';
        $quizQuestionOptions = '';
        $module = new Module;
        $module->title = $request->module_title;
        $module->introduction_video = $request->module_intro_video;
        $module->module_type = $request->module_type;
        $module->description = $request->module_description;
        $module->features = $request->module_features;
        $module->sequence = $request->module_sequence;
        $module->has_final_exam = 2;
        $module->save();
        // $moduleId = $module->id;

        // foreach ($request->section_title as $value) {
        //     $section = new Section();
        //     $section->module_id = $moduleId;
        //     $section->title = $value;
        //     $section->content = $request->section_content[0];
        //     $section->sequence =$request->section_sequence[0];
        //     $section->images =$request->section_image[0];
        //     $section->save();
        //     $sectionId= $section->id;
        //     foreach ($request->quiz_title as $value) {
        //         $quiz = new Quiz();
        //         $quiz->title = $value;
        //         $quiz->section_id = $sectionId;
        //         $quiz->description = $request->quiz_description[0];
        //         $quiz->save();
        //         $quizId = $quiz->id;
        //         $quizcount = 0;
        //         $quizQuestionIndex = 0;
        //         foreach ($request->quiz_question as  $value) {
        //            $quizQuestion = new QuizQuestion();
        //            $quizQuestion->quiz_id = $quizId;
        //            $quizQuestion->question=  $value;
        //             $quizQuestion->sequence= $request->quiz_sequence[$quizcount];
        //             $quizQuestion->save();
        //             $quizQuestionId= $quizQuestion->id;
        //             $quizcount ++;
        //             $quizQuestionCount = 0;
        //             foreach ($request->quiz_question_option as  $value) {
        //                 if($quizQuestionCount !=4){
        //                     $quizQuestionOptions = new QuizQuestionOption();
        //                     $quizQuestionOptions->quiz_question_id =$quizQuestionId;
        //                     $quizQuestionOptions->option_value =$request->quiz_question_option[$quizQuestionIndex];
        //                     $quizQuestionOptions->is_correct =$request->is_option_correct[$quizQuestionIndex];
        //                     $quizQuestionOptions->save();
        //                     $quizQuestionIndex ++;
        //                     $quizQuestionCount++;
        //                 }else{
        //                     break;
        //                 }
        //             }
        //         }
        //     }

        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
