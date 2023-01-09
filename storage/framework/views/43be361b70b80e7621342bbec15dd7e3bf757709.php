<?php $__env->startSection('page_title',  trans('admin.profile')); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <?php echo $__env->make('layout/toaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo e(__('admin.profile')); ?></h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home.index')); ?>"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('admin.profile')); ?></li>
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
                    <div class="card <?php echo e(config('custom.card-primary')); ?>">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img onclick="showDetails(this.src)" class="img-circle elevation-3 profile-user-img" src="<?php echo e(Helper::getUserProfilePicture()); ?>" alt="<?php echo e(__('admin.profile_pic_alt')); ?>" onerror="this.onerror=null;this.src='<?php echo e(asset(Storage::url('default.png'))); ?>'" >
                            </div>
                            <h3 class="profile-username text-center"><?php echo e(Auth::user()->name); ?></h3>
                        </div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.edit_profile'))): ?>
                        <div class="card-footer">
                            <div class="btn-toolbar float-right">
                                <div class="btn-group mr-2">
                                    <a href="<?php echo e(route('admin.home.edit-profile')); ?>" class="<?php echo e(config('custom.btn-success-form')); ?>"><?php echo e(__('admin.edit_profile')); ?></a>
                                </div>
                                <div class="btn-group">
                                    <a href="<?php echo e(route('admin.home.change-password')); ?>" class="<?php echo e(config('custom.btn-primary-form')); ?>"><?php echo e(__('admin.change_password')); ?></a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- /.card-body -->
                    </div>
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
<?php echo $__env->make('layout/image_preview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/adminpanel/resources/views/admin/home/profile.blade.php ENDPATH**/ ?>