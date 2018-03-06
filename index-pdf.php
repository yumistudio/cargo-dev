<?php
/**
 * Filename: index-pdf.php
 * Project: WordPress PDF Templates
 * Copyright: (c) 2014-2016 Antti Kuosmanen
 * License: GPLv3
 *
 * Copy this file to your theme directory to start customising the PDF template.
*/

  //$logo = '../../../wp-content/uploads/2017/06/logo.jpg';
  //$logo = 'logo.jpg';
  $logo = 'wp-content/uploads/2017/06/logo.jpg';
  $gallery = get_field('image_gallery');
  $term = array_shift(get_the_terms($post->ID, 'project_category'));
?>
<!DOCTYPE html>

<html>
<head>
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
  
  <style>

   @font-face {
        font-family: 'Lato';
        src: url('<?php echo get_site_url(); ?>/wp-content/uploads/dompdf-fonts/lato/Lato-Regular.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

  @font-face {
        font-family: 'Lato';
        src: url('<?php echo get_site_url(); ?>/wp-content/uploads/dompdf-fonts/lato/Lato-Heavy.ttf') format('truetype');
        font-weight: bold;
        font-style: normal;

    }

  @font-face {
        font-family: 'Lato Heavy';
        src: url('<?php echo get_site_url(); ?>/wp-content/uploads/dompdf-fonts/lato/Lato-Heavy.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

  @font-face {
        font-family: 'Lato Light';
        src: url('<?php echo get_site_url(); ?>/wp-content/uploads/dompdf-fonts/lato/Lato-Light.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @page{ margin: 0; }
    body { font-family: 'Lato'; font-size: 10px; padding: 110px 0;}
    .fh { position: fixed; width: 100%; height: 100px; background-color: #e2e4e2; }
    .header { top: 0; width: 600px; }
  .header-inner { padding: 20px;}
    .footer { bottom: 0; width: 600px;  }
    .footer-inner { font-size: 10px; padding: 20px; }
    .header svg { width: 200px; height: 30px; fill: #fff; }
    .header svg path { fill: #FFFFFF; }
  .title { font-family: 'Lato Heavy'; font-size: 25px; line-height: 18px; margin-top: 5px; }
  .subtitle { font-family: 'Lato Light'; font-size: 12px; }
    .logo { position: absolute; top: 0; right: -200px; width: 200px; height:100px; background: #282b28 url('<?php echo $logo; ?>') center center no-repeat; }
    .container { padding: 0 20px; }
    .post-content { float: left; width: 380px; margin-left: 20px; }
    .header h1 { margin-left: 20px; font-family: 'Lato'; }
    .footer-inner > div { margin-top: 5px; }
  .thumbnail { clear: right; float: right; width: 350px; margin-right: 20px; margin-top: 10px; }
  .thumbnail img { width: 100%; height: auto; }
  .gallery-row { height: 180px; }
  .item { float: left; margin-top: 5px; }
  
  /* .item img { width: 100%; height: 100%; } */
  
  .odd-1 { width: 232px; }
  .odd-2 { width: 113px; margin-left: 237px; }
  .odd-3 { margin-top: 95px; width: 113px; height: 70px; margin-left: 237px; }

  .even-1 { width: 232px; margin-left: 118px; }
  .even-2 { width: 113px; }
  .even-3 { margin-top: 95px; width: 113px; height: 70px; }
  
.st0 { fill: #FFFFFF; }
  </style>

</head>
<body>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="fh header">
    <div class="logo">
    </div>
    <div class="header-inner">
      <div class="subtitle"><?php echo strtoupper('Projects / ' . $term->name); ?></div>
    <div class="title"><?php echo strtoupper(get_the_title()); ?></div>
    </div>
  </div>

  <div class="fh footer">
    
  <div class="logo"></div>
    
  <div class="footer-inner">
      <div itemscope="" itemprop="address" itemtype="http://schema.org/PostalAddress">
        <b><span itemprop="addressLocality">KILDARE</span></b> -
        <span itemprop="streetAddress"><?php echo ot_get_option( 'address_kildare' ); ?></span> |
        <span itemprop="postalCode"><?php echo ot_get_option( 'eircode_kildare' ); ?></span>
        <span itemprop="telephone"><?php echo ot_get_option( 'phone_no_kildare' ); ?></span> |
        <a href='mailto:<?php echo ot_get_option( 'email_kildare' ); ?>' itemprop="email"><?php echo ot_get_option( 'email_kildare' ); ?></a>
      </div>
      <div itemscope="" itemprop="address" itemtype="http://schema.org/PostalAddress">
        <b><span itemprop="addressLocality">CORK</span></b> -
        <span itemprop="streetAddress"><?php echo ot_get_option( 'address_cork' ); ?></span> |
        <span itemprop="postalCode"><?php echo ot_get_option( 'eircode_cork' ); ?></span>
        <span itemprop="telephone"><?php echo ot_get_option( 'phone_no_cork' ); ?></span> |
        <a href='mailto:<?php echo ot_get_option( 'email_cork' ); ?>' itemprop="email"><?php echo ot_get_option( 'email_cork' ); ?></a>
      </div>
      <div itemscope="" itemprop="address" itemtype="http://schema.org/PostalAddress">
        <b><span itemprop="addressLocality">KERRY</span></b> -
        <span itemprop="streetAddress"><?php echo ot_get_option( 'address_kerry' ); ?></span> |
        <span itemprop="postalCode"><?php echo ot_get_option( 'eircode_kerry' ); ?></span>
        <span itemprop="telephone"><?php echo ot_get_option( 'phone_no_kerry' ); ?></span> |
        <a href='mailto:<?php echo ot_get_option( 'email_kerry' ); ?>' itemprop="email"><?php echo ot_get_option( 'email_kerry' ); ?></a>
      </div>
    </div>
  </div>
      
  <div class="thumbnail">
    <?php the_post_thumbnail(); ?>
  
    <div class="gallery-row">
      <?php $evenodd = 'odd'; $idx=0; foreach($gallery as $obj) : ?>
        <?php if($idx < 9) : ?>
          
          <?php if ($idx && $idx % 3 == 0): $evenodd = $evenodd == 'odd' ? 'even' : 'odd'; ?>
            </div><div class="gallery-row">
          <?php endif; ?>
          
          <div class="item <?php echo $evenodd . '-' . ($idx%3 + 1); ?>">
            <img src="<?php echo array_shift( wp_get_attachment_image_src($obj['id'], 'arkil-object-list-pdf') ); ?>" />
          </div>
        <?php endif; ?>
      <?php $idx++; endforeach; ?>
    </div>

  </div>
  
  

  <div class="post-content">
    <?php the_content(); ?>
  </div>

<?php endwhile; endif; ?>
  
</body>
</html>
