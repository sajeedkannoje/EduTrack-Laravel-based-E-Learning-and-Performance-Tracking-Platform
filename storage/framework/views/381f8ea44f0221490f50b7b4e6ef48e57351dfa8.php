

<?php $__env->startSection('title', 'Login Page'); ?>

<?php $__env->startSection('page-style'); ?>

<link rel="stylesheet" href="<?php echo e(asset(mix('css/base/pages/authentication.css'))); ?>">
<style>
  @font-face {
    font-family: "SF Pro Display Bold";
    src: url("<?php echo e(asset('fonts/sf-pro-display/SFProDisplay-Bold.woff')); ?>") format("woff"),
    url("<?php echo e(asset('fonts/sf-pro-display/SFProDisplay-Bold.woff2')); ?>") format("woff2") ;
  }
  @font-face {
    font-family: "SF Pro Display Regular";
    src: url("<?php echo e(asset('fonts/sf-pro-display/SFProDisplay-Regular.woff')); ?>") format("woff"),
    url("<?php echo e(asset('fonts/sf-pro-display/SFProDisplay-Regular.woff2')); ?>") format("woff2") ;
  }
  ul,li{
    list-style:none;
    padding:0;
    margin:0;
  }
  html body{
    font-family: "SF Pro Display Regular";
  }
  .content-body{
    display:flex;
  }
  .content-wrapper{
    margin-left:0 !important;
  }
  .font-s{
    font-size:14px;
  }
  .font-m{
    font-size:16px;
  }
  .font-l{
    font-size:20px;
  }
  .j-flex{
    display:flex;
    justify-content:center;
    align-items:center;
  }
  .logo-wrapper{
    font-size:max(7px,0.5208333333333334vw);
    width: 100%;
    display: grid;
    background-color: #f3f5ee;
    background-image: url('<?php echo e(asset('/images/logo_bg/login_logo_bg.png')); ?>');
    background-repeat:no-repeat;
    background-position:center;
    background-size:cover;
  }
  .logo-container {
  height: 100%;
  position: absolute;
  width: 50%;
  }
  .nav-wrapper{
    position: absolute;
    bottom: 60px;
    width: 50%;
    left: 0;
  }
  .nav-wrapper .nav-link{
    color:#000000;
    font-size: 16px;
    line-height: 124px;
    font-weight: 500;
    font-family: "SF Pro Display Bold";
  }
  .nav-wrapper .nav-link:hover{
    color: #228c22;
    transition:0.3s ease;
  }
  .toggle{
    display:flex;
    justify-content:flex-start;
    align-items: center
  }
  .toggle-btn{
    text-decoration:none;
    font-size: 36px;
    line-height: 46px;
    color: #000000;
    font-weight: 800;
    font-family: "SF Pro Display Bold";
    margin-right:30px;
  }
  .toggle-btn:hover,.toggle-btn:active{
    color: #228c22;
    transition: 0.3s ease;
  }
  .active{
    color: #228c22;
  }
  .dark-clr{
    color:black !important;
    border-color:black !important;
  }
  .dark-clr::placeholder{
    color:black !important;
    font-weight: 300;
  }
  .divider::after,.divider::before{
    content:"";
    width:100%;
    height:1px;
    background-color:#000000;
  }
  html .content.app-content{
    margin-left:0 !important;
  }
  .auth-login-form button svg {
    margin-right: 5px;
  }
  .fw-bolder svg.feather.feather-user-plus.font-medium-4.align-top.dark-clr {
    margin-left:5px;
  }
  .forgot-password, .create-account  {
    transition: 0.3s ease-in-out;
  }
  .forgot-password:hover {
    color: #228b22 !important;
  }
  .create-account:hover  {
    color: black !important;
  }
  .login-form-input-container {
    margin-bottom: 25px !important;
  }
  #login-password-error {
    position: absolute;
    bottom: -20px;
    width: 50%;
    left: 0;
    color: red;
  }
  #login-email-error {
    color: red;
  }



  /* Width(1280px) */
  @media(max-width:1279px){
    .logo-wrapper {
      position: relative;
      right: 100%;
      margin-right: -100%;
      left: 0;
      z-index: 2;
    }
    .logo-container {
      width: 50%;
      justify-content: flex-start;
      padding: 20px;
      align-items: baseline;
    }
    .nav-wrapper {
      top: 0;
      width: 100%;
      justify-content: end;
      align-items: baseline;
      z-index:2;
      padding:20px;
    }
    .logo {
      font-size: 2.1796875vw;
      z-index:3;
    }
    .logo img {
      width: 7em;
      min-width: 110px;
    }
    .auth-wrapper> div{
      z-index:2;
      padding-top:30px;
    }
    .logo img {
      width: 128px;
  }
  .auth-wrapper.auth-basic {
    align-items: flex-start;
    margin-top:130px;
  }
}

@media  only screen and (max-width:990px){
  .logo img {
    width:90px;
    min-width:auto;
  }
  .nav-wrapper {
    margin-top:-20px;
  }
  .login-form-input-container input {
    padding-top: 6px !important;
    padding-bottom:6px !important;
  }
  .toggle-btn {
    font-size: 30px;
  }
  .create-account-txt span {
    font-size:16px;
  }
}

