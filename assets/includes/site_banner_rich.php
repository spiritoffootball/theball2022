<?php /*
================================================================================
Site Banner Template
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

?><!-- assets/includes/site_banner_rich.php -->

<div id="site_banner" class="site_banner_rich clearfix">

	<div id="site_banner_inner" class="clearfix">

		<?php if ( is_front_page() ) { ?>

			<div class="splash_widget_col">

				<div class="splash_main_widget">
					<?php dynamic_sidebar( 'sof-top-left' ); ?>
				</div>

				<div class="splash_sub_widget">
					<?php dynamic_sidebar( 'sof-top-sub' ); ?>
				</div>

			</div>

			<div class="splash_right_widget">
				<div id="splash_right">
					<?php dynamic_sidebar( 'sof-top-right-page' ); ?>
				</div>
			</div>

		<?php } elseif ( is_page() AND empty( $post->post_parent ) ) { ?>

			<div class="splash_widget_col">

				<div class="splash_main_widget">

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

						$hidden_title = '';
						if ( get_post_meta( get_the_ID(), 'show_heading', true ) == '1' ) {
							$hidden_title = ' class="hidden"';
						}

						?>

						<div class="post clearfix">

							<h2 id="post-<?php the_ID(); ?>"<?php echo $hidden_title; ?>><?php the_title(); ?> <?php edit_post_link( 'Edit this entry', '<span>', '</span>' ); ?></h2>

							<?php the_content( '<p class="serif">Read the rest of this page &raquo;</p>' ); ?>

						</div><!-- /post -->

					<?php endwhile; endif; ?>

				</div>

				<div class="splash_sub_widget">
					<?php ?>
				</div>

			</div>

			<div class="splash_right_widget">
				<?php dynamic_sidebar( 'sof-top-right' ); ?>
			</div>

		<?php } else { ?>

			<div class="splash_widget_col">

				<div class="splash_main_widget">
					<?php dynamic_sidebar( 'sof-top-left' ); ?>
				</div>

				<div class="splash_sub_widget">
					<?php dynamic_sidebar( 'sof-top-sub' ); ?>
				</div>

			</div>

			<div class="splash_right_widget">
				<?php dynamic_sidebar( 'sof-top-right' ); ?>
			</div>

		<?php } ?>

	</div><!-- /site_banner_inner -->

</div><!-- /site_banner -->



