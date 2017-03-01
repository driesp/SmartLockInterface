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
    width: 175px;
    z-index: 1;
  }
  </style>
  <?php $__currentLoopData = $Ground->buildings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $building): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="panel panel-default hoverCard " id="<?php echo e($building->id); ?>">
      <div class="panel-heading text-center"><?php echo e($building->name); ?></div>
      <div class="panel-body text-center">
        Building has <?php echo e($building->floors->count()); ?> floors.
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div class="pull-right">

    <div class="btn-group-justified paddingBottom" role="group" aria-label="...">
      <a type="button" href="/home/floorplan" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
      <?php if(auth::user()->function == 'Admin'): ?>
        <a type="button" href='/home/floorplan/<?php echo e($Ground->id); ?>/building' class="btn btnBorder btn-primary">Add Building</a>
      <?php else: ?>
        <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      <?php endif; ?>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    </div>

</div>
<div class="col-md-12">
  <img id="groundImg" class=" map col-md-12" src="../../uploads/<?php echo e($Ground->filename); ?>" usemap="groundmap"><canvas id="clickCanvas"></canvas></img>
  <map name="groundmap">
    <?php $__currentLoopData = $Ground->buildings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $building): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <area shape="poly" coords="<?php echo e($building->x1x); ?>,<?php echo e($building->x1y); ?>,<?php echo e($building->x2x); ?>,<?php echo e($building->x2y); ?>,<?php echo e($building->x3x); ?>,<?php echo e($building->x3y); ?>,<?php echo e($building->x4x); ?>,<?php echo e($building->x4y); ?>" onmouseover='mouseOverArea(event,<?php echo e($building->id); ?>);' onmouseout='mouseOutArea(event,<?php echo e($building->id); ?>);' href="/home/floorplan/<?php echo e($Ground->id); ?>/<?php echo e($building->id); ?>" alt="<?php echo e($building->name); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </map>
</div>
<script src="/js/map.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>