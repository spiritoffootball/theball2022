<?php /*
================================================================================
Site Banner Template
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

?><!-- assets/includes/site_banner.php -->

<div id="site_banner" class="clearfix">

	<div id="site_banner_inner">

		<?php include( get_template_directory() . '/assets/includes/network.php' ); ?>

		<div id="splash">

			<a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/interface/teaser-gaziantep-640x427.jpg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/interface/teaser-gaziantep-640x427.jpg" alt="Boy hugging The Ball" title="Boy hugging The Ball" width="200" height="138" class="alignnone size-medium wp-image-122" /></a>

		</div><!-- /splash -->

		<div id="banner_copy">

			<h2>Welcome to <?php bloginfo( 'title' ); if ( is_home() ) { echo ' blog'; } ?></h2>

			<p>The Ball 2022 kicks off from Battersea Park in London, where the first official game of football was played, and travels to the Men’s World Cup in Qatar and the Women’s World Cup in Australia &amp; New Zealand. The journey will show how football can help with the climate emergency.</p>

			<?php if ( ! is_home() ) { ?>
				<p id="gotoblog"><a href="/2022/blog/">Read the blog &rarr;</a></p>
			<?php } ?>

		</div><!-- /banner_copy -->

	</div><!-- /site_banner_inner -->

</div><!-- /site_banner -->



<div id="cols" class="clearfix">
<div class="cols_inner">

	<?php include( get_template_directory() . '/assets/includes/page_list.php' ); ?>



