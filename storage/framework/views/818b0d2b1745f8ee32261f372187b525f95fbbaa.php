<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.personalization')); ?> <?php echo e(trans('admin/main.settings')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item active"><a href="/admin/settings"><?php echo e(trans('admin/main.settings')); ?></a></div>
                <div class="breadcrumb-item "><?php echo e(trans('admin/main.personalization')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link  active " id="pages_background-tab" data-toggle="tab" href="#pages_background" role="tab" aria-controls="pages_background" aria-selected="true"><?php echo e(trans('admin/main.pages_backgrounds')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " id="home_sections-tab" data-toggle="tab" href="#home_sections" role="tab" aria-controls="home_sections" aria-selected="true"><?php echo e(trans('admin/main.home_sections')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " id="home_hero1-tab" data-toggle="tab" href="#home_hero1" role="tab" aria-controls="home_hero1" aria-selected="true"><?php echo e(trans('admin/main.hero_style_1')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " id="home_hero2-tab" data-toggle="tab" href="#home_hero2" role="tab" aria-controls="home_hero2" aria-selected="true"><?php echo e(trans('admin/main.Hero_style_2')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " id="video_and_image_section-tab" data-toggle="tab" href="#video_and_image_section" role="tab" aria-controls="video_and_image_section" aria-selected="true"><?php echo e(trans('admin/main.video_and_image_sections')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " id="panel_sidebar-tab" data-toggle="tab" href="#panel_sidebar" role="tab" aria-controls="video_and_image_section" aria-selected="true"><?php echo e(trans('admin/main.panel_sidebar')); ?></a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent2">
                                <?php echo $__env->make('admin.settings.personalization.page_background',['itemValue' => (!empty($settings) and !empty($settings['page_background'])) ? $settings['page_background']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('admin.settings.personalization.home_sections',['itemValue' => (!empty($settings) and !empty($settings['home_sections'])) ? $settings['home_sections']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('admin.settings.personalization.home_hero',['itemValue' => (!empty($settings) and !empty($settings['home_hero'])) ? $settings['home_hero']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('admin.settings.personalization.home_hero2',['itemValue' => (!empty($settings) and !empty($settings['home_hero2'])) ? $settings['home_hero2']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('admin.settings.personalization.home_video_or_image_box',['itemValue' => (!empty($settings) and !empty($settings['home_video_or_image_box'])) ? $settings['home_video_or_image_box']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('admin.settings.personalization.panel_sidebar',['itemValue' => (!empty($settings) and !empty($settings['panel_sidebar'])) ? $settings['panel_sidebar']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/settings/personalization.blade.php ENDPATH**/ ?>