<?php $__env->startSection('data'); ?>

<div class="panel panel-default">
    <div class="panel-heading"><?php echo e($Lock->room); ?></div>
    <div class="panel-body">
      <form method="post" class =" col-md-8 col-md-offset-2"action="">
        <ul class="list-unstyled">
          <li>
            <div class="input-group">
              <span class="input-group-addon">room</span>
              <input type="text" name="room" class="form-control" placeholder="room" value="<?php echo e($Lock->room); ?>" aria-describedby="basic-addon1">
            </div>
          </li>
          <li>
            <div class="input-group">
              <span class="input-group-addon">password</span>
              <input type="text" name="password" class="form-control" placeholder="password" value="<?php echo e($Lock->password); ?>" aria-describedby="basic-addon1">
            </div>
          </li>
          <li>
            <div class="input-group">
              <span class="input-group-addon">address</span>
              <input type="text" name="address" class="form-control" placeholder="address" value="<?php echo e($Lock->address); ?>" aria-describedby="basic-addon1">
            </div>
          </li>
        </ul>
      </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>