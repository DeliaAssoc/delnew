<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Delia_Associates
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Slick.js added here due to conflict with responsive menu -->
	<script  async='async' src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>

	<?php wp_head(); ?>

	<?php if ( get_field( 'additional_page_styling' ) == 'yes' ) : ?>
		<style>
			<?php the_field( 'css_styling' ); ?>
		</style>
	<?php endif; ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'del' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="constrain">
			<div class="flexxed">
				<div class="header-left">
					<div class="site-branding">
						<a href="/" class="logo">
							<img src="<?php echo get_theme_mod( 'theme_logo' ); ?>" alt="Delia Logo">
						</a>
						<div class="tagline">
							<?php echo get_theme_mod( 'theme_tagline' ); ?>
						</div>
					</div><!-- .site-branding -->
				</div>
				<div class="header-right">
					<a class="contact-phone" href="tel:<?php echo get_theme_mod( 'theme_company_phone' ); ?>"><?php echo get_theme_mod( 'theme_company_phone' ); ?></a>
					<div class="header-cta" style="background-color:<?php the_field( 'header_call_to_action_bg_color', 'options' ); ?>;">
						<a href="<?php the_field( 'header_call_to_action_link', 'options' ); ?>"><?php the_field( 'header_call_to_action_text', 'options' ); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
					</div>
					<a class="menu-toggle" href="#"></a>
				</div>
			</div>
		</div>
		<nav id="site-navigation" class="main-navigation">
			<div class="constrain">
				<div id="close-menu" class="close-menu"></div>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'main-menu',
					) );
				?>
				</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">