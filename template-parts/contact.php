<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package laibachink
 */
 $contact_id = get_field('contact_id', 5);
 $contact_title = get_field('contact_title', 5);
 $telephone_heading = get_field('telephone_heading', 5);
 $telephone_number = get_field('telephone_number', 5);
 $social_media_heading = get_field('social_media_heading', 5);
 $facebook_url = get_field('facebook_url', 5);
 $instagram_url = get_field('instagram_url', 5);
 $email_heading = get_field('email_heading', 5);
 $email_button_text = get_field('email_button_text', 5);
 $email_to = get_field('email_to', 5);

 $authors_rights = get_field('authors_rights', 5);
?>

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
