<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header();

?>
<section id="primary" class="section-padding max-width">
	
	<div id="primary" class="container-fluid">

		<div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/page/content', 'page' );

		// End the loop.
		endwhile;
		?>
		</div>
	</div>
	<div  class="container-fluid">	
		<?php if ($scattered_elements = get_field('scattered_elements')) : ?>
		<div class="section-padding scattered-blocks">
			
			<div class="section-title frame-box">
				<div>
					<h2><?php the_field('scattered_section_title') ?></h2>
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-offset-3 col-sm-9 scattered-rows">
			<?php $i = 0; foreach( $scattered_elements as $row ) : ?>
				<div class="scattered-row row">
					<div class="col-xs-12 col-sm-4 image-holder" style="background-image: url('<?php echo $row['url']; ?>')"></div>
					<div class="col-xs-12 col-sm-offset-4 <?php echo ($i % 2 ? 'col-sm-6' : 'col-sm-7'); ?> content">
						<h3><?php echo $row['title']; ?></h3>
						<p><?php echo $row['description']; ?></p>
					</div>
				</div>

			<?php $i++; endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
	</div><!-- .content-area -->
</section>
<?php get_footer(); ?>
