<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function yumi_setup() {
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'yumi-profile-size', 100, 100, true );
	add_image_size( 'yumi-timepoint', 60, 60, true );
	add_image_size( 'yumi-gallery-item', 500, 0, true );
	add_image_size( 'yumi-full-hd', 1920, 1080, false );
	

	

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'yumi' ),
		'social' => __( 'Social Links Menu', 'yumi' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

}
add_action( 'after_setup_theme', 'yumi_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentyseventeen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'twentyseventeen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'twentyseventeen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	return ' &hellip; '	;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function yumi_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'yumi_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function yumi_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'yumi_pingback_header' );

/**
 * Enqueue scripts and styles.
 */
function yumi_scripts() {
	
	// Theme stylesheet.
	//wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
	//wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
	//wp_enqueue_style( 'slick', get_theme_file_uri( '/assets/js/slick/slick.css' ) );
	//wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array(), '3.6.6', true);
	wp_enqueue_script( 'yumi-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$twentyseventeen_l10n = array(
		'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'yumi-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '1.0', true );
		$twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	wp_enqueue_script( 'yumi-global-top', get_theme_file_uri( '/assets/js/global-top.js' ), array( 'jquery' ), '1.0', false );

	if(is_front_page()) {
		//wp_enqueue_script( 'instafeed', get_theme_file_uri( '/assets/js/instafeed.min.js' ), array(), '1.9.3', true );
	}

	wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/js/isotope.pkgd.min.js' ), array(), '', false );
	
	wp_enqueue_style( 'swiper', get_theme_file_uri( '/lib/swiper/dist/css/swiper.min.css' ) );
	wp_enqueue_script( 'swiper', get_theme_file_uri( '/lib/swiper/dist/js/swiper.min.js' ), array(), '', true );

	wp_enqueue_script( 'parallax', get_theme_file_uri( '/assets/js/parallax.js-1.5.0/parallax.min.js' ), array(), '', true );

	//wp_enqueue_script( 'nicescroll', get_theme_file_uri( '/assets/js/nicescroll/dist/jquery.nicescroll.js' ), array(), '', true );
	//wp_enqueue_script( 'visible', get_theme_file_uri( '/assets/js/jquery.visible.js' ), array(), '', true );
	//wp_enqueue_script( 'masonry1', get_theme_file_uri( '/assets/js/masonry.pkgd.js' ), array( 'jquery' ), '1.0', false );
	//wp_enqueue_script( 'mfMasonry', get_theme_file_uri( '/assets/js/multiple-filter-masonry/multipleFilterMasonry.js' ), array( 'jquery' ), '1.0', false );
	//wp_enqueue_script( 'mfMasonry1', get_theme_file_uri( '/assets/js/multiple-filter-masonry/main.js' ), array( 'jquery' ), '1.0', false );

	wp_enqueue_script( 'yumi-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_style( 'yumi-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yumi_scripts' );


/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function custom_excerpt_length( $length ) {
	return 800;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_post_our_people() {
	$labels = array(
		'name'               => _x( 'Nasz Zespół', 'post type general name' ),
		'singular_name'      => _x( 'Osoba', 'post type singular name' ),
		'add_new'            => _x( 'Nowy', 'Person' ),
		'add_new_item'       => __( 'Nowa Osoba' ),
		'edit_item'          => __( 'Edytuj' ),
		'new_item'           => __( 'Nowa Osoba' ),
		'all_items'          => __( 'Wszyscy' ),
		'view_item'          => __( 'Zobacz' ),
		'search_items'       => __( 'Search Persons' ),
		'not_found'          => __( 'No client found' ),
		'not_found_in_trash' => __( 'No client found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Nasz Zespół'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our people',
		'public'        => true,
		'menu_position' => 36,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'hierarchical'  => false,
		'has_archive'   => true,
		'rewrite' => array( 'slug' => 'nasz-zespol' ),
	);
	register_post_type( 'artist', $args );
}
add_action( 'init', 'custom_post_our_people' );
 
function custom_taxonomy_our_people_category() {
 
// Labels part for the GUI
 
	$labels = array(
		'name' => _x( 'Kategorie', 'taxonomy general name' ),
		'singular_name' => _x( 'Kategoria', 'taxonomy singular name' ),
		'search_items' =>  __( 'Szukaj' ),
		'popular_items' => __( 'Popularne' ),
		'all_items' => __( 'Wszystkie kategorie' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Role' ), 
		'update_item' => __( 'Update Role' ),
		'add_new_item' => __( 'Dodaj Kategorię' ),
		'new_item_name' => __( 'New Role Name' ),
		'separate_items_with_commas' => __( 'Separate roles with commas' ),
		'add_or_remove_items' => __( 'Add or remove roles' ),
		'choose_from_most_used' => __( 'Choose from the most used roles' ),
		'menu_name' => __( 'Roles' ),
	); 
 
// Now register the non-hierarchical taxonomy like tag
 
	register_taxonomy('artist_categories','artist',array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		//'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		//'rewrite' => array( 'slug' => 'per' ),
	));
}
add_action( 'init', 'custom_taxonomy_our_people_category', 0 );

function custom_post_menu_item() {
	$labels = array(
		'name'               => _x( 'Pozycje Menu', 'post type general name' ),
		'singular_name'      => _x( 'Pozycja', 'post type singular name' ),
		'add_new'            => _x( 'Nowy', 'Pzycja' ),
		'add_new_item'       => __( 'Nowa Pozycja' ),
		'edit_item'          => __( 'Edytuj' ),
		'new_item'           => __( 'Nowa Pozycja' ),
		'all_items'          => __( 'Wszystkie pozycje' ),
		'view_item'          => __( 'Zobacz' ),
		'search_items'       => __( 'Szukaj pozycji' ),
		'not_found'          => __( 'No client found' ),
		'not_found_in_trash' => __( 'No client found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Nasze Menu'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our artists',
		'public'        => true,
		'menu_position' => 37,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'hierarchical'  => false,
		'has_archive'   => true,
		//'rewrite' => array( 'slug' => 'artysci' ),
	);
	register_post_type( 'menu_item', $args );
}
add_action( 'init', 'custom_post_menu_item' );


function custom_post_gallery() {
	$labels = array(
		'name'               => _x( 'Nasi ludzie', 'post type general name' ),
		'singular_name'      => _x( 'Osoba', 'post type singular name' ),
		'add_new'            => _x( 'Nowy', 'Person' ),
		'add_new_item'       => __( 'Nowa Osoba' ),
		'edit_item'          => __( 'Edytuj' ),
		'new_item'           => __( 'Nowa Osoba' ),
		'all_items'          => __( 'Wszyscy' ),
		'view_item'          => __( 'Zobacz' ),
		'search_items'       => __( 'Search Persons' ),
		'not_found'          => __( 'No client found' ),
		'not_found_in_trash' => __( 'No client found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Nasi ludzie'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our people',
		'public'        => true,
		'menu_position' => 36,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'hierarchical'  => false,
		'has_archive'   => true,
		'rewrite' => array( 'slug' => 'nasz-zespol' ),
	);
	register_post_type( 'artist', $args );
}
add_action( 'init', 'custom_post_gallery' );

function wpb_disable_feed() {
	wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
}

add_action('do_feed', 'wpb_disable_feed', 1);
add_action('do_feed_rdf', 'wpb_disable_feed', 1);
add_action('do_feed_rss', 'wpb_disable_feed', 1);
add_action('do_feed_rss2', 'wpb_disable_feed', 1);
add_action('do_feed_atom', 'wpb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'wpb_disable_feed', 1);
add_action('do_feed_atom_comments', 'wpb_disable_feed', 1);

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
		return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
 
//add_action( 'wp', 'yumi_add_to_cart' );





/**
 * Add cart item data - date/time and nuber of people
 *
 * @param array $cart_item_data
 * @param int   $product_id
 * @param int   $variation_id
 *
 * @return array
 */
function yumi_add_item_to_cart_or_quote( $cart_item_data, $product_id, $variation_id ) {
	
	global $woocommerce;

	$date = filter_input( INPUT_POST, 'reservation_date' );
	$time = filter_input( INPUT_POST, 'reservation_time' );	
	
	if ($date) {

		$qty = filter_input( INPUT_POST, 'quantity' );

		$dt = DateTime::createFromFormat('Y-m-d H:i:s', $date.' '.$time.':00');
		$cart_item_data['reservation'] = date_i18n( 'd M Y @ H:i', date_timestamp_get($dt), false );
		$cart_item_data['qty'] = $qty;
	}

	return $cart_item_data;
}

add_filter( 'woocommerce_add_cart_item_data', 'yumi_add_item_to_cart_or_quote', 10, 3 );


/**
 * Display reservation data text in the cart.
 *
 * @param array $item_data
 * @param array $cart_item
 *
 * @return array
 */
function yumi_show_event_on_ticket_item_in_cart( $item_data, $cart_item ) {

	if ( $cart_item['reservation'] ) {
		$item_data[] = array(
			'key'     => __( 'Data i czas', 'yumi' ),
			'value'   => wc_clean($cart_item['reservation']),
			'display' => '',
		);
		if ($cart_item['qty']) 
			$item_data[] = array(
				'key'     => __( 'Liczba osób', 'yumi' ),
				'value'   => wc_clean($cart_item['qty']),
				'display' => '',
			);
	}
	return $item_data;
}
add_filter( 'woocommerce_get_item_data', 'yumi_show_event_on_ticket_item_in_cart', 10, 2 );

/**
 * Add reservation data text to order.
 *
 * @param WC_Order_Item_Product $item
 * @param string                $cart_item_key
 * @param array                 $values
 * @param WC_Order              $order
 */
function yumi_show_event_on_order_items( $item, $cart_item_key, $values, $order ) {

	if ( !empty( $values['reservation'] ) ) {
		$item->add_meta_data( __( 'Data i czas', 'yumi' ), $values['reservation'] );
		$item->add_meta_data( __( 'Liczba osób', 'yumi' ), $values['qty'] );
	}

}
add_action( 'woocommerce_checkout_create_order_line_item', 'yumi_show_event_on_order_items', 10, 4 );

/**
 * Remove unnecessary fields from the backend
 *
 * @param WC_Order_Item_Product $item
 * @param string                $cart_item_key
 * @param array                 $values
 * @param WC_Order              $order
 */
function wpb_custom_billing_fields( $fields = array() ) {
	unset($fields['billing_company']);
	unset($fields['billing_address_1']);
	unset($fields['billing_address_2']);
	unset($fields['billing_state']);
	unset($fields['billing_city']);
	unset($fields['billing_postcode']);
	unset($fields['billing_country']);
	//unset($fields['billing_phone']);
	return $fields;
}
add_filter('woocommerce_billing_fields','wpb_custom_billing_fields');

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );


if( !function_exists( 'yumi_ajax_add_to_quote' ) ) {
		/*
		 *  Add product to Quote List With Variables
		 * 
		 * @return array (1 => ok, 2 => duplicate, 0 => fail)
		*/
	function yumi_ajax_add_to_quote() {          

		WC_Adq()->quote->remove_all_quote_item();

		$product_id = filter_input( INPUT_POST, 'product-id' );
		
		$response = 0;
		$quantity = 1;

        // Add to cart validation
        $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );

        if ( $passed_validation ) {
                $response = WC_Adq()->quote->add_to_quote( $product_id, $quantity );
                if( !$response )  {
                    $message = StaticAdqQuoteRequest::get_error_notice($product_id, true);            
                    adq_add_notice( $message, 'error' ); 
                }
        }

		$messages = '';
		if( $response && get_option('adq_redirect_quote_page') === "show" ) {
						wc_clear_notices();

						$messages = sprintf(
										'<a href="%s" class="added_to_quote wc-forward">%s</a>',
										StaticAdqQuoteRequest::get_quote_list_link(),
										__( 'View Quote', 'woocommerce-quotation' )                        
						);
		}

		echo json_encode(array( "result" => $response, 'message' => $messages ));

		die;
	}
	add_action( 'wp_ajax_yumi_add_to_quote', 'yumi_ajax_add_to_quote' );
	add_action( 'wp_ajax_nopriv_yumi_add_to_quote', 'yumi_ajax_add_to_quote' );
}

/**
 * @param array      $array
 * @param int|string $position
 * @param mixed      $insert
 */
function array_insert(&$array, $position, $insert)
{
		if (is_int($position)) {
				array_splice($array, $position, 0, $insert);
		} else {
				$pos   = array_search($position, array_keys($array));
				$array = array_merge(
						array_slice($array, 0, $pos),
						$insert,
						array_slice($array, $pos)
				);
		}
}

function build_twocol_elem( $atts, $content ) {

	// split content into columns
	$columns = explode('[colsplit]', $content);

	$classStr = '';
	if (isset($atts['class'])) $classStr .= ' '.$atts['class'];
	if (is_array($atts) && in_array('carousel', $atts)) $classStr .= ' carousel';
	
	$output = 	'<div class="twoColumnGroup'.$classStr.'""><div class="column column-1">';

	$output .= do_shortcode($columns[0]);

	$output .= '</div><div class="column column-2 last">';

	$output .= do_shortcode($columns[1]);
	
	$output .= '</div></div>';

	return $output;
}
add_shortcode( 'twocol', 'build_twocol_elem' );

function build_button( $atts ) {
	
	if ($atts['filelink'])
		$output = '<a'.( $atts['id'] ? ' id="'.$atts['id'].'"' : '' ).
					' class="more-lnk '.$atts['class'].'" href="/download.php?file='.urldecode($atts['filelink']).'">'.$atts['text'].'</a>';
	//elseif ($atts['href']) 
	else
		$output = '<a'.( $atts['id'] ? ' id="'.$atts['id'].'"' : '' ).
					( $atts['newtab'] == 'true' ? ' target="_blank"' : '' ).
					' class="btn '.$atts['class'].'" href="'.$atts['href'].'">'.$atts['text'].'<span></span></a>';
	
	//else $output = '<a'.( $atts['id'] ? ' id="'.$atts['id'].'"' : '' ).' class="more-btn '.$atts['class'].'" href="'.$atts['href'].'">'.$atts['text'].'</a>';
	return $output;
}
add_shortcode( 'button', 'build_button' );

function get_featured_image( $atts ) {
	return '<img class="featured-image" src="'.get_the_post_thumbnail_url().'" />';
}
add_shortcode( 'featured_image', 'get_featured_image' );


function build_cta_button( $atts, $content ) {
	
	$output = '<a'.
			( $atts['id'] ? ' id="'.$atts['id'].'"' : '' ).
			( $atts['newtab'] == 'true' ? ' target="_blank"' : '' ).
			' class="cta'.( $atts['class'] ? ' '.$atts['class']: ' blue' ).'" href="'.$atts['href'].'">'.
			'<div></div><span>'.$content.'</span>'.
			twentyseventeen_get_svg(array('icon'=>'arrow-right')).
			'</a>';

	return $output;

}
add_shortcode( 'cta', 'build_cta_button' );

function get_sitemap( $atts, $content ) {
	wp_nav_menu( array(
									'theme_location' => 'top',
									'menu_id'        => 'sitemap',
									'menu_class'     => '',
									//'walker'         => 'My_Menu_Walker'
							) );
}
add_shortcode( 'sitemap', 'get_sitemap' );

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
		// Define the style_formats array
		$style_formats = array(  
				// Each array child is a format with it's own settings
				array(  
						'title' => 'More Link',  
						'selector' => 'a',  
						'classes' => 'dot-link'             
				),

				array(  
						'title' => 'Benefits List',  
						'selector' => 'ul',  
						'classes' => 'benefits'             
				)
		);  
		// Insert the array, JSON ENCODED, into 'style_formats'
		$init_array['style_formats'] = json_encode( $style_formats );  

		return $init_array;  

} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


function add_query_vars_filter( $vars ){
	$vars[] = "by";
	return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

add_action('pre_get_posts','add_author');
function add_author($query) {
	//gets the global query var object
	global $wp_query;

	
	if (get_query_var('by')) {
		$wp_query->set('meta_key', 'author');
		$wp_query->set('meta_value', get_query_var('by'));
	}

	if ( !$query->is_main_query() )
		return;
}


function add_load_more_scripts() {
 
	global $wp_query; 
	
	if(is_home() || is_archive()) { 
		
		// register our main script but do not enqueue it yet
		wp_register_script( 'yumi_loadmore', get_stylesheet_directory_uri() . '/assets/js/loadmore.js', array('jquery'), '', true );
		
		// now the most interesting part
		// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
		// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
		wp_localize_script( 'yumi_loadmore', 'yumi_loadmore_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
			'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
			'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
			'max_page' => $wp_query->max_num_pages
		) );
	 
		wp_enqueue_script( 'yumi_loadmore' );
	}
}
 
add_action( 'wp_enqueue_scripts', 'add_load_more_scripts' );

function yumi_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			// get_template_part( 'template-parts/post/content', get_post_format() );
			// for the test purposes comment the line above and uncomment the below one
			// the_title();
		?>
			<div class="item post table">
				<div class="item-image cell">
						<?php the_post_thumbnail('yumi-post-thumbnail'); ?>
				</div>
				<div class="item-title cell">
						<strong>
							<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						</strong>
				</div>
				<div class="item-title cell">
					<?php echo twentyseventeen_get_svg(array('icon'=>'chevron')); ?>
				</div>
			</div>
		
<?php 
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
add_action('wp_ajax_loadmore', 'yumi_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'yumi_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

function prefix_movie_rewrite_rule() {
    add_rewrite_rule( 'gallery/photo', 'index.php?post_type=tribe_events&photos=yes', 'top' );
    add_rewrite_rule( 'gallery/video', 'index.php?post_type=tribe_events&videos=yes', 'top' );
}
add_action( 'init', 'prefix_movie_rewrite_rule' );

function prefix_register_query_var( $vars ) {
    $vars[] = 'photos';
    $vars[] = 'videos';
 
    return $vars;
}
add_filter( 'query_vars', 'prefix_register_query_var' );

function prefix_url_rewrite_templates() {
 	
 	/*
    if ( get_query_var( 'photos' ) && is_singular( 'movie' ) ) {
        add_filter( 'template_include', function() {
            return get_template_directory() . '/single-movie-image.php';
        });
    }
 
    if ( get_query_var( 'videos' ) && is_singular( 'movie' ) ) {
        add_filter( 'template_include', function() {
            return get_template_directory() . '/single-movie-video.php';
        });
    }
    */

    if ( get_query_var( 'photos' ) && !is_singular( 'tribe_events' ) ) {
        add_filter( 'template_include', function() {
            return get_template_directory() . '/page-templates/event-gallery-image.php';
        });
    }
}
 
add_action( 'template_redirect', 'prefix_url_rewrite_templates' );

/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Twitter Bootstrap 2.3.2 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 1.4.5
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class wp_bootstrap_navwalker extends Walker_Nav_Menu {
	
	var $currentLvlItem;

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul id=\"{$this->currentLvlItem->post_name}\" class=\"list-unstyled collapse\">\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers & Headers
			 * ==================
		 * Determine whether the item is a Divider, Header, or regular menu item.
		 * To prevent errors we use the strcasecmp() function to so a comparison
		 * that is not case sensitive. The strcasecmp() function returns a 0 if 
		 * the strings are equal.
		 */
		if (strcasecmp($item->title, 'divider') == 0) {
			// Item is a Divider
			$output .= $indent . '<li class="divider">';
		} else if (strcasecmp($item->title, 'divider-vertical') == 0) {
			// Item is a Vertical Divider
			$output .= $indent . '<li class="divider-vertical">';
		} else if (strcasecmp($item->title, 'nav-header') == 0) {
			// Item is a Header
			$output .= $indent . '<li class="nav-header">' . esc_attr( $item->attr_title );
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			
			//If item has_children add dropdown class to li
			if($args->has_children) {
				//$class_names .= ' dropdown';
			}

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->title ) 	   ? $item->title 	   : '';
			$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
			$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';

			//If item has_children add atts to a
			if($args->has_children) {
				$atts['href']   	 = '#';
				//$atts['class']	 = 'dropdown-toggle';
				$atts['data-toggle'] = 'collapse';
				$atts['data-target'] = '#'.$item->post_name;
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$this->currentLvlItem = $item;

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;
		
			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */

			if(! empty( $item->attr_title )){
				$item_output .= '<a'. $attributes .'><i class="' . esc_attr( $item->attr_title ) . '"></i>&nbsp;';
			} else {
				$item_output .= '<a'. $attributes .'>';
			}
			
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ($args->has_children) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth. 
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */

	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
				if ( !$element ) {
						return;
				}

				$id_field = $this->db_fields['id'];

				//display this element
				if ( is_object( $args[0] ) ) {
					 $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
				}

				parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
		}
}

function ajax_download_attachment() {
		
		$file_path = get_attached_file( $_GET['id'] );
		$data['file_path'] = wp_get_attachment_url($_GET['id']);

		if ( preg_match('/\((iPad|iPhone); CPU OS (\d+(_\d+)?) like Mac OS X\)/i', $_SERVER['HTTP_USER_AGENT'], $matches) ) {
			$v = str_replace('_', '.', $matches[2]);
			if ($v < 8.4) {
				header('Location: ' . $data['file_path']);
				die();
			}
		}

		try{
				header('Pragma: public');   // required
				header('Expires: 0');       // no cache
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file_path)).' GMT');
				header('Cache-Control: private',false);
				header('Content-Type: application/download');
				header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
				header('Content-Transfer-Encoding: binary');
				header('Content-Length: '.filesize($file_path));    // provide file size
				header('Connection: close');
				set_time_limit(0);
				@readfile("$file_path") or die("File not found.");

		} catch(Exception $e) {
				$data['error'] = $e->getMessage() ." @ ". $e->getFile() .' - '. $e->getLine();
		}
		//echo json_encode($data);
		echo wp_get_attachment_url($_GET['id']);
		die();
}


if ( is_admin() ) {
		add_action( 'wp_ajax_download_attachment', 'ajax_download_attachment' );
		add_action( 'wp_ajax_nopriv_download_attachment', 'ajax_download_attachment' );
}

/**
	 * Event Title
	 *
	 * Return an event's title with pseudo-breadcrumb if on a category
	 *
	 * @param bool $depth include linked title
	 *
	 * @return string title
	 * @todo move logic to template classes
	 */
function yumi_get_events_title( $depth = true ) {
	global $wp_query;

	$events_label_plural = tribe_get_event_label_plural();

	if ( $wp_query->get( 'featured' ) ) {
		$events_label_plural = sprintf( _x( 'Featured %s', 'featured events title', 'the-events-calendar'), $events_label_plural );
	}

	$tribe_ecp = Tribe__Events__Main::instance();

	if ( is_single() && tribe_is_event() ) {
		// For single events, the event title itself is required
		$title = get_the_title();
	} else {
		// For all other cases, start with 'upcoming events'
		$title = sprintf( esc_html__( 'Upcoming %s', 'the-events-calendar' ), $events_label_plural );
	}

	// If there's a date selected in the tribe bar, show the date range of the currently showing events
	if ( isset( $_REQUEST['tribe-bar-date'] ) && $wp_query->have_posts() ) {
		$first_returned_date = tribe_get_start_date( $wp_query->posts[0], false, Tribe__Date_Utils::DBDATEFORMAT );
		$first_event_date    = tribe_get_start_date( $wp_query->posts[0], false );
		$last_event_date     = tribe_get_end_date( $wp_query->posts[ count( $wp_query->posts ) - 1 ], false );

		// If we are on page 1 then we may wish to use the *selected* start date in place of the
		// first returned event date
		if ( 1 == $wp_query->get( 'paged' ) && $_REQUEST['tribe-bar-date'] < $first_returned_date ) {
			$first_event_date = tribe_format_date( $_REQUEST['tribe-bar-date'], false );
		}

		$title = sprintf( __( '%1$s for %2$s - %3$s', 'the-events-calendar' ), $events_label_plural, $first_event_date, $last_event_date );
	} elseif ( tribe_is_past() ) {
		$title = sprintf( esc_html__( 'Past %s', 'the-events-calendar' ), $events_label_plural );
	}

	if ( tribe_is_month() ) {
		$title = sprintf(
			esc_html_x( '%2$s', 'month view', 'the-events-calendar' ),
			$events_label_plural,
			date_i18n( tribe_get_date_option( 'monthAndYearFormat', 'F Y' ), strtotime( tribe_get_month_view_date() ) )
		);
	}

	// day view title
	if ( tribe_is_day() ) {
		$title = sprintf(
			esc_html_x( '%1$s for %2$s', 'day_view', 'the-events-calendar' ),
			$events_label_plural,
			date_i18n( tribe_get_date_format( true ), strtotime( $wp_query->get( 'start_date' ) ) )
		);
	}

	if ( is_tax( $tribe_ecp->get_event_taxonomy() ) && $depth ) {
		$cat = get_queried_object();
		$title = '<a href="' . esc_url( tribe_get_events_link() ) . '">' . $title . '</a>';
		$title .= ' &#8250; ' . $cat->name;
	}

	/**
	 * Allows for customization of the "Events" page title.
	 *
	 * @param string $title The "Events" page title as it's been generated thus far.
	 * @param bool $depth Whether to include the linked title or not.
	 */
	return apply_filters( 'tribe_get_events_title', $title, $depth );
}

add_filter('tribe_events_title', 'yumi_get_events_title',10,1);




/**
	 * Display an html link to the previous month. Used in the month navigation.
	 *
	 * No link will be returned if the link is to a month that precedes any existing
	 * events.
	 *
	 * @uses tribe_get_previous_month_text()
	 **/
	function yumi_events_previous_month_link_add_icon( $html ) {
		if (empty($html))
			return '<span class="btn btn-nav inactive"><i class="icon-navigate-left"></i></span>';

		return preg_replace('/(<a[^>]*)>(.*)(<\/a>)/', '$1 class="btn btn-nav"><i class="icon-navigate-left"></i>$3', $html);
	}
	add_filter('tribe_events_the_previous_month_link', 'yumi_events_previous_month_link_add_icon', 1, 1);

	function yumi_events_next_month_link_add_icon( $html ) {
		if (empty($html))
			return '<span class="btn btn-nav inactive"><i class="icon-navigate-right"></i></span>';

		return preg_replace('/(<a[^>]*)>(.*)(<\/a>)/', '$1 class="btn btn-nav"><i class="icon-navigate-right"></i>$3', $html);
	}
	add_filter('tribe_events_the_next_month_link', 'yumi_events_next_month_link_add_icon', 1, 1);


	//Delete spans from WPCF7

	add_filter('wpcf7_form_elements', function($content) {
		$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
	
		return $content;
	});
?>