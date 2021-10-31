<?php
    $progressSteps = [
        1 => [
            'name' => 'basic_information',
            'icon' => 'basic-info'
        ],

        2 => [
            'name' => 'images',
            'icon' => 'images'
        ],

        3 => [
            'name' => 'about',
            'icon' => 'about'
        ],

        4 => [
            'name' => 'educations',
            'icon' => 'graduate'
        ],

        5 => [
            'name' => 'experiences',
            'icon' => 'experiences'
        ],

        6 => [
            'name' => 'occupations',
            'icon' => 'skills'
        ],
    ];

    if(!$user->isUser()) {
        $progressSteps[7] =[
            'name' => 'identity_and_financial',
            'icon' => 'financial'
        ];

        $progressSteps[8] =[
            'name' => 'zoom_api',
            'icon' => 'zoom'
        ];
    }

    $currentStep = empty($currentStep) ? 1 : $currentStep;
?>


<div class="webinar-progress d-block d-lg-flex align-items-center p-15 panel-shadow bg-white rounded-sm">

    <?php $__currentLoopData = $progressSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="progress-item d-flex align-items-center">
            <a href="<?php if(!empty($organization_id)): ?> /panel/manage/<?php echo e($user_type ?? 'instructors'); ?>/<?php echo e($user->id); ?>/edit/step/<?php echo e($key); ?> <?php else: ?> /panel/setting/step/<?php echo e($key); ?> <?php endif; ?>" class="progress-icon p-10 d-flex align-items-center justify-content-center rounded-circle <?php echo e($key == $currentStep ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.' . $step['name'])); ?>">
                <img src="/assets/default/img/icons/<?php echo e($step['icon']); ?>.svg" class="img-cover" alt="">
            </a>

            <div class="ml-10 <?php echo e($key == $currentStep ? '' : 'd-lg-none'); ?>">
                <h4 class="font-16 text-secondary font-weight-bold"><?php echo e(trans('public.' . $step['name'])); ?></h4>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/web/default/panel/setting/setting_includes/progress.blade.php ENDPATH**/ ?>