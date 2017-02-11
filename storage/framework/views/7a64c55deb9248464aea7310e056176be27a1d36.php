<?php $__env->startSection('data'); ?>

<div class="panel panel-default">
    <div class="panel-heading">My locks</div>

    <div class="panel-body">
        Here will all your locks be displayed
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>