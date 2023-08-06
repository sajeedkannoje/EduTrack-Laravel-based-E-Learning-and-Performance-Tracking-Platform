<style>
body {
  max-width: 1920px;
  margin: 0 auto;
  background-color: white !important;
}
.navbar .nav-item a .menu-title {
    font-size: max(13px, 1.6em);
}
.header-navbar .nav-item>a,
.user-nav {
    font-size: 0.5208333333333334vw;
}
.header-navbar.floating-nav {
  max-width:1920px;
  width:100%;
  margin: 0 auto !important;
  left: 0px;
}
.header-navbar {
  margin-left: 0px !important;
}
.footer.footer-light.footer-static {
  background-color: #f9f9f9;
}
.nav-item>a {
    display: flex;
    align-items: center;
}

.user-name,
.user-status {
    font-size: max(13px, 1.3em) !important;
}

.dropdown-menu a:nth-of-type(2),
.dropdown-menu a:nth-of-type(3) {
    font-size: max(13px, 1rem);
}

.dropdown-menu .nav-link {
    flex-direction: column-reverse;
    margin-bottom: 30px;
}

.header-navbar .navbar-container ul.navbar-nav li.dropdown-user .dropdown-menu {
    height: max-content;
    min-width: 13rem;
    width: 100%;
    padding-bottom: 0;
}

.dropdown-menu a:nth-of-type(2) {
    border-bottom: 1px solid #c6c6c6cc;
    border-top: 1px solid #c6c6c6cc;
}

.user-nav {
    margin-top: 15px;
}

.dropdown-menu .nav-link {
    margin-bottom: 20px;
}

.user-nav span {
    display: flex;
    justify-content: center;
    width: 100%;
}

.avatar img {
    width: 60px;
    height: 60px;
}

.avatar {
    margin-right: 0.8rem;
}

.vertical-layout .header-navbar .navbar-container ul.navbar-nav li.dropdown .dropdown-menu {
    top: 25px !important;
    right: -10px;
    margin-top: 44px;
}

.nav-item i {
    font-size: 14px;
    margin-right: 10px !important;
    margin-top: 3px;
    color:forestgreen !important;
}

li.nav-item.module-ele.has-sub i {
    margin-top: -10px;
    margin-right: 16px !important;
}

.books-logo-icon img {

    width: 45px;

    height: 45px;

}

.books-logo-text {

    margin-left: 10px;

    margin-top: 13px;
}

.books-logo-text img {

    width: 62px;

    height: 15px;

    filter: invert(1);

}

.hidden_navbar {

    display: flex;
    align-items: flex-start;
    position: fixed;
    width:100%;
    top: 0px;
    left: 0px;
    padding-left: 20px;
    padding-top: 16px;
    padding-bottom: 16px;
    z-index: 5;
    display: none;
    background-color:white;
}

.course-account-dropdown {
    margin-top: 20px !important;
}

ul#main-menu-navigation .nav-item i {
    margin-top: -10px;
}

span.user-name.text-black.fw-bolder {
    text-transform: uppercase;
}

span.user-status.text-black.fw-bolder {
    text-transform: capitalize;
    font-weight: 100 !important;
}

.dropdown-menu.dropdown-menu-end.show {
    padding:0px;
}

#quiz-layout .card {
    width:40%;
}

#quiz-layout .card .card-header {
    line-height:1.4;
}

.btn-bitbucket {
    background-color: #228b22 !important;
    padding: 15px 24px;
}

.btn-bitbucket:hover {
    box-shadow: 0 8px 25px -8px forestgreen;
}

.-d-text {
    font-size: max(2em,13px);
    line-height: 1.7;
}

.justify-content-start #section-controls button {
    padding: 26px 67px;
}

.dropdown-near-logo {
    margin-top:60px !important;
}

#dropdown-user {
    margin-top:10px;
    margin-bottom:10px;
}

#account-vertical-general .media.d-grid.justify-content-center {
    display:flex !important;
    align-items:center;
}

.media.d-grid.justify-content-center #user_image{
    margin-bottom:0px !important;
}

.media.d-grid.justify-content-center .media-body.mt-75.ml-1 {
    margin-top:0px;
    margin-left:20px;
}

.fullname-span {
  font-size: max(13px, 1.3em) !important;
  line-height: 15px;
  text-align: center;
  margin-bottom: 0.435rem;
}

