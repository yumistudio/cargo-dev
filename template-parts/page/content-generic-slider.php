<?php if( have_rows('slides') ): ?>
<div id="bottom-slider-section" class="section-padding">
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-offset-1 col-sm-11 col-lg-10">
			<h2>Services we offer</h2>
		</div>
	</div>
	<div class="slider-controller col-xs-hidden">
		<div class="col-xs-12 col-sm-9 col-lg-offset-1 col-md-9">
			<div class="controller">
				<?php while ( have_rows('slides') ) : the_row(); ?>
					<div class="item">
						<div class="item-active"><?php the_sub_field('title'); ?></div>
						<span><?php the_sub_field('title'); ?></span>
					</div>
				<?php endwhile; ?>
			</div>	
			<div class="side-cover"></div>
			<div class="side-cover right"></div>
		</div>
		<div class="col-sm-3 col-lg-2">
			<div class="swiper-navi">
				<div class="swiper-button-next">
			    	<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-long')); ?>
			    </div>
			    <div class="swiper-button-prev">
			    	<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-long')); ?>
			    </div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="col-xs-12 col-lg-offset-1 col-lg-9">
			<div id="objects-swiper" class="swiper-container">
				<div class="swiper-wrapper">
					<?php while ( have_rows('slides') ) : the_row(); ?>
						<div class="swiper-slide">
							<div class="swiper-slide-wrap">
								<div>
									<div class="image" style="background-image: url('<?php echo wp_get_attachment_url(get_sub_field('image')); ?>');"></div>
								</div>
								<div class="content">
									<p><?php the_sub_field('text'); ?></p>
									<a class="dot-link" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('link_text'); ?></a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
(function( $ ) {
	$(function() {

		$('#objects-swiper').equalBoxes('.swiper-slide .content');

		var slider = new Swiper('#objects-swiper', {
		 	slidesPerView : 'auto',
	      	loop : false,
	      	effect: 'fade',
	      	spaceBetween: 5,
	      	speed : 800,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			fadeEffect: {
			    crossFade: true
			},
		});

		boundSliderAndController(slider, '.controller');
	});
})( jQuery );
</script>

<?php endif; ?>
