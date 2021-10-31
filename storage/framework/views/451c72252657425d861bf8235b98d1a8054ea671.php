<!-- Modal -->
<div class="d-none" id="webinarTestLessonModal">
    <h3 class="section-title after-line font-20 text-dark-blue mb-25"><?php echo e(trans('public.add_test_lesson')); ?></h3>
    <form action="/admin/test-lesson/store" method="post">
        <input type="hidden" name="webinar_id" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.title')); ?></label>
            <input type="text" name="title" class="form-control" placeholder=""/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('public.study_time')); ?></label>
                    <input type="text" name="study_time" class="form-control"/>
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('public.accessibility')); ?></label>
                    <select class="custom-select" name="accessibility">
                        <option selected disabled><?php echo e(trans('public.choose_accessibility')); ?></option>
                        <option value="free"><?php echo e(trans('public.free')); ?></option>
                        <option value="paid"><?php echo e(trans('public.paid')); ?></option>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.image')); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" class="input-group-text admin-file-manager" data-input="image_record" data-preview="holder">
                        <i class="fa fa-arrow-up"></i>
                    </button>
                </div>
                <input type="text" name="image" id="image_record" class="form-control"/>
                <div class="input-group-append">
                    <button type="button" class="input-group-text admin-file-view" data-input="image_record">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
                <div class="invalid-feedback"></div>
            </div>
        </div>

        <div class="form-group">
            <label class="input-label d-block"><?php echo e(trans('public.attachments')); ?></label>

            <select class="js-ajax-attachments form-control attachments-select2" name="attachments" data-placeholder="<?php echo e(trans('public.choose_attachments')); ?>">
                <option></option>

                <?php if(!empty($webinar->files) and count($webinar->files)): ?>
                    <?php $__currentLoopData = $webinar->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filesInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($filesInfo->downloadable): ?>
                            <option value="<?php echo e($filesInfo->id); ?>"><?php echo e($filesInfo->title); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.summary')); ?></label>
            <textarea name="summary" class="js-ajax-summary form-control" rows="6"></textarea>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.content')); ?></label>
            <div class="content-summernote js-ajax-file_path">
                <textarea class="js-content-summernote form-control"></textarea>
                <textarea name="content"  class="js-hidden-content-summernote d-none"></textarea>
            </div>
            <div class="invalid-feedback"></div>
        </div>

        <div class="mt-30 d-flex align-items-center justify-content-end">
            <button type="button" id="saveTestLesson" class="btn btn-primary"><?php echo e(trans('public.save')); ?></button>
            <button type="button" class="btn btn-danger ml-2 close-swl"><?php echo e(trans('public.close')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/webinars/modals/testLesson.blade.php ENDPATH**/ ?>