<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Delia_Associates
 */

?>

<!-- Check for Page Banner -->
<?php if ( get_field( 'blog_page_banner', 'options' ) ) : ?>
    <div class="page-banner" style="background-image:url('<?php the_field( 'blog_page_banner', 'options' ); ?>');"></div>
<?php endif; ?>

<div class="constrain">
    <div class="p45">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
</div>

<section class="single-post constrain">
    <div class="flexxed">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post-featured-image">
                <?php the_post_thumbnail(); ?>
            </div>

            <?php the_content(); ?>

            <div class="post-navigation">
                <?php the_post_navigation(); ?>
            </div>

        </article><!-- #post-<?php the_ID(); ?> -->

        <div class="blog-sidebar"><?php get_sidebar(); ?></div>
    </div>
</section>

