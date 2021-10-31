<!-- Modal -->
<div class="d-none" id="webinarFaqModal">
    <h3 class="section-title after-line font-20 text-dark-blue mb-25"><?php echo e(trans('public.add_faq')); ?></h3>

    <form action="/admin/faqs/store" method="post">
        <input type="hidden" name="webinar_id" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.title')); ?></label>
            <input type="text" name="title" class="form-control" placeholder="<?php echo e(trans('forms.maximum_50_characters')); ?>"/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.answer')); ?></label>
            <textarea name="answer" class="form-control" rows="6"></textarea>
            <div class="invalid-feedback"></div>
        </div>

        <div class="mt-30 d-flex align-items-center justify-content-end">
            <button type="button" id="saveFAQ" class="btn btn-primary"><?php echo e(trans('public.save')); ?></button>
            <button type="button" class="btn btn-danger ml-2 close-swl"><?php echo e(trans('public.close')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/webinars/modals/faq.blade.php ENDPATH**/ ?>