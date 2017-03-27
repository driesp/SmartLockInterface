<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Styles -->
    <link href="https://smartlock.tk/css/app.css" rel="stylesheet">
    <link href="https://smartlock.tk/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://smartlock.tk/css/custom.css" rel="stylesheet" type="text/css">


</head>
<body>
    <div id="app">
      <div class="title m-b-md">
        <img src="<?php echo e($message->embed('/images/SmartLockLogo.svg')); ?>" />
      </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->

</body>
</html>
