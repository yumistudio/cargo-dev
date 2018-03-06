<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if (is_single()) :
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1 col-sm-2 col-xs-3">
					<div class="date-box pt10">
			            <span class="day"> <?php the_time('d'); ?></span><br>
			            <span class="month"><?php the_time('M'); ?></span><br/>
			            <span class="year"><?php the_time('Y'); ?></span>
			        </div>
			    </div>
			    <div class="col-md-11 col-sm-10 col-xs-9">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
			</div>
		</div>
	</header><!-- .entry-header -->
	<div class="entry-content">
		
			
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'vilicom' ),
					get_the_title()
				) );
			?>
			
		
		
		<?php
			/*
			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'vilicom' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
			*/
		?>

	</div>
	<?php
		// twentyseventeen_entry_footer();
	?>
</article><!-- #post-## -->
<?php else: ?>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

<?php endif; ?>


