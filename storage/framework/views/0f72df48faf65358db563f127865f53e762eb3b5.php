<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php if(!empty(session()->has('msg'))): ?>
            <div class="alert alert-info alert-dismissible fade show mt-30" role="alert">
                <?php echo e(session()->get('msg')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="row login-container">
			<?php if(1==0): ?>
            <div class="col-12 col-md-6 pl-0">
                <img src="<?php echo e(getPageBackgroundSettings('login')); ?>" class="img-cover" alt="Login">
            </div>
			<?php endif; ?>
            <div class="col-12 col-md-12 text-center">
                <div class="login-card">
                    <h1 class="font-20 font-weight-bold"><?php echo e(trans('auth.login_h1')); ?></h1>
					<?php if(1==0): ?>
                    <form method="Post" action="/login" class="mt-35">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div class="form-group">
                            <label class="input-label" for="username"><?php echo e(trans('auth.email_or_mobile')); ?>:</label>
                            <input name="username" type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="username"
                                   value="<?php echo e(old('username')); ?>" aria-describedby="emailHelp">
                            <?php $__errorArgs = ['username'];
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
                            <label class="input-label" for="password"><?php echo e(trans('auth.password')); ?>:</label>
                            <input name="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" aria-describedby="passwordHelp">

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

                        <button type="submit" class="btn btn-primary btn-block mt-20"><?php echo e(trans('auth.login')); ?></button>
                    </form>

                    <div class="text-center mt-20">
                        <span class="badge badge-circle-gray300 text-secondary d-inline-flex align-items-center justify-content-center"><?php echo e(trans('auth.or')); ?></span>
                    </div>
					
					<?php endif; ?>

                    <a href="/google" target="_blank" class="social-login mt-20 p-10 text-center d-flex align-items-center justify-content-center">
                        <img src="/assets/default/img/auth/google.svg" class="mr-auto" alt=" google svg"/>
                        <span class="flex-grow-1"><?php echo e(trans('auth.google_login')); ?></span>
                    </a>
					
					<a href="/google" target="_blank" class="social-login mt-20 p-10 text-center d-flex align-items-center justify-content-center">
                        <img src="/assets/default/img/auth/google.svg" class="mr-auto" alt=" google svg"/>
                        <span class="flex-grow-1">Masuk dengan akun Belajar</span>
                    </a>
					<?php if(1==0): ?>
                    <a href="<?php echo e(url('/facebook/redirect')); ?>" target="_blank" class="social-login mt-20 p-10 text-center d-flex align-items-center justify-content-center ">
                        <img src="/assets/default/img/auth/facebook.svg" class="mr-auto" alt="facebook svg"/>
                        <span class="flex-grow-1"><?php echo e(trans('auth.facebook_login')); ?></span>
                    </a>
					<?php endif; ?>
                    <div class="mt-30 text-center">
                        <a href="/forget-password" target="_blank"><?php echo e(trans('auth.forget_your_password')); ?></a>
                    </div>

                    <div class="mt-20 text-center">
                        <span><?php echo e(trans('auth.dont_have_account')); ?></span>
                        <a href="/register" class="text-secondary font-weight-bold"><?php echo e(trans('auth.signup')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/web/default/auth/login.blade.php ENDPATH**/ ?>