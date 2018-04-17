<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section id="meetcargo" class="pattern-section text-center cf divider-top divider-black padding-section">
	<h1 class="text-dark">Poznaj Cargo</h1>
	<div class="cf text-md text-center">
	<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
		<?php the_content(); ?>

		<a href="<?php echo get_permalink('89'); ?>" class="btn btn-secondary-outline btn-sm">Dowiedz się więcej</a>
	</div>
	</div>
</section>
<?php endwhile; ?>

<section id="recommend" class="padding-section">
	<h1 class="text-center">Szczególnie polecamy</h1>
	<div class="container">
		<div class="cards">

			<div class="card">
				<div class="card-inner">
					<h2 class="text-dark text-center">Menu a'la carte</h2>
					<?php if( have_rows('menu_ala_carte') ):
						while ( have_rows('menu_ala_carte') ) : the_row(); ?>
					<div class="card-row">
						<div class="card-row__container">
							<div class="title"><?php the_sub_field('name'); ?></div>
							<div class="price">
								<?php the_sub_field('cena'); ?>
								<?php if( get_sub_field('measure_unit') ) : ?> <span class="sub"> <?php the_sub_field('measure_unit'); ?></span><?php endif; ?>
							</div>
						</div>
						<?php if( get_sub_field('ingredients') ) : ?><div class="card-row__disc"><?php the_sub_field('ingredients'); ?></div><?php endif; ?>
					</div>
					<?php endwhile; endif; ?>
					<div class="card-button">
						<a href="#" class="btn btn-secondary-outline download" data-file-id="<?php the_field('menu_ala_carte', 95) ?>">Zobacz pełne menu</a>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-inner">
					<h2 class="text-dark text-center">Karta Win</h2>
					<?php if( have_rows('wine_card') ):
						while ( have_rows('wine_card') ) : the_row(); ?>
					<div class="card-row">
						<div class="card-row__container">
							<div class="title"><?php the_sub_field('name'); ?></div>
							<div class="price">
								<?php the_sub_field('cena'); ?>
								<?php if( get_sub_field('measure_unit') ) : ?> <span class="sub"> / <?php the_sub_field('measure_unit'); ?></span><?php endif; ?>
							</div>
						</div>
						<?php if( get_sub_field('ingredients') ) : ?><div class="card-row__disc"><?php the_sub_field('ingredients'); ?></div><?php endif; ?>
					</div>
					<?php endwhile; endif; ?>
					<div class="card-button">
						<a href="#" class="btn btn-secondary-outline download" data-file-id="<?php the_field('wine_card', 95) ?>">Zobacz kartę win</a>
					</div>
				</div>
			</div>
			<div class="card hidden-md">
				<div class="card-inner">
					<h2 class="text-dark text-center">DELIkatesy</h2>
					<?php if( have_rows('deli') ):
						while ( have_rows('deli') ) : the_row(); ?>
					<div class="card-row">
						<div class="card-row__container">
							<div class="title"><?php the_sub_field('name'); ?></div>
							<div class="price">
								<?php the_sub_field('cena'); ?>
								<?php if( get_sub_field('measure_unit') ) : ?> <span class="sub"> / <?php the_sub_field('measure_unit'); ?></span><?php endif; ?>
							</div>
						</div>
						<?php if( get_sub_field('ingredients') ) : ?><div class="card-row__disc"><?php the_sub_field('ingredients'); ?></div><?php endif; ?>
					</div>
					<?php endwhile; endif; ?>
					<div class="card-button">
						<a href="<?php echo get_permalink(97); ?>" class="btn btn-secondary-outline">Zobacz pełną ofertę</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="home-people" class="padding-section divider-top divider-black">
	<div class="section-header">
		<h1 class="text-dark"><span>Nasz zespół</span></h1>
		<div class="section-intro"></div>
	</div>
	<div id="home-people__carousel" class="swiper-container carousel-one">
		<div class="swiper-wrapper">
			<?php $query = new WP_Query( array('post_type' => 'artist', 'posts_per_page' => -1, ) ); ?>    
	        
			<?php while ($query->have_posts()) : $query->the_post(); 
				$aterms = get_the_terms(get_the_ID(), 'artist_categories');
			?>
        	<div class="swiper-slide" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
				<div class="swiper-slide__wrapper">
					<div class="title">
						<h2><?php the_title(); ?></h2>
						<h3><?php if($aterms) foreach ($aterms as $cat) echo $cat->name; ?></h3>
					</div>
					<div class="hidden">
						<?php the_excerpt(); ?>
						<div class="col-xs-12">
							<a href="#" class="btn" data-mfp-src="#popup-<?php the_ID(); ?>">Więcej</a>
						</div>
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
	      spaceBetween: 30,
		  slidesPerView: 6,
		  //centeredSlides: true,
		  loop: true,
	      //loopAdditionalSlides: 6,
		  //loopedSlides: 2,
		  breakpoints: {
			1440: { slidesPerView: 5 },
			1200: { slidesPerView: 4 },
			1024: { slidesPerView: 3 },
			768: { slidesPerView: 2 },
			480: { slidesPerView: 1 }
			},
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
		});
	});
})(jQuery);
</script>

