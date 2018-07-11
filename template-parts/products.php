<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package laibachink
 */
 $products_id = get_field('products_id', 5);
 $products_title = get_field('products_title', 5);
 $about_products = get_field('about_products', 5);

 $logo_1 = get_field('logo_1', 5);
 $logo_2 = get_field('logo_2', 5);
 $logo_3 = get_field('logo_3', 5);

 $logo_1_link = get_field('logo_1_link', 5);
 $logo_2_link = get_field('logo_2_link', 5);
 $logo_3_link = get_field('logo_3_link', 5);
?>

<div id="<?php echo $products_id; ?>" class="page-section" data-matching-link="#products-link">
	<h2 class="page-section__title"><?php echo $products_title; ?></h2>

	<div class="wrapper">

		<?php if($about_products): ?>
			<?php echo $about_products; ?>
		<?php endif; ?>

		<div class="product__partners">

			<hr class="product__line" />

			<div class="product__partner">
				<?php if($logo_1): ?>
					<a href="<?php echo $logo_1_link; ?>" target="_blank"><img class="product__partner--item" src="<?php echo $logo_1; ?>" alt="Carantania tattoo logo" /></a>
				<?php endif; ?>
			</div>

			<div class="product__partner">
				<?php if($logo_2): ?>
					<a href="<?php echo $logo_2_link; ?>" target="_blank"><img class="product__partner--item" src="<?php echo $logo_2; ?>" alt="Čebula media logo" /></a>
				<?php endif; ?>
			</div>

			<div class="product__partner">
				<?php if($logo_3): ?>
					<a href="<?php echo $logo_3_link; ?>" target="_blank"><img class="product__partner--item" src="<?php echo $logo_3; ?>" alt="DC Ink Booster logo" /></a>
				<?php endif; ?>
			</div>

			<hr class="product__line" />

		</div>

	</div>
</div>
