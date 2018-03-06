<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<?php

wp_head();

$subtitle = get_field('page_subtitle');
?>

</head>

<body <?php body_class(); ?>>
    <div id="ajax-loader">
        <svg width="40px"  height="40px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-dual-ring" style="background: none;"><circle cx="50" cy="50" ng-attr-r="{{config.radius}}" ng-attr-stroke-width="{{config.width}}" ng-attr-stroke="{{config.stroke}}" ng-attr-stroke-dasharray="{{config.dasharray}}" fill="none" stroke-linecap="round" r="40" stroke-width="3" stroke="#ffe2a6" stroke-dasharray="62.83185307179586 62.83185307179586" transform="rotate(155 50 50)"><animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;360 50 50" keyTimes="0;1" dur="1.2s" begin="0s" repeatCount="indefinite"></animateTransform></circle></svg>
    </div>
    <div id="outer-wrap">
        
        <header style="background-image: url('<?php the_post_thumbnail_url(); ?>');" <?php if ( get_page_template_slug() == "page-templates/reservation.php") : ?>id="reservation-header" class="divider-black"<?php elseif ( is_front_page() == TRUE ) : ?>id="homepage-header"<?php else : ?>id="page-header" class="divider-black"<?php endif; ?>>
            
            <div id="main-navigation" class="">

                <div id="sticky-navigation" class="">

                    <div id="menu-mobile" class="hidden-lg hidden-md">
                        <nav>
                            <?php wp_nav_menu( array(
                                'menu'           => 'top-menu-left' ,
                                'menu_class'     => '',
                            ) ); ?>
                            <?php wp_nav_menu( array(
                                'menu'           => 'top-menu-right' ,
                                'menu_class'     => '',
                            ) ); ?>
                        </nav>
                    </div>
                
                    <div id="main-nav" class="container">
                    <div class="row">
                        <div id="main-nav__left" class="col-md-5 text-right no-gutters">
                            <nav>
                                <?php wp_nav_menu( array(
                                    //'theme_location' => 'top',
                                    'menu'           => 'top-menu-left',
                                    //'menu_id'        => 'sticky-menu',
                                    'menu_class'     => 'navigation',
                                ) ); ?>
                            </nav>
                            </div>
                        <div id="main-nav__logo" class="col-md-2">
                            <a href="<?php echo get_site_url(); ?>"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/assets/images/logo-cargo-nav-white.png" alt="logo cargo"/></a>
                        </div>
                        <div id="main-nav__right" class="col-md-5 text-left no-gutters">
                            <nav>
                               <?php wp_nav_menu( array(
                                    'menu'           => 'top-menu-right',
                                    'menu_class'     => 'navigation',
                                ) ); ?>
                           </nav>
                        </div>
                    </div>
                    </div>
                </div>

                <div id="mobile-nav-toggle"><i class="icon-menu"></i></div>

                <div id="top-navigation-bar" class="container-fluid">
                    <div class="container no-gutters">
                        <div id="top-navigation-bar__address" class="text-left col-xs-6"><i class="icon icon-map-outline"></i>Dolnych Młynów 10/2H<span class="hidden-xs">, Kraków</span></div>
                        <div id="top-navigation-bar__phone" class="text-right col-xs-6"><i class="icon icon-phone-outline"></i><a href="tel: 12 686 55 22"><span itemprop="telephone">12 686 55 22</span></a></div>
                    </div>
                </div>
                <div id="main-nav" class="container">
                   <div class="row">
                       <div id="main-nav__left" class="col-md-5 text-right">
                           <nav>
                               <?php wp_nav_menu( array(
                                    'menu'           => 'top-menu-left' ,
                                    'menu_class'     => 'navigation',
                                ) ); ?>
                           </nav>
                        </div>
                       <div id="main-nav__logo" class="col-md-2">
                           <a href="<?php echo get_site_url(); ?>"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/assets/images/logo-cargo-nav.png" alt="logo cargo"/></a>
                       </div>
                       <div id="main-nav__right" class="col-md-5 text-left">
                            <nav>
                               <?php wp_nav_menu( array(
                                    'menu'           => 'top-menu-right',
                                    'menu_class'     => 'navigation',
                                ) ); ?>
                           </nav>
                       </div>
                   </div>
                </div><!-- .container -->
            </div><!-- .navigation-top -->

            <?php if ( get_page_template_slug() == "page-templates/reservation.php") : ?>
                <div id="reservation-header__title">
                    <h1><?php the_title(); ?></h1>
                    <p><?php echo nl2br($subtitle); ?></p>
                    <a href="tel: <?php echo ot_get_option( 'phone' ); ?>"><i class="icon icon-phone-outline"></i><?php echo ot_get_option( 'phone' ); ?></a>
                </div>

            <?php elseif ( is_front_page() == TRUE ) : ?>
                <div id="homepage-header__welcome">
                    <h1>#GRILLWITHIT</h1>
                    <p><?php echo nl2br($subtitle); ?></p>
                    <a href="/menu-deli/" class="btn btn-primary btn-lg">Sprawdź menu</a>
                </div>
                <div id="homepage-header__reservation">
                    <a id="res-btn" href="<?php echo get_permalink('212'); ?>" class="btn btn-dark"><i class="icon icon-calendar-clock"></i>Rezerwacja</a>
                </div>
                <div class="next-section"><i class="icon-arrow-down"></i></div>
            <?php else : ?>
                <div id="page-header__title">
                    <h1><?php the_title(); ?></h1>
                    <p><?php echo nl2br($subtitle); ?></p>
                </div>
            <?php endif; ?>
        </header>

        <div id="inner-wrap">
        