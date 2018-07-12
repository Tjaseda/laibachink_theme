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

 $about_us_id = get_field('about_us_id');
 $about_us_title = get_field('about_us_title');
 $about_us_text = get_field('about_us_text');

 $gallery_id = get_field('gallery_id');
 $gallery_title = get_field('gallery_title');
 $show_more_text = get_field('show_more_text');
 $show_less_text = get_field('show_less_text');

 $info_id = get_field('info_id');
 $info_title = get_field('info_title');

 $products_id = get_field('products_id');
 $products_title = get_field('products_title');
 $about_products = get_field('about_products');

 $logo_1 = get_field('logo_1');
 $logo_2 = get_field('logo_2');
 $logo_3 = get_field('logo_3');

 $logo_1_link = get_field('logo_1_link');
 $logo_2_link = get_field('logo_2_link');
 $logo_3_link = get_field('logo_3_link');

 $contact_id = get_field('contact_id');
 $contact_title = get_field('contact_title');
 $telephone_heading = get_field('telephone_heading');
 $telephone_number = get_field('telephone_number');
 $social_media_heading = get_field('social_media_heading');
 $facebook_url = get_field('facebook_url');
 $instagram_url = get_field('instagram_url');
 $email_heading = get_field('email_heading');
 $email_button_text = get_field('email_button_text');
 $email_to = get_field('email_to');

 $authors_rights = get_field('authors_rights');

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

				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'toolbar',
				) );
				?>
			</div>
		</nav><!-- #site-navigation -->

		</header><!-- #masthead -->

	<div id="content" class="site-content">

	<!-- LARGE-HERO PART -->
	<div class="large-hero">
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
	          <a href="<?php echo $landing_page_primary_button_link; ?>" data-scroll="<?php echo $landing_page_primary_button_link; ?>"><button class="button button__primary"><?php echo $landing_page_primary_button_text; ?></button></a>
	        <?php endif; ?>
	        <?php if($landing_page_secondary_button_text): ?>
	          <a href="<?php echo $landing_page_secondary_button_link; ?>" data-scroll="<?php echo $landing_page_secondary_button_link; ?>"><button class="button button__secondary"><?php echo $landing_page_secondary_button_text; ?></button></a>
	          <?php endif; ?>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- ABOUT-US PART -->
	<div id="<?php echo $about_us_id; ?>" class="page-section" data-matching-link="#about-us-link">
	  <div class="wrapper">
	    <h2 class="page-section__title"><?php echo $about_us_title; ?></h2>
	    <?php echo $about_us_text; ?>
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

	<!-- GALLERY PART -->
	<div id="<?php echo $gallery_id; ?>" class="page-section" data-matching-link="#gallery-link">
	  <h2 class="page-section__title"><?php echo $gallery_title; ?></h2>

	  <div class="portfolio">

	    <div class="button__controlers">
	      <?php $all_categories = get_categories(array('hide_empty' => true)); ?>
	      <?php foreach($all_categories as $category): ?>
	        <!-- Output control button markup, setting the data-filter attribute as the category "slug" -->
	        <button type="button" class="button__menu portfolio__selector" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></button>
	      <?php endforeach; ?>
	    </div>

	    <div class="portfolio__container" data-ref="mixitup-container" id="container">

	      <?php
	      $args = array( 'post_type' => 'portfolio', 'posts_per_page' => 999, 'orderby' => 'publish_date', 'order' => 'DESC' );
	      $loop = new WP_Query( $args );
	      ?>

	      <?php
	      while ( $loop->have_posts() ) : $loop->the_post();
	      $categories = get_the_category();
	      $slugs = wp_list_pluck($categories, 'slug');
	      $class_names = join(' ', $slugs);

	      ?>
	      <div class="mix <?php if ($class_names) { echo ' ' . $class_names;} ?>" data-ref="mixitup-target" data-img='<?php the_post_thumbnail("portfolio_view", array( "class" => "portfolio__image-view", "alt" => $class_names." laibachink tattoo")) ?>'>
	        <?php the_post_thumbnail( 'portfolio_grid', array( 'class' => 'portfolio__image', 'alt' => $class_names.' laibachink tattoo'))?>
	        <div class="portfolio__overlay"></div>
	        <div class="portfolio__meta"><?php echo ' ' . $class_names; ?></div>
	      </div>
	      <?php endwhile; ?>
	    </div>

	    <!-- The Modal -->
	    <div id="modal" class="modal">

	      <!-- The Close Button -->
	      <span class="modal__close">&times;</span>

	      <div class="modal__card">
	        <div class="modal__wrap">
	          <!-- The Prev Button -->
	          <span class="modal__pointer modal__pointer-prev">&#10092;</span>
	          <div class="modal__wrap-image">
	            <!-- The Image -->
	          </div>
	          <!-- The Next Button -->
	          <span class="modal__pointer modal__pointer-next">&#10093;</span>
	        </div>
	      </div>
	    </div>

	    <button type="button" class="button button__load-more" data-less="<?php echo $show_less_text; ?>"><?php echo $show_more_text; ?></button>
	  </div>
	</div>

	<!-- INFO PART -->
	<div id="<?php echo $info_id; ?>" class="page-section" data-matching-link="#info-link">
		<h2 class="page-section__title"><?php echo $info_title; ?></h2>

		<?php
		$args = array( 'post_type' => 'faq', 'posts_per_page' => 999, 'orderby' => 'publish_date', 'order' => 'ASC' );
		$loop = new WP_Query( $args );
		$posts = get_posts($args);
		?>

		<div class="button__controlers">
			<?php foreach($posts as $key=>$post): ?>
				<button type="button" class="button__menu button__menu--info" data-selector="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></button>
			<?php endforeach ?>
		</div>
		<div class="faq__item-wrap">
			<?php
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
			<div class="faq__item" data-selected="<?php echo $post->post_title; ?>">
				<div class="wrapper">
					<?php the_content() ?>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>

	<!-- PRODUCTS PART -->
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


	<!-- CONTACT PART -->
	<div id="<?php echo $contact_id; ?>" class="page-section" data-matching-link="#contact-link">
		<h2 class="page-section__title"><?php echo $contact_title; ?></h2>

		<div class="wrapper">
			<div class="contact__item-wrap">
				<h3 class="page-section__subtitle"><?php echo $telephone_heading; ?></h3>
				<?php if($telephone_number): ?>
					<div class="contact__item">
						<img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/phone.svg" width="22px;" height="22px;" /><br />
						<div class="contact__item--text"><?php echo $telephone_number; ?></div>
					</div>
				<?php endif; ?>
			</div>
			<div class="contact__item-wrap">
				<h3 class="page-section__subtitle"><?php echo $social_media_heading; ?></h3>
				<div class="contact__item">
					<?php if($facebook_url): ?>
						<a href="<?php echo $facebook_url; ?>" target="_blank"><img class="contact__icon" src="<?php bloginfo('template_directory'); ?>/assets/images/icons/facebook.svg" width="25px;" height="25px;" /></a>
					<?php endif; ?>
					<?php if($instagram_url): ?>
						<a href="<?php echo $instagram_url; ?>" target="_blank"><img class="contact__icon" src="<?php bloginfo('template_directory'); ?>/assets/images/icons/instagram.svg" width="25px;" height="25px;" /></a>
					<?php endif; ?>
				</div>
			</div>
			<div class="contact__item-wrap">
				<h3 class="page-section__subtitle"><?php echo $email_heading; ?></h3>
				<div class="contact__item">
					<?php if($email_to): ?>
						<img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/email.svg" width="20px;" height="20px;" /><br />
						<a class="contact__item--text" href="mailto:<?php echo $email_to; ?>" target="blank"><?php echo $email_to; ?></a>
					<?php endif; ?>
				</div>
			</div>
			<hr class="contact__rights">
			<?php if($authors_rights): ?>
				<p class="contact__rights--statement"><?php echo $authors_rights; ?></p>
			<?php endif; ?>
		</div>
	</div>

<?php
get_footer();
