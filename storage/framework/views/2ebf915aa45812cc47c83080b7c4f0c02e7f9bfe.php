<?php $__env->startSection('title', 'Account Settings'); ?>

<?php $__env->startSection('vendor-style'); ?>
<?php echo $__env->make('inc/datatable/styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- vendor css files -->
<link rel='stylesheet' href="<?php echo e(asset(mix('vendors/css/forms/select/select2.min.css'))); ?>">


<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
<!-- Page css files -->
<link rel="stylesheet" href="<?php echo e(asset(mix('css/base/plugins/forms/form-validation.css'))); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/cropper/cropper.min.css')); ?>">
<style>
    .account-eye {
        height: 1.5rem;
    }

    .feather-eye.font-small-4 {
        height: 1.5rem !important;
    }

    .feather-eye-off.font-small-4 {
        height: 1.5rem !important;
    }

    .account-append {
        margin-left: -3px !important;
    }

    .account-wrapper {
        justify-content: center;
        align-items: center;
        column-gap: 40px;
    }

    .content-header {
        padding-left: 40px;
    }

    .card-body {
        padding: 0;
    }

    .card-body .nav {
        margin-top: 40px;
    }

    .card-body .nav .nav-item .active {
        color: forestgreen;
    }

    .referral_form_input_container {

        width: 100%;

    }

    .account_card_container {
        width: 100%;
        margin: 0 auto !important;
        margin-top: 40px !important;
        min-height: 400px;
    }

    .right-content-card-section-container {
        max-width: 1480px;
        width: 100%;
    }

    .account-card-body {
        display: flex;
        flex-direction: row-reverse;
        justify-content: space-between;
    }

    .tab-content {
        margin-right: auto;
        margin-top: 60px;
    }

    #account-vertical-password {
        margin-top: 40px;
    }

    #account-vertical-email {
        margin-top: 60px;
    }

    ul.nav.nav-pills.flex-column.nav-left.pass-page {
        width: 20%;
        margin-right: 100px;
    }

    .change-photo-container {
        position: relative;
    }

    .change-photo-btn-container {
        position: absolute;
        margin-top: 0px !important;
        margin-left: 0px !important;
        width: 79px;
        height: 38px;
        bottom: 0px;
        background-color: rgba(0, 0, 0, .5);
        border-radius: 0px 0px 100px 100px;
    }

    .change-photo-btn-container button {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 79px;
        height: 38px;
        background-color: transparent !important;
        border: 1px solid transparent !important;
        color: white !important;
    }

    .change-photo-btn-container:hover {
        background-color: rgba(0, 0, 0, .8);
    }

    .change-password-column,
    .change-email-column {
        width: 100%;
        margin-bottom: 10px;
    }

    .account-flex-column {
        flex-direction: column;
        width: 100%;
    }

    #account-vertical-general {
        width: 45%;
    }

    .account-flex-column .col-12.col-sm-6 {
        width: 100%;
    }

    .account-flex-column .col-12.col-sm-6 .form-group {
        margin-bottom: 10px;
    }

    #account-vertical-email,
    #account-vertical-password {
        width: 45%;
    }

    .save-changes-account-section {
        margin-top: 0px !important;
    }

    ul.nav.nav-pills.flex-column.nav-left.pass-page {
        width: 30%;
        padding: 40px;
        background-color: #f9f9f9;
        margin-bottom: 0px !important;
        margin-top: 0px !important;
        border-radius: 20px;
        box-shadow: 0px 0px 12px -4px #000000 !important;
        height: 100%;
    }

    .account_card_container {
        background-color: white !important;
    }

    #account-vertical-general,
    #account-vertical-password,
    #account-vertical-email,
    #addReferralCode {
        background-color: #f9f9f9 !important;
        margin-top: 0px;
        padding: 20px;
        box-shadow: 0px 0px 12px -4px #000000 !important;
        border-radius: 20px;
        padding: 40px;
        min-height: 380px;
        width: 60%;
    }

    .tab-content {
        margin-top: 0px;
    }

    #account-vertical-general label,
    #account-vertical-password label,
    #account-vertical-email label,
    #addReferralCode label {
        margin-bottom: 5px;
    }

    .account-nav-pills .nav-item a {
        color: #5e5873;
    }

    .account-nav-pills .nav-link.active {
        color: #228b22;
    }

    .account-flex-column {
        margin: 0px;
    }

    .modal-header button:hover {
  transform: translate(18px, -10px) !important;
    }


    @media  only screen and (max-width:1280px) {
        ul.nav.nav-pills.flex-column.nav-left.pass-page {
            padding: 30px;
        }
    }

    @media  only screen and (max-width:1200px) {

        #account-vertical-email,
        #account-vertical-password {
            width: 60%;
        }

        ul.nav.nav-pills.flex-column.nav-left.pass-page {
            width: 26% !important;
            margin-right: 100px;
            padding: 20px;
        }

        .nav-pills .nav-link {
            padding: 10px;
            max-width: none !important;
            width: 100%;
        }
    }

    @media  only screen and (max-width:880px) {
        ul.nav.nav-pills.flex-column.nav-left.pass-page {
            width: 30% !important;
        }
    }

    @media  only screen and (max-width:980px) {

        .change-password-column,
        .change-email-column {
            width: 100%;
        }
    }

    @media  only screen and (max-width:767px) {
        .account-card-body {
            flex-direction: column-reverse;
        }

        ul.nav.nav-pills.flex-column.nav-left.pass-page {
            width: 100% !important;
            margin-bottom: 30px !important;
        }

        .account_card_container {
            margin-top: 0px !important;
            padding-top: 0px !important;
        }

        .tab-content {
            margin-right: 0px;
        }

        .content-header {
            padding-left: 10px;
        }

        #account-vertical-email,
        #account-vertical-password {
            width: 100%;
        }

        #account-vertical-general {
            width: 100%;
        }

        #account-vertical-general,
        #account-vertical-password,
        #account-vertical-email,
        #addReferralCode {
            width: 100%;
        }

        ul.nav.nav-pills.flex-column.nav-left.pass-page {
            padding: 40px;
        }

        #account-vertical-general,
        #account-vertical-password,
        #account-vertical-email,
        #addReferralCode {
            min-height: initial;
        }

        #basic-info-form .row .form-group,
        #change-password-form .row .form-group,
        #account-vertical-email .row .form-group {
            width: 100% !important;
        }
    }


    @media  only screen and (max-width:600px) {

        .account_card_container {
            width: auto;
        }

        .account_card_container {
            padding: 10px !important;
        }
    }

    @media  only screen and (max-width:480px) {

        #account-vertical-general,
        #account-vertical-password,
        #account-vertical-email,
        #addReferralCode {
            padding: 20px;
        }

        ul.nav.nav-pills.flex-column.nav-left.pass-page {
            padding: 20px;
        }

        .change-password-column,
        .change-email-column {
            margin-bottom: 0px;
        }
    }

