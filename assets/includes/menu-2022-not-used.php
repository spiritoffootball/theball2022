<?php /*
================================================================================
Global Menu for Themes based on The Ball
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

// Access blog ID and post.
global $blog_id, $post;

?><!-- assets/includes/menu.php -->

<div id="site-navigation" class="main-navigation" role="navigation">
	<span class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Main Menu', 'theball' ); ?></span>
	<div class="global-menu">
		<ul id="primary-menu" class="menu nav-menu" aria-expanded="false">
			<?php

			// Switch to the 2022 site to get menu.
			if ( $blog_id != 16 ) {
				switch_to_blog( 16 );
			}

			// Do we have a custom menu?
			if ( has_nav_menu( 'theball_global_menu' ) ) {

				// Try and use it.
				wp_nav_menu( [
					'theme_location' => 'theball_global_menu',
					'echo' => true,
					'container' => '',
					'items_wrap' => '%3$s',
				] );

			} else {

				// Our fallback is to show page list.
				wp_list_pages( 'title_li=&depth=1' );

			}

			// Unswitch the site.
			if ( $blog_id != 16 ) {
				restore_current_blog();
			}

			?>
		</ul>
	</div>
</div>



