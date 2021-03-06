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
  <a type="button" href="/home/floorplan/<?php echo e($Ground->id); ?>/<?php echo e($Building->id); ?>" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
  <?php if(auth::user()->function == 'Admin'): ?>
    <a type="button" href='/home/floorplan/<?php echo e($Ground->id); ?>/<?php echo e($Building->id); ?>/<?php echo e($Floor->id); ?>/edit' class="btn btn-primary btnBorder">Edit</a>
    <a type="button" href='/home/floorplan/<?php echo e($Ground->id); ?>/<?php echo e($Building->id); ?>/<?php echo e($Floor->id); ?>/addlock' class="btn btn-primary btnBorder">Add Lock</a>
  <?php else: ?>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <?php endif; ?>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
</div>

<div class="col-md-12">

  <img class="col-md-12" src="../../../../uploads/floors/<?php echo e($Floor->filename); ?>" usemap="floormap"><canvas id="clickCanvas"></canvas></img>
  <map name="floormap">
    <?php $__currentLoopData = $Floor->Locks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <area shape="poly" coords="<?php echo e($lock->x1x); ?>,<?php echo e($lock->x1y); ?>,<?php echo e($lock->x2x); ?>,<?php echo e($lock->x2y); ?>,<?php echo e($lock->x3x); ?>,<?php echo e($lock->x3y); ?>,<?php echo e($lock->x4x); ?>,<?php echo e($lock->x4y); ?>" onmouseover='mouseOverArea(event,<?php echo e($lock->id); ?>);' onmouseout='mouseOutArea(event,<?php echo e($lock->id); ?>);'alt="<?php echo e($lock->room); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </map>
</div>

<script src="/js/map.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>