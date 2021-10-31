<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo e(trans('auth.admin_login_title')); ?></title>

    <!-- General CSS File -->
    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/admin/vendor/fontawesome/css/all.min.css"/>

    <link rel="stylesheet" href="/assets/admin/css/style.css">
    <link rel="stylesheet" href="/assets/admin/css/components.css">
</head>
<body>

<div id="app">
    <?php
        $siteGeneralSettings = getGeneralSettings();
        $getPageBackgroundSettings = getPageBackgroundSettings();

    ?>

    <section class="section">
        <div class="d-flex flex-wrap align-items-stretch">
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                <div class="p-4 m-3">
                    <img src="<?php echo e($siteGeneralSettings['logo'] ?? ''); ?>" alt="logo" width="40%" class="mb-5 mt-2">

                    <h4 class="text-dark font-weight-normal"><?php echo e(trans('auth.welcome')); ?> <span class="font-weight-bold"><?php echo e($siteGeneralSettings['site_name'] ?? ''); ?> <?php echo e(trans('auth.admin_panel')); ?></span></h4>

                    <p class="text-muted"><?php echo e(trans('auth.admin_tagline')); ?></p>

                    <form method="POST" action="<?php echo e(url('/admin/login')); ?>" class="needs-validation" novalidate="">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div class="form-group">
                            <label for="email"><?php echo e(trans('auth.email')); ?></label>
                            <input id="email" type="email" value="<?php echo e(old('email')); ?>" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="email" tabindex="1"
                                   required autofocus>
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
                            <div class="d-block">
                                <label for="password" class="control-label"><?php echo e(trans('auth.password')); ?></label>
                            </div>
                            <input id="password" type="password" class="form-control  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="password" tabindex="2" required>
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
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                       id="remember-me">
                                <label class="custom-control-label"
                                       for="remember-me"><?php echo e(trans('auth.remember_me')); ?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                <?php echo e(trans('auth.login')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>

          <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?php echo e($getPageBackgroundSettings['admin_login'] ?? ''); ?>">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-2 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Rocket LMS</h1>
                <h5 class="font-weight-normal text-muted-transparent">fully-featured educational platform</h5>
              </div>
              All rights reserved for <a class="text-light bb" target="_blank" href="https://codecanyon.net/user/rocketsoft">Rocket Soft</a> on <a class="text-light bb" target="_blank" href="https://codecanyon.net/collections/10821267-rocket-lms-full-package">Codecanyon</a>
            </div>
          </div>
            </div>
          
        </div>
    </section>
</div>
<!-- General JS Scripts -->
<script src="/assets/admin/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="/assets/admin/vendor/poper/popper.min.js"></script>
<script src="/assets/admin/vendor/bootstrap/bootstrap.min.js"></script>
<script src="/assets/admin/vendor/nicescroll/jquery.nicescroll.min.js"></script>
<script src="/assets/admin/vendor/moment/moment.min.js"></script>
<script src="/assets/admin/js/stisla.js"></script>


<!-- Template JS File -->
<script src="/assets/admin/js/scripts.js"></script>
<script src="/assets/admin/js/custom.js"></script>

</body>
</html>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>