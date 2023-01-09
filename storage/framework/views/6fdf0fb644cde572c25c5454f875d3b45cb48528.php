<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e(Helper::getAppName()?Helper::getAppName():''); ?> | <?php echo e(__('admin.login')); ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <style>
            .page-logo
            {
                height: 100px;
                width: 100px;
            }
        </style>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><img src="<?php echo e(Helper::getAppLogo()?Helper::getAppLogo(): ''); ?>" alt="<?php echo e(Helper::getAppName()?Helper::getAppName():''); ?>" class="page-logo"></a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg"><?php echo e(__('admin.login_text')); ?></p>
                    <?php echo $__env->make('layout/toaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php if($errors->has('email') || $errors->has('password')): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo e($errors->first('email')?$errors->first('email'):$errors->first('password')); ?>

                    </div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('admin.login')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="input-group mb-3">
                            <input name="email" type="text" class="form-control <?php echo e($errors->has('email') ?'is-invalid':''); ?>" placeholder="<?php echo e(__('admin.email_username')); ?>" value="<?php echo e(old('email')); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input name="password" type="password" class="form-control <?php echo e($errors->has('password') ?'is-invalid':''); ?>" placeholder="<?php echo e(__('admin.password')); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php if(false): ?>
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        <?php echo e(__('admin.remember_me')); ?>

                                    </label>
                                </div>
                            </div>
                            <?php endif; ?>
                            <!-- /.col -->
                            <div class="col-8">
                                <p class="mt-2">
                                    <a href="<?php echo e(route('admin.forgot-password')); ?>"><?php echo e(__('admin.forgot_password')); ?></a>
                                </p>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="<?php echo e(config('custom.btn-primary-form')); ?> btn-block"><?php echo e(__('admin.login')); ?></button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <?php if($socialLogin=false): ?>                        
                    <div class="social-auth-links text-center mb-3">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                        </a>
                    </div>
                    <!-- /.social-auth-links -->
                    <?php endif; ?>
                    <?php if(false): ?>
                    <p class="mb-0">
                        <a href="#"><?php echo e(__('admin.forgot_password')); ?></a>
                    </p>
                    <?php endif; ?>
                    <?php if($newUser = false): ?>
                    <p class="mb-0">
                        <a href="register.html" class="text-center">Register a new membership</a>
                    </p>
                    <?php endif; ?>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->
        <!-- jQuery -->
        <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>
    </body>
</html>
<?php /**PATH /opt/lampp/htdocs/adminpanel/resources/views/auth/login.blade.php ENDPATH**/ ?>