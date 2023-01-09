<?php $__env->startSection('page_title',  trans('admin.country')); ?>
<?php $__env->startSection('additional_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layout/toaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo e(__('admin.country')); ?></h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home.index')); ?>"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.master.country.index')); ?>"><?php echo e(__('admin.country')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('admin.add')); ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card <?php echo e(config('custom.card-primary')); ?>">
                <div class="card-header">
                    <h3 class="card-title"><?php echo e(__('admin.add_new')); ?></h3>
                </div>
                <form method="post" action="<?php echo e(route('admin.master.country.add')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <?php $__currentLoopData = $languageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6">
                                <div class="col-md-12 col-sm-12 p-0">
                                    <div class="form-group">
                                        <label><?php echo e(__('admin.country')); ?> (<?php echo e(ucfirst($language->name)); ?>)</label><span class="required"></span>
                                        <input name="country_<?php echo e($language->id); ?>" type="text" class="form-control length-30 <?php echo e($errors->has('country_'.$language->id) ?'is-invalid':''); ?>" placeholder="<?php echo e(__('admin.country')); ?> (<?php echo e(ucfirst($language->name)); ?>)" value="<?php echo e(old('country_'.$language->id)); ?>">
                                        <?php $__errorArgs = ['country_'.$language->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-red"><?php echo e($message); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><?php echo e(__('admin.status')); ?></label><span class="required"></span>
                                    <select class="form-control select2 select-is-feature <?php echo e(config('custom.select2-css')); ?>" data-dropdown-css-class="<?php echo e(config('custom.select2-css')); ?>" name="is_active">
                                        <?php $__currentLoopData = $isActive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e((collect(old('is_active'))->contains($key)) ? 'selected':''); ?>><?php echo e($status); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red"><?php echo e($message); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group"> 
                                <label><?php echo e(__('admin.sorting_order')); ?><span class="required"></span> <small class="<?php echo e(config('custom.text-note-css')); ?>">(<?php echo e(__('admin.highest_sorting')); ?> : <?php echo e($sortingNumber); ?>)</small></label>
                                <input type="text" name="sorting" placeholder="<?php echo e(__('admin.sorting_order')); ?>" class="form-control number-input <?php echo e($errors->has('sorting') ?'is-invalid':''); ?>" value="<?php echo e(old('sorting',$sortingNumber)); ?>">
                                <?php $__errorArgs = ['sorting'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-red"><?php echo $message; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="card-footer">
                        <span class="float-left"><?php echo __('admin.additional_notes'); ?></span>
                        <div class="btn-toolbar float-right">
                            <div class="btn-group mr-2">
                                <a href="<?php echo e(route('admin.master.country.index')); ?>" class="<?php echo e(config('custom.btn-danger-form')); ?>" title="<?php echo e(__('admin.cancel')); ?>"><?php echo e(__('admin.cancel')); ?></a>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="<?php echo e(config('custom.btn-success-form')); ?>" title="<?php echo e(__('admin.submit')); ?>"><?php echo e(__('admin.submit')); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_specific_js'); ?>
<?php echo $__env->make('layout/select2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first_laravel\resources\views/admin/master/country/add.blade.php ENDPATH**/ ?>