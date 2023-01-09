
<?php $__env->startSection('page_title',  trans('admin.role')); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layout/toaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo e(__('admin.role')); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home.index')); ?>"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('super-admin.role.index')); ?>"><?php echo e(__('admin.role')); ?></a></li>
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
                <form method="post" action="<?php echo e(route('super-admin.role.add')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(__('admin.role_name')); ?></label><span class="required"></span>
                                    <input name="name" type="text" class="form-control <?php echo e($errors->has('name') ?'is-invalid':''); ?>" placeholder="<?php echo e(__('admin.role_name')); ?>" value="<?php echo e(old('name')); ?>">
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red"><?php echo e($message); ?></div>
                                    <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/adminpanel/resources/views/super-admin/role/add.blade.php ENDPATH**/ ?>