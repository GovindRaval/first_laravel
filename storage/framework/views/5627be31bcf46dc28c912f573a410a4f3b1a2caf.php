
<?php $__env->startSection('page_title',  trans('admin.user_role')); ?>
<?php $__env->startSection('additional_css'); ?>
<!--select2 css-->
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<!--/ select2 css -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <?php echo $__env->make('layout/toaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo e(__('admin.user_role')); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home.index')); ?>"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('super-admin.user-role.index')); ?>"><?php echo e(__('admin.user_role')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('admin.list')); ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form class="list-table" method="get" action="<?php echo e(route('super-admin.user-role.index')); ?>">
                        <div class="card <?php echo e(config('custom.card-primary')); ?>">
                            <div class="table-card card-header pl-0"> 
                                <div class="card-tools w-100">
                                    <?php echo $__env->make('common/paginate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="input-group input-group-sm float-right custom-search">
                                        <input type="text" name="q" class="form-control float-right float-sm-right" placeholder="<?php echo e(__('admin.search')); ?>" value="<?php echo e(isset($searchText)?$searchText:''); ?>">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default" title="<?php echo e(__('admin.search')); ?>"><i class="fas fa-search"></i></button>
                                        </div>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.create_super_admin_user_role'))): ?>
                                        <a class="pl-2" href="<?php echo e(route('super-admin.user-role.bulkAssign')); ?>"><button type="button" class="<?php echo e(config('custom.btn-primary','btn btn-outline-primary')); ?> add-new-btn" title="<?php echo e(__('admin.user_role_bulk_assign')); ?>"><?php echo e(__('admin.user_role_bulk_assign')); ?></button></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <table data-model="" class="table normal-table table-striped">
                                <thead>
                                    <tr>
                                        <th class="asc-desc text-center"><?php echo e(__('admin.user_id')); ?></th>
                                        <th class="asc-desc"><?php echo e(__('admin.user_name')); ?></th>
                                        <th class="text-center"><?php echo e(__('admin.user_role')); ?></th>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([config('custom_middleware.edit_super_admin_user_role')])): ?>
                                        <th class="text-center"><?php echo e(__('admin.action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($record ? $record->id :''); ?></td>
                                        <td><?php echo e($record ? ucfirst($record->name.' '.$record->last_name) :''); ?></td>
                                        <?php
                                        $role = $record->getRoleNames();
                                        $userRoleList = "";
                                        foreach($role as $role)
                                        {
                                        $userRoleList.= ucfirst($role).", ";
                                        }
                                        $userRoleList = rtrim($userRoleList,", ");
                                        ?>
                                        <td class="text-center"><?php echo e($userRoleList ? $userRoleList :''); ?></td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.edit_super_admin_user_role'))): ?>
                                        <td class="text-center">
                                            <a href="<?php echo e(route('super-admin.user-role.update-role',['id'=>$record->id])); ?>"><button type="button" class="<?php echo e(config('custom.btn-primary','btn btn-outline-primary btn-sm')); ?>" title="<?php echo e(__('admin.edit')); ?>"><i class="fas fa-edit"></i></button></a>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <!-- /.card-body -->
                        </div>
                        <div class="table-pagination pt20 float-right">
                            <?php echo e($user->appends(request()->input())->links()); ?>

                        </div>
                    </form>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_specific_js'); ?>
<?php echo $__env->make('common/sorting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layout/sweetalert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layout/select2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layout/datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/adminpanel/resources/views/super-admin/user-role/index.blade.php ENDPATH**/ ?>