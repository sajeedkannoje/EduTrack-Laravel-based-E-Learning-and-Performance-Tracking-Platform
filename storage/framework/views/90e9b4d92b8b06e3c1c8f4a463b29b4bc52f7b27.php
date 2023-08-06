



<?php $__env->startSection('vendor-style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>

<link rel="stylesheet" href="<?php echo e(asset(mix('css/base/plugins/forms/form-validation.css'))); ?>">
<style>
    .circle_percent {
        font-size: 170px;
        width: 1em;
        height: 1em;
        position: relative;
        background: #eee;
        border-radius: 50%;
        overflow: hidden;
        display: inline-block;
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

    .circle_inbox {
        margin-top: 0px !important;
    }

    .final-score p {
        font-size: 16px;
    }

    /* .single-quiz-content{ */

    .font-l {
        font-size: 3.6em;
        line-height: 0.555;
    }

    .font-ml {
        font-size: 2.6em;
        line-height: 0.755;
        color: forestgreen;
    }

    .font-m {
        font-size: 2.4em;
        line-height: 1;
        color: forestgreen;
        margin-bottom: 0.855px;
        font-weight: bold;
    }

    .font-s {
        font-size: 2em;
        line-height: 2;
    }

    h3 {
        font-size: 1.2em;
        color: forestgreen;
    }

    .quiz-layout {
        font-size: 20px;
        line-height: 1.5;
        color: #1d1b1e;
        font-family: 'S FPro Display';
    }

    .card-body,
    .card-header {
        padding: 0;
    }

    .card.text-left {
        width: 52.5%;
        margin-right: 0;
    }

    .card {
        width: 40%;
        font-size: 0.520833333333334vw;
    }

    .card-footer {
        padding-left: 0;
        padding-bottom: 0;
        margin-left: 40px;
        font-size: 0.520833333333334vw;
    }

    .page-head {
        margin-left: 40px;
        margin-top: 40px;
        font-size: 0.520833333333334vw;
    }

    .card-header {
        font-family: "SF Pro Display Bold" !important;
        margin-bottom: 30px;
    }

    .text-left .card-header {
        margin-bottom: 0px;
    }

    .card-body h3 {
        border-top: 1px solid #ccc;
        padding-top: 20px;
        margin: 20px auto;
        font-weight: bold;
        margin-bottom: 0;
    }

    .start-quiz {
        font-size: 0.5208333333333334vw;
        padding: 15px 45px;
        border-radius: 8px;
    }

    .start-quiz-1 {
        font-size: 0.5208333333333334vw;
        padding: 15px 45px;
        border-radius: 8px;
    }

    .g-text {
        color: forestgreen;
        font-weight: bolder;
    }

    .instruction-container {
        padding: 1em;
    }

    .instruction-container li {
        margin-bottom: 10px;
    }

    .card-footer {
        margin-top: 20px;
    }

    .btn-txt {
        font-size: max(2em, 13px);
        line-height: 2;
    }

    .attempt-container div {
        margin-top: 15px;
    }

    .attempt-container div:nth-of-type(1) {
        margin-top: 0;
        margin-bottom: 10px;
    }

    div#quiz-layout .card.font-medium-3.text-black {
        width: 100%;
    }

    .card-footer .submit-quiz {
        padding: 16px 24px;
        margin-right: 10px;
        font-size: max(2em, 13px);
    }

    .quiz-questions form .card-footer {
        margin-left: 0px;
    }

    .reset-quiz {
        background-color: white !important;
        border: 1px solid #111111 !important;
        color: #111111 !important;
        padding: 16px 24px;
        font-size: max(2em, 13px);
    }

    .reset-quiz:hover {
        box-shadow: 0 8px 25px -8px #111111 !important;
    }

    .reset-quiz:active {
        background-color: white !important;
    }

    .reset-quiz:focus {
        background-color: white !important;
    }

    .quiz-question-list-container {
        display: flex;
        align-items: center;
    }

    .quiz-question-list-input {
        margin-left: 5px;
    }

    .attempt-container {
        max-height: 375px;
        overflow: auto;
        margin-top: 10px;
    }

    .instruction-container .instruction {
        line-height: 1.3;
    }

    .quiz-question-list-style {
        margin-top: 0px !important;
    }

    .quiz-question-list-input label {
        padding-left: 20px !important;
    }

    .quiz-question-list-container {
        align-items: center !important;
        margin-bottom: 0px !important;
    }

    .quiz-question-list-input label {
        color: rgba(var(--bs-black-rgb), var(--bs-text-opacity)) !important;
    }

    #quiz-layout .card.text-left {
        width: 51%;
    }

    .single-quiz-content {
        font-weight: bold;
    }

    .instruction-container {
        font-weight: normal;
    }

    .quiz-score-after-result-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .quiz-score-after-result p {
        font-size: 20px;
        line-height: 24px;
    }

    .correct {
        position: absolute;
        top: 60%;
        font-size: 26px;
    }

    .final-attempt-quiz_container {
        display: flex;
        flex-direction: row-reverse;
        justify-content: space-between;
        padding: 0px !important;
        margin: 0px !important;
        margin-bottom: 40px !important;
    }

    .quiz-attempt-show {
        width: 45%;
        border-radius: 20px;
        background-color: #f9f9f9;
        padding: 50px;
        max-height: 400px;
    }

    .quiz-after-attempt-left-container {
        width: 51%;
        border-radius: 20px;
        background-color: #f9f9f9;
        padding: 50px;
        text-align: center;
    }

    .module-exam-after-quiz-result-content {
        width: 100% !important;
    }

    .attemp-last-para {
        font-size: 28px !important;
        line-height: 30px;
        margin-bottom: 30px;
    }

    .last-attempt-card {
        background-color: white !important;
        padding: 0px !important;
    }

    .final_quiz_result_section,
    .final-score {
        text-align: center;
    }

    .final_quiz_result_circle {
        width: 100%;
    }

    .last-quiz-attempt-btn .btn-danger {
        padding: 15px 24px;
    }

    .attempt-container.quiz-attempt-show .value-of-score {
        overflow-x: hidden;
    }

    .attempt-container.quiz-attempt-show {
        overflow: hidden;
    }

    @media  only screen and (max-width:1680px) {
        .attempt-container {
            max-height: 380px;
        }

        .quiz-question-list-container,
        .quiz-questions .card-header .fw-bold {
            font-size: 16px;
            line-height: 20px;
        }

        .quiz-question-list-input input {
            top: 4px !important;
        }

        .last-quiz-attempt-btn .btn-danger {
            padding: 16px 24px;
        }
    }

    @media  only screen and (max-width:1500px) {
        .last-quiz-attempt-btn .btn-danger {
            padding: 14px 24px;
            font-size: 14px;
        }

        .retake-exam p {
            font-size: 16px;
            line-height: initial;
        }
    }


    @media  only screen and (max-width:1440px) {
        .quiz-score-after-result .attemp-last-para {
            font-size: 20px !important;
        }

        .module-exam-after-quiz-result-content .circle_percent {
            font-size: 150px;
        }

        .percent_text {
            font-size: 24px;
        }

        .correct {
            font-size: 20px;
        }
    }


    @media  only screen and (max-width:1300px) {
        .quiz-score-after-result .attemp-last-para {
            font-size: 18px !important;
        }

        .attempt-container div:nth-of-type(1) {
            margin-bottom: 0px;
        }
    }


    @media  only screen and (max-width:1280px) {
        .quiz-after-attempt-left-container .image {
            width: 40%;
        }
    }


    @media  only screen and (max-width:1200px) {
        #quiz-questions-form .card-footer {
            margin-left: 0px;
        }

        .card-body.text-black.single-quiz-content.font-s,
        .card-header.font-ml,
        .text-black.float-left.font-l,
        .row.attempt-container .font-m,
        .row.attempt-container .attempt,
        .row.card-header.input-parents .fw-bold,
        .text-dark,
        .quiz-question-list-style {
            font-size: 16px;
            line-height: 24px;
        }

        .quiz-question-list-input input {
            position: absolute;
            top: 8px !important;
            left: 0px;
            width: 10px;
            height: 10px;
        }

        .percent_text {
            font-size: 24px;
        }

        .correct {
            font-size: 22px;
        }

        .attemp-last-para {
            font-size: 22px !important;
        }

        .quiz-container-div,
        .image {
            width: 50%;
        }

    }


    @media  only screen and (max-width:1040px) {
        .attemp-last-para {
            font-size: 20px !important;
        }
    }

    @media  only screen and (max-width:900px) {
        #quiz-layout {
            flex-direction: column;
            width: 92%;
            margin: 0 auto;
        }

        .card.text-left,
        #quiz-layout .card {
            margin-left: 0px;
            width: 100%;
        }

        #quiz-layout .card {
            width: 100%;
        }

        .module-exam-score-container {
            display: flex;
            flex-direction: row-reverse;
            width: 100%;
            justify-content: space-between;
            align-items: center;
        }

        .final-score {
            margin-top: 0px !important;
        }

        .final_quiz_result_section {
            text-align: left;
        }
    }

    @media  only screen and (max-width:780px) {
        .circle_percent {
            font-size: 140px;
        }
    }


    @media  only screen and (max-width:767px) {

        #quiz-layout {
            width: 100%;
        }

        .quiz-question-list-style {
            font-size: 14px;
        }

        .quiz-question-list-input input {
            margin-top: 4px;
            margin-right: 5px;
        }

        .quiz-question-list-input {
            display: flex;
        }

        .quiz-question-list-input input {
            margin-right: 0px;
            margin-top: 0px;
            top: 6px !important;
        }

        .quiz-question-list-input label {
            padding-left: 15px !important;
        }

        .final-attempt-quiz_container {
            flex-direction: column-reverse;
            row-gap: 30px;
        }

        .quiz-attempt-show {
            width: 100%;
        }

        .quiz-after-attempt-left-container {
            width: 100%;
        }

        .last-quiz-attempt-btn {
            margin-top: 15px;
        }

        .last-quiz-attempt-btn .btn-danger {
            padding: 10px 20px;
            font-size: 14px;
            margin: 0px !important;
        }

        .retake-exam {
            margin-top: 30px;
        }

        .attempt-container.quiz-attempt-show {
            overflow: auto;
        }
    }


    @media  only screen and (max-width:500px) {
        .card.text-left {
            padding: 20px !important;
        }

        .card-footer {
            margin-left: 20px;
        }

        .page-head {
            margin-left: 20px;
        }
    }

    @media  only screen and (max-width:480px) {
        .attemp-last-para {
            font-size: 18px !important;
        }

        .attemp-last-para {
            margin-bottom: 20px;
        }

        .quiz-after-attempt-left-container {
            padding: 30px;
        }

        .quiz-attempt-show {
            padding: 30px;
        }

        .module-exam-after-quiz-result-content .circle_percent {
            font-size: 120px;
        }

        .percent_text {
            font-size: 18px;
        }

        .correct {
            font-size: 18px;
        }

        .attempt-container.quiz-attempt-show .value-of-score .attempt:last-of-type {
            padding-bottom: 0px;
        }
    }

    @media  only screen and (max-width:440px) {

        .percent_text,
        .correct {
            font-size: 18px;
        }

        .circle_percent {
            font-size: 120px;
        }

        .quiz-score-after-result p {
            font-size: 16px;
            line-height: 24px;
        }

        .quiz-score-after-result-container {
            flex-direction: column;
        }

        .final-quiz-section-attemp-container {
            text-align: center;
        }
    }

    @media  only screen and (max-width:400px) {
        .module-exam-score-container {
            flex-direction: column;
        }

        .final-section-font {
            text-align: center;
        }

        .circle_inner {
            margin-bottom: 0px !important;
        }
    }


    @media  only screen and (max-width:397px) {
        .card-footer .submit-quiz {
            margin-bottom: 10px;
        }
    }


    @media  only screen and (max-width:380px) {

        .card-body.text-black.single-quiz-content.font-s,
        .card-header.font-ml,
        .text-black.float-left.font-l,
        .row.attempt-container .font-m,
        .row.attempt-container .attempt,
        .row.card-header.input-parents .fw-bold,
        .text-dark {
            font-size: 14px;
            line-height: 20px;
        }
    }

    /* @media(max-width:1279px) {
            .card,.page-head,.card-footer{
                font-size:6.5px;
            }
            .card {
                padding: 30px !important;
                margin: 30px 30px 0 30px !important;
            }
            .card-header {
                margin-bottom: 20px !important;
            }
            .card-body h3 {
                padding-top: 20px !important;
                margin: 20px auto !important;
            }
            .font-m {
                margin-bottom: 20px !important;
            }
            .start-quiz {
                padding: 5px 30px !important;
            }
            .card-footer{
                margin-left:30px !important;
            }
            .page-head{
                margin-left:30px !important;
                margin-top:30px !important;
            }
        }
        @media(max-width:990px){
            .my-container{
                display:grid !important;
            }
            .card ,
            .card.text-left{
                width:93%;
            }
        } */