</section>

<section id="gallery" class="padding-section pattern-section divider-bottom">
	<h1 class="text-dark text-center">Galeria</h1>

<?php
$heights = array(
	0 => 'grid-item--height-reg',
	1 => 'grid-item--height-small',
	2 => 'grid-item--height-reg',
	3 => 'grid-item--height-reg',
	4 => 'grid-item--height-small',
	5 => 'grid-item--height-small',
	6 => 'grid-item--height-small',
);
$widths = array(
	0 => '',
	1 => 'grid-item--width-double',
	2 => '',
	3 => '',
	4 => '',
	6 => '',
	5 => 'grid-item--width-double',
);

$gallery = array_slice(get_field('gallery'), 0, 7);
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 7
);

$query = new WP_Query($args);

$all_terms = array();

foreach ($gallery as $key => $image) {
	if ( $term = get_field('kategoria', $image['ID']))
		$all_terms[$term->slug] = $term->name;

	$gallery[$key]['term'] = $term;
}

/*
$i = 0;
foreach ($query->posts as $key => $post) {
	$terms = get_the_category($post->ID);
	foreach( $terms as $term ) {
		$all_terms[$term->slug] = $term->name;
	}
	$post->filter = $terms;
	$i++;
}
*/
?>
	<div class="btn-toolbar filters">
		<div data-toggle="buttons" class="btn-group">
			<label class="btn on">
				<input name="filter" value="*" checked="checked" type="radio">
				Wszystkie
			</label>
			<?php foreach ($all_terms as $slug => $name) : ?>
			<label class="btn">
				<input name="filter" value="<?php echo $slug; ?>" type="radio">
				<?php echo $name; ?>
			</label>
			<?php endforeach; ?>
		</div>
	</div>	
	
	<div class="grid-wrap max-width">
		<div id="gallery-grid" class="grid image photoswipe-wrapper">
			<?php foreach ($gallery as $key => $image) : //print_r($image); ?>
			<div class="grid-item photoswipe-item <?php echo $widths[($key % 7)]; ?> <?php echo $heights[($key % 7)]; ?> <?php echo $image['term']->slug; ?>">
				<a href="<?php echo $image['sizes']['yumi-gallery-item']; ?>" data-size="<?php echo $image['sizes']['yumi-gallery-item-width']; ?>x<?php echo $image['sizes']['yumi-gallery-item-height']; ?>" class="" style="background-image: url('<?php echo $image['sizes']['yumi-gallery-item']; ?>');">
					<div class="overlay"><i class="icon-search"></i></div>
				</a>
	
			</div>
			<?php endforeach; // End of the loop. ?>
		</div>
		<div class="cf text-md text-center">
			<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-4 col-lg-4">
				<a href="<?php echo get_permalink('351'); ?>" class="btn btn-secondary-outline btn-sm">Otwórz galerię</a>
			</div>
		</div>
	</div>
	
<script>
(function($) {
	$(document).ready(function() {
		var $grid = jQuery('#gallery-grid');
		$grid.isotope({
		  // options
		  itemSelector: '.grid-item',
		  layoutMode: 'masonry'
		});

		$('.filters input').change(function() {
			$(this).parent().siblings().removeClass('on');
			$(this).parent().addClass('on');
			var value = $(this).val();
			if ( value != '*' ) value = '.' + value;
			$grid.isotope({ filter: value });
		});
	});
})(jQuery);
</script>
</section>

