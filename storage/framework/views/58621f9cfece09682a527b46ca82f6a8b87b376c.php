<?php $__env->startSection('page_title',  trans('admin.country')); ?>
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
                    <h1><?php echo e(__('admin.country')); ?></h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home.index')); ?>"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.master.country.index')); ?>"><?php echo e(__('admin.country')); ?></a></li>
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
                    <form class="list-table" method="get" action="<?php echo e(route('admin.master.country.index')); ?>">
                        <div class="card <?php echo e(config('custom.card-primary')); ?>">
                            <div class="table-card card-header pl-0"> 
                                <div class="card-tools w-100">
                                    <?php echo $__env->make('common/paginate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="input-group input-group-sm float-right custom-search">
                                        <input type="text" name="q" class="form-control float-right float-sm-right" placeholder="<?php echo e(__('admin.search')); ?>" value="<?php echo e(isset($searchText)?$searchText:''); ?>">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default" title="<?php echo e(__('admin.search')); ?>"><i class="fas fa-search"></i></button>
                                        </div>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([config('custom_middleware.create_country')])): ?>
                                        <a class="pl-2" href="<?php echo e(route('admin.master.country.add')); ?>"><button type="button" class="<?php echo e(config('custom.btn-primary','btn btn-outline-primary')); ?> add-new-btn" title="<?php echo e(__('admin.add')); ?>"><?php echo e(__('admin.add')); ?></button></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <table data-model="AdminCountry" class="table sorting-table table-striped">
                                <thead>
                                    <tr>
                                        <th class="asc-desc text-center" id="<?php if($sortKey=='sorting'): ?><?php echo e($sortVal); ?><?php endif; ?>"><?php echo e(__('admin.index')); ?><input <?php if($sortKey!='sorting'): ?>disabled=""<?php endif; ?>  type="hidden" name="sorting" value="<?php if($sortKey=='sorting'): ?><?php echo e($sortVal); ?><?php endif; ?>"></th>
                                        <th class="asc-desc" id="<?php if($sortKey=='country_name'): ?><?php echo e($sortVal); ?><?php endif; ?>"><?php echo e(__('admin.country')); ?><input <?php if($sortKey!='country_name'): ?>disabled=""<?php endif; ?>  type="hidden" name="country_name" value="<?php if($sortKey=='country_name'): ?><?php echo e($sortVal); ?><?php endif; ?>"></th>
                                        <th class="asc-desc text-center" id="<?php if($sortKey=='is_active'): ?><?php echo e($sortVal); ?><?php endif; ?>"><?php echo e(__('admin.status')); ?><input <?php if($sortKey!='is_active'): ?>disabled=""<?php endif; ?>  type="hidden" name="is_active" value="<?php if($sortKey=='is_active'): ?><?php echo e($sortVal); ?><?php endif; ?>"></th>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([config('custom_middleware.edit_country'),config('custom_middleware.delete_country')])): ?>
                                        <th class="text-center"><?php echo e(__('admin.action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr id="<?php echo e($record->id); ?>">
                                        <td class="text-center"><?php echo e($record->sorting); ?></td>
                                        <?php
                                        $description = $record->getCountryDescription();
                                        ?>
                                        <td class=''><?php echo e($description?ucfirst($description->country_name):''); ?></td>
                                        <td class="text-center">
                                            <?php if($record->is_active): ?>
                                            <span class="<?php echo e(config('custom.badge-success','badge bg-success')); ?>"><?php echo e(__('admin.active')); ?></span>
                                            <?php else: ?>
                                            <span class="<?php echo e(config('custom.badge-danger','badge bg-danger')); ?>"><?php echo e(__('admin.in_active')); ?></span> 
                                            <?php endif; ?>
                                        </td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([config('custom_middleware.edit_country'),config('custom_middleware.delete_country')])): ?>
                                        <td class="text-center">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.edit_country'))): ?>
                                            <a href="<?php echo e(route('admin.master.country.edit',['id' => $record->id])); ?>"><button type="button" class="<?php echo e(config('custom.btn-primary','btn btn-outline-primary btn-sm')); ?>" title="<?php echo e(__('admin.edit')); ?>"><i class="fas fa-edit"></i></button></a>
                                            <?php if($record->is_active): ?>
                                            <a href="<?php echo e(route('admin.master.country.change-status',['id'=>$record->id,'active'=>0]).'?'.http_build_query($_GET)); ?>"><button type="button" class="<?php echo e(config('custom.btn-danger','btn btn-outline-danger btn-sm')); ?>" title="<?php echo e(__('admin.click_in_active')); ?>"><i class="fas fa-times"></i></button></a>
                                            <?php else: ?>
                                            <a href="<?php echo e(route('admin.master.country.change-status',['id'=>$record->id,'active'=>1]).'?'.http_build_query($_GET)); ?>"><button type="button" class="<?php echo e(config('custom.btn-success','btn btn-outline-success btn-sm')); ?>" title="<?php echo e(__('admin.click_active')); ?>"><i class="fas fa-check"></i></button></a>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.delete_country'))): ?>
                                            <a onclick="showSweetAlert('<?php echo e(route('admin.master.country.delete',['id'=>$record->id])); ?>')"><button type="button" class="<?php echo e(config('custom.btn-danger','btn btn-outline-danger btn-sm')); ?>" title="<?php echo e(__('admin.delete')); ?>"><i class="fas fa-trash"></i></button></a>
                                            <?php endif; ?>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <!-- /.card-body -->
                        </div>
                        <div class="table-pagination pt20 float-right">
                            <?php echo e($country->appends(request()->input())->links()); ?>

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

<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first_laravel\resources\views/admin/master/country/index.blade.php ENDPATH**/ ?>