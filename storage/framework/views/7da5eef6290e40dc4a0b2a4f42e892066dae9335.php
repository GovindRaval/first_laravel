<?php $__env->startSection('page_title',  trans('admin.user_role')); ?>
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
                    <h1><?php echo e(__('admin.user_role')); ?></h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home.index')); ?>"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('super-admin.user-role.index')); ?>"><?php echo e(__('admin.user_role')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('admin.add')); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card <?php echo e(config('custom.card-primary')); ?>">
                <div class="card-header">
                    <h3 class="card-title"><?php echo e(__('admin.add_new')); ?></h3>
                </div>
                <form method="post" action="<?php echo e(route('super-admin.user-role.save')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(__('admin.user')); ?></label><span class="required"></span>
                                    <select class="select2 select-user <?php echo e($errors->has('user_id') ?'error':''); ?>" name="user_id[]" multiple="">
                                        <?php $__currentLoopData = $userList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($record->id); ?>" <?php echo e((collect(old('user_id'))->contains($record->id)) ? 'selected':''); ?>><?php echo e($record ? ucfirst($record->name). ' ' .ucfirst($record->last_name) .'('.$record->email.')' : ''); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(__('admin.role')); ?></label><span class="required"></span>
                                    <select class="select2 select-role <?php echo e($errors->has('role_id') ?'error':''); ?>" name="role_id[]" multiple="">
                                        <?php $__empty_1 = true; $__currentLoopData = $roleList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($record->id); ?>" <?php echo e((collect(old('role_id'))->contains($record->id)) ? 'selected':''); ?>><?php echo e($record ? ucfirst($record->name) :''); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option></option>
                                        <?php endif; ?>
                                    </select>
                                    <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="float-left"><?php echo __('admin.additional_notes'); ?></span>
                        <div class="btn-toolbar float-right">
                            <div class="btn-group mr-2">
                                <a href="<?php echo e(route('super-admin.role.index')); ?>" class="<?php echo e(config('custom.btn-danger-form')); ?>" title="<?php echo e(__('admin.cancel')); ?>"><?php echo e(__('admin.cancel')); ?></a>
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
<script>
    $(function ()
    {
        $(".select-user").select2({
            placeholder: "<?php echo e(__('admin.select_user')); ?>",
            allowClear: true,
            selectionTitleAttribute: true
        });
        $(".select-role").select2({
            placeholder: "<?php echo e(__('admin.select_role')); ?>",
            allowClear: true,
            selectionTitleAttribute: true
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/adminpanel/resources/views/super-admin/user-role/bulk_assign.blade.php ENDPATH**/ ?>