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
    <div class="panel-heading">Create User</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo e(csrf_field()); ?>


            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                    <?php if($errors->has('name')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group<?php echo e($errors->has('function') ? ' has-error' : ''); ?>">
                <label for="function" class="col-md-4 control-label">Function</label>

                <div class="col-md-6">
                    <input id="function" type="function" class="form-control" name="function" value="<?php echo e(old('function')); ?>" required>

                    <?php if($errors->has('function')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('function')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group<?php echo e($errors->has('department') ? ' has-error' : ''); ?>">
                <label for="department" class="col-md-4 control-label">Department</label>

                <div class="col-md-6">
                    <input id="department" type="department" class="form-control" name="department" value="<?php echo e(old('department')); ?>" required>

                    <?php if($errors->has('department')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('department')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group<?php echo e($errors->has('telephone') ? ' has-error' : ''); ?>">
                <label for="telephone" class="col-md-4 control-label">Telephone</label>

                <div class="col-md-6">
                    <input id="telephone" type="telephone" class="form-control" name="telephone" value="<?php echo e(old('telephone')); ?>" required>

                    <?php if($errors->has('telephone')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('telephone')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                <label for="address" class="col-md-4 control-label">Address</label>

                <div class="col-md-6">
                    <input id="address" type="address" class="form-control" name="address" value="<?php echo e(old('address')); ?>" required>

                    <?php if($errors->has('address')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('address')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <div class="form-group">
              <label for="password-confirm" class="col-md-4 control-label"></label>
              <div class="col-md-6">
                  <input type="hidden" id="admin" name="admin" value="0" >
                  <input type="checkbox" id="admin" name="admin" value="1" > Is Admin?<br>
              </div>

            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        create
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>