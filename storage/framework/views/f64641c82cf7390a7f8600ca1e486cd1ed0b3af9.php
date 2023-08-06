<?php $__env->startSection('title', 'Donation'); ?>

<?php $__env->startSection('page-style'); ?>
  <style>
      @import  url(https://fonts.googleapis.com/css?family=Oswald:400,700,300);
    @import  url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,600);
/* body {
  background-color: #24282e;
  font-family: "Open Sans", sans-serif;
  display: flex;
  justify-content: center;
  padding: 50px 0;
} */

.donate {
  /*padding: 50px*/
  background-color: #ffffff;
  color: rgb(0, 0, 0);
}

.donate p {
  line-height: 24px;
  font-size: 14px;
  font-weight: 300;
}

.donate h3 {
  font-size: 20px;
  line-height: 24px;
  color: black;
  font-weight: 300;
  margin-bottom: 30px;
}

.denomination {
  float: left;
  width: 33%;
  text-align: center;
  padding: 13px 0;
  cursor: pointer;
  background-color: transparent;
  margin: 0 1px 1px 0;
  transition: background-color 0.2s ease;
  border-radius: 10px;
}

.denomination label {
  font-weight: 600;
  cursor: pointer;
}

.denomination input {
  left: -10001px;
  position: absolute;
}

.denomination-other {
  width: 99.8%;
}

.denomination-other input {
  position: relative;
  font-size: 14px;
  font-weight: 600;
  width: inherit;
  text-align: center;
  background-color: forestgreen;
  border: none;
  padding: 13px 0;
  transition: 0.3s ease-in-out;
    border-radius: 10px;
    margin-top: 20px;
    color: white;
}
.make-payment {
  color: white;
}
.denomination-other input:hover, .make-payment:hover {
  box-shadow: 0 8px 25px -8px forestgreen;
}

.denomination-other input:before {
  position: absolute;
  left: 6px;
  top: 2px;
  content: "$";
}

.donate-amount .selected, .denomination-other input.selected, .donate-amount .denomination:hover {
  background-color: #228b22;
  color: white;
  border: 0;
}

.donate-text h2 {
  font-family: "Oswald", sans-serif;
  color: #228b22;
  font-size: 32px;
  margin-bottom: 20px;
}

.donate-type label,
.donate-payment label {
  font-size: 14px;
  font-weight: 300;
  margin-right: 30px;
}

.donate-blue {
  background-color: #ffffff;
  padding: 25px;
}

.donate-text {
  padding: 25px;
}

.donate-text p {
  font-size: 16px;
  line-height: 24px;
}

.donate-submit button {
  font-family: "Oswald", sans-serif;
  width: 100%;
  background-color: forestgreen;
  border: none;
  font-size: 20px;
  line-height: 20px;
  padding: 14px 0;
  margin: 30px 0;
  text-transform: uppercase;
  cursor: pointer;
  transition: 0.3s ease-in-out;
  border-radius: 10px;
}

.donate-submit small {
  color: black;
  font-size: 16px;
  font-weight: bold;
}

::-webkit-input-placeholder {
  color: #FFF;
  font-size: 14px;
  font-weight: 300;
}

:-moz-placeholder {
  color: #FFF;
  font-weight: 300;
}

::-moz-placeholder {
  color: #FFF;
  font-weight: 300;
}

:-ms-input-placeholder {
  font-weight: 300;
  color: #FFF;
}

*:focus {
  outline: none;
}
#donation-alert-danger {
  width:auto;
  margin: 0 40px
}
.donate-flex-container {
  display:flex;
  justify-content: space-between;
  box-shadow: 0px 0px 12px -4px #000000 !important;
  border-radius: 20px;
  background-color: white;
}
.donate-black, .donate-blue {
  width:50%;
}
.donate-blue {
  border-top-right-radius: 20px;
  border-bottom-right-radius: 20px;
}
.mailtobill {
  transition: 0.3s ease-in-out;
}
.mailtobill:hover {
  color: #3c3c3c;
  text-decoration: underline;
}
.donate-black img {
  border-top-left-radius: 20px;
  border-bottom-left-radius: 20px;
}
.donate-black img {
  width: 100%;
  height: 100%;
}
#donate_amount-error {
  font-size: 16px;
  color: red;
  margin-top: 10px;
}
@media  only screen and (max-width:900px){
  .donate-flex-container {
    flex-direction: column;
  }
  .donate-black, .donate-blue {
    width: 100%;
}
.donate-black img {
  border-top-right-radius: 20px;
  border-bottom-left-radius: 0px;
}
.donate-blue {
    border-top-right-radius: 0px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
}
}

