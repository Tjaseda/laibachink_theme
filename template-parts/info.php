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
$info_title = get_field('info_title', 5);
?>

<div id="info" class="page-section">
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
