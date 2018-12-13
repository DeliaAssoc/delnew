<?php
/**
 * Template Name: Homepage Template
 */

get_header();
?>

	<div id="youtube-modal" class="home-modal">
		<div class="modal-video">
			<span class="close">&times;</span>
			<div class="responsive">
				<iframe width="700" height="394" src="https://www.youtube.com/embed/KVaa6w3Hzxk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			</div>
		</div>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'homepage' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
