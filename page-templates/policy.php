<?php
/**
 * Template Name: Single Policy
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

<div id="header" class="" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
    <div class="headerInner container-fluid">
        <div>
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div>

<div class="container-fluid">
	<h2><?php the_field('policy_name'); ?></h2>
</div>

<section id="textcontent" class="certificate"><div id="textcontentInner">
	<div id="maincontent" class="container-fluid">
		<?php
		while ( have_posts() ) : the_post();

			the_content();

		endwhile; // End of the loop.
		?>
	</div>
	<div id="rightcolumn" class="">

		<?php
		$file = get_attached_file(get_field('svg_file'));
		if ($file && $fcontent = file_get_contents($file)) {
			echo $fcontent;
		}
		?>

		<a href="#" data-file-id="<?php the_field('pdf') ?>" class="download-lnk download">
			<?php echo twentyseventeen_get_svg(array('icon'=>'download')); ?>
			<span><?php
				if ($text = get_field('button_text')) echo $text;
			 	else echo 'Download ' . get_the_title();
			?></span>
		</a>
	</div>
</section>

<?php get_footer(); ?>


