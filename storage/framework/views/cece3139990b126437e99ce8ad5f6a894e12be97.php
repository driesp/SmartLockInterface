<?php $__env->startSection('data'); ?>
<div class="pull-right">
  <?php if(auth::user()->function == 'Admin'): ?>
    <div class="btn-group-justified paddingBottom" role="group" aria-label="...">
      <a type="button" href='/home/floorplan/create' class="btn btnBorder btn-primary">Create Ground</a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    </div>
  <?php endif; ?>
</div>
<div class="">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>#</th>
        <th>Ground</th>
        <th>Visit</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $grounds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ground): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <th scope="row" class="col-md-2"><?php echo e($ground->id); ?></th>
          <td class="col-md-8"><?php echo e($ground->name); ?></td>
          <td class="col-md-2"><a type="button" href="/home/floorplan/<?php echo e($ground->id); ?>" class="btn btn-primary btn-default btnBorder btn-block"> Visit <?php echo e($ground->name); ?></a></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>