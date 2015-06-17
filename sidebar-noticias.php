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
<h1>Categorias</h1>
<ul>
	<?php 
		$languageCode = substr(get_bloginfo( 'language' ), 0, 2);
		$id_cat = 27;
		// $id_cat = 26;
		$taxonomies = array('category');
		$args = array(
		    'orderby'       => 'menu_order', 
		    'order'         => 'ASC',
		    'hide_empty'    => false,
		    'fields'        => 'all', 
		    'slug'          => '', 
		    'parent'         => $id_cat,
		    'hierarchical'  => true, 
		    'child_of'      => 1, 
		    'get'           => '', 
		    'name__like'    => '',
		    'pad_counts'    => false, 
		    'offset'        => '', 
		    'search'        => '', 
		    'cache_domain'  => 'core'
		);
		$cat = get_terms( $taxonomies, $args );
		foreach ( $cat as $category ) {
	?>
		<li>
			<div class="inner_carousel">
	            <a class="fotos_galeria" href="<?php echo get_term_link( $category, 'marca' ) ; ?>" title="<?php echo $category->name; ?>">
	            	<button><?php echo $category->name; ?></button>
	            </a>
	        </div>
        </li>
	<?php } ?>
</ul>

<h1>Facebook</h1>

<?php if ($languageCode=='en') : ?>
	<div class="fb-page" data-href="https://www.facebook.com/atgbuddhism" data-width="285" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
		<div class="fb-xfbml-parse-ignore">
			<blockquote cite="https://www.facebook.com/atgbuddhism">
				<a href="https://www.facebook.com/atgbuddhism">ATG - Association TathagataGarbha</a>
			</blockquote>
		</div>
	</div>
<?php elseif ($languageCode=='pt') : ?>
	<div class="fb-page" data-href="https://www.facebook.com/atgbudismo" data-width="285" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
		<div class="fb-xfbml-parse-ignore">
			<blockquote cite="https://www.facebook.com/atgbudismo">
				<a href="https://www.facebook.com/atgbudismo">ATG - Association TathagataGarbha</a>
			</blockquote>
		</div>
	</div>
<?php endif; ?>