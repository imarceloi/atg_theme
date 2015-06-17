<?php
/**
 * The template for displaying Category pages.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
<?php 
	// $category = get_the_category()[0]->slug; 
	$getCategory = get_the_category();
	$category = $getCategory[0]->slug;
	// echo "<pre>"; print_r($category); echo "</pre>";
?>
	<div id="primary">
		<div id="content" class="site-content" role="main">
			<section id="post-<?php the_ID(); ?>" class="<?php echo $category ; ?>">
			<?php if ( have_posts() ) : ?>
				<div class="banner banner_news" style="background-image: url(<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>);">
					<div class="container content_banner_news">
						<div class="infos_box">
							<h1><?php single_cat_title(); ?></h1>
							<?php 
								$term_description = term_description();
								if ( ! empty( $term_description ) ) :
									echo $term_description;
								endif;
							?>
						</div>
					</div>
				</div>
				<div class="container">
					<?php
						// Start the Loop.
						if ($category == 'institutes') :
							while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
							endwhile;
						else :
						echo '<div class="col-md-9 list_noticias">';
							while ( have_posts() ) : the_post();
							get_template_part( 'content', 'noticias' );
							endwhile;
						echo '</div>';
					?>
							<aside id="secondary" class="col-md-3 sidebar_noticias" role="complementary">
								<?php get_sidebar('noticias'); ?>
							</aside>
				<?php
						endif;
					else :
							// If no content, include the "No posts found" template.
							get_template_part( 'content', 'none' );
				?>
				</div>
			<?php endif; ?>
			</section>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php
get_footer();
