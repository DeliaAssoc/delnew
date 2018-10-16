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

<!-- BOASTS MODULE -->
<?php if ( get_field( 'boasts', 'options' ) ) : ?>
<section class="boasts p45">
    <?php $boastCount = count( get_field( 'boasts', 'options' ) ); ?>
    <div class="constrain md">
        <div class="tab-links">
            <div class="flexxed">
                <?php while ( have_rows( 'boasts', 'options' ) ) : the_row(); ?>
                    <!-- create unique data-ref -->
                    <?php $ref = str_replace( ' ', '', strtolower( substr( get_sub_field( 'boast_title', 'options' ), 0, 5 ) ) ); ?>

                    <a href="#" data-ref="<?php echo $ref; ?>" class="link count-<?php echo $boastCount; ?>">
                        <h3><?php the_sub_field( 'boast_title', 'options' ); ?></h3>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="tab-content">
            <?php while ( have_rows( 'boasts', 'options' ) ) : the_row(); ?>
                <!-- create unique data-ref -->
                <?php $ref = str_replace( ' ', '', strtolower( substr( get_sub_field( 'boast_title', 'options' ), 0, 5 ) ) ); ?>

                <div id="<?php echo $ref; ?>" class="tab-content-block">
                    <?php the_sub_field( 'boast_content', 'options' ); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- BOASTS MODULE -->


<!-- CLIENT SAMPLES -->
<section id="client-samples" class="client-samples">
	<ul class="flexxed">
	<?php
		$query = new WP_Query( array( 'post_type' => 'client', 'showposts' => 4, 'orderby' => 'rand' ) );
			
		while ( $query->have_posts() ) : $query->the_post(); ?>

			<li class="portfolio">

				<!-- post thumbnail -->
				<a class="dark-mask" href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>
				</a>
			<!-- /post thumbnail -->
				<!-- <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<h2 class="broll-text">
						<?php the_title(); ?>
					</h2>
				</a> -->
			</li>	

		<?php endwhile;
		wp_reset_query();
	?>
	</ul>
	<div class="contain">
		<a class="more-work" href="/work/">See More Award Winning Work ></a>
	</div>
</section>
<!-- CLIENT SAMPLES -->



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

</article><!-- #post-<?php the_ID(); ?> -->
