<?php
/**
 * Site Banner Template.
 *
 * @since 1.0.0
 * @package The_Ball_2022
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Build query for "Site Header" page.
$args = [
	'post_type' => 'page',
	'post_status' => 'publish',
	'pagename' => 'site-header',
];

// Do query.
$site_header = new WP_Query( $args );

?>
<!-- assets/includes/site_banner.php -->
<div id="site_banner" class="clearfix">

	<div id="site_banner_inner">

		<?php $network_black = locate_template( 'assets/includes/network.php' ); ?>
		<?php if ( $network_black ) : ?>
			<?php load_template( $network_black ); ?>
		<?php endif; ?>

		<?php if ( $site_header->have_posts() ) : ?>
			<?php while ( $site_header->have_posts() ) : ?>
				<?php $site_header->the_post(); ?>

				<div id="splash">

					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail-200 size' ); ?></a>
					<?php endif; ?>

				</div><!-- /splash -->

				<div id="banner_copy">

					<h2><?php echo get_field( 'header_title' ); ?></h2>

					<?php echo get_field( 'header_content' ); ?>

				</div><!-- /banner_copy -->

				<?php edit_post_link( 'Edit this header', '<p class="edit_link">', '</p>' ); ?>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>

	</div><!-- /site_banner_inner -->

</div><!-- /site_banner -->

<div id="cols" class="clearfix">
<div class="cols_inner">

	<?php $page_list = locate_template( 'assets/includes/page_list.php' ); ?>
	<?php if ( $page_list ) : ?>
		<?php load_template( $page_list ); ?>
	<?php endif; ?>
