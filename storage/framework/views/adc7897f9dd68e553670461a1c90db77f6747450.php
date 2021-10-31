<div class="">
    <div data-action="<?php echo e(!empty($quiz) ? '/panel/quizzes/'. $quiz->id .'/update' : '/panel/quizzes/store'); ?>" class="quiz-form webinar-form">

        <section>
            <h2 class="section-title after-line"><?php echo e(trans('quiz.new_quiz')); ?></h2>

            <div class="row">
                <div class="col-12 col-md-4">

                    <?php if(empty($selectedWebinar)): ?>
                        <div class="form-group mt-25">
                            <label class="input-label"><?php echo e(trans('panel.webinar')); ?></label>
                            <select name="ajax[webinar_id]" class="js-ajax-webinar_id custom-select">
                                <option <?php echo e(!empty($quiz) ? 'disabled' : 'selected disabled'); ?> value=""><?php echo e(trans('panel.choose_webinar')); ?></option>
                                <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($webinar->id); ?>" <?php echo e((!empty($quiz) and $quiz->webinar_id == $webinar->id) ? 'selected' : ''); ?>><?php echo e($webinar->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php else: ?>
                        <input type="hidden" name="ajax[webinar_id]" value="<?php echo e($selectedWebinar->id); ?>">
                    <?php endif; ?>

                    <div class="form-group <?php if(!empty($selectedWebinar)): ?> mt-25 <?php endif; ?>">
                        <label class="input-label"><?php echo e(trans('quiz.quiz_title')); ?></label>
                        <input type="text" value="<?php echo e(!empty($quiz) ? $quiz->title : old('title')); ?>" name="ajax[title]" class="js-ajax-title form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                        <div class="invalid-feedback">
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>

                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('public.time')); ?> <span class="braces">(<?php echo e(trans('public.minutes')); ?>)</span></label>
                        <input type="text" value="<?php echo e(!empty($quiz) ? $quiz->time : old('time')); ?>" name="ajax[time]" class="js-ajax-time form-control <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('forms.empty_means_unlimited')); ?>"/>
                        <div class="invalid-feedback">
                            <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>

                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('quiz.number_of_attemps')); ?></label>
                        <input type="text" name="ajax[attempt]" value="<?php echo e(!empty($quiz) ? $quiz->attempt : old('attempt')); ?>" class="js-ajax-attempt form-control <?php $__errorArgs = ['attempt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('forms.empty_means_unlimited')); ?>"/>
                        <div class="invalid-feedback">
                            <?php $__errorArgs = ['attempt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>

                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('quiz.pass_mark')); ?></label>
                        <input type="text" name="ajax[pass_mark]" value="<?php echo e(!empty($quiz) ? $quiz->pass_mark : old('pass_mark')); ?>" class="js-ajax-pass_mark form-control <?php $__errorArgs = ['pass_mark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                        <div class="invalid-feedback">
                            <?php $__errorArgs = ['pass_mark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>

                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-group mt-20 d-flex align-items-center justify-content-between">
                        <label class="cursor-pointer input-label" for="certificateSwitch<?php echo e($quiz ?? ''); ?>"><?php echo e(trans('quiz.certificate_included')); ?></label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="ajax[certificate]" class="js-ajax-certificate custom-control-input" id="certificateSwitch<?php echo e($quiz ?? ''); ?>" <?php echo e(!empty($quiz) && $quiz->certificate ? 'checked' : ''); ?>>
                            <label class="custom-control-label" for="certificateSwitch<?php echo e($quiz ?? ''); ?>"></label>
                        </div>
                    </div>

                    <div class="form-group mt-20 d-flex align-items-center justify-content-between">
                        <label class="cursor-pointer input-label" for="statusSwitch<?php echo e($quiz ?? ''); ?>"><?php echo e(trans('quiz.active_quiz')); ?></label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="ajax[status]" class="js-ajax-status custom-control-input" id="statusSwitch<?php echo e($quiz ?? ''); ?>" <?php echo e(!empty($quiz) && $quiz->status ? 'checked' : ''); ?>>
                            <label class="custom-control-label" for="statusSwitch<?php echo e($quiz ?? ''); ?>"></label>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php if(!empty($quiz)): ?>
            <section class="mt-30">
                <div class="d-block d-md-flex justify-content-between align-items-center pb-20">
                    <h2 class="section-title after-line"><?php echo e(trans('public.questions')); ?></h2>

                    <div class="d-flex align-items-center mt-20 mt-md-0">
                        <button id="add_multiple_question" data-quiz-id="<?php echo e($quiz->id); ?>" type="button" class="btn btn-primary btn-sm ml-10"><?php echo e(trans('quiz.add_multiple_choice')); ?></button>
                        <button id="add_descriptive_question" data-quiz-id="<?php echo e($quiz->id); ?>" type="button" class="btn btn-primary btn-sm ml-10"><?php echo e(trans('quiz.add_descriptive')); ?></button>
                    </div>
                </div>

                <?php if($quizQuestions): ?>
                    <?php $__currentLoopData = $quizQuestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="quiz-question-card d-flex align-items-center mt-20">
                            <div class="flex-grow-1">
                                <h4 class="question-title"><?php echo e($question->title); ?></h4>
                                <div class="font-12 mt-5 question-infos">
                                    <span><?php echo e($question->type === App\Models\QuizzesQuestion::$multiple ? trans('quiz.multiple_choice') : trans('quiz.descriptive')); ?> | <?php echo e(trans('quiz.grade')); ?>: <?php echo e($question->grade); ?></span>
                                </div>
                            </div>

                            <div class="btn-group dropdown table-actions">
                                <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="more-vertical" height="20"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <button type="button" data-question-id="<?php echo e($question->id); ?>" class="edit_question btn btn-sm btn-transparent d-block"><?php echo e(trans('public.edit')); ?></button>
                                    <a href="/panel/quizzes-questions/<?php echo e($question->id); ?>/delete" class="delete-action btn btn-sm btn-transparent d-block"><?php echo e(trans('public.delete')); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </section>
        <?php endif; ?>

        <input type="hidden" name="ajax[is_webinar_page]" value="<?php if(!empty($inWebinarPage) and $inWebinarPage): ?> 1 <?php else: ?> 0 <?php endif; ?>">

        <div class="mt-20 mb-20">
            <?php if(!empty($inWebinarPage) and $inWebinarPage): ?>
                <button type="button" class="js-submit-quiz-form btn btn-sm btn-primary"><?php echo e(!empty($quiz) ? trans('public.save_change') : trans('public.create')); ?></button>
            <?php else: ?>
                <button type="button" class="js-submit-quiz-form btn btn-sm btn-primary"><?php echo e(!empty($quiz) ? trans('public.save_change') : trans('public.create')); ?></button>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal -->
<?php if(!empty($quiz)): ?>
    <?php echo $__env->make(getTemplate() .'.panel.quizzes.modals.multiple_question',['quiz' => $quiz], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make(getTemplate() .'.panel.quizzes.modals.descriptive_question',['quiz' => $quiz], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/web/default/panel/quizzes/create_quiz_form.blade.php ENDPATH**/ ?>