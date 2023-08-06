<?php $__env->startSection('title', 'Register Page'); ?>

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
  html body p {
  font-family: "SF Pro Display Regular";
  }
  .btn {
  font-family: "SF Pro Display Regular";
  }
  .content-body{
    display:flex;
  }
  .content-wrapper{
    margin-left:0 !important;
  }
  .j-flex{
    display:flex;
    justify-content:center;
    align-items:center;
  }
  .logo-wrapper{
    font-size: 0.5208333333333334vw;
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
    font-family: "SF Pro Display Regular";
  }
  .dark-clr::placeholder{
    color:black !important;
    font-family:"SF Pro Display Regular";
    font-weight: 300;
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
  .divider::after,.divider::before{
    content:"";
    width:100%;
    height:1px;
    background-color:#000000;
  }
  html .content.app-content{
    margin-left:0 !important;
  }
  .auth-register-form button svg {
    margin-right: 5px;
  }
  .fw-bolder svg.feather.feather-log-in.font-medium-4.align-top.dark-clr {
    margin-right:4px;
  }
  #refferalCodeBlock{
    margin-top: 20px;
  }
  .sign-up-as-teacher-label {
    font-size: 16px;
    color: black;
    border-color: black;
    font-family: "SF Pro Display Regular";
    font-weight: 600;
    margin-top: 1px;
  }
  #password_strength {
    color: red;
    background-color: transparent;
    height: 22px;
    position: absolute;
    right: 39px;
    top: 14px !important;
  }
  #register-password-error, #register-password-confirm-error, #referral-code-error {
    position: absolute;
    bottom:-20px;
    color: red;
    left: 0px;
  }
  #register-email-error, #register-username-error{
    color:red;
  }
  .mb-1.shadow-none.register-form-input-container {
    margin-bottom: 25px !important;
  }
  #register-firstname-error, #register-lastname-error {
    color: red;
  }
  .sign-in-btn {
    transition: 0.3s ease-in-out;
  }
  .sign-in-btn:hover {
    color: black !important;
  }
  #referral-code-tooltip {
    position: relative;
  }
  #referral-code-tooltip i {
    box-shadow: none !important;
    position: absolute;
    top: -2px;
  }
  #referral-code-tooltip i img {
    width:25px;
    padding: 0px !important;
    margin-left: 10px;
  }
  .referral-call {
   position: absolute;
   width: 140%;
   left: 100%;
   box-shadow: 0px 0px 12px -4px forestgreen !important;
   top: 35px;
   background-image: none;
   color: black !important;
   background-color: white;
   border: 1px solid forestgreen;
}
.referral-call:focus, .referral-call:active {
  background-image: none;
  background-color: white;
}
.referral-call::after {
  content: '';
  width: 0px;
  height: 0px;
  z-index: 9;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-bottom: 10px solid forestgreen;
  top: -10px;
  left: 5%;
  position: absolute;
}
.referral-call::before {
  z-index: 10;
content: '';
width: 0px;
height: 0px;
border-left: 11px solid transparent;
border-right: 11px solid transparent;
border-bottom: 10px solid white;
top: -8px;
left: 10px;
position: absolute;
}
.app-login-logo {
  cursor: default !important;
}
::placeholder {
  color: #6e6b7b;
}

  /* Width(1280px) */
  @media(max-width:1279px){
    .logo-wrapper {
      position: relative;
      right: 100%;
      margin-right: -100%;
      left: 0;
      z-index: 2;
      background-position-x: 55em,75em,-2.5em,-8em,178em,180em;
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
  .register-logo-wrapper {
    background-position: center;
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
    .register-form-input-container input {
      padding-top: 6px !important;
      padding-bottom:6px !important;
    }
    .toggle-btn {
      font-size: 30px;
    }
    .create-account-txt span {
      font-size:16px;
    }
    #password_strength {
      top: 6px !important;
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
    .referral-call {
      width:100%;
      position: initial;
      margin-top: 10px;
      left: 0px;
    }
    .referral-call::before {
    border-top: 0px solid white;
    border-bottom: 10px solid white;
    top: 26px;
    left: 172px;
    }
    .referral-call::after {
      border-top: 0px solid white;
    border-bottom: 9px solid forestgreen;
    top: 25px;
    left: 173px;
    }
  }

  @media  only screen and (max-width:434px){
    .sign-up-as-teacher-label {
      margin-top: -2px;
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
<div class="j-flex logo-wrapper register-logo-wrapper">
  <div class="j-flex logo-container">
    <a class="logo app-login-logo"><img src="<?php echo e(asset('images/logo/site_logo.png')); ?>" alt="website logo"></a>
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
  <div class=" my-2">
    <!-- Register Basic -->
    <div class=" mb-0 w-100 h-100">
      <div class="card-body w-100">
      <div class="toggle">


          <a href="<?php echo e(route('login')); ?>" class="toggle-btn ">Login</a>
          <a href="<?php echo e(route('register')); ?>" class="toggle-btn active">Signup</a>
        </div>
        

        <form class="auth-register-form mt-2 mb-2" id="register-form" method="POST" action="<?php echo e(route('register')); ?>">
          <?php echo csrf_field(); ?>
          <div class="d-flex">
          <div class="mb-1 me-1 register-form-input-container">
            <label for="register-username" class="form-label fw-bolder dark-clr font-m">First Name*</label>
            <input
              type="text"
              class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border-0 border-bottom bg-transparent shadow-none rounded-0 py-1 ps-0 dark-clr font-m"
              id="register-firstname"
              name="firstname"
              placeholder="First Name"
              aria-describedby="register-firstname"
              tabindex="1"
              autofocus
              value="<?php echo e(old('firstname')); ?>"
            />
            <?php $__errorArgs = ['firstname'];
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
          <div class="mb-1 register-form-input-container">
            <label for="register-lastname" class="form-label fw-bolder dark-clr font-m">Last Name*</label>
            <input
              type="text"
              class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border-0 border-bottom bg-transparent shadow-none rounded-0 py-1 ps-0 dark-clr font-m"
              id="register-lastname"
              name="lastname"
              placeholder="Last Name"
              aria-describedby="register-lastname"
              tabindex="1"
              autofocus
              value="<?php echo e(old('lastname')); ?>"
            />
            <?php $__errorArgs = ['lastname'];
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
          </div>
          <div class="mb-1 register-form-input-container">
            <label for="register-username" class="form-label fw-bolder dark-clr font-m">Username*</label>
            <input
              type="text"
              class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border-0 border-bottom bg-transparent shadow-none rounded-0 py-1 ps-0 dark-clr font-m"
              id="register-username"
              name="name"
              placeholder="Username"
              aria-describedby="register-username"
              tabindex="1"
              autofocus
              value="<?php echo e(old('name')); ?>"
            />
            <?php $__errorArgs = ['name'];
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
          <div class="mb-1 shadow-none register-form-input-container">
            <label for="register-email" class="form-label fw-bolder dark-clr font-m">Email*</label>
            <input
              type="text"
              class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border-0 border-bottom bg-transparent shadow-none rounded-0 py-1 ps-0 dark-clr font-m"
              id="register-email"
              name="email"
              placeholder="Email Address"
              aria-describedby="register-email"
              tabindex="2"
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

          <div class="mb-1 shadow-none register-form-input-container">
            <label for="register-password" class="form-label fw-bolder dark-clr font-m">Password*</label>

            <div class="input-group input-group-merge form-password-toggle <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> shadow-none">
              <input
                type="password"
                class="form-control form-control-merge <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border-0 border-bottom bg-transparent shadow-none rounded-0 py-1 ps-0 dark-clr font-m"
                id="register-password"
                name="password"
                placeholder="Password"
                aria-describedby="register-password"
                tabindex="3"
                onkeyup="CheckPasswordStrength(this.value)"
              />
              <span id="password_strength"></span>
              <span class="input-group-text cursor-pointer border-0 border-bottom bg-transparent shadow-none rounded-0 dark-clr"><i data-feather="eye"></i></span>

            </div>
            <?php $__errorArgs = ['password'];
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

          <div class="mb-1 shadow-none register-form-input-container">
            <label for="register-password-confirm" class="form-label fw-bolder dark-clr font-m">Confirm Password*</label>

            <div class="input-group input-group-merge form-password-toggle shadow-none">
              <input
                type="password"
                class="form-control form-control-merge border-0 border-bottom bg-transparent shadow-none rounded-0 py-1 ps-0 dark-clr font-m"
                id="register-password-confirm"
                name="password_confirmation"
                placeholder="Confirm Password"
                aria-describedby="register-password"
                tabindex="3"
              /><span class="input-group-text cursor-pointer border-0 border-bottom bg-transparent shadow-none rounded-0 dark-clr"><i data-feather="eye"></i></span>
            </div>
          </div>

          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="teacher_mode" onclick="teacherMode(this)" id="signUpAsTeacher">
            <label class="form-check-label sign-up-as-teacher-label" for="signUpAsTeacher">Sign up as Teacher or Workgroup Supervisor</label>
          </div>

          <div class="mb-1 shadow-none register-form-input-container" id="refferalCodeBlock">
            <label id="referral-code-tooltip" for="referral-code" class="form-label fw-bolder dark-clr font-m">Referral Code <span class="">(optional)</span>
              <img src="<?php echo e(asset('images/teachers/homepage/new-icon.png')); ?>" class="btn btn-sm info-icon-fixed referral-tool-tip">
              <div class="referral-call bg-gradient-primary text-white zindex-4 d-none fw-bold text-primary p-1 rounded-3">
                  If you would like scores to also be sent to your teacher or workgroup supervisor you must enter a referral code that you can get from your teacher or supervisor (which they will get when they create an account)
              </div>
            </label>
            <div class="input-group input-group-merge shadow-none">
              <input
                type="text"
                class="form-control form-control-merge border-0 border-bottom bg-transparent shadow-none rounded-0 py-1 ps-0 dark-clr font-m"
                id="referral-code"
                name="referral_code"
                placeholder="Referral Code"
                value="<?php echo e(old('referral_code')); ?>"
              />
            </div>

            <?php $__errorArgs = ['referral_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="text-danger" role="alert">
                <strong><?php echo e($message); ?></strong>
              </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

          </div>

          
          <button type="submit" class="btn btn-primary w-100 font-l mt-1" tabindex="5"><i data-feather="user-plus" class=" font-medium-3 align-center ms-1"></i>Create Account </button>
        </form>
        <p class="d-flex divider dark-clr align-items-center">
          <span class="mx-2 font-l">or</span>
        </p>
        <p class="text-center mt-2 mx-1 create-account-txt">
          <span class="fw-bold dark-clr font-l">Already have an account ? </span>
          <?php if(Route::has('login')): ?>
          <a href="<?php echo e(route('login')); ?>">
            <span class="fw-bolder font-l sign-in-btn"><i data-feather="log-in" class=" font-medium-4 align-top dark-clr"></i>Sign in </span>
          </a>
          <?php endif; ?>
        </p>

        

        

        <div class="auth-footer-btn d-flex justify-content-center">

          
          
          

        </div>
      </div>
    </div>
    <!-- /Register basic -->
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('vendors/js/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/js/forms/validation/jquery.validate.min.js')); ?>"></script>
<script>
   $("#register-username").on('input keyup keypress blur change', function(key) {$(this).val( $(this).val().replace(/[^A-Z0-9]/ig, "_"));})
   $("#register-form" ).validate({
      rules: {
        name: 'required',
        lastname: 'required',
         email: {
            required: true,
            email: true, //add an email rule that will ensure the value entered is valid email id.
            maxlength: 255,
         },
         password:{
          required: true,
          minlength : 6
         },
         password_confirmation : {
          required: true,
              minlength : 6,
              equalTo : "#register-password"
          }
      }
   });
</script>
<script>
  var signUpAsTeacher = document.getElementById("signUpAsTeacher");
  var block = document.getElementById("refferalCodeBlock");
  if(signUpAsTeacher.checked == true){
      block.style.display = 'none';
    }else{
      block.style.display = 'block';
  }
  const teacherMode = ()=>{
    if(signUpAsTeacher.checked == true){
        block.style.display = 'none';
      }else{
        block.style.display = 'block';
      }
  }
</script>
<script type="text/javascript">
  function CheckPasswordStrength(password) {
      var password_strength = document.getElementById("password_strength");

      //TextBox left blank.
      if (password.length == 0) {
          password_strength.innerHTML = "";
          return;
      }

      //Regular Expressions.
      var regex = new Array();
      regex.push("[A-Z]"); //Uppercase Alphabet.
      regex.push("[a-z]"); //Lowercase Alphabet.
      regex.push("[0-9]"); //Digit.
      regex.push("[$@$!%*#?&]"); //Special Character.

      var passed = 0;

      //Validate for each Regular Expression.
      for (var i = 0; i < regex.length; i++) {
          if (new RegExp(regex[i]).test(password)) {
              passed++;
          }
      }

      //Validate for length of Password.
      if (passed > 2 && password.length > 8) {
          passed++;
      }

      //Display status.
      var color = "";
      var strength = "";
      switch (passed) {
          case 0:
          case 1:
              strength = "Weak";
              color = "red";
              break;
          case 2:
              strength = "Good";
              color = "darkorange";
              break;
          case 3:
          case 4:
              strength = "Strong";
              color = "green";
              break;
          case 5:
              strength = "Very Strong";
              color = "darkgreen";
              break;
      }
      password_strength.innerHTML = strength;
      password_strength.style.color = color;
  }
  $("input[type='text']").on('keyup',(e)=>{
   $(e.target).siblings('.invalid-feedback').hide()
    $(e.target).removeClass('is-invalid')
  });
  $('.referral-tool-tip').click((e) => {
      e.preventDefault();
      $('.referral-call').toggleClass('d-none');
})
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/fullLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/zeroguess.us/public_html/n17/FFN/app/resources/views//auth/register.blade.php ENDPATH**/ ?>