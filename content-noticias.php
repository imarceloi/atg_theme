<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
	// $category = get_the_category()[0]->slug; 
	// $category = get_the_category()->slug;
	$getCategory = get_the_category();
	$category = $getCategory[0]->slug;
	// echo $category;
?>

<?php if ( is_single() ) : ?>
	<article id="post-<?php the_ID(); ?>">
		<div class="container">
			<div class="infos_box">
				<?php the_title( '<h1>', '</h1>' ); ?>
				<?php the_excerpt(); ?>
			</div>
		</div>
		<div class="banner" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>);"></div>
		<div class="container">
			<div class="col-md-9">
				<?php the_content(); ?>
			</div>
			<aside id="secondary" class="col-md-3" role="complementary">
				<?php get_sidebar(); ?>
			</aside>
		</div>
	</article>
<?php else : ?>
	<?php 
		// SE FOR A CATEGORIA INSTITUTES
		if ($category == 'institutes') :
	?>
		<article id="post-<?php the_ID(); ?>" class="col-md-3 col-sm-6 col-xs-12">
			<div class="texto_institutes">
				<a href="<?php echo esc_url( get_permalink() ) ;?>" rel="bookmark">
					<?php the_title( '<h1>', '</h1>' ); ?>
					<?php the_excerpt(); ?>
				</a>
			</div>
		</article>
	<?php
		// SE NÃO FOR A INSTITUTOS (VAI SER A NOTICIAS)
		else :
	?>
		<article id="post-<?php the_ID(); ?>" class="col-md-12 int_noticias">
			<a href="<?php echo esc_url( get_permalink() ) ;?>" rel="bookmark">
				<span>+</span>
				<img class="img_post" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"/>
			</a>
			<?php the_title( '<h1>', '</h1>' ); ?>
			<span>Postado em: <b><?php echo the_date('d_m_Y'); ?></b></span>
			<?php the_excerpt(); ?>
			<footer>
				<a href="<?php echo esc_url( get_permalink() ) ;?>">Continue Lendo...</a>
			</footer>
		</article>
	<?php endif; ?>
<?php endif; ?>