@media  only screen and (max-width:500px){
  .donate {
    padding: 20px !important;
  }
  .donate-text {
    padding: 10px;
  }
  .donate p {
    font-size: 14px;
    line-height: 20px;
  }
  .donate-submit small {
    font-size: 14px;
  }
}

@media  only screen and (max-width:420px){
  .donate-text h2 {
    font-size: 16px;
    margin-bottom:15px;
  }
  .donate-text p {
    font-size: 14px;
    line-height: 20px;
}
.denomination {
  padding: 10px 0px;
  width: 49%;
}
.donate-submit button {
  font-size: 16px;
  margin: 20px 0px;
}
}
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<?php if(!Auth::user()->referred_by && auth()->user()->hasRole('student')): ?>
  <div class="alert alert-danger" id="donation-alert-danger" role="alert">
    <h4 class="alert-heading text-center"><i class="fi fi-br-bell-ring mx-1"></i> Referral code is not set!</h4>
    <p class="m-1 text-center">Please update your referral code. Otherwise, we will not able to generate your scorecard.</p>
    <p class="m-1 text-center">"You can get Referral code from your teacher."</p>
    <p class="m-1 text-center"><a href="<?php echo e(url('/account')); ?>" class="alert-link">Click here to update your Referral Code. </a> </p>
  </div>
<?php endif; ?>

<div class="total-container">
  <div class="card donate">
     <form action="<?php echo e(Route('processTransaction')); ?>" id="donation-form" method="post">
          <?php echo csrf_field(); ?> 
          <div class="donate-text">
            <h2>Donate</h3>
            <p>It took years of work to collect and finalize the content of Follow For Now.  On top of that effort there were design and development costs.  Maintenance, hosting, and content additions and editing fees keep the website current and online from month-to-month.</p>
            <p>To cover the money already spent, preserve the user experience and keep the site free, and continue with new projects will take money.  My goal is to raise $50,000+.  If you are a teacher using this coursework for a class or a supervisor using this material for a workgroup, are able to contribute, and need a benchmark, I would suggest a contribution of $2-$5 per student.</p>
            <p>Thank you for whatever contribution you feel comfortable making.</p>
          </div>
          <div class="donate-flex-container">
            <div class="donate-black">
                <img src="<?php echo e(asset('images/donation-image/ezgif.com-gif-maker.gif')); ?>" alt="">
            </div>

            <!-- <div class="donate-text">
              <h2>Donate</h3>
              <p>It took years of work to collect and finalize the content of Follow For Now.  On top of that effort there were design and development costs.  Maintenance, hosting, and content additions and editing fees keep the website current and online from month-to-month.</p>
              <p>To cover the money already spent, preserve the user experience and keep the site free, and continue with new projects will take money.  My goal is to raise $50,000+.  If you are a teacher using this coursework for a class or a supervisor using this material for a workgroup, are able to contribute, and need a benchmark, I would suggest a contribution of $2-$5 per student.</p>
              <p>I’m accepting donations via PayPal (one of the companies I’m invested in).  All you need to do is email me at <a class="mailtobill" href="mailto:bill@followfornow.org">bill@followfornow.org</a> with the amount you’d like to donate and I’ll send back a PayPal request with a link allowing you to donate with either a credit/debit card or money in your PayPal account balance.</p>
              <p>Thank you for whatever contribution you feel comfortable making.</p>
            </div> -->

            <div class="donate-blue">
              <h3>Donation amount</h3>
              <div class="donate-amount-box">
                <div class="donate-amount">

                  <div class="denomination selected">
                    <input autocomplete="off" type="radio" name="amount" id="amount1" value="1" checked="">
                    <label for="amount1">$1</label>
                  </div>
                  <div class="denomination">
                    <input autocomplete="off" type="radio" name="amount" id="amount2" value="2">
                    <label for="amount2">$2</label>
                  </div>
                  <div class="denomination">
                    <input autocomplete="off" type="radio" name="amount" id="amount3" value="3">
                    <label for="amount3">$3</label>
                  </div>
                  <div class="denomination">
                    <input autocomplete="off" type="radio" name="amount" id="amount4" value="4">
                    <label for="amount4">$4</label>
                  </div>
                  <div class="denomination">
                    <input autocomplete="off" type="radio" name="amount" id="amount5" value="5">
                    <label for="amount5">$5</label>
                  </div>
                  
                </div>
                <div class="denomination-other">
                    <input autocomplete="off"  class="amount" type="number" name="donate_amount" value="<?php echo e(old('donate_amount')); ?>" placeholder="Enter Other Amount*">
                  </div>
                  <?php $__errorArgs = ['donate_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="alert alert-danger" role="alert">
                      <strong><?php echo e($message); ?></strong>
                    </span>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  <?php if($message = Session::get('exception')): ?>
                  <span class="alert alert-danger" role="alert">
                    <strong><?php echo e($message); ?></strong>
                  </span>
                  <?php endif; ?>
              </div>

              <div class="donate-payment">
                <div class="donate-submit">
                  <button type="submit" class="make-payment" autocomplete="off">Donate</button>
                </div>
              </div>
            </div>
          </div>

</form> 
  </div>
</div>




  <?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('vendors/js/forms/validation/jquery.validate.min.js')); ?>"></script>
