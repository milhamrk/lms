<div class="stars-card d-flex align-items-center <?php echo e($className ?? ' mt-15'); ?>">
    <?php
        $i = 5;
    ?>
    <?php while(--$i >= 5 - $rate): ?>
        <i data-feather="star" width="20" height="20" class="active"></i>
    <?php endwhile; ?>
    <?php while($i-- >= 0): ?>
        <i data-feather="star" width="20" height="20" class=""></i>
    <?php endwhile; ?>

    <?php if(empty($dontShowRate) or !$dontShowRate): ?>
        <span class="badge badge-primary ml-10"><?php echo e($rate); ?></span>
    <?php endif; ?>

</div>
<?php /**PATH /var/www/vhosts/web.sahabatguru.com/httpdocs/resources/views/web/default/includes/webinar/rate.blade.php ENDPATH**/ ?>