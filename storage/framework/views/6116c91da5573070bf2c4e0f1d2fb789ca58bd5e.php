
<?php $__env->startSection('page_title', trans('admin.home')); ?>
<?php $__env->startSection('additional_css'); ?>


<link rel="stylesheet" href="<?php echo e(asset('plugins/datetimepicker/bootstrap-4.min.css')); ?>" crossorigin="anonymous" />
<style>
    .dashboard-card-bg {
        background-color: #02025A;
        color: #FFF;
    }

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo e(__('admin.dashboard')); ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('admin.dashboard')); ?></li>
                    </ol>
                </div>
                <!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <!-- New Order -->
                    <div class="small-box bg-indigo">
                        <div class="inner">
                            <h3>Country</h3>
                            <p><?php echo e($countrycount); ?></p>
                        </div>
                        <div class="icon"><i class="fa fa-cart-plus"></i></div>
                        <a href="<?php echo e(route('admin.master.country.index')); ?>" class="small-box-footer"><?php echo e(__('admin.view-all')); ?> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <!-- New Order -->
                    <div class="small-box bg-indigo">
                        <div class="inner">
                            <h3>City</h3>
                            <p><?php echo e($citycounter); ?></p>
                        </div>
                        <div class="icon"><i class="fa fa-cart-plus"></i></div>
                        <a href="<?php echo e(route('admin.master.city.index')); ?>" class="small-box-footer"><?php echo e(__('admin.view-all')); ?> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header card-header-custom border-transparent">
                            <h3 class="card-title card-title-color">Country wise City</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">

                            <div class="table-responsive">
                                <table class="table m-0 table-head-fixed">
                                    <thead>
                                        <tr>
                                            <th>Country Name</th>
                                            <th class="text-center">No. of City</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $getCountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <?php
                                             $description    = $record->getCountryDescription();
                         $getcitydata = $record->cityCount($record->id);
                       $citiesString = $getcitydata->join(', ');
                                               ?>
                                            <td><?php echo e($description->country_name); ?></td>
                                            <td class="text-center"><?php echo e($citiesString); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->

        <!--  form 1 filter-->
        <div class="container-fluid">
            <h3><?php echo e(__('admin.user_created_date')); ?></h3>
            <form class="list-table" id="form-search1" method="get" action="<?php echo e(route('admin.home.index')); ?>">
                <div class="row">
                    <div class="col-12">
                        <section class="content">
                            <div class="card <?php echo e(config('custom.card-primary')); ?>">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <input data-toggle="datetimepicker" data-target=".fromDate" class="fromDate form-control datetimepicker-input" placeholder="From Date" name="fromDate" type="text">
                                                    <div class="input-group-append" data-toggle="datetimepicker" data-target=".fromDate">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $__errorArgs = ['fromDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-red"><?php echo e($message); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <input data-toggle="datetimepicker" data-target=".toDate" class="toDate form-control datetimepicker-input" placeholder="To Date" name="toDate" type="text">
                                                    <div class="input-group-append" data-toggle="datetimepicker" data-target=".toDate">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $__errorArgs = ['toDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-red"><?php echo e($message); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group btn-toolbar">
                                                    <div class="btn-group">
                                                        <button type="button" id="serchBtn1" class="<?php echo e(config('custom.btn-success-form')); ?>" title="<?php echo e(__('admin.search')); ?>"><?php echo e(__('admin.search')); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <!-- New Order -->
                        <div class="small-box dashboard-card-bg" style="font-size: 21px">
                            <div class="inner">
                                <b>Total Country</b>
                                <p><?php echo e($countryTotal); ?></p>
                            </div>
                            <div class="icon"><i class=""></i></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <!-- New Order -->
                        <div class="small-box dashboard-card-bg" style="font-size: 21px">
                            <div class="inner">
                                <b>Total City</b>
                                <p><?php echo e($cityTotal); ?></p>
                            </div>
                            <div class="icon"><i class=""></i></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <!-- New Order -->
                        <div class="small-box dashboard-card-bg" style="font-size: 21px">
                            <div class="inner">
                                <b>Total Video</b>
                                <p><?php echo e($videoTotal); ?></p>
                            </div>
                            <div class="icon"><i class=""></i></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>
<!-- /.row -->




</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_specific_js'); ?>
<script src="<?php echo e(asset('plugins/jquery/jquery.inputmask.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/moment/moment.min.js')); ?>" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('plugins/datetimepicker/bootstrap-4.js')); ?>" crossorigin="anonymous"></script>
<?php echo $__env->make('layout/datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    $(document).ready(function() {

        //form 1 submit call filter    
        $('#serchBtn1').click(function() {
            $("#form-search1").attr("action", "<?php echo e(route('admin.home.index')); ?>");
            $("#form-search1").submit();
        });
    });

    //from 2 date formate
    startDate();
    endDate();
    $(".fromDate").on('change.datetimepicker', function(e) {
        var from = $(this).val();
        //                                                $(".end-date").datetimepicker("destroy");
        endDate(e.date);
        //                                                $(".end-date").datetimepicker('minDate', e.date);
    });

    function startDate() {
        $('.fromDate').inputmask("99-99-9999");
        $(".fromDate").datetimepicker({
            format: "<?php echo e(config('custom.js_date_format')); ?>"
            , ignoreReadonly: true
            , buttons: {
                showClear: false
            , }
            , icons: {
                clear: 'fa fa-trash'
            , }
        , });
        //                                                $(".camp-date").val("<?php echo e(date(config('custom.php_date_format'),strtotime(isset($fromDateFilter)?$fromDateFilter:date('Y-m-d')))); ?>");
        $(".fromDate").val("<?php echo e(isset($fromDate)?$fromDate:''); ?>");
    }

    function endDate($defaultDate = false) {
        $('.toDate').inputmask("99-99-9999");
        $(".toDate").datetimepicker({
            format: "<?php echo e(config('custom.js_date_format')); ?>",
            //                                minDate: $defaultDate ? $defaultDate : moment("<?php echo e(date('Y-m-d')); ?>"),
            ignoreReadonly: true
            , buttons: {
                showClear: false
            , }
            , icons: {
                clear: 'fa fa-trash'
            , }
        });
        //                                                $(".end-date").val("<?php echo e(date(config('custom.php_date_format'),strtotime(isset($toDateFilter)?$toDateFilter:date('Y-m-d')))); ?>");
        $(".toDate").val("<?php echo e(isset($toDate)?$toDate:''); ?>");
    }

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first_laravel\resources\views/index.blade.php ENDPATH**/ ?>