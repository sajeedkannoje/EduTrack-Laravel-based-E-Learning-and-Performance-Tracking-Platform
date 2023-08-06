@extends('layouts/contentLayoutMaster')

@section('title', 'My Certificate')

@section('vendor-style')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Imperial+Script&display=swap" rel="stylesheet">
@endsection
@section('page-style')

    {{-- @include('course-sidebar.sidebarStyle') --}}
    <style>
        .card-image {
            width: 100%;
        }
        .card-header,.card-body{
            font-size:0.5208333333333334vw
        }
        .font-ml,.card-header .font-ml{
            font-size:max(2.6em,17px);
            line-height:0.755;
        }
        .font-s{
            font-size:max(2em,15px);
            line-height:2;
        }
        .card-body .btn {
            padding: 1.4em 0.45em;
            font-size: max(1.8em,12px);
        }
        .card-body > div > div {
            margin-left: 40px;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .card .card-header .card-title {
            color: forestgreen !important;
        }


        .circle_percent {font-size:170px; width:1em; height:1em; position: relative; background: #eee; border-radius:50%; overflow:hidden; display:inline-block; margin:20px;}
        .circle_inner {position: absolute; left: 0; top: 0; width: 1em; height: 1em; clip:rect(0 1em 1em .5em);}
        .round_per {position: absolute; left: 0; top: 0; width: 1em; height: 1em; background: #228c22; clip:rect(0 1em 1em .5em); transform:rotate(180deg); transition:1.05s;}
        .percent_more .circle_inner {clip:rect(0 .5em 1em 0em);}
        .percent_more:after {position: absolute; left: .5em; top:0em; right: 0; bottom: 0; background: #228b22; content:'';}
        .circle_inbox {position: absolute; top: 10px; left: 10px; right: 10px; bottom: 10px; background: #fff; z-index:3; border-radius: 50%;}
        .percent_text {position: absolute; font-size: 36px; left: 50%; top: 40%; transform: translate(-50%,-50%); z-index: 3;}

        .certificate-course-info-container {
          display: flex;
          justify-content:space-between;
          align-items: flex-start;
          flex-direction: column;
          border-left: 1px solid black;
          padding-left: 40px;
          width: 50%;
        }
        .module-exam-score-container {
          width:30%;
        }
        .correct {
          position: absolute;
          top: 60%;
          font-size: 26px;
        }
        .certificate-color {
            padding-top:5px;
            padding-bottom:5px;
            margin-left:5px !important;
        }
         .certificate-card-header p {
            font-size: 36px;
            line-height: 20px;
            color: #000000;
         }
         .module-exam-score {
           margin-left:-20px !important;
           margin-bottom: 17px !important;
           margin-top: -15px !important;
         }
         #downloadScoreCard {
           padding: 23px 28px;
          font-size: 20px;
          line-height: 20px;
          display: flex;
          justify-content: center;
         }
         .card-body-info-text .certificate-card-body {
           margin-left: 0px !important;
           margin-top: 0px;
           margin-bottom:0px;
           display: flex;
          justify-content: space-between;
          margin-bottom: 14px;
         }
         .certificate-mg-bottom {
           margin-bottom:0px !important;
         }
         .certificate-card-body {
           font-size: 20px !important;
           line-height: 40px;
         }
         .certificate-card-body span {
           color: #228b22 !important;
           width: 30%;
         }
         .card-body-info-text {
           border-top: 1px solid black;
           width: 48%;
           padding-top: 40px;
           margin-top: 138px;
         }
         .completion-image-container {
           max-width: 434px;
           width:100%;
         }
         .card-title.text-black.certificate-card-header {
           margin-bottom:0px !important;
         }
         .certificate-card-header p {
           margin-bottom:0px !important;
           margin-left: 24px;
         }
         .courses-completion-content {
           padding-left:0px;
         }
         .couses-badge-section {
           position: relative;
           padding-left: 30px;
         }
         .couses-badge-section i::before {
           position: absolute;
           top: 22%;
           left: 0px;
         }

        @media only screen and (max-width:1480px){
            .circle_percent {
                font-size: 160px;
            }
            .percent_text {
                font-size:30px;
            }
            .correct{
                font-size:20px;
            }
            .module-exam-score-container {
                width: 36%;
            }
        }

        @media only screen and (max-width:1460px){
          .completion-image-container {
            max-width:none;
            width: 50%;
          }
          .card-body-info-text {
            width:100%;
          }
        }

        @media only screen and (max-width:880px){
            .certificate-course-info-container .card-body-info-text div {
                margin-left:0px;
            }
            .module-exam-score-container {
                width: 40%;
            }
            .certificate-card-header p {
                  font-size: 30px;
                  line-height: 30px;
            }
            .card-completion .row {
              flex-direction: column;
            }
            .completion-image-container {
                max-width: none;
                width: 50%;
                margin: 0 auto;
            }
            .certificate-course-info-container{
              width:100%;
              border-left: 1px solid transparent;
              border-top: 1px solid black;
              margin-top: 40px;
            }
            .module-exam-score-container {
                width: 22%;
                margin: 0 auto;
            }
            .certificate-course-info-container .d-fle {
              margin: 0 auto;
            }
          .module-exam-score {
            margin-left: 40 !important;
          }
          .card-body-info-text{
            margin-top: 40px;
          }
        }

        @media only screen and (max-width:767.98px){
            .card-body-info-text {
                padding-left:20px;
            }
            .completion-image-container {
                height:440px;
            }
            .certificate-card-header {
                margin-bottom:10px !important;
            }
            .certificate-course-info-container .card-body-info-text div {
                margin-top:10px;
                margin-bottom:10px;
            }
            .module-exam-score-container {
              margin-top:30px;
            }
            .cer-body {
  padding-top: 30px !important;
}
        }

        @media only screen and (max-width:680px){
          .completion-image-container {
              max-width: none;
              width: 100%;
              margin: 0 auto;
          }
          .module-exam-score-container {
            width: 30%;
            margin: 0 auto;
            margin-top:30px;
          }
          .certificate-card-header p {
          font-size: 24px;
          line-height: 30px;
        }
        #downloadScoreCard {
          padding: 18px 20px;
          font-size:18px;
        }
        .certificate-card-body {
          font-size: 18px !important;
          line-height: 30px;
        }
        .card-completion {
          margin-top:0px;
        }
        .completion-image-container {
          height: auto;
          padding: 0px !important;
        }
        }

        @media only screen and (max-width:620px){
            .certificate-course-info-container{
                flex-direction:column;
                text-align: center;
                justify-content:center;
            }
            .module-exam-score-container {
                width: 100%;
            }
            .module-exam-score {
                margin: 0px !important;
            }
            .module-exam-score-content {
                width: 100% !important;;
            }
        }

        @media only screen and (max-width:480px) {
          .certificate-card-header p {
            margin-left:0px;
          }
          .card-completion {
            margin-top:0px !important;
          }
        }

        @media only screen and (max-width:380px){
            .certificate-course-info-container .card-body-info-text div {
                font-size:14px !important;
            }
            .certificate-color {
                padding: 5px !important;
            }
            .circle_percent {
                font-size: 140px;
            }
            .percent_text {
                font-size: 24px;
            }
            .correct {
                font-size: 16px;
                top:57%;
            }
        }

.cer-body {
  width: 50%;
    border-left: 1px solid black;
    padding-left: 40px;
}
.courses-flex-container {
  margin-left: 0px !important;
}

@media only screen and (max-width:880px){
  .cer-body {
    width:100%;
    border-left:1px solid transparent;
    border-top: 1px solid black;
    margin-top: 30px;
  }
}
@media only screen and (max-width:1200px){
  .certificate-card-header {
    line-height: 20px;
  }
}

    </style>


@endsection

@section('content')

            @if ($notCompletedAll)
            <div class="card">
                <div class="row">
                <div class="card-header">
                    <div class="card-title text-black font-ml certificate-card-header">
                      Please complete all the modules to Download the Certificate.
                    </div>
                </div>
                <div class="col-md-3 text-center p-2 completion-image-container">
                    <img src="{{ asset('images/certificates/certificateSuccess.jpg') }}" class="card-image rounded m-auto" alt="Power" height="100%">
                </div>
                <div class="card-body cer-body">
                    <div class="text-black fw-bold font-s">
                        Once you have completed all of the modules (including quizzes and exams) you have the option of printing out a Certificate of Completion that verifies that you have completed the Follow For Now: Life Skills 101 coursework.  <br>
                        The certificate will include your name, your percentage of the total points score, and your grade.  <br>
                        <span> Please complete all Mini-quizzes and Final exams to download the certificate.</span> 

                        <div class="row m-4 my-1 courses-flex-container">
                            <div class="courses-completion-content">
                              <div class="col-md-12 couses-badge-section">
                                <i class="fi fi-br-badge gold-medal" style="color: gold"></i>   {{ __("85-100%      Gold Medal") }}
                              </div>

                              <div class="col-md-12 couses-badge-section">
                                <i class="fi fi-br-badge silver-medal" style="color: silver"></i>  {{ __("70-84%       Silver Medal ") }}
                              </div>

                              <div class="col-md-12 couses-badge-section">
                                <i class="fi fi-br-badge bronze-medal" style="color: brown"></i> {{ __("0-69%	    Bronze Medal") }}
                              </div>
                            </div>


                        </div>

                    </div>

                    <a class="text-info btn btn-primary" href="{{ route('this-section', $section->id) }}"> Start Where You Left</a>

                </div>
              </div>
            </div>
            @else
            <div class="card-header ">
                <div class="card-title text-black certificate-card-header">
                  <p> Congratulation on the completion of the Course</p>
                </div>
            </div>
            <div class="card card-completion">
                <div class="row">
                <div class="col-md-3 text-center p-2 completion-image-container">
                    <img src="{{asset('images/certificato.png')}}" class="card-image rounded m-auto" alt="Power" height="100%">
                </div>
                <div class="card-body col-md-9 certificate-course-info-container">
                  <!-- courses circle -->
              
                  <div class="module-exam-score-container">
                      <div class="module-exam-score">
                          <div class="col-sm-3 col-md-2 module-exam-score-content">

                              <div class="conainer">
                                  <div class="circle_percent" data-percent="{{ Helper::roundScorePercentage($finalScore['userScore'],$finalScore['totalScore'])}}">
                                      <div class="circle_inner">
                                          <div class="round_per"></div>
                                      </div>
                                  </div>

                              </div>

                              </div>
                      </div>
                  </div>
                  <!-- download certificate -->
                  <div class="d-fle">
                   <button class="btn btn-primary waves-effect waves-float waves-light btn-hover-primary" onclick="downloadScoreCard()" id="downloadScoreCard">Download Certificate <i class="fi fi-br-arrow-small-down download-arrow"></i></button>
                  </div>
                  <!-- score -->
                    <div class="card-body-info-text">
                      <div class="text-black font-medium-2 fw-bold certificate-card-body">
                          Your Score : <span class="certificate-span">{{ $finalScore['userScore'] ? $finalScore['userScore'] : "N/A" }}</span>
                      </div>

                      <div class="text-black font-medium-2 fw-bold certificate-card-body">
                          Total Score : <span class="certificate-span">{{ $finalScore['totalScore'] ? $finalScore['totalScore'] : "N/A" }}</span>
                      </div>

                      <div class="text-black font-medium-2 fw-bold certificate-card-body">
                          Your Percentage : <span class="certificate-span">{{Helper::roundScorePercentage($finalScore['userScore'], $finalScore['totalScore'] ) }}%</span>

                      </div>

                      <div class="text-black font-medium-2 fw-bold certificate-card-body certificate-mg-bottom">
                          Your Recognition : <span class="certificate-span">{!! Helper::userMedal($finalScore['userScore'], $finalScore['totalScore'] ) !!}</span>
                      </div>
                    </div>
                </div>
              </div>
          </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
                <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>

                <script>
                    window.jsPDF = window.jspdf.jsPDF;
                    const doc = new jsPDF('landscape');
                    var pageHeight = doc.internal.pageSize.height || doc.internal.pageSize.getHeight();
                    var pageWidth = doc.internal.pageSize.width || doc.internal.pageSize.getWidth();
                    doc.setFontSize(50);
                    doc.addImage("{{asset('images/certificate.png')}}", "png",0,0,300,0);
                      // add custom font to file
                    doc.addFont("{{asset('custom-font/ImperialScript-Regular.ttf')}}", "ImperialScript", "normal");
                    doc.setFont("ImperialScript","normal");
                    doc.text("{{ucfirst(Auth::user()->first_name) .' '. ucfirst(Auth::user()->last_name)}}", pageWidth / 2, pageHeight  - 100,'center', {align: 'center'});
                    doc.setFontSize(18);
                    doc.setFont("times", "normal");
                    doc.text("{{  $completionDate  }}",85,160);
                            function downloadScoreCard(){
                                    doc.save("Certificate.pdf");
                                };

                </script>


              
            @endif



@endsection

@section('vendor-script')
    {{-- vendor files --}}

@endsection

@section('page-script')
<script>
  //course completion circle
  $(".circle_percent").each(function() {
var $this = $(this),
$dataV = $this.data("percent"),
$dataDeg = $dataV * 3.6,
$round = $this.find(".round_per");
$round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
$this.append('<div class="circle_inbox"><span class="percent_text"></span> <span class="percent_text correct"></span> </div>');
$this.prop('Counter', 0).animate({Counter: $dataV},
{
duration: 2000,
easing: 'swing',
step: function (now) {
        $this.find(".percent_text").text(Math.ceil(now)+"%");
        $this.find('.correct').text('Correct');
    }
});
if($dataV >= 51){
$round.css("transform", "rotate(" + 360 + "deg)");
setTimeout(function(){
  $this.addClass("percent_more");
},1000);
setTimeout(function(){
  $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
},1000);
}
});
</script>
    {{-- @include('course-sidebar.sidebarScript') --}}

@endsection
