
<?php $__env->startSection('page_title',  trans('admin.role')); ?>
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
                    <h1><?php echo e(__('admin.role')); ?></h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home.index')); ?>"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('super-admin.role.index')); ?>"><?php echo e(__('admin.role')); ?></a></li>
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
                    <form class="list-table" method="get" action="<?php echo e(route('super-admin.role.index')); ?>">
                        <div class="card <?php echo e(config('custom.card-primary')); ?>">
                            <div class="table-card card-header pl-0"> 
                                <div class="card-tools w-100">
                                    <?php echo $__env->make('common/paginate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="input-group input-group-sm float-right custom-search">
                                        <input type="text" name="q" class="form-control float-right float-sm-right" placeholder="<?php echo e(__('admin.search')); ?>" value="<?php echo e(isset($searchText)?$searchText:''); ?>">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default" title="<?php echo e(__('admin.search')); ?>"><i class="fas fa-search"></i></button>
                                        </div>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.create_super_admin_role'))): ?>
                                        <a class="pl-2" href="<?php echo e(route('super-admin.role.add')); ?>"><button type="button" class="<?php echo e(config('custom.btn-primary','btn btn-outline-primary')); ?> add-new-btn" title="<?php echo e(__('admin.add')); ?>"><?php echo e(__('admin.add')); ?></button></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <table data-model="Role" class="table normal-table table-striped">
                                <thead>
                                    <tr>
                                        <th class="asc-desc" id="<?php if($sortKey=='id'): ?><?php echo e($sortVal); ?><?php endif; ?>"><?php echo e(__('admin.role_id')); ?><input <?php if($sortKey!='id'): ?>disabled=""<?php endif; ?>  type="hidden" name="id" value="<?php if($sortKey=='id'): ?><?php echo e($sortVal); ?><?php endif; ?>"></th>
                                        <th class="asc-desc" id="<?php if($sortKey=='name'): ?><?php echo e($sortVal); ?><?php endif; ?>"><?php echo e(__('admin.role_name')); ?><input <?php if($sortKey!='name'): ?>disabled=""<?php endif; ?>  type="hidden" name="name" value="<?php if($sortKey=='name'): ?><?php echo e($sortVal); ?><?php endif; ?>"></th>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([config('custom_middleware.edit_super_admin_role'),config('custom_middleware.delete_super_admin_role'),config('custom_middleware.view_super_admin_role_permission')])): ?>
                                        <th class="text-center"><?php echo e(__('admin.action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($record->id); ?></td>
                                        <td><?php echo e(ucwords($record->name)); ?></td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([config('custom_middleware.edit_super_admin_role'),config('custom_middleware.delete_super_admin_role'),config('custom_middleware.view_super_admin_role_permission')])): ?>
                                        <td class="text-center">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.edit_super_admin_role'))): ?>
                                            <a href="<?php echo e(route('super-admin.role.edit',['id'=>$record->id])); ?>"><button type="button" class="<?php echo e(config('custom.btn-primary','btn btn-outline-primary btn-sm')); ?>" title="<?php echo e(__('admin.edit')); ?>"><i class="fas fa-edit"></i></button></a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.delete_super_admin_role'))): ?>
                                            <a onclick="showSweetAlert('<?php echo e(route('super-admin.role.delete',['id'=>$record->id])); ?>')"><button type="button" class="<?php echo e(config('custom.btn-danger','btn btn-outline-danger btn-sm')); ?>" title="<?php echo e(__('admin.delete')); ?>"><i class="fas fa-trash"></i></button></a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.view_super_admin_role_permission'))): ?>
                                            <a href='<?php echo e(route('super-admin.role-permission.view',['id'=>$record->id])); ?>' class="<?php echo e(config('custom.btn-info','btn btn-outline-info btn-sm')); ?>" title="<?php echo e(__('admin.view_role_permission')); ?>"><i class="fas fa-eye"></i></a>
                                            <?php endif; ?>
                                        </td>
                                        <?php endif; ?>
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
                            <?php echo e($roles->appends(request()->input())->links()); ?>

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
<?php echo $__env->make('layout/sweetalert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layout/datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first_laravel\resources\views/super-admin/role/index.blade.php ENDPATH**/ ?>