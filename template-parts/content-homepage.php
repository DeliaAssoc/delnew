<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Delia_Associates
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<section class="home-slider">
	
	<?php if ( have_rows( 'homepage_slider' ) ) : ?>
		<div class="slider">
		<?php $i = count( get_field( 'homepage_slider' ) ); ?>
		<?php while ( have_rows( 'homepage_slider' ) ) : the_row(); ?>
			<div class="slide">
				<?php $file = get_sub_field( 'slide_video_file' ); ?>
				<video autoplay loop muted id="video-<?php echo $i; ?>" class="hp-slider-element video" src="<?php echo $file[ 'url' ]; ?>" type="video/mp4" loop></video>
				<div class="constrain">
					<div class="slide-text">
						<div class="text fadeInRight animated"><?php the_sub_field( 'slide_content' ); ?></div>
						<div class="red-diamond fadeInLeft animated"><img src="http://localhost/delianew/wp-content/themes/del/img/red-diamond.png" alt=""></div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		</div><!-- .slider -->
	<?php endif; ?>
</section><!-- .home-slider -->

<section class="boasts p45">
	<div class="constrain">
		<div class="boasts-container flexxed">
			<?php if ( have_rows( 'boasts' ) ) :
				$count = count( get_field( 'boasts' ) ); ?>
				<?php while ( have_rows( 'boasts' ) ) : the_row(); ?>
					
					<div class="boast-block items-<?php echo $count; ?> <?php the_sub_field( 'boast_color' ); ?>">
						<h2><?php the_sub_field( 'boast_title' ); ?></h2>
						<div class="boast-text">
							<?php the_sub_field( 'boast_content' ); ?>
						</div>
						<div class="boast-links">
							<a class="btn white-brdr" href="<?php the_sub_field( 'boast_learn_more_url' ); ?>">
								<span>Learn More</span>
							</a>
						</div>
					</div>

				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div><!-- .constrain -->
</section><!-- .boasts -->

<section class="home-main-content">
	<div class="constrain sm flexxed">
		<div class="text-block">
			<h1><?php the_field( 'main_content_title' ); ?></h1>
			<div class="text">
				<?php the_field( 'main_content_copy' ); ?>
			</div>
			<div class="cta-stats">
				<div class="stat flexxed">
					<div class="br-text"><?php the_field( 'roi_stat' ); ?></div>
					<div class="stats-text">Average ROI</div>
				</div>
				<div class="stat flexxed">
					<div class="br-text"><?php the_field( 'results_stats' ); ?></div>
					<div class="stats-text">CEOs “delighted with the results”</div>
				</div>
				<div class="stat flexxed">
					<div class="br-text"><?php the_field( 'launched_stats' ); ?></div>
					<div class="stats-text">Brands Launched and Counting</div>
				</div>
			</div>
			<a class="btn red-bg" href="<?php the_field( 'main_content_link_url' ); ?>" class="main-content-link"><span><?php the_field( 'main_content_link_text' ); ?></span></a>
		</div>
		<?php if ( get_field( 'main_content_image' ) ) :
			$mImage = get_field( 'main_content_image' ); ?>
			<!-- <a href="/brand-marketing/"><img src="<?php echo $mImage[ 'url' ]; ?>" alt="<?php echo $mImage[ 'alt' ]; ?>"></a> -->
			<a class="mc-image" href="<?php the_field( 'main_content_link_url' ); ?>" class="main-content-link"><img src="<?php echo $mImage[ 'url' ]; ?>" alt="<?php echo $mImage[ 'alt' ]; ?>"></a>
		<?php endif; ?>
	</div><!-- .constrain.sm -->
</section><!-- .main-content -->

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

<section class="company-video p45" style="background-image: url( '<?php the_field( 'company_video_image' ); ?>' );">
	<div class="constrain">
		<?php the_field( 'company_video_text' ); ?>
	</div><!-- .constrain -->
</section><!-- .company-video -->

<section class="callouts p45">
	<div class="constrain">
        <h2><?php the_field( 'callouts_title' ); ?></h2>
        <div class="flexxed">
            <?php if ( have_rows( 'callouts' ) ) : ?>
                <?php while ( have_rows( 'callouts' ) ) : the_row(); ?>
                    <div class="callout-item">
                        <div class="callout-icon">
                            <?php $cImage = get_sub_field( 'callout_icon' ); ?>
                            <img src="<?php echo $cImage[ 'url' ]; ?>" alt="<?php echo $cImage[ 'alt' ]; ?>">
                        </div>
                        <div class="callout-text">
                            <h4><?php the_sub_field( 'callout_title' ); ?></h4>
                            <span><?php the_sub_field( 'callout_subtitle' ); ?></span>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
	</div><!-- .constrain -->
</section><!-- .callouts -->

<!-- QUICK LINKS MODULE -->
<?php if ( get_field( 'quick_links', 'options' ) ) : ?>
    <section class="quick-links p45">
        <div class="constrain sm">
            <div class="flexxed">
            <?php while ( have_rows( 'quick_links', 'options' ) ) : the_row(); ?>

                <a href="<?php the_sub_field( 'link_url', 'options' ); ?>" class="quick-link">
                    <h2><?php the_sub_field( 'link_text', 'options' ); ?></h2>
                    <div class="quick-link-icon">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="158.5 222.5 294 298" enable-background="new 158.5 222.5 294 298" xml:space="preserve">
                            <path d="M305.314,514.56L166.029,373.396l139.962-141.54l139.981,141.258L305.314,514.56L305.314,514.56z
                                        M177.618,373.401L305.345,502.85l129.02-129.747L306.001,243.57L177.618,373.401L177.618,373.401z"/>
                            <polygon points="308.014,416.799 295.199,404.049 324.078,375.016 293.626,344.288 306.462,331.583 
                                    349.537,375.048"/>
                        </svg>
                    </div>
                </a><!-- a.quick-link -->

            <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- QUICK LINKS MODULE -->

<!-- AFFILIATES LOGOS -->
<section class="affiliate-logos p30">
	<?php if ( have_rows( 'affiliate_logos', 'option' ) ) : ?>
		<div class="constrain">
			<div class="flexxed">
				<?php while ( have_rows( 'affiliate_logos', 'option' ) ) : the_row();
					$image = get_sub_field( 'affiliate_logo', 'option' );
				?>
					<a class="affiliate-block" target="_blank" href="<?php the_sub_field( 'affiliate_url','option' ); ?>">
						<img class="img-fluid" src="<?php echo $image[ 'url' ]; ?>" alt="<?php echo $image[ 'alt' ]; ?>">
					</a>
				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>
</section>
<!-- AFFILIATES LOGOS -->

</article><!-- #post-<?php the_ID(); ?> -->
