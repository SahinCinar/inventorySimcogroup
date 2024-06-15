<!DOCTYPE html>
<html>
<head>
    <!-- Meta and CSS includes -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SimcoGroup | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/bower_components/Ionicons/css/ionicons.min.css')); ?>">
    <script src="<?php echo e(asset('assets/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <link href="<?php echo e(asset('assets/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/SimcoGroup.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/skins/skin-green.min.css')); ?>">
    <?php echo $__env->yieldContent('top'); ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <span class="logo-mini"><b>SG</b></span>
            <span class="logo-lg"><b>Admin</b> System</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo e(asset('user-profile.png')); ?>" class="user-image" alt="User Image">
                            <?php if(Auth::check()): ?>
                                <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
                            <?php else: ?>
                                <span class="hidden-xs">Guest</span>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="<?php echo e(asset('user-profile.png')); ?>" class="img-circle" alt="User Image">
                                <?php if(Auth::check()): ?>
                                    <p><?php echo e(Auth::user()->name); ?><small><?php echo e(Auth::user()->email); ?></small></p>
                                <?php else: ?>
                                    <p>Guest<small>Not logged in</small></p>
                                <?php endif; ?>
                            </li>
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a class="btn btn-danger btn-flat" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content-wrapper">
        <section class="content container-fluid">
            <?php echo $__env->yieldContent('content'); ?>
        </section>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            Developed by Sahin Cinar
        </div>
        <?php $date = date('Y'); ?>
        <strong>&copy; <?php echo e($date); ?> - SimcoGroup </strong>
    </footer>
    <div class="control-sidebar-bg"></div>
</div>

<!-- REQUIRED JS SCRIPTS -->
<script src="<?php echo e(asset('assets/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/dist/js/SimcoGroup.min.js')); ?>"></script>
<?php echo $__env->yieldContent('bot'); ?>
</body>
</html>
<?php /**PATH C:\Users\Sahin\Desktop\InventorySimcoGroup\resources\views/layouts/master.blade.php ENDPATH**/ ?>