</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>





<section class="main-content">
    <a id="top"></a>
    <div class="page-head">
        <div class="text-black float-left font-l">
            <?php $__env->startSection('title', $quiz->title ); ?>

            <?php echo e($quiz->title); ?>

        </div>
    </div>

    <div class="d-flex my-container active-cont" id="quiz-layout">

        <div class="card text-left   <?php if(empty($scoreArray['attemptScore']) ): ?> card-first-section <?php endif; ?>">

            <div class="card-header font-ml">

                <?php echo e($quiz->title); ?>

            </div>

            <div class="card-body text-black single-quiz-content font-s">
                <?php echo $quiz->description; ?>

            </div>

        </div>


        <?php if(!empty($scoreArray['attemptScore']) ): ?>
        <?php if(isset($scoreArray['attemptScore']['final_exam'])): ?>
        <div class="card">
            <div class="">
                <div class="row attempt-container final_quiz_result_section">
                    <div class="font-m final-section-font">Attempt and Questions Correct</div>
                    <div class="module-exam-score-container">
                        <div class="module-exam-score">
                            <div class="col-sm-3 col-md-2 final_quiz_result_circle">
                                <div class="conainer">
                                    <div class="circle_percent" data-percent="<?php echo e(Helper::roundScorePercentage($scoreArray['attemptScore'][1],$scoreArray['totalQuestions'])); ?>">
                                        <div class="circle_inner">
                                            <div class="round_per <?php echo e($scoreArray['attemptScore']['circle_class']); ?>"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="final-score">
                            <p>You Scored:<span style="font-weight:bold;"><?php echo e($scoreArray['attemptScore'][1]); ?> out of <?php echo e($scoreArray['totalQuestions']); ?></span> </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="card">
            <div class="">
                <div class="row attempt-container">
                    <div class="font-m">Attempts and Questions Correct</div>
                    <?php $__currentLoopData = $scoreArray['attemptScore']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attempt => $score): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="attempt text-black font-s">
                        Attempt <?php echo e($attempt); ?> : <span style="font-weight:bold;"><?php echo e($score); ?> of <?php echo e($scoreArray['totalQuestions']); ?> correct</span> <br>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>



        <?php endif; ?>

    </div>


    <?php if(!$scoreArray['finalExamCompleted']): ?>
    <?php
    $quizMessageText= "Start Quiz";
    $miniQuiz = true;
    if($quiz->section->is_section == 0){
        $quizMessageText= "Start Exam";
        $miniQuiz = false;
    }
    ?>
    <?php if($miniQuiz && $showQuizButton ): ?>
        <div class="card-footer section-controls">
            <button class="start-quiz btn btn-primary"><span class="btn-txt"><?php echo e($quizMessageText); ?></span></button>
        </div>
    <?php elseif(!$miniQuiz): ?>
        <div class="card-footer section-controls">
        <button class="start-quiz btn btn-primary"><span class="btn-txt"><?php echo e($quizMessageText); ?></span></button>
    </div>
    <?php else: ?>
    <?php if(!empty($quiz->section->nextSection())): ?>
            <div class="card-footer section-controls">
                <a href="<?php echo e(route('this-section',$quiz->section->nextSection())); ?>" class="btn btn-primary start-quiz-1"><span class="btn-txt">Next</span></a>
            </div>
    <?php else: ?>
            <div class="card-footer section-controls">
                <a class="btn btn-primary start-quiz-1" href="<?php echo e(route('my-courses',$quiz->section->module->nextModuleForStudent())); ?>"><span class="btn-txt">Next</span></a>
            </div>
    <?php endif; ?>

            
    <?php endif; ?>
    <?php elseif($scoreArray['nextSectionExist']): ?>
      <div class="card-footer section-controls">
          <a href="<?php echo e($scoreArray['nextSectionExist']); ?>" class="btn btn-primary start-quiz-1"><span class="btn-txt">Next</span></a>
      </div>
    <?php else: ?>
            <div class="card-footer section-controls">
                <a class="btn btn-primary start-quiz-1" href="<?php echo e(route('my-courses',$quiz->section->module->nextModuleForStudent())); ?>"><span class="btn-txt">Next</span></a>
            </div>
    <?php endif; ?>

