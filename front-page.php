<?php
/**
 * Template Name: Landing Page
 *
 * @package laibachink
 */

get_header();
?>

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
