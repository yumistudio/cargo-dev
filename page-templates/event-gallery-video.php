<?php
/**
 * Template Name: Events and Calendar
 *
 * @package WordPress
 * @since vilicon 1.0
 */

set_query_var( 'placeholderPageId', 351 );
get_header();
get_template_part( 'template-parts/page/content', 'header' );

$args = array(
	'post_type' => 'tribe_events',
	'meta_query' => array(
		array(
			'key' => 'video_gallery',
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
			<a class="btn" href="/galeria/foto/">Zdjęcia</a>
		</div>
		<div class="col-xs-12 col-sm-6">
			<a class="btn on" href="/galeria/video/">Video</a>
		</div>
	</div>
</section>
<section id="gallery" class="max-width">
	
	<div id="gallery-grid" class="grid photoswipe-wrapper video">


<?php 
	$i=0;
	while ( $query->have_posts() ) : $query->the_post(); 
		global $post;
		
		$gallery = get_field('video_gallery');
		$dt = DateTime::createFromFormat('Y-m-d H:i:s', $post->EventStartDate);


if( have_rows('video_gallery') ):
     while ( have_rows('video_gallery') ) : the_row();

     	if (get_sub_field('embed_code') == '' )
     		continue;

     	$image = get_sub_field('teaser_image');
     	$o = explode("\r\n", $obj);
		$v = array_pop($o);
		$t = array_pop($o); 
		$r = '56.25%';
		?>
        <div class="col-xs-12 col-sm-6 col-md-4 grid-item video">
			<a data-date="" title="<?php the_title(); ?>" href="<?php the_sub_field('embed_code'); ?>" style="background-image: url('<?php echo $image['sizes']['yumi-video-thumbnal']; ?>');">
				<div class="gradient-cover"></div>
				<i class="icon-play"></i>
				<div class="overlay"></div>
				<div class="tile-title">
					<span class="date"><?php echo date_i18n( 'l, d M Y', date_timestamp_get($dt), false ); ?></span>
					<span class="title"><?php echo the_title(); ?></span>
				</div>
			</a>
		</div>
	<?php 
	endwhile;
endif;?>

<?php endwhile; ?>
	</div>
<?php get_template_part( 'template-parts/page/content', 'photoswipe' ); ?>
</section>

<script>
(function($) {
	$(document).ready(function() {
        $('#gallery-grid').magnificPopup({
			delegate: 'a',
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false,
			
			iframe: {
				markup: '<div class="mfp-iframe-scaler">'+
							'<div class="mfp-title"></div>'+
				            '<div class="mfp-close"></div>'+
				            '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
				        '</div>',
			},

			callbacks: {
		    	markupParse: function(template, values, item) {

		     		values.title = '<h4>' + item.el.attr('title') + '</h4>' +
		     						'<span class="date">'+item.el.find('.date').text()+'</span>'; 
		    	},
		  	},
		  	closeMarkup: '<button title="Close (Esc)" type="button" class="mfp-close"><i class="icon-close"></i></button>'
        });
	});
})(jQuery);
</script>

<?php get_footer(); ?>
