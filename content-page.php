<?php
/**
 * The template used for displaying page content.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="infos_box">
			<?php 
				the_title('<h1>', '</h1>');
				$customField = get_post_meta( get_the_ID(), 'legenda_banners', true );
				if( ! empty( $customField ) ) {
				  echo $customField;
				}
			?>
		</div>
	</div>
	<div class="banner" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>);"></div>
	<div class="container texto_content">
		<?php the_content(); ?>
	</div>
</article><!-- #post-## -->
