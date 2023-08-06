<style>
    @font-face {
        font-family: "SF Pro Display Light";
        src: url("<?php echo e(asset('fonts/sf-pro-display/SFProDisplay-Light.woff')); ?>") format("woff"),
        url("<?php echo e(asset('fonts/sf-pro-display/SFProDisplay-Light.woff2')); ?>") format("woff2") ;
    }
    @font-face {
        font-family: "SF Pro Display";
        src: url("<?php echo e(asset('fonts/sf-pro-display/SFProDisplay-Regular.woff')); ?>") format("woff"),
        url("<?php echo e(asset('fonts/sf-pro-display/SFProDisplay-Regular.woff2')); ?>") format("woff2") ;
    }
    @font-face {
        font-family: "SF Pro Display Bold";
        src: url("<?php echo e(asset('fonts/sf-pro-display/SFProDisplay-Bold.woff')); ?>") format("woff"),
        url("<?php echo e(asset('fonts/sf-pro-display/SFProDisplay-Bold.woff2')); ?>") format("woff2") ;
    }
    html, body,h1,h2,h3,span,p,div,a {
        font-family:"SF Pro Display" !important;
    }
    body{
        max-width:1920px !important;
    }
    .main-menu div, .main-menu span{
        font-family:"SF Pro Display" !important;
    }
    html .content.app-content {
        padding-top: 100px;
        padding-right:0;
        padding-left: 0;
        margin-left: 330px;
    }
    .content-wrapper{
        padding-bottom:40px;
    }
    .footer{
        margin-left:330px !important;
    }
    .header-navbar {
        margin-top: 0 !important;
        background: white;
        margin-left: 60px !important;
        padding-right: 40px ;
    }
    .main-menu.menu-dark .navigation li.nav-item a:hover > *,.main-menu.menu-dark .navigation li.nav-item ul.menu-content li a:hover > *{
        transform:none ;
    }
    .border-top{
        border: 1px solid #d9d9d9 !important;
    }
    .card{
        padding:40px;
        margin:40px 40px 0 40px;
        background-color:#f9f9f9;
        box-shadow: none;
        border-radius: 20px;
    }
    .content-header{
        margin:0 !important;
    }
    .breadcrumb-wrapper{
        display:none;
    }
    .navbar .nav-item a svg{
        color:forestgreen;
    }
    .navbar .nav-item a .menu-title{
        font-weight:bolder;
        font-size:16px;
        line-height:20px;
    }
    .navbar .nav-item a .menu-title:hover{
        color:forestgreen !important;
    }


    @media(max-width:1200px) {
        html .content.app-content{
            margin-left:0;
        }
        .modern-nav-toggle{
            position: fixed !important;
            top: 0 !important;
            right: 0 !important;
            z-index: 15 !important;
            margin-top: 10px;
            margin-right: 20px;
        }
        .header-navbar {
            margin-left: 0 !important;
            margin-right: 0 !important;
            width: 100% !important;
            padding-right: 60px;
        }
        .footer{
            margin-left:0px !important;
        }
        .navigation .nav-item .dropdown-item {
            background: white !important;
            padding: 3px !important;
        }
        .dropdown-menu {
            transform: translate(105px, 12px) !important;
        }

        .font-s, .card-body p, .quiz-based-card > div {
            font-size:16px;
        }
    }
    @media(max-width:767.98px){
        .header-navbar.floating-nav {
            width: 100% !important;
        }

        .video-container video {
            width:100%;
            height:auto;
        }
    }

    @media  only screen and (max-width:600px){
        .font-s, .card-body p, .quiz-based-card > div {
            font-size: 14px;
            line-height: 19px;
        }
    }

</style><?php /**PATH C:\laragon\www\follow-for-now-life-skill\resources\views/panels/custom_style.blade.php ENDPATH**/ ?>