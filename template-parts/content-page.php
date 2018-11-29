<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Delia_Associates
 */

?>
<!-- Check for Page Banner -->
<?php if ( get_field( 'page_banner_top' ) ) : ?>
    <div class="page-banner" style="background-image:url('<?php the_field( 'page_banner_top' ); ?>');"></div>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'p45' ); ?>>
	<div class="intro-content">
		<div class="constrain">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
		<div class="constrain">
			<?php the_content(); ?>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->

	<!-- ADDITIONAL SECTIONS -->
	<?php if ( have_rows( 'additional_content_sections' ) ) : ?>

		<?php while ( have_rows( 'additional_content_sections' ) ) : the_row(); ?>

			<section class="dp-additional-sections <?php the_sub_field( 'background_color' ); ?> <?php the_sub_field( 'section_padding' ); ?>">

				<div class="<?php the_sub_field( 'content_width' ); ?>">

					<?php if ( get_sub_field( 'section_title' ) ) : ?>
						<h2><?php the_sub_field( 'section_title' ); ?></h2>
					<?php endif; ?>

					<?php if ( have_rows( 'additional_content_layouts' ) ) : ?>

						<?php while ( have_rows( 'additional_content_layouts' ) ) : the_row(); ?>

							<?php if ( get_row_layout() == 'full_width' ) : ?>

								<?php the_sub_field( 'full_width_content' ); ?>

							<?php elseif ( get_row_layout() == 'half_and_half' ) : ?>

								<div class="flexxed">
									<div class="half as-content-block"><?php the_sub_field( 'left_content' ); ?></div>
									<div class="half as-content-block"><?php the_sub_field( 'right_content' ); ?></div>
								</div>

							<?php elseif ( get_row_layout() == 'one-third_and_two-thirds' ) : ?>

								<div class="flexxed">
									<div class="one-third as-content-block"><?php the_sub_field( 'left_content' ); ?></div>
									<div class="two-thirds as-content-block"><?php the_sub_field( 'right_content' ); ?></div>
								</div>

							<?php elseif ( get_row_layout() == 'two-thirds_and_one-third' ) : ?>
							
								<div class="flexxed">
									<div class="two-thirds as-content-block"><?php the_sub_field( 'left_content' ); ?></div>
									<div class="one-third as-content-block"><?php the_sub_field( 'right_content' ); ?></div>
								</div>

							<?php elseif ( get_row_layout() == 'three_columns' ) : ?>

								<div class="flexxed">
									<div class="one-third as-content-block"><?php the_sub_field( 'left_content' ); ?></div>
									<div class="one-third as-content-block"><?php the_sub_field( 'middle_content' ); ?></div>
									<div class="one-third as-content-block"><?php the_sub_field( 'right_content' ); ?></div>
								</div>

							<?php elseif ( get_row_layout() == 'four_columns' ) : ?>

								<div class="flexxed">
									<div class="one-fourth as-content-block"><?php the_sub_field( 'first_column' ); ?></div>
									<div class="one-fourth as-content-block"><?php the_sub_field( 'second_column' ); ?></div>
									<div class="one-fourth as-content-block"><?php the_sub_field( 'third_column' ); ?></div>
									<div class="one-fourth as-content-block"><?php the_sub_field( 'fourth_column' ); ?></div>
								</div>

							<?php endif; ?>

						<?php endwhile; ?>

					<?php endif; ?>

				</div>

			</section><!-- end Additional Section -->

		<?php endwhile; ?>

	<?php endif; ?>
