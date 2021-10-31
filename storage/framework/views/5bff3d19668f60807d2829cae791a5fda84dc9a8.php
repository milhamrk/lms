<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <h2 class="section-title"><?php echo e(trans('panel.my_activity')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/webinars.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($allWebinarsCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.purchased')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/hours.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e(convertMinutesToHourAndMinute($hours)); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('home.hours')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/upcoming.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($upComing); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.upcoming')); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mt-25">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <h2 class="section-title"><?php echo e(trans('panel.my_purchases')); ?></h2>

            <form action="" method="get">
                <div class="d-flex align-items-center flex-row-reverse flex-md-row justify-content-start justify-content-md-center mt-20 mt-md-0">
                    <label class="mb-0 mr-10 text-gray font-14 font-weight-500" for="conductedSwitch"><?php echo e(trans('panel.only_not_conducted_webinars')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="not_conducted" <?php if(request()->get('not_conducted','') == 'on'): ?> checked <?php endif; ?> class="custom-control-input" id="conductedSwitch">
                        <label class="custom-control-label cursor-pointer" for="conductedSwitch"></label>
                    </div>
                </div>
            </form>
        </div>

        <?php if(!empty($webinars) and !$webinars->isEmpty()): ?>
            <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $lastSession = $webinar->lastSession();
                    $nextSession = $webinar->nextSession();
                    $isProgressing = false;

                    if($webinar->start_date <= time() and !empty($lastSession) and $lastSession->date > time()) {
                        $isProgressing=true;
                    }
                ?>

                <div class="row mt-30">
                    <div class="col-12">
                        <div class="webinar-card webinar-list d-flex">
                            <div class="image-box">
                                <img src="<?php echo e($webinar->getImage()); ?>" class="img-cover" alt="">

                                <?php if($webinar->type == 'webinar'): ?>
                                    <?php if($webinar->start_date > time()): ?>
                                        <span class="badge badge-primary"><?php echo e(trans('panel.not_conducted')); ?></span>
                                    <?php elseif($webinar->isProgressing()): ?>
                                        <span class="badge badge-secondary"><?php echo e(trans('webinars.in_progress')); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-secondary"><?php echo e(trans('public.finished')); ?></span>
                                    <?php endif; ?>
                                <?php elseif(!empty($webinar->downloadable)): ?>
                                    <span class="badge badge-secondary"><?php echo e(trans('home.downloadable')); ?></span>
                                <?php else: ?>
                                    <span class="badge badge-secondary"><?php echo e(trans('webinars.'.$webinar->type)); ?></span>
                                <?php endif; ?>

                                <?php
                                    $percent = $webinar->getProgress();

                                    if($webinar->isWebinar()){
                                        if($webinar->isProgressing()) {
                                            $progressTitle = trans('public.course_learning_passed',['percent' => $percent]);
                                        } else {
                                            $progressTitle = $webinar->sales_count .'/'. $webinar->capacity .' '. trans('quiz.students');
                                        }
                                    } else {
                                           $progressTitle = trans('public.course_learning_passed',['percent' => $percent]);
                                    }
                                ?>

                                <div class="progress cursor-pointer" data-toggle="tooltip" data-placement="top" title="<?php echo e($progressTitle); ?>">
                                    <span class="progress-bar" style="width: <?php echo e($percent); ?>%"></span>
                                </div>
                            </div>

                            <div class="webinar-card-body w-100 d-flex flex-column">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?php echo e($webinar->getUrl()); ?>">
                                        <h3 class="webinar-title font-weight-bold font-16 text-dark-blue">
                                            <?php echo e($webinar->title); ?>

                                            <span class="badge badge-dark ml-10 status-badge-dark"><?php echo e(trans('webinars.'.$webinar->type)); ?></span>
                                        </h3>
                                    </a>

                                    <div class="btn-group dropdown table-actions">
                                        <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i data-feather="more-vertical" height="20"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            <?php if(!empty($webinar->start_date) and ($webinar->start_date > time() or ($webinar->isProgressing() and !empty($nextSession)))): ?>
                                                <button type="button" data-webinar-id="<?php echo e($webinar->id); ?>" class="join-purchase-webinar webinar-actions btn-transparent d-block"><?php echo e(trans('footer.join')); ?></button>
                                            <?php endif; ?>

                                            <?php if(!empty($webinar->downloadable) or (!empty($webinar->files) and count($webinar->files))): ?>
                                                <a href="<?php echo e($webinar->getUrl()); ?>?tab=content" target="_blank" class="webinar-actions d-block mt-10"><?php echo e(trans('home.download')); ?></a>
                                            <?php endif; ?>

                                            <?php if($webinar->price > 0): ?>
                                                <a href="/panel/webinars/<?php echo e($webinar->id); ?>/invoice" target="_blank" class="webinar-actions d-block mt-10"><?php echo e(trans('public.invoice')); ?></a>
                                            <?php endif; ?>

                                            <a href="<?php echo e($webinar->getUrl()); ?>?tab=reviews" target="_blank" class="webinar-actions d-block mt-10"><?php echo e(trans('public.feedback')); ?></a>
                                        </div>
                                    </div>
                                </div>

                                <?php echo $__env->make(getTemplate() . '.includes.webinar.rate',['rate' => $webinar->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <div class="webinar-price-box mt-15">
                                    <?php if($webinar->price > 0): ?>
                                        <?php if($webinar->bestTicket() < $webinar->price): ?>
                                            <span class="real"><?php echo e($currency); ?><?php echo e(number_format($webinar->bestTicket(), 2, ".", "")+0); ?></span>
                                            <span class="off ml-10"><?php echo e($currency); ?><?php echo e(number_format($webinar->price, 2, ".", "")+0); ?></span>
                                        <?php else: ?>
                                            <span class="real"><?php echo e($currency); ?><?php echo e(number_format($webinar->price, 2, ".", "")+0); ?></span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span class="real"><?php echo e(trans('public.free')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="d-flex align-items-center justify-content-between flex-wrap mt-auto">
                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.item_id')); ?>:</span>
                                        <span class="stat-value"><?php echo e($webinar->id); ?></span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.category')); ?>:</span>
                                        <span class="stat-value"><?php echo e(!empty($webinar->category_id) ? $webinar->category->title : ''); ?></span>
                                    </div>

                                    <?php if($webinar->type == 'webinar'): ?>
                                        <?php if($webinar->isProgressing() and !empty($nextSession)): ?>
                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('webinars.next_session_duration')); ?>:</span>
                                                <span class="stat-value"><?php echo e(convertMinutesToHourAndMinute($nextSession->duration)); ?> Hrs</span>
                                            </div>

                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('webinars.next_session_start_date')); ?>:</span>
                                                <span class="stat-value"><?php echo e(dateTimeFormat($nextSession->date,'j F Y')); ?></span>
                                            </div>
                                        <?php else: ?>
                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('public.duration')); ?>:</span>
                                                <span class="stat-value"><?php echo e(convertMinutesToHourAndMinute($webinar->duration)); ?> Hrs</span>
                                            </div>

                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('public.start_date')); ?>:</span>
                                                <span class="stat-value"><?php echo e(dateTimeFormat($webinar->start_date,'j F Y')); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.instructor')); ?>:</span>
                                        <span class="stat-value"><?php echo e($webinar->teacher->full_name); ?></span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('panel.purchase_date')); ?>:</span>
                                        <span class="stat-value"><?php echo e(dateTimeFormat($webinar->purchast_date,'j F Y')); ?></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo $__env->make(getTemplate() . '.includes.no-result',[
            'file_name' => 'student.png',
            'title' => trans('panel.no_result_purchases') ,
            'hint' => trans('panel.no_result_purchases_hint') ,
            'btn' => ['url' => '/classes?sort=newest','text' => trans('panel.start_learning')]
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </section>

    <div class="my-30">
        <?php echo e($webinars->links('vendor.pagination.panel')); ?>

    </div>

    <?php echo $__env->make('web.default.panel.webinar.join_webinar_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var undefinedActiveSessionLang = '<?php echo e(trans('webinars.undefined_active_session')); ?>';
    </script>

    <script src="/assets/default/js/panel/join_webinar.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/web/default/panel/webinar/purchases.blade.php ENDPATH**/ ?>