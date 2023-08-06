<!-- BEGIN: Vendor JS-->
<script src="<?php echo e(asset(mix('vendors/js/vendors.min.js'))); ?>"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo e(asset(mix('vendors/js/ui/jquery.sticky.js'))); ?>"></script>
<script src="<?php echo e(asset(mix('vendors/js/extensions/toastr.min.js'))); ?>"></script>
<?php echo $__env->yieldContent('vendor-script'); ?>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="<?php echo e(asset(mix('js/core/app-menu.js'))); ?>"></script>
<script src="<?php echo e(asset(mix('js/core/app.js'))); ?>"></script>

<!-- custome scripts file for user -->
<script src="<?php echo e(asset(mix('js/core/scripts.js'))); ?>"></script>

<script src="<?php echo e(asset('js/scripts/main.js')); ?>"></script>

<?php if($configData['blankPage'] === false): ?>
<script src="<?php echo e(asset(mix('js/scripts/customizer.js'))); ?>"></script>
<?php endif; ?>
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
<?php echo $__env->yieldContent('page-script'); ?>
<!-- END: Page JS-->
<?php /**PATH C:\laragon\www\follow-for-now-life-skill\resources\views/panels/scripts.blade.php ENDPATH**/ ?>