<?php
/**
 * The sidebar containing the secondary widget area, displays on homepage, archives and posts.
 *
 * If no active widgets in this sidebar, it will shows Recent Posts, Archives and Tag Cloud widgets.
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<h1>Institutes</h1>
<ul>
	<?php
		$args = array( 'posts_per_page' => 10, 'category' => 3 );
		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post );
	?>
			<li>
				<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_title(); ?></a>
			</li>
	<?php
		endforeach; 
		wp_reset_postdata();
	?>
</ul>