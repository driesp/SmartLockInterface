<?php $__env->startSection('data'); ?>

  <div class="btn-group-justified paddingBottom" role="group" aria-label="...">
    <a type="button" href="/home/user/create" class="btn btnBorder btn-primary" > <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add User</a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  </div>

<div class="">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Function</th>
        <th>Department</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <th scope="row"><?php echo e($user->id); ?></th>
          <td><?php echo e($user->name); ?></td>
          <td><?php echo e($user->function); ?></td>
          <td><?php echo e($user->department); ?></td>
          <td><?php echo e($user->email); ?></td>
          <td><a type="button" href="/home/user/<?php echo e($user->id); ?>/edit" class="btn btn-primary btn-success"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
          <td><a type="button" href="/home/user/<?php echo e($user->id); ?>/delete" class="btn btn-primary btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>