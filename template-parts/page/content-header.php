<div id="header" style="background-image: url('<?php echo get_the_post_thumbnail_url($placeholderPageId); ?>');">
	<div class="overlay"></div>
</div>

<div class="container-fluid">
	<h1 class="page-title"><?php echo get_the_title($placeholderPageId); ?></h1>

	<?php if ($subtitle = get_field('page_subtitle', $placeholderPageId)) : ?>
		<div class="page-subtitle max-width-767">
			<?php echo nl2br($subtitle); ?>
		</div>
	<?php endif; ?>

</div>
