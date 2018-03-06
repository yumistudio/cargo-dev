
<?php
/**
 * Template Name: Strona Menu
 *
 * @package WordPress
 * @since vilicon 1.0
 */
get_header();
while ( have_posts() ) : the_post(); ?>
<section id="menu-flavors" class="text-section pattern-section text-center cf padding-section">
	<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
		<?php the_content(); ?>
		<a href="#" class="btn btn-secondary-outline download" data-file-id="<?php the_field('menu_ala_carte') ?>">Zobacz Menu a’la carte</a>
		<a href="#" class="btn btn-secondary-outline download" data-file-id="<?php the_field('wine_card') ?>">Zobacz kartę win</a>
	</div>
</section>

<section class="photo-carousel-section">
<div class="photo-carousel-1 swiper-container">
    <div class="swiper-wrapper">
		<?php $gallery = get_field('item_gallery');
		foreach ( $gallery as $image ) : ?>
    	<div class="swiper-slide col-md-3" style="background-image: url('<?php echo $image['sizes']['yumi-gallery-item']; ?>');">
		</div>
    	<?php endforeach; ?>
	</div>
	<div class="max-width hidden-xs">
		<div class="swiper-nav-prev-1"><i class="icon-navigate-left"></i></div>
		<div class="swiper-nav-next-1"><i class="icon-navigate-right"></i></div>
	</div>
  </div>

<!-- Initialize Swiper -->
<script>
(function($) {
	$(function() {
		var swiper = new Swiper('.photo-carousel-1', {
			slidesPerView: 6,
			spaceBetween: 30,
			breakpoints: {
			1024: {
				slidesPerView: 4,
				spaceBetween: 30,
			},
			768: {
				slidesPerView: 3,
				spaceBetween: 30,
			},
			480: {
				slidesPerView: 1,
				spaceBetween: 10,
				}
			},
			centeredSlides: true,
			loop: true,
			autoplay: true,
			navigation: {
				nextEl: '.swiper-nav-next-1',
				prevEl: '.swiper-nav-prev-1',
			},
	    });

		var slides = $('.swiper-slide');
		slides.css("height", slides.width()+60);
		window.addEventListener('resize', () => { 
			var slides = $('.swiper-slide');
			slides.css("height", slides.width()+60);
		});
	});
})(jQuery);
</script>
</section>

<section id="menu-deli" class="text-section pattern-section text-center cf padding-section">
	<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        <?php echo apply_filters('the_content', get_field('content_2')); ?>
		<a href="/oferta/" class="btn btn-secondary-outline">Poznaj ofertę</a>
	</div>
</section>

<section class="padding-section photo-carousel-section">
<div class="photo-carousel-2 swiper-container">
    <div class="swiper-wrapper">
		<?php $gallery = get_field('item_gallery_2');
		foreach ( $gallery as $image ) : ?>
    	<div class="swiper-slide col-md-3" style="background-image: url('<?php echo $image['sizes']['yumi-gallery-item']; ?>');">
		</div>
    	<?php endforeach; ?>
	</div>
	<div class="max-width hidden-xs">
		<div class="swiper-nav-prev-2"><i class="icon-navigate-left"></i></div>
		<div class="swiper-nav-next-2"><i class="icon-navigate-right"></i></div>
	</div>
  </div>

<script>
(function($) {
	$(document).ready(function() {
		var swiper = new Swiper('.photo-carousel-2', {
			slidesPerView: 6,
			spaceBetween: 30,
			breakpoints: {
			1024: {
				slidesPerView: 4,
				spaceBetween: 30,
			},
			768: {
				slidesPerView: 3,
				spaceBetween: 30,
			},
			480: {
				slidesPerView: 1,
				spaceBetween: 10,
				}
			},
			centeredSlides: true,
			loop: true,
			autoplay: true,
			navigation: {
				nextEl: '.swiper-nav-next-2',
				prevEl: '.swiper-nav-prev-2',
			},
	    });
	});
})(jQuery);
</script>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>