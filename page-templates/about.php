<?php
/**
 * Template Name: O nas
 *
 * @package WordPress
 * @since vilicon 1.0
 */

get_header();

while ( have_posts() ) : the_post(); ?>
<section class="text-section pattern-section text-center cf divider-black padding-section">
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-4 col-lg-4">
		<?php the_content(); ?>
		</div>
	</div>
</section>
<section id="parallax-1" class="divider-top divider-black">
    <div class="parallaxed-window" data-parallax="scroll" data-image-src="<?php the_field('parallax_1'); ?>" style="min-height: 350px;">
    </div>
</section>
<section class="text-section pattern-section text-center cf divider-black padding-section">
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-4 col-lg-4">
		<?php echo apply_filters('content', get_field('extra_content')); ?>
		</div>
	</div>
</section>
<section id="parallax-1" class="divider-top divider-black">
    <div class="parallaxed-window" data-parallax="scroll" data-image-src="<?php the_field('parallax_2'); ?>" style="min-height: 350px;">
    </div>
</section>
<section id="home-people" class="padding-section divider-top">
	<div class="section-header">
		<h1 class="text-dark"><span>Nasz zespół</span></h1>
		<div class="section-intro"></div>
	</div>
	<div id="home-people__carousel" class="swiper-container carousel-one">
		<div class="swiper-wrapper">
			<?php $query = new WP_Query( array('post_type' => 'artist', 'posts_per_page' => -1, ) ); ?>    
	        
			<?php while ($query->have_posts()) : $query->the_post(); ?>
        	<div class="swiper-slide" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
				<div class="swiper-slide__wrapper">
					<div class="title">
						<h2><?php the_title(); ?></h2>
						<h3><?php foreach (get_the_terms(get_the_ID(), 'artist_categories') as $cat) echo $cat->name; ?></h3>
					</div>
					<div class="hidden">
						<p><?php the_excerpt(); ?></p>
						<a href="#" class="btn">Więcej</a>
					</div>
					
				</div>
				<div class="swiper-slide__overlay"></div>
			</div>
        	<?php endwhile; wp_reset_postdata(); ?>
		</div>
		<div class="max-width">
			<div class="swiper-nav-prev"><i class="icon-navigate-left"></i></div>
			<div class="swiper-nav-next"><i class="icon-navigate-right"></i></div>
		</div>
  </div>
  <!-- Initialize Swiper -->
<script>
(function($) {
	$(document).ready(function() {		
		var swiper = new Swiper('#home-people__carousel', {
	      slidesPerView: 6,
	      spaceBetween: 30,
	      centeredSlides: true,
		  loop: true,
	      navigation: {
	        nextEl: '.swiper-nav-next',
	        prevEl: '.swiper-nav-prev',
	      },
	    });
	});
})(jQuery);
</script>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>