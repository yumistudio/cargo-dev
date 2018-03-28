<?php
/**
 * Template Name: Strona Oferty
 *
 * @package WordPress
 * @since vilicon 1.0
 */

wp_enqueue_script( 'parallax', get_theme_file_uri( '/assets/js/parallax.js-1.5.0/parallax.min.js' ), array(), '', true );
get_header();
while ( have_posts() ) : the_post(); ?>
<section class="text-section pattern-section text-center cf padding-section offer-meetings">
    <div class="cf text-center">
    <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-4 col-lg-4">
        <?php the_content(); ?>
        <a href="#" class="btn btn-secondary download" data-file-id="<?php the_field('offer_pdf'); ?>">
            Pobierz ofertę w PDF
        </a>
    </div>
    <div class="col-lg-offset-1 col-lg-2 offer-people-right">
        
    </div>
    </div>
</section>

<section class="text-section pattern-section text-center cf padding-section offer-spaces divider-bottom">
	<h1 class="text-dark">Przestrzenie w Cargo</h1>
	<div class="cf text-center">
        <div class="col-md-offset-1 col-md-2 offer-people-left">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/offer-person.svg" class="responsive-img" alt='people'/>
            <p>Aż do <span class="red">250</span> osób w możliwej opcji “standing party”.</p>
        </div>
    	<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-1 col-lg-4">
            <img src="<?php the_field('offer_plan'); ?>" class="responsive-img" alt='cargo spaces'/>
    	</div>
        <div class="col-lg-offset-1 col-lg-2 offer-people-right">
            <h2>120–150</h2>
            <h3>miejsc siedzących</h3>
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/offer-people.svg" class="responsive-img" alt='people'/>
        </div>
	</div>
</section>
<section class="offer-features padding-section">
    <div class="container cf">
        <div class="col-md-2 offer-features__feature">
            <i class="icon icon-parking"></i>
            <p>pobliski, przestronny parking</p>
        </div>
        <div class="col-md-2 offer-features__feature">
            <i class="icon icon-menu"></i>
            <p>indywidualny dobór menu</p>
        </div>
        <div class="col-md-2 offer-features__feature">
            <i class="icon icon-speaker"></i>
            <p>kompleksowe zaplecze audiowizualne</p>
        </div>
        <div class="col-md-2 offer-features__feature">
            <i class="icon icon-warning"></i>
            <p>dodatkowe atrakcje (np. degustacja win)</p>
        </div>
        <div class="col-md-2 offer-features__feature">
            <i class="icon icon-terrace"></i>
            <p>przestronny, przepiękny taras w sezonie letnim</p>
        </div>
        <div class="col-md-2 offer-features__feature">
            <i class="icon icon-wine-bottle"></i>
            <p>selekcja win przez sommeliera</p>
        </div>
    </div>
</section>
<section class="offer-compositions pattern-section text-center cf padding-section divider-top divider-black">
	<h1 class="text-dark">Przykładowe kompozycje</h1>
	<div class="cf text-center">
	<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-4 col-lg-4">
        <?php echo apply_filters('content', get_field('sample_sets_text')); ?>
    </div>
    <div class="max-width">
        <div id="home-people__carousel" class="swiper-container carousel-two">
            <?php if( have_rows('sample_sets') ):
            while ( have_rows('sample_sets') ) : the_row(); ?>
            <div class="fix-padding col-sm-6 col-md-4">
                <div class="swiper-slide" style="background-image: url(<?php the_sub_field('image'); ?>)">
                    <div class="swiper-slide__price-label">
                        od <span class="value"><?php the_sub_field('price'); ?></span>
                    </div>
                    <div class="swiper-slide__wrapper">
                        <div class="title">
                            <h2><?php the_sub_field('name'); ?></h2>
                            <h3><?php the_sub_field('description_1'); ?></h3>
                        </div>
                        <div class="hidden">
                            <p><?php the_sub_field('description_2'); ?></p>
                            <div class="col-xs-12">
                                <!--a href="#" class="btn">Więcej</a-->
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide__overlay"></div>
                </div>
            </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
    <div class="max-width">
        <div class="col-xs-12">
            <p class="p-outline">
                <?php the_field('sample_sets_bottom_text'); ?>
            </p>
        </div>
    </div>
    <div class="max-width text-center">
        <a href="#" class="btn btn-secondary download" data-file-id="<?php the_field('offer_pdf'); ?>">
            Pobierz ofertę w PDF
        </a>
    </div>
</div>
</section>
<section id="parallax-1" class="divider-top divider-black">
    <div class="parallaxed-window" data-parallax="scroll" data-image-src="<?php the_field('parallax_image'); ?>" style="min-height: 350px;">
    </div>
</section>
<section class="text-center offer-contact">
    <h1>Zapraszamy do kontaktu</h1>
	<div class="cf">
	<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        <?php the_field('contac_prompt_text'); ?>
        <div class="offer-contact__phone">      
            <a href="tel: <?php echo ot_get_option( 'phone' ); ?>"><i class="icon icon-phone-outline"></i><?php echo ot_get_option( 'phone' ); ?></a>
        </div>
	</div>
	</div>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>