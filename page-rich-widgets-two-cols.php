<?php
/**
 * Template Name: Page Rich Widgets Two Columns
 *
 * @since 1.0.0
 * @package The_Ball_2022
 */

get_header(); ?><!-- page-rich-widgets-two-cols.php -->

<div id="content_wrapper" class="clearfix">

<?php $site_banner_rich = locate_template( 'assets/includes/site_banner_rich.php' ); ?>
<?php if ( $site_banner_rich ) : ?>
	<?php load_template( $site_banner_rich ); ?>
<?php endif; ?>

<div id="cols" class="widget-cols clearfix">
<div class="cols_inner">

	<div class="main_column clearfix">

		<div class="about_widget">
			<?php dynamic_sidebar( 'sof-middle-right' ); ?>
		</div>

		<div class="social_widget">
			<?php dynamic_sidebar( 'sof-middle-left' ); ?>
		</div>

	</div><!-- /main_column -->

</div><!-- /.cols_inner -->
</div><!-- /#cols -->

<?php get_footer( 'page-rich' ); ?>
