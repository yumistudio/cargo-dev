<?php
/**
 * Template Name: Events and Calendar
 *
 * @package WordPress
 * @since vilicon 1.0
 */


get_header();
?>
<div id="header" style="background-image: url('<?php echo get_the_post_thumbnail_url(87); ?>');">
	<div class="overlay"></div>
</div>

<section id="events-calendar" class="max-width">
<?php	
while ( have_posts() ) : the_post();

    get_template_part( 'template-parts/page/content', 'page' );

endwhile; // End of the loop.
?>

</section>

<?php get_footer(); ?>