</section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>



<script>
    $(document).ready(() => {
        circle();
    })
    const circle = () => {

        $(".circle_percent").each(function() {
            var $this = $(this)
                , $dataV = $this.data("percent")
                , $dataDeg = $dataV * 3.6
                , $round = $this.find(".round_per");
            $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
            $this.append('<div class="circle_inbox"><span class="percent_text"></span> <span class="percent_text correct"></span> </div>');
            $this.prop('Counter', 0).animate({
                Counter: $dataV
            }, {
                duration: 2000
                , easing: 'swing'
                , step: function(now) {
                    $this.find(".percent_text").text(Math.ceil(now) + "%");
                    $this.find('.correct').text('Correct');
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
        })
    };

</script>
<script src="<?php echo e(asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))); ?>"></script>

<script>
    $('.start-quiz').click((e) => {
        e.preventDefault();
        let content = `<?php if(!$scoreArray['finalExamCompleted']): ?><?php if (isset($component)) { $__componentOriginal6220119f226a38a6249e3f74e3364cff6ca36a33 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\QuizQuestions::class, ['quiz' => $quiz]); ?>
<?php $component->withName('quiz-questions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal6220119f226a38a6249e3f74e3364cff6ca36a33)): ?>
<?php $component = $__componentOriginal6220119f226a38a6249e3f74e3364cff6ca36a33; ?>
<?php unset($__componentOriginal6220119f226a38a6249e3f74e3364cff6ca36a33); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php endif; ?>`
        $('.start-quiz').hide();
        if (content) {
            $('#quiz-layout').html(content);
            $(window).scrollTop(0);
        }
        $("#quiz-questions-form").validate();

        $('.submit-quiz').click((e) => {
            e.preventDefault();
            let formData = $('#quiz-questions-form').serialize();
            // console.log(formData)
            $.ajax({
                url: "<?php echo e(route('submitQuiz')); ?>"
                , type: "POST"
                , data: formData
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , beforeSend: () => {
                    submitLoader(e.target);
                }
                , success: (data) => {

                    submitReset(e.target);
                    if (data.success == "validationError") {

                        setAlert({
                            code: "warning"
                            , title: "Alert!"
                            , message: "Please Select Every Possible Answer!",
                            // positionClass:
                        });
                    }
                    // console.log();

                    $('#quiz-layout').html(data.html);
                    $("#quiz-layout .card").css("width", "100%");
                    setAlert({
                        code: data.code
                        , success: data.success
                        , title: data.title
                        , message: data.message
                    , });
                    circle();

                }
                , error: (err) => {
                    setAlert({
                        code: "error"
                        , title: "Oops!"
                        , message: "Something went wrong Please try again!"
                    , });
                    submitReset(e.target);
                }
            })
        })
    })

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\follow-for-now-life-skill\resources\views/content/students/quiz/index.blade.php ENDPATH**/ ?>