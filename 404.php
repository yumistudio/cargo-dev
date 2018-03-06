<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php
/**
 * The template for displaying all pages
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

?>
<section id="maincontent" class="one-column-section">

	<div class="container-fluid section-wrap section-padding bg-lightgrey">
		
		<div class="col-xs-12 col-sm-offset-1 col-sm-2">
			<h2>Ooops!</h2>

		</div>
		
		<div class="col-xs-12 col-sm-7">
			
			<h3>THAT PAGE CAN’T BE FOUND.</h3>
			It looks like nothing was found at this location.
		
		</div>
		
	</div>
	
</section>


<?php get_footer();
