@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')
@section('vendor-style')
@endsection
@section('page-style')

    {{-- @include('course-sidebar.sidebarStyle') --}}

    <style media="screen">
      .teacher-homelink-span {
        cursor: pointer;
        transition: 0.6s ease;
      }
      .teacher-homelink-span:hover {
        color: black;
      }
      .teacher-module-list {
    display: flex;
    width: 100%;
    justify-content: space-between;
}
.teacher-module-list p {
margin-bottom: 0px !important;
width: 6%;
}
.teacher-homelink-span {
    cursor: pointer;
    transition: 0.6s ease;
    display: flex;
    text-align: left;
    width: 94%;
}
      .referral-code-container {
        width: 25%;
      }
      .teacher-refferal-container {
        padding-left: 20px;
      }
      .referral-code-container i {
    position: absolute;
    right: -25%;
    top: -7px;
    background-color: transparent;
    box-shadow: none;
}
.tooltip-label {
    position: relative;
}
      .referral-code-container i:active {
        box-shadow: none;
      }
      .referral-code-container i img {
        width:55px;
      }
      .referral-code-container .referral-call, .referral-code-container .referral-call:hover, .referral-code-container .referral-call:active, .referral-code-container .referral-call:hover {
        background-image: none;
        background-color: white !important;
        color: forestgreen !important;
        border: 1px solid forestgreen !important;
      }
      .referral-code-container .referral-call {
    position: absolute;
    left: 125%;
    top: -10px;
    width: 100%;
}
.referral-code-container .referral-call::before {
  width: 0px;
height: 0px;
content: '';
border-top: 10px solid transparent;
border-bottom: 10px solid transparent;
border-right: 10px solid forestgreen;
position: absolute;
top: 12px;
left: -10px;
}
.referral-code-container .referral-call::after {
  width: 0px;
height: 0px;
content: '';
border-top: 9px solid transparent;
border-bottom: 9px solid transparent;
border-right: 9px solid white;
position: absolute;
top: 13px;
left: -9px;
}
      #copyMaker.hiddenput {
        cursor: pointer;
      }
      label.fw-bold.text-black.mb-1 {
    font-size: 18px;
    color: #228b22 !important;
    font-weight: bold !important;
}
.teacher-homelink-span a {
  color: forestgreen !important;
  transition: 0.3s ease;
}
.teacher-homelink-span a:hover {
  color: #3c3c3c !important;
}
::placeholder {
  color: #6e6b7b;
}
.referral-code-container {
  width:auto;
  text-align: center;
}
.referral-code-copy {
  width:30%;
  margin: 0 auto;
  margin-top: 20px;
}
.teacher-module-list {
  margin-bottom:8px;
}
.copy-to-clipboard, .teacher-module-list p, .teacher-homelink-span {
  font-size: 16px;
  line-height: initial;
}

.referral-heading {
  box-shadow: grey 0px 7px 5px -6px;
  padding: 0.71rem 1rem;
}

.referral-text {
  padding: 20px;
}

