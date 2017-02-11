<?php $__env->startSection('data'); ?>
  <div class="panel panel-default">
      <div class="panel-heading text-align-center">Locks</div>

      <div class="panel-body">
        <table class="table">
          <thead class="thead-inverse">
            <tr>
              <th>#</th>
              <th>Room</th>
              <th>Password</th>
              <th>Address</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <a type="button" href="/home/locks/add" class="pull-right btn btn-primary btn-primary"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add Lock</a>
            </tr>
            <?php $__currentLoopData = $locks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <th scope="row"><?php echo e($lock->id); ?></th>
                <td><?php echo e($lock->room); ?></td>
                <td><?php echo e($lock->password); ?></td>
                <td><?php echo e($lock->address); ?></td>
                <td><a type="button" href="/home/locks/<?php echo e($lock->id); ?>/edit" class="btn btn-primary btn-success"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
                <td><a type="button" href="/home/locks/<?php echo e($lock->id); ?>/delete" class="btn btn-primary btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
  </div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>