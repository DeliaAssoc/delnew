<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Delia_Associates
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

        <!-- Check for Page Banner -->
        <?php if ( get_field( 'tp_page_banner_top', 'options' ) ) : ?>
            <div class="page-banner" style="background-image:url('<?php the_field( 'tp_page_banner_top', 'options' ); ?>');"></div>
        <?php endif; ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'p45' ); ?>>
            <div class="constrain">
                <h1 class="page-title">Meet the Team</h1>
            </div>
            <div class="constrain md">
                <div class="teammembers p45 flexxed">

                    <?php
                        // WP_Query arguments
                        $args = array(
                            'posts_per_page'         => -1,
                            'post_type'              => array( 'teams' ),
                            'order'                  => 'ASC',
                            'orderby'                => 'menu_order',
                        );

                        // The Query
                        $query = new WP_Query( $args );

                        // The Loop
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post(); ?>
                               
                                <a href="<?php the_permalink(); ?>" class="team-block" title="<?php the_title(); ?>">
                                    <div class="tb-overlay"></div>
                                    <?php the_post_thumbnail(); ?>
                                    <div class="team-block-info">
                                        <div class="team-block-name"><?php the_title(); ?></div>
                                        <div class="team-block-title"><?php the_field( 'title' ); ?></div>
                                    </div>
                                </a>

                            <?php }
                        } else {
                            // no posts found
                        }
                            // Restore original Post Data
                            wp_reset_postdata();
                    ?>

                </div>
            </div>
        </article>

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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();