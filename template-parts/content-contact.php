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
    
    <div class="constrain">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div>

    <div class="constrain md">
        <?php if ( get_field( 'sidebar_option' )  == 'sidebar' ) : ?>
        <div class="content-w-sidebar flexxed">
            <div class="contact-main-content">
                <?php the_field( 'main_content_sidebar' ); ?>
                <div class="ss-form-wrapper">
                    <?php the_field( 'form_code_sidebar' ); ?>
                </div>
            </div>
            <div class="sidebar">
                <div class="sidebar-content">
                    <?php the_field( 'sidebar_content' ); ?>
                </div>
                <?php if ( get_field( 'sidebar_information' ) == 'yes' ) : ?>
                    <div class="general-information">
                        <h2>General Inquiries:</h2>
                        <div class="gi-item">
                            <a href="mailto:<?php echo get_theme_mod( 'theme_company_email' ); ?>"><?php echo get_theme_mod( 'theme_company_email' ); ?></a>
                        </div>
                        <div class="gi-item">
                            <?php echo get_theme_mod( 'theme_company_street' ); ?>
                        </div>
                        <div class="gi-item">
                            <?php echo get_theme_mod( 'theme_company_city' ); ?>, <?php echo get_theme_mod( 'theme_company_state' ); ?> <?php echo get_theme_mod( 'theme_company_zip' ); ?>
                        </div>
                        <div class="gi-item">
                            Phone: <a href="tel:<?php echo get_theme_mod( 'theme_company_phone' ); ?>"><?php echo get_theme_mod( 'theme_company_phone' ); ?></a> | Fax: <?php echo get_theme_mod( 'theme_company_fax' ); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php else : ?>
        <div class="contact-main-content">
            <?php the_field( 'main_content' ); ?>
            <?php the_field( 'form_code' ); ?>
        </div>
        <?php endif; ?>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->

<div class="gmap">
    <?php echo get_theme_mod( 'theme_company_gmap' ); ?>
</div>

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
