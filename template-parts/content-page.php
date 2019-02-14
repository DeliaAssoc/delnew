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
		<?php if ( get_the_content() ) : ?>
			<div class="constrain">
				<?php the_content(); ?>
			</div>
		<?php endif; ?>
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

<!-- CLIENT SAMPLES -->
<section id="client-samples" class="client-samples">
	<ul class="flexxed">
	<?php
		$query = new WP_Query( array( 'post_type' => 'portfolios', 'showposts' => 4, 'orderby' => 'rand' ) );
			
		while ( $query->have_posts() ) : $query->the_post(); ?>

			<li class="portfolio">

				<!-- post thumbnail -->
				<a class="dark-mask" href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>
				</a>
			    <!-- /post thumbnail -->
			</li>	

		<?php endwhile;
		wp_reset_query();
	?>
	</ul>
	<a class="more-work" href="/work/">See More Award Winning Work ></a>
</section>
<!-- CLIENT SAMPLES -->

<!-- ABOUT TABS -->
<section class="about-tabs p45">
	<div class="constrain md">

		<div class="about-tabs-intro">
			<?php the_field( 'about_tabs_intro_content', 'options' ); ?>
		</div>

		<div class="tab-links">

			<div class="flexxed">
				<?php if ( have_rows( 'about_tabs', 'options' ) ) : ?>

					<?php $count = count( get_field( 'about_tabs', 'options' ) ); ?>

					<?php while ( have_rows( 'about_tabs', 'options' ) ) : the_row(); ?>
						<?php 	$title = get_sub_field( 'tab_title', 'options' );
								$ref = strtolower( str_replace( ' ', '', $title ) );
						?>
						
						<a href="#" data-ref="<?php echo $ref; ?>" class="link count-<?php echo $count; ?>">
							<h3><?php echo $title ?></h3>
						</a>

					<?php endwhile; ?>

				<?php endif; ?>
			</div>

			<div class="tab-content-wrapper p30">

			<?php if ( have_rows( 'about_tabs', 'options' ) ) : ?>

				<?php while ( have_rows( 'about_tabs', 'options' ) ) : the_row(); ?>

					<?php $title = get_sub_field( 'tab_title', 'options' ); ?>
					<?php $ref = strtolower( str_replace( ' ', '', $title ) ); ?>

					<div id="<?php echo $ref; ?>" class="tab-content-block"><?php the_sub_field( 'tab_content','options' ); ?></div>

				<?php endwhile; ?>

			<?php endif; ?>

			</div>
		</div>
	</div>
</section>
<!-- ABOUT TABS -->

<!-- BRAND MATTERS FORM SECTION -->
<?php if ( get_field( 'brand_matters_form_content', 'options' ) || get_field( 'brand_matters_form_code', 'options' ) ) : ?>

<section class="brand-matters-form p45">
	<div class="constrain md">
		<div class="flexxed">
			<div class="half">
				<?php the_field( 'brand_matters_form_content', 'options' ); ?>
			</div>
			<div class="half">
				<?php the_field( 'brand_matters_form_code', 'options' ); ?>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>
<!-- BRAND MATTERS FORM SECTION -->