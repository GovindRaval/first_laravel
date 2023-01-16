<?php $__env->startSection('page_title',  trans('admin.city')); ?>
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
                    <h1><?php echo e(__('admin.city')); ?></h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home.index')); ?>"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.master.city.index')); ?>"><?php echo e(__('admin.city')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('admin.edit')); ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card <?php echo e(config('custom.card-primary')); ?>">
                <div class="card-header">
                    <h3 class="card-title"><?php echo e(__('admin.edit')); ?></h3>
                </div>
                <form method="post" action="<?php echo e(route('admin.master.city.update',['id' => $singleRecord->id])); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label><?php echo e(__('admin.country')); ?><span class="required">*</span></label>
                                    <select class="form-control select2 select-is-feature <?php echo e(config('custom.select2-css')); ?>" data-dropdown-css-class="<?php echo e(config('custom.select2-css')); ?>" name="country_id">
                                        <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $description = $val->getCountryDescription();
                                        ?>
                                        <option value="<?php echo e($val->id); ?>" <?php echo e((collect(old('country_id',$singleRecord->country_id))->contains($val->id)) ? 'selected':''); ?>><?php echo e(ucfirst($description->country_name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red"><?php echo e($message); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php $__currentLoopData = $languageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $record = $singleRecord->getCityDescription($language->id);
                            ?>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label><?php echo e(__('admin.city')); ?> (<?php echo e(ucfirst($language->name)); ?>)<span class="required"></span></label>
                                    <input name="city_<?php echo e($language->id); ?>" type="text" class="form-control length-30 <?php echo e($errors->has('city_'.$language->id) ?'is-invalid':''); ?>" placeholder="<?php echo e(__('admin.city')); ?> (<?php echo e(ucfirst($language->name)); ?>)" value="<?php echo e(old('city_'.$language->id,$record?$record->city_name:'')); ?>">
                                    <?php $__errorArgs = ['city_'.$language->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red"><?php echo e($message); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group"> 
                                    <label><?php echo e(__('admin.sorting_order')); ?><span class="required"></span> <small class="<?php echo e(config('custom.text-note-css')); ?>">(<?php echo e(__('admin.highest_sorting')); ?> : <?php echo e($sortingNumber); ?>)</small></label>
                                    <input type="text" name="sorting" placeholder="<?php echo e(__('admin.sorting_order')); ?>" class="form-control number-input <?php echo e($errors->has('sorting') ?'is-invalid':''); ?>" value="<?php echo e(old('sorting',$singleRecord->sorting!=0?$singleRecord->sorting:$sortingNumber)); ?>">
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
                                <a href="<?php echo e(route('admin.master.city.index')); ?>" class="<?php echo e(config('custom.btn-danger-form')); ?>" title="<?php echo e(__('admin.cancel')); ?>"><?php echo e(__('admin.cancel')); ?></a>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="<?php echo e(config('custom.btn-success-form')); ?>" title="<?php echo e(__('admin.update')); ?>"><?php echo e(__('admin.update')); ?></button>
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
<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first_laravel\resources\views/admin/master/city/edit.blade.php ENDPATH**/ ?>