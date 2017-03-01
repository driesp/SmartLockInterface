<?php $__env->startSection('data'); ?>
<div class="btn-group-justified paddingBottom" role="group" aria-label="...">
  <a type="button" href="/home/floorplan/<?php echo e($Ground->id); ?>/<?php echo e($Building->id); ?>" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
</div>
<div class="panel panel-default">
    <div class="panel-heading text-center">Create Grounds</div>
    <div class="panel-body">
      <form class="form-horizontal" method="POST" action="/home/floorplan/<?php echo e($Ground->id); ?>/<?php echo e($Building->id); ?>/insertfloor" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>


        <fieldset>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Name</label>
            <div class="col-md-4">
            <input id="name" name="name" value='<?php echo e(old('name')); ?>' type="text" placeholder="name" class="form-control input-md" >

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="file">Image</label>
            <div class="col-md-6">
            <input id="file" name="file" type="file" placeholder="image" value='<?php echo e(old('file')); ?>' class="form-control input-md">

            </div>
          </div>
          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Submit"></label>
            <div class="col-md-4">
              <button id="Submit" name="Submit" class="btn btn-primary">Submit</button>
            </div>
          </div>

        </fieldset>
      </form>
      <?php if(count($errors)): ?>
        <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
      <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>