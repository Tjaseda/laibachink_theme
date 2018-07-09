<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package laibachink
 */

?>

<?php
$about_us_title = get_field('about_us_title', 5);
$about_us_text = get_field('about_us_text', 5);
?>

<div id="o-nas" class="page-section">
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
