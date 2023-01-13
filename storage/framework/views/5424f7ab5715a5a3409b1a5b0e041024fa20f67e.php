<script src="<?php echo e(asset('plugins/ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/ckeditor/adapters/jquery.js')); ?>"></script>
<script>
$(function ()
{
    $(".textarea").ckeditor();
    CKEDITOR.config.autoParagraph = false;
});
</script><?php /**PATH C:\xampp\htdocs\first_laravel\resources\views/layout/ckeditor.blade.php ENDPATH**/ ?>