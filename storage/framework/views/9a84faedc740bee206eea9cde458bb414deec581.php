<style>
    p{
        margin-bottom: 0px;
    }
</style>
<?php
$setting       = Helper::getSettingById(7,1);
$footer   = isset($setting) ? trim($setting->setting_val) : "";
$footer = str_replace("#year#",date("Y"),$footer);
$company       = Helper::getSettingById(8,1);
$company   = isset($company) ? trim($company->setting_val) : "";
?>
<footer class="main-footer">
    <strong><?php echo $footer; ?> </strong> <strong class="float-right"><span class="no-print"> <?php echo $company; ?></span></strong>
</footer><?php /**PATH C:\xampp\htdocs\first_laravel\resources\views/layout/footer.blade.php ENDPATH**/ ?>