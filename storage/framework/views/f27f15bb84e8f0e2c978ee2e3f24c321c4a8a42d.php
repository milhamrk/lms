<?php $__env->startSection('content'); ?>
	
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.settings')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.settings')); ?></div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"><?php echo e(trans('admin/main.overview')); ?></h2>
            <p class="section-lead">
                <?php echo e(trans('admin/main.overview_hint')); ?>

            </p>

            <div class="row">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_settings_general')): ?>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="card-body">
                                <h4><?php echo e(trans('admin/main.general_card_title')); ?></h4>
                                <p><?php echo e(trans('admin/main.general_card_hint')); ?></p>
                                <a href="/admin/settings/general" class="card-cta"><?php echo e(trans('admin/main.change_setting')); ?><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_settings_financial')): ?>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="card-body">
                                <h4><?php echo e(trans('admin/main.financial_card_title')); ?></h4>
                                <p><?php echo e(trans('admin/main.financial_card_hint')); ?></p>
                                <a href="/admin/settings/financial" class="card-cta"><?php echo e(trans('admin/main.change_setting')); ?><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_settings_personalization')): ?>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-wrench"></i>
                            </div>
                            <div class="card-body">
                                <h4><?php echo e(trans('admin/main.personalization_card_title')); ?></h4>
                                <p><?php echo e(trans('admin/main.personalization_card_hint')); ?></p>
                                <a href="/admin/settings/personalization" class="card-cta"><?php echo e(trans('admin/main.change_setting')); ?><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_settings_notifications')): ?>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="card-body">
                                <h4><?php echo e(trans('admin/main.notifications_card_title')); ?></h4>
                                <p><?php echo e(trans('admin/main.notifications_card_hint')); ?></p>
                                <a href="/admin/settings/notifications" class="card-cta"><?php echo e(trans('admin/main.change_setting')); ?><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_settings_seo')): ?>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="card-body">
                                <h4><?php echo e(trans('admin/main.seo_card_title')); ?></h4>
                                <p><?php echo e(trans('admin/main.seo_card_hint')); ?></p>
                                <a href="/admin/settings/seo" class="card-cta"><?php echo e(trans('admin/main.change_setting')); ?><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_settings_customization')): ?>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-list-alt"></i>
                            </div>
                            <div class="card-body">
                                <h4><?php echo e(trans('admin/main.customization_card_title')); ?></h4>
                                <p><?php echo e(trans('admin/main.customization_card_hint')); ?></p>
                                <a href="/admin/settings/customization" class="card-cta text-primary"><?php echo e(trans('admin/main.change_setting')); ?><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/settings/index.blade.php ENDPATH**/ ?>