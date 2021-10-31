<div class="dropdown">
    <button type="button" class="btn btn-transparent dropdown-toggle" <?php echo e((empty($unReadNotifications) or count($unReadNotifications) < 1) ? 'disabled' : ''); ?> id="navbarNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i data-feather="bell" width="20" height="20" class="mr-10"></i>

        <?php if(!empty($unReadNotifications) and count($unReadNotifications)): ?>
            <span class="badge badge-circle-danger d-flex align-items-center justify-content-center"><?php echo e(count($unReadNotifications)); ?></span>
        <?php endif; ?>
    </button>

    <div class="dropdown-menu pt-20" aria-labelledby="navbarNotification">
        <div class="d-flex flex-column h-100">
            <div class="mb-auto navbar-notification-card" data-simplebar>
                <div class="d-md-none border-bottom mb-20 pb-10 text-right">
                    <i class="close-dropdown" data-feather="x" width="32" height="32" class="mr-10"></i>
                </div>

                <?php if(!empty($unReadNotifications) and count($unReadNotifications)): ?>

                    <?php $__currentLoopData = $unReadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unReadNotification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="/panel/notifications?notification=<?php echo e($unReadNotification->id); ?>">
                            <div class="navbar-notification-item border-bottom">
                                <h4 class="font-14 font-weight-bold text-secondary"><?php echo e($unReadNotification->title); ?></h4>
                                <span class="notify-at d-block mt-5"><?php echo e(dateTimeFormat($unReadNotification->created_at,'Y M j | H:i')); ?></span>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php else: ?>
                    <div class="d-flex align-items-center text-center py-50">
                        <i data-feather="bell" width="20" height="20" class="mr-10"></i>
                        <span class=""><?php echo e(trans('notification.empty_notifications')); ?></span>
                    </div>
                <?php endif; ?>

            </div>

            <?php if(!empty($unReadNotifications) and count($unReadNotifications)): ?>
                <div class="mt-10 navbar-notification-action">
                    <a href="/panel/notifications" class="btn btn-sm btn-danger btn-block"><?php echo e(trans('notification.all_notifications')); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/web/default/includes/notification-dropdown.blade.php ENDPATH**/ ?>