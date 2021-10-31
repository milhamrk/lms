<button type="button" class="sidebar-close">
    <i class="fa fa-times"></i>
</button>

<div class="navbar-bg"></div>

<nav class="navbar navbar-expand-lg main-navbar">

    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_list')): ?>
            <li class="dropdown dropdown-list-toggle">
                <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?php if(!empty($unreadNotifications) and count($unreadNotifications)): ?> beep <?php else: ?> disabled <?php endif; ?>">
                    <i class="far fa-bell"></i>
                </a>

                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-header"><?php echo e(trans('admin/main.notifications')); ?>

                        <div class="float-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_markAllRead')): ?>
                                <a href="/admin/notifications/mark_all_read"><?php echo e(trans('admin/main.mark_all_read')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="dropdown-list-content dropdown-list-icons">
                        <?php $__currentLoopData = $unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unreadNotification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="/admin/notifications" class="dropdown-item">
                                <div class="dropdown-item-icon bg-info text-white d-flex align-items-center justify-content-center">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    <?php echo e($unreadNotification->title); ?>

                                    <div class="time text-primary"><?php echo e(dateTimeFormat($unreadNotification->created_at,'Y M j | H:i')); ?></div>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="dropdown-footer text-center">
                        <a href="/admin/notifications"><?php echo e(trans('admin/main.view_all')); ?> <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </li>
        <?php endif; ?>

        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?php echo e($authUser->getAvatar()); ?>" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"><?php echo e($authUser->full_name); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                 <a href="/" class="dropdown-item has-icon">
                    <i class="fas fa-globe"></i> <?php echo e(trans('admin/main.show_website')); ?>

                </a>

                <a href="/admin/users/<?php echo e($authUser->id); ?>/edit" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> <?php echo e(trans('admin/main.change_password')); ?>

                </a>

                <div class="dropdown-divider"></div>
                <a href="/admin/logout" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> <?php echo e(trans('admin/main.logout')); ?>

                </a>
            </div>
        </li>
    </ul>
</nav>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/includes/navbar.blade.php ENDPATH**/ ?>