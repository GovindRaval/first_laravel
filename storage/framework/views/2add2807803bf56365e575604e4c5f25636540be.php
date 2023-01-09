<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title><?php echo e(Helper::getAppName()?Helper::getAppName()."  ":''); ?></title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- Favicons -->
        <link href="<?php echo e(Helper::getFavIcon()?Helper::getFavIcon():''); ?>" rel="icon">
        <link href="<?php echo e(Helper::getFavIcon()?Helper::getFavIcon():''); ?>" rel="apple-touch-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="<?php echo e(asset('web/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('web/assets/vendor/icofont/icofont.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('web/assets/vendor/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('web/assets/vendor/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('web/assets/vendor/animate.css/animate.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('web/assets/vendor/venobox/venobox.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('web/assets/vendor/owl.carousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('web/assets/vendor/aos/aos.css')); ?>" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="<?php echo e(asset('web/assets/css/style.css')); ?>" rel="stylesheet">
        <!-- =======================================================
        * Template Name: BizPage - v3.2.1
        * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
        <style>
            .submit-btn{
                background: #13a456;
                border: 0;
                padding: 10px 30px;
                color:
                    #fff;
                transition: 0.4s;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <main id="main">
            <!-- ======= Contact Section ======= -->
            <section id="contact" class="mt-5">
                <div class="container" data-aos="fade-up">
                    <div class="section-header">
                        <h3>Login</h3>
                    </div>
                    <div class="form">
                        <form action="<?php echo e(route('web.user.login')); ?>" method="post" role="form" class="">
                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-12 ">
                                    <div class="col-md-12">
                                        <?php
                                        if (session()->has('success'))
                                        {
                                            ?>
                                            <?php echo e(session()->get('success')); ?>

                                            <?php
                                        }
                                        if (isset($status) && !empty($status) && $status == 'success')
                                        {
                                            ?>
                                            <?php echo e($message_text); ?>

                                            <?php
                                        }
                                        if (session()->has('error'))
                                        {
                                            ?>
                                            <div class="validate text-danger"><?php echo e(session()->get('error')); ?></div>
                                            <?php
                                        }
                                        if (isset($status) && !empty($status) && $status == 'error')
                                        {
                                            ?>
                                            <div class="validate text-danger"><?php echo e($message_text); ?></div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group col-md-12 ">
                                        <input type="text" name="email" class="form-control" id="name" placeholder="Your Name"/>
                                        <div class="validate text-danger">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <?php echo e($message); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="password" class="form-control" name="password" id="email" placeholder="Your Password" />
                                        <div class="validate text-danger">
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <?php echo e($message); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center"><button class="submit-btn" type="submit">Login</button></div>
                        </form>
                    </div>
                </div>
            </section><!-- End Contact Section -->
        </main><!-- End #main -->
        <!-- Vendor JS Files -->
        <script src="<?php echo e(asset('web/assets/vendor/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('web/assets/vendor/jquery.easing/jquery.easing.min.js')); ?>"></script>
        <script src="<?php echo e(asset('web/assets/vendor/php-email-form/validate.js')); ?>"></script>
        <script src="<?php echo e(asset('web/assets/vendor/waypoints/jquery.waypoints.min.js')); ?>"></script>
        <script src="<?php echo e(asset('web/assets/vendor/counterup/counterup.min.js')); ?>"></script>
        <script src="<?php echo e(asset('web/assets/vendor/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
        <script src="<?php echo e(asset('web/assets/vendor/venobox/venobox.min.js')); ?>"></script>
        <script src="<?php echo e(asset('web/assets/vendor/owl.carousel/owl.carousel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('web/assets/vendor/aos/aos.js')); ?>"></script>
        <!-- Template Main JS File -->
        <script src="<?php echo e(asset('web/assets/js/main.js')); ?>"></script>
    </body>
</html><?php /**PATH /opt/lampp/htdocs/adminpanel/resources/views/web/user/login.blade.php ENDPATH**/ ?>