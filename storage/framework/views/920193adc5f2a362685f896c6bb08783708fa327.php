<?php if(isset($pageConfigs)): ?>
<?php echo Helper::updatePageConfig($pageConfigs); ?>

<?php endif; ?>

<!DOCTYPE html>
<?php
$configData = Helper::applClasses();
?>

<html class="loading <?php echo e(($configData['theme'] === 'light') ? '' : $configData['layoutTheme']); ?>"
lang="<?php if(session()->has('locale')): ?><?php echo e(session()->get('locale')); ?><?php else: ?><?php echo e($configData['defaultLanguage']); ?><?php endif; ?>"
data-textdirection="<?php echo e(env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr'); ?>"
<?php if($configData['theme'] === 'dark'): ?> data-layout="dark-layout" <?php endif; ?>>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title><?php echo $__env->yieldContent('title'); ?> </title>
  <link rel="apple-touch-icon" href="<?php echo e(asset('images/ico/apple-icon-120.pn')); ?>">
  
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('images/logo/favicon.ico.png')); ?>"> 

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
  <link rel='stylesheet' href="<?php echo e(asset('fonts/uicons-bold-rounded/css/uicons-bold-rounded.css')); ?>">

  
  <?php echo $__env->make('panels/styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('inc/variables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<?php if(isset($configData["mainLayoutType"])): ?>

<?php endif; ?>

<?php echo $__env->make((( $configData["mainLayoutType"] === 'horizontal') ? 'layouts.horizontalLayoutMaster' :
'layouts.verticalLayoutMaster' ), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/zeroguess.us/public_html/n17/FFN/app/resources/views/layouts/contentLayoutMaster.blade.php ENDPATH**/ ?>