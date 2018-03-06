<?php
/**
 * Template Name: Strona Kontakt
 *
 * @package WordPress
 * @since vilicon 1.0
 */


get_header();

global $post;
?>
<section id="contact" class="cf padding-section">
    <div class="container">
        <div class="col-sm-5 col-md-3 no-gutters">
            <h2>Informacje</h2>
            <div class="info">
                <div class="info__icon">
                    <i class="icon icon-map-outline"></i>
                </div>
                <div class="info__text">
                    <?php echo str_replace("\r\n", '<br />', ot_get_option( 'address' )); ?>
                </div>
            </div>
            <div class="info">
                <div class="info__icon">
                    <i class="icon icon-phone-outline"></i>
                </div>
                <div class="info__text">
                    <?php echo ot_get_option( 'phone' ); ?>
                </div>
            </div>
            <div class="info">
                <div class="info__icon">
                    <i class="icon icon-mail-outline"></i>
                </div>
                <div class="info__text">
                    <a href="<?php echo ot_get_option( 'email' ); ?>"><?php echo ot_get_option( 'email' ); ?></a>
                </div>
            </div>

            <div class="social">
                <ul>
                    <li><a href="<?php echo ot_get_option( 'facebook_link' ); ?>" target="_blank"><i class="icon icon-social-facebook"></i></a></li>
                    <li><a href="<?php echo ot_get_option( 'instagram_link' ); ?>" target="_blank"><i class="icon icon-social-instagram"></i></a></li>
                    <li><a href="<?php echo ot_get_option( 'trip_advisor_link' ); ?>" target="_blank"><i class="icon icon-social-tripadvisor"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="col-sm-5 col-md-3 col-sm-offset-1 no-gutters hidden-md hidden-lg">
            <h2>Godziny otwarcia</h2>
            <div class="col-xs-6 no-gutters mr-top">
                <div class="info">
                    <div class="info__icon">
                        <i class="icon icon-clock-outline"></i>
                    </div>
                    <div class="info__text">
                    <?php foreach(explode("\n", ot_get_option( 'openning_hours' )) as $item) :
                        $lineArr = explode('|', $item);
                    ?>
                        <?php echo $lineArr[0]. '</br>'; ?>
                    <?php endforeach; ?>   
                    </div>
                </div>
            </div>
            <div class="col-xs-6 no-gutters mr-top mr-bottom">
                <div class="info">
                    <div class="info__text pull-right">
                        <?php foreach(explode("\n", ot_get_option( 'openning_hours' )) as $item) :
                            $lineArr = explode('|', $item);
                        ?>
                        <strong><?php echo $lineArr[1]. '</br>'; ?></strong>
                        <?php endforeach; ?>   
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-1 col-lg-4 no-gutters hidden-xs hidden-sm">
            <h2>Napisz do nas</h2>
            <?php echo do_shortcode('[contact-form-7 id="31" title="Contact form 1"]'); ?>
        </div>

        <div class="col-sm-12 no-gutters hidden-md hidden-lg">
            <h2>Napisz do nas</h2>
            <?php echo do_shortcode('[contact-form-7 id="31" title="Contact form 1"]'); ?>
        </div>                    

        <div class="col-sm-5 col-md-3 col-lg-3 col-lg-offset-1 no-gutters hidden-xs hidden-sm">
            <h2>Godziny otwarcia</h2>
        
            <div class="col-md-6 no-gutters mr-top">
                <div class="info">
                    <div class="info__icon">
                        <i class="icon icon-clock-outline"></i>
                    </div>
                    <div class="info__text">
                    <?php foreach(explode("\n", ot_get_option( 'openning_hours' )) as $item) :
                        $lineArr = explode('|', $item);
                    ?>
                        <?php echo $lineArr[0]. '</br>'; ?>
                    <?php endforeach; ?>   
                    </div>
                </div>
            </div>
            <div class="col-md-6 no-gutters mr-top">
                <div class="info">
                    <div class="info__text pull-right">
                        <?php foreach(explode("\n", ot_get_option( 'openning_hours' )) as $item) :
                            $lineArr = explode('|', $item);
                        ?>
                        <strong><?php echo $lineArr[1]. '</br>'; ?></strong>
                        <?php endforeach; ?>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_template_part( 'template-parts/page/content', 'reservation' ); ?>
<?php get_footer(); ?>