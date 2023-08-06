<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('page-style'); ?>



<style>
    .course-competion-call {
        right: 4%;
        max-width: 15%;
    }

    .quiz-score-card {
        width: fit-content;
        font-weight: bold;
    }

    .course-completion-info {
        right: 0 !important;
    }

    .module-exam-card {
        width: fit-content;
    }

    .content-body {
        margin-right: 92px;
        margin-left: 12px;
    }

    .card-body,
    .card-header {
        padding: 0;
    }

    .font-ml,
    .card-body h3 {
        font-size: max(2.6em, 17px);
        line-height: 0.755;
    }

    .font-m {
        font-size: max(2.4em, 15px);
        line-height: 0.855;
    }

    .font-s,
    .card-body p,
    .quiz-based-card>div {
        font-size: max(2em, 13px);
        line-height: 2;
    }

    .card-body,
    .card-header,
    .quiz-based-card {
        font-size: 0.5208333333333334vw;
    }

    .head {
        margin-bottom: 30px;
    }

    .card-body h3 {
        margin-bottom: 25px;
    }

    .quiz-based-card {
        margin-top: 40px;
    }

    .quiz-based-card>div {
        margin-bottom: 20px;
    }

    .card-header span {
        background-color: #ccc;
    }

    .title {
        margin-left: 40px;
        margin-top: 20px;
    }

    .header-navbar .navbar-container ul.navbar-nav li.dropdown-user .dropdown-menu {
        margin-top: 50px;
    }

    .student-module-head-name {
        font-size: max(2em, 13px);
        line-height: 2;
    }

    .student-module-head-title {
        font-size: max(2em, 13px);
        line-height: 2;
    }

    .head-module-content {
        margin-bottom: 20px;
    }

    .dashboard-card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 40px 0px;
        padding: 0px;
        margin-bottom: 0px;
    }

    .dashboard-module-card {
        width: 100%;
        margin: 0px !important;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        box-shadow: 0px 0px 12px -4px #000000 !important;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }

    .dashboard-module-card .card-body .font-s {
        color: black !important;
    }

    .percentage-txt {
        margin-top: 0px !important;
    }

    /* .module-exam-card {
            width:50%;
            margin:  0 auto;
        }
        .module-exam-score-container {
            width:20%;
        }
        /* .module-exam-score {
            position:relative;
        }
        .module-exam-score p {
            position: absolute;
            top: 48%;
            left:23%;
            font-size:20px;
            color:#feef00;
        } */

    /* .module-exam-card .mark-body {
            display:flex !important;
            justify-content: space-between !important;
            flex-direction:column;
        }
        .module-exam-card .mark-body .mt-1 {
            margin-top:0px !important;
        } */

    .circle_percent {
        font-size: 170px;
        width: 1em;
        height: 1em;
        position: relative;
        background: #eee;
        border-radius: 50%;
        overflow: hidden;
        display: inline-block;
        margin: 20px;
    }

    .circle_inner {
        position: absolute;
        left: 0;
        top: 0;
        width: 1em;
        height: 1em;
        clip: rect(0 1em 1em .5em);
    }

    .round_per {
        position: absolute;
        left: 0;
        top: 0;
        width: 1em;
        height: 1em;
        background: #228c22;
        clip: rect(0 1em 1em .5em);
        transform: rotate(180deg);
        transition: 1.05s;
    }

    .percent_more .circle_inner {
        clip: rect(0 .5em 1em 0em);
    }

    .percent_more:after {
        position: absolute;
        left: .5em;
        top: 0em;
        right: 0;
        bottom: 0;
        background: #228b22;
        content: '';
    }

    .circle_inbox {
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
        background: #fff;
        z-index: 3;
        border-radius: 50%;
    }

    .percent_text {
        position: absolute;
        font-size: 36px;
        left: 50%;
        top: 40%;
        transform: translate(-50%, -50%);
        z-index: 3;
    }

    .module-exam-score-container {
        width: 15%;
        margin-left: 80px;
    }

    .module-exam-card .mark-body {
        flex-direction: column;
    }

    .correct {
        position: absolute;
        top: 60%;
        font-size: 26px;
    }

    .info-icon-fixed {
        z-index: 40;
    }

    .first-dashboard-module {
        box-shadow: 0px 0px 12px -4px #000000 !important;
    }

    .module-exam-card {
        display: flex !important;
        align-items: center;
        justify-content: space-between;
    }

    .percent_text {
        font-size: 24px;
    }

    .correct {
        font-size: 20px;
    }

    .circle_percent {
        font-size: 130px;
    }

    .dashboard-emoji {
        font-size: 6rem;
    }

    .dashboard-percentage-text-container {
        display: flex;
        align-items: center;
        width: 100%;
        box-shadow: 0px 0px 12px -4px #000000 !important;
        padding: 40px;
        border-radius: 20px;
        margin-bottom: 10px;
    }

    .dashboard-percentage-img {
        width: 300px;
        height: 300px;
    }

    .dashboard-percentage-img img {
        width: 100%;
        height: 100%;
    }

    .dashboard-precentage-text {
        width: 50%;
    }

    .dashboard-precentage-text p {
        font-size: 24px;
        line-height: 34px;
    }

    .green-span {
        color: #228c22 !important;
        margin-left: 10px;
    }

    .dashboard-precentage-text p {
        font-size: 30px;
        line-height: 40px;
    }

    .dashboard-precentage-text {
        width: 70%;
        text-align: center;
    }

    .final-exams-content {
        width: 100%;
        margin: 40px 40px 0px 40px !important;
        padding-left: 0px;
        padding-right: 0px;
    }

    .final-exams-content .title {
        margin-left: 0px;
    }

    .head-module-content {
        margin-bottom: 0px;
    }

    .head-section-content {
        margin-bottom: 10px;
    }

    .student-module-head h3 {
        margin-bottom: 15px;
    }

    .dashboard-top-container-content p {
        font-size: 18px;
        line-height: 26px;
    }

    .dashboard-link {
        transition: 0.3s ease-in-out;
    }

    .dashboard-link:hover {
        color: #1d1e1b;
    }

    .dashboard-hidden-text {
        font-size: max(1.2em, 13px);
        line-height: 1.7;
    }

    .module-title-change {
        font-size: max(2em, 13px);
        line-height: 2;
        margin-bottom: 30px;
    }

    .final-result-heading {
        margin-top: 40px;
    }

    .medal-img img {
        width: 50px;
    }

    .dashboard-final-result {
        font-weight: bold;
        color: forestgreen;
    }


    /* media queries */
    @media  only screen and (max-width:1680px) {
        .dashboard-top-container-content p {
            font-size: 16px;
            line-height: 24px;
        }
    }

    @media  only screen and (max-width:1200px) {
        .dashboard-card-container {
            margin: 40px 20px;
            margin-bottom: 0px;
        }

        .info-icon-fixed {
            top: 78px;
        }

        .final-exams-content {
            margin-left: 0px !important;
        }

        .final-exams-content .title {
            margin-top: 30px;
        }
    }

    @media  only screen and (max-width:1040px) {
        .module-exam-card {
            flex-direction: column;
        }

        .module-exam-score-container {
            width: 30%;
            margin-left: 0px;
        }

        .module-exam-card {
            text-align: center;
            align-items: center;
        }

        .module-exam-score .col-sm-3.col-md-2 {
            width: 100% !important;
        }
    }

    @media  only screen and (max-width:880px) {
        .dashboard-module-card {
            width: 100%;
        }

        .dashboard-module-card {
            margin-bottom: 30px !important;
        }
    }

    @media  only screen and (max-width:767px) {
        .dashboard-card-container {
            margin: 40px 0px;
        }

        .module-exam-score-container {
            width: 40%;
        }

        .correct {
            font-size: 20px;
        }

        .percent_text {
            font-size: 22px;
        }

        .dashboard-precentage-text p {
            font-size: 24px;
            line-height: 30px;
        }
    }

    @media  only screen and (max-width:600px) {
        .dashboard-percentage-text-container {
            margin-top: 30px;
        }

        .final-exams-content .title {
            margin-top: 20px;
        }
    }

    @media  only screen and (max-width:680px) {
        .progress {
            width: 120px;
            height: 120px;
        }

        .progress-value-score-txt {
            font-size: 20px;
        }

        .progress .progress-value span {
            font-size: 14px;
        }
    }

    @media  only screen and (max-width:600px) {
        .dashboard-card-container {
            margin: 20px 0px;
        }
    }

    @media  only screen and (max-width:580px) {
        .percent_text {
            font-size: 22px;
        }

        .circle_percent {
            font-size: 140px;
        }

        .dashboard-percentage-img {
            display: none;
        }

        .dashboard-precentage-text {
            width: 100%;
            text-align: center;
        }

        .dashboard-precentage-text p {
            font-size: 20px;
            line-height: 28px;
        }

        .final-exams-content .title {
            margin-top: 15px;
        }
    }


    @media  only screen and (max-width:500px) {
        .circle_percent {
            margin: 0px;
            margin-top: 20px;
        }
    }

    @media  only screen and (max-width:480px) {
        .info-icon-fixed {
            padding: 3px 9px;
        }
    }

    @media  only screen and (max-width:440px) {
        .dashboard-module-card {
            flex-direction: column;
        }

        .module-exam-card,
        .module-exam-score-container {
            width: 100%;
        }

        .module-exam-card {
            text-align: center;
        }

        .module-exam-score-container {
            margin-top: 30px;
        }

        .circle_percent {
            display: block;
            margin: 0 auto;
        }

        .module-exam-card .mark-body {
            width: 100%;
        }
    }

    @media  only screen and (max-width:400px) {
        .circle_percent {
            font-size: 120px;
        }

        .percent_text {
            font-size: 18px;
        }

        .module-exam-score-container {
            margin-top: 20px;
        }
    }

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php if(!Auth::user()->referred_by): ?>
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading text-center"><i class="fi fi-br-bell-ring mx-1"></i> Referral code is not set!</h4>
    <p class="m-1 text-center">If you would like scores to also be sent to your teacher or workgroup supervisor you must enter a referral code that you can get from your teacher or supervisor (which they will get when they create an account).
        If you score are just for your own private information you don’t need a referral code.</p>
    <p class="m-1 text-center"><a href="<?php echo e(url('/account')); ?>" class="alert-link">Click here to update your Referral Code. </a> </p>
</div>
<?php endif; ?>
<?php if($allModuleCompleted): ?>

<button class="btn btn-sm btn-outline-primary info-icon-fixed position-fixed course-completion-info"><i data-feather="info" class="font-medium-3 text-primary"></i></button>

<div class="course-competion-call bg-gradient-primary text-white zindex-4 position-fixed d-none fw-bold text-primary p-1 rounded-3">
    you have completed All the modules now you can download your
    <a href="<?php echo e(route('my-certificate')); ?>" class="text-white text-decoration-underline">certificate</a>
</div>
<?php endif; ?>

<div>
    <div class="row dashboard-row">
        <?php if(!$studentScore['cheerInfo']): ?>
        <div class="card col-md-12 first-dashboard-module">
            <p class="mb-0 dashboard-hidden-text">The Dashboard is where you will find your scorecard.
                Since you haven’t completed any quizzes or exams yet you don’t have a scorecard. Click on "<a class="dashboard-link" href="<?php echo e(route("my-courses")); ?>">My Courses</a>" to get started on the coursework.</p>
            
        </div>

        <?php endif; ?>

        <!-- image section -->
        
        <!-- <div class="dashboard-percentage-text-container">
            <div class="dashboard-percentage-img">
              <img src="<?php echo e(asset("images/dashboard-img/BGSCORE.png")); ?>" alt="">
            </div>
            <div class="dashboard-precentage-text">
              <p>“You have completed 40 percent of the material."<br><span class="green-span">You’re on your way!</span></p>
            </div>
          </div> -->
        <?php if($studentScore['cheerInfo']): ?>
        <div class="row mt-2 mb-2 final-exams-content">
            <div class="dashboard-percentage-text-container">
                <div class="dashboard-percentage-img">
                    <img src="<?php echo e(asset("images/dashboard-img/BGSCORE.png")); ?>" alt="">
                </div>
                <div class="dashboard-precentage-text">
                    <p>“<?php echo e($studentScore['cheerInfo'][0]); ?>"<br>

                        <span class="green-span"><?php echo e($studentScore['cheerInfo'][1]); ?></span></p>
                </div>
            </div>
            <?php
            $introQuizQuestion = 0; // Introduction mini quiz question count
            $introQuizAnswer = 0; // introduction mini quiz highest number
            ?>
            <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class='dashboard-card-container'>
                <div class="text-black fw-bold module-title-change">
                    <?php echo e($module->title); ?>

                </div>
                <?php
                $getAllQuestionCountOfModule = $module->getAllQuestionCountOfModule(); // FINAL EXAM QUESTION ATTEMPT
                $singleModuleFinalExamAnswer = $module->singleModuleFinalExamAnswer(); // FINAL EXAM CORRECT ANSWER
                $allQuestionsAttemptsByStudent = $module->allQuestionsAttemptsByStudent(); // Mini Quiz Question attempt by student
                $allCorrectQuestionsByStudent=$module->allCorrectQuestionsByStudent(); // Mini Quiz ANSWER CORRECT BY student

                ?>
                <div class=" card me-1 dashboard-module-card" style="background-image:url()">

                    <div class="card-body module-exam-card text-black fw-bold d-grid">

                        <div class="mark-body text-black fw-bold mt-1 font-s d-flex justify-content-around">
                            <?php if($module->sequence != 1): ?>
                            <div>
                                Final Exam Question Attempted: <?php echo e($getAllQuestionCountOfModule); ?>

                            </div>
                            <div>
                                Final Exam Questions Correct: <?php echo e($singleModuleFinalExamAnswer); ?>

                            </div>
                            <?php else: ?>
                            

                            <div>
                                Final Exam Question Attempted: 0
                            </div>
                            <div>
                                Final Exam Questions Correct: 0
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="mark-body text-black fw-bold mt-1 font-s d-flex justify-content-around">

                            <div>
                                Total Questions Answered in Module: <?php echo e($allQuestionsAttemptsByStudent + $getAllQuestionCountOfModule); ?>

                            </div>
                            <div>
                                Total Questions Correct in Module: <?php echo e($allCorrectQuestionsByStudent + $singleModuleFinalExamAnswer); ?>

                            </div>

                        </div>
                        <div class="module-exam-score-container">
                            <div class="module-exam-score">
                                <div class="col-sm-3 col-md-2">

                                    <div class="conainer">
                                        <div class="circle_percent" data-percent="<?php echo e(Helper::roundScorePercentage($allCorrectQuestionsByStudent + $singleModuleFinalExamAnswer ,$allQuestionsAttemptsByStudent + $getAllQuestionCountOfModule )); ?>">
                                            <div class="circle_inner">
                                                <div class="round_per"></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php
            $cardAdded = false;
            ?>
            

            <?php if((!empty($studentScore) && $studentScore['studentAttemptsQuestion'] > 0) || !empty($introQuizAnswer) ): ?>
            <div class="title col-md-12 fw-bold h3 p-0 text-black font-s final-result-heading">
                <span class="dashboard-final-result">Final Results</span>
            </div>
            <div class='dashboard-card-container'>
                <?php
                $studentCorrectAnswer= $studentScore['studentCorrectAnswer'] ? $studentScore['studentCorrectAnswer'] : 0;
                $studentAttemptsQuestion= $studentScore['studentAttemptsQuestion'] ? $studentScore['studentAttemptsQuestion'] : 0;
                // $studentCorrectMiniQuiz = $studentScore['studentCorrectMiniQuiz'] ? $studentScore['studentCorrectMiniQuiz'] : 0;
                ?>
                <div class=" card me-1 dashboard-module-card" style="background-image:url()">
                    <div class="card-body module-exam-card text-black fw-bold d-grid">

                        <div class="mark-body text-black fw-bold mt-1 font-s d-flex justify-content-around">

                            <div class="mt-1">

                                Total Questions Answered in Module : <?php echo e($studentAttemptsQuestion); ?>

                            </div>
                            <div>

                                Total Questions Correct in Module : <?php echo e($studentCorrectAnswer); ?>

                            </div>
                        </div>

                        <div class="mark-body text-black fw-bold mt-1 font-s d-flex justify-content-around">
                            <div class="mt-1">
                                <?php echo e(Helper::roundScorePercentage($studentCorrectAnswer  , $studentAttemptsQuestion )); ?>% Correct
                            </div>
                            <div class="">
                                <?php echo Helper::userMedal($studentCorrectAnswer  , $studentAttemptsQuestion  ); ?>

                            </div>
                        </div>

                        <div class="mark-body text-black fw-bold mt-1 font-s d-flex justify-content-around">

                            <div class="mt-1 medal-img">
                                <?php
                                $total = $studentAttemptsQuestion ;
                                $score = $studentCorrectAnswer;
                                $percentage = round(($score/$total)*100);
                                $img = '';
                                if($percentage< 70){ $img="images/bronze-medal.png" ; }else if($percentage < 85){ $img="images/silver-medal.png" ; }else{ $img="images/gold-medal.png" ; } ?> <img src="<?php echo e(asset($img)); ?>" />
                            </div>

                        </div>

                        <div class="module-exam-score-container">
                            <div class="module-exam-score">
                                <div class="col-sm-3 col-md-2">

                                    <div class="conainer">
                                        <div class="circle_percent" data-percent="<?php echo e(Helper::roundScorePercentage($studentCorrectAnswer , $studentAttemptsQuestion)); ?>">
                                            <div class="circle_inner">
                                                <div class="round_per"></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        </div>
        <?php endif; ?>

        
        

        
        </div>


        </div>
        </div>


        <?php $__env->stopSection(); ?>


        <?php $__env->startSection('page-script'); ?>
        <script>
            $(".circle_percent").each(function() {
                var $this = $(this)
                    , $dataV = $this.data("percent")
                    , $dataDeg = $dataV * 3.6
                    , $round = $this.find(".round_per");
                // var final = $this.data("final");
                $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
                $this.append('<div class="circle_inbox"><span class="percent_text"></span> <span class="percent_text correct"></span> </div>');
                $this.prop('Counter', 0).animate({
                    Counter: $dataV
                }, {
                    duration: 2000
                    , easing: 'swing'
                    , step: function(now) {
                        $this.find(".percent_text").text(Math.ceil(now) + "%");
                        //     if($this.data("final")){
                        //         if( now <   70){
                        //           $this.find('.correct').text('Bronze Medal').addClass('final-medal')
                        //         }
                        //         else if(now  < 86 ){
                        //           $this.find('.correct').text('Silver Medal').addClass('final-medal')
                        //         }
                        //         else if(now > 85  ){
                        //           $this.find('.correct').text('Gold Medal!').addClass('final-medal')
                        //         }
                        //         else{
                        //           $this.find('.correct').text('Correct').addClass('final-medal')
                        //         }
                        //   }else{
                        $this.find('.correct').text('Correct');

                        // }
                    }
                });
                if ($dataV >= 51) {
                    $round.css("transform", "rotate(" + 360 + "deg)");
                    setTimeout(function() {
                        $this.addClass("percent_more");
                    }, 1000);
                    setTimeout(function() {
                        $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
                    }, 1000);
                }
            });
            $('#module_name').change(() => {

                moduleId = $('#module_name').val();
                $.ajax({
                    url: "<?php echo e(route('quizzesScoreForModule')); ?>"
                    , type: "POST"
                    , data: {
                        'moduleId': moduleId
                    }
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    , }
                    , beforeSend: () => {
                        submitLoader(document.getElementById('module_name'));
                    }
                    , success: (data) => {

                        // $('#quiz-score-table tbody').html(data)
                        $('#quiz-based-card').html(data.html)
                        submitReset(document.getElementById('module_name'));
                    }
                    , error: (err) => {
                        setAlert({
                            code: "error"
                            , title: "Oops!"
                            , message: "Something went wrong Please try again!"
                        , });
                        submitReset(document.getElementById('module_name'));
                    }
                })

            })


            $('.course-completion-info').click((e) => {
                e.preventDefault();
                $('.course-competion-call').toggleClass('d-none');
            })

        </script>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/zeroguess.us/public_html/n17/FFN/app/resources/views/content/dashboard/student.blade.php ENDPATH**/ ?>