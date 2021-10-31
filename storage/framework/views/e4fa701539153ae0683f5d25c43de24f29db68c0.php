<html lang="en" lang="<?php echo e(app()->getLocale()); ?>">
<?php
    $rtlLanguages = !empty($generalSettings['rtl_languages']) ? $generalSettings['rtl_languages'] : [];

    $isRtl = ((in_array(mb_strtoupper(app()->getLocale()), $rtlLanguages)) or (!empty($generalSettings['rtl_layout']) and $generalSettings['rtl_layout'] == 1));
?>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo e($pageTitle ?? ''); ?> </title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- General CSS File -->
    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/fontawesome/css/all.min.css"/>
    <link rel="stylesheet" href="/assets/default/vendors/toast/jquery.toast.min.css">


    <?php echo $__env->yieldPushContent('libraries_top'); ?>

    <link rel="stylesheet" href="/assets/admin/css/style.css">
    <link rel="stylesheet" href="/assets/admin/css/custom.css">
    <link rel="stylesheet" href="/assets/admin/css/components.css">
    <?php if($isRtl): ?>
        <link rel="stylesheet" href="/assets/admin/css/rtl.css">
    <?php endif; ?>
    <link rel="stylesheet" href="/assets/admin/vendor/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">

    <?php echo $__env->yieldPushContent('styles_top'); ?>
    <?php echo $__env->yieldPushContent('scripts_top'); ?>

    <style>
        <?php echo !empty(getCustomCssAndJs('css')) ? getCustomCssAndJs('css') : ''; ?>

    </style>
</head>
<body class="<?php if($isRtl): ?> rtl <?php endif; ?>">

<div id="app">
    <div class="main-wrapper">
        <?php echo $__env->make('admin.includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <div class="main-content">

            <?php echo $__env->yieldContent('content'); ?>

        </div>
    </div>

    <div class="modal fade" id="fileViewModal" tabindex="-1" aria-labelledby="fileViewModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <img src="" class="w-100" height="350px" alt="">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('public.close')); ?></button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- General JS Scripts -->
<script src="/assets/admin/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="/assets/admin/vendor/poper/popper.min.js"></script>
<script src="/assets/admin/vendor/bootstrap/bootstrap.min.js"></script>
<script src="/assets/admin/vendor/nicescroll/jquery.nicescroll.min.js"></script>
<script src="/assets/admin/vendor/moment/moment.min.js"></script>
<script src="/assets/admin/js/stisla.js"></script>
<script src="/assets/default/vendors/toast/jquery.toast.min.js"></script>

<script>
    (function () {
        "use strict";

        window.csrfToken = $('meta[name="csrf-token"]');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        <?php if(session()->has('toast')): ?>
        $.toast({
            heading: '<?php echo e(session()->get('toast')['title'] ?? ''); ?>',
            text: '<?php echo e(session()->get('toast')['msg'] ?? ''); ?>',
            bgColor: '<?php if(session()->get('toast')['status'] == 'success'): ?> #43d477 <?php else: ?> #f63c3c <?php endif; ?>',
            textColor: 'white',
            hideAfter: 10000,
            position: 'bottom-right',
            icon: '<?php echo e(session()->get('toast')['status']); ?>'
        });
        <?php endif; ?>
    })(jQuery);
</script>

<script src="/assets/admin/vendor/daterangepicker/daterangepicker.min.js"></script>
<script src="/assets/default/vendors/select2/select2.min.js"></script>

<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<!-- Template JS File -->
<script src="/assets/admin/js/scripts.js"></script>

<?php echo $__env->yieldPushContent('styles_bottom'); ?>
<?php echo $__env->yieldPushContent('scripts_bottom'); ?>

<script src="/assets/admin/js/custom.js"></script>
<script>
    <?php echo !empty(getCustomCssAndJs('js')) ? getCustomCssAndJs('js') : ''; ?>

</script>
</body>
</html>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/layouts/app.blade.php ENDPATH**/ ?>