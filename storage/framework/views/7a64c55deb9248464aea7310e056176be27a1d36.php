<?php $__env->startSection('data'); ?>

<div class="btn-group-justified paddingBottom" role="group" aria-label="...">
    <a type="button" href="/home/profile" class="btn btnBorder btn-primary" >Profile</a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
</div>

<div class="">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th></th>
        <th>#</th>
        <th>Room</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = Auth::user()->locks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></td>
          <th scope="row"><?php echo e($lock->id); ?></th>
          <td><?php echo e($lock->room); ?></td>
          <td><?php echo e($lock->address); ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>