<div class="webinar-card">
    <figure>
        <div class="image-box">
            <?php if($webinar->bestTicket() < $webinar->price): ?>
                <span class="badge badge-danger"><?php echo e(trans('public.offer',['off' => $webinar->bestTicket(true)['percent']])); ?></span>
            <?php elseif(empty($isFeature) and !empty($webinar->feature)): ?>
                <span class="badge badge-warning"><?php echo e(trans('home.featured')); ?></span>
            <?php elseif($webinar->type == 'webinar'): ?>
                <?php if($webinar->start_date > time()): ?>
                    <span class="badge badge-primary"><?php echo e(trans('panel.not_conducted')); ?></span>
                <?php elseif($webinar->isProgressing()): ?>
                    <span class="badge badge-secondary"><?php echo e(trans('webinars.in_progress')); ?></span>
                <?php else: ?>
                    <span class="badge badge-secondary"><?php echo e(trans('public.finished')); ?></span>
                <?php endif; ?>
            <?php else: ?>
                <span class="badge badge-primary"><?php echo e(trans('webinars.'.$webinar->type)); ?></span>
            <?php endif; ?>

             <a href="<?php echo e($webinar->getUrl()); ?>">
            <img src="<?php echo e($webinar->getImage()); ?>" class="img-cover" alt="<?php echo e($webinar->title); ?>" >
             </a>

            <?php if($webinar->type == 'webinar'): ?>
                <div class="progress">
                    <span class="progress-bar" style="width: <?php echo e($webinar->getProgress()); ?>%"></span>
                </div>

                <a href="<?php echo e($webinar->addToCalendarLink()); ?>" target="_blank" class="webinar-notify d-flex align-items-center justify-content-center">
                    <i data-feather="bell" width="20" height="20" class="webinar-icon"></i>
                </a>
            <?php endif; ?>
        </div>

        <figcaption class="webinar-card-body">
            <div class="user-inline-avatar d-flex align-items-center">
                <div class="avatar">
                    <img src="<?php echo e($webinar->teacher->getAvatar()); ?>" class="img-cover" alt="<?php echo e($webinar->teacher->full_name); ?>">
                </div>
                <a href="<?php echo e($webinar->teacher->getProfileUrl()); ?>" target="_blank" class="user-name ml-5 font-14"><?php echo e($webinar->teacher->full_name); ?></a>
            </div>

            <a href="<?php echo e($webinar->getUrl()); ?>">
                <h3 class="mt-15 webinar-title font-weight-bold font-16 text-dark-blue"><?php echo e(clean($webinar->title,'title')); ?></h3>
            </a>

            <?php if(!empty($webinar->category)): ?>
                <span class="d-block font-14 mt-10"><?php echo e(trans('public.in')); ?> <a href="<?php echo e($webinar->category->getUrl()); ?>" target="_blank" class="text-decoration-underline"><?php echo e($webinar->category->title); ?></a></span>
            <?php endif; ?>

            <?php echo $__env->make(getTemplate() . '.includes.webinar.rate',['rate' => $webinar->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="d-flex justify-content-between mt-20">
                <div class="d-flex align-items-center">
                    <i data-feather="clock" width="20" height="20" class="webinar-icon"></i>
                    <span class="duration font-14 ml-5"><?php echo e(convertMinutesToHourAndMinute($webinar->duration)); ?> <?php echo e(trans('home.hours')); ?></span>
                </div>

                <div class="vertical-line mx-15"></div>

                <div class="d-flex align-items-center">
                    <i data-feather="calendar" width="20" height="20" class="webinar-icon"></i>
                    <span class="date-published font-14 ml-5"><?php echo e(dateTimeFormat(!empty($webinar->start_date) ? $webinar->start_date : $webinar->created_at,'j F Y')); ?></span>
                </div>
            </div>

            <div class="webinar-price-box mt-25">
                <?php if(!empty($webinar->price) and $webinar->price > 0): ?>
                    <?php if($webinar->bestTicket() < $webinar->price): ?>
                        <span class="real"><?php echo e($currency); ?><?php echo e(number_format($webinar->bestTicket(), 2, ".", "")+0); ?></span>
                        <span class="off ml-10"><?php echo e($currency); ?><?php echo e(number_format($webinar->price, 2, ".", "")+0); ?></span>
                    <?php else: ?>
                        <span class="real"><?php echo e($currency); ?><?php echo e(number_format($webinar->price, 2, ".", "")+0); ?></span>
                    <?php endif; ?>
                <?php else: ?>
                    <span class="real font-14"><?php echo e(trans('public.free')); ?></span>
                <?php endif; ?>
            </div>
        </figcaption>
    </figure>
</div>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/web/default/includes/webinar/grid-card.blade.php ENDPATH**/ ?>