.referral-code-container.card {
  padding: 0px;
  border-radius: 0.358rem;
}


      @media only screen and (max-width:1780px){
        .teacher-module-list p {
        width: 7%;
      }
      }
      @media only screen and (max-width:1600px){
        .teacher-module-list p {
        width: 100px;
      }
      }
      @media only screen and (max-width:1540px){
        label.fw-bold.text-black.mb-1 {
    font-size: 16px;
    color: #228b22 !important;
    font-weight: bold !important;
}
      }
      @media only screen and (max-width:1500px){
        .referral-code-copy {
          width:30%;
        }
      }
      @media only screen and (max-width:1380px){
        .referral-code-copy  {
          width:33%;
        }
      }
      @media only screen and (max-width:880px){
        .referral-code-copy  {
          width:50%;
        }
      }
      @media only screen and (max-width:767.98px){
        .referral-code-copy  {
          width:70%;
        }
        .card-image {
          margin-bottom: 30px;
        }
        .teacher-refferal-container {
          padding-left: 0px;
        }
      }

      @media only screen and (max-width:600px){
        .copy-to-clipboard, .teacher-module-list p, .teacher-homelink-span  {
          font-size: 14px;
        }
        .teacher-module-list {
          margin-bottom:0px;
        }
      }

      @media only screen and (max-width:580px){
        .referral-code-container .referral-call {
  position: absolute;
  left: 25%;
  top: 35px;
  width: 100%;
}
.referral-code-container .referral-call::before {
  border-left: 10px solid transparent;
    border-bottom: 10px solid forestgreen;
    border-right: 10px solid transparent;
    border-top: 0px;
    top: -10px;
    left: 83%;
}
.referral-code-container .referral-call::after {
    width: 0px;
    height: 0px;
    content: '';
    border-top: 0px;
    border-left: 9px solid transparent;
    border-bottom: 9px solid white;
    border-right: 9px solid transparent;
    position: absolute;
    top: -9px;
    left: 83.3%;
}
      }

      @media only screen and (max-width:480px){
        .teacher-homelink-span a{
          line-height:18px;
        }
         .teacher-module-heading {
           line-height:26px;
         }
      }
    </style>


@endsection

