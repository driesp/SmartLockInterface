<?php $__env->startComponent('mail::message'); ?>

  Welcome, <?php echo e($user->name); ?>!
  Your temporary password is, <?php echo e($password); ?>


<?php $__env->startComponent('mail::button', ['url' => 'https://smartlock.tk/login']); ?>
Log In
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::panel'); ?>
  Welcome to the SmartLock Community!
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
