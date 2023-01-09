<?php $__env->startSection('page_title',  trans('admin.setting')); ?>
<?php $__env->startSection('additional_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layout/toaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo e(__('admin.setting')); ?></h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home.index')); ?>"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.general-setting.setting.index')); ?>"><?php echo e(__('admin.setting')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('admin.edit')); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card <?php echo e(config('custom.card-primary')); ?>">
                <div class="card-header">
                    <h3 class="card-title"><?php echo e(__('admin.edit')); ?></h3>
                </div>
                <form method="post" action="<?php echo e(route('admin.general-setting.setting.update',['id'=>$record->id])); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($record->id); ?>">
                    <div class="card-body">
                        <div class="row">
                            <?php if($record->is_multi_lang): ?>
                            <?php $__currentLoopData = $languageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $settingLang = $record->getDescription($language->id);
                            ?>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo e($record->setting_key); ?> (<?php echo e(ucfirst($language->name)); ?>) 
                                        <?php if($record->is_require==1): ?>
                                        <span class="required"></span>
                                        <?php endif; ?>
                                        <small class="text-primary"> <?php echo $record->description? "(".$record->description.")" :''; ?> </small>
                                    </label>
                                    <?php if($record->type == 'textarea'): ?>
                                    <textarea name="setting_<?php echo e($record->id); ?>_<?php echo e($language->id); ?>" class="form-control textarea <?php echo e($errors->has('setting_'.$record->id.'_'.$language->id) ?'is-invalid':''); ?>" placeholder="<?php echo e($record->setting_key); ?> (<?php echo e(ucfirst($language->name)); ?>)"><?php echo e(old('setting_'.$record->id.'_'.$language->id,isset($settingLang->setting_val)?$settingLang->setting_val:'')); ?></textarea>
                                    <?php else: ?>
                                    <input name="setting_<?php echo e($record->id); ?>_<?php echo e($language->id); ?>" type="text" class="form-control <?php echo e($errors->has('setting_'.$record->id.'_'.$language->id) ?'is-invalid':''); ?>" placeholder="<?php echo e($record->setting_key); ?> (<?php echo e(ucfirst($language->name)); ?>)" value="<?php echo e(old('setting_'.$record->id.'_'.$language->id,isset($settingLang->setting_val)?$settingLang->setting_val:'')); ?>">
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['setting_'.$record->id.'_'.$language->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red"><?php echo e($message); ?></div>
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red"><?php echo e($message); ?></div>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo e($record->setting_key); ?> 
                                        <?php if($record->is_require==1): ?>
                                        <span class="required"></span>
                                        <?php endif; ?>
                                        <small class="text-primary"> <?php echo $record->description? "(".$record->description.")" :''; ?> </small>
                                    </label>
                                    <?php if($record->type == 'file'): ?>
                                    <!--Logo-->
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="setting_val" class="custom-file-input" onchange="readURL(this, 'default-image-logo')">
                                            <label class="custom-file-label"><?php echo e($record->setting_key); ?></label>
                                        </div>
                                        <div class="input-group-append">
                                            <!--<span class="input-group-text">Upload</span>-->
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <span class=""><img class="logo-table default-image-logo" src="<?php echo e(asset(Storage::url($record->setting_val))); ?>" title="<?php echo e($record->setting_key); ?>" onclick="showDetails(this.src)" onerror="this.onerror=null;this.src='<?php echo e(asset(Storage::url('default.png'))); ?>'"/></span>
                                    </div>
                                    <?php elseif($record->type =='textarea'): ?>
                                    <textarea name="setting_val" class="form-control textarea <?php echo e($errors->has('setting_val') ?'is-invalid':''); ?>" placeholder="<?php echo e($record->setting_key); ?>"><?php echo e(old('setting_val',$record->setting_val)); ?></textarea>
                                    <?php elseif($record->type=='radio'): ?>
                                    <div class="form-group clearfix">
                                        <?php $__currentLoopData = $radioValue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$radio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="<?php echo e($radio); ?>" value="<?php echo e($key); ?>" name="setting_val" <?php echo e((collect(old('setting_val',$record->setting_val,$record->setting_val))->contains($key)) ? 'checked':''); ?>>
                                            <label for="<?php echo e($radio); ?>"><?php echo e(ucfirst($radio)); ?></label>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php else: ?>
                                    <input name="setting_val" type="text" class="form-control <?php echo e($errors->has('setting_val') ?'is-invalid':''); ?>" placeholder="<?php echo e($record->setting_key); ?>" value="<?php echo e(old('setting_val',$record->setting_val)); ?>">
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['setting_val'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red"><?php echo e($message); ?></div>
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red"><?php echo e($message); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="float-left"><?php echo __('admin.additional_notes'); ?></span>
                        <div class="btn-toolbar float-right">
                            <div class="btn-group mr-2">
                                <a href="<?php echo e(route('admin.general-setting.setting.index')); ?>" class="<?php echo e(config('custom.btn-danger-form')); ?>" title="<?php echo e(__('admin.cancel')); ?>"><?php echo e(__('admin.cancel')); ?></a>
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
<?php echo $__env->make('layout/ckeditor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($record->type == 'file'): ?>
<?php echo $__env->make('layout/fileupload', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->make('layout/image_preview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    function readURL(input, imageClass)
    {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function (e)
            {
                $('.' + imageClass).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/adminpanel/resources/views/admin/general-setting/setting/edit.blade.php ENDPATH**/ ?>