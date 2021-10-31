<div class="tab-pane mt-3 fade" id="home_hero2" role="tabpanel" aria-labelledby="home_hero2-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="/admin/settings/main" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="name" value="home_hero2">
                <input type="hidden" name="page" value="personalization">

                <div class="form-group">
                    <label><?php echo e(trans('admin/main.title')); ?></label>
                    <input type="text" name="value[title]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['title'])) ? $itemValue['title'] : old('title')); ?>" class="form-control "/>
                </div>

                <div class="form-group">
                    <label><?php echo e(trans('public.description')); ?></label>
                    <textarea type="text" name="value[description]" rows="5" class="form-control "><?php echo e((!empty($itemValue) and !empty($itemValue['description'])) ? $itemValue['description'] : old('description')); ?></textarea>
                </div>

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('admin/main.hero_background')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text admin-file-manager" data-input="hero_background" data-preview="holder">
                                <i class="fa fa-chevron-up"></i>
                            </button>
                        </div>
                        <input type="text" name="value[hero_background]" id="hero_background" value="<?php echo e((!empty($itemValue) and !empty($itemValue['hero_background'])) ? $itemValue['hero_background'] : old('hero_background')); ?>" class="form-control"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('admin/main.hero_vector')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text admin-file-manager" data-input="hero_vector" data-preview="holder">
                                <i class="fa fa-chevron-up"></i>
                            </button>
                        </div>
                        <input type="text" name="value[hero_vector]" id="hero_vector" value="<?php echo e((!empty($itemValue) and !empty($itemValue['hero_vector'])) ? $itemValue['hero_vector'] : old('hero_vector')); ?>" class="form-control"/>
                    </div>
                </div>

                <div class="form-group custom-switches-stacked">
                    <label class="custom-switch pl-0">
                        <input type="hidden" name="value[has_lottie]" value="0">
                        <input type="checkbox" name="value[has_lottie]" id="hasLottie" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['has_lottie']) and $itemValue['has_lottie']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                        <span class="custom-switch-indicator"></span>
                        <label class="custom-switch-description mb-0 cursor-pointer" for="hasLottie"><?php echo e(trans('admin/main.has_lottie')); ?></label>
                    </label>
                    <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.has_lottie_hint')); ?></div>

                </div>

                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/settings/personalization/home_hero2.blade.php ENDPATH**/ ?>