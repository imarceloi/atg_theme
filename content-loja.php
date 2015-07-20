<?php
/**
 * Template Name: Loja
 *
 * @package Odin
 * @since 2.2.0
 */
get_header();
?>

	<?php

		$loopdestaques = array(
			'post_type' => 'destaque',
			'order' => 'ASC',
		);
		$loopdestaques = new WP_Query( $loopdestaques );
		if ($loopdestaques->have_posts()) :
			while ( $loopdestaques->have_posts() ) : $loopdestaques->the_post();
			$pegaBg = wp_get_attachment_url(get_post_thumbnail_id());
			$content = get_the_content();
	?>
	<li style="background-image: url(<?php echo $pegaBg ;?>);">
		<img src="<?php echo $pegaBg ;?>" title="<?php echo get_the_title() ?>" />
	</li>
	<?php
			endwhile; 
		endif;
		wp_reset_query();
	?>
<?php 
get_footer();