@media  only screen and (max-width:480px){
  .auth-wrapper .my-2 {
    width:100%;
  }
  .create-account-txt span {
    display: block;
    margin-bottom: 6px;
  }
  .nav-wrapper .nav-link {
    font-size:14px;
  }
  .auth-wrapper.auth-basic {
    margin-top:90px;
  }
  .toggle-btn {
    font-size: 26px;
  }
}

@media  only screen and (max-width:380px){
  .login-form-input-container label, .login-form-input-container a {
    font-size:14px;
  }
  .nav-wrapper .nav-link {
    font-size: 14px;
    padding-left: 10px;
    padding-right:0px;
  }
  .logo img {
    width: 70px;
  }
  .nav-wrapper {
    margin-top: -30px;
  }
}


</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="j-flex logo-wrapper">
  <div class="j-flex logo-container">
    <a class="logo"><img src="<?php echo e(asset('images/logo/site_logo.png')); ?>" alt="website logo"></a>
  </div>
  <!-- <nav>
    <ul class="j-flex nav-wrapper">
      <li><a href="#" class="nav-link">Home</a></li>
      <li><a href="#" class="nav-link">About</a></li>
      <li><a href="#" class="nav-link">Privacy</a></li>
      <li><a href="#" class="nav-link">Terms</a></li>
    </ul>
  </nav> -->
</div>
<div class="auth-wrapper auth-basic px-2">
  <div class="my-2">
    <!-- Login basic -->
    <div class="mb-0 w-100 h-100 login-home-form-container">
      <div class="card-body w-100">
        <div class="toggle">
          <a href="<?php echo e(route('login')); ?>" class="toggle-btn active">Login</a>
          <a href="<?php echo e(route('register')); ?>" class="toggle-btn">Signup</a>
        </div>
        <form class="auth-login-form mt-2" id="login-form" method="POST" action="<?php echo e(route('login')); ?>">
          <?php echo csrf_field(); ?>
          <div class="mb-1 login-form-input-container">
            <label for="login-email" class="form-label fw-bolder dark-clr font-m">Email*</label>
            <input
              type="text"
              class=" form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border-0 border-bottom bg-transparent shadow-none rounded-0 py-1 ps-0 dark-clr font-m"
              id="login-email"
              name="email"
              placeholder="Email Address"
              aria-describedby="login-email"
              tabindex="1"
              autofocus
              value="<?php echo e(old('email')); ?>"
            />
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
              </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="mb-1 login-form-input-container">
            <div class="d-flex justify-content-between">
              <label class="form-label fw-bolder dark-clr font-m" for="login-password">Password*</label>

            </div>
            <div class="input-group input-group-merge form-password-toggle shadow-none">
              <input
                type="password"
                class="form-control form-control-merge border-0 border-bottom bg-transparent shadow-none rounded-0 py-1 ps-0 dark-clr font-m"
                id="login-password"
                name="password"
                tabindex="2"
                placeholder="Password"
                aria-describedby="login-password"
              />

              <span class="input-group-text cursor-pointer border-0 border-bottom bg-transparent shadow-none rounded-0 dark-clr"><i data-feather="eye"></i></span>
              <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback d-block text-md-left" role="alert">
                <strong><?php echo e($message); ?></strong>
              </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>
          </div>
          <div class="mb-1 login-form-input-container">
            <div class="form-check">
              <input class="form-check-input border-primary rounded-0" type="checkbox" id="remember" name="remember" tabindex="3" <?php echo e(old('remember') ? 'checked' : ''); ?> />

              <label class="form-check-label dark-clr font-m" for="remember"> Remember Me </label>
              <?php if(Route::has('password.request')): ?>
              <a class="float-end dark-clr font-m forgot-password" href="<?php echo e(route('password.request')); ?>">
                Forgot Password ?
              </a>
              <?php endif; ?>
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100 font-l mb-1 mt-1" tabindex="4"><i data-feather="log-in"class=" font-medium-3 align-center"></i>Log In </button>
        </form>
        <p class="d-flex divider dark-clr align-items-center">
          <span class="mx-2 font-l">or</span>
        </p>
        <p class="text-center mt-2 mx-1 create-account-txt">
          <span class="dark-clr font-l">New to Our Platform ? </span>
          <?php if(Route::has('register')): ?>
          <a href="<?php echo e(route('register')); ?>">
            <span class="fw-bolder font-l create-account"> <i data-feather="user-plus" class=" font-medium-4 align-top dark-clr"></i> Create an Account </span>
          </a>
          <?php endif; ?>
        </p>

        

      </div>
    </div>
    <!-- /Login basic -->
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('vendors/js/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/js/forms/validation/jquery.validate.min.js')); ?>"></script>
<script>
   $("#login-form" ).validate({
      rules: {
        email: {
            required: true,
            email: true, //add an email rule that will ensure the value entered is valid email id.
            maxlength: 255,
         },
         password:{
          required: true,

         },
      }
   });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/fullLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\follow-for-now-life-skill\resources\views//auth/login.blade.php ENDPATH**/ ?>