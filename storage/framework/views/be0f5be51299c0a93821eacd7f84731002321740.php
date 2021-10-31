<div class="xs-panel-nav d-flex d-lg-none justify-content-between py-5 px-15">
    <div class="user-info d-flex align-items-center justify-content-between">
        <div class="user-avatar">
            <img src="<?php echo e($authUser->getAvatar()); ?>" class="img-cover" alt="<?php echo e($authUser->full_name); ?>">
        </div>

        <div class="user-name ml-15">
            <h3 class="font-16 font-weight-bold"><?php echo e($authUser->full_name); ?></h3>
        </div>
    </div>

    <button class="sidebar-toggler btn-transparent d-flex flex-column-reverse justify-content-center align-items-center p-5 rounded-sm sidebarNavToggle" type="button">
        <span><?php echo e(trans('navbar.menu')); ?></span>
        <i data-feather="menu" width="16" height="16"></i>
    </button>
</div>

<div class="panel-sidebar pt-50 pb-25 px-25" id="panelSidebar">
    <button class="btn-transparent panel-sidebar-close sidebarNavToggle">
        <i data-feather="x" width="24" height="24"></i>
    </button>

    <div class="user-info d-flex align-items-center flex-row flex-lg-column justify-content-lg-center">
        <a href="/panel" class="user-avatar">
            <img src="<?php echo e($authUser->getAvatar()); ?>" class="img-cover" alt="<?php echo e($authUser->full_name); ?>">
        </a>

        <div class="d-flex flex-column align-items-center justify-content-center">
            <a href="/panel" class="user-name mt-15">
                <h3 class="font-16 font-weight-bold text-center"><?php echo e($authUser->full_name); ?></h3>
            </a>

            <?php if(!empty($authUser->getUserGroup())): ?>
                <span class="create-new-user mt-10"><?php echo e($authUser->getUserGroup()->name); ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="d-flex sidebar-user-stats pb-10 ml-20 pb-lg-20 mt-15 mt-lg-30">
        <div class="sidebar-user-stat-item d-flex flex-column">
            <strong class="text-center"><?php echo e($authUser->webinars()->count()); ?></strong>
            <span class="font-12"><?php echo e(trans('webinars.classes')); ?></span>
        </div>

        <div class="border-left mx-30"></div>

        <?php if($authUser->isUser()): ?>
            <div class="sidebar-user-stat-item d-flex flex-column">
                <strong class="text-center"><?php echo e($authUser->following()->count()); ?></strong>
                <span class="font-12"><?php echo e(trans('panel.following')); ?></span>
            </div>
        <?php else: ?>
            <div class="sidebar-user-stat-item d-flex flex-column">
                <strong class="text-center"><?php echo e($authUser->followers()->count()); ?></strong>
                <span class="font-12"><?php echo e(trans('panel.followers')); ?></span>
            </div>
        <?php endif; ?>
    </div>

    <ul class="sidebar-menu pt-10 <?php if(!empty($authUser->userGroup)): ?> has-user-group <?php endif; ?>" data-simplebar <?php if((!empty($isRtl) and $isRtl)): ?> data-simplebar-direction="rtl" <?php endif; ?>>

        <li class="sidenav-item <?php echo e((request()->is('panel')) ? 'sidenav-item-active' : ''); ?>">
            <a href="/panel" class="d-flex align-items-center">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.dashboard')); ?></span>
            </a>
        </li>

        <?php if($authUser->isOrganization()): ?>
            <li class="sidenav-item <?php echo e((request()->is('panel/instructors') or request()->is('panel/manage/instructors*')) ? 'sidenav-item-active' : ''); ?>">
                <a class="d-flex align-items-center" data-toggle="collapse" href="#instructorsCollapse" role="button" aria-expanded="false" aria-controls="instructorsCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.teachers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                    <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('public.instructors')); ?></span>
                </a>

                <div class="collapse <?php echo e((request()->is('panel/instructors') or request()->is('panel/manage/instructors*')) ? 'show' : ''); ?>" id="instructorsCollapse">
                    <ul class="sidenav-item-collapse">
                        <li class="mt-5 <?php echo e((request()->is('panel/instructors/new')) ? 'active' : ''); ?>">
                            <a href="/panel/manage/instructors/new"><?php echo e(trans('public.new')); ?></a>
                        </li>
                        <li class="mt-5 <?php echo e((request()->is('panel/manage/instructors')) ? 'active' : ''); ?>">
                            <a href="/panel/manage/instructors"><?php echo e(trans('public.list')); ?></a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="sidenav-item <?php echo e((request()->is('panel/students') or request()->is('panel/manage/students*')) ? 'sidenav-item-active' : ''); ?>">
                <a class="d-flex align-items-center" data-toggle="collapse" href="#studentsCollapse" role="button" aria-expanded="false" aria-controls="studentsCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.students', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                    <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('quiz.students')); ?></span>
                </a>

                <div class="collapse <?php echo e((request()->is('panel/students') or request()->is('panel/manage/students*')) ? 'show' : ''); ?>" id="studentsCollapse">
                    <ul class="sidenav-item-collapse">
                        <li class="mt-5 <?php echo e((request()->is('panel/manage/students/new')) ? 'active' : ''); ?>">
                            <a href="/panel/manage/students/new"><?php echo e(trans('public.new')); ?></a>
                        </li>
                        <li class="mt-5 <?php echo e((request()->is('panel/manage/students')) ? 'active' : ''); ?>">
                            <a href="/panel/manage/students"><?php echo e(trans('public.list')); ?></a>
                        </li>
                    </ul>
                </div>
            </li>
        <?php endif; ?>

        <li class="sidenav-item <?php echo e((request()->is('panel/webinars') or request()->is('panel/webinars/*')) ? 'sidenav-item-active' : ''); ?>">
            <a class="d-flex align-items-center" data-toggle="collapse" href="#webinarCollapse" role="button" aria-expanded="false" aria-controls="webinarCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.webinars', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.webinars')); ?></span>
            </a>

            <div class="collapse <?php echo e((request()->is('panel/webinars') or request()->is('panel/webinars/*')) ? 'show' : ''); ?>" id="webinarCollapse">
                <ul class="sidenav-item-collapse">
                    <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                        <li class="mt-5 <?php echo e((request()->is('panel/webinars/new')) ? 'active' : ''); ?>">
                            <a href="/panel/webinars/new"><?php echo e(trans('public.new')); ?></a>
                        </li>

                        <li class="mt-5 <?php echo e((request()->is('panel/webinars')) ? 'active' : ''); ?>">
                            <a href="/panel/webinars"><?php echo e(trans('panel.my_classes')); ?></a>
                        </li>

                        <li class="mt-5 <?php echo e((request()->is('panel/webinars/invitations')) ? 'active' : ''); ?>">
                            <a href="/panel/webinars/invitations"><?php echo e(trans('panel.invited_classes')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if(!empty($authUser->organ_id)): ?>
                        <li class="mt-5 <?php echo e((request()->is('panel/webinars/organization_classes')) ? 'active' : ''); ?>">
                            <a href="/panel/webinars/organization_classes"><?php echo e(trans('panel.organization_classes')); ?></a>
                        </li>
                    <?php endif; ?>

                    <li class="mt-5 <?php echo e((request()->is('panel/webinars/purchases')) ? 'active' : ''); ?>">
                        <a href="/panel/webinars/purchases"><?php echo e(trans('panel.my_purchases')); ?></a>
                    </li>

                    <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                        <li class="mt-5 <?php echo e((request()->is('panel/webinars/comments')) ? 'active' : ''); ?>">
                            <a href="/panel/webinars/comments"><?php echo e(trans('panel.my_class_comments')); ?></a>
                        </li>
                    <?php endif; ?>

                    <li class="mt-5 <?php echo e((request()->is('panel/webinars/my-comments')) ? 'active' : ''); ?>">
                        <a href="/panel/webinars/my-comments"><?php echo e(trans('panel.my_comments')); ?></a>
                    </li>
                    <li class="mt-5 <?php echo e((request()->is('panel/webinars/favorites')) ? 'active' : ''); ?>">
                        <a href="/panel/webinars/favorites"><?php echo e(trans('panel.favorites')); ?></a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="sidenav-item <?php echo e((request()->is('panel/meetings') or request()->is('panel/meetings/*')) ? 'sidenav-item-active' : ''); ?>">
            <a class="d-flex align-items-center" data-toggle="collapse" href="#meetingCollapse" role="button" aria-expanded="false" aria-controls="meetingCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.requests', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.meetings')); ?></span>
            </a>

            <div class="collapse <?php echo e((request()->is('panel/meetings') or request()->is('panel/meetings/*')) ? 'show' : ''); ?>" id="meetingCollapse">
                <ul class="sidenav-item-collapse">

                    <li class="mt-5 <?php echo e((request()->is('panel/meetings/reservation')) ? 'active' : ''); ?>">
                        <a href="/panel/meetings/reservation"><?php echo e(trans('public.my_reservation')); ?></a>
                    </li>

                    <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                        <li class="mt-5 <?php echo e((request()->is('panel/meetings/requests')) ? 'active' : ''); ?>">
                            <a href="/panel/meetings/requests"><?php echo e(trans('panel.requests')); ?></a>
                        </li>

                        <li class="mt-5 <?php echo e((request()->is('panel/meetings/settings')) ? 'active' : ''); ?>">
                            <a href="/panel/meetings/settings"><?php echo e(trans('panel.settings')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>

        <li class="sidenav-item <?php echo e((request()->is('panel/quizzes') or request()->is('panel/quizzes/*')) ? 'sidenav-item-active' : ''); ?>">
            <a class="d-flex align-items-center" data-toggle="collapse" href="#quizzesCollapse" role="button" aria-expanded="false" aria-controls="quizzesCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.quizzes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.quizzes')); ?></span>
            </a>

            <div class="collapse <?php echo e((request()->is('panel/quizzes') or request()->is('panel/quizzes/*')) ? 'show' : ''); ?>" id="quizzesCollapse">
                <ul class="sidenav-item-collapse">
                    <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                        <li class="mt-5 <?php echo e((request()->is('panel/quizzes/new')) ? 'active' : ''); ?>">
                            <a href="/panel/quizzes/new"><?php echo e(trans('quiz.new_quiz')); ?></a>
                        </li>
                        <li class="mt-5 <?php echo e((request()->is('panel/quizzes')) ? 'active' : ''); ?>">
                            <a href="/panel/quizzes"><?php echo e(trans('public.list')); ?></a>
                        </li>
                        <li class="mt-5 <?php echo e((request()->is('panel/quizzes/results')) ? 'active' : ''); ?>">
                            <a href="/panel/quizzes/results"><?php echo e(trans('public.results')); ?></a>
                        </li>
                    <?php endif; ?>

                    <li class="mt-5 <?php echo e((request()->is('panel/quizzes/my-results')) ? 'active' : ''); ?>">
                        <a href="/panel/quizzes/my-results"><?php echo e(trans('public.my_results')); ?></a>
                    </li>

                    <li class="mt-5 <?php echo e((request()->is('panel/quizzes/opens')) ? 'active' : ''); ?>">
                        <a href="/panel/quizzes/opens"><?php echo e(trans('public.not_participated')); ?></a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="sidenav-item <?php echo e((request()->is('panel/certificates') or request()->is('panel/certificates/*')) ? 'sidenav-item-active' : ''); ?>">
            <a class="d-flex align-items-center" data-toggle="collapse" href="#certificatesCollapse" role="button" aria-expanded="false" aria-controls="certificatesCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.certificate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.certificates')); ?></span>
            </a>

            <div class="collapse <?php echo e((request()->is('panel/certificates') or request()->is('panel/certificates/*')) ? 'show' : ''); ?>" id="certificatesCollapse">
                <ul class="sidenav-item-collapse">
                    <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                        <li class="mt-5 <?php echo e((request()->is('panel/certificates')) ? 'active' : ''); ?>">
                            <a href="/panel/certificates"><?php echo e(trans('public.list')); ?></a>
                        </li>
                    <?php endif; ?>

                    <li class="mt-5 <?php echo e((request()->is('panel/certificates/achievements')) ? 'active' : ''); ?>">
                        <a href="/panel/certificates/achievements"><?php echo e(trans('quiz.achievements')); ?></a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="sidenav-item <?php echo e((request()->is('panel/financial') or request()->is('panel/financial/*')) ? 'sidenav-item-active' : ''); ?>">
            <a class="d-flex align-items-center" data-toggle="collapse" href="#financialCollapse" role="button" aria-expanded="false" aria-controls="financialCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.financial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.financial')); ?></span>
            </a>

            <div class="collapse <?php echo e((request()->is('panel/financial') or request()->is('panel/financial/*')) ? 'show' : ''); ?>" id="financialCollapse">
                <ul class="sidenav-item-collapse">

                    <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                        <li class="mt-5 <?php echo e((request()->is('panel/financial/sales')) ? 'active' : ''); ?>">
                            <a href="/panel/financial/sales"><?php echo e(trans('financial.sales_report')); ?></a>
                        </li>
                    <?php endif; ?>

                    <li class="mt-5 <?php echo e((request()->is('panel/financial/summary')) ? 'active' : ''); ?>">
                        <a href="/panel/financial/summary"><?php echo e(trans('financial.financial_summary')); ?></a>
                    </li>

                    <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                        <li class="mt-5 <?php echo e((request()->is('panel/financial/payout')) ? 'active' : ''); ?>">
                            <a href="/panel/financial/payout"><?php echo e(trans('financial.payout')); ?></a>
                        </li>
                    <?php endif; ?>

                    <li class="mt-5 <?php echo e((request()->is('panel/financial/account')) ? 'active' : ''); ?>">
                        <a href="/panel/financial/account"><?php echo e(trans('financial.charge_account')); ?></a>
                    </li>

                    <li class="mt-5 <?php echo e((request()->is('panel/financial/subscribes')) ? 'active' : ''); ?>">
                        <a href="/panel/financial/subscribes"><?php echo e(trans('financial.subscribes')); ?></a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="sidenav-item <?php echo e((request()->is('panel/support') or request()->is('panel/support/*')) ? 'sidenav-item-active' : ''); ?>">
            <a class="d-flex align-items-center" data-toggle="collapse" href="#supportCollapse" role="button" aria-expanded="false" aria-controls="supportCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.support', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.support')); ?></span>
            </a>

            <div class="collapse <?php echo e((request()->is('panel/support') or request()->is('panel/support/*')) ? 'show' : ''); ?>" id="supportCollapse">
                <ul class="sidenav-item-collapse">
                    <li class="mt-5 <?php echo e((request()->is('panel/support/new')) ? 'active' : ''); ?>">
                        <a href="/panel/support/new"><?php echo e(trans('public.new')); ?></a>
                    </li>
                    <li class="mt-5 <?php echo e((request()->is('panel/support')) ? 'active' : ''); ?>">
                        <a href="/panel/support"><?php echo e(trans('panel.classes_support')); ?></a>
                    </li>
                    <li class="mt-5 <?php echo e((request()->is('panel/support/tickets')) ? 'active' : ''); ?>">
                        <a href="/panel/support/tickets"><?php echo e(trans('panel.support_tickets')); ?></a>
                    </li>
                </ul>
            </div>
        </li>

        <?php if(!$authUser->isUser()): ?>
            <li class="sidenav-item <?php echo e((request()->is('panel/marketing') or request()->is('panel/marketing/*')) ? 'sidenav-item-active' : ''); ?>">
                <a class="d-flex align-items-center" data-toggle="collapse" href="#marketingCollapse" role="button" aria-expanded="false" aria-controls="marketingCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.marketing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                    <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.marketing')); ?></span>
                </a>

                <div class="collapse <?php echo e((request()->is('panel/marketing') or request()->is('panel/marketing/*')) ? 'show' : ''); ?>" id="marketingCollapse">
                    <ul class="sidenav-item-collapse">
                        <li class="mt-5 <?php echo e((request()->is('panel/marketing/special_offers')) ? 'active' : ''); ?>">
                            <a href="/panel/marketing/special_offers"><?php echo e(trans('panel.discounts')); ?></a>
                        </li>
                        <li class="mt-5 <?php echo e((request()->is('panel/marketing/promotions')) ? 'active' : ''); ?>">
                            <a href="/panel/marketing/promotions"><?php echo e(trans('panel.promotions')); ?></a>
                        </li>
                    </ul>
                </div>
            </li>
        <?php endif; ?>

        <?php if($authUser->isOrganization()): ?>
            <li class="sidenav-item <?php echo e((request()->is('panel/noticeboard') or request()->is('panel/noticeboard/*')) ? 'sidenav-item-active' : ''); ?>">
                <a class="d-flex align-items-center" data-toggle="collapse" href="#noticeboardCollapse" role="button" aria-expanded="false" aria-controls="noticeboardCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.noticeboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>

                    <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.noticeboard')); ?></span>
                </a>

                <div class="collapse <?php echo e((request()->is('panel/noticeboard') or request()->is('panel/noticeboard/*')) ? 'show' : ''); ?>" id="noticeboardCollapse">
                    <ul class="sidenav-item-collapse">
                        <li class="mt-5 <?php echo e((request()->is('panel/noticeboard')) ? 'active' : ''); ?>">
                            <a href="/panel/noticeboard"><?php echo e(trans('public.history')); ?></a>
                        </li>

                        <li class="mt-5 <?php echo e((request()->is('panel/noticeboard/new')) ? 'active' : ''); ?>">
                            <a href="/panel/noticeboard/new"><?php echo e(trans('public.new')); ?></a>
                        </li>
                    </ul>
                </div>
            </li>
        <?php endif; ?>

        <li class="sidenav-item <?php echo e((request()->is('panel/notifications')) ? 'sidenav-item-active' : ''); ?>">
            <a href="/panel/notifications" class="d-flex align-items-center">
            <span class="sidenav-notification-icon sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.notifications')); ?></span>
            </a>
        </li>

        <li class="sidenav-item <?php echo e((request()->is('panel/setting')) ? 'sidenav-item-active' : ''); ?>">
            <a href="/panel/setting" class="d-flex align-items-center">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.settings')); ?></span>
            </a>
        </li>

        <?php if($authUser->isTeacher() or $authUser->isOrganization()): ?>
            <li class="sidenav-item ">
                <a href="<?php echo e($authUser->getProfileUrl()); ?>" class="d-flex align-items-center">
                <span class="sidenav-item-icon mr-10">
                    <i data-feather="user" stroke="#1f3b64" stroke-width="1.5" width="24" height="24" class="mr-10 webinar-icon"></i>
                </span>
                    <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('public.my_profile')); ?></span>
                </a>
            </li>
        <?php endif; ?>

        <li class="sidenav-item">
            <a href="/logout" class="d-flex align-items-center">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.log_out')); ?></span>
            </a>
        </li>
    </ul>

    <?php
        $getPanelSidebarSettings = getPanelSidebarSettings();
    ?>

    <?php if(!empty($getPanelSidebarSettings)): ?>
        <div class="sidebar-create-class d-none d-md-block">
            <a href="<?php echo e(!empty($getPanelSidebarSettings['link']) ? $getPanelSidebarSettings['link'] : ''); ?>" class="sidebar-create-class-btn d-block text-right p-5">
                <img src="<?php echo e(!empty($getPanelSidebarSettings['background']) ? $getPanelSidebarSettings['background'] : ''); ?>" alt="">
            </a>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/web/default/panel/includes/sidebar.blade.php ENDPATH**/ ?>