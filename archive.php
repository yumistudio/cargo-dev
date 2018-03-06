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
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php
global $wp_query;
$catargs = array(
	'show_option_all'    => 'Show All',
	'selected'           => get_query_var('cat'),
	'hierarchical'       => 0,
	'name'               => 'cat',
	'id'                 => '',
	'class'              => 'postform',
	'depth'              => 0,
	'tab_index'          => 0,
	'taxonomy'           => 'category',
	'hide_if_empty'      => false,
	'value_field'	     => 'term_id',
);

$authors = get_posts(array(
	'numberposts'	=> -1,
	'post_type'		=> 'person',
	'tax_query' => array(
        array(
	        'taxonomy' => 'roles',
	        'field' => 'term_id',
	        'terms' => 17,
        )
    )
));

/*
$args = array(
	'numberposts'	=> 10,
	'posts_per_page'=>10,
	'post_type'		=> 'post',
	'meta_key'	  	=> 'author',
	'meta_value'	=> get_query_var('author'),
	//'cat'			=> get_query_var('cat'), 
	'page'			=> get_query_var('page'),
);

$search = new WP_Query( $args );
*/

?>
<section id="maincontent" class="one-column-section">
	<div id="blue-box" class="text-white" style="height: auto;">
        <form id="blog-filter" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        	<div class="fld">
        		<div class="label">Categories:</div>
        		<div>
        		<?php wp_dropdown_categories( $catargs ); ?>
        		<?php echo twentyseventeen_get_svg(array('icon'=>'chevron')); ?>	
        		</div>
        	</div>
        	<div class="fld">
        		<div class="label">Authors:</div>
        		<div>
        		<select name="by">
        			<option value="0">All</option>
        			<?php
        			foreach($authors as $a) {
        				echo '<option value="'.$a->ID.'"'
        					.(get_query_var('by') == $a->ID ? ' selected':'' ).'>'
        					.get_field('first_name', $a->ID).' '.get_field('last_name', $a->ID)
        					.'</option>';
        			} ?>
        		</select>
        		</div>
        		<?php echo twentyseventeen_get_svg(array('icon'=>'chevron')); ?>
        	</div>
        	<a class="dot-link white-blue" href="/blog/">Clear Filters</a>
        </form>
    </div>
<?php
$i = 0;
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php if($i == 0) : ?>
	
	<div class="container-fluid section-wrap section-padding bg-lightgrey blog-list">
		<div class="col-xs-12 col-sm-offset-1 col-sm-3">
			<h2>Latest Article</h2>
			<?php if (has_post_thumbnail()) : ?>

				<div class="image-container round featured" style="background-image: url('<?php the_post_thumbnail_url()?>')"></div>
			<?php endif; ?>
		</div>
		<div class="col-xs-12 col-sm-7">
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>
			<?php echo do_shortcode('[cta href="'.get_permalink().'"]Tell me more[/cta]'); ?>
		</div>
	</div>
	
	<?php else : ?>
		<?php if($i == 1) : ?>
		<div class="container-fluid section-padding">
			<div class="col-xs-12 col-sm-offset-1 col-sm-3">
				<h2>Other Articles</h2>
			</div>
			<div class="col-xs-12 col-sm-7 simple-object-list">
		<?php endif; ?>
	            <div class="item post table">
	            	<div class="item-image cell">
	                	<?php the_post_thumbnail('yumi-post-thumbnail'); ?>
	                </div>
	                <div class="item-title cell">
	                    <strong>
	                    	<a href="<?php echo get_permalink(); ?>">
                    		<?php if ( has_post_thumbnail() )

                    			the_title();
                    		?>
                    		</a>
	                    </strong>
	                </div>
	                <div class="item-title cell">
	                    <?php echo twentyseventeen_get_svg(array('icon'=>'chevron')); ?>
	                </div>
	            </div>
	    <?php if($i == ($wp_query->post_count - 1)) : ?>        
	        </div>
		</div>
		<?php endif; ?>
	<?php endif; ?>
<?php $i++; endwhile; else: ?>

	<div class="container-fluid section-wrap section-padding bg-lightgrey blog-list">
		<div class="col-xs-12 col-sm-offset-1 col-sm-3"></div>
		<div class="col-xs-12 col-sm-7">
			<h2>Sorry!</h2>
			We haven't found any posts matching your criteria.
		</div>
<?php endif;?>
</section>

<?php get_footer();
