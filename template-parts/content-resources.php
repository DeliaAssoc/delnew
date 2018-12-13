<?php
/**
 * Template part for displaying content and resources custom post type.
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
<?php the_content(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'p45' ); ?>>

    <div class="constrain">

        <h1 class="page-title"><?php the_title(); ?></h1>
       

        <?php
            // WP_Query arguments
            $postCount = get_field( 'maximum_resources_per_page' );

            $args = array(
                'post_type'              => array( 'resources' ),
                'posts_per_page'         => $postCount,
                'order'                  => 'DESC',
                'paged'                  => $paged
            );

            // The Query
            $resources = new WP_Query( $args );
            $count_posts = wp_count_posts( 'resources' )->publish;

            // The Loop
            if ( $resources->have_posts() ) : ?>
                <div class="resources-list flexxed p45">
                    <?php while ( $resources->have_posts() ) : ?>
                        <?php $resources->the_post();
                        
                            if ( get_field( 'resource_type' ) == 'article' ) : ?><!-- if is article -->
                                <a href="<?php the_field( 'resource_article' ); ?>" class="resources-item article">
                                    <?php if ( get_field( 'cover_image' ) ) : ?>
                                    <?php $cImage = get_field( 'cover_image' ); ?>
                                        <img src="<?php echo $cImage[ 'url' ]; ?>" alt="<?php echo $cImage[ 'alt' ]; ?>" class="resource-cover-image">
                                    <?php endif; ?>
                                    <h2 class="resource-title"><?php the_title(); ?></h2>
                                </a>
                            <?php elseif ( get_field( 'resource_type' ) == 'pdf' ) : ?><!-- if is pdf -->
                                <a target="_blank" href="<?php the_field( 'resource_file' ); ?>" class="resources-item file">
                                    <?php if ( get_field( 'cover_image' ) ) : ?>
                                    <?php $cImage = get_field( 'cover_image' ); ?>
                                        <img src="<?php echo $cImage[ 'url' ]; ?>" alt="<?php echo $cImage[ 'alt' ]; ?>" class="resource-cover-image">
                                    <?php endif; ?>
                                    <h2 class="resource-title"><?php the_title(); ?></h2>
                                </a>
                            <?php elseif ( get_field( 'resource_type' ) == 'video' ) : ?><!-- if is video -->
                                <div class="resources-item video">
                                    <?php the_field( 'resource_video' ); ?>
                                    <h2 class="resource-title"><?php the_title(); ?></h2>
                                </div>
                            <?php else : ?>
                                <a target="_blank" href="<?php the_field( 'resource_external_link' ); ?>" class="resources-item xlink"><!-- if is external link -->
                                    <?php if ( get_field( 'cover_image' ) ) : ?>
                                    <?php $cImage = get_field( 'cover_image' ); ?>
                                        <img src="<?php echo $cImage[ 'url' ]; ?>" alt="<?php echo $cImage[ 'alt' ]; ?>" class="resource-cover-image">
                                    <?php endif; ?>
                                    <h2 class="resource-title"><?php the_title(); ?></h2>
                                </a>
                            <?php endif; ?>
                    <?php endwhile; ?>

                </div>
                <?php if ( $count_posts > $postCount ) : ?>
                <div class="pagination-links">
                    <div class="previous-link"><?php echo get_previous_posts_link( '<i class="fa fa-angle-left" aria-hidden="true"></i> Previous Page ' ); ?>
                    <div class="next-link"><?php echo get_next_posts_link( 'Next Page <i class="fa fa-angle-right" aria-hidden="true"></i>', $resources->max_num_pages ); ?>
                </div>
                <?php endif; ?>
            <?php endif;

            // Restore original Post Data
            wp_reset_postdata();
        ?>
    </div>


</article><!-- #post-<?php the_ID(); ?> -->