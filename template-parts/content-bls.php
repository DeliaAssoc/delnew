<?php
/**
 * Template part for displaying page content in bls-template.php
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

<!-- PROOF SECTION -->
<?php
    if ( have_rows( 'sales_proof' ) ) : ?>
    <section class="proof-blocks">
        <div class="constrain md">
            <div class="flexxed">

            <?php while ( have_rows( 'sales_proof' ) ) : the_row(); ?>

                <div class="proof-block">
                    <div class="top-text"><?php the_sub_field( 'top_text' ); ?></div>
                    <div class="bottom-text"><?php the_sub_field( 'bottom_text' ); ?></div>
                </div>

            <?php endwhile; ?>

            </div>
            <a href="/work/" class="callout-btn">Additional Success</a>
        </div>
    </section>
<?php endif; ?>
<!-- PROOF SECTION -->



<!-- BLS SLIDER -->
<section class="bls-slider">	
    <div class="slider-wrapper">

        <?php if ( have_rows( 'bls_slider' ) ) : ?>
            <?php while ( have_rows( 'bls_slider' ) ) : the_row(); 
                $image = get_sub_field( 'slide_image' ); 
            ?>

                <div class="slide" style="background-image: url( '<?php echo $image[ 'url' ]; ?>' );">
                    <div class="slide-content">
                        <?php the_sub_field( 'slide_content' ); ?>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
<!-- BLS SLIDER -->

<!-- BLS SECONDARY CONTENT -->
<section class="power-brand p45">
	<div class="constrain">
			<?php if ( get_field( 'secondary_content_title' ) ) : ?>
				<h2 class="page-heading"><?php the_field( 'secondary_content_title' ); ?></h2>
			<?php endif; ?>
		<div class="flexxed">
			<?php if ( get_field( 'secondary_content_image' ) ) :
				$blsLogo = get_field( 'secondary_content_image' ); ?>
				<img src="<?php echo $blsLogo[ 'url' ]; ?>" alt="<?php echo $blsLogo[ 'alt' ]; ?>">
			<?php endif; ?>
			<div class="secondary-content">
				<?php the_field( 'secondary_content' ); ?>
			</div>
		</div>
	</div>
</section>
<!-- BLS SECONDARY CONTENT -->

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