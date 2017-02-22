<?php $__env->startSection('data'); ?>
<div class="pull-right">
  <?php if(auth::user()->function == 'Admin'): ?>
    <div class="btn-group" role="group" aria-label="...">
      <a type="button" href='/home/floorplan/<?php echo e($Ground->id); ?>/<?php echo e($Building->id); ?>/createfloor' class="btn btn-default btn-lg">Create Floor</a>
    </div>
  <?php endif; ?>
</div>
<div class="">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>#</th>
        <th>Floor</th>
        <th>Visit</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $Floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <th scope="row" class="col-md-2"><?php echo e($Floor->id); ?></th>
          <td class="col-md-8"><?php echo e($Floor->name); ?></td>
          <td class="col-md-2"><a type="button" href="/home/floorplan/<?php echo e($Ground->id); ?>/<?php echo e($Building->id); ?>/<?php echo e($Floor->id); ?>" class="btn btn-primary btn-default btn-block"> Visit <?php echo e($Floor->name); ?></a></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>