<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
      <?php echo $__env->make('home.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-md-8">
          <?php echo $__env->yieldContent('data'); ?>
        </div>
      <?php echo $__env->make('home.statistics', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>