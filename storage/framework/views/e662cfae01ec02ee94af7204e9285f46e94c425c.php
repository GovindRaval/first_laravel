<?php $__env->startSection('page_title',  trans('admin.setting')); ?>
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
                    <h1><?php echo e(__('admin.setting')); ?></h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home.index')); ?>"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.general-setting.setting.index')); ?>"><?php echo e(__('admin.setting')); ?></a></li>
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
                    <form class="list-table" method="get" action="<?php echo e(route('admin.general-setting.setting.index')); ?>">
                        <div class="card <?php echo e(config('custom.card-primary')); ?>">
                            <div class="table-card card-header pl-0">
                                <div class="card-tools w-100">
                                    <?php echo $__env->make('common/paginate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="input-group input-group-sm float-right custom-search">
                                        <input type="text" name="q" class="form-control float-right float-sm-right" placeholder="<?php echo e(__('admin.search')); ?>" value="<?php echo e(isset($searchText)?$searchText:''); ?>">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default" title="<?php echo e(__('admin.search')); ?>"><i class="fas fa-search"></i></button>
                                        </div>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([config('custom_middleware.edit_setting')])): ?>
                                        <a class="pl-2" href="<?php echo e(route('admin.general-setting.setting.edit-setting')); ?>"><button type="button" class="<?php echo e(config('custom.btn-primary','btn btn-outline-primary')); ?> add-new-btn" title="<?php echo e(__('admin.edit')); ?>"><?php echo e(__('admin.edit')); ?></button></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <table class="table normal-table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-cener"><?php echo e(__('admin.first_column')); ?></th>
                                        <th class="asc-desc" id="<?php if($sortKey=='setting_key'): ?><?php echo e($sortVal); ?><?php endif; ?>"><?php echo e(__('admin.setting_name')); ?><input <?php if($sortKey!='setting_key'): ?>disabled=""<?php endif; ?>  type="hidden" name="setting_key" value="<?php if($sortKey=='setting_key'): ?><?php echo e($sortVal); ?><?php endif; ?>"></th>
                                        <th class="asc-desc" id="<?php if($sortKey=='setting_val'): ?><?php echo e($sortVal); ?><?php endif; ?>"><?php echo e(__('admin.setting_value')); ?><input <?php if($sortKey!='setting_val'): ?>disabled=""<?php endif; ?>  type="hidden" name="setting_val" value="<?php if($sortKey=='setting_val'): ?><?php echo e($sortVal); ?><?php endif; ?>"></th>
                                        <th class="asc-desc" id="<?php if($sortKey=='description'): ?><?php echo e($sortVal); ?><?php endif; ?>"><?php echo e(__('admin.setting_desc')); ?><input <?php if($sortKey!='description'): ?>disabled=""<?php endif; ?>  type="hidden" name="description" value="<?php if($sortKey=='description'): ?><?php echo e($sortVal); ?><?php endif; ?>"></th>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([config('custom_middleware.edit_setting')])): ?>
                                        <th class="text-center"><?php echo e(__('admin.action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($record->can_edit == 1): ?>
                                    <tr>
                                        <td class="text-cener"><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e(ucwords($record->setting_key)); ?></td>
                                        <?php if($record->is_multi_lang): ?>
                                        <td>
                                            <?php
                                            $settingLang = $record->getDescription(0, true);
                                            if ($settingLang)
                                            {
                                                foreach ($settingLang as $settingLangVal)
                                                {
                                                    $langTitle = $settingLangVal->getLangTitle();
                                                    echo $langTitle ? $langTitle->name . " : " : '';
                                                    echo isset($settingLangVal->setting_val) ? $settingLangVal->setting_val . "<br/>" : '';
                                                }
                                            }
                                            ?>
                                        </td>
                                        <?php else: ?>
                                        <?php if($record->type == 'file'): ?>
                                        <td><img class="logo-table" src="<?php echo e(asset(Storage::url($record->setting_val))); ?>" title="<?php echo e($record->setting_key); ?>"  onclick="showDetails(this.src)" onerror="this.onerror=null;this.src='<?php echo e(asset(Storage::url('default.png'))); ?>'"/></td>
                                        <?php else: ?>
                                        <?php if($record->id == 7): ?>
                                        <?php
                                        $record->setting_val = str_replace("#year#", date("Y"), $record->setting_val);
                                        ?>
                                        <td title="<?php echo e(ucwords($record->setting_val)); ?>"><?php echo (strlen($record->setting_val) > 100 ? substr($record->setting_val,0,100)."..." : $record->setting_val); ?></td>
                                        <?php else: ?>
                                        <td title="<?php echo e(ucwords($record->setting_val)); ?>"><?php echo (strlen($record->setting_val) > 100 ? substr($record->setting_val,0,100)."..." : $record->setting_val); ?></td>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <td><?php echo ucwords($record->description); ?></td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([config('custom_middleware.edit_setting')])): ?>
                                        <td class="text-center">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.edit_setting'))): ?>
                                            <a href="<?php echo e(route('admin.general-setting.setting.edit',['id'=>$record->id])); ?>"><button type="button" class="<?php echo e(config('custom.btn-primary','btn btn-outline-primary btn-sm')); ?>" title="<?php echo e(__('admin.edit')); ?>"><i class="fas fa-edit"></i></button></a>
                                            <?php endif; ?>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <!-- /.card-body -->
                        </div>
                        <div class="table-pagination pt20 float-right">
                            <?php echo e($settings->appends(request()->input())->links()); ?>

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
<?php echo $__env->make('layout/image_preview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layout/datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first_laravel\resources\views/admin/general-setting/setting/index.blade.php ENDPATH**/ ?>