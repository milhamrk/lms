<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('/admin/main.edit')); ?> <?php echo e(trans('admin/main.user')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active"><a href="/admin/users"><?php echo e(trans('admin/main.users')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('/admin/main.edit')); ?></div>
            </div>
        </div>

        <?php if(!empty(session()->has('msg'))): ?>
            <div class="alert alert-success my-25">
                <?php echo e(session()->get('msg')); ?>

            </div>
        <?php endif; ?>


        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php if(empty($becomeInstructor)): ?> active <?php endif; ?>" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true"><?php echo e(trans('admin/main.main_general')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-controls="images" aria-selected="true"><?php echo e(trans('auth.images')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="financial-tab" data-toggle="tab" href="#financial" role="tab" aria-controls="financial" aria-selected="true"><?php echo e(trans('admin/main.financial')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="occupations-tab" data-toggle="tab" href="#occupations" role="tab" aria-controls="occupations" aria-selected="true"><?php echo e(trans('site.occupations')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="badges-tab" data-toggle="tab" href="#badges" role="tab" aria-controls="badges" aria-selected="true"><?php echo e(trans('admin/main.badges')); ?></a>
                                </li>

                                <?php if(!empty($becomeInstructor)): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if(!empty($becomeInstructor)): ?> active <?php endif; ?>" id="become_instructor-tab" data-toggle="tab" href="#become_instructor" role="tab" aria-controls="become_instructor" aria-selected="true"><?php echo e(trans('admin/main.become_instructor_info')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>

                            <div class="tab-content" id="myTabContent2">

                                <div class="tab-pane mt-3 fade <?php if(empty($becomeInstructor)): ?> active show <?php endif; ?>" id="general" role="tabpanel" aria-labelledby="general-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <form action="/admin/users/<?php echo e($user->id .'/update'); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>


                                                <div class="form-group">
                                                    <label><?php echo e(trans('/admin/main.full_name')); ?></label>
                                                    <input type="text" name="full_name"
                                                           class="form-control  <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           value="<?php echo e(!empty($user) ? $user->full_name : old('full_name')); ?>"
                                                           placeholder="<?php echo e(trans('admin/main.create_field_full_name_placeholder')); ?>"/>
                                                    <?php $__errorArgs = ['full_name'];
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

                                                <div class="form-group">
                                                    <label><?php echo e(trans('/admin/main.role_name')); ?></label>
                                                    <select class="form-control <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="roleId" name="role_id">
                                                        <option disabled <?php echo e(empty($user) ? 'selected' : ''); ?>><?php echo e(trans('admin/main.select_role')); ?></option>
                                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($role->id); ?>" <?php echo e((!empty($user) and $user->role_id == $role->id) ? 'selected' :''); ?>><?php echo e($role->caption); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php $__errorArgs = ['role_id'];
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

                                                <?php if($user->isUser() || $user->isTeacher()): ?>
                                                    <div class="form-group">
                                                        <label class="input-label"><?php echo e(trans('admin/main.organization')); ?></label>
                                                        <select name="organ_id" data-search-option="just_organization_role" class="form-control search-user-select2"
                                                                data-placeholder="<?php echo e(trans('admin/main.search')); ?> <?php echo e(trans('admin/main.organization')); ?>">

                                                            <?php if(!empty($user) and !empty($user->organization)): ?>
                                                                <option value="<?php echo e($user->organization->id); ?>" selected><?php echo e($user->organization->full_name); ?></option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="form-group">
                                                    <label for="username"><?php echo e(trans('admin/main.email')); ?>:</label>
                                                    <input name="email" type="text" id="username" value="<?php echo e($user->email); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                    <?php $__errorArgs = ['email'];
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

                                                <div class="form-group">
                                                    <label for="username"><?php echo e(trans('admin/main.mobile')); ?>:</label>
                                                    <input name="mobile" type="text" value="<?php echo e($user->mobile); ?>" class="form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                    <?php $__errorArgs = ['mobile'];
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

                                                <div class="form-group">
                                                    <label><?php echo e(trans('admin/main.password')); ?></label>
                                                    <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                    <?php $__errorArgs = ['password'];
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

                                                <div class="form-group">
                                                    <label><?php echo e(trans('admin/main.bio')); ?></label>
                                                    <textarea name="bio" rows="3" class="form-control <?php $__errorArgs = ['bio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($user->bio); ?></textarea>
                                                    <?php $__errorArgs = ['bio'];
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

                                                <div class="form-group">
                                                    <label><?php echo e(trans('site.about')); ?></label>
                                                    <textarea name="about" rows="6" class="form-control"><?php echo e($user->about); ?></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo e(trans('/admin/main.status')); ?></label>
                                                    <select class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status" name="status">
                                                        <option disabled <?php echo e(empty($user) ? 'selected' : ''); ?>><?php echo e(trans('admin/main.select_status')); ?></option>

                                                        <?php $__currentLoopData = \App\User::$statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($status); ?>" <?php echo e(!empty($user) && $user->status === $status ? 'selected' :''); ?>><?php echo e($status); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php $__errorArgs = ['status'];
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

                                                <div class="form-group">
                                                    <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                                    <select name="language" class="form-control">
                                                        <option value=""><?php echo e(trans('auth.language')); ?></option>
                                                        <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($lang); ?>" <?php if(!empty($user) and $user->language == $lang): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php $__errorArgs = ['language'];
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

                                                <div class="form-group custom-switches-stacked mt-2">
                                                    <label class="custom-switch pl-0">
                                                        <input type="hidden" name="ban" value="0">
                                                        <input type="checkbox" name="ban" id="banSwitch" value="1" <?php echo e((!empty($user) and $user->ban) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                        <span class="custom-switch-indicator"></span>
                                                        <label class="custom-switch-description mb-0 cursor-pointer" for="banSwitch"><?php echo e(trans('admin/main.ban')); ?></label>
                                                    </label>
                                                </div>

                                                <div class="row <?php echo e((($user->ban) or (old('ban') == 'on')) ? '' : 'd-none'); ?>" id="banSection">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="input-label"><?php echo e(trans('public.from')); ?></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="dateInputGroupPrepend">
                                                                        <i class="fa fa-calendar-alt"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="ban_start_at" class="form-control datepicker <?php $__errorArgs = ['ban_start_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(!empty($user->ban_start_at) ? dateTimeFormat($user->ban_start_at,'Y/m/d') :''); ?>"/>
                                                                <?php $__errorArgs = ['ban_start_at'];
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
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="input-label"><?php echo e(trans('public.to')); ?></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="dateInputGroupPrepend">
                                                                        <i class="fa fa-calendar-alt"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="ban_end_at" class="form-control datepicker <?php $__errorArgs = ['ban_end_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(!empty($user->ban_end_at) ? dateTimeFormat($user->ban_end_at,'Y/m/d') :''); ?>"/>
                                                                <?php $__errorArgs = ['ban_end_at'];
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

                                                <div class="form-group custom-switches-stacked">
                                                    <label class="custom-switch pl-0">
                                                        <input type="hidden" name="verified" value="0">
                                                        <input type="checkbox" name="verified" id="verified" value="1" <?php echo e((!empty($user) and $user->verified) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                        <span class="custom-switch-indicator"></span>
                                                        <label class="custom-switch-description mb-0 cursor-pointer" for="verified"><?php echo e(trans('admin/main.enable_blue_badge')); ?></label>
                                                    </label>
                                                </div>

                                                <div class=" mt-4">
                                                    <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane mt-3 fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <form action="/admin/users/<?php echo e($user->id .'/updateImage'); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>


                                                 <?php if($user->role->is_admin): ?>
                                                   <div class="form-group mt-15">
                                                    <label class="input-label"><?php echo e(trans('admin/main.avatar')); ?></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="input-group-text admin-file-manager" data-input="avatar" data-preview="holder">
                                                                <i class="fa fa-chevron-up"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" name="avatar" id="avatar" value="<?php echo e(!empty($user->avatar) ? $user->avatar : old('image_cover')); ?>" class="form-control"/>
                                                    </div>
                                                     <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.avatar_hint')); ?></div>
                                                </div>
                                                <?php endif; ?>

                                                <div class="form-group mt-15">
                                                    <label class="input-label"><?php echo e(trans('admin/main.cover_image')); ?></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="input-group-text admin-file-manager" data-input="cover_img" data-preview="holder">
                                                                <i class="fa fa-chevron-up"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" name="cover_img" id="cover_img" value="<?php echo e(!empty($user->cover_img) ? $user->cover_img : old('image_cover')); ?>" class="form-control"/>
                                                        <div class="input-group-append">
                                                            <button type="button" class="input-group-text admin-file-view" data-input="cover_img">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class=" mt-4">
                                                    <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane mt-3 fade" id="financial" role="tabpanel" aria-labelledby="financial-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <form action="/admin/users/<?php echo e($user->id .'/financialUpdate'); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>


                                                <div class="form-group">
                                                    <label><?php echo e(trans('financial.account_type')); ?></label>
                                                    <input type="text" name="account_type"
                                                           class="form-control "
                                                           value="<?php echo e(!empty($user) ? $user->account_type : old('account_type')); ?>"
                                                           placeholder="<?php echo e(trans('financial.account_type')); ?>"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo e(trans('financial.iban')); ?></label>
                                                    <input type="text" name="iban"
                                                           class="form-control "
                                                           value="<?php echo e(!empty($user) ? $user->iban : old('iban')); ?>"
                                                           placeholder="<?php echo e(trans('financial.iban')); ?>"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo e(trans('financial.account_id')); ?></label>
                                                    <input type="text" name="account_id"
                                                           class="form-control "
                                                           value="<?php echo e(!empty($user) ? $user->account_id : old('account_id')); ?>"
                                                           placeholder="<?php echo e(trans('financial.account_id')); ?>"/>
                                                </div>

                                                <div class="form-group mt-15">
                                                    <label class="input-label"><?php echo e(trans('financial.identity_scan')); ?></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="input-group-text admin-file-manager" data-input="identity_scan" data-preview="holder">
                                                                <i class="fa fa-chevron-up"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" name="identity_scan" id="identity_scan" value="<?php echo e(!empty($user->identity_scan) ? $user->identity_scan : old('identity_scan')); ?>" class="form-control"/>
                                                        <div class="input-group-append">
                                                            <button type="button" class="input-group-text admin-file-view" data-input="identity_scan">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo e(trans('financial.address')); ?></label>
                                                    <input type="text" name="address"
                                                           class="form-control "
                                                           value="<?php echo e(!empty($user) ? $user->address : old('address')); ?>"
                                                           placeholder="<?php echo e(trans('financial.address')); ?>"/>
                                                </div>

                                                <?php if(!$user->isUser()): ?>
                                                    <div class="form-group">
                                                        <label><?php echo e(trans('admin/main.user_commission')); ?> (%)</label>
                                                        <input type="text" name="commission"
                                                               class="form-control "
                                                               value="<?php echo e(!empty($user) ? $user->commission : old('commission')); ?>"
                                                               placeholder="<?php echo e(trans('admin/main.user_commission_placeholder')); ?>"/>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="form-group mb-0 d-flex">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" name="financial_approval" class="custom-control-input" id="verifySwitch" <?php echo e((($user->financial_approval) or (old('financial_approval') == 'on')) ? 'checked' : ''); ?>>
                                                        <label class="custom-control-label" for="verifySwitch"></label>
                                                    </div>
                                                    <label for="verifySwitch"><?php echo e(trans('admin/main.financial_approval')); ?></label>
                                                </div>

                                                <div class=" mt-4">
                                                    <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane mt-3 fade" id="occupations" role="tabpanel" aria-labelledby="occupations-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <form action="/admin/users/<?php echo e($user->id .'/occupationsUpdate'); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>


                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(!empty($category->subCategories) and count($category->subCategories)): ?>
                                                        <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="checkbox-button mr-15 mt-10">
                                                                <input type="checkbox" name="occupations[]" id="checkbox<?php echo e($subCategory->id); ?>" value="<?php echo e($subCategory->id); ?>" <?php if(!empty($occupations) and in_array($subCategory->id,$occupations)): ?> checked="checked" <?php endif; ?>>
                                                                <label for="checkbox<?php echo e($subCategory->id); ?>"><?php echo e($subCategory->title); ?></label>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <div class="checkbox-button mr-15 mt-10">
                                                            <input type="checkbox" name="occupations[]" id="checkbox<?php echo e($category->id); ?>" value="<?php echo e($category->id); ?>" <?php if(!empty($occupations) and in_array($category->id,$occupations)): ?> checked="checked" <?php endif; ?>>
                                                            <label for="checkbox<?php echo e($category->id); ?>"><?php echo e($category->title); ?></label>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <div class=" mt-4">
                                                    <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane mt-3 fade" id="badges" role="tabpanel" aria-labelledby="financial-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <form action="/admin/users/<?php echo e($user->id .'/badgesUpdate'); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>


                                                <div class="form-group">
                                                    <select name="badge_id" class="form-control <?php $__errorArgs = ['badge_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                        <option value=""><?php echo e(trans('admin/main.select_badge')); ?></option>

                                                        <?php $__currentLoopData = $badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($badge->id); ?>"><?php echo e($badge->title); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php $__errorArgs = ['badge_id'];
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

                                                <div class=" mt-4">
                                                    <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                                                </div>
                                            </form>

                                        </div>

                                        <div class="col-12">
                                            <div class="mt-5">
                                                <h5><?php echo e(trans('admin/main.custom_badges')); ?></h5>

                                                <div class="table-responsive mt-5">
                                                    <table class="table table-striped table-md">
                                                        <tr>
                                                            <th><?php echo e(trans('admin/main.title')); ?></th>
                                                            <th><?php echo e(trans('admin/main.image')); ?></th>
                                                            <th><?php echo e(trans('admin/main.condition')); ?></th>
                                                            <th><?php echo e(trans('admin/main.description')); ?></th>
                                                            <th class="text-center"><?php echo e(trans('admin/main.created_at')); ?></th>
                                                            <th><?php echo e(trans('admin/main.actions')); ?></th>
                                                        </tr>

                                                        <?php if(!empty($user->customBadges)): ?>
                                                            <?php $__currentLoopData = $user->customBadges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customBadge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                <?php
                                                                    $condition = json_decode($customBadge->badge->condition);
                                                                ?>

                                                                <tr>
                                                                    <td><?php echo e($customBadge->badge->title); ?></td>
                                                                    <td>
                                                                        <img src="<?php echo e($customBadge->badge->image); ?>" width="24"/>
                                                                    </td>
                                                                    <td><?php echo e($condition->from); ?> to <?php echo e($condition->to); ?></td>
                                                                    <td width="25%">
                                                                        <p><?php echo e($customBadge->badge->description); ?></p>
                                                                    </td>
                                                                    <td class="text-center"><?php echo e(dateTimeFormat($customBadge->badge->created_at,'d M Y')); ?></td>
                                                                    <td>
                                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                                                            <?php echo $__env->make('admin.includes.delete_button',['url' => '/admin/users/'.$user->id.'/deleteBadge/'.$customBadge->id , 'btnClass' => 'btn-sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="mt-5">
                                                <h5><?php echo e(trans('admin/main.auto_badges')); ?></h5>

                                                <div class="table-responsive mt-5">
                                                    <table class="table table-striped table-md">
                                                        <tr>
                                                            <th><?php echo e(trans('admin/main.title')); ?></th>
                                                            <th><?php echo e(trans('admin/main.image')); ?></th>
                                                            <th><?php echo e(trans('admin/main.condition')); ?></th>
                                                            <th><?php echo e(trans('admin/main.description')); ?></th>
                                                            <th><?php echo e(trans('admin/main.created_at')); ?></th>
                                                        </tr>

                                                        <?php if(!empty($userBadges)): ?>
                                                            <?php $__currentLoopData = $userBadges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $badgeCondition = json_decode($badge->condition);
                                                                ?>

                                                                <tr>
                                                                    <td><?php echo e($badge->title); ?></td>
                                                                    <td>
                                                                        <img src="<?php echo e($badge->image); ?>" width="24"/>
                                                                    </td>
                                                                    <td><?php echo e($badgeCondition->from); ?> to <?php echo e($badgeCondition->to); ?></td>
                                                                    <td width="25%">
                                                                        <p><?php echo e($badge->description); ?></p>
                                                                    </td>
                                                                    <td><?php echo e(dateTimeFormat($badge->created_at,'d M Y')); ?></td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php if(!empty($becomeInstructor)): ?>
                                    <div class="tab-pane mt-3 fade active show" id="become_instructor" role="tabpanel" aria-labelledby="become_instructor-tab">
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table">
                                                    <tr>
                                                        <td class="text-left"><?php echo e(trans('site.extra_information')); ?></td>
                                                        <td class="text-center"><?php echo e(trans('public.certificate_and_documents')); ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td width="80%" class="text-left"><?php echo e($becomeInstructor->description); ?></td>
                                                        <td class="text-center">
                                                            <?php if(!empty($becomeInstructor->certificate)): ?>
                                                                <a href="<?php echo e((strpos($becomeInstructor->certificate,'http') != false) ? $becomeInstructor->certificate : url($becomeInstructor->certificate)); ?>" target="_blank" class="btn btn-sm btn-success"><?php echo e(trans('admin/main.show')); ?></a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                </table>


                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                                 'url' => '/admin/users/become_instructors/'. $becomeInstructor->id .'/reject',
                                                                 'btnClass' => 'mt-3 btn btn-danger',
                                                                 'btnText' => trans('admin/main.reject_request'),
                                                                 'hideDefaultClass' => true
                                                                 ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                <a href="/admin/users/<?php echo e($user->id); ?>/acceptRequestToInstructor" class="btn btn-success ml-1 mt-3"><?php echo e(trans('admin/main.accept_request')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/user_edit.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/users/edit.blade.php ENDPATH**/ ?>