<?php
/**
 * The template for displaying all single posts from team post type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Delia_Associates
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <!-- Check for Page Banner -->
        <?php if ( get_field( 'portfolio_hero_image', 'options' ) ) : ?>
            <div class="page-banner" style="background-image:url('<?php the_field( 'portfolio_hero_image', 'options' ); ?>');"></div>
        <?php endif; ?>

    
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'p45' ); ?>>
            <div class="constrain">
                <?php if ( get_field( 'portfolio_page_title', 'options' ) ) : ?>
                    <h1 class="page-title"><?php the_field( 'portfolio_page_title', 'options' ); ?></h1>
                <?php endif; ?>
                <?php if ( get_field( 'portfolio_page_content', 'options' ) ) : ?>
                    <div class="page-intro full">
                        <?php the_field( 'portfolio_page_content', 'options' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </article>
        <?php $custom_terms = get_terms( 'category' );

        if ( count($custom_terms)  > 1 ) : ?>

        <section class="portfolios-tab-list">
            <div class="constrain">

                <ul id="filters" class="filters">
                    <li><span class="filter all active" data-filter=".manufac, .packagi, .profess, .other, .digital, .logo, .print, .search, .tradesh, .adverti, .brandin, .brandm, .digital, .salest, .webdes, .brandh,  .brandl, .portfol, .consume, .technol">All</span></li>
                    <li><span class="filter" data-filter=".manufac">Manufacturing/Industrial</span></li>
                    <li><span class="filter" data-filter=".packagi">Packaging</span></li>
                    <li><span class="filter" data-filter=".profess">Professional Services</span></li>
                    <!-- <li><span class="filter" data-filter=".b2b">B2B</span></li> -->
                    <li><span class="filter" data-filter=".consume">Consumer/Other</span></li>
                </ul>
            </div><!-- .constrain -->
            <div id="portfoliolist" class="portfoliolist">
                <ul class="side-list flexxed">
                <?php wp_reset_query();
                
                $args = array(
                    'post_type' => 'portfolios',
                    'posts_per_page'    => -1
                    );

                    $loop = new WP_Query($args);
                    
                    if( $loop->have_posts() ) { ?>

                    <?php while( $loop->have_posts() ) : $loop->the_post(); ?>
                        <?php $ident = array(); ?>
                        <?php $item_terms = get_the_category($post->ID); ?>
                        <?php foreach( $item_terms as $item_term ) { ?>
                            <!-- Grab first 7 of Project Category Name to add for tab selector -->
                            <?php $ident[] = str_replace( ' ', '', strtolower( substr( $item_term->name, 0, 7 ) ) ); ?>
                            
                        <?php } ?>
                        <?php $ident = implode(' ', $ident); ?>

                            <li class="portfolio <?php echo $ident; ?>" data-cat="<?php echo $ident; ?>">

                                <!-- post thumbnail -->
                                <a class="dark-mask" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_post_thumbnail(''); // Declare pixel size you need inside the array ?>
                                </a>
                                <!-- /post thumbnail -->
                            </li>	

                    <?php endwhile; } ?>
                
                </ul>
            </div>

            <?php endif; ?>
        </section>
    </main>
</div>

<?php get_footer(); ?>
