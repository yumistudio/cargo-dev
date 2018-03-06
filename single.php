<?php
/**
 * The template for displaying all posts
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();

while ( have_posts() ) : the_post();

$authorId = get_field('author');
if($authorId) {
	$current_user_posts = get_posts(array(
		'numberposts'	=> 3,
		'post_type'		=> 'post',
		'exclude'		=> get_the_ID(),
		'meta_key'	  	=> 'author',
		'meta_value'	=> $authorId,
		/*
		'meta_query'	=> array(
			//'relation'		=> 'AND',
			array(
				'key'	  	=> 'author',
				'value'	  	=> $authorId,
				'compare' 	=> '=',
			),
		),
		*/
	));
}
?>

<section id="maincontent" class="one-column-section blog-post">

	<div class="container-fluid section-wrap section-padding bg-lightgrey">
		
		<div class="col-xs-12 col-sm-3 col-md-offset-1 col-md-3">
			<h2>
				<span class="day"> <?php the_time('j<\s\up>S</\s\up> F <\b\r />Y'); ?></span>
			</h2>
			<?php if (has_post_thumbnail()) : ?>
				<div class="image-container round featured" style="background-image: url('<?php the_post_thumbnail_url()?>')"></div>
			<?php endif; ?>

			<hr class="separator">

			<div class="author">
				<?php
				
				if ($authorId && has_post_thumbnail($authorId)) {
					echo '<div class="round">';
					echo get_the_post_thumbnail($authorId, 'yumi-profile-size');
					echo '</div>';
				}
				
				?>
				Author:<br/>
				
				<strong>
				<?php echo get_field('first_name', $authorId) . ' ' . get_field('last_name', $authorId); ?>
				</strong>

				<?php
				
				if( !empty($current_user_posts)): ?>
				<ul>
					<?php foreach($current_user_posts as $post): ?>
						<li>
							<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						</li>
					<?php endforeach; wp_reset_postdata(); ?>
				</ul>
				<a class="dot-link" href="/blog/?by=<?php echo $authorId; ?>">View all <?php the_field('first_name', $authorId) ?>'s articles</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-7 entry-content">
			<?php the_content(); ?>

			<div class="author author-mob">

				<hr class="separator">

				<?php
				
				if ($authorId && has_post_thumbnail($authorId)) {
					echo '<div class="round">';
					echo get_the_post_thumbnail($authorId, 'yumi-profile-size');
					echo '</div>';
				}
				
				?>
				Author:<br/>
				
				<strong>
				<?php echo get_field('first_name', $authorId) . ' ' . get_field('last_name', $authorId); ?>
				</strong>

				<?php
				
				if( !empty($current_user_posts)): ?>
				<ul>
					<?php foreach($current_user_posts as $post): ?>
						<li>
							<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						</li>
					<?php endforeach; wp_reset_postdata(); ?>
				</ul>
				<a class="dot-link" href="/blog/?by=<?php echo $authorId; ?>">View all <?php the_field('first_name', $authorId) ?>'s articles</a>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="container-fluid section-padding">
		<?php if ($related_posts = get_field('related_posts')) : ?>
		<div class="col-xs-12 col-sm-offset-1 col-sm-3">
			<h2>Related Articles</h2>
		</div>
		<div class="col-xs-12 col-sm-7 simple-object-list related-articles">
			<?php
            foreach ($related_posts as $post) : global $post; ?>
            <div class="item table">
                <div class="item-title cell">
                    <?php echo twentyseventeen_get_svg(array('icon'=>'chevron')); ?>
                    <strong>
                    	<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?>
                    </strong>
                </div>
            </div>
            <?php endforeach; ?>
		</div>
		<?php endif; ?>
		<div class="col-xs-12 col-sm-offset-4 col-sm-7">
			<?php echo do_shortcode('[cta href="/blog/"]Back to blog[/cta]'); ?>
		</div>
	</div>
</section>
<script>
(function( $ ) {
    $(function() {
        // highlight services item in main navigation
        $('#top-navigation #menu-item-224').addClass('current-menu-ancestor hover');
    });
})( jQuery );
</script>

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
