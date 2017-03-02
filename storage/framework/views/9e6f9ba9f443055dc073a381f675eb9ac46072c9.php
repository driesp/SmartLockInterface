<?php $__env->startSection('data'); ?>
  <style>
  img
  {
      width: 690px;
  }
  </style>
<div class="btn-group-justified paddingBottom" role="group" aria-label="...">
  <a type="button" href="/home/floorplan/<?php echo e($Ground->id); ?>/<?php echo e($Building->id); ?>/<?php echo e($Floor->id); ?>" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
</div>
<div class="panel panel-primary">
    <div class="panel-heading text-center">Create Lock</div>
    <div class="panel-body">
      <form class="form-horizontal" method="POST" action="/home/floorplan/<?php echo e($Ground->id); ?>/<?php echo e($Building->id); ?>/<?php echo e($Floor->id); ?>/insertlock" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>


        <fieldset>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Name</label>
            <div class="col-md-4">
              <select id="selectbasic" name="id" class="form-control">
                <?php $__currentLoopData = $Locks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($lock->id); ?>"><?php echo e($lock->room); ?> (<?php echo e($lock->address); ?>)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>

            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">X1</label>
            <div class="col-md-2">
            <input id="x1x" name="x1x" value='' type="text" placeholder="x" class="form-control input-md" readonly>
            </div>
            <div class="col-md-2">
            <input id="x1y" name="x1y" value='' type="text" placeholder="y" class="form-control input-md" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">X2</label>
            <div class="col-md-2">
            <input id="x2x" name="x2x" value='' type="text" placeholder="x" class="form-control input-md" readonly>
            </div>
            <div class="col-md-2">
            <input id="x2y" name="x2y" value='' type="text" placeholder="y" class="form-control input-md" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">X3</label>
            <div class="col-md-2">
            <input id="x3x" name="x3x" value='' type="text" placeholder="x" class="form-control input-md" readonly>
            </div>
            <div class="col-md-2">
            <input id="x3y" name="x3y" value='' type="text" placeholder="y" class="form-control input-md" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">X4</label>
            <div class="col-md-2">
            <input id="x4x" name="x4x" value='' type="text" placeholder="x" class="form-control input-md" readonly>
            </div>
            <div class="col-md-2">
            <input id="x4y" name="x4y" value='' type="text" placeholder="y" class="form-control input-md" readonly>
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
<div class="col-md-12">
  <img class="col-md-12" src="/uploads/floors/<?php echo e($Floor->filename); ?>"/>
</div>


<script>
$(document).ready(function() {
  console.log('bar');
  var i = 1;
  $('img').click(function(e) {
    var offset = $(this).offset();

    switch (i) {
      case 1: $('#x1x').val(e.pageX - offset.left); $('#x1y').val(e.pageY - offset.top); console.log('1'); break;
      case 2: $('#x2x').val(e.pageX - offset.left); $('#x2y').val(e.pageY - offset.top); console.log('2'); break;
      case 3: $('#x3x').val(e.pageX - offset.left); $('#x3y ').val(e.pageY - offset.top); console.log('3'); break;
      case 4: $('#x4x').val(e.pageX - offset.left); $('#x4y').val(e.pageY - offset.top); console.log('4'); break;
      default: alert('Markers allready placed');break;
    }
    i++;
  });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>