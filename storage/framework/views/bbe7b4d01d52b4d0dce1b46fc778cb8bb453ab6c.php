

 


<ul class="menu-content">
  <?php if(isset($menu)): ?>
  
  <?php $__currentLoopData = $menu->submenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php
      $submenu = (object)$submenu;
      $submenu_classes = "";
      if(isset($submenu->classlist)) {
        $submenu_classes = $submenu->classlist;
      }
      $submenu_course_text = "";
      if(isset($submenu->textClass)){
        $submenu_course_text = $submenu->textClass;
      }
  ?>


  <li class = "<?php echo e($submenu_classes); ?> <?php echo e($submenu->url == '/'.Request::path() ? 'active' : ''); ?>">
    <a href="<?php echo e(isset($submenu->url) ? url($submenu->url):'javascript:void(0)'); ?>" class="d-flex align-items-center sub-menu-url" target="<?php echo e(isset($submenu->newTab) && $submenu->newTab === true  ? '_blank':'_self'); ?>">
      <?php if(isset($submenu->icon)): ?>
      <i class="text-yellow fw-bolder font-medium-3 <?php echo e($submenu->icon); ?>"></i>
      <?php endif; ?>
      <span class="menu-item text-wrap <?php echo e($submenu_course_text); ?>"><?php echo e($submenu->name); ?></span>
    </a>
    <?php if(isset($submenu->submenu)): ?>
    <?php echo $__env->make('panels/submenu', ['menu' => $submenu->submenu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
</ul>
<?php /**PATH /home/customer/www/zeroguess.us/public_html/n17/FFN/app/resources/views/panels/submenu.blade.php ENDPATH**/ ?>