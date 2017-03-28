<?php $__env->startSection('data'); ?>

<style>
img
{
    width: 690px;
}
div.hoverCard
{
  display: none;
  position: absolute;
  width: 225px;
  z-index: 1;
}
</style>
<?php $__currentLoopData = $Floor->Locks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="panel panel-default hoverCard <?php if($lock->active == true): ?> panel-success <?php else: ?> panel-danger <?php endif; ?>" id="<?php echo e($lock->id); ?>">
    <div class="panel-heading text-center"><?php echo e($lock->room); ?></div>
    <div class="panel-body text-center">
      Address: <?php echo e($lock->address); ?></br>
    </div>
  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div class="btn-group-justified paddingBottom" role="group" aria-label="...">
  <a type="button" href="/home/floorplan/<?php echo e($Ground->id); ?>/<?php echo e($Building->id); ?>/<?php echo e($Floor->id); ?>" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
</div>

<div class="col-md-12">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>#</th>
        <th>room</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
<?php $__currentLoopData = $Floor->Locks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
    <th scope="row" class="col-md-2"><?php echo e($lock->id); ?></th>
    <td class="col-md-8"><?php echo e($lock->room); ?></td>
    <td class="col-md-2"><a type="button" href="/home/floorplan/<?php echo e($Ground->id); ?>/<?php echo e($Building->id); ?>/<?php echo e($Floor->id); ?>/<?php echo e($lock->id); ?>/delete" class="btn btn-danger btn-default btn-block"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>