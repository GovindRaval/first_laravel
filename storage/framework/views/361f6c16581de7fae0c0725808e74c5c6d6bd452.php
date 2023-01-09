<?php $__env->startSection('page_title',  trans('admin.profile')); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layout/toaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo e(__('admin.profile')); ?></h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home.index')); ?>"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home.profile')); ?>"><?php echo e(__('admin.profile')); ?></a></li>
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
                <form method="post" action="<?php echo e(route('admin.home.update-profile')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label><?php echo e(__('admin.name')); ?></label><span class="required"></span>
                                    <input name="name" type="text" class="form-control <?php echo e($errors->has('name') ?'is-invalid':''); ?>" placeholder="<?php echo e(__('admin.name')); ?>" value="<?php echo e(old('name',$user->name)); ?>">
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red"><?php echo e($message); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label><?php echo e(__('admin.profile_picture')); ?></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="profile_picture" class="custom-file-input">
                                            <label class="custom-file-label"><?php echo e(__('admin.profile_picture')); ?></label>
                                        </div>
                                        <div class="input-group-append">
                                            <!--<span class="input-group-text">Upload</span>-->
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['profile_picture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red"><?php echo e($message); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-2 text-center">
                                <label class="profile_preview"><?php echo e(__('admin.current_profile_picture')); ?></label>
                                <div class="text-center">
                                    <img class="logo-table text-center" src="<?php echo e(Helper::getUserProfilePicture()); ?>" onclick="showDetails(this.src)" onerror="this.onerror=null;this.src='<?php echo e(asset(Storage::url('default.png'))); ?>'"/></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="float-left"><?php echo __('admin.additional_notes'); ?></span>
                        <div class="btn-toolbar float-right">
                            <div class="btn-group mr-2">
                                <a href="<?php echo e(route('admin.home.profile')); ?>" class="<?php echo e(config('custom.btn-danger-form')); ?>" title="<?php echo e(__('admin.cancel')); ?>"><?php echo e(__('admin.cancel')); ?></a>
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
<?php echo $__env->make('layout/image_preview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>
<script>
                                        $(function ()
                                        {
                                            bsCustomFileInput.init();
                                            $("input[type=file]").change(function ()
                                            {
                                                readURL(this);
                                            });
                                        });

                                        function readURL(input)
                                        {
                                            if (input.files && input.files[0])
                                            {
                                                var reader = new FileReader();

                                                reader.onload = function (e)
                                                {
                                                    $('.logo-table').attr('src', e.target.result);
                                                    $(".profile_preview").text('<?php echo e(__("admin.updated_profile_picture")); ?>')
                                                }

                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/adminpanel/resources/views/admin/home/edit_profile.blade.php ENDPATH**/ ?>