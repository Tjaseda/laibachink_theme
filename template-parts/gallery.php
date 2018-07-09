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
$gallery_title = get_field('gallery_title', 5);
?>

<div id="galerija" class="page-section">
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

    <button type="button" class="button button__load-more"><?php esc_html_e( 'Vec Slik', 'laibachink' ); ?></button>
  </div>
</div>
