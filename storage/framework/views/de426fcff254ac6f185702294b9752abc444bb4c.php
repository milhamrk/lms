<div class="tab-pane mt-3 fade show active" id="pages_background" role="tabpanel" aria-labelledby="pages_background-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="/admin/settings/main" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="name" value="page_background">
                <input type="hidden" name="page" value="personalization">

                <?php
                    $pages = ['admin_login','admin_dashboard', 'login','register','remember_pass','verification','search','categories','become_instructor','certificate_validation','blog','instructors','organizations','dashboard','user_avatar','user_cover'];
                ?>

                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('admin/main.'.$page.'_background')); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="input-group-text admin-file-manager" data-input="<?php echo e($page); ?>" data-preview="holder">
                                    <i class="fa fa-chevron-up"></i>
                                </button>
                            </div>
                            <input type="text" name="value[<?php echo e($page); ?>]" id="<?php echo e($page); ?>" value="<?php echo e((!empty($itemValue) and !empty($itemValue[$page])) ? $itemValue[$page] : old($page)); ?>" class="form-control"/>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/settings/personalization/page_background.blade.php ENDPATH**/ ?>