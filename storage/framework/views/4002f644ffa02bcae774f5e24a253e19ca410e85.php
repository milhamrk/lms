<!DOCTYPE html>
<html lang="en">
<?php
    $rtlLanguages = !empty($generalSettings['rtl_languages']) ? $generalSettings['rtl_languages'] : [];

    $isRtl = ((in_array(mb_strtoupper(app()->getLocale()), $rtlLanguages)) or (!empty($generalSettings['rtl_layout']) and $generalSettings['rtl_layout'] == 1));
?>
<head>
    <?php echo $__env->make(getTemplate().'.includes.metas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e($pageTitle ?? ''); ?><?php echo e(!empty($generalSettings['site_name']) ? (' | '.$generalSettings['site_name']) : ''); ?></title>

    <!-- General CSS File -->
    <link href="/assets/default/css/font.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/toast/jquery.toast.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/simplebar/simplebar.css">
    <link rel="stylesheet" href="/assets/default/css/app.css">
    <link rel="stylesheet" href="/assets/default/css/panel.css">

    <?php if($isRtl): ?>
        <link rel="stylesheet" href="/assets/default/css/rtl-app.css">
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('styles_top'); ?>
    <?php echo $__env->yieldPushContent('scripts_top'); ?>

    <style>
        <?php echo !empty(getCustomCssAndJs('css')) ? getCustomCssAndJs('css') : ''; ?>

    </style>

    <?php if(!empty($generalSettings['preloading']) and $generalSettings['preloading'] == '1'): ?>
        <?php echo $__env->make('admin.includes.preloading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

</head>
<body class="<?php if($isRtl): ?> rtl <?php endif; ?>">

<?php
    $isPanel = true;
?>

<div id="panel_app">

    <?php echo $__env->make(getTemplate().'.includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="d-flex justify-content-end">
        <?php echo $__env->make(getTemplate(). '.panel.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="panel-content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>
<!-- Template JS File -->
<script src="/assets/default/js/app.js"></script>
<script src="/assets/default/vendors/moment.min.js"></script>
<script src="/assets/default/vendors/feather-icons/dist/feather.min.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="/assets/default/vendors/toast/jquery.toast.min.js"></script>
<script type="text/javascript" src="/assets/default/vendors/simplebar/simplebar.min.js"></script>

<script>
    var deleteAlertTitle = '<?php echo e(trans('public.are_you_sure')); ?>';
    var deleteAlertHint = '<?php echo e(trans('public.deleteAlertHint')); ?>';
    var deleteAlertConfirm = '<?php echo e(trans('public.deleteAlertConfirm')); ?>';
    var deleteAlertCancel = '<?php echo e(trans('public.cancel')); ?>';
    var deleteAlertSuccess = '<?php echo e(trans('public.success')); ?>';
    var deleteAlertFail = '<?php echo e(trans('public.fail')); ?>';
    var deleteAlertFailHint = '<?php echo e(trans('public.deleteAlertFailHint')); ?>';
    var deleteAlertSuccessHint = '<?php echo e(trans('public.deleteAlertSuccessHint')); ?>';
</script>

<?php if(session()->has('toast')): ?>
    <script>
        (function () {
            "use strict";

            $.toast({
                heading: '<?php echo e(session()->get('toast')['title'] ?? ''); ?>',
                text: '<?php echo e(session()->get('toast')['msg'] ?? ''); ?>',
                bgColor: '<?php if(session()->get('toast')['status'] == 'success'): ?> #43d477 <?php else: ?> #f63c3c <?php endif; ?>',
                textColor: 'white',
                hideAfter: 10000,
                position: 'bottom-right',
                icon: '<?php echo e(session()->get('toast')['status']); ?>'
            });
        })(jQuery)
    </script>
<?php endif; ?>

<?php echo $__env->yieldPushContent('styles_bottom'); ?>
<?php echo $__env->yieldPushContent('scripts_bottom'); ?>
<script src="/assets/default/js//parts/main.min.js"></script>

<script src="/assets/default/js/panel/public.min.js"></script>

<script>
    <?php echo !empty(getCustomCssAndJs('js')) ? getCustomCssAndJs('js') : ''; ?>

</script>
</body>
</html>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/web/default/panel/layouts/panel_layout.blade.php ENDPATH**/ ?>