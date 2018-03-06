<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<nav id="navbar" class="navbar navbar-fixed-right navbar-inverse" role="navigation" aria-label="<?php _e( 'Top Menu', 'vilicom' ); ?>">
	<div class="container-fluid width1230">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle openMenu">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>                        
	        </button>
			<button type="button" class="navbar-toggle openPhone" id="callUs">
				<span class="glyphicon glyphicon-earphone headerPhone" aria-hidden="true"></span>        
			</button>
        </div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<?php wp_nav_menu( array(
				'theme_location' => 'top',
				'menu_id'        => 'top-menu',
				'menu_class'	 => 'nav navbar-nav navbar-right',
			) ); ?>
		</div>
	</div>
</nav><!-- #site-navigation -->

<!-- Call us -->
<div class="callUs">
	<div class="toggle-bar">
		<h3>Call us</h3>
		<button type="button" class="navbar-toggle close">
	        <span></span>
	        <span></span>
	    </button>
		<button type="button" class="navbar-toggle openPhone" id="callUs">
			<span class="glyphicon glyphicon-earphone headerPhone" aria-hidden="true"></span>        
		</button>
	</div>
	<div class="content">
		<div class="phoneBlock mt95">
			<p>UK office</p>
			<a href="tel:+44 118 951 0074">+44 118 951 0074</a>
		</div>
		<div class="phoneBlock">
			<p>Dublin office</p>
			<a href="tel:+353 1 675 6900">+353 1 675 6900</a>
		</div>
	</div>
</div>

<!--End: Call us -->