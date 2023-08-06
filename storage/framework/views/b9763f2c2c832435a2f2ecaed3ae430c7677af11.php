<?php if(isset($pageConfigs)): ?>
<?php echo Helper::updatePageConfig($pageConfigs); ?>

<?php endif; ?>

<!DOCTYPE html>
<?php $configData = Helper::applClasses(); ?>

<html class="loading <?php echo e(($configData['theme'] === 'light') ? '' : $configData['layoutTheme']); ?>"
lang="<?php if(session()->has('locale')): ?><?php echo e(session()->get('locale')); ?><?php else: ?><?php echo e($configData['defaultLanguage']); ?><?php endif; ?>"
data-textdirection="<?php echo e(env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr'); ?>"
<?php if($configData['theme'] === 'dark'): ?> data-layout="dark-layout"<?php endif; ?>>

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
  <link rel="stylesheet" href="<?php echo e(asset('icons/uicons-bold-rounded/css/uicons-bold-rounded.css')); ?>">
  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

  
  <?php echo $__env->make('panels/styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
  <?php echo $__env->make('panels/styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
</head>



<body class="vertical-layout vertical-menu-modern <?php echo e($configData['bodyClass']); ?> <?php echo e(($configData['theme'] === 'dark') ? 'dark-layout' : ''); ?> <?php echo e($configData['blankPageClass']); ?> blank-page"
data-menu="vertical-menu-modern"
data-col="blank-page"
data-framework="laravel"
data-asset-path="<?php echo e(asset('/')); ?>">

  <!-- BEGIN: Content-->
  <div class="app-content content <?php echo e($configData['pageClass']); ?>">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    <div class="content-wrapper">
      <div class="content-body">

        
        <?php echo $__env->yieldContent('content'); ?>

      </div>
    </div>
  </div>
  <!-- End: Content-->

  
  <?php echo $__env->make('panels/scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <script type="text/javascript">
    $(window).on('load', function() {
      if (feather) {
        feather.replace({
          width: 14,
          height: 14
        });
      }
    })
  </script>

</body>

</html>
<?php /**PATH C:\wamp64\www\follow-for-now-life-skill\resources\views/layouts/fullLayoutMaster.blade.php ENDPATH**/ ?>