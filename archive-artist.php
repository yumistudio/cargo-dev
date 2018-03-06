<?php

get_header();

$terms = get_terms( 'artist_categories', array(
    'hide_empty' => true,
));

set_query_var( 'placeholderPageId', 91 );
get_template_part( 'template-parts/page/content', 'header' );
?>
<section id="artists-list" class="section-padding max-width">
	
<div class="btn-toolbar filters">
	<div data-toggle="buttons" class="btn-group">
		<label class="btn on">
			<input type="radio" name="filter" value="*" checked="checked">
			Wszyscy
		</label>
		<?php foreach ($terms as $term) : ?>
		<label class="btn">
			<input type="radio" name="filter" value="<?php echo $term->slug; ?>">
			<?php echo $term->name; ?>
		</label>
		<?php endforeach; ?>
	</div>
</div>
<div class="container-fluid">
	<div id="artists-grid" class="row">
	<?php while ( have_posts() ) : the_post(); ?>
	<?php $aterms = get_the_terms(get_the_ID(), 'artist_categories'); ?>
	<div class="col-xs-12 col-sm-4 col-md-3 artist-item<?php foreach ($aterms as $t) echo ' '.$t->slug; ?>">
		<div class="artist-box">
			<div class="bg" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
			<div class="gradient-cover"></div>
			<div class="content">
				<h4><?php the_title(); ?></h4>
				<?php foreach ($aterms as $cat) echo '<div class="category">'.$cat->name.'</div>'; ?>
				<div class="excerpt">
					<?php the_excerpt(); ?>
				</div>
				
			</div>
		</div> 
	</div>
	<?php endwhile; // End of the loop.?>
	</div>
</div>
<script>
(function($) {
	
	var $grid = jQuery('#artists-grid');
	$grid.isotope({
	  // options
	  itemSelector: '.artist-item',
	  layoutMode: 'masonry'
	});

	$('.filters input').change(function() {
		$(this).parent().siblings().removeClass('on');
		$(this).parent().toggleClass('on');
		var value = $(this).val();
		if ( value != '*' ) value = '.' + value;
		$grid.isotope({ filter: value });
	});

})(jQuery);
</script>
</section>
<?php get_footer(); ?>