@section('content')
    <div class="main-content">
      <div class="referral-code-container card">

          <label for="student-email" class="fw-bold text-black mb-1 tooltip-label referral-heading">Referral code
            <!-- <img src="{{asset('images/teachers/homepage/new-icon.png')}}" class="btn btn-sm info-icon-fixed referral-tool-tip">

            <div class="referral-call bg-gradient-primary text-white zindex-4 d-none fw-bold text-primary p-1 rounded-3">
                If you would like scores to also be sent to your teacher or workgroup supervisor you must enter a referral code that you can get from your teacher or supervisor (which they will get when they create an account).
            </div> -->
          </label>
          <input class="referral-code-copy hiddenput form-control text-black fw-bold text-center font-medium-4" value="{{Auth::user()->referral_code}}" onclick="copyText(this);"  readonly id="copyMaker"/>
            <p class="copy-to-clipboard referral-text"> <span style="color:forestgreen; font-weight: bold">Note:</span> Provide your students with the referral code given above if you would like to keep track of their scores. Click the box given above to copy the code to your clipboard.  Once you’ve copied the code to your clipboard one of the links on the navigation bar to your left will be “Manage Scorecard.”  This is where you are able to see a spreadsheet and monitor your student’s progress (as long as they key in the referral code when they create an account).</p>
      </div>
        <div class="card">
            @if (Auth::user()->hasRole('teacher'))
            <div class="form-group row teacher-refferal-container">

                {{-- <div class="col-4">
                    <button class="btn btn-primary mt-2" id="aText" onclick="copyText(this);" >Copy Referral code</button>
                </div> --}}
            </div>
            @endif
            <div class="card-header h3 text-black text-center">
              <h3>Teacher and Workgroup Supervisor Resources</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card-image text-center">
                            <img src="{{ asset('images/teachers/homepage/homePicture1.jpg') }}" alt="Welcome Image" class="rounded ml-4" width="100%">
                        </div>
                    </div>

                    <div class="col-md-8 font-medium-2 fw-bold text-black homepage-text">
                        <p>
                            Every module, except for the introduction, has a lesson plan with objectives, learning activities, and extension exercises. There are even activities for days when you don’t have access to the internet or computers.  You can access these materials by clicking on the links below or visiting “Teacher Modules” in the black navigation bar to your left.
                        </p>
                        <p>
                            The website is designed as a fully integrated program—divided into ten modules--with an introductory video, text information separated into small bites, 8-10 short quizzes (checks for understanding, really), and a final exam in each of nine learning modules.  (The tenth module, the Introduction, is a little different.)  There are links and additional resources suggested, for each topic.
                        <p>
                            No one knows your classes and students like you do. Naturally, there will be a number of factors unique to your situation and class. Feel free to make adjustments and use the materials in whatever way is useful to you.
                        </p>
                        <p>
                            You can arrange access to your student’s progress by utilizing the referral code above. In addition, you can set up a spreadsheet with all of your student’s scores.
                        </p>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 text-black fw-bold h3 mt-2 text-decoration-underline teacher-module-heading">
                        Instructor Lesson Plan and Activities for each Module
                    </div>
                    <div class="col-md-12">
                        <ul class="list-unstyled text-black font-medium-1 fw-bold">
                            <li class="mt-25 teacher-module-list">
                                <p>Module 1 :</p>
                                <span class="mx-50 teacher-homelink-span">
                                    Introduction
                                </span>
                            {{-- (No plan or activities.  Students or employees can go through as a class or individually.  This will not be a link.) --}}
                            </li>

                            @foreach ($modules as $module)
                                    <li class="mt-25 teacher-module-list">
                                        <p>Module {{ ($loop->index+2) }}:</p>
                                        <span class="mx-50 teacher-homelink-span">
                                            <a href="{{ route('teacher-single-module',$module->id) }}" class="text-info">
                                                {{ Str::ucfirst($module->title) }}
                                            </a>
                                        </span>
                                    </li>
                            @endforeach


                            {{-- <li class="mt-25">
                                Module 2:
                                <span class="mx-50 teacher-homelink-span">
                                    Personal Finance Lesson Plan and Activities
                                </span>
                            </li>

                            <li class="mt-25">
                                Module 3:
                                <span class="mx-50 teacher-homelink-span">
                                    Investing Lesson Plan and Activities [Link]
                                </span>
                            </li>

                            <li class="mt-25">
                                Module 4:
                                <span class="mx-50 teacher-homelink-span">
                                    Lifestyle Lesson Plan and Activities [Link]
                                </span>
                            </li>
                            <li class="mt-25">
                                Module 5:
                                <span class="mx-50 teacher-homelink-span">
                                    Eat to Live: Food and Nutritional Literacy [Link]
                                </span>
                            </li>


                            <li class="mt-25">
                                Module 6:
                                <span class="mx-50 teacher-homelink-span">
                                    Live to Eat: Cooking and Our Food System [Link]
                                </span>
                            </li>

                            <li class="mt-25">
                                Module 7:
                                <span class="mx-50 teacher-homelink-span">
                                    Taking Care of Yourself [Link]
                                </span>

                            </li>

                            <li class="mt-25">
                                Module 8:
                                <span class="mx-50 teacher-homelink-span">
                                    	Fitness and Exercise [Link]
                                </span>
                            </li>

                            <li class="mt-25">
                                Module 9:
                                <span class="mx-50 teacher-homelink-span">
                                    	Responsibilities and Realities [Link]
                                </span>
                            </li>

                            <li class="mt-25">
                                Module 10:
                                <span class="mx-50 teacher-homelink-span">
                                    	Insurance [Link]
                                </span>
                            </li>

                            <li class="mt-25">
                                Creating a
                                <span class="mx-50 teacher-homelink-span">
                                    Spreadsheet of Student Scores [Link]
                                </span>
                            </li> --}}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('vendor-script')
    {{-- vendor files --}}

@endsection

@section('page-script')

    {{-- @include('course-sidebar.sidebarScript') --}}

    <script>
function copyText(text) {
        // Identify hidden field
        var hiddenPut = $('#copyMaker');
        // // Selects hidden field's contents
        hiddenPut.select();
        // // Copy
        document.execCommand('copy');
        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": false,
                            "positionClass": "toast-top-center",
                            "preventDuplicates": true,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            };
        toastr["success"]( "Referral code copied!","Copied")

        }
        $('.referral-tool-tip').click((e) => {
            e.preventDefault();
            $('.referral-call').toggleClass('d-none');
      })
    </script>
@endsection
