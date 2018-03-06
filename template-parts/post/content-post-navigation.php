<div class="nav-links">
  <?php
  $pp = get_previous_post();
  $np = get_next_post(); 
  ?>
  <a class="prev" href="<?php echo get_permalink($pp->ID).'foto/';?>">
  	Poprzedni
  </a>
  <a class="next" href="<?php echo get_permalink($np->ID).'foto/';?>">
  	Następny
  </a>
</div><!-- .nav-links -->