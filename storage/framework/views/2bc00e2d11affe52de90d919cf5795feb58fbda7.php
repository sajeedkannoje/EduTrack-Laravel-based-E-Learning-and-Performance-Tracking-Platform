



<?php $__env->startSection('vendor-style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>

<style>
.video-sync {
    width: 100%;
}

.question-desc {
    font-weight: 500;
    display: inline-grid;
}

.point-desc {
    font-weight: 500;
    display: flex;
}

.time-desc {
    font-weight: 500;
    display: flex;
}

.single-section-content {
    font-size: 20px;
    line-height: 1.5;
    color: #1d1b1e;
    font-family: 'S FPro Display';
}

.single-section-content h3 {
    color: #228b22;
    font-family: 'S FPro Display';
    font-weight: 800;
}

.font-l {
    font-size: 3.6em;
    line-height: 0.555;
}

.font-ml {
    font-size: max(2.6em, 20px);
    line-height: 0.755;
    color: forestgreen;
    font-family: "SF Pro Display Bold" !important;
    font-weight: bold;
}

.single-section-content h3,
.g-text {
    font-size: max(2.4em, 18px);
    line-height: 0.855;
    color: forestgreen;
    font-weight: bold;
}

.single-section-content p,
.single-section-content a,
.link-list-item a {
    font-size: max(2em, 13px);
    line-height: 1.3;
}

.link-list-item a>.d-text,
.g-text>a,.d-text{
    font-size: max(1em, 13px);
    line-height: 1.4;
}

.g-text,.d-text {
    display: block;
}

.book .g-text {
    font-size: max(2em, 13px);
    line-height: 2
}

.card-header,
.single-section-content,
.page-head,
.link-list {
    font-size: 0.5208333333333334vw;
}

.card-header {
    padding: 0;
}

.page-head {
    margin: 40px 0;
    margin-left: 40px;
}

.single-section-content {
    margin: 20px auto;
}

.single-section-content h3 {
    margin-bottom: 10px;
    margin-top: 35px;
    border-top: 1px solid #cbcbcb;
    padding-top: 30px;
}

.single-section-content h4 {
    margin-bottom: 30px;
    margin-top: 35px;
    font-size: max(2.2em, 16px);
    line-height: 0.655;
    color: black;
    font-weight: bold;
}

.single-section-content p {
    margin-bottom: 1em;
}

.single-section-content p.book{
    margin:0;
}
.book .d-text, .book .d-text .g-text{
    font-family:"SF Pro Display Light" !important;
    font-weight:800;
}

.card-image {
    justify-content: flex-start;
    margin-top: 25px;
    font-size: 0.5208333333333334vw;
    flex-wrap: wrap;
    column-gap: 20px;
}
.card-image img {
    border-radius: 25px;
    max-height: 48em;
    width: 32%;
}

.column-content {
    width: 100%;
}

.column-content-wrapper {
    column-gap: 100px;
    border-top: 1px solid #cbcbcb;
    border-bottom: 1px solid #cbcbcb;
}

.column-content-wrapper h3 {
    border: none;
    padding-top: 0;
}

.single-section-content p a {
    font-size: max(1em, 13px);
    line-height: 2;
}

.link-list,
.books-wrapper {
    padding: 0;
    margin-top: 10px;
    margin-bottom:0;
}
.link-list li{
    list-style-type: none;
    font-size: 18px;
    line-height: 2;
}

.link-list-item,
.book {
    padding: 0;
    list-style: none;
}

.link-list-item svg,
.book svg {
    border: 2px solid black;
    border-radius: 4px;
    min-width: 14px;
    width: 14px;
}

.link-list-item,
.book {
    display: flex;
    align-items: baseline;
    column-gap: 10px;
}

.link-list-item {
    align-items: initial;
}

.link-list li:last-of-type a {
    display: flex;
    column-gap: 5px;
}

.link-list-item i,
.book i{
    font-size: max(1em, 13px);
}

.link-list-item a.g-text {
    font-size:18px;
}
.single-section-content .g-text {
    color: forestgreen;
    font-size: max(2em,13px);
    line-height: 1.7;
}

.single-section-content .d-text {
    color: black;
    font-family:"SF Pro Display Light";
}

.d-text .g-text{
    color:black;
    font-weight: 500;
}

.single-section-content span .g-text {
    font-size: max(1em, 13px);
    line-height: 2;
}

.single-section-content a {
    color: black;
}

.single-section-content a:hover {
    color: forestgreen;
}

.take-quiz {
    padding: 25px 70px;
}

.section-controls a {
    font-size: 0.5208333333333334vw;
    padding: 2.45em 6.7em;
}

.btn-txt {
    font-size: max(2em, 13px);
}

.single-section-content a.g-text .g-text,
.single-section-content p .g-text {
    font-size: max(1em, 13px);
    display: inline;
    align-self: center;
}

a.g-text .d-text {
    display: inline;
    font-size: max(1em, 13px);
}

.table-container,
.table-container td,
.table-container th {
    border: 1px solid black;
}

.table-container {
    margin: 40px 0;
    font-size: 0.5208333333333334vw;
    table-layout: fixed;
    width: 85%;
}

.table-container th {
    color: forestgreen;
    font-size: max(2.2em, 16px);
    padding: 1em;
    text-transform: capitalize;
}

.table-container td {
    font-size: max(2em, 13px);
    padding: 1em;
    text-transform: capitalize;
}

@media  only screen and (max-width:1680px){
  .link-list-item a.g-text {
    font-size: 18px;
  }
}

@media(max-width:1370px) {
    .card-image {
        column-gap: 20px;
        margin-top: 20px;
    }

    .card {
        padding: 20px !important;
    }

    .column-content-wrapper {
        column-gap: 50px;
    }
}

@media  only screen and (max-width:1490px){

    .card-image img {

        width:30%;

    }
}

@media  only screen and (max-width:800px){
    .column-content-wrapper.d-flex {

        flex-direction: column;

    }
}

@media  only screen and (max-width:767px) {

    .my-container.active-cont .card {

        margin: 0px;

    }

    .single-section-content h3 {

        margin-top: 20px;

        margin-bottom: 15px;
    }

    div#section-controls {

        margin-top: 10px !important;

    }

}