<section id="home-reservation" class="divider-black" style="">
	<div class="container-fluid max-width">
		<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-lg-offset-2 col-lg-8 section-padding">
			<div class="section-header">
				<h1>Zarezerwuj stolik</h1>
			</div>
			<div class="content text-center">
				<p>Nie czekaj i już dzisiaj rozkoszuj się naszymi</br>wspaniałymi daniami na miejscu.</p>
			</div>
			<div id="home-reservation__cta" class="text-center">
				<a class="phone" href="tel: 12 686 55 22"><i class="icon icon-phone-outline"></i>12 686 55 22</a>
				<div class="or">lub</div>
				<a href="/rezerwacja/" class="btn btn-primary">Zarezerwuj online</a>
			</div>
		</div>
	</div>
</section>

<section id="home-insta" class="padding-section pattern-section divider-black">
<script src="https://cdnjs.cloudflare.com/ajax/libs/instafeed.js/1.4.1/instafeed.min.js"></script>
<div id="home-insta__carousel" class="swiper-container">
    <div id="instafeed" class="swiper-wrapper">

<script type="text/javascript">
var userFeed = new Instafeed({
	get: 'user',
	userId: '4954726935', //6246393452 //302456276897634
	clientId: 'b4fc2fae461d4791b301103c0c8d5717',
	accessToken: '4954726935.1677ed0.c8af13437cbe48a9aefe5c1f57007e53',
	resolution: 'low_resolution',
	template: '<div class="swiper-slide col-md-3"><a href="{{link}}" target="_blank" id="{{id}}" style="background-image: url(\'{{image}}\')"><div class="overlay"><i class="icon-social-instagram"></div></i></a></div>',
	sortBy: 'most-recent',
	limit: 12,
	links: false
});
userFeed.run();
</script>

	</div>
 </div>
<script>
(function($) {
	$(function() {	
		var swiper = new Swiper('#home-insta__carousel', {
	      slidesPerView: 6,
	      spaceBetween: 30,
	      centeredSlides: true,
		  loop: true,
		  autoplay: true,
	    });
	});

//   function fixDiv() {
//     var $cache = $('#res-btn');
//     if ($(window).scrollTop() > 100)
//       $cache.css({
//         'position': 'fixed',
//         'bottom': '30px',
// 		'right' : '30px',
//       });
//     else
//       $cache.css({
//         'position': 'relative',
//         'bottom': '0px',
// 		'right' : '0px',
//       });
//   }
//   $(window).scroll(fixDiv);
//   fixDiv();

})(jQuery);
</script>  	
</section>

<section id="home-map" class="divider-black-top">
	
	<div class="address-box">
		<div class="address-box-inner">
			<div class="item">
				<h3 class="here">Tu jesteśmy</h3>
				<p>
					<?php echo nl2br(ot_get_option( 'address' )); ?>
				</p>
				<a href="<?php echo ot_get_option( 'drive_directions' ); ?>" target="_blank" class="btn">Wskazówki dojazdu</a>
			</div>
			<div class="item">
				<h3 class="open">Godziny otwarcia</h3>
				<?php foreach(explode("\n", ot_get_option( 'openning_hours' )) as $item) :
					$lineArr = explode('|', $item);
				?>
				<div class="col-xs-6 text-right">
					<span class="day"><?php echo $lineArr[0]; ?></span>
				</div>
				<div class="col-xs-6 text-left">
					<span class="hours"><?php echo $lineArr[1]; ?></span>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<div id="map"></div>
	<script src="http://maps.google.com/maps/api/js?callback=initMap&key=AIzaSyDXcNi-nVvlUfUoLtC66RGtWCSxZnZKyVs" async=""></script>
<script>
	var getMapCenter = function() {
		   
	    if( screen.width > 767 )
	        return {lat: 50.064806, lng: 19.927};
	    else
	        return {lat: 50.064806, lng: 19.926007};
	}
	<?php get_template_part( 'template-parts/page/content', 'google-map' ); ?>
	</script>
</section>



<?php get_template_part( 'template-parts/page/content', 'photoswipe' ); ?>
<?php get_footer();
