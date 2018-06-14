<?php
/**
 * Template Name: Landing Page
 *
 * @package laibachink
 */

$landing_page_subtitle = get_field('landing_page_subtitle');
$landing_page_primary_button_text = get_field('landing_page_primary_button_text');
$landing_page_primary_button_link = get_field('landing_page_primary_button_link');
$landing_page_secondary_button_text = get_field('landing_page_secondary_button_text');
$landing_page_secondary_button_link = get_field('landing_page_secondary_button_link');

$about_us_text = get_field('about_us_text');

get_header();
?>

	<div class="large-hero">
		<picture>
			<source srcset="<?php bloginfo('template_directory'); ?>/assets/images/hero-image-large.jpg 1920w, <?php bloginfo('template_directory'); ?>/assets/images/hero-image-large-hi-dpi.jpg 3840w" media="(min-width:1366px)">
			<source srcset="<?php bloginfo('template_directory'); ?>/assets/images/hero-image-desktop.jpg 1366w, <?php bloginfo('template_directory'); ?>/assets/images/hero-image-desktop-hi-dpi.jpg 2732w" media="(min-width:720px)">
			<source srcset="<?php bloginfo('template_directory'); ?>/assets/images/hero-image-middle.jpg 720w, <?php bloginfo('template_directory'); ?>/assets/images/hero-image-middle-hi-dpi.jpg 1440w" media="(min-width:360px)">
			<img class="large-hero__image" srcset="<?php bloginfo('template_directory'); ?>/assets/images/hero-image-small.jpg 360w, <?php bloginfo('template_directory'); ?>/assets/images/hero-image-middle.jpg 720w" alt="Laibachink Tattoo">
		</picture>

		<div class="large-hero__text-content">
			<div class="wrapper">
				<div class="large-hero__logo">
					<img class="logo" src="<?php bloginfo('template_directory'); ?>/assets/images/icons/logo.svg" alt?"logo">
				</div>
	 			<?php
	 			the_custom_logo();
	 				?>
	 				<h1 class="large-hero__title"><?php bloginfo( 'name' ); ?></h1>

					<?php if($landing_page_subtitle): ?>
					<p class="large-hero__span"><?php echo $landing_page_subtitle; ?></p>
				<?php endif; ?>

					<div class="large-hero__buttons">
						<?php if($landing_page_primary_button_text): ?>
						<button href="<?php echo $landing_page_primary_button_link; ?>" class="button button__primary"><?php echo $landing_page_primary_button_text; ?></button>
					<?php endif; ?>
					<?php if($landing_page_secondary_button_text): ?>
						<button href="<?php echo $landing_page_secondary_button_link; ?>" class="button button__secondary"><?php echo $landing_page_secondary_button_text; ?></button>
						<?php endif; ?>
				</div>
			</div>
 		</div>
	</div>

	<div id="o-nas" class="page-section">
		<div class="container">
			<div class="wrapper">
				<h2 class="page-section__title">O nas</h2>
				<p class="page-section__text"><?php echo $about_us_text; ?></p>
			</div>
		</div>
		<div class="team-profile">
			<?php
			$args = array( 'post_type' => 'team', 'posts_per_page' => 3, 'orderby' => 'publish_date', 'order' => 'ASC' );
			$loop = new WP_Query( $args );
			?>

			<?php
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
			<div class="team-profile__wrap">
					<?php $thumb = get_the_post_thumbnail_url(); ?>
					<img class="team-profile__image team-profile__image--top" src="<?php echo $thumb; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />

					<?php $member_image = get_field('member_switch_photo'); ?>
					<?php if($member_image): ?>
						<img class="team-profile__image team-profile__image--bottom" src="<?php echo $member_image; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					<?php endif; ?>


				<h2 class="team-profile__name"><?php the_title(); ?></h2>
				<p class="team-profile__position"><?php the_field('position'); ?></p>

				<?php if (get_field('facebook_link')): ?>
					<a class="team-profile__social" href="<?php echo get_field('facebook_link'); ?>" target="_blank" title="<?php the_title(); ?> Facebook"><img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/facebook.svg" width="15px;" height="15px;" /></a></button>
				<?php endif; ?>
				<?php if (get_field('dc_link')): ?>
					<a class="team-profile__social" href="<?php echo get_field('dc_link'); ?>" target="_blank" title="<?php the_title(); ?> DC"><img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/dcicon.svg" width="15px;" height="15px;" /></a>
				<?php endif; ?>
				<?php if (get_field('instagram_link')): ?>
					<a class="team-profile__social" href="<?php echo get_field('instagram_link'); ?>" target="_blank" title="<?php the_title(); ?> Instagram"><img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/instagram.svg" width="15px;" height="15px;" /></a>
				<?php endif; ?>

			</div>
			<?php endwhile; ?>
		</div>
	</div>

	<div id="galerija" class="page-section">
		<h2 class="page-section__title">Galerija</h2>

		<div class="portfolio">

			<div class="button__controlers">
					<button type="button" class="button__menu" data-filter="all">Vsi</button>
				<?php $all_categories = get_categories(array('hide_empty' => true)); ?>
				<?php foreach($all_categories as $category): ?>
					<!-- Output control button markup, setting the data-filter attribute as the category "slug" -->
					<button type="button" class="button__menu" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></button>
				<?php endforeach; ?>
			</div>

			<div class="portfolio__container" data-ref="mixitup-container" id="container">

				<?php
				$args = array( 'post_type' => 'portfolio', 'posts_per_page' => 12, 'orderby' => 'publish_date', 'order' => 'DESC' );
				$loop = new WP_Query( $args );
				?>

				<?php
				while ( $loop->have_posts() ) : $loop->the_post();
				$categories = get_the_category();
        $slugs = wp_list_pluck($categories, 'slug');
        $class_names = join(' ', $slugs);
				?>
		    <div class="mix <?php if ($class_names) { echo ' ' . $class_names;} ?>" data-ref="mixitup-target"><?php the_post_thumbnail( 'portfolio_grid', array( 'class' => 'portfolio__image' )); ?></div>
				<?php endwhile; ?>
  	</div>

	</div>
</div>

<?php
get_footer();
