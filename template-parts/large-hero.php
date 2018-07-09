<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package laibachink
 */

 $landing_page_subtitle = get_field('landing_page_subtitle', 5);
 $landing_page_primary_button_text = get_field('landing_page_primary_button_text', 5);
 $landing_page_primary_button_link = get_field('landing_page_primary_button_link', 5);
 $landing_page_secondary_button_text = get_field('landing_page_secondary_button_text', 5);
 $landing_page_secondary_button_link = get_field('landing_page_secondary_button_link', 5);
?>

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
          <a href="<?php echo $landing_page_primary_button_link; ?>"><button class="button button__primary"><?php echo $landing_page_primary_button_text; ?></button></a>
        <?php endif; ?>
        <?php if($landing_page_secondary_button_text): ?>
          <a href="<?php echo $landing_page_secondary_button_link; ?>"><button class="button button__secondary"><?php echo $landing_page_secondary_button_text; ?></button></a>
          <?php endif; ?>
      </div>
    </div>
  </div>
</div>
