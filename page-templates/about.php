<?php
/**
 * Template Name: O nas
 *
 * @package WordPress
 * @since vilicon 1.0
 */

get_header();

while ( have_posts() ) : the_post(); ?>
<section id="about-welcome" class="text-section pattern-section text-center cf divider-bottom padding-section">
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
<section id="about-deli" class="text-section pattern-section text-center cf divider-bottom padding-section">
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
	        
			<?php
			while ($query->have_posts()) : $query->the_post();
			$aterms = get_the_terms(get_the_ID(), 'artist_categories');
			?>
        	<div class="swiper-slide" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
				<div class="swiper-slide__wrapper">
					<div class="title">
						<h2><?php the_title(); ?></h2>
						<h3><?php if($aterms) foreach ($aterms as $cat) echo $cat->name; ?></h3>
					</div>
					<div class="hidden">
						<p><?php the_excerpt(); ?></p>
						<a href="#" class="btn" data-mfp-src="#popup-<?php the_ID(); ?>">Więcej</a>
					</div>
				</div>
				<div class="swiper-slide__overlay"></div>
				<div class="about-us-popup">
					<div id="popup-<?php the_ID(); ?>" class="black-popup max-width mfp-hide">
						<div class="black-popup__wrapper">
							<button title="Zamknij (Esc)" id="mfp-close" type="button" class="mfp-close"><i class="icon-close"></i></button>
							<div>
								<div class="table">
									<div class="cell img-wrap"><?php the_post_thumbnail('yumi-gallery-item'); ?></div>
									<div class="cell"><div class="content">
										<?php the_title('<h3>', '</h3>');
										foreach ($aterms as $cat) echo '<div class="category">'.$cat->name.'</div>';
										the_content(); ?>
									</div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        	<?php endwhile; wp_reset_postdata(); ?>
		</div>
		<div class="arrow-conatainer hidden-xs">
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
	      breakpoints: {
			1440: {
				slidesPerView: 5,
				spaceBetween: 30,
			},
			1200: {
				slidesPerView: 4,
				spaceBetween: 30,
			},
			1024: {
				slidesPerView: 3,
				spaceBetween: 30,
			},
			768: {
				slidesPerView: 2,
				spaceBetween: 10,
			},
			480: {
				slidesPerView: 1,
				spaceBetween: 10,
				}
			},
		  loop: true,
	      navigation: {
	        nextEl: '.swiper-nav-next',
	        prevEl: '.swiper-nav-prev',
	      },
	    });
	
        
		//var $contentElements = $('#artists-grid .content')

		var setUpNiceScroll = function() {
			var container = $(this.content.get()).find('.content');
			
			container.niceScroll({
				cursorcolor: '#ffe2a680',
				cursorborder: '1px solid #ffe2a680',
			});
			
			container.getNiceScroll().resize();
			//console.log(container.width() + ' / ' + container.height());
			//console.log(container.getNiceScroll());
	    }

        $('#home-people__carousel').magnificPopup({
			delegate: 'a.btn',
			disableOn: 700,
			type: 'inline',
			closeMarkup: '<button title="Zamknij (Esc)" type="button" class="mfp-close"><i class="icon-close"></i></button>',
			mainClass: 'mfp-fade about-us-popup',
			removalDelay: 160,
			gallery:{ 
				enabled:true,
				arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"><i class="icon-navigate-%dir%"></i></button>'
			},
			callbacks: {
			    open: setUpNiceScroll,
				change: setUpNiceScroll,
				buildControls: function() {
					this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
				}
			},
			/*
			preloader: false,
			fixedContentPos: false,
			*/
		});
	});
})(jQuery);
</script>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>