<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
		<?php if ( get_field( 'blog_page_banner', 'options' ) ) : ?>
            <div class="page-banner" style="background-image:url('<?php the_field( 'blog_page_banner', 'options' ); ?>');"></div>
        <?php endif; ?>

		<div class="constrain">
			<div class="p45">
				<h1 class="page-title"><?php the_field( 'blog_title', 'options' ); ?></h1>
			</div>
		</div>

		<section class="blog-wrapper constrain flexxed">
			<div class="blog-posts flexxed">
			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type( ) );

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
			</div>
			<div class="blog-sidebar"><?php get_sidebar(); ?></div>
		</section>
		</main><!-- #main -->
	</div><!-- #primary -->
	<!-- pagination -->
	<div class="constrain pagination">
		<h3>More from the Blog:</h3>
		<?php blog_pagination(); ?>
	</div>
	<!-- /pagination -->
<?php

get_footer();