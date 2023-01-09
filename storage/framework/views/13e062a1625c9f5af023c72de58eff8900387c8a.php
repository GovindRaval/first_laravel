<link rel="stylesheet" href="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.css')); ?>">
<script src="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
<script>

function permission_denied()
{
    Swal.fire("Alert", "Permission Denied", "error");
}

function showSweetAlert(url)
{
    Swal.fire({
        title: '<?php echo e(__("admin.are_you_sure")); ?>',
        text: '<?php echo e(__("admin.not_able_to_recover")); ?>',
        type: 'danger',
        showCancelButton: true,
        confirmButtonText: '<?php echo e(__("admin.yes_delete")); ?>',
        cancelButtonText: '<?php echo e(__("admin.no_keep_it")); ?>'
    }).then((result) => {
        if (result.value)
        {
            window.location.href = url;
        }
    });
}
function showSweetAlertImage(url, id = '')
{
    Swal.fire({
        title: '<?php echo e(__("admin.are_you_sure")); ?>',
        text: '<?php echo e(__("admin.not_able_to_recover_file")); ?>',
        type: 'danger',
        showCancelButton: true,
        confirmButtonText: '<?php echo e(__("admin.yes_delete")); ?>',
        cancelButtonText: '<?php echo e(__("admin.no_keep_it")); ?>'
    }).then((result) => {
        if (result.value)
        {
            $("#pageloader").fadeIn();
            $.ajax({
                type: 'GET',
                url: url,
                success: (data) => {
                    $("#" + id).remove();
                    if (data.status)
                    {
                        addMoreCount--;
                        changeCount();
                        show_success(data.message);
                    }
                    else
                    {
                        show_error('<?php echo e(__("admin.swal_error")); ?>', data.message);
                    }
                },
                error: function (xhr)
                {
                    show_error('<?php echo e(__("admin.swal_error")); ?>', '<?php echo e(__("admin.swal_error_message")); ?>');
                },
                complete: function (data)
                {
                    $("#pageloader").fadeOut();
                }
            });
        }
    });
}
function show_error(error, message)
{
    Swal.fire(error, message, "error");
}

function show_success(message)
{
    Swal.fire('<?php echo e(__("admin.swal_success")); ?>', message, 'success');
}
</script><?php /**PATH /opt/lampp/htdocs/adminpanel/resources/views/layout/sweetalert.blade.php ENDPATH**/ ?>