.header-navbar .navbar-container ul.navbar-nav li a.dropdown-user-link .user-nav {
  margin-right: 0px !important;
}

.course-competion-call {
    right: 40px;
    max-width: 200px;
}

.course-completion-info {
  top: 60px;
  padding: 4px 10px;
}
.card-first-section {
  width:100% !important;
  margin-right:40px !important;
}
.dashboard-link {
  transition: 0.3s ease-in-out;
}
.dashboard-link:hover {
  color: #1d1e1b !important;
}

/* module changes */
.single-section-content .column-content-wrapper {
  padding-bottom:15px;
}

@media  screen and (max-width:1280px) {
    .vertical-layout .header-navbar .navbar-container ul.navbar-nav li.dropdown .dropdown-menu {
        top: 15px !important;
        right: 50px;
    }
}

@media  only screen and (max-width:1200px){
    .hidden_navbar{
        display:flex;
    }
    ul#main-menu-navigation .nav-item i {
      margin-top: 2px;
    }

    li.nav-item.d-lg-none.d-md-none #dropdown-user img {
        margin-right:10px;
    }
    li.nav-item.d-lg-none.d-md-none #dropdown-user span {
        font-size:16px;
        margin-top:3px;
    }
    .page-head .text-black {
        font-size:22px !important;
    }
    #quiz-layout .card .m-4.p-5 {
        padding: 0px !important;
    }
    #quiz-layout .card .m-4.p-5 .font-medium-3 {
        font-size:16px !important;
    }
    .card-footer .submit-quiz, .reset-quiz, .btn-bitbucket {
        font-size:16px;
        padding:14px 15px;
    }
    .modern-nav-toggle svg.feather.feather-menu {
      margin-top:10px !important;
    }
    .course-completion-info {
      top:75px;
    }
}

@media  only screen and (max-width:900px){
  #quiz-layout .card {
    width:100%;
  }
  #quiz-layout .card.text-left {
    width: 100%;
  }
}

@media  screen and (max-width:767px) {
    .navbar-container.d-flex.content {
        display: none !important;
    }
    .hidden_navbar {
        z-index: 13 !important;
    }
    #quiz-layout .card .m-4.p-5 {
        margin:0px !important;
    }
    #quiz-layout .card .m-4.p-5 .font-medium-3 {
        font-size:14px !important;
    }
    .card-footer .submit-quiz, .reset-quiz, .btn-bitbucket {
        font-size:14px;
    }
    .modern-nav-toggle svg.feather.feather-menu {
      margin-top:5px !important;
    }
}

@media  only screen and (max-width:545px){
    .quiz-question-list-container {
        width:100%;
    }
}

@media  only screen and (max-width:397px){
    .card-footer .reset-quiz {
        margin-bottom:10px;
    }
}

</style>


<?php if($configData["mainLayoutType"] === 'horizontal' && isset($configData["mainLayoutType"])): ?>

