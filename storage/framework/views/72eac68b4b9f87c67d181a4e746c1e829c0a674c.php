
<?php $__env->startSection('page_title',  trans('admin.permission')); ?>
<?php $__env->startSection('additional_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <?php echo $__env->make('layout/toaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo e(__('admin.permission')); ?></h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home.index')); ?>"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('super-admin.permission.index')); ?>"><?php echo e(__('admin.permission')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('admin.list')); ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <form class="list-table" method="get" action="<?php echo e(route('super-admin.permission.index')); ?>">
                        <div class="card <?php echo e(config('custom.card-primary')); ?>">
                            <div class="table-card card-header pl-0"> 
                                <div class="card-tools w-100">
                                    <?php echo $__env->make('common/paginate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="input-group input-group-sm float-right custom-search">
                                        <input type="text" name="q" class="form-control float-right float-sm-right" placeholder="<?php echo e(__('admin.search')); ?>" value="<?php echo e(isset($searchText)?$searchText:''); ?>">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default" title="<?php echo e(__('admin.search')); ?>"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <table data-model="" class="table normal-table table-striped">
                                <thead>
                                    <tr>
                                        <th class="asc-desc text-center" id="<?php if($sortKey=='id'): ?><?php echo e($sortVal); ?><?php endif; ?>"><?php echo e(__('admin.permission_id')); ?><input <?php if($sortKey!='id'): ?>disabled=""<?php endif; ?>  type="hidden" name="id" value="<?php if($sortKey=='id'): ?><?php echo e($sortVal); ?><?php endif; ?>"></th>
                                        <th class="asc-desc" id="<?php if($sortKey=='name'): ?><?php echo e($sortVal); ?><?php endif; ?>"><?php echo e(__('admin.permission_name')); ?><input <?php if($sortKey!='name'): ?>disabled=""<?php endif; ?>  type="hidden" name="name" value="<?php if($sortKey=='name'): ?><?php echo e($sortVal); ?><?php endif; ?>"></th>
                                        <th class="asc-desc" id="<?php if($sortKey=='description'): ?><?php echo e($sortVal); ?><?php endif; ?>"><?php echo e(__('admin.permission_desc')); ?><input <?php if($sortKey!='description'): ?>disabled=""<?php endif; ?>  type="hidden" name="description" value="<?php if($sortKey=='description'): ?><?php echo e($sortVal); ?><?php endif; ?>"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($record->id); ?></td>
                                        <td><?php echo e(ucwords($record->name)); ?></td>
                                        <td><?php echo e(ucfirst($record->description)); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-danger" colspan="3"><?php echo e(__('admin.no_record_found')); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <!-- /.card-body -->
                        </div>
                        <div class="table-pagination pt20 float-right">
                            <?php echo e($permissions->appends(request()->input())->links()); ?>

                        </div>
                    </form>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_specific_js'); ?>
<?php echo $__env->make('common/sorting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layout/datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/adminpanel/resources/views/super-admin/permission/index.blade.php ENDPATH**/ ?>