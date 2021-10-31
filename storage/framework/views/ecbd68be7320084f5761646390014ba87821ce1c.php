<!-- Modal -->
<div class="d-none" id="webinarTicketModal">
    <h3 class="section-title after-line font-20 text-dark-blue mb-25"><?php echo e(trans('public.add_ticket')); ?></h3>
    <form action="/admin/tickets/store" method="post">
        <input type="hidden" name="webinar_id" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.title')); ?></label>
            <input type="text" name="title" class="form-control" placeholder="<?php echo e(trans('forms.maximum_64_characters')); ?>"/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.date')); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="dateRangeLabel">
                        <i class="fa fa-calendar text-white"></i>
                    </span>
                </div>
                <input type="text" name="date" class="form-control date-range-picker" aria-describedby="dateRangeLabel"/>
                <div class="invalid-feedback"></div>
            </div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.discount')); ?> <span class="braces">(%)</span></label>
            <input type="text" name="discount" class="form-control" placeholder="10"/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.capacity')); ?></label>
            <input type="text" name="capacity" class="form-control" placeholder="<?php echo e(trans('forms.empty_means_unlimited')); ?>"/>
            <div class="invalid-feedback"></div>
            <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.price_plan_modal_capacity_hint')); ?></div>
        </div>

        <div class="mt-30 d-flex align-items-center justify-content-end">
            <button type="button" id="saveTicket" class="btn btn-primary"><?php echo e(trans('public.save')); ?></button>
            <button type="button" class="btn btn-danger ml-2 close-swl"><?php echo e(trans('public.close')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/webinars/modals/ticket.blade.php ENDPATH**/ ?>