<nav class="header-navbar d-lg-block d-md-block d-sm-none navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center <?php echo e($configData['navbarColor']); ?>"
    data-nav="brand-center">
    <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav">
        <div class="logo-icon">
                        <img src="<?php echo e(asset('images/logo/sidebar_logo.png')); ?>" alt="Website Logo" height="65px"
                            width="65px">
                    </div>
            <li class="nav-item">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <span class="brand-logo">
                    </span>
                    <div class="brand-text  pl-0 text-bold 'h4'"><span class='text-primary'>FOLLOW FOR NOW</span> <span
                            class="text-primary"><i class="text-dark">LIFE SKILLS 101</i></span></div>

                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                </a>
            </li>
        </ul>
    </div>
    <?php else: ?>

    <!-- navbar logo -->
    <div class="hidden_navbar">
            <div class="books-logo-icon">
                <img src="<?php echo e(asset('images/logo/sidebar_logo.png')); ?>" alt="Website Logo" height="65px"
                            width="65px">
            </div>
            <div class="books-logo-text">
                <img src="<?php echo e(asset('images/logo/sidebar_logo_txt.png')); ?>" alt="Website Name">
            </div>
        </div>

    <nav
        class="header-navbar navbar d-lg-block d-md-block d-sm-none navbar-expand-lg align-items-center <?php echo e($configData['navbarClass']); ?> <?php echo e($configData['navbarColor']); ?> <?php echo e(($configData['layoutWidth'] === 'boxed' && $configData['verticalMenuNavbarType']  === 'navbar-floating') ? 'container-xxl' : ''); ?>">
        <?php endif; ?>
        <div class="navbar-container d-flex content">
            <ul class="nav navbar-nav align-items-center ms-auto dashboard-navbar-ul">
                <?php if(isset($menuData[0]->menu[0]['my-couse-navbar'])): ?>
                <?php if($menuData[0]->menu[0]['my-couse-navbar'] === true &&  !isset($is_teacher)): ?>
                <li class="nav-item p-2">
                    <a href="<?php echo e(url('/dashboard')); ?>" class="">
                        <i class="fi  fi-br-grid"></i>
                        <span class="menu-title text-wrap text-dark ">Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item p-2">
                    <a href="<?php echo e(url('/my-certificate')); ?>" class="">
                        <i class="fi fi-br-diploma"></i>
                        <span class="menu-title text-wrap text-dark ">My Certificate</span>
                    </a>
                </li>

                <li class="nav-item p-2">
                    <a href=" <?php echo e(config('setting.url.site-url')); ?>#home-custom-footer" class="" target="_blank">
                        <i class="fi fi-br-link"></i>
                        <span class="menu-title text-wrap text-dark ">FFN Information and Links</span>
                    </a>
                </li>
                    <li class="nav-item p-2">
                    <a href="<?php echo e(url('/donation')); ?>" class="">
                        <i class="fi fi-br-hand-holding-heart"></i>
                        <span class="menu-title text-wrap text-dark ">Donation</span>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
                        data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="fi fi-br-portrait"></i>
                        <span class="menu-title text-wrap text-dark">Account</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end course-account-dropdown" aria-labelledby="dropdown-user">
                        <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user"
                            href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-black fw-bolder"><?php echo e(auth()->user()->fullName()); ?></span>
                                <span
                                    class="user-status text-black fw-bolder"><?php echo e(auth()->user()->getRoleNames()[0]); ?></span>
                            </div>
                            <span class="avatar">
                                <img class="round" src="<?php echo e(auth()->user()->profileImage()); ?>" alt="avatar" height="40"
                                    width="40">
                                <span class="avatar-status-online"></span>
                            </span>
                        </a>
                        <a class="dropdown-item" href="<?php echo e(route('account.index')); ?>">
                            <i class="me-50" data-feather="user"></i> Profile
                        </a>

                        

                        <form class="d-none" id="main-logout-form" data-btnload="true" method="POST"
                            action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                        </form>
                        <a class="dropdown-item log-out" href="logut-me">
                            <i class="me-50" data-feather="power"></i> Logout
                        </a>
                    </div>
                </li>
                <?php elseif(isset($is_teacher)): ?>
                <li class="nav-item p-2">
                    <a href="<?php echo e(url('/teacher-home')); ?>" class="">
                        <i class="fi  fi-br-grid"></i>
                        <span class="menu-title text-wrap text-dark ">Home</span>
                    </a>
                </li>
                
                <li class="nav-item p-2">
                    <a href="<?php echo e(url('/manage-scorecards')); ?>" class="">
                        <i class="fi fi-br-diploma"></i>
                        <span class="menu-title text-wrap text-dark ">Manage Scorecard</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a href=" <?php echo e(config('setting.url.site-url')); ?>#home-custom-footer" class="" target="_blank">
                        <i class="fi fi-br-link"></i>
                        <span class="menu-title text-wrap text-dark ">FFN Information and Links</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a href="<?php echo e(url('/donation')); ?>" class="">
                        <i class="fi fi-br-hand-holding-heart"></i>
                        <span class="menu-title text-wrap text-dark ">Donation</span>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
                        data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="fi fi-br-portrait"></i>
                        <span class="menu-title text-wrap text-dark">Account</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end course-account-dropdown" aria-labelledby="dropdown-user">
                        <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user"
                            href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-black fw-bolder"><?php echo e(auth()->user()->fullName()); ?></span>
                                <span
                                    class="user-status text-black fw-bolder"><?php echo e(auth()->user()->getRoleNames()[0]); ?></span>
                            </div>
                            <span class="avatar">
                                <img class="round" src="<?php echo e(auth()->user()->profileImage()); ?>" alt="avatar" height="40"
                                    width="40">
                                <span class="avatar-status-online"></span>
                            </span>
                        </a>
                        <a class="dropdown-item" href="<?php echo e(route('account.index')); ?>">
                            <i class="me-50" data-feather="user"></i> Profile
                        </a>

                        

                        <form class="d-none" id="main-logout-form" data-btnload="true" method="POST"
                            action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                        </form>
                        <a class="dropdown-item log-out" href="logut-me">
                            <i class="me-50" data-feather="power"></i> Logout
                        </a>
                    </div>
                </li>
                <?php endif; ?>
                <?php else: ?>
                <!-- navbar logo -->
                <div class="hidden_navbar">
                    <div class="books-logo-icon">
                        <img src="<?php echo e(asset('images/logo/sidebar_logo.png')); ?>" alt="Website Logo" height="65px"
                            width="65px">
                    </div>
                    <div class="books-logo-text">
                        <img src="<?php echo e(asset('images/logo/sidebar_logo_txt.png')); ?>" alt="Website Name">
                    </div>
                </div>

                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
                        data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="fi fi-br-portrait"></i>
                        <span class="menu-title text-wrap text-dark">Account</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end course-account-dropdown" aria-labelledby="dropdown-user">
                        <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user"
                            href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="text-black fw-bolder text-wrap fullname-span"><?php echo e(auth()->user()->fullName()); ?></span>
                                <span
                                    class="user-status text-black fw-bolder"><?php echo e(auth()->user()->getRoleNames()[0]); ?></span>
                            </div>
                            <span class="avatar">
                                <img class="round" src="<?php echo e(auth()->user()->profileImage()); ?>" alt="avatar" height="40"
                                    width="40">
                                <span class="avatar-status-online"></span>
                            </span>
                        </a>
                        <a class="dropdown-item" href="<?php echo e(route('account.index')); ?>">
                            <i class="me-50" data-feather="user"></i> Profile
                        </a>

                        

                        <form class="d-none" id="main-logout-form" data-btnload="true" method="POST"
                            action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                        </form>
                        <a class="dropdown-item log-out" href="logut-me">
                            <i class="me-50" data-feather="power"></i> Logout
                        </a>
                    </div>
                </li>

                <!-- <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
                        data-bs-toggle="dropdown" aria-haspopup="true">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name text-black fw-bolder"><?php echo e(auth()->user()->fullName()); ?></span>
                            <span
                                class="user-status text-black fw-bolder"><?php echo e(auth()->user()->getRoleNames()[0]); ?></span>
                        </div>
                        <span class="avatar">
                            <img class="round" src="<?php echo e(auth()->user()->profileImage()); ?>" alt="avatar" height="40"
                                width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end course-account-dropdown dropdown-near-logo" aria-labelledby="dropdown-user">
                        <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user"
                            href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-black fw-bolder"><?php echo e(auth()->user()->fullName()); ?></span>
                                <span
                                    class="user-status text-black fw-bolder"><?php echo e(auth()->user()->getRoleNames()[0]); ?></span>
                            </div>
                            <span class="avatar">
                                <img class="round" src="<?php echo e(auth()->user()->profileImage()); ?>" alt="avatar" height="40"
                                    width="40">
                                <span class="avatar-status-online"></span>
                            </span>
                        </a>
                        <a class="dropdown-item" href="<?php echo e(route('account.index')); ?>">
                            <i class="me-50" data-feather="user"></i> Profile
                        </a>

                        

                        <form class="d-none" id="main-logout-form" data-btnload="true" method="POST"
                            action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                        </form>
                        <a class="dropdown-item log-out" href="logut-me" >

                            <i class="me-50" data-feather="power"></i> Logout
                        </a>
                    </div>
                </li> -->
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->
    <script src="<?php echo e(asset('vendors/js/jquery/jquery.min.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('vendors/css/extensions/sweetalert2.min.css')); ?>">
<script src="<?php echo e(asset('vendors/js/extensions/sweetalert2.all.min.js')); ?>"></script>
<script >

    $('.log-out').click((e)=>{
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to log out?',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: 'No',
            confirmButtonColor: '#228b22',

            customClass: {
                actions: 'my-actions',
                cancelButton: 'order-1 right-gap',
                confirmButton: 'order-2',
                denyButton: 'order-3',
            }
            }).then((result) => {
            if (result.isConfirmed) {
                $('#main-logout-form').submit();
            }
            else if (result.isDenied) {
            }
            })

    })
</script>
<?php /**PATH /home/customer/www/zeroguess.us/public_html/n17/FFN/app/resources/views/panels/navbar.blade.php ENDPATH**/ ?>