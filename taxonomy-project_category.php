<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage 
 * @since 1.0
 * @version 1.0
 */
$term = get_queried_object();
get_header(); ?>

<div id="header" class="" style="background-image: url('<?php echo wp_get_attachment_url(get_field('image', 'project_category_'.$term->term_id)); ?>');">
    <div class="headerInner">
        <div>
            <h1><?php echo $term->name; ?></h1>
        </div>
    </div>
</div>

<section id="content" class="container-fluid add-next-scroll">
<?php echo $term->description; ?>
</section>
<section class="headline-section bg-lightgrey">
	<h3>Projects</h3>
</section>
<?php
if ( have_posts() ) :?>
	<section class="objectList bg-white">
		<ul class="projects">
		<?php
		/* Start the Loop */
		$idx=0;
		while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/page/content', 'object-list' ); ?>
		<?php $i++; endwhile; ?>
		</ul>
	</section>
<?php endif; ?>
<?php get_footer();
