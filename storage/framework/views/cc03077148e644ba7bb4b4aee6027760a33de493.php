<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
        <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
        <title>::: <?php echo e(__('admin.forgot-password-title')); ?> | <?php echo e(Helper::getAppName()?Helper::getAppName():''); ?> :::</title>
        <link rel="stylesheet" href="<?php echo e(asset('front/css/fonts.css')); ?>">
    </head>
    <body style="background: #fff; font-family: 'Segoe UI', serif; font-size: 14px; color: #606060; line-height: 1.5em">
        <div style="margin: 0 auto; width: 100%; max-width: 600px; box-sizing: border-box; border: 5px solid rgba(225, 225, 225, 0.3)">
            <div style="text-align: center; padding: 20px;">
                <img src="<?php echo e(Helper::getAppLogo()?Helper::getAppLogo(): ''); ?>" >
            </div>
            <div style="padding: 20px; background: rgba(225, 225, 225, 0.3) url(<?php echo e(asset('images/mail/bg.svg')); ?>) top center; background-size: 950px auto;">
                <div style="margin-bottom: 30px;">
                    <p><b><?php echo e(__('admin.dear')); ?> <?php echo e(ucfirst($user->name)); ?> ,</b></p>
                    <p><?php echo e(__('admin.user_with_detail')); ?>:</p>
                </div>
                <div style="border: 1px solid #f6cfca; margin-bottom: 30px;">
                    <table style="border-collapse: collapse; width: 100%; background: #fff;">

                        <tr style="border-bottom: 1px solid #f6cfca;">
                            <th style="padding: 10px; text-align: left; background: #f6cfca;"><?php echo e(__('admin.registered_email')); ?>:</th>
                            <td style="padding: 10px; font-size: 14px; color: #4c4c4c;"><?php echo e($user->email); ?></td>
                        </tr>
                        <tr>
                            <th style="padding: 10px; text-align: left; background: #f6cfca;"><?php echo e(__('admin.login_here')); ?>:</th>
                            <td style="padding: 10px; font-size: 14px; color: #4c4c4c;"><a href="<?php echo e($link); ?>"><?php echo e(__('admin.fp-link')); ?></a></td>
                        </tr>
                    </table>
                </div>
                <div style="color: #e18a88;">
                    <p><?php echo e(__('admin.best_wishes')); ?>,<br><?php echo e(Helper::getAppName()?Helper::getAppName():''); ?></p>
                </div>
            </div>
            <div style="padding: 20px; text-align: center; font-size: 12px; background: #e18a88; color: #ffffff;">
                <span style="display: block"><?php echo e(__('admin.all_rights_reserved')); ?>.</span>
            </div>
        </div>
    </body>
</html>
<?php /**PATH /opt/lampp/htdocs/adminpanel/resources/views/auth/reset-password/index.blade.php ENDPATH**/ ?>