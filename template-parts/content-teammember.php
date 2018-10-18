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
<?php if ( get_field( 'page_banner_top' ) ) : ?>
    <div class="page-banner" style="background-image:url('<?php the_field( 'page_banner_top' ); ?>');"></div>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'p45' ); ?>>
	<div class="constrain md">
        <div class="team-page flexxed">
            <div class="team-info">
                <div class="team-image">
                    <?php the_post_thumbnail(); ?>
                </div>
                <?php if ( get_field( 'quote' ) ) : ?>
                    <div class="team-quote">
                        <?php the_field( 'quote' ); ?>
                    </div>
                <?php endif; ?>
                <div class="team-links">
                    <?php if ( get_field( 'linkedin' ) ) : ?>
                        <a href="<?php the_field( 'linkedin' ); ?>" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    <?php endif; ?>
                    <?php if ( get_field( 'email' ) ) : ?>    
                        <a href="mailto:<?php the_field( 'email' ); ?>" class="team-email"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="team-bio">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <div class="team-title"><?php the_field( 'title' ); ?></div>
                <?php the_content(); ?>
            </div>
        </div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

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
