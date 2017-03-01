<?php $__env->startSection('data'); ?>
<div class="btn-group-justified paddingBottom" role="group" aria-label="...">
    <a type="button" href="/home/locks" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
</div>
<div class="panel panel-default">
    <div class="panel-heading text-center">Edit Lock</div>
    <div class="panel-body">
      <form class="form-horizontal" method="POST" action="/home/lock/<?php echo e($Lock->id); ?>")>
        <?php echo e(method_field('PATCH')); ?>

        <?php echo e(csrf_field()); ?>

        <fieldset>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Room">Room</label>
            <div class="col-md-4">
            <input id="Room" name="room" type="text" placeholder="room" value="<?php echo e($Lock->room); ?>" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Password">Password</label>
            <div class="col-md-4">
            <input id="Password" name="password" type="text" placeholder="password" value="<?php echo e($Lock->password); ?>" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Device Address">Address</label>
            <div class="col-md-4">
            <input id="Device Address" name="address" type="text" value="<?php echo e($Lock->address); ?>" placeholder="address" class="form-control input-md" required="">

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
<div class="panel panel-default">
  <div class="panel-heading text-center">Add User</div>
  <div class="panel-body">
    <form class="form-horizontal" method="POST" action="/home/lock/<?php echo e($Lock->id); ?>/connect">
      <?php echo e(csrf_field()); ?>

      <fieldset>
      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasic">Select User</label>
        <div class="col-md-6">
          <select id="selectbasic" name="user" class="form-control">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> (<?php echo e($user->email); ?>)</option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
      </div>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4">
          <button id="singlebutton" name="singlebutton" class="btn btn-primary">Add</button>
        </div>
      </div>

      </fieldset>
    </form>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading text-center">Users</div>
  <div class="panel-body">
    <table class="table">
      <thead class="thead-inverse">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $Lock->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userL): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <th scope="row"><?php echo e($userL->id); ?></th>
            <td><?php echo e($userL->name); ?></td>
            <td><?php echo e($userL->email); ?></td>
            <td><a type="button" href="/home/lock/<?php echo e($Lock->id); ?>/<?php echo e($userL->id); ?>/delete" class="btn btn-primary btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </tbody>
    </table>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>