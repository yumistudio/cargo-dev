<?php
/**
 * Template Name: Strona Galerii
 *
 * @package WordPress
 * @since vilicon 1.0
 */

$grid = array(
	0 => 'grid-item--height-reg',
	1 => 'grid-item--height-small',
	2 => 'grid-item--height-reg',
	3 => 'grid-item--height-small',
	4 => 'grid-item--height-small',
	5 => 'grid-item--height-reg',
	6 => 'grid-item--height-small',
	7 => 'grid-item--height-reg',
	8 => 'grid-item--height-small',
	9 => 'grid-item--height-reg',
	10 => 'grid-item--height-reg',
	11 => 'grid-item--height-small',
	12 => 'grid-item--height-small',
	13 => 'grid-item--height-reg',
	14 => 'grid-item--height-small',
	15 => 'grid-item--height-reg',
	16 => 'grid-item--height-small',
	17 => 'grid-item--height-reg',
	18 => 'grid-item--height-small',
	19 => 'grid-item--height-reg',
);

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

wp_enqueue_style( 'photoswipe-css', get_theme_file_uri( '/assets/js/photoswipe/dist/photoswipe.css' ) );
wp_enqueue_style( 'photoswipe-default-skin', get_theme_file_uri( '/assets/js/photoswipe/dist/default-skin/default-skin.css' ) );
wp_enqueue_script( 'photoswipe-main', get_theme_file_uri( '/assets/js/photoswipe/dist/photoswipe.min.js' ), array(), '', false );
wp_enqueue_script( 'photoswipe-ui', get_theme_file_uri( '/assets/js/photoswipe/dist/photoswipe-ui-default.min.js' ), array(), '', false );

get_header();

$args = array(
	'post_type' => 'post',
);

$query = new WP_Query($args);

$all_terms = array();
$i = 0;
foreach ($query->posts as $key => $post) {
	$terms = get_the_category($post->ID);
	foreach( $terms as $term ) {
		$all_terms[$term->slug] = $term->name;
	}
	$post->filter = $terms;
	$i++;
}
?>

<section id="gallery" class="padding-section pattern-section divider-bottom">
	<h1 class="text-dark text-center">Galeria</h1>
	<div class="btn-toolbar filters">
		<div data-toggle="buttons" class="btn-group">
			<label class="btn on">
				<input name="filter" value="*" checked="checked" type="radio">
				Wszystkie
			</label>
			<?php foreach ($all_terms as $slug => $name) : ?>
			<label class="btn on">
				<input name="filter" value="<?php echo $slug; ?>" type="radio">
				<?php echo $name; ?>
			</label>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="grid-wrap max-width">
		<div id="gallery-grid" class="grid photoswipe-wrapper images" itemscope itemtype="http://schema.org/ImageGallery">
			<?php $i=0; while ( $query->have_posts() ) : $query->the_post(); global $post;
				
				$classesStr = '';
				foreach ($post->filter as $term)
					$classesStr .= ' '.$term->slug;

				$attachment = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'yumi-full-hd');
				$width=$attachment[1];
				$height=$attachment[2];
			?>
	
			<div class="grid-item photoswipe-item <?php echo $widths[$i]; ?> <?php echo $heights[$i]; ?> <?php echo $classesStr; ?>">
				<a href="<?php echo $attachment[0]; ?>" data-size="<?php echo $width?>x<?php echo $height?>" style="background-image: url('<?php the_post_thumbnail_url('yumi-gallery-item'); ?>');">
					<div class="overlay"><i class="icon-search"></i></div>
				</a>
			</div>
			<?php $i++; endwhile; // End of the loop. ?>	
		</div>
	</div>

<?php get_template_part( 'template-parts/page/content', 'photoswipe' ); ?>

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
			$(this).parent().toggleClass('on');
			var value = $(this).val();
			if ( value != '*' ) value = '.' + value;
			$grid.isotope({ filter: value });
		});
	});
})(jQuery);
</script>
</section>
<?php get_footer(); ?>