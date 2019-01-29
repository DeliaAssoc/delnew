<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Delia_Associates
 */

?>

<!-- article -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-block' ); ?>>

	<a class="post-image" title="<?php the_title(); ?>" href ="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

	<div class="post-wrapper">
		<a title="<?php the_title(); ?>" href ="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>

		<div class="blog-post-meta">
			<?php the_date(); ?> | 
			<?php the_author(); ?>
		</div>

		<div class="blog-snippet"><?php the_excerpt(); ?></div>

		<a href="<?php the_permalink(); ?>" class="view-article">Read More <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
	</div>

</article>
<!-- /article -->
