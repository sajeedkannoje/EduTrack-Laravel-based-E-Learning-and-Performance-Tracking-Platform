<!-- BEGIN: Vendor CSS-->
<?php if($configData['direction'] === 'rtl' && isset($configData['direction'])): ?>
<link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/vendors-rtl.min.css'))); ?>" />
<?php else: ?>
<link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/vendors.min.css'))); ?>" />
<?php endif; ?>

<link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/extensions/toastr.min.css'))); ?>">
<link rel="stylesheet" href="<?php echo e(asset(mix('css/base/plugins/extensions/ext-component-toastr.css'))); ?>">
<?php echo $__env->yieldContent('vendor-style'); ?>
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" href="<?php echo e(asset(mix('css/core.css'))); ?>" />

<?php $configData = Helper::applClasses(); ?>

<!-- BEGIN: Page CSS-->
<?php if($configData['mainLayoutType'] === 'horizontal'): ?>
<link rel="stylesheet" href="<?php echo e(asset(mix('css/base/core/menu/menu-types/horizontal-menu.css'))); ?>" />
<?php else: ?>
<link rel="stylesheet" href="<?php echo e(asset(mix('css/base/core/menu/menu-types/vertical-menu.css'))); ?>" />
<?php endif; ?>


<?php echo $__env->yieldContent('page-style'); ?>

<!-- laravel style -->
<link rel="stylesheet" href="<?php echo e(asset(mix('css/overrides.css'))); ?>" />

<!-- BEGIN: Custom CSS-->
<?php echo $__env->make('panels.custom_style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($configData['direction'] === 'rtl' && isset($configData['direction'])): ?>
<link rel="stylesheet" href="<?php echo e(asset(mix('css-rtl/custom-rtl.css'))); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('css-rtl/style-rtl.css'))); ?>" />

<?php else: ?>

<link rel="stylesheet" href="<?php echo e(asset(mix('css/style.css'))); ?>" />
<?php endif; ?>
<?php /**PATH C:\laragon\www\follow-for-now-life-skill\resources\views/panels/styles.blade.php ENDPATH**/ ?>