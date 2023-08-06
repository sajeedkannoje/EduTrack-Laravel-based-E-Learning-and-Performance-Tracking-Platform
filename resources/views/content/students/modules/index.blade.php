@extends('layouts/contentLayoutMaster')

{{-- @section('title', 'Modules') --}}

@section('vendor-style')
@endsection
@section('page-style')
    <style>
        /* .card-video{
            width: 30%;
        } */
        .video-sync{
            width: 100%;
        }
    </style>
    
@endsection

@section('content')
{{-- {{ dd($modules) }} --}}
    <div class="m-0">
        {{-- <div class="card">
            
            @foreach ($modules as $module)
                <div class="p-2">
                    <div class="card-header border-bottom-2">
                        <h4><span class="text-primary">Module: </span>{{ $module->title }}</h4>
                    </div>
                    <div class="row border-bottom-2">
                        <div class="col-md-6">
                            <div class="card-body mt-2">
                                @if ($module->introduction_video)
                                    <div class="card-video">
                                        <video class="video-sync" controls type="video/mp4" src="{{ $module->introVideo() }}"></video>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            @if(!empty($module->sections[0]))
                                <div class="alert alert-primary text-center">Module Sections</div>
                                @foreach ($module->sections as $section)
                                    
                                    <div class="p-1 get-section-detail">
                                        <a 
                                        href="{{ route('this-section',['id' => $section->id]) }}" 
                                        class="text-info">{{ $section->title }}</a>
                                    </div>    
                                @endforeach
                                <a href="{{ route('module-section',['id' => $module->id]) }}" class="btn btn-lg btn-primary">Go To Module</a>
                                {{-- <button class="btn btn-lg btn-primary view-section-content" data-module="{{ $module->id }}">View Sections</button> --}}
                                </div>
                            @else
                                <div class="alert alert-info">
                                    {{ __("No section is available for this module we are creating amazing curriculum for this module.") }}
                                </div>
                            @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
     --}}
@endsection

@section('vendor-script')
    {{-- vendor files --}}
    
@endsection

@section('page-script')
    <script>
        // $('get-section-detail').click(()=>{
        //     $.ajax({

        
        //         // type: "get",
        //     })
        // })
    </script>
@endsection
