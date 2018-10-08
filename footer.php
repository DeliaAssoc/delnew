<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Delia_Associates
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="top-footer p30">
			<div class="constrain sm flexxed">
				<?php wp_nav_menu( 'footer_menu' ); ?>
			</div>
		</div>
		<div class="bottom-footer p45">
			<div class="constrain md flexxed">
				<div class="bf-left half">
					<div class="social-media">
						<?php social_media_list(); ?>
					</div>
					<div class="legal-info">
						&copy;1964-<?php echo date( 'Y' ); ?> <?php echo get_bloginfo( 'name' ); ?>. All rights reserved.
					</div>
				</div>
				<div class="bf-right half">
					<h3>General Inquiries:</h3>
					<?php if ( get_theme_mod( 'theme_company_email' ) ) : ?>
						<a href="<?php echo get_theme_mod( 'theme_company_email' ); ?>"><?php echo get_theme_mod( 'theme_company_email' ); ?></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'theme_company_street' ) ) : ?>
						<div class="location">
							<?php echo get_theme_mod( 'theme_company_street' ); ?>, <?php echo get_theme_mod( 'theme_company_city' ); ?>, <?php echo get_theme_mod( 'theme_company_state' ); ?> <?php echo get_theme_mod( 'theme_company_zip' ); ?>
						</div>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'theme_company_phone' ) ) : ?>
						Phone: <a href="<?php echo get_theme_mod( 'theme_company_phone' ); ?>"><?php echo get_theme_mod( 'theme_company_phone' ); ?></a>
						<?php if ( get_theme_mod( 'theme_company_fax' ) ) : ?>
							<div class="fax">Fax: <?php echo get_theme_mod( 'theme_company_fax' ); ?></div>
						<?php endif; ?>

					<?php endif; ?>
				</div>
			</div>
		</div><!-- .flexxed -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
