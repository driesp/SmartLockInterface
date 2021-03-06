<?php $__env->startSection('data'); ?>
<div class="btn-group-justified paddingBottom" role="group" aria-label="...">
    <a type="button" href="/home/users" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
</div>


<div class="panel panel-primary">
    <div class="panel-heading text-center">Edit User</div>
    <div class="panel-body">
      <form class="form-horizontal" method="POST" action="/home/user/<?php echo e($User->id); ?>")>
        <?php echo e(method_field('PATCH')); ?>

        <?php echo e(csrf_field()); ?>

        <fieldset>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Room">Name</label>
            <div class="col-md-4">
            <input id="Name" name="name" type="text" placeholder="name" value="<?php echo e($User->name); ?>" class="form-control input-md" required="">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Password">Password</label>
            <div class="col-md-4">
            <input id="Password" name="password" type="password" placeholder="password" value="<?php echo e($User->password); ?>" class="form-control input-md" required="">
            <input id="Password_old" name="password_old" type="hidden"  value="<?php echo e($User->password); ?>" class="form-control input-md" required="">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Function">Function</label>
            <div class="col-md-4">
            <input id="Function" name="function" type="text" value="<?php echo e($User->function); ?>" placeholder="function" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Department">Department</label>
            <div class="col-md-4">
            <input id="Department" name="department" type="text" value="<?php echo e($User->department); ?>" placeholder="department" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Email">Email</label>
            <div class="col-md-4">
            <input id="Email" name="email" type="text" value="<?php echo e($User->email); ?>" placeholder="email" class="form-control input-md" required="">

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
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>