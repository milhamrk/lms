<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">
                <?php if(!empty($generalSettings['site_name'])): ?>
                    <?php echo e(strtoupper($generalSettings['site_name'])); ?>

                <?php else: ?>
                    Platform Title
                <?php endif; ?>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">
                <?php if(!empty($generalSettings['site_name'])): ?>
                    <?php echo e(strtoupper(substr($generalSettings['site_name'],0,2))); ?>

                <?php endif; ?>
            </a>
        </div>

        <ul class="sidebar-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_general_dashboard_show')): ?>
                <li class="<?php echo e((request()->is('admin/')) ? 'active' : ''); ?>">
                    <a href="/admin" class="nav-link">
                        <i class="fas fa-fire"></i>
                        <span><?php echo e(trans('admin/main.dashboard')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_marketing_dashboard')): ?>
                <li class="<?php echo e((request()->is('admin/marketing')) ? 'active' : ''); ?>">
                    <a href="/admin/marketing" class="nav-link">
                        <i class="fas fa-chart-pie"></i>
                        <span><?php echo e(trans('admin/main.marketing_dashboard_title')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_webinars') or
                $authUser->can('admin_categories') or
                $authUser->can('admin_filters') or
                $authUser->can('admin_quizzes') or
                $authUser->can('admin_certificate') or
                $authUser->can('admin_reviews_lists')
            ): ?>
                <li class="menu-header"><?php echo e(trans('site.education')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/webinars*') and !request()->is('admin/webinars/comments*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i>
                        <span><?php echo e(trans('panel.classes')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars_list')): ?>
                            <li class="<?php echo e((request()->is('admin/webinars') and request()->get('type') == 'course') ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['courses']) and $sidebarBeeps['courses']): ?> beep beep-sidebar <?php endif; ?>" href="/admin/webinars?type=course"><?php echo e(trans('admin/main.courses')); ?></a>
                            </li>

                            <li class="<?php echo e((request()->is('admin/webinars') and request()->get('type') == 'webinar') ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['webinars']) and $sidebarBeeps['webinars']): ?> beep beep-sidebar <?php endif; ?>" href="/admin/webinars?type=webinar"><?php echo e(trans('admin/main.live_classes')); ?></a>
                            </li>

                            <li class="<?php echo e((request()->is('admin/webinars') and request()->get('type') == 'text_lesson') ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['textLessons']) and $sidebarBeeps['textLessons']): ?> beep beep-sidebar <?php endif; ?>" href="/admin/webinars?type=text_lesson"><?php echo e(trans('admin/main.text_courses')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars_create')): ?>
                            <li class="<?php echo e((request()->is('admin/webinars/create')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/webinars/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/categories*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-th"></i>
                        <span><?php echo e(trans('admin/main.categories')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories_list')): ?>
                            <li class="<?php echo e((request()->is('admin/categories')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/categories"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories_create')): ?>
                            <li class="<?php echo e((request()->is('admin/categories/create')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/categories/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_trending_categories')): ?>
                            <li class="<?php echo e((request()->is('admin/categories/trends')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/categories/trends"><?php echo e(trans('admin/main.trends')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_filters')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/filters*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-filter"></i>
                        <span><?php echo e(trans('admin/main.filters')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_filters_list')): ?>
                            <li class="<?php echo e((request()->is('admin/filters')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/filters"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_filters_create')): ?>
                            <li class="<?php echo e((request()->is('admin/filters/create')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/filters/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_quizzes')): ?>
                <li class="<?php echo e((request()->is('admin/quizzes*')) ? 'active' : ''); ?>">
                    <a class="nav-link " href="/admin/quizzes">
                        <i class="fas fa-file"></i>
                        <span><?php echo e(trans('admin/main.quizzes')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_certificate')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/certificates*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-newspaper"></i>
                        <span><?php echo e(trans('admin/main.certificates')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_certificate_list')): ?>
                            <li class="<?php echo e((request()->is('admin/certificates')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/certificates"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_certificate_template_list')): ?>
                            <li class="<?php echo e((request()->is('admin/certificates/templates')) ? 'active' : ''); ?>">
                                <a class="nav-link"
                                   href="/admin/certificates/templates"><?php echo e(trans('admin/main.templates')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_certificate_template_create')): ?>
                            <li class="<?php echo e((request()->is('admin/certificates/templates/new')) ? 'active' : ''); ?>">
                                <a class="nav-link"
                                   href="/admin/certificates/templates/new"><?php echo e(trans('admin/main.new_template')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_reviews_lists')): ?>
                <li class="<?php echo e((request()->is('admin/reviews')) ? 'active' : ''); ?>">
                    <a href="/admin/reviews" class="nav-link <?php if(!empty($sidebarBeeps['reviews']) and $sidebarBeeps['reviews']): ?> beep beep-sidebar <?php endif; ?>">
                        <i class="fas fa-star"></i>
                        <span>Reviews</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_consultants_lists') or
                $authUser->can('admin_appointments_lists')
            ): ?>
                <li class="menu-header"><?php echo e(trans('site.appointments')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_consultants_lists')): ?>
                <li class="<?php echo e((request()->is('admin/consultants')) ? 'active' : ''); ?>">
                    <a href="/admin/consultants" class="nav-link">
                        <i class="fas fa-id-card"></i>
                        <span><?php echo e(trans('admin/main.consultants')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_appointments_lists')): ?>
                <li class="<?php echo e((request()->is('admin/appointments')) ? 'active' : ''); ?>">
                    <a class="nav-link" href="/admin/appointments">
                        <i class="fas fa-address-book"></i>
                        <span><?php echo e(trans('admin/main.appointments')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_users') or
                $authUser->can('admin_roles') or
                $authUser->can('admin_group') or
                $authUser->can('admin_users_badges') or
                $authUser->can('admin_become_instructors_list')
            ): ?>
                <li class="menu-header"><?php echo e(trans('panel.users')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/staffs') or request()->is('admin/students') or request()->is('admin/instructors') or request()->is('admin/organizations')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-users"></i>
                        <span><?php echo e(trans('admin/main.users_list')); ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_staffs_list')): ?>
                            <li class="<?php echo e((request()->is('admin/staffs')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/staffs"><?php echo e(trans('admin/main.staff')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_list')): ?>
                            <li class="<?php echo e((request()->is('admin/students')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/students"><?php echo e(trans('public.students')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_instructors_list')): ?>
                            <li class="<?php echo e((request()->is('admin/instructors')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/instructors"><?php echo e(trans('home.instructors')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_organizations_list')): ?>
                            <li class="<?php echo e((request()->is('admin/organizations')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/organizations"><?php echo e(trans('admin/main.organizations')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_create')): ?>
                            <li class="<?php echo e((request()->is('admin/users/create')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/users/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/roles*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-user-circle"></i> <span><?php echo e(trans('admin/main.roles')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles_list')): ?>
                            <li class="<?php echo e((request()->is('admin/roles')) ? 'active' : ''); ?>">
                                <a class="nav-link active" href="/admin/roles"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles_create')): ?>
                            <li class="<?php echo e((request()->is('admin/roles/create')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/roles/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/users/groups*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-sitemap"></i>
                        <span><?php echo e(trans('admin/main.groups')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group_list')): ?>
                            <li class="<?php echo e((request()->is('admin/users/groups')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/users/groups"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group_create')): ?>
                            <li class="<?php echo e((request()->is('admin/users/groups/create')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/users/groups/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_badges')): ?>
                <li class="<?php echo e((request()->is('admin/users/badges')) ? 'active' : ''); ?>">
                    <a class="nav-link" href="/admin/users/badges">
                        <i class="fas fa-trophy"></i>
                        <span><?php echo e(trans('admin/main.badges')); ?></span>
                    </a>
                </li>
            <?php endif; ?>



            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_become_instructors_list')): ?>
                <li class="<?php echo e((request()->is('admin/users/become_instructors')) ? 'active' : ''); ?>">
                    <a class="nav-link" href="/admin/users/become_instructors"><i class="fas fa-list-alt"></i>
                        <span><?php echo e(trans('admin/main.instructor_requests')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_supports') or
                $authUser->can('admin_comments') or
                $authUser->can('admin_reports') or
                $authUser->can('admin_contacts') or
                $authUser->can('admin_noticeboards') or
                $authUser->can('admin_notifications')
            ): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.crm')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_supports')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/supports*') and request()->get('type') != 'course_conversations') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-headphones"></i>
                        <span><?php echo e(trans('admin/main.supports')); ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_supports_list')): ?>
                            <li class="<?php echo e((request()->is('admin/supports')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/supports"><?php echo e(trans('public.tickets')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_support_send')): ?>
                            <li class="<?php echo e((request()->is('admin/supports/create')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/supports/create"><?php echo e(trans('admin/main.new_ticket')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_support_departments')): ?>
                            <li class="<?php echo e((request()->is('admin/supports/departments')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/supports/departments"><?php echo e(trans('admin/main.departments')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_support_course_conversations')): ?>
                    <li class="<?php echo e((request()->is('admin/supports*') and request()->get('type') == 'course_conversations') ? 'active' : ''); ?>">
                        <a class="nav-link" href="/admin/supports?type=course_conversations">
                            <i class="fas fa-envelope-square"></i>
                            <span><?php echo e(trans('admin/main.classes_conversations')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_comments')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/comments*') and !request()->is('admin/comments/webinars/reports')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-comments"></i> <span><?php echo e(trans('admin/main.comments')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_comments')): ?>
                            <li class="<?php echo e((request()->is('admin/comments/webinars')) ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['classesComments']) and $sidebarBeeps['classesComments']): ?> beep beep-sidebar <?php endif; ?>" href="/admin/comments/webinars"><?php echo e(trans('admin/main.classes_comments')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog_comments')): ?>
                            <li class="<?php echo e((request()->is('admin/comments/blog')) ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['blogComments']) and $sidebarBeeps['blogComments']): ?> beep beep-sidebar <?php endif; ?>" href="/admin/comments/blog"><?php echo e(trans('admin/main.blog_comments')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_reports')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/reports*') or request()->is('admin/comments/webinars/reports') or request()->is('admin/comments/blog/reports')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-info-circle"></i> <span><?php echo e(trans('admin/main.reports')); ?></span></a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_reports')): ?>
                            <li class="<?php echo e((request()->is('admin/reports/webinars')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/reports/webinars"><?php echo e(trans('panel.classes')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_comments_reports')): ?>
                            <li class="<?php echo e((request()->is('admin/comments/webinars/reports')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/comments/webinars/reports"><?php echo e(trans('admin/main.classes_comments_reports')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog_comments_reports')): ?>
                            <li class="<?php echo e((request()->is('admin/comments/blog/reports')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/comments/blog/reports"><?php echo e(trans('admin/main.blog_comments_reports')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_report_reasons')): ?>
                            <li class="<?php echo e((request()->is('admin/reports/reasons')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/reports/reasons"><?php echo e(trans('admin/main.report_reasons')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_contacts')): ?>
                <li class="<?php echo e((request()->is('admin/contacts*')) ? 'active' : ''); ?>">
                    <a class="nav-link" href="/admin/contacts">
                        <i class="fas fa-phone-square"></i>
                        <span><?php echo e(trans('admin/main.contacts')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_noticeboards')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/noticeboards*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-sticky-note"></i> <span><?php echo e(trans('admin/main.noticeboard')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_noticeboards_list')): ?>
                            <li class="<?php echo e((request()->is('admin/noticeboards')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/noticeboards"><?php echo e(trans('admin/main.notices_list_title')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_noticeboards_send')): ?>
                            <li class="<?php echo e((request()->is('admin/noticeboards/send')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/noticeboards/send"><?php echo e(trans('admin/main.new_notice_title')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/notifications*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span><?php echo e(trans('admin/main.notifications')); ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_list')): ?>
                            <li class="<?php echo e((request()->is('admin/notifications')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/notifications"><?php echo e(trans('public.history')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_posted_list')): ?>
                            <li class="<?php echo e((request()->is('admin/notifications/posted')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/notifications/posted"><?php echo e(trans('admin/main.posted')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_send')): ?>
                            <li class="<?php echo e((request()->is('admin/notifications/send')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/notifications/send"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_templates')): ?>
                            <li class="<?php echo e((request()->is('admin/notifications/templates')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/notifications/templates"><?php echo e(trans('admin/main.templates')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_template_create')): ?>
                            <li class="<?php echo e((request()->is('admin/notifications/templates/create')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/notifications/templates/create"><?php echo e(trans('admin/main.new_template')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_blog') or
                $authUser->can('admin_pages') or
                $authUser->can('admin_additional_pages') or
                $authUser->can('admin_testimonials') or
                $authUser->can('admin_tags')
            ): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.content')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/blog*') and !request()->is('admin/blog/comments')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-rss-square"></i>
                        <span><?php echo e(trans('admin/main.blog')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog_lists')): ?>
                            <li class="<?php echo e((request()->is('admin/blog')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/blog"><?php echo e(trans('site.posts')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog_create')): ?>
                            <li class="<?php echo e((request()->is('admin/blog/create')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/blog/create"><?php echo e(trans('admin/main.new_post')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog_categories')): ?>
                            <li class="<?php echo e((request()->is('admin/blog/categories')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/blog/categories"><?php echo e(trans('admin/main.categories')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pages')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/pages*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-pager"></i>
                        <span><?php echo e(trans('admin/main.pages')); ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pages_list')): ?>
                            <li class="<?php echo e((request()->is('admin/pages')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/pages"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pages_create')): ?>
                            <li class="<?php echo e((request()->is('admin/pages/create')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/pages/create"><?php echo e(trans('admin/main.new_page')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/additional_page*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-plus-circle"></i> <span><?php echo e(trans('admin/main.additional_pages_title')); ?></span></a>
                    <ul class="dropdown-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages_404')): ?>
                            <li class="<?php echo e((request()->is('admin/additional_page/404')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/additional_page/404"><?php echo e(trans('admin/main.error_404')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages_contact_us')): ?>
                            <li class="<?php echo e((request()->is('admin/additional_page/contact_us')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/additional_page/contact_us"><?php echo e(trans('admin/main.contact_us')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages_footer')): ?>
                            <li class="<?php echo e((request()->is('admin/additional_page/footer')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/additional_page/footer"><?php echo e(trans('admin/main.footer')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages_navbar_links')): ?>
                            <li class="<?php echo e((request()->is('admin/additional_page/navbar_links')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/additional_page/navbar_links"><?php echo e(trans('admin/main.top_navbar')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_testimonials')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/testimonials*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-address-card"></i>
                        <span><?php echo e(trans('admin/main.testimonials')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_testimonials_list')): ?>
                            <li class="<?php echo e((request()->is('admin/testimonials')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/testimonials"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_testimonials_create')): ?>
                            <li class="<?php echo e((request()->is('admin/testimonials/create')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/testimonials/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_tags')): ?>
            <li class="<?php echo e((request()->is('admin/tags')) ? 'active' : ''); ?>">
                <a href="/admin/tags" class="nav-link">
                    <i class="fas fa-tags"></i>
                    <span><?php echo e(trans('admin/main.tags')); ?></span>
                </a>
            </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_documents') or
                $authUser->can('admin_sales_list') or
                $authUser->can('admin_payouts') or
                $authUser->can('admin_offline_payments_list') or
                $authUser->can('admin_subscribe')
            ): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.financial')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_documents')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/financial/documents*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>Balances</span>
                    </a>
                    <ul class="dropdown-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_documents_list')): ?>
                            <li class="<?php echo e((request()->is('admin/financial/documents')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/financial/documents"><?php echo e(trans('admin/main.list')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_documents_create')): ?>
                            <li class="<?php echo e((request()->is('admin/financial/documents/new')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/financial/documents/new"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_sales_list')): ?>
                <li class="<?php echo e((request()->is('admin/financial/sales*')) ? 'active' : ''); ?>">
                    <a href="/admin/financial/sales" class="nav-link">
                        <i class="fas fa-list-ul"></i>
                        <span><?php echo e(trans('admin/main.sales_list')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payouts')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/financial/payouts*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-credit-card"></i> <span><?php echo e(trans('admin/main.payout')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payouts_list')): ?>
                            <li class="<?php echo e((request()->is('admin/financial/payouts') and request()->get('payout') == 'requests') ? 'active' : ''); ?>">
                                <a href="/admin/financial/payouts?payout=requests" class="nav-link <?php if(!empty($sidebarBeeps['payoutRequest']) and $sidebarBeeps['payoutRequest']): ?> beep beep-sidebar <?php endif; ?>">
                                    <span><?php echo e(trans('panel.requests')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payouts_list')): ?>
                            <li class="<?php echo e((request()->is('admin/financial/payouts') and request()->get('payout') == 'history') ? 'active' : ''); ?>">
                                <a href="/admin/financial/payouts?payout=history" class="nav-link">
                                    <span><?php echo e(trans('public.history')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_offline_payments_list')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/financial/offline_payments*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-university"></i> <span><?php echo e(trans('admin/main.offline_payments')); ?></span></a>
                    <ul class="dropdown-menu">
                        <li class="<?php echo e((request()->is('admin/financial/offline_payments') and request()->get('page_type') == 'requests') ? 'active' : ''); ?>">
                            <a href="/admin/financial/offline_payments?page_type=requests" class="nav-link <?php if(!empty($sidebarBeeps['offlinePayments']) and $sidebarBeeps['offlinePayments']): ?> beep beep-sidebar <?php endif; ?>">
                                <span><?php echo e(trans('panel.requests')); ?></span>
                            </a>
                        </li>

                        <li class="<?php echo e((request()->is('admin/financial/offline_payments') and request()->get('page_type') == 'history') ? 'active' : ''); ?>">
                            <a href="/admin/financial/offline_payments?page_type=history" class="nav-link">
                                <span><?php echo e(trans('public.history')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_subscribe')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/financial/subscribes*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-cart-plus"></i>
                        <span><?php echo e(trans('admin/main.subscribes')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_subscribe_list')): ?>
                            <li class="<?php echo e((request()->is('admin/financial/subscribes')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/financial/subscribes"><?php echo e(trans('admin/main.packages')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_subscribe_create')): ?>
                            <li class="<?php echo e((request()->is('admin/financial/subscribes/new')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/financial/subscribes/new"><?php echo e(trans('admin/main.new_package')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_discount_codes') or
                $authUser->can('admin_product_discount') or
                $authUser->can('admin_feature_webinars') or
                $authUser->can('admin_promotion') or
                $authUser->can('admin_advertising') or
                $authUser->can('admin_newsletters_lists')
            ): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.marketing')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_discount_codes')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/financial/discounts*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-percent"></i>
                        <span><?php echo e(trans('admin/main.discount_codes_title')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_discount_codes_list')): ?>
                            <li class="<?php echo e((request()->is('admin/financial/discounts')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/financial/discounts"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_discount_codes_create')): ?>
                            <li class="<?php echo e((request()->is('admin/financial/discounts/new')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/financial/discounts/new"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_discount')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/financial/special_offers*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-percent"></i>
                        <span><?php echo e(trans('admin/main.special_offers')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_discount_list')): ?>
                            <li class="<?php echo e((request()->is('admin/financial/special_offers')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/financial/special_offers"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_discount_create')): ?>
                            <li class="<?php echo e((request()->is('admin/financial/special_offers/new')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/financial/special_offers/new"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_feature_webinars')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/webinars/features*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-star"></i>
                        <span><?php echo e(trans('admin/main.feature_webinars')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_feature_webinars')): ?>
                            <li class="<?php echo e((request()->is('admin/webinars/features')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/webinars/features"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_feature_webinars_create')): ?>
                            <li class="<?php echo e((request()->is('admin/webinars/features/create')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/webinars/features/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_promotion')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/financial/promotions*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-rocket"></i>
                        <span><?php echo e(trans('admin/main.content_promotion')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_promotion_list')): ?>
                            <li class="<?php echo e((request()->is('admin/financial/promotions')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/financial/promotions"><?php echo e(trans('admin/main.plans')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_promotion_list')): ?>
                            <li class="<?php echo e((request()->is('admin/financial/promotions/sales')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/financial/promotions/sales"><?php echo e(trans('admin/main.promotion_sales')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_promotion_create')): ?>
                            <li class="<?php echo e((request()->is('admin/financial/promotions/new')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/financial/promotions/new"><?php echo e(trans('admin/main.new_plan')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertising')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/advertising*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-file-image"></i>
                        <span><?php echo e(trans('admin/main.ad_banners')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertising_banners')): ?>
                            <li class="<?php echo e((request()->is('admin/advertising/banners')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/advertising/banners"><?php echo e(trans('admin/main.list')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertising_banners_create')): ?>
                            <li class="<?php echo e((request()->is('admin/advertising/banners/new')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/advertising/banners/new"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_newsletters_lists')): ?>
                <li class="nav-item <?php echo e((request()->is('admin/newsletters*')) ? 'active' : ''); ?>">
                    <a href="/admin/newsletters" class="nav-link">
                        <i class="fas fa-newspaper"></i>
                        <span><?php echo e(trans('admin/main.newsletters')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_settings')): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.settings')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_settings')): ?>
                <?php
                    $settingClass ='';

                    if (request()->is('admin/settings*') and
                            !(
                                request()->is('admin/settings/404') or
                                request()->is('admin/settings/contact_us') or
                                request()->is('admin/settings/footer') or
                                request()->is('admin/settings/navbar_links')
                            )
                        ) {
                            $settingClass = 'active';
                        }
                ?>

                <li class="<?php echo e($settingClass ?? ''); ?>">
                    <a href="/admin/settings" class="nav-link">
                        <i class="fas fa-cogs"></i>
                        <span><?php echo e(trans('admin/main.settings')); ?></span>
                    </a>
                </li>
            <?php endif; ?>


            <li>
                <a class="nav-link" href="/admin/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>
        <br><br><br>
    </aside>
</div>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/includes/sidebar.blade.php ENDPATH**/ ?>