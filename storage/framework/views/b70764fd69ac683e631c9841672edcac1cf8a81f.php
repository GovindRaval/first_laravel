<?php $__env->startSection('page_title', trans('admin.500')); ?>
<?php echo $__env->make('layout/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="content">
    <div class="container-fluid mt-2">
        <div class="row mt-2">
            <div class="col-12 mt-2">
                <h1 class="headline text-danger text-center"><i class="fa fa-exclamation-triangle text-danger"></i> <?php echo e(__('admin.500')); ?></h1>
                <div class="error-content">
                    <h3 class="text-center">
                    </h3>
                    <p class="col-md-12 text-center">
                        <?php echo e(__('admin.500_page_text')); ?> <a href="<?php echo e(URL("/")); ?>"><?php echo e(__('admin.500_page_text_url')); ?></a>
                    </p>
                </div>
                <!-- /.error-content -->
            </div>
        </div>
    </div>
    <!-- /.error-page -->
</section>
<?php /**PATH C:\xampp\htdocs\first_laravel\resources\views/errors/500.blade.php ENDPATH**/ ?>