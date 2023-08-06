@extends('layouts/contentLayoutMaster')

{{-- @section('title', 'Modules') --}}

@section('vendor-style')
@endsection
@section('page-style')
    {{-- @include('course-sidebar.sidebarStyle') --}}
    <style>
        .font-l{
            font-size: 3.6em !important;
            font-family: "SF Pro Display Light";
            line-height: 20px;
            font-weight: 300;
        }
        .font-m{
            font-size: 2.6em !important;
            font-family: "SF Pro Display Bold";
        }
        .font-s{
            font-size: 2em !important;
        }
        .heading div {
            margin-bottom: 40px;
        }
        .video-sync{
            width: 100%;
        }
        video{
            border-radius:20px;
            width:82.4em ;
            height: 46.3em;
        }
        .video-container{
            font-size: 0.5208333333333334vw;
        }
        .card-image img {
            width: 450px;
            border-radius: 25px;
            min-height: 462px;
        }
        .description-container{
            width:82.4em;
            font-size: 0.5208333333333334vw;
        }
        .content-txt{
            width:565px;
            background-color: #f8f8f8;
            border-radius: 20px;
            height: max-content;
            padding: 40px;
            margin-left: 40px !important;
            font-size: 0.5208333333333334vw;
        }
        .heading {
            font-size: 0.5208333333333334vw;
        }
        .title{
            margin-bottom:35px;
        }
        .cards-wrapper{
            justify-content: space-between;
        }
        .card-wrapper{
            border-radius:20px;
            background-color: #f8f8f8;
            justify-content: center;
            padding:40px;
        }
        .card-body{
            padding:40px 40px 0 40px !important;
        }
        .d-title{
            margin:15px 0;
            margin-top:40px;
            margin-bottom:20px;
        }
        .content-txt svg{
            margin-top:6.5px;
            margin-right:10px;
            min-width:20px;
        }
        .content-pts{
            font-size: 0.5208333333333334vw !important;
        }
        .btn-container{
            margin-top:40px;
        }
        .take-quiz{
            padding:25px 70px;
        }
        .section-controls a {
            font-size: 0.5208333333333334vw;
            padding: 2.45em 6.7em;
        }
        .btn-txt {
            font-size: max(2em,13px);
        }

        @media(max-width:1625px){
            .content-txt{
                padding:30px;
                margin-left:30px !important;
            }
            .card-wrapper{
                padding:30px;
            }
        }
        @media(max-width:1525px){
            .content-txt{
                padding:20px;
                margin-left:20px !important;
            }
            .card-wrapper{
                padding:20px;
            }
            .title{
                margin-bottom:25px;
            }
        }
        @media(max-width:1200px){
            .card-body{
                padding:1.5rem !important;
            }
            .content-txt svg {
                margin-top: 0;
            }
            .title {
                margin-bottom: 25px;
                margin-bottom: 10px;
            }
            .d-title {
                margin-top: 20px;
                margin-bottom: 10px;
            }
            .description-container,
            .content-txt,
            .heading,
            .content-pts{
                font-size:5px !important;
            }
            .video-container{
                font-size:7px !important;
            }
            .content-txt svg {
                font-size: 2.5em !important;
                height: 1em !important;
                margin-top: 0.25em !important;
            }
            .description-container,
            .heading,
            .content-pts{
                font-size:6.5px !important;
            }
            .title{
                font-size:17px !important;
            }
        }

        @media(max-width:1050px){
            .video-container{
                font-size:6px !important;
            }
        }

        @media(max-width:900px){
            .video-container{
                font-size:5px !important;
            }
            .description-container {
                width: 65.4em;
            }
        }

        @media(max-width:768px){
            .cards-wrapper{
                display:grid !important;
                justify-content: center;
                row-gap:30px;
            }
            .content-txt {
                margin-left: 0px !important;
                width:94em;
            }
            .description-container{
                width:inherit;
            }
            .video-container,
            .description-container,
            .content-txt,
            .heading,
            .content-pts{
                font-size:7px !important;
            }
        }
        @media(max-width:652px){
            .description-container,
            .heading,
            .content-pts{
                font-size:6.5px !important;
            }
            .title{
                font-size:17px !important;
            }
            .video-container,
            .content-txt{
                font-size:6px !important;
            }
        }
        @media(max-width:567px){
            .video-container,
            .content-txt{
                font-size:5px !important;
            }
        }
        @media(max-width:480px){
            .video-container,
            .content-txt{
                font-size:4px !important;
            }
        }
        @media(max-width:360px){
            .video-container,
            .content-txt,{
                font-size:3px !important;
            }
        }
    </style>

@endsection

@section('content')
    <section class="main-content">
        {{-- {{ dd($modules) }} --}}
        {{-- <x-side-bar-nav :modules="$modules" :module="$module" :section="$nextSection" :quiz="$nextSection->quiz" class="active-nav" page="module" /> --}}
        {{-- active-cont and  --}}
        <div class="my-container active-cont">

            <div class="">

                {{-- <a class="btn mb-75" id="menu-btn">
                    <i data-feather='menu'></i>
                </a> --}}

                <div>
                    {{-- <div class="p-25 d-none" id="small-menu-finder"> --}}

                        {{-- DiscIcon --}}
                        <div class="d-none" id="small-menu-toggler">
                            <button id="small-open-menu-opener" class="btn btn-sm btn-primary">
                                <i data-feather='disc' class="font-medium-3 text-white p-25"></i>
                            </button>

                        </div>


                    {{-- </div> --}}
                    @if (request()->session()->has('completeThisModuleFirst'))
                        <div class="alert alert-warning font-medium-2 fw-bold text-center p-2">
                            {{ request()->session()->get('completeThisModuleFirst', 'You need to complete this module first.') }}
                            {{ request()->session()->forget('completeThisModuleFirst') }}
                        </div>
                    @endif

                    <div class="card-body">

                        <div class="heading row ">

                                <div class="col-md-6 text-black float-left font-l">
                                @section('title',  $module->title)
                                    {{ $module->title }}
                                </div>

                                <!-- <div class="col-md-6 p-2 h4">
                                    <span class="text-dark float-sm-left float-lg-end float-md-end">
                                        Total Sections: {{ $contentCount }}.
                                        @if ($module->moduleCompletedByThisUser())
                                            <div class="alert alert-success font-small-1">
                                                {{ __("This Module is Completed ") }}
                                            </div>
                                        @endif
                                    </span>
                                </div>         -->
                        </div>
                        <div class="cards-wrapper d-flex">

                            <div class="card-wrapper d-grid">

                                <div class="video-container card-image d-flex">

                                    @if ($module->introduction_video)

                                    <video
                                        src="{{asset( $module->introVideo())}}"
                                        controls></video>

                                    @else

                                        {{ __("Sorry No Introduction Video is available you can pick a section an start learning") }}

                                    @endif

                                </div>
                                <div class="description-wrapper row">

                                    <div class="description-container col-md-12 ml-2 col-lg-6">

                                        <div class="d-title h3 text-primary font-m fw-bolder">Module Description</div>

                                        <div class="font-medium-2 line-height-condensed text-black font-s">{!! $module->description !!}</div>

                                    </div>

                                </div>
                            </div>


                            <div class="content-txt mx-auto">

                                <div class="title font-medium-4 text-primary fw-bolder font-m ">This Module Will Include:</div>

                                @foreach ($module->features as $feat)

                                    @if ($feat)

                                        <div class="content-pts text-dark fw-bold font-medium-2 mb-1 d-flex">

                                            <i data-feather='arrow-right-circle' class="font-medium-3 text-black"></i>
                                            {{-- CheckCircleIcon --}}
                                            <span class="font-s ml-3">{{ $feat }}</span>

                                        </div>
                                    @endif
                                {{-- Raleway, sans-serif --}}
                                @endforeach

                            </div>

                        </div>
                        <div class="d-flex justify-content-start">
                            <div class="btn-container section-controls" id="section-controls">
                                <a class="btn btn-primary btn-lg take-quiz next-inro"  href="{{route('this-section',$module->nextSectionForModule()->id)}}"><span class="btn-txt">Next</span></a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection

@section('vendor-script')
    {{-- vendor files --}}

@endsection

@section('page-script')


@endsection
