<div class="dropdown">
    <button type="button" <?php echo e((empty($userCarts) or count($userCarts) < 1) ? 'disabled' : ''); ?> class="btn btn-transparent dropdown-toggle" id="navbarShopingCart" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        <i data-feather="shopping-cart" width="20" height="20" class="mr-10"></i>

        <?php if(!empty($userCarts) and count($userCarts)): ?>
            <span class="badge badge-circle-primary d-flex align-items-center justify-content-center"><?php echo e(count($userCarts)); ?></span>
        <?php endif; ?>
    </button>

    <div class="dropdown-menu" aria-labelledby="navbarShopingCart">
        <div class="d-md-none border-bottom mb-20 pb-10 text-right">
            <i class="close-dropdown" data-feather="x" width="32" height="32" class="mr-10"></i>
        </div>
        <div class="h-100">
            <div class="navbar-shopping-cart h-100" data-simplebar>
                <?php if(!empty($userCarts) and !$userCarts->isEmpty()): ?>
                    <div class="mb-auto">
                        <?php $__currentLoopData = $userCarts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="navbar-cart-box d-flex align-items-center">
                                <?php
                                    $imgPath = '';

                                    if (!empty($cart->webinar_id)) {
                                        $imgPath = $cart->webinar->getImage();
                                    } elseif (!empty($cart->reserve_meeting_id)) {
                                        $imgPath = $cart->reserveMeeting->meeting->creator->getAvatar();
                                    }
                                ?>

                                <?php if(!empty($cart->webinar_id)): ?>
                                    <a href="<?php echo e($cart->webinar->getUrl()); ?>" target="_blank" class="navbar-cart-img">
                                        <img src="<?php echo e($imgPath); ?>" alt="product title" class="img-cover"/>
                                    </a>
                                    <div class="navbar-cart-info">
                                        <a href="<?php echo e($cart->webinar->getUrl()); ?>" target="_blank">
                                            <h4><?php echo e($cart->webinar->title); ?></h4>
                                        </a>
                                        <div class="price mt-10">
                                            <?php if($cart->webinar->getDiscount($cart->ticket) > 0): ?>
                                                <span class="text-primary font-weight-bold"><?php echo e($currency); ?><?php echo e(number_format($cart->webinar->price - $cart->webinar->getDiscount($cart->ticket), 2, ".", "") + 0); ?></span>
                                                <span class="off ml-15"><?php echo e($currency); ?><?php echo e(number_format($cart->webinar->price, 2, ".", "") + 0); ?></span>
                                            <?php else: ?>
                                                <span class="text-primary font-weight-bold"><?php echo e($currency); ?><?php echo e(number_format($cart->webinar->price, 2, ".", "") + 0); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                <?php else: ?>
                                    <div class="navbar-cart-img">
                                        <img src="<?php echo e($imgPath); ?>" alt="product title" class="img-cover"/>
                                    </div>

                                    <div class="navbar-cart-info">
                                        <?php if(!empty($cart->reserve_meeting_id)): ?>
                                            <h4><?php echo e(trans('meeting.reservation_appointment')); ?></h4>
                                        <?php endif; ?>

                                        <div class="price mt-10">
                                            <span class="text-primary font-weight-bold">
                                                <?php echo e($currency); ?>

                                                <?php if(!empty($cart->reserve_meeting_id)): ?>
                                                    <?php echo e($cart->reserveMeeting->meeting->amount); ?>

                                                <?php endif; ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="navbar-cart-actions">
                        <div class="navbar-cart-total mt-15 border-top d-flex align-items-center justify-content-between">
                            <strong class="total-text"><?php echo e(trans('cart.total')); ?></strong>
                            <strong class="text-primary font-weight-bold"><?php echo e($currency); ?><?php echo e(!empty($totalCartsPrice) ? number_format($totalCartsPrice, 2, ".", "") + 0 : 0); ?></strong>
                        </div>

                        <a href="/cart/" class="btn btn-sm btn-primary btn-block mt-50 mt-md-15"><?php echo e(trans('cart.go_to_cart')); ?></a>
                    </div>
                <?php else: ?>
                    <div class="d-flex align-items-center text-center py-50">
                        <i data-feather="shopping-cart" width="20" height="20" class="mr-10"></i>
                        <span class=""><?php echo e(trans('cart.your_cart_empty')); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/web/default/includes/shopping-cart-dropdwon.blade.php ENDPATH**/ ?>