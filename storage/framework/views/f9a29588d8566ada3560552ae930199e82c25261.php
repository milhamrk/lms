<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/css/css-stars.css">
    <link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <section class="course-cover-container ">
        <img src="<?php echo e($course->getImageCover()); ?>" class="img-cover course-cover-img" alt="<?php echo e($course->title); ?>"/>
        <div class="cover-content pt-40">
            <div class="container position-relative">
                <?php if(!empty($activeSpecialOffer)): ?>
                    <div class="d-flex align-items-center justify-content-between rounded-lg shadow-xs bg-white p-30">
                        <div class="d-flex flex-column">
                            <strong class="font-16 text-dark-blue font-weight-bold"><?php echo e(trans('panel.special_offer')); ?></strong>
                            <span class="font-14 text-gray"><?php echo e($activeSpecialOffer->name); ?></span>
                        </div>
                        <div class="">
                            <?php
                                $remainingTimes = $activeSpecialOffer->getRemainingTimes()
                            ?>
                            <div id="offerCountDown" class="d-flex time-counter-down"
                                 data-day="<?php echo e($remainingTimes['day']); ?>"
                                 data-hour="<?php echo e($remainingTimes['hour']); ?>"
                                 data-minute="<?php echo e($remainingTimes['minute']); ?>"
                                 data-second="<?php echo e($remainingTimes['second']); ?>">

                                <div class="d-flex align-items-center flex-column mr-10">
                                    <span class="bg-gray300 rounded p-10 font-16 font-weight-bold text-dark time-item days"></span>
                                    <span class="font-12 mt-1 text-gray"><?php echo e(trans('public.day')); ?></span>
                                </div>
                                <div class="d-flex align-items-center flex-column mr-10">
                                    <span class="bg-gray300 rounded p-10 font-16 font-weight-bold text-dark time-item hours"></span>
                                    <span class="font-12 mt-1 text-gray"><?php echo e(trans('public.hr')); ?></span>
                                </div>
                                <div class="d-flex align-items-center flex-column mr-10">
                                    <span class="bg-gray300 rounded p-10 font-16 font-weight-bold text-dark time-item minutes"></span>
                                    <span class="font-12 mt-1 text-gray"><?php echo e(trans('public.min')); ?></span>
                                </div>
                                <div class="d-flex align-items-center flex-column">
                                    <span class="bg-gray300 rounded p-10 font-16 font-weight-bold text-dark time-item seconds"></span>
                                    <span class="font-12 mt-1 text-gray"><?php echo e(trans('public.sec')); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="offer-percent-box d-flex flex-column align-items-center justify-content-center">
                            <span class="percent font-30 text-white"><?php echo e($activeSpecialOffer->percent); ?>%</span>
                            <span class="off font-16 text-white"><?php echo e(trans('public.off')); ?></span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </section>

    <section class="container course-content-section">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="course-content-body user-select-none">
                    <div class="course-body-on-cover text-white">
                        <h1 class="font-30 course-title">
                            <?php echo e(clean($course->title, 't')); ?>

                        </h1>
                        <span class="d-block font-16 mt-10"><?php echo e(trans('public.in')); ?> <a href="<?php echo e($course->category->getUrl()); ?>" target="_blank" class="font-weight-500 text-decoration-underline text-white"><?php echo e($course->category->title); ?></a></span>

                        <div class="d-flex align-items-center">
                            <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $course->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <span class="ml-10 mt-15 font-14">(<?php echo e($course->reviews->pluck('creator_id')->count()); ?> <?php echo e(trans('public.ratings')); ?>)</span>
                        </div>

                        <div class="mt-15">
                            <span class="font-14"><?php echo e(trans('public.created_by')); ?></span>
                            <a href="<?php echo e($course->teacher->getProfileUrl()); ?>" target="_blank" class="text-decoration-underline text-white font-14 font-weight-500"><?php echo e($course->teacher->full_name); ?></a>
                        </div>

                        <?php if($hasBought or $course->isWebinar()): ?>
                            <?php
                                $percent = $course->getProgress();
                            ?>

                            <div class="mt-30 d-flex align-items-center">
                                <div class="progress course-progress flex-grow-1 shadow-xs rounded-sm">
                                    <span class="progress-bar rounded-sm bg-warning" style="width: <?php echo e($percent); ?>%"></span>
                                </div>

                                <span class="ml-15 font-14 font-weight-500">
                                    <?php if($course->isWebinar()): ?>
                                        <?php if($hasBought and $course->isProgressing()): ?>
                                            <?php echo e(trans('public.course_learning_passed',['percent' => $percent])); ?>

                                        <?php else: ?>
                                            <?php echo e($course->sales_count); ?>/<?php echo e($course->capacity); ?> <?php echo e(trans('quiz.students')); ?>

                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php echo e(trans('public.course_learning_passed',['percent' => $percent])); ?>

                                    <?php endif; ?>
                            </span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="<?php if(!$course->isCourse()): ?> mt-35 <?php else: ?> mt-40 pt-40 <?php endif; ?>">
                        <ul class="nav nav-tabs bg-secondary rounded-sm p-15 d-flex align-items-center justify-content-between" id="tabs-tab" role="tablist">
                            <li class="nav-item">
                                <a class="position-relative font-14 text-white <?php echo e((empty(request()->get('tab','')) or request()->get('tab','') == 'information') ? 'active' : ''); ?>" id="information-tab"
                                   data-toggle="tab" href="#information" role="tab" aria-controls="information"
                                   aria-selected="true"><?php echo e(trans('product.information')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="position-relative font-14 text-white <?php echo e((request()->get('tab','') == 'content') ? 'active' : ''); ?>" id="content-tab" data-toggle="tab"
                                   href="#content" role="tab" aria-controls="content"
                                   aria-selected="false"><?php echo e(trans('product.content')); ?> (<?php echo e($webinarContentCount); ?>)</a>
                            </li>
                            <li class="nav-item">
                                <a class="position-relative font-14 text-white <?php echo e((request()->get('tab','') == 'reviews') ? 'active' : ''); ?>" id="reviews-tab" data-toggle="tab"
                                   href="#reviews" role="tab" aria-controls="reviews"
                                   aria-selected="false"><?php echo e(trans('product.reviews')); ?> (<?php echo e($course->reviews->count() > 0 ? $course->reviews->pluck('creator_id')->count() : 0); ?>)</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade <?php echo e((empty(request()->get('tab','')) or request()->get('tab','') == 'information') ? 'show active' : ''); ?> " id="information" role="tabpanel"
                                 aria-labelledby="information-tab">
                                <?php echo $__env->make(getTemplate().'.course.tabs.information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="tab-pane fade <?php echo e((request()->get('tab','') == 'content') ? 'show active' : ''); ?>" id="content" role="tabpanel" aria-labelledby="content-tab">
                                <?php echo $__env->make(getTemplate().'.course.tabs.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="tab-pane fade <?php echo e((request()->get('tab','') == 'reviews') ? 'show active' : ''); ?>" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <?php echo $__env->make(getTemplate().'.course.tabs.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="course-content-sidebar col-12 col-lg-4 mt-25 mt-lg-0">
                <div class="rounded-lg shadow-sm">
                    <div class="course-img <?php echo e($course->video_demo ? 'has-video' :''); ?>">

                        <img src="<?php echo e($course->getImage()); ?>" class="img-cover" alt="">

                        <?php if($course->video_demo): ?>
                            <div id="webinarDemoVideoBtn"
                                 data-video-path="<?php echo e(config('app_url') . $course->video_demo); ?>"
                                 data-video-type="video/mp4"
                                 class="course-video-icon cursor-pointer d-flex align-items-center justify-content-center">
                                <i data-feather="play" width="25" height="25"></i>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="px-20 pb-30">
                        <form action="/cart/store" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="webinar_id" value="<?php echo e($course->id); ?>">

                            <?php if(!empty($course->tickets)): ?>
                                <?php $__currentLoopData = $course->tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="form-check mt-20">
                                        <input class="form-check-input" <?php if(!$ticket->isValid()): ?> disabled <?php endif; ?> type="radio" data-discount="<?php echo e($ticket->discount); ?>" value="<?php echo e(($ticket->isValid()) ? $ticket->id : ''); ?>"
                                               name="ticket_id"
                                               id="courseOff<?php echo e($ticket->id); ?>">
                                        <label class="form-check-label d-flex flex-column cursor-pointer" for="courseOff<?php echo e($ticket->id); ?>">
                                            <span class="font-16 font-weight-500 text-dark-blue"><?php echo e($ticket->title); ?> <?php if(!empty($ticket->discount)): ?> (<?php echo e($ticket->discount); ?>% <?php echo e(trans('public.off')); ?>) <?php endif; ?></span>
                                            <span class="font-14 text-gray"><?php echo e($ticket->getSubTitle()); ?></span>
                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <?php if($course->price > 0): ?>
                                <div id="priceBox" class="d-flex align-items-center justify-content-center mt-20">
                                    <span id="realPrice" data-value="<?php echo e($course->price); ?>"
                                          data-special-offer="<?php echo e(!empty($activeSpecialOffer) ? $activeSpecialOffer->percent : ''); ?>"
                                          class="<?php if(!empty($activeSpecialOffer)): ?> font-16 text-gray text-decoration-line-through mr-15 <?php else: ?> font-30 text-primary <?php endif; ?>"><?php echo e($currency); ?><?php echo e(number_format($course->price, 2, ".", "") + 0); ?></span>
                                    <span id="priceWithDiscount" class="font-36 text-primary"><?php echo e(!empty($activeSpecialOffer) ? ($currency.number_format($course->price - ($course->price * $activeSpecialOffer->percent / 100),2)) : ''); ?></span>
                                </div>
                            <?php else: ?>
                                <div class="d-flex align-items-center justify-content-center mt-20">
                                    <span class="font-36 text-primary"><?php echo e(trans('public.free')); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php
                                $userHasBought = $course->checkUserHasBought();
                                $canSale = ($course->canSale() and !$userHasBought);
                            ?>

                            <div class="mt-20 d-flex flex-column">
                                <?php if($course->price > 0): ?>
                                    <button type="<?php echo e($canSale ? 'submit' : 'button'); ?>" <?php if(!$canSale): ?> disabled <?php endif; ?> class="btn btn-primary">
                                        <?php if($userHasBought): ?>
                                            <?php echo e(trans('panel.purchased')); ?>

                                        <?php else: ?>
                                            <?php echo e(trans('public.add_to_cart')); ?>

                                        <?php endif; ?>
                                    </button>

                                    <?php if($canSale and $course->subscribe): ?>
                                        <a href="<?php echo e($canSale ? '/subscribes/apply/'. $course->slug : '#'); ?>" class="btn btn-outline-primary btn-subscribe mt-20 <?php if(!$canSale): ?> disabled <?php endif; ?>"><?php echo e(trans('public.subscribe')); ?></a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?php echo e($canSale ? '/course/'. $course->slug .'/free' : '#'); ?>" class="btn btn-primary <?php if(!$canSale): ?> disabled <?php endif; ?>"><?php echo e(trans('public.enroll_on_webinar')); ?></a>
                                <?php endif; ?>
                            </div>

                        </form>

                        <div class="mt-20 d-flex align-items-center justify-content-center text-gray">
                            <i data-feather="thumbs-up" width="20" height="20"></i>
                            <span class="ml-5 font-14"><?php echo e(trans('product.guarantee_text')); ?></span>
                        </div>

                        <div class="mt-35">
                            <strong class="d-block text-secondary font-weight-bold"><?php echo e(trans('webinars.this_webinar_includes',['classes' => trans('webinars.'.$course->type)])); ?></strong>
                            <?php if($course->files->count() > 0): ?>
                                <div class="mt-20 d-flex align-items-center text-gray">
                                    <i data-feather="download-cloud" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('webinars.downloadable_content')); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if($course->quizzes->where('certificate', 1)->count() > 0): ?>
                                <div class="mt-20 d-flex align-items-center text-gray">
                                    <i data-feather="award" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('webinars.official_certificate')); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if($course->quizzes->where('status', \App\models\Quiz::ACTIVE)->count() > 0): ?>
                                <div class="mt-20 d-flex align-items-center text-gray">
                                    <i data-feather="file-text" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('webinars.online_quizzes_count',['quiz_count' => $course->quizzes->where('status', \App\models\Quiz::ACTIVE)->count()])); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if($course->support): ?>
                                <div class="mt-20 d-flex align-items-center text-gray">
                                    <i data-feather="headphones" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('webinars.instructor_support')); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mt-40 p-10 rounded-sm border row align-items-center favorites-share-box">
                            <?php if($course->isWebinar()): ?>
                                <div class="col">
                                    <a href="<?php echo e($course->addToCalendarLink()); ?>" target="_blank" class="d-flex flex-column align-items-center text-center text-gray">
                                        <i data-feather="calendar" width="20" height="20"></i>
                                        <span class="font-12"><?php echo e(trans('public.reminder')); ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="col">
                                <a href="/favorites/<?php echo e($course->slug); ?>/toggle" id="favoriteToggle" class="d-flex flex-column align-items-center text-gray">
                                    <i data-feather="heart" class="<?php echo e(!empty($isFavorite) ? 'favorite-active' : ''); ?>" width="20" height="20"></i>
                                    <span class="font-12"><?php echo e(trans('panel.favorite')); ?></span>
                                </a>
                            </div>

                            <div class="col">
                                <a href="#" class="js-share-course d-flex flex-column align-items-center text-gray">
                                    <i data-feather="share-2" width="20" height="20"></i>
                                    <span class="font-12"><?php echo e(trans('public.share')); ?></span>
                                </a>
                            </div>
                        </div>

                        <div class="mt-30 text-center">
                            <button type="button" id="webinarReportBtn" class="font-14 text-gray btn-transparent"><?php echo e(trans('webinars.report_this_webinar')); ?></button>
                        </div>
                    </div>
                </div>

                <?php if($course->teacher->offline): ?>
                    <div class="rounded-lg shadow-sm mt-35 d-flex">
                        <div class="offline-icon offline-icon-left d-flex align-items-stretch">
                            <div class="d-flex align-items-center">
                                <img src="/assets/default/img/profile/time-icon.png" alt="offline">
                            </div>
                        </div>

                        <div class="p-15">
                            <h3 class="font-16 text-dark-blue"><?php echo e(trans('public.instructor_is_not_available')); ?></h3>
                            <p class="font-14 font-weight-500 text-gray mt-15"><?php echo e($course->teacher->offline_message); ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="rounded-lg shadow-sm mt-35 px-25 py-20">
                    <h3 class="sidebar-title font-16 text-secondary font-weight-bold"><?php echo e(trans('webinars.'.$course->type) .' '. trans('webinars.specifications')); ?></h3>

                    <div class="mt-30">
                        <?php if($course->isWebinar()): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <i data-feather="calendar" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.start_date')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e(dateTimeFormat($course->start_date, 'j M Y | H:i')); ?></span>
                            </div>

                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <i data-feather="user" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.capacity')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e($course->capacity); ?> <?php echo e(trans('quiz.students')); ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                            <div class="d-flex align-items-center">
                                <i data-feather="clock" width="20" height="20"></i>
                                <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.duration')); ?>:</span>
                            </div>
                            <span class="font-14"><?php echo e(convertMinutesToHourAndMinute(!empty($course->duration) ? $course->duration : 0)); ?> <?php echo e(trans('home.hours')); ?></span>
                        </div>

                        <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                            <div class="d-flex align-items-center">
                                <i data-feather="users" width="20" height="20"></i>
                                <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('quiz.students')); ?>:</span>
                            </div>
                            <span class="font-14"><?php echo e($course->sales_count); ?></span>
                        </div>

                        <?php if($course->isWebinar()): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <img src="/assets/default/img/icons/sessions.svg" width="20" alt="">
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.sessions')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e($course->sessions->count()); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if($course->isTextCourse()): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <img src="/assets/default/img/icons/sessions.svg" width="20" alt="">
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('webinars.text_lessons')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e($course->textLessons->count()); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if($course->isCourse() or $course->isTextCourse()): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <img src="/assets/default/img/icons/sessions.svg" width="20" alt="">
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.files')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e($course->files->count()); ?></span>
                            </div>

                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <img src="/assets/default/img/icons/sessions.svg" width="20" alt="">
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.created_at')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e(dateTimeFormat($course->created_at,'Y M j')); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                
                <?php if($course->creator_id != $course->teacher_id): ?>
                    <?php echo $__env->make('web.default.course.sidebar_instructor_profile', ['courseTeacher' => $course->creator], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                
                <?php echo $__env->make('web.default.course.sidebar_instructor_profile', ['courseTeacher' => $course->teacher], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php if($course->webinarPartnerTeacher->count() > 0): ?>
                    <?php $__currentLoopData = $course->webinarPartnerTeacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinarPartnerTeacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('web.default.course.sidebar_instructor_profile', ['courseTeacher' => $webinarPartnerTeacher->teacher], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                

                
                <?php if($course->tags->count() > 0): ?>
                    <div class="rounded-lg tags-card shadow-sm mt-35 px-25 py-20">
                        <h3 class="sidebar-title font-16 text-secondary font-weight-bold"><?php echo e(trans('public.tags')); ?></h3>

                        <div class="d-flex flex-wrap mt-10">
                            <?php $__currentLoopData = $course->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="" class="tag-item bg-gray200 p-5 font-14 text-gray font-weight-500 rounded"><?php echo e($tag->title); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if(!empty($advertisingBannersSidebar) and count($advertisingBannersSidebar)): ?>
                    <div class="row">
                        <?php $__currentLoopData = $advertisingBannersSidebar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebarBanner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rounded-lg sidebar-ads mt-35 col-<?php echo e($sidebarBanner->size); ?>">
                                <a href="<?php echo e($sidebarBanner->link); ?>">
                                    <img src="<?php echo e($sidebarBanner->image); ?>" class="img-cover rounded-lg" alt="<?php echo e($sidebarBanner->title); ?>">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                <?php endif; ?>
            </div>
        </div>

        
        <?php if(!empty($advertisingBanners) and count($advertisingBanners)): ?>
            <div class="mt-30 mt-md-50">
                <div class="row">
                    <?php $__currentLoopData = $advertisingBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-<?php echo e($banner->size); ?>">
                            <a href="<?php echo e($banner->link); ?>">
                                <img src="<?php echo e($banner->image); ?>" class="img-cover rounded-sm" alt="<?php echo e($banner->title); ?>">
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
        
    </section>

    <div id="webinarReportModal" class="d-none">
        <h3 class="section-title after-line font-20 text-dark-blue"><?php echo e(trans('product.report_the_course')); ?></h3>

        <form action="/course/<?php echo e($course->id); ?>/report" method="post" class="mt-25">

            <div class="form-group">
                <label class="text-dark-blue font-14"><?php echo e(trans('product.reason')); ?></label>
                <select id="reason" name="reason" class="form-control">
                    <option value="" selected disabled><?php echo e(trans('product.select_reason')); ?></option>

                    <?php $__currentLoopData = getReportReasons(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($reason); ?>"><?php echo e($reason); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label class="text-dark-blue font-14" for="message_to_reviewer"><?php echo e(trans('public.message_to_reviewer')); ?></label>
                <textarea name="message" id="message_to_reviewer" class="form-control" rows="10"></textarea>
                <div class="invalid-feedback"></div>
            </div>
            <p class="text-gray font-16"><?php echo e(trans('product.report_modal_hint')); ?></p>

            <div class="mt-30 d-flex align-items-center justify-content-end">
                <button type="button" class="js-course-report-submit btn btn-sm btn-primary"><?php echo e(trans('panel.report')); ?></button>
                <button type="button" class="btn btn-sm btn-danger ml-10 close-swl"><?php echo e(trans('public.close')); ?></button>
            </div>
        </form>
    </div>

    <?php echo $__env->make('web.default.course.share_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/parts/time-counter-down.min.js"></script>
    <script src="/assets/default/vendors/barrating/jquery.barrating.min.js"></script>
    <script src="/assets/default/vendors/video/video.min.js"></script>
    <script src="/assets/default/vendors/video/youtube.min.js"></script>
    <script src="/assets/default/vendors/video/vimeo.js"></script>

    <script>
        var webinarDemoLang = '<?php echo e(trans('webinars.webinar_demo')); ?>';
        var replyLang = '<?php echo e(trans('panel.reply')); ?>';
        var closeLang = '<?php echo e(trans('public.close')); ?>';
        var saveLang = '<?php echo e(trans('public.save')); ?>';
        var reportLang = '<?php echo e(trans('panel.report')); ?>';
        var reportSuccessLang = '<?php echo e(trans('panel.report_success')); ?>';
        var reportFailLang = '<?php echo e(trans('panel.report_fail')); ?>';
        var messageToReviewerLang = '<?php echo e(trans('public.message_to_reviewer')); ?>';
        var copyLang = '<?php echo e(trans('public.copy')); ?>';
        var copiedLang = '<?php echo e(trans('public.copied')); ?>';
        var learningToggleLangSuccess = '<?php echo e(trans('public.course_learning_change_status_success')); ?>';
        var learningToggleLangError = '<?php echo e(trans('public.course_learning_change_status_error')); ?>';
        var notLoginToastTitleLang = '<?php echo e(trans('public.not_login_toast_lang')); ?>';
        var notLoginToastMsgLang = '<?php echo e(trans('public.not_login_toast_msg_lang')); ?>';
        var notAccessToastTitleLang = '<?php echo e(trans('public.not_access_toast_lang')); ?>';
        var notAccessToastMsgLang = '<?php echo e(trans('public.not_access_toast_msg_lang')); ?>';
        var canNotTryAgainQuizToastTitleLang = '<?php echo e(trans('public.can_not_try_again_quiz_toast_lang')); ?>';
        var canNotTryAgainQuizToastMsgLang = '<?php echo e(trans('public.can_not_try_again_quiz_toast_msg_lang')); ?>';
        var canNotDownloadCertificateToastTitleLang = '<?php echo e(trans('public.can_not_download_certificate_toast_lang')); ?>';
        var canNotDownloadCertificateToastMsgLang = '<?php echo e(trans('public.can_not_download_certificate_toast_msg_lang')); ?>';
        var sessionFinishedToastTitleLang = '<?php echo e(trans('public.session_finished_toast_title_lang')); ?>';
        var sessionFinishedToastMsgLang = '<?php echo e(trans('public.session_finished_toast_msg_lang')); ?>';

    </script>

    <script src="/assets/default/js/parts/comment.min.js"></script>
    <script src="/assets/default/js/parts/webinar_show.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/web/default/course/index.blade.php ENDPATH**/ ?>