<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.modules.index');

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
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        //
    }
}

// if(request()->ajax()) {

//             $modules = module::all();

//             return datatables()->of($modules)

//             ->editColumn('title', function($module) {
//                 $showUrl = route('module.show',['module' => $module->id]);

//                 return "<a href='$showUrl' class='text-light'>$module->title</a>";
//             })
//             // ->editColumn('created_at', function($module) {
//             //     // return Timezone::convertToLocal($module->created_at, 'd M Y');
//             //     return $module->created_at->diffForHumans();
//             // })
//             ->addColumn('action',function($module) {
//                 $showUrl = route('module.show',['module' => $module->id]);
//                 $deleteUrl = route('module.destroy',['module' => $module->id]);
//                 $editUrl = route('modules.edit',['module' => $module->id]);

//                 // $restoreUrl = route('modules.restore',['module' => $module->id]);
//                 // <button
//                 //             class='btn-icon btn btn-secondary restore-module rounded-circle btn-sm'
//                 //             data-title='Restore module'
//                 //             data-url='$restoreUrl' >
//                 //             <i data-feather='refresh-cw'></i></button>
//                 //         </button>

//                 if($module->trashed()) {
//                     return "
//                         <button
//                             class='btn-icon btn btn-danger delete-module rounded-circle btn-sm'
//                             data-title='Delete module'
//                             data-url='$deleteUrl' >
//                                 <i data-feather='trash'></i>
//                         </button>";
//                 } else {
//                     return "
//                         <button
//                             class='btn-icon btn btn-primary rounded-circle btn-sm get-content'
//                             data-toggle='modal'
//                             data-target='#dynamic-modal'
//                             data-url='$editUrl' data-title='update module'
//                             type='button'
//                             aria-haspopup='true'
//                             aria-expanded='false'>
//                                 <i data-feather='edit'></i>
//                         </button>

//                         <button
//                             class='btn-icon btn btn-danger delete-module rounded-circle btn-sm'
//                             data-title='Delete module'
//                             data-url='$deleteUrl' >
//                                 <i data-feather='trash'></i>
//                         </button>";
//                 }

//             })->addColumn('introVideo', function($module){
//                 $videoLink = $module->introduction_video;
//                 return '
//                     <div>
//                         <button class="btn btn-sm btn-primary watch-intro" data-url='.$videoLink.'data-bs-toggle="modal" id="change-photo" data-bs-target="#open_video" >Click to watch</button>
//                     </div>';
//             })
//             // ->rawColumns(['action', 'status', 'created_by','title'])
//             ->rawColumns(['action'])
//             ->make(true);

//         } else {
//             $pageConfigs = ['pageHeader' => true];
//             $breadcrumbs = [
//                     ['link' => "/", 'name' => "Dashboard"],
//                     ['name' => "modules"]
//                 ];
//             return view('content.modules.index', compact('breadcrumbs'));
//         }
