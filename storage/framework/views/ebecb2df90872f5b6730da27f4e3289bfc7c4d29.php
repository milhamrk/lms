<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/bootstrap-timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.css">
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
    <style>
        .bootstrap-timepicker-widget table td input {
            width: 35px !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(!empty($webinar) ?trans('/admin/main.edit'): trans('admin/main.new')); ?> <?php echo e(trans('admin/main.class')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="/admin/webinars"><?php echo e(trans('admin/main.classes')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(!empty($webinar) ?trans('/admin/main.edit'): trans('admin/main.new')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-body">

                            <form method="post" action="/admin/webinars/<?php echo e(!empty($webinar) ? $webinar->id.'/update' : 'store'); ?>" id="webinarForm" class="webinar-form">
                                <?php echo e(csrf_field()); ?>

                                <section>
                                    <h2 class="section-title after-line"><?php echo e(trans('public.basic_information')); ?></h2>

                                    <div class="row">
                                        <div class="col-12 col-md-5">

                                            <div class="form-group mt-15 ">
                                                <label class="input-label d-block"><?php echo e(trans('panel.course_type')); ?></label>

                                                <select name="type" class="custom-select <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                    <option value="webinar" <?php if((!empty($webinar) and $webinar->isWebinar()) or old('type') == \App\Models\Webinar::$webinar): ?> selected <?php endif; ?>><?php echo e(trans('webinars.webinar')); ?></option>
                                                    <option value="course" <?php if((!empty($webinar) and $webinar->isCourse()) or old('type') == \App\Models\Webinar::$course): ?> selected <?php endif; ?>><?php echo e(trans('product.video_course')); ?></option>
                                                    <option><?php echo e(trans('product.text_course')); ?> (Paid plugin)</option>
                                                </select>

                                                <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                                                <input type="text" name="title" value="<?php echo e(!empty($webinar) ? $webinar->title : old('title')); ?>" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('forms.maximum_50_characters')); ?>"/>
                                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>


                                            <?php if(!empty($webinar) and $webinar->creator->isOrganization()): ?>
                                                <div class="form-group mt-15 ">
                                                    <label class="input-label d-block"><?php echo e(trans('admin/main.organization')); ?></label>

                                                    <select class="form-control" disabled readonly data-placeholder="<?php echo e(trans('public.search_instructor')); ?>">
                                                        <option selected><?php echo e($webinar->creator->full_name); ?></option>
                                                    </select>
                                                </div>
                                            <?php endif; ?>


                                            <div class="form-group mt-15 ">
                                                <label class="input-label d-block"><?php echo e(trans('admin/main.select_a_instructor')); ?></label>

                                                <select name="teacher_id" class="form-control select2 <?php $__errorArgs = ['teacher_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-placeholder="<?php echo e(trans('public.search_instructor')); ?>">
                                                    <option <?php echo e(!empty($webinar) ? '' : 'selected'); ?> disabled><?php echo e(trans('public.select_a_teacher')); ?></option>
                                                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($teacher->id); ?>" <?php if(!empty($webinar) and $webinar->teacher_id == $teacher->id): ?> selected <?php endif; ?>><?php echo e($teacher->full_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                                <?php $__errorArgs = ['teacher_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>


                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.seo_description')); ?></label>
                                                <input type="text" name="seo_description" value="<?php echo e(!empty($webinar) ? $webinar->seo_description : old('seo_description')); ?>" class="form-control <?php $__errorArgs = ['seo_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                <?php $__errorArgs = ['seo_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.seo_description_hint')); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.thumbnail_image')); ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="input-group-text admin-file-manager" data-input="thumbnail" data-preview="holder">
                                                            <i class="fa fa-upload"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="thumbnail" id="thumbnail" value="<?php echo e(!empty($webinar) ? $webinar->thumbnail : old('thumbnail')); ?>" class="form-control <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                    <div class="input-group-append">
                                                        <button type="button" class="input-group-text admin-file-view" data-input="thumbnail">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </div>
                                                    <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>


                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.cover_image')); ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="input-group-text admin-file-manager" data-input="cover_image" data-preview="holder">
                                                            <i class="fa fa-upload"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="image_cover" id="cover_image" value="<?php echo e(!empty($webinar) ? $webinar->image_cover : old('image_cover')); ?>" class="form-control <?php $__errorArgs = ['image_cover'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                    <div class="input-group-append">
                                                        <button type="button" class="input-group-text admin-file-view" data-input="cover_image">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </div>
                                                    <?php $__errorArgs = ['image_cover'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.demo_video')); ?> (<?php echo e(trans('public.optional')); ?>)</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="input-group-text admin-file-manager" data-input="demo_video" data-preview="holder">
                                                            <i class="fa fa-upload"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="video_demo" id="demo_video" value="<?php echo e(!empty($webinar) ? $webinar->video_demo : old('video_demo')); ?>" class="form-control <?php $__errorArgs = ['video_demo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                    <?php $__errorArgs = ['video_demo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.description')); ?></label>
                                                <textarea id="summernote" name="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('forms.webinar_description_placeholder')); ?>"><?php echo !empty($webinar) ? $webinar->description : old('description'); ?></textarea>
                                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section class="mt-3">
                                    <h2 class="section-title after-line"><?php echo e(trans('public.additional_information')); ?></h2>
                                    <div class="row">
                                        <div class="col-12 col-md-6">

                                            <?php if(empty($webinar) or (!empty($webinar) and $webinar->isWebinar())): ?>

                                                <div class="form-group mt-15 js-capacity <?php echo e((!empty(old('type')) and old('type') != \App\Models\Webinar::$webinar) ? 'd-none' : ''); ?>">
                                                    <label class="input-label"><?php echo e(trans('public.capacity')); ?></label>
                                                    <input type="text" name="capacity" value="<?php echo e(!empty($webinar) ? $webinar->capacity : old('capacity')); ?>" class="form-control <?php $__errorArgs = ['capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                    <?php $__errorArgs = ['capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="row mt-15">
                                                <?php if(empty($webinar) or (!empty($webinar) and $webinar->isWebinar())): ?>
                                                    <div class="col-12 col-md-6 js-start_date <?php echo e((!empty(old('type')) and old('type') != \App\Models\Webinar::$webinar) ? 'd-none' : ''); ?>">
                                                        <div class="form-group">
                                                            <label class="input-label"><?php echo e(trans('public.start_date')); ?></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="dateInputGroupPrepend">
                                                                        <i class="fa fa-calendar-alt "></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="start_date" value="<?php echo e((!empty($webinar) and $webinar->start_date) ? dateTimeFormat($webinar->start_date,'Y-m-d H:i') : old('start_date')); ?>" class="form-control <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> datetimepicker" aria-describedby="dateInputGroupPrepend"/> 
                                                                <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <div class="invalid-feedback">
                                                                    <?php echo e($message); ?>

                                                                </div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="input-label"><?php echo e(trans('public.duration')); ?> (<?php echo e(trans('public.minutes')); ?>)</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="timeInputGroupPrepend">
                                                                    <i class="fa fa-clock"></i>
                                                                </span>
                                                            </div>


                                                            <input type="text" name="duration" value="<?php echo e(!empty($webinar) ? $webinar->duration : old('duration')); ?>" class="form-control <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                            <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback">
                                                                <?php echo e($message); ?>

                                                            </div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if(!empty($webinar) and $webinar->creator->isOrganization()): ?>
                                                <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                    <label class="" for="privateSwitch"><?php echo e(trans('webinars.private')); ?></label>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" name="private" class="custom-control-input" id="privateSwitch" <?php echo e((!empty($webinar) and $webinar->private) ? 'checked' :  ''); ?>>
                                                        <label class="custom-control-label" for="privateSwitch"></label>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class="" for="supportSwitch"><?php echo e(trans('panel.support')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="support" class="custom-control-input" id="supportSwitch" <?php echo e(!empty($webinar) && $webinar->support ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="supportSwitch"></label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class="cursor-pointer" for="downloadableSwitch"><?php echo e(trans('home.downloadable')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="downloadable" class="custom-control-input" id="downloadableSwitch" <?php echo e(!empty($webinar) && $webinar->downloadable ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="downloadableSwitch"></label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class="" for="partnerInstructorSwitch"><?php echo e(trans('public.partner_instructor')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="partner_instructor" class="custom-control-input" id="partnerInstructorSwitch" <?php echo e(!empty($webinar) && $webinar->partner_instructor ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="partnerInstructorSwitch"></label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class="" for="subscribeSwitch"><?php echo e(trans('public.subscribe')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="subscribe" class="custom-control-input" id="subscribeSwitch" <?php echo e(!empty($webinar) && $webinar->subscribe ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="subscribeSwitch"></label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.price')); ?></label>
                                                <input type="text" name="price" value="<?php echo e(!empty($webinar) ? $webinar->price : old('price')); ?>" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('public.0_for_free')); ?>"/>
                                                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div id="partnerInstructorInput" class="form-group mt-15 <?php echo e(!empty($webinar) && $webinar->partner_instructor ? '' : 'd-none'); ?>">
                                                <label class="input-label d-block"><?php echo e(trans('public.select_a_partner_teacher')); ?></label>

                                                <select name="partners[]" class="form-control select2" multiple="" data-placeholder="<?php echo e(trans('public.search_instructor')); ?>">
                                                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($teacher->id); ?>" <?php echo e(!empty($webinar) && isset($webinarPartnerTeacher[$teacher->id]) ? 'selected' : ''); ?>><?php echo e($teacher->full_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.select_a_partner_hint')); ?></div>
                                            </div>

                                            <div class="form-group mt-15">
                                                <label class="input-label d-block"><?php echo e(trans('public.tags')); ?></label>
                                                <input type="text" name="tags" data-max-tag="5" value="<?php echo e(!empty($webinar) ? implode(',',$webinarTags) : ''); ?>" class="form-control inputtags" placeholder="<?php echo e(trans('public.type_tag_name_and_press_enter')); ?> (<?php echo e(trans('admin/main.max')); ?> : 5)"/>
                                            </div>


                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.category')); ?></label>

                                                <select id="categories" class="custom-select <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category_id" required>
                                                    <option <?php echo e(!empty($webinar) ? '' : 'selected'); ?> disabled><?php echo e(trans('public.choose_category')); ?></option>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(!empty($category->subCategories) and count($category->subCategories)): ?>
                                                            <optgroup label="<?php echo e($category->title); ?>">
                                                                <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($subCategory->id); ?>" <?php echo e((!empty($webinar) and $webinar->category_id == $subCategory->id) ? 'selected' : ''); ?>><?php echo e($subCategory->title); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </optgroup>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($category->id); ?>" <?php echo e((!empty($webinar) and $webinar->category_id == $category->id) ? 'selected' : ''); ?>><?php echo e($category->title); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                                <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group mt-15 <?php echo e((!empty($webinarCategoryFilters) and count($webinarCategoryFilters)) ? '' : 'd-none'); ?>" id="categoriesFiltersContainer">
                                        <span class="input-label d-block"><?php echo e(trans('public.category_filters')); ?></span>
                                        <div id="categoriesFiltersCard" class="row mt-3">

                                            <?php if(!empty($webinarCategoryFilters) and count($webinarCategoryFilters)): ?>
                                                <?php $__currentLoopData = $webinarCategoryFilters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-12 col-md-3">
                                                        <div class="webinar-category-filters">
                                                            <strong class="category-filter-title d-block"><?php echo e($filter->title); ?></strong>
                                                            <div class="py-10"></div>

                                                            <?php $__currentLoopData = $filter->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="form-group mt-3 d-flex align-items-center justify-content-between">
                                                                    <label class="text-gray font-14" for="filterOptions<?php echo e($option->id); ?>"><?php echo e($option->title); ?></label>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="filters[]" value="<?php echo e($option->id); ?>" <?php echo e(((!empty($webinarFilterOptions) && in_array($option->id,$webinarFilterOptions)) ? 'checked' : '')); ?> class="custom-control-input" id="filterOptions<?php echo e($option->id); ?>">
                                                                        <label class="custom-control-label" for="filterOptions<?php echo e($option->id); ?>"></label>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </section>

                                <?php if(!empty($webinar)): ?>
                                    <section class="mt-30">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 class="section-title after-line"><?php echo e(trans('admin/main.price_plans')); ?></h2>
                                            <button id="webinarAddTicket" type="button" class="btn btn-primary btn-sm mt-3"><?php echo e(trans('admin/main.add_price_plan')); ?></button>
                                        </div>

                                        <div class="row mt-10">
                                            <div class="col-12">

                                                <?php if(!empty($tickets) and !$tickets->isEmpty()): ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped text-center font-14">

                                                            <tr>
                                                                <th><?php echo e(trans('public.title')); ?></th>
                                                                <th><?php echo e(trans('public.discount')); ?></th>
                                                                <th><?php echo e(trans('public.capacity')); ?></th>
                                                                <th><?php echo e(trans('public.date')); ?></th>
                                                                <th></th>
                                                            </tr>

                                                            <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo e($ticket->title); ?></th>
                                                                    <td><?php echo e($ticket->discount); ?>%</td>
                                                                    <td><?php echo e($ticket->capacity); ?></td>
                                                                    <td><?php echo e(dateTimeFormat($ticket->start_date,'j F Y')); ?> - <?php echo e((new DateTime())->setTimestamp($ticket->end_date)->format('j F Y')); ?></td>
                                                                    <td>
                                                                        <button type="button" data-ticket-id="<?php echo e($ticket->id); ?>" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" class="edit-ticket btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>

                                                                        <?php echo $__env->make('admin.includes.delete_button',['url' => '/admin/tickets/'. $ticket->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </table>
                                                    </div>
                                                <?php else: ?>
                                                    <?php echo $__env->make('admin.includes.no-result',[
                                                        'file_name' => 'ticket.png',
                                                        'title' => trans('public.ticket_no_result'),
                                                        'hint' => trans('public.ticket_no_result_hint'),
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>

                                    <?php if($webinar->isWebinar()): ?>
                                        <section class="mt-30">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h2 class="section-title after-line"><?php echo e(trans('public.sessions')); ?></h2>
                                                <button id="webinarAddSession" type="button" class="btn btn-primary btn-sm mt-3"><?php echo e(trans('public.add_session')); ?></button>
                                            </div>

                                            <div class="row mt-10">
                                                <div class="col-12">
                                                    <?php if(!empty($sessions) and !$sessions->isEmpty()): ?>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped text-center font-14">

                                                                <tr>
                                                                    <th><?php echo e(trans('public.title')); ?></th>
                                                                    <th><?php echo e(trans('admin/main.session_api')); ?></th>
                                                                    <th><?php echo e(trans('public.date_time')); ?></th>
                                                                    <th><?php echo e(trans('public.duration')); ?></th>
                                                                    <th width="20%"><?php echo e(trans('public.link')); ?></th>
                                                                    <th></th>
                                                                </tr>

                                                                <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <th><?php echo e($session->title); ?></th>
                                                                        <th><?php echo e(trans('webinars.session_'.$session->session_api)); ?></th>
                                                                        <td><?php echo e(dateTimeFormat($session->date,'j F Y \|\ H:i')); ?></td>
                                                                        <td><?php echo e($session->duration); ?> <?php echo e(trans('admin/main.min')); ?></td>
                                                                        <td><?php echo e($session->getJoinLink()); ?></td>
                                                                        <td>
                                                                            <button type="button" data-session-id="<?php echo e($session->id); ?>" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" class="edit-session btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                                <i class="fa fa-edit"></i>
                                                                            </button>

                                                                            <?php echo $__env->make('admin.includes.delete_button',['url' => '/admin/sessions/'. $session->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </table>
                                                        </div>
                                                    <?php else: ?>
                                                        <?php echo $__env->make('admin.includes.no-result',[
                                                            'file_name' => 'meet.png',
                                                            'title' => trans('public.sessions_no_result'),
                                                            'hint' => trans('public.sessions_no_result_hint'),
                                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </section>
                                    <?php endif; ?>

                                    <section class="mt-30">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 class="section-title after-line"><?php echo e(trans('public.files')); ?></h2>
                                            <button id="webinarAddFile" type="button" class="btn btn-primary btn-sm mt-3"><?php echo e(trans('public.add_files')); ?></button>
                                        </div>

                                        <div class="row mt-10">
                                            <div class="col-12">
                                                <?php if(!empty($files) and !$files->isEmpty()): ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped text-center font-14">

                                                            <tr>
                                                                <th><?php echo e(trans('public.title')); ?></th>
                                                                <th><?php echo e(trans('public.source')); ?></th>
                                                                <th><?php echo e(trans('public.volume')); ?></th>
                                                                <th><?php echo e(trans('public.file_type')); ?></th>
                                                                <th><?php echo e(trans('public.accessibility')); ?></th>
                                                                <th></th>
                                                            </tr>

                                                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <th><?php echo e($file->title); ?></th>
                                                                    <td><?php echo e($file->storage); ?></td>
                                                                    <td><?php echo e($file->volume); ?></td>
                                                                    <td><?php echo e($file->file_type); ?></td>
                                                                    <td><?php echo e($file->accessibility); ?></td>

                                                                    <td>
                                                                        <button type="button" data-file-id="<?php echo e($file->id); ?>" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" class="edit-file btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>

                                                                        <?php echo $__env->make('admin.includes.delete_button',['url' => '/admin/files/'. $file->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </table>
                                                    </div>
                                                <?php else: ?>
                                                    <?php echo $__env->make('admin.includes.no-result',[
                                                        'file_name' => 'files.png',
                                                        'title' => trans('public.files_no_result'),
                                                        'hint' => trans('public.files_no_result_hint'),
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>

                                    <?php if($webinar->isTextCourse()): ?>
                                        <section class="mt-30">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h2 class="section-title after-line"><?php echo e(trans('public.test_lesson')); ?></h2>
                                                <button id="webinarAddTestLesson" type="button" class="btn btn-primary btn-sm mt-3"><?php echo e(trans('public.add_test_lesson')); ?></button>
                                            </div>

                                            <div class="row mt-10">
                                                <div class="col-12">
                                                    <?php if(!empty($textLessons) and !$textLessons->isEmpty()): ?>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped text-center font-14">

                                                                <tr>
                                                                    <th><?php echo e(trans('public.title')); ?></th>
                                                                    <th><?php echo e(trans('public.time')); ?></th>
                                                                    <th><?php echo e(trans('public.attachments')); ?></th>
                                                                    <th><?php echo e(trans('public.accessibility')); ?></th>
                                                                    <th></th>
                                                                </tr>

                                                                <?php $__currentLoopData = $textLessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $textLesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <th><?php echo e($textLesson->title); ?></th>
                                                                        <td><?php echo e($textLesson->study_time); ?></td>
                                                                        <td>
                                                                            <?php if(count($textLesson->attachments) > 0): ?>
                                                                                <span class="text-success"><?php echo e(trans('admin/main.yes')); ?> (<?php echo e(count($textLesson->attachments)); ?>)</span>
                                                                            <?php else: ?>
                                                                                <span class="text-dark"><?php echo e(trans('admin/main.no')); ?></span>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($textLesson->accessibility); ?></td>

                                                                        <td>
                                                                            <button type="button" data-text-id="<?php echo e($textLesson->id); ?>" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" class="edit-test-lesson btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                                <i class="fa fa-edit"></i>
                                                                            </button>

                                                                            <?php echo $__env->make('admin.includes.delete_button',['url' => '/admin/test-lesson/'. $textLesson->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </table>
                                                        </div>
                                                    <?php else: ?>
                                                        <?php echo $__env->make('admin.includes.no-result',[
                                                            'file_name' => 'files.png',
                                                            'title' => trans('public.files_no_result'),
                                                            'hint' => trans('public.files_no_result_hint'),
                                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </section>
                                    <?php endif; ?>

                                    <section class="mt-30">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 class="section-title after-line"><?php echo e(trans('public.prerequisites')); ?></h2>
                                            <button id="webinarAddPrerequisites" type="button" class="btn btn-primary btn-sm mt-3"><?php echo e(trans('public.add_prerequisites')); ?></button>
                                        </div>

                                        <div class="row mt-10">
                                            <div class="col-12">
                                                <?php if(!empty($prerequisites) and !$prerequisites->isEmpty()): ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped text-center font-14">

                                                            <tr>
                                                                <th><?php echo e(trans('public.title')); ?></th>
                                                                <th class="text-left"><?php echo e(trans('public.instructor')); ?></th>
                                                                <th><?php echo e(trans('public.price')); ?></th>
                                                                <th><?php echo e(trans('public.publish_date')); ?></th>
                                                                <th><?php echo e(trans('public.forced')); ?></th>
                                                                <th></th>
                                                            </tr>

                                                            <?php $__currentLoopData = $prerequisites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prerequisite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(!empty($prerequisite->prerequisiteWebinar->title)): ?>
                                                                <tr>
                                                                    <th><?php echo e($prerequisite->prerequisiteWebinar->title); ?></th>
                                                                    <td class="text-left"><?php echo e($prerequisite->prerequisiteWebinar->teacher->full_name); ?></td>
                                                                    <td>$ <?php echo e(number_format($prerequisite->prerequisiteWebinar->price,2)); ?></td>
                                                                    <td><?php echo e(dateTimeFormat($prerequisite->prerequisiteWebinar->created_at,'j F Y | H:i')); ?></td>
                                                                    <td><?php echo e($prerequisite->required ? trans('public.yes') : trans('public.no')); ?></td>

                                                                    <td>
                                                                        <button type="button" data-prerequisite-id="<?php echo e($prerequisite->id); ?>" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" class="edit-prerequisite btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>

                                                                        <?php echo $__env->make('admin.includes.delete_button',['url' => '/admin/prerequisites/'. $prerequisite->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                    </td>
                                                                </tr>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </table>
                                                    </div>
                                                <?php else: ?>
                                                    <?php echo $__env->make('admin.includes.no-result',[
                                                        'file_name' => 'comment.png',
                                                        'title' => trans('public.prerequisites_no_result'),
                                                        'hint' => trans('public.prerequisites_no_result_hint'),
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>

                                    <section class="mt-30">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 class="section-title after-line"><?php echo e(trans('public.faq')); ?></h2>
                                            <button id="webinarAddFAQ" type="button" class="btn btn-primary btn-sm mt-3"><?php echo e(trans('public.add_faq')); ?></button>
                                        </div>

                                        <div class="row mt-10">
                                            <div class="col-12">
                                                <?php if(!empty($faqs) and !$faqs->isEmpty()): ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped text-center font-14">

                                                            <tr>
                                                                <th><?php echo e(trans('public.title')); ?></th>
                                                                <th><?php echo e(trans('public.answer')); ?></th>
                                                                <th></th>
                                                            </tr>

                                                            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <th><?php echo e($faq->title); ?></th>
                                                                    <td>
                                                                        <button type="button" data-action="/admin/faqs/<?php echo e($faq->id); ?>/description" class="get-description btn btn-sm btn-gray200"><?php echo e(trans('public.view')); ?></button>
                                                                    </td>

                                                                    <td>
                                                                        <button type="button" data-faq-id="<?php echo e($faq->id); ?>" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" class="edit-faq btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>

                                                                        <?php echo $__env->make('admin.includes.delete_button',['url' => '/admin/faqs/'. $faq->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </table>
                                                    </div>
                                                <?php else: ?>
                                                    <?php echo $__env->make('admin.includes.no-result',[
                                                        'file_name' => 'faq.png',
                                                        'title' => trans('public.faq_no_result'),
                                                        'hint' => trans('public.faq_no_result_hint'),
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>

                                    <section class="mt-30">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 class="section-title after-line"><?php echo e(trans('public.quiz_certificate')); ?></h2>
                                            <button id="webinarAddQuiz" type="button" class="btn btn-primary btn-sm mt-3"><?php echo e(trans('public.add_quiz')); ?></button>
                                        </div>
                                        <div class="row mt-10">
                                            <div class="col-12">
                                                <?php if(!empty($webinarQuizzes) and !$webinarQuizzes->isEmpty()): ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped text-center font-14">

                                                            <tr>
                                                                <th><?php echo e(trans('public.title')); ?></th>
                                                                <th><?php echo e(trans('public.questions')); ?></th>
                                                                <th><?php echo e(trans('public.total_mark')); ?></th>
                                                                <th><?php echo e(trans('public.pass_mark')); ?></th>
                                                                <th><?php echo e(trans('public.certificate')); ?></th>
                                                                <th></th>
                                                            </tr>

                                                            <?php $__currentLoopData = $webinarQuizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinarQuiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <th><?php echo e($webinarQuiz->title); ?></th>
                                                                    <td><?php echo e($webinarQuiz->quizQuestions->count()); ?></td>
                                                                    <td><?php echo e($webinarQuiz->quizQuestions->sum('grade')); ?></td>
                                                                    <td><?php echo e($webinarQuiz->pass_mark); ?></td>
                                                                    <td><?php echo e($webinarQuiz->certificate ? trans('public.yes') : trans('public.no')); ?></td>
                                                                    <td>
                                                                        <button type="button" data-webinar-quiz-id="<?php echo e($webinarQuiz->id); ?>" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" class="edit-webinar-quiz btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>

                                                                        <?php echo $__env->make('admin.includes.delete_button',['url' => '/admin/webinar-quiz/'. $webinarQuiz->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                    </td>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </tr>

                                                        </table>
                                                    </div>
                                                <?php else: ?>
                                                    <?php echo $__env->make('admin.includes.no-result',[
                                                        'file_name' => 'cert.png',
                                                        'title' => trans('public.quizzes_no_result'),
                                                        'hint' => trans('public.quizzes_no_result_hint'),
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>
                                <?php endif; ?>

                                <section class="mt-3">
                                    <h2 class="section-title after-line"><?php echo e(trans('public.message_to_reviewer')); ?></h2>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mt-15">
                                                <textarea name="message_for_reviewer" rows="10" class="form-control"><?php echo e(!empty($webinar) && $webinar->message_for_reviewer ? $webinar->message_for_reviewer : old('message_for_reviewer')); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <input type="hidden" name="draft" value="no" id="forDraft"/>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" id="saveAndPublish" class="btn btn-success"><?php echo e(!empty($webinar) ? trans('admin/main.save_and_publish') : trans('admin/main.save_and_continue')); ?></button>

                                        <?php if(!empty($webinar)): ?>
                                            <button type="button" id="saveReject" class="btn btn-warning"><?php echo e(trans('public.reject')); ?></button>

                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                    'url' => '/admin/webinars/'. $webinar->id .'/delete',
                                                    'btnText' => trans('public.delete'),
                                                    'hideDefaultClass' => true,
                                                    'btnClass' => 'btn btn-danger'
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>


                            <?php echo $__env->make('admin.webinars.modals.prerequisites', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.quizzes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.ticket', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.file', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.testLesson', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
        var zoomJwtTokenInvalid = '<?php echo e(trans('admin/main.teacher_zoom_jwt_token_invalid')); ?>';
    </script>

    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/moment.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/admin/js/webinar.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/webinars/create.blade.php ENDPATH**/ ?>