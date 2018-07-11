<?php
/**
 * Template Name: Landing Page
 *
 * @package laibachink
 */

get_header();
?>

		<nav id="site-navigation" class="primary-nav">
			<div class="container">
					<a class="toggle-nav" href="#">
						<div class="toggle-nav__line"></div>
					</a>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>

			</div>
		</nav><!-- #site-navigation -->

		</header><!-- #masthead -->

	<div id="content" class="site-content">

	<!-- LARGE-HERO PART -->
	<?php get_template_part( 'template-parts/large-hero'); ?>

	<!-- ABOUT-US PART -->
	<?php get_template_part( 'template-parts/about-us'); ?>

	<!-- GALLERY PART -->
	<?php get_template_part( 'template-parts/gallery'); ?>

	<!-- INFO PART -->
	<?php get_template_part( 'template-parts/info'); ?>

	<!-- PRODUCTS PART -->
	<?php get_template_part( 'template-parts/products'); ?>

	<!-- CONTACT PART -->
	<?php get_template_part( 'template-parts/contact'); ?>


<?php
get_footer();
