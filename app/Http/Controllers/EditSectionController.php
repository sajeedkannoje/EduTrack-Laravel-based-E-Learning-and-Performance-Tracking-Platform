<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Quiz;
use App\Models\Section;
use Illuminate\Http\Request;

class EditSectionController extends Controller
{
    //
    public function index($id)
    {

        // dd($id);
        $section = Section::select('id', 'content', 'title')->find($id);

        return view('edit-section')->with([
            'section' => $section,
        ]);

    }

    public function module($id)
    {

        // dd($id);
        $module = Module::select('id', 'features', 'title')->find($id);

        return view('edit-module')->with([
            'module' => $module,
        ]);

    }

    public function quiz($id)
    {

        // dd($id);
        $quiz = Quiz::select('id', 'description', 'title')->find($id);

        return view('edit-quiz')->with([
            'quiz' => $quiz,
        ]);

    }

    public function store(Request $request)
    {

        $section = new Section;
        Section::find($request->id)
            ->update([
                'content' => $request->content,
            ]);

        return redirect('editSection/'.$request->id)->with([
            'success' => 'Save changes successfully',
        ]);

    }

    public function storeModule(Request $request)
    {

        // $section = new Section;

        Module::find($request->id)
            ->update([
                'features' => $request->content,
            ]);

        return redirect('editModule/'.$request->id)->with([
            'success' => 'Save changes successfully',
        ]);
    }

    public function storeQuiz(Request $request)
    {

        // $section = new Section;

        Quiz::find($request->id)
            ->update([
                'description' => $request->content,
            ]);

        return redirect('editQuiz/'.$request->id)->with([
            'success' => 'Save changes successfully',
        ]);
    }
}
