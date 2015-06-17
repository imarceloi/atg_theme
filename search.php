<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Odin
 * @since 2.2.0
 */
get_header(); ?>
	<div id="primary" class="container">
		<div id="content" class="site-content" role="main">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'odin' ), get_search_query() ); ?></h1>
				</header>
					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();
					?>
					<article id="post-<?php the_ID(); ?>" class="col-md-4 col-sm-6 col-xs-12">
						<div class="texto_institutes resultado_busca">
							<a href="<?php echo esc_url( get_permalink() ) ;?>" rel="bookmark">
								<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									} else {
										echo '<img src="'.get_template_directory_uri().'/assets/img/bg_search.jpg" alt="">';
									}
									$excerpt = get_the_excerpt();
									
									echo 'Em: '; the_category(' ');
									the_title( '<h1>', '</h1>' );
									echo string_limit_words($excerpt,15);
									//the_excerpt();
								?>
							</a>
						</div>
					</article>
					<?php
							//get_template_part( 'content', get_post_format() );
						endwhile;
						// Post navigation.
						odin_paging_nav();
					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );
				endif;
			?>
		</div>
	</section>
</div>
<?php
get_footer();
