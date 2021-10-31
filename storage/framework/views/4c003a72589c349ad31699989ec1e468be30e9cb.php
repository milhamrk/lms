<div class="tab-pane mt-3 fade" id="panel_sidebar" role="tabpanel" aria-labelledby="panel_sidebar-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="/admin/settings/main" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="name" value="panel_sidebar">
                <input type="hidden" name="page" value="personalization">

                <div class="form-group">
                    <label><?php echo e(trans('admin/main.link')); ?></label>
                    <input type="text" name="value[link]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['link'])) ? $itemValue['link'] : old('link')); ?>" class="form-control "/>
                </div>

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('admin/main.background')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text admin-file-manager" data-input="sidebarBackground" data-preview="holder">
                                <i class="fa fa-chevron-up"></i>
                            </button>
                        </div>
                        <input type="text" name="value[background]" id="sidebarBackground" value="<?php echo e((!empty($itemValue) and !empty($itemValue['background'])) ? $itemValue['background'] : old('background')); ?>" class="form-control"/>
                    </div>
                </div>

                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/settings/personalization/panel_sidebar.blade.php ENDPATH**/ ?>