<?php
/**
 * Template Name: Events and Calendar
 *
 * @package WordPress
 * @since vilicon 1.0
 */

$grid = array(
	0 => 'grid-item--height-small',
	1 => 'grid-item--height-reg',
	2 => 'grid-item--height-small',
	3 => 'grid-item--height-big',
	4 => 'grid-item--height-small',
	5 => 'grid-item--height-reg',
	6 => 'grid-item--height-small',
	7 => 'grid-item--height-reg',
	8 => 'grid-item--height-small',
	9 => 'grid-item--height-small',
	10 => 'grid-item--height-reg',
	11 => 'grid-item--height-reg',
	12 => 'grid-item--height-small',
	13 => 'grid-item--height-reg',
	14 => 'grid-item--height-big',
	15 => 'grid-item--height-small',
	16 => 'grid-item--height-reg',
	17 => 'grid-item--height-small',
	18 => 'grid-item--height-small',
);

set_query_var( 'placeholderPageId', 351 );
get_header();
get_template_part( 'template-parts/page/content', 'header' );
//print_r($wp_query->posts);

$args = array(
	'post_type' => 'tribe_events',
	'meta_query' => array(
		array(
			'key' => 'image_gallery',
			'value' => array(''),
			'compare' => 'NOT IN',
		),
	),
);

$query = new WP_Query($args);

?>

<section class="section-padding">
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-6 aright">
			<a class="btn on" href="/galeria/foto/">Zdjęcia</a>
		</div>
		<div class="col-xs-12 col-sm-6">
			<a class="btn" href="/galeria/video/">Video</a>
		</div>
	</div>
</section>
<section id="gallery" class="">
	
	<div id="gallery-grid" class="grid image">


<?php 
	$i=0;
	while ( $query->have_posts() ) : $query->the_post(); 
		global $post;
		
		$gallery = get_field('image_gallery');
		$dt = DateTime::createFromFormat('Y-m-d H:i:s', $post->EventStartDate);
?>

	<div class="grid-item">
		<a href="<?php echo get_permalink(get_the_ID()).'/foto/' ; ?>" class="<?php echo $grid[$i]; ?>" style="background-image: url('<?php echo $gallery[0]['sizes']['yumi-gallery-item']; ?>');">
			<div class="gradient-cover"></div>
			<div class="overlay"></div>
			<div class="tile-title">
				<span class="date"><?php echo date_i18n( 'l, d M Y', date_timestamp_get($dt), false ); ?></span>
				<span class="title"><?php echo the_title(); ?></span>
			</div>
		<?php // get_template_part( 'template-parts/page/content', 'gallery' ); ?>
		</a>
	</div>

<?php $i++; endwhile; // End of the loop. ?>
	</div>

<script>
(function($) {
	
	var $grid = jQuery('#gallery-grid');
	$grid.isotope({
	  // options
	  itemSelector: '.grid-item',
	  layoutMode: 'masonry'
	});

})(jQuery);
</script>
</section>

<?php get_footer(); ?>
