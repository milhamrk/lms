<!-- Modal -->
<div class="d-none" id="quizzesModal">
    <h3 class="section-title after-line font-20 text-dark-blue mb-25"><?php echo e(trans('public.add_quiz')); ?></h3>

    <form action="/admin/webinar-quiz/store" method="post">
        <input type="hidden" name="webinar_id" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">

        <div class="form-group mt-15">
            <label class="input-label d-block"><?php echo e(trans('public.select_a_quiz')); ?></label>

            <select name="quiz_id" class="form-control quiz-select2" data-placeholder="<?php echo e(trans('public.add_quiz')); ?>">
                <option disabled selected></option>
                <?php if(!empty($webinar)): ?>
                    <?php $__currentLoopData = $teacherQuizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($quiz->id); ?>"><?php echo e($quiz->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
            <div class="invalid-feedback"></div>
        </div>

        <div class="mt-30 d-flex align-items-center justify-content-end">
            <button type="button" id="saveQuiz" class="btn btn-primary"><?php echo e(trans('public.save')); ?></button>
            <button type="button" class="btn btn-danger ml-2 close-swl"><?php echo e(trans('public.close')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/webinars/modals/quizzes.blade.php ENDPATH**/ ?>