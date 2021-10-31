<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('web.default.panel.quizzes.create_quiz_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
    </script>

    <script src="/assets/default/js/panel/quiz.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/web/default/panel/quizzes/create.blade.php ENDPATH**/ ?>