<script src="https://js.stripe.com/v3/"></script>
<script >
    $(".denomination").click(function(event) {
  $(".denomination").removeClass("selected").prop('checked', false);
  $(".denomination-other input").removeClass("selected").val('');
  $(this).addClass("selected");
  $(this).children(":first").prop('checked', true);
  $(".make-payment").text('Donate $' + $(this).children(":first").val())
  $('.amount').val( $(this).children(":first").val());
});

// $(".denomination-other input").on('keyup', function (event) {
//   // allow only int values
//   // TODO: remove leading 0
//   // var regex = new RegExp("^[0-9]+$");
//   // var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
//   // if (!regex.test(key)) {
//   //   event.preventDefault();
//   //   return false;
//   // }

//   // $(".denomination").removeClass("selected").prop('checked', false);
//   // $(this).addClass("selected");
//   // $(".make-payment").text('Donate $' + $(this).val() + key );
//   let amountVal = $('.amount').val();
//     let messageVal;
//     if(amountVal != null && amountVal != ''){messageVal = `Donate $ ${amountVal}`;}else{messageVal = '';}
//   // $(this).addClass("selected");
//   $(".make-payment").text(`Donate ${messageVal}`);
// });
$('.denomination-other input').unbind('keyup change input paste').bind('keyup change input paste',function(e){
    var $this = $(this);
    var val = $this.val();
    var valLength = val.length;
    var maxCount = 6;
    if(valLength>maxCount){
        $this.val($this.val().substring(0,maxCount));
  
    }
    let amountVal = val;
        let messageVal;
        if(amountVal != null && amountVal != ''){messageVal = `$ ${amountVal}`;}else{messageVal = '';}
      // $(this).addClass("selected");
      $(".make-payment").text(`Donate ${messageVal}`);
}); 


$("#donation-form").validate({
      rules: {
        donate_amount: {
            required:true,
            number: true,
            notEqual: 0,
            minlength:1,
            maxlength:6,
        }
      },
      messages:{
        donate_amount:{
           notEqual : "The donate amount must be greater than 0.",
           maxlength : "Please enter amount less than 6 Digit.",
           minlength : "Please enter minimum amount."
        }
      }
   });
   jQuery.validator.addMethod("notEqual", function (value, element, param) { // Adding rules for Amount(Not equal to zero)
    return this.optional(element) || value != '0';
});

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/zeroguess.us/public_html/n17/FFN/app/resources/views/content/donationn/donation.blade.php ENDPATH**/ ?>