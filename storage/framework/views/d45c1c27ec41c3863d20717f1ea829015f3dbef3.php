
<?php if(!empty($course->sessions) and $course->sessions->count() > 0): ?>
    <section class="mt-20">
        <h2 class="section-title after-line"><?php echo e(trans('public.sessions')); ?></h2>

        <div class="mt-15">
            <div class="row">
                <div class="col-6 col-md-4 font-12 text-gray"><span class="pl-10"><?php echo e(trans('public.title')); ?></span></div>
                <div class="col-3 font-12 text-gray text-center"><?php echo e(trans('public.start_date')); ?></div>
                <div class="col-2 font-12 text-gray text-center d-none d-md-block"><?php echo e(trans('public.duration')); ?></div>
                <div class="col-3"></div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="accordion-content-wrapper mt-15" id="sessionsAccordion" role="tablist" aria-multiselectable="true">
                        <?php $__currentLoopData = $course->sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion-row rounded-sm shadow-lg border mt-20 p-15">
                                <div class="row align-items-center" role="tab" id="session_<?php echo e($session->id); ?>">
                                    <div class="col-6 col-md-4 d-flex align-items-center" href="#collapseSession<?php echo e($session->id); ?>" aria-controls="collapseSession<?php echo e($session->id); ?>" data-parent="#sessionsAccordion" role="button" data-toggle="collapse" aria-expanded="true">
                                        <?php if($session->date > time()): ?>
                                            <a href="<?php echo e($session->addToCalendarLink()); ?>" target="_blank" class="mr-15 d-flex" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.add_to_calendar')); ?>">
                                                <i data-feather="bell" width="20" height="20" class="text-gray"></i>
                                            </a>
                                        <?php else: ?>
                                            <span class="mr-15 d-flex"><i data-feather="bell" width="20" height="20" class="text-gray"></i></span>
                                        <?php endif; ?>
                                        <span class="font-weight-bold text-secondary font-14"><?php echo e($session->title); ?></span>
                                    </div>
                                    <div class="col-3 text-gray text-center text-center font-14"><?php echo e(dateTimeFormat($session->date, 'j M Y | H:i')); ?></div>
                                    <div class="col-2 text-gray text-center text-center font-14 d-none d-md-block"><?php echo e(convertMinutesToHourAndMinute($session->duration)); ?></div>
                                    <div class="col-3 d-flex justify-content-end">
                                        <?php if($session->date < time()): ?>
                                            <button type="button" class="course-content-btns btn btn-sm btn-gray disabled flex-grow-1 disabled session-finished-toast"><?php echo e(trans('public.finished')); ?></button>
                                        <?php elseif(empty($user)): ?>
                                            <button type="button" class="course-content-btns btn btn-sm btn-gray disabled flex-grow-1 disabled not-login-toast"><?php echo e(trans('public.go_to_class')); ?></button>
                                        <?php elseif($hasBought): ?>
                                            <a href="<?php echo e($session->getJoinLink(true)); ?>" target="_blank" class="course-content-btns btn btn-sm btn-primary flex-grow-1"><?php echo e(trans('public.go_to_class')); ?></a>
                                        <?php else: ?>
                                            <button type="button" class="course-content-btns btn btn-sm btn-gray flex-grow-1 disabled not-access-toast"><?php echo e(trans('public.go_to_class')); ?></button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div id="collapseSession<?php echo e($session->id); ?>" aria-labelledby="session_<?php echo e($session->id); ?>" class=" collapse" role="tabpanel">
                                    <div class="panel-collapse">
                                        <div class="text-gray">
                                            <?php echo nl2br(clean($session->description)); ?>

                                        </div>

                                        <?php if(!empty($user) and $hasBought): ?>
                                            <div class="d-flex align-items-center mt-20">
                                                <label class="mb-0 mr-10 cursor-pointer font-weight-500" for="sessionReadToggle<?php echo e($session->id); ?>"><?php echo e(trans('public.i_passed_this_lesson')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" <?php if($session->date < time()): ?> disabled <?php endif; ?> id="sessionReadToggle<?php echo e($session->id); ?>" data-session-id="<?php echo e($session->id); ?>" value="<?php echo e($course->id); ?>" class="js-text-session-toggle custom-control-input" <?php if(!empty($session->learningStatus)): ?> checked <?php endif; ?>>
                                                    <label class="custom-control-label" for="sessionReadToggle<?php echo e($session->id); ?>"></label>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if(!empty($course->files) and $course->files->count() > 0): ?>
    <section class="mt-40">
        <h2 class="section-title after-line"><?php echo e(trans('public.files')); ?></h2>

        <div class="mt-15">
            <div class="row">
                <div class="col-9 col-md-6 font-12 text-gray"><span class="pl-10"><?php echo e(trans('public.title')); ?></span></div>
                <div class="col-md-3 font-12 text-gray text-center d-none d-md-block"><?php echo e(trans('public.volume')); ?></div>
                <div class="col-3"></div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="accordion-content-wrapper mt-15" id="filesAccordion" role="tablist" aria-multiselectable="true">
                        <?php $__currentLoopData = $course->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion-row rounded-sm shadow-lg border mt-20 p-15">
                                <div class="row align-items-center" role="tab" id="files_<?php echo e($file->id); ?>">
                                    <div class="col-9 col-md-6 d-flex align-items-center" href="#collapseFiles<?php echo e($file->id); ?>" aria-controls="collapseFiles<?php echo e($file->id); ?>" data-parent="#filesAccordion" role="button" data-toggle="collapse" aria-expanded="true">

                                        <?php if($file->accessibility == 'paid'): ?>
                                            <?php if(!empty($user) and $hasBought): ?>
                                                <?php if($file->isVideo()): ?>
                                                    <button type="button" data-id="<?php echo e($file->id); ?>" class="js-play-video btn-transparent mr-15" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.play_online')); ?>">
                                                        <i data-feather="play-circle" width="20" height="20" class="text-gray"></i>
                                                    </button>
                                                <?php else: ?>
                                                    <a href="<?php echo e($course->getUrl()); ?>/file/<?php echo e($file->id); ?>/download" class="mr-15">
                                                        <i data-feather="download-cloud" width="20" height="20" class="text-gray"></i>
                                                    </a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <button class="mr-15 btn-transparent">
                                                    <i data-feather="lock" width="20" height="20" class="text-gray"></i>
                                                </button>
                                            <?php endif; ?>

                                        <?php else: ?>
                                            <?php if($file->isVideo()): ?>
                                                <button type="button" data-id="<?php echo e($file->id); ?>" class="js-play-video btn-transparent mr-15" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.play_online')); ?>">
                                                    <i data-feather="play-circle" width="20" height="20" class="text-gray"></i>
                                                </button>
                                            <?php else: ?>
                                                <a href="<?php echo e($course->getUrl()); ?>/file/<?php echo e($file->id); ?>/download" class="mr-15" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('home.download')); ?>">
                                                    <i data-feather="download-cloud" width="20" height="20" class="text-gray"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <span class="font-weight-bold text-secondary font-14 file-title"><?php echo e($file->title); ?></span>
                                    </div>

                                    <div class="col-md-3 text-gray font-14 text-center d-none d-md-block"><?php echo e($file->volume); ?></div>

                                    <div class="col-3 d-flex justify-content-end">
                                        <?php if($file->accessibility == 'paid'): ?>
                                            <?php if(!empty($user) and $hasBought): ?>
                                                <?php if($file->downloadable): ?>
                                                    <a href="<?php echo e($course->getUrl()); ?>/file/<?php echo e($file->id); ?>/download" class="course-content-btns btn btn-sm btn-primary flex-grow-1">
                                                        <?php echo e(trans('home.download')); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <button type="button" data-id="<?php echo e($file->id); ?>" class="js-play-video course-content-btns btn btn-sm btn-primary flex-grow-1">
                                                        <?php echo e(trans('public.play')); ?>

                                                    </button>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <button type="button" class="course-content-btns btn btn-sm btn-gray flex-grow-1 disabled <?php echo e(((empty($user)) ? 'not-login-toast' : (!$hasBought ? 'not-access-toast' : ''))); ?>">
                                                    <?php if($file->downloadable): ?>
                                                        <?php echo e(trans('home.download')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(trans('public.play')); ?>

                                                    <?php endif; ?>
                                                </button>
                                            <?php endif; ?>

                                        <?php else: ?>
                                            <?php if($file->downloadable): ?>
                                                <a href="<?php echo e($course->getUrl()); ?>/file/<?php echo e($file->id); ?>/download" class="course-content-btns btn btn-sm btn-primary flex-grow-1">
                                                    <?php echo e(trans('home.download')); ?>

                                                </a>
                                            <?php else: ?>
                                                <button type="button" data-id="<?php echo e($file->id); ?>" class="js-play-video course-content-btns btn btn-sm btn-primary flex-grow-1">
                                                    <?php echo e(trans('public.play')); ?>

                                                </button>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div id="collapseFiles<?php echo e($file->id); ?>" aria-labelledby="files_<?php echo e($file->id); ?>" class=" collapse" role="tabpanel">
                                    <div class="panel-collapse">
                                        <div class="text-gray text-14">
                                            <?php echo nl2br(clean($file->description)); ?>

                                        </div>

                                        <?php if(!empty($user) and $hasBought): ?>
                                            <div class="d-flex align-items-center mt-20">
                                                <label class="mb-0 mr-10 cursor-pointer font-weight-500" for="fileReadToggle<?php echo e($file->id); ?>"><?php echo e(trans('public.i_passed_this_lesson')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" id="fileReadToggle<?php echo e($file->id); ?>" data-file-id="<?php echo e($file->id); ?>" value="<?php echo e($course->id); ?>" class="js-file-learning-toggle custom-control-input" <?php if(!empty($file->learningStatus)): ?> checked <?php endif; ?>>
                                                    <label class="custom-control-label" for="fileReadToggle<?php echo e($file->id); ?>"></label>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="playVideo" tabindex="-1" aria-labelledby="playVideoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content p-20">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="section-title after-line"></h3>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x" width="25" height="25"></i>
                    </button>
                </div>

                <div class="mt-25 position-relative">
                    <div class="loading-img py-50 text-center">
                        <img src="/assets/default/img/loading.gif" width="100" height="100">
                    </div>
                    <div class="js-modal-video-content d-none">

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>


<?php if(!empty($course->textLessons) and $course->textLessons->count() > 0): ?>
    <section class="mt-40">
        <h2 class="section-title after-line"><?php echo e(trans('webinars.text_lessons')); ?></h2>

        <div class="mt-15">
            <div class="row">
                <div class="col-7 col-md-5 font-12 text-gray"><span class="pl-10"><?php echo e(trans('public.title')); ?></span></div>
                <div class="col-2 font-12 text-gray text-center"><?php echo e(trans('public.study_time')); ?></div>
                <div class="col-2 font-12 text-gray text-center d-none d-md-block"><?php echo e(trans('public.attachments')); ?></div>
                <div class="col-3"></div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="accordion-content-wrapper mt-15" id="textLessonsAccordion" role="tablist" aria-multiselectable="true">
                        <?php $__currentLoopData = $course->textLessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $textLesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion-row rounded-sm shadow-lg border mt-20 p-15">
                                <div class="row align-items-center" role="tab" id="textLessons_<?php echo e($textLesson->id); ?>">
                                    <div class="col-7 col-md-5 d-flex align-items-center" href="#collapseTextLessons<?php echo e($textLesson->id); ?>" aria-controls="collapseTextLessons<?php echo e($textLesson->id); ?>" data-parent="#textLessonsAccordion" role="button" data-toggle="collapse" aria-expanded="true">

                                        <?php if($textLesson->accessibility == 'paid'): ?>
                                            <?php if(!empty($user) and $hasBought): ?>
                                                <a href="<?php echo e($course->getUrl()); ?>/lessons/<?php echo e($textLesson->id); ?>/read" target="_blank" class="mr-15" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.read')); ?>">
                                                    <i data-feather="file-text" width="20" height="20" class="text-gray"></i>
                                                </a>
                                            <?php else: ?>
                                                <button class="mr-15 btn-transparent">
                                                    <i data-feather="lock" width="20" height="20" class="text-gray"></i>
                                                </button>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="<?php echo e($course->getUrl()); ?>/lessons/<?php echo e($textLesson->id); ?>/read" target="_blank" class="mr-15" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.read')); ?>">
                                                <i data-feather="file-text" width="20" height="20" class="text-gray"></i>
                                            </a>
                                        <?php endif; ?>

                                        <span class="font-weight-bold text-secondary font-14 file-title"><?php echo e($textLesson->title); ?></span>
                                    </div>

                                    <div class="col-2 text-gray text-center font-14"><?php echo e($textLesson->study_time); ?> <?php echo e(trans('public.min')); ?></div>

                                    <div class="col-2 text-gray text-center font-14 d-none d-md-block"><?php echo e($textLesson->attachments_count); ?></div>

                                    <div class="col-3 d-flex justify-content-end">
                                        <?php if($textLesson->accessibility == 'paid'): ?>
                                            <?php if(!empty($user) and $hasBought): ?>
                                                <a href="<?php echo e($course->getUrl()); ?>/lessons/<?php echo e($textLesson->id); ?>/read" target="_blank" class="course-content-btns btn btn-sm btn-primary flex-grow-1">
                                                    <?php echo e(trans('public.read')); ?>

                                                </a>
                                            <?php else: ?>
                                                <button type="button" class="course-content-btns btn btn-sm btn-gray flex-grow-1 disabled <?php echo e(((empty($user)) ? 'not-login-toast' : (!$hasBought ? 'not-access-toast' : ''))); ?>">
                                                    <?php echo e(trans('public.read')); ?>

                                                </button>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="<?php echo e($course->getUrl()); ?>/lessons/<?php echo e($textLesson->id); ?>/read" target="_blank" class="course-content-btns btn btn-sm btn-primary flex-grow-1">
                                                <?php echo e(trans('public.read')); ?>

                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div id="collapseTextLessons<?php echo e($textLesson->id); ?>" aria-labelledby="textLessons_<?php echo e($textLesson->id); ?>" class=" collapse" role="tabpanel">
                                    <div class="panel-collapse">
                                        <div class="text-gray">
                                            <?php echo nl2br(clean($textLesson->summary)); ?>

                                        </div>

                                        <?php if(!empty($user) and $hasBought): ?>
                                            <div class="d-flex align-items-center mt-20">
                                                <label class="mb-0 mr-10 cursor-pointer font-weight-500" for="textLessonReadToggle<?php echo e($textLesson->id); ?>"><?php echo e(trans('public.i_passed_this_lesson')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" id="textLessonReadToggle<?php echo e($textLesson->id); ?>" data-lesson-id="<?php echo e($textLesson->id); ?>" value="<?php echo e($course->id); ?>" class="js-text-lesson-learning-toggle custom-control-input" <?php if(!empty($textLesson->learningStatus)): ?> checked <?php endif; ?>>
                                                    <label class="custom-control-label" for="textLessonReadToggle<?php echo e($textLesson->id); ?>"></label>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if(!empty($course->quizzes) and $course->quizzes->count() > 0): ?>
    <section class="mt-40">
        <h2 class="section-title after-line"><?php echo e(trans('quiz.quizzes')); ?></h2>

        <div class="mt-15">
            <div class="row">
                <div class="col-7 col-md-3 font-12 text-gray"><span class="pl-10"><?php echo e(trans('public.title')); ?></span></div>
                <div class="col-2 font-12 text-gray text-center"><?php echo e(trans('public.min')); ?> <?php echo e(trans('quiz.grade')); ?></div>
                <div class="col-2 font-12 text-gray text-center d-none d-md-block"><?php echo e(trans('quiz.attempts')); ?></div>
                <div class="col-2 font-12 text-gray text-center d-none d-md-block"><?php echo e(trans('public.status')); ?></div>
                <div class="col-3"></div>
            </div>

            <div class="row">
                <div class="col-12">
                    <?php $__currentLoopData = $course->quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="rounded-sm shadow-lg border mt-20 p-15">
                            <div class="row align-items-center">
                                <div class="col-7 col-md-3 d-flex flex-column">
                                    <span class="font-weight-bold font-14 text-secondary"><?php echo e($quiz->title); ?></span>
                                    <span class="font-12 text-gray"><?php echo e($quiz->quizQuestions->count()); ?> <?php echo e(trans('public.questions')); ?>, <?php echo e($quiz->time); ?> <?php echo e(trans('public.min')); ?></span>
                                </div>

                                <div class="col-2 text-gray font-14 text-center"><?php echo e($quiz->pass_mark); ?>/<?php echo e($quiz->quizQuestions->sum('grade')); ?></div>

                                <div class="col-2 text-gray font-14 text-center d-none d-md-block"><?php echo e((!empty($user) and !empty($quiz->result_count)) ? $quiz->result_count : '0'); ?>/<?php echo e($quiz->attempt); ?></div>

                                <?php if(empty($user) or empty($quiz->result_status)): ?>
                                    <div class="col-2 text-gray font-14 text-center d-none d-md-block">-</div>
                                <?php else: ?>
                                    <div class="col-2 text-gray text-center d-none d-md-block">
                                        <div class="d-flex flex-column <?php if($quiz->result_status == 'passed'): ?> text-primary <?php elseif($quiz->result_status == 'failed'): ?> text-danger <?php else: ?> text-warning <?php endif; ?>">
                                            <?php if($quiz->result_status == 'passed'): ?>
                                                <span class="font-14"><?php echo e(trans('quiz.passed')); ?></span>
                                            <?php elseif($quiz->result_status == 'failed'): ?>
                                                <span class="font-14"><?php echo e(trans('quiz.failed')); ?></span>
                                            <?php elseif($quiz->result_status == 'waiting'): ?>
                                                <span class="font-14"><?php echo e(trans('quiz.waiting')); ?></span>
                                            <?php endif; ?>

                                            <span class="font-14">(<?php echo e($quiz->user_grade); ?>/<?php echo e($quiz->quizQuestions->sum('grade')); ?>)</span>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="col-3 d-flex justify-content-end">
                                    <?php if(!empty($user) and $quiz->can_try and $hasBought): ?>
                                        <a href="/panel/quizzes/<?php echo e($quiz->id); ?>/start" class="course-content-btns btn btn-sm btn-primary flex-grow-1"><?php echo e(trans('quiz.quiz_start')); ?></a>
                                    <?php else: ?>
                                        <button type="button" class="course-content-btns btn btn-sm btn-gray flex-grow-1 disabled <?php echo e(((empty($user)) ? 'not-login-toast' : (!$hasBought ? 'not-access-toast' : (!$quiz->can_try ? 'can-not-try-again-quiz-toast' : '')))); ?>">
                                            <?php echo e(trans('quiz.quiz_start')); ?>

                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if(!empty($course->quizzes) and $course->quizzes->count() > 0 and ($quiz->certificate) ): ?>
    <section class="mt-40">
        <h2 class="section-title after-line"><?php echo e(trans('panel.certificates')); ?></h2>

        <div class="mt-15">
            <div class="row">
                <div class="col-6 font-12 text-gray"><span class="pl-10"><?php echo e(trans('public.title')); ?></span></div>
                <div class="col-3 text-center font-12 text-gray"><?php echo e(trans('public.min')); ?> <?php echo e(trans('quiz.grade')); ?></div>
                <div class="col-3"></div>
            </div>

            <div class="row">
                <div class="col-12">
                    <?php $__currentLoopData = $course->quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($quiz->certificate): ?>
                            <div class="rounded-sm shadow-lg border mt-20 p-15">
                                <div class="row align-items-center">
                                    <div class="col-6 d-flex flex-column">
                                        <span class="font-weight-bold font-14 text-secondary"><?php echo e($quiz->title); ?></span>
                                    </div>

                                    <div class="col-3 text-gray font-14 text-center"><?php echo e($quiz->pass_mark); ?>/<?php echo e($quiz->quizQuestions->sum('grade')); ?></div>

                                    <div class="col-3 d-flex justify-content-end">
                                        <?php if(!empty($user) and $quiz->can_download_certificate and $hasBought): ?>
                                            <a href="/panel/quizzes/results/<?php echo e($quiz->result->id); ?>/downloadCertificate" class="course-content-btns btn btn-sm btn-primary flex-grow-1"><?php echo e(trans('home.download')); ?></a>
                                        <?php else: ?>
                                            <button type="button" class="course-content-btns btn btn-sm btn-gray flex-grow-1 disabled <?php echo e(((empty($user)) ? 'not-login-toast' : (!$hasBought ? 'not-access-toast' : (!$quiz->can_download_certificate ? 'can-not-download-certificate-toast' : '')))); ?>">
                                                <?php echo e(trans('home.download')); ?>

                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/web/default/course/tabs/content.blade.php ENDPATH**/ ?>