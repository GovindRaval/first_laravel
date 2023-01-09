<?php $__env->startSection('page_title',  trans('admin.home')); ?>
<?php $__env->startSection('additional_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo e(__('admin.dashboard')); ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('admin.dashboard')); ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-12">
                    <!-- New Order -->
                    <div class="small-box bg-indigo">
                        <div class="inner">
                            <h3>Total</h3>
                            <p>500</p>
                        </div>
                        <div class="icon"><i class="fa fa-cart-plus"></i></div>
                        <a href="" class="small-box-footer"><?php echo e(__('admin.view-all')); ?> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <!-- New Order -->
                    <div class="small-box bg-indigo">
                        <div class="inner">
                            <h3>Total</h3>
                            <p>500</p>
                        </div>
                        <div class="icon"><i class="fa fa-cart-plus"></i></div>
                        <a href="" class="small-box-footer"><?php echo e(__('admin.view-all')); ?> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <!-- New Order -->
                    <div class="small-box bg-indigo">
                        <div class="inner">
                            <h3>Total</h3>
                            <p>500</p>
                        </div>
                        <div class="icon"><i class="fa fa-cart-plus"></i></div>
                        <a href="" class="small-box-footer"><?php echo e(__('admin.view-all')); ?> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <!-- New Order -->
                    <div class="small-box bg-indigo">
                        <div class="inner">
                            <h3>Total</h3>
                            <p>500</p>
                        </div>
                        <div class="icon"><i class="fa fa-cart-plus"></i></div>
                        <a href="" class="small-box-footer"><?php echo e(__('admin.view-all')); ?> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_specific_js'); ?>
<?php echo $__env->make('layout/datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first_laravel\resources\views/index.blade.php ENDPATH**/ ?>