</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- account setting page -->
<section id="page-account-settings">
    
    <div class="account-wrapper d-flex">


        <!-- right content section -->
        <div class="right-content-card-section-container">
            <div class="card account_card_container">
                <div class="card-body account-card-body">
                    <?php
                    $isReferralExist ='';
                    ?>

                    <?php if(!Auth::user()->referred_by): ?>
                    <?php
                    $isReferralExist=false;
                    ?>
                    <?php else: ?>
                    <?php
                    $isReferralExist=true;
                    ?>
                    <?php endif; ?>



                    

                    <!-- add referral -->
                    <?php if(!$isReferralExist && !Auth::user()->hasRole('teacher')): ?>
                    <div class="tab-pane active" id="addReferralCode" role="tabpanel" aria-labelledby="referral-code-pill" aria-expanded="false">
                        <!-- form -->
                        <form id="add-referral-form" method="post" action="<?php echo e(route('addReferralCode')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">

                                <div class="col-12 col-sm-6 referral_form_input_container">
                                    <div class="form-group">
                                        <label for="Referral">Enter Referral Code</label>
                                        <input required type="text" class="form-control" id="referral" name="referral" placeholder="Referral" value="" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button id="add-referral-submit" type="submit" class="btn btn-primary mr-1 mt-1">Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
                                </div>
                            </div>
                        </form>
                        <!--/ form -->
                    </div>
                    <?php endif; ?>

                    <!-- general tab -->
                    

                    <div role="tabpanel" class="tab-pane  <?php if($isReferralExist || Auth::user()->hasRole('teacher') ): ?>active <?php else: ?> fade d-none <?php endif; ?>" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                        <?php if(session()->has('resent')): ?>
                        <div class="row">
                            <div class="col-12 mb-75 ">
                                <div class="alert alert-success mb-50" role="alert">
                                    <h4 class="alert-heading">A fresh verification link has been sent to your email address.</h4>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>


                        <!-- header media -->

                        <div class="media d-grid justify-content-center change-photo-container">
                            <div id="user_image" href="javascript:void(0);" class="mr-25 d-flex justify-content-center mb-2">
                                <img src="<?php echo e(auth()->user()->profileImage()); ?>" class="rounded-circle mr-50" alt="profile image" height="80" width="80" />

                                <!-- upload and reset button -->
                                <div class="media-body mt-75 ml-1 change-photo-btn-container">
                                    <input type="file" name="profile" class="d-none" accept="image/*" id="profile">
                                    <button type="button" class="btn btn-icon text-center" data-bs-toggle="modal" id="change-photo" data-bs-target="#modal_change_photo">
                                        <i class="fi-br-camera"></i>
                                    </button>
                                </div>
                            </div>

                            <?php echo $__env->make('inc.modal.crop_image', [
                            'crop_url' => route('crop_image', 'web'),
                            'upload_url' => route('upload_image', 'web'),
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <!--/ upload and reset button -->
                        </div>

                        <!-- form -->

                        <form action="<?php echo e(route('updateBasicInfo')); ?>" id="basic-info-form" method="post" class=" mt-2">
                            <?php echo csrf_field(); ?>

                            <div class="row account-flex-column">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="first-name">First Name</label>
                                        <input required type="text" class="form-control" id="account-first-name" name="first_name" placeholder="First Name" value="<?php echo e(auth()->user()->first_name); ?>" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="account-last_name">Last Name</label>
                                        <input required type="text" class="form-control" id="account-last_name" name="last_name" placeholder="Last Name" value="<?php echo e(auth()->user()->last_name); ?>" />
                                    </div>
                                </div>
                            </div>
                            
            <div class="col-12 d-flex justify-content-center mt-2 save-changes-account-section">
                <button id="basic-info-btn" type="submit" class="btn btn-primary mt-2 mr-1">Save changes</button>
            </div>

            </form>
            <!--/ form -->
        </div>
        <!--/ general tab -->

        <!-- change password -->
        <div class="tab-pane fade d-none" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
            <!-- form -->

            <form action="<?php echo e(route("changePassword")); ?>" method="post" id="change-password-form">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-12 col-sm-6 change-password-column">
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <div class="input-group form-password-toggle input-group-merge">
                                <input required type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password" />
                                <div class="input-group-append account-append">
                                    <div class="input-group-text cursor-pointer">
                                        <i data-feather="eye" class="account-eye"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 change-password-column">
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <div class="input-group form-password-toggle input-group-merge">
                                <input required type="password" id="password" name="password" class="form-control" placeholder="New Password" />
                                <div class="input-group-append account-append">
                                    <div class="input-group-text cursor-pointer">
                                        <i data-feather="eye" class="account-eye"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 change-password-column">
                        <div class="form-group">
                            <label for="password-confirmation">Retype New Password</label>
                            <div class="input-group form-password-toggle input-group-merge">
                                <input type="password" class="form-control" id="password-confirmation" name="password_confirmation" placeholder="New Password" />
                                <div class="input-group-append account-append">
                                    <div class="input-group-text cursor-pointer">
                                        <i data-feather="eye" class="account-eye"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button id="change-password-submit" type="submit" class="btn btn-primary mr-1 mt-1">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
                    </div>
                </div>
            </form>
            <!--/ form -->
        </div>
        <!--/ change password -->

        <div class="tab-pane fade d-none" id="account-vertical-email" role="tabpanel" aria-labelledby="account-pill-email" aria-expanded="false">
            <!-- form -->

            <form id="change-email-form" method="post" action="<?php echo e(route('changeMyEmail')); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-12 mb-75">
                        <strong>Current Email Address:</strong>
                        <span class="user-mail"><?php echo e(auth()->user()->email); ?> </span>
                        
                    </div>
                    <div class="col-12 col-sm-6 change-email-column">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required type="email" class="form-control" id="email" name="email" placeholder="Email" value="" />
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 change-email-column">
                        <div class="form-group">
                            <label for="email-confirmation">Retype New Email</label>
                            <input type="email" class="form-control" id="email-confirmation" name="email_confirmation" placeholder="Retype New Email" value="" />
                        </div>
                    </div>
                    <?php if(!auth()->user()->hasVerifiedEmail()): ?>
                    <div class="col-12 mt-75">
                        <div class="alert alert-warning mb-50" role="alert">
                            <h4 class="alert-heading">Your email is not verified. please check your email for a verification link.</h4>
                            <div class="alert-body">
                                <a href="javascript: void(0);" class="alert-link resend-email-verification">Resend
                                    confirmation</a>
                                <form id="resend-email-form" class="d-none" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-12">
                        <button id="change-email-submit" type="submit" class="btn btn-primary mr-1 mt-1">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
                    </div>
                </div>
            </form>
            <form id="resend-email-form" class="d-none" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                <?php echo csrf_field(); ?>
            </form>
            <!--/ form -->
        </div>



        <!--/ change email -->
        <ul class="nav nav-pills account-nav-pills flex-column nav-left pass-page">
            <?php if(!$isReferralExist && !Auth::user()->hasRole('teacher')): ?>

            <!-- referral -->
            <li class="nav-item  referral-li">
                <a class="nav-link menu-travel active" id="referral-pill" data-toggle="pill" href="#addReferralCode" aria-expanded="false">
                    <i data-feather="lock" class="font-medium-3 mr-1"></i>
                    <span class="font-weight-bold">Referral Code</span>
                </a>
            </li>
            <?php endif; ?>
            <!-- general -->
            <li class="nav-item">
                <a class="nav-link menu-travel  <?php if($isReferralExist  || Auth::user()->hasRole('teacher') ): ?>active <?php endif; ?>" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                    <i data-feather="user" class="font-medium-3 mr-1"></i>
                    <span class="font-weight-bold">General</span>
                </a>
            </li>
            <!-- change password -->
            <li class="nav-item">
                <a class="nav-link menu-travel" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                    <i data-feather="lock" class="font-medium-3 mr-1"></i>
                    <span class="font-weight-bold">Change Password</span>
                </a>
            </li>
            <!-- change passemailword -->
            <li class="nav-item">
                <a class="nav-link menu-travel" id="account-pill-email" data-toggle="pill" href="#account-vertical-email" aria-expanded="false">
                    <i data-feather="mail" class="font-medium-3 mr-1"></i>
                    <span class="font-weight-bold">Change Email</span>
                </a>
            </li>
        </ul>
    </div>
    </div>
    </div>
    </div>
    <!--/ right content section -->
    </div>
</section>
<!-- / account setting page -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>

<?php echo $__env->make('inc/datatable/scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- vendor files -->

<script src="<?php echo e(asset(mix('vendors/js/forms/select/select2.full.min.js'))); ?>"></script>

<script src="<?php echo e(asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))); ?>"></script>

<script src="<?php echo e(asset('js/scripts/cropper/cropper.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/crop.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<!-- Page js files -->
<script src="<?php echo e(asset('js/scripts/jquery.form.js')); ?>"></script>

<script>
  $("#account-name").on('input keyup keypress blur change', function(key) {
  $(this).val( $(this).val().replace(/[^A-Z0-9]/ig, "_"));
})
 $(document).ready(function() {

        $('.menu-travel').click((e) => {
            e.preventDefault();
            currentEle = $('.menu-travel.active')
            $($('.menu-travel.active').attr('href')).addClass('d-none fade');
            $('.menu-travel.active').removeClass('active');
            let ele = $(e.target).closest('a');
            ele.addClass('active');
            $(ele.attr('href')).removeClass('fade d-none');
        })

        $(".select2").select2();

        //   Change Password Script
        let changePasswordValidator = $("#change-password-form").validate({
            rules: {
                "password_confirmation": {
                    equalTo: "#password"
                }
            }
        });

        submitForm($("#change-password-form"), {
            formValidator: changePasswordValidator
            , submitBtn: "#change-password-submit"
            , complete: function() {
                $("#change-password-form")[0].reset();
                submitReset("#change-password-submit");
            }
        , });

        //   Change Email Script
        let emailPasswordValidator = $("#change-email-form").validate({
            rules: {
                "email_confirmation": {
                    equalTo: "#email"
                }
            }
        });

        submitForm($("#change-email-form"), {
            formValidator: emailPasswordValidator
            , submitBtn: "#change-email-submit"
            , success: function(data) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": false,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "showDuration": "300" ,
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                console.log(data);

                if (data.code == "warning") {
                    toastr.warning(data.message, data.title)
                } else if (data.code == "success") {
                    toastr.success(data.message, data.title)
                    $('.user-mail').text(data.email)
                    $("#change-email-form")[0].reset();
                    submitReset("#change-email-submit");
                }
            }
            , complete: function() {
                $("#change-email-form")[0].reset();
                submitReset("#change-email-submit");
            }
        , });


        // Basic info form
        //   Change Email Script
        let basicFormValidator = $("#basic-info-form").validate({});

        submitForm($("#basic-info-form"), {
            formValidator: basicFormValidator
            , submitBtn: "#basic-info-btn"
            , success: function(data) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": false,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "showDuration": "300" ,
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                if (data.code == "warning") {
                    toastr.warning(data.message, data.title)
                } else if (data.code == "success") {
                    toastr.success(data.message, data.title)
                    $('#addReferralCode').remove();
                    $('.referral-li').remove();
                    $('#account-pill-general').addClass('active');
                    $('#account-vertical-general').removeClass('fade d-none')

                }
            },

        });

        let referralValidator = $("#add-referral-form").validate({});

        submitForm($("#add-referral-form"), {
            formValidator: referralValidator
            , submitBtn: "#add-referral-submit",

            success: function(data) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": false,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "showDuration": "300" ,
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                if (data.code == "warning") {
                    toastr.warning(data.message, data.title)
                } else if (data.code == "success") {
                    toastr.success(data.message, data.title)
                    $('#addReferralCode').remove();
                    $('.referral-li').remove();
                    $('#account-pill-general').addClass('active');
                    $('#account-vertical-general').removeClass('fade d-none')

                }
            },

            complete: function(event, xhr) {
                submitReset("#add-referral-submit");
            }
        , });

        //  Resend email
        $(".resend-email-verification").click(function() {
            $("#resend-email-form").submit();

        });
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/zeroguess.us/public_html/n17/FFN/app/resources/views/account/index.blade.php ENDPATH**/ ?>