@media  only screen and (max-width:600px){

    .card-image img {

        width: 100%;

        max-height: none;

        margin-bottom: 20px;

    }

    .card-image img:last-of-type {

        margin-bottom: 0px;

    }
}

</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="main-content">
    
    

    

    <div class="my-container active-cont">
        <div class="">
            
            <div class="card">
                

                <div class="d-none" id="small-menu-toggler">
                    <button id="small-open-menu-opener" class="btn btn-sm btn-primary">
                        <i data-feather='disc' class="font-medium-3 text-white p-25"></i>
                    </button>

                </div>


                <?php if(request()->session()->has('completeThisSectionFirst')): ?>

                <div class="alert alert-warning fw-bold font-medium-3 text-center p-2">
                    <?php echo e(request()->session()->get('completeThisSectionFirst', 'You need to complete this module.')); ?>


                    <?php echo e(request()->session()->forget('completeThisSectionFirst')); ?>


                </div>

                <?php endif; ?>

                <?php if(request()->session()->has('completeThisSectionFirst')): ?>

                <div class="alert alert-warning fw-bold font-medium-3 text-center p-2">
                    <?php echo e(request()->session()->get('completeThisSectionFirst', 'Before Starting Quiz you need to read section.')); ?>


                    <?php echo e(request()->session()->forget('completeThisSectionFirst')); ?>


                </div>

                <?php endif; ?>


                <div class="card-header">
                     <?php $__env->startSection('title',  $section->title); ?>
                    <h3 class="font-ml"><?php echo e($section->title); ?></h3>
                </div>

                <?php if($section->sectionImages()): ?>
                <div class="card-image d-flex">
                    <?php $__currentLoopData = $section->sectionImages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e($image); ?>">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>


                <div class="card-content">
                    <div>
                        <div class="single-section-content">
                            <?php echo $section->content; ?>

                        </div>


                        <div class=" d-flex justify-content-start">
                            <div class="mt-2 section-controls" id="section-controls">
                                <?php if(isset($section->quiz->id)): ?>
                                <?php if($section->completedByThisUser()['is_read']): ?>
                                <a class="btn btn-primary btn-lg take-quiz"
                                    href="<?php echo e(route('startQuiz',$section->id)); ?>"><span class="btn-txt">Next</span></a>
                                <?php else: ?>
                                <button data-url="<?php echo e(route('markSectionReaded',$section->id)); ?>"
                                    class="btn btn-lg btn-primary mark-section-read">Next</button>
                                <?php endif; ?>
                                <?php elseif(isset($section->nextSection()->id)): ?>
                                <a class="btn btn-primary btn-lg take-quiz" href="<?php echo e(route('this-section',$section->nextSection()->id)); ?>"><span class="btn-txt">Next</span></a>
                                <?php else: ?>
                                <?php if($section->completedByThisUser()['is_read']): ?>
                                <a class="btn btn-primary btn-lg take-quiz" href="<?php echo e(route('my-courses',$section->module->nextModuleForStudent())); ?>"><span class="btn-txt">Next</span></a>
                                <?php else: ?>
                                 <button data-url="<?php echo e(route('markSectionLastReaded',$section->id)); ?>"
                                    class="btn btn-lg btn-primary mark-section-read-last">Next</button>
                                <?php endif; ?>
                               
                            <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>


<script>
$('.mark-section-read').click((e) => {
    e.preventDefault();
    console.log($(e.target).data('url'));
    $.ajax({
        url: $(e.target).data('url'),
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: () => {
            submitLoader(e.target);
        },
        success: (data) => {
            // console.log();
            submitReset(e.target);
            window.location.assign(data.quizUrl);
            // $('#section-controls').html(data.html)
        },
        error: (err) => {
            setAlert({
                code: "error",
                title: "Oops!",
                message: "Something went wrong Please try again!",
            });
            submitReset(e.target);
        }
    })
})
$('.mark-section-read-last').click((e) => {
    e.preventDefault();
    console.log($(e.target).data('url'));
    $.ajax({
        url: $(e.target).data('url'),
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: () => {
            submitLoader(e.target);
        },
        success: (data) => {
            // console.log();
            submitReset(e.target);
            window.location.assign(data.Url);
            // $('#section-controls').html(data.html)
        },
        error: (err) => {
            setAlert({
                code: "error",
                title: "Oops!",
                message: "Something went wrong Please try again!",
            });
            submitReset(e.target);
        }
    })
})
$( ".d-text" ).wrap( "<p class='book'></p>" );
$(".link-list-item .d-text ").unwrap();
jQuery(".link-list-item, .book").children("i").replaceWith('<i class="fi-br-sign-in-alt">');

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\follow-for-now-life-skill\resources\views/content/students/sections/singleSection.blade.php ENDPATH**/ ?>