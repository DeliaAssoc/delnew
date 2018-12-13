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
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();