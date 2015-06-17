<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<?php if ( is_single() ) :
	// $category = get_the_category()[0]->slug;
	$getCategory = get_the_category();
	$category = $getCategory[0]->slug;
?>
	<article id="post-<?php the_ID(); ?>">
		<div class="banner" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>);">
			<div class="container <?php if ($category == 'institutes') : ?>banner_institutes <?php endif; ?>">
				<div class="infos_box">
					<?php
						the_title( '<h1>', '</h1>' );
						if ($category == 'institutes') :
							the_excerpt();
						endif;
					?>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="col-md-9">
				<?php the_content(); ?>
			</div>
			<?php if ($category == 'institutes') :?>
			<aside id="secondary" class="col-md-3" role="complementary">
				<?php get_sidebar(); ?>
			</aside>
			<?php else : ?>
			<aside id="secondary" class="col-md-3 sidebar_noticias" role="complementary">
			<?php get_sidebar('noticias'); ?>
			</aside>
			<?php endif; ?>
		</div>
	</article>
<?php else : ?>
		<article id="post-<?php the_ID(); ?>" class="col-md-3 col-sm-6 col-xs-12">
			<div class="texto_institutes">
				<a href="<?php echo esc_url( get_permalink() ) ;?>" rel="bookmark">
					<?php the_title( '<h1>', '</h1>' ); ?>
					<?php the_excerpt(); ?>
				</a>
			</div>
		</article>
<?php endif; ?>
