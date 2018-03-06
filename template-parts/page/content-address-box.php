<div class="item">
    <i class="icon icon-map-placeholder"></i>
    <div>
        <strong>Scena54</strong><br />
        <?php echo str_replace("\r\n", '<br />', ot_get_option( 'addresss' )); ?>
    </div>
</div>
<br />
<div class="item">
    <i class="icon icon-phone"></i>
    <?php echo ot_get_option( 'phone' ); ?>
</div>
<br />
<div class="item">
    <i class="icon icon-mail"></i>
    <a href="<?php echo ot_get_option( 'email' ); ?>"><?php echo ot_get_option( 'email' ); ?></a>
</div>
