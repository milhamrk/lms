<section class="mt-30">
    <h2 class="section-title after-line"><?php echo e(trans('site.identity_and_financial')); ?></h2>
    <div class="mt-15">
        <?php if($user->financial_approval): ?>
            <p class="font-14 text-primary"><?php echo e(trans('site.identity_and_financial_verified')); ?></p>
        <?php else: ?>
            <p class="font-14 text-danger"><?php echo e(trans('site.identity_and_financial_not_verified')); ?></p>
        <?php endif; ?>
    </div>

    <div class="row mt-20">
        <div class="col-12 col-lg-4">

            <div class="form-group">
                <label class="input-label"><?php echo e(trans('financial.select_account_type')); ?></label>
                <select name="account_type" class="form-control">
                    <option selected disabled><?php echo e(trans('financial.select_account_type')); ?></option>
                    <?php if(!empty(getOfflineBanksTitle()) and count(getOfflineBanksTitle())): ?> {
                        <?php $__currentLoopData = getOfflineBanksTitle(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accountType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($accountType); ?>" <?php if($user->account_type == $accountType): ?> selected <?php endif; ?>><?php echo e($accountType); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>

                <?php $__errorArgs = ['account'];
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
                <label class="input-label"><?php echo e(trans('financial.iban')); ?></label>
                <input type="text" name="iban" value="<?php echo e((!empty($user) and empty($new_user)) ? $user->iban : old('iban')); ?>" class="form-control <?php $__errorArgs = ['iban'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                <?php $__errorArgs = ['iban'];
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
                <label class="input-label"><?php echo e(trans('financial.account_id')); ?></label>
                <input type="text" name="account_id" value="<?php echo e((!empty($user) and empty($new_user)) ? $user->account_id : old('account_id')); ?>" class="form-control <?php $__errorArgs = ['account_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                <?php $__errorArgs = ['account_id'];
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
                <label class="input-label"><?php echo e(trans('financial.identity_scan')); ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text panel-file-manager" data-input="identity_scan" data-preview="holder">
                            <i data-feather="arrow-up" width="18" height="18" class="text-white"></i>
                        </button>
                    </div>
                    <input type="text" name="identity_scan" id="identity_scan" value="<?php echo e((!empty($user) and empty($new_user)) ? $user->identity_scan : old('identity_scan')); ?>" class="form-control <?php $__errorArgs = ['identity_scan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                    <?php $__errorArgs = ['identity_scan'];
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

            <div class="form-group">
                <label class="input-label"><?php echo e(trans('public.certificate_and_documents')); ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text panel-file-manager" data-input="certificate" data-preview="holder">
                            <i data-feather="arrow-up" width="18" height="18" class="text-white"></i>
                        </button>
                    </div>
                    <input type="text" name="certificate" id="certificate" value="<?php echo e((!empty($user) and empty($new_user)) ? $user->certificate : old('certificate')); ?>" class="form-control "/>
                </div>
            </div>

            <div class="form-group">
                <label class="input-label"><?php echo e(trans('financial.address')); ?></label>
                <input type="text" name="address" value="<?php echo e((!empty($user) and empty($new_user)) ? $user->address : old('address')); ?>" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                <?php $__errorArgs = ['address'];
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
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/web/default/panel/setting/setting_includes/identity_and_financial.blade.php ENDPATH**/ ?>