@extends('layouts/contentLayoutMaster')


@section('vendor-style')
@endsection
@section('page-style')

    {{-- @include('course-sidebar.sidebarStyle') --}}
    <style>
      .card-image img {
        width:33%;
        border-radius: 25px;
      }
      .card-header {
        font-size: 24px;
        line-height: 30px;
        line-height: 0.755;
        color: forestgreen;
        font-family: "SF Pro Display Bold" !important;
        font-weight: bold;
      }
      .teacher-card-header {
        padding: 0px !important;
      }
      .teacher-card-image {
        justify-content: flex-start;
        margin-top: 35px;
        font-size: 0.5208333333333334vw;
        flex-wrap: wrap;
        column-gap: 20px;
      }
      .teacher-card-body {
        padding: 0px !important;
      }
      .teacher-dashboard-module-container {
        margin: 20px auto;
      }
      .teacher-dashboard-module-container h3 {
        margin-bottom: 10px;
        margin-top: 35px;
        border-top: 1px solid #cbcbcb;
        padding-top: 30px;
        font-size: 24px;
        line-height: 0.855;
        color: forestgreen;
        font-weight: bold;
      }
      .teacher-dashboard-module-container p {
        font-size: 16px;
        line-height: 24px;
      }
      .link-list {
        padding-left: 0px;
      }
      .link-list-item {
        list-style: none;
      }
      li.link-list-item {
        font-size: 16px;
        line-height: 24px;
      }
      .link-list li {
        line-height: 24px;
      }
      .teacher-prev-btn {
        color: white;
        background-color: grey;
      }
      .teacher-prev-btn:hover {
        color: white;
        box-shadow: 0 8px 25px -8px grey;
      }
      .teacher-table {
        width: 100%;
      }
      .teacher-table, .teacher-table td , .teacher-table th {
        border: 1px solid black;
      }
      .teacher-table th {
        color: forestgreen;
      }
      .teacher-table th, .teacher-table td {
        padding: 1em;
        font-size: 16px;
        line-height: 24px;
      }
      .table-container {
        overflow: auto;
      }
      .teacher-module-footer a {
        line-height: 20px;
      }
      .new-list li {
        list-style: none;
        padding-left: 14px;
        position: relative;
      }
      .new-list li::after {
    content: "";
    position: absolute;
    width: 6px;
    height: 6px;
    border-radius: 100%;
    background-color: forestgreen;
    left: 0px;
    top: 8px;
}
      .card-header.teacher-card-header {
        line-height: initial;
      }
      .teacher-dashboard-module-container {
        font-size: 0.5208333333333334vw;
      }
      .teacher-dashboard-module-container h3 {
        font-size: max(2.4em, 18px);
        line-height: 0.855;
      }
      .teacher-card-header {
          font-size: 0.5208333333333334vw;
      }
      .teacher-card-header p {
        font-size: max(2.6em, 20px);
    line-height: 0.755;
      }

      @media only screen and (max-width:1500px){
        .teacher-dashboard-module-container p {
          font-size: 14px;
          line-height: 20px;
          }
          .teacher-dashboard-module-container .link-list li, .teacher-dashboard-module-container .new-green-text, .teacher-table th, .teacher-table td {
            font-size: 14px;
            line-height: 20px;
          }
      }


      @media only screen and (max-width:1200px){
            .card-header, .teacher-dashboard-module-container h3 {
              font-size:20px;
              line-height: 24px;
            }
            .teacher-card-header p {
              font-size: 20px;
              line-height: initial;
            }
            .teacher-dashboard-module-container p {
              font-size: 14px !important;
            }
      }

      @media only screen and (max-width:990px) {
        .teacher-dashboard-module-container h3 {
          margin-bottom: 15px;
          margin-top: 20px;
          padding-top: 20px;
        }
        .teacher-module-footer {
          padding-left: 0px;
          padding-right: 0px;
        }
      }

      @media only screen and (max-width:800px){
        .teacher-module-footer {
    display: flex;
    flex-direction: column-reverse;
    column-gap: 20px;
    row-gap: 10px;
}
.teacher-module-footer a {
    width: 60%;
    margin: 0 auto;
}
      }

      @media only screen and (max-width:767.98px) {
        .card-header, .teacher-dashboard-module-container h3 {
          font-size:18px;
        }
        .card-image img {
          width: 100%;
          max-height: none !important;
          margin-bottom: 20px;
          height: auto;
        }
        .teacher-dashboard-module-container p {
          font-size: 14px !important;
          line-height: 20px;
        }
        li.link-list-item {
          font-size:14px;
          line-height:20px;
        }
        .card {
          margin: 0px;
        }
        .teacher-table th, .teacher-table td {
        padding: 0.7em;
        font-size: 14px;
        line-height: 20px;
      }
      }

      @media only screen and (max-width:680px){
        .teacher-module-footer {
          display: flex;
          flex-direction: column-reverse;
          column-gap: 20px;
          row-gap: 10px;
        }
        .teacher-module-footer a {
          width:60%;
          margin: 0 auto;
        }
      }

      @media only screen and (max-width:480px){
        .card {
          padding: 20px !Important;
        }
        .teacher-dashboard-module-container h3, .teacher-dashboard-module-container {
          margin-top: 0px;
        }
        .teacher-module-footer a  {
          width:100%;
        }
      }



    </style>


@endsection

@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header teacher-card-header">
              @section('title', $module->features[0])
              <p class="mb-0">Module {{$module->sequence}} : {{ $module->features[0] }}</p>
            </div>

            @if ($module->moduleImages())
                <div class="card-image d-flex teacher-card-image ">
                    @foreach ($module->moduleImages() as $image)
                    <img src="{{ $image }}">
                    @endforeach
                </div>
                @endif
            <div class="card-body text-black fw-bold mt-1 teacher-card-body">
                {!! $module->description !!}
            </div>
            @php
                $previous = $module->previousModule();
                $next = $module->nextModule();
            @endphp
            @if ($previous || $next)
                <div class="card-footer teacher-module-footer">

                    @if ($previous)
                        <a href="{{ route('teacher-single-module', $previous->id) }}" class="btn waves-classic  teacher-prev-btn">
                            {{ Str::ucfirst($previous->title) }}
                        </a>
                    @endif

                    @if ($next)
                        <a href="{{ route('teacher-single-module', $next->id) }}" class="btn btn-primary float-end">
                            {{ Str::ucfirst($next->title) }}
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>


@endsection

@section('vendor-script')
    {{-- vendor files --}}

@endsection

@section('page-script')

    {{-- @include('course-sidebar.sidebarScript') --}}

    <script>

    </script>
@endsection
