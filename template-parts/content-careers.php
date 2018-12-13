<?php
/**
 * Template part for displaying content What We Do Template.
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

    <section class="intro-content ">
        <div class="constrain">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
        <div class="constrain">
            <?php the_content(); ?>
        </div>
    </section>

</article><!-- #post-<?php the_ID(); ?> -->

<?php if ( get_field( 'core_values_content' ) ) : ?>

    <section class="core-values ltgray-bg p45">
        <div class="constrain md">
            <div class="core-intro">
                <?php the_field( 'core_values_content' ); ?>
            </div>
            
            <?php if ( have_rows( 'core_values' ) ) : ?>
                <div class="values flexxed">
                    <?php while ( have_rows( 'core_values' ) ) : the_row(); ?>
                        <div class="core-value" style="background-image: url('<?php the_sub_field( 'core_value_background_image' ); ?>');">
                            <?php the_sub_field( 'core_value_content' ); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </section>

<?php endif; ?>

<section class="apply p60">
    <div class="constrain md">
        <h2>If our core values align with your thinking and work ethics, we’d love to hear from you!</h2>
        <p>Please send your resume and cover letter to <a href="mailto:ldelia@delianet.com">ldelia@delianet.com</a>. We look forward to hearing from you!</p>
        <a class="btn red-bg" href="mailto:ldelia@delianet.com"><i class="fa fa-paper-plane" aria-hidden="true"></i> CLICK HERE TO SHARE YOUR RESUME AND COVER LETTER</a>
    </div>
</section>