<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
// require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
require_once get_template_directory() . '/core/classes/class-post-type.php';
require_once get_template_directory() . '/core/classes/class-taxonomy.php';
// require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since  2.2.0
	 *
	 * @return void
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' )
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );

		/**
		 * Support The Excerpt on pages.
		 */
		// add_post_type_support( 'page', 'excerpt' );
	}
}

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Sidebar Principal', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'odin_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// Twitter Bootstrap.
	wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/libs/bootstrap.min.js', array(), null, true );

	// General scripts.
	// FitVids.
	wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array(), null, true );

	// Carousel HOME
	wp_enqueue_script( 'carousel', $template_url . '/assets/js/libs/jquery.bxslider.min.js', array(), null, true );
	
	// Mascara telefone.
	wp_enqueue_script( 'mask', $template_url . '/assets/js/libs/maskedinput.js', array(), null, true );

	// Actions jQuery.
	wp_enqueue_script( 'odin-main', $template_url . '/assets/js/actions.js', array(), null, true );

	// Grunt main file with Bootstrap, FitVids and others libs.
	// wp_enqueue_script( 'odin-main-min', $template_url . '/assets/js/main.min.js', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function odin_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}

add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/plugins-support.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';

// CUSTOM POST PARA OS BANNERS DA HOME
function home_destaque() {
    $home_destaque = new Odin_Post_Type(
        'Destaque', // Nome (Singular) do Post Type.
        'destaque' // Slug do Post Type.
    );
    $home_destaque->set_labels(
        array(
            'menu_name' => __( 'Destaque Home', 'odin' )
        )
    );
    $home_destaque->set_arguments(
        array(
            'supports'				=> array( 'title', 'editor', 'thumbnail' ),
            'menu_icon' 			=> get_template_directory_uri() . '/assets/img/icone_destaques.png',
            'exclude_from_search' 	=> true
        )
    );
}
add_action( 'init', 'home_destaque', 1 );


// CUSTOM POST PARA OS ITENS DO DÚVIDAS FREQUENTES
function loja() {
    $loja = new Odin_Post_Type(
        'Loja', // Nome (Singular) do Post Type.
        'loja' // Slug do Post Type.
    );
    $loja->set_labels(
        array(
            'menu_name' => __( 'Loja', 'odin' )
        )
    );
    $loja->set_arguments(
        array(
    		'supports' 				=> array( 'title', 'editor', 'categories', 'thumbnail', 'excerpt' ),
            'exclude_from_search' 	=> true,
            'menu_icon' 			=> get_template_directory_uri() . '/assets/img/icone_loja.png'
        )
    );
}
add_action( 'init', 'loja', 1 );

function itens_loja() {

	$labels = array(
		'name'                       => _x( 'Itens Loja', 'atg_budismo' ),
		'singular_name'              => _x( 'Item', 'atg_budismo' ),
		'menu_name'                  => __( 'Itens Loja', 'atg_budismo' ),
		'all_items'                  => __( 'Todas os Itens', 'atg_budismo' ),
		'parent_item'                => __( 'Parente Itens', 'atg_budismo' ),
		'parent_item_colon'          => __( 'Parente Item', 'atg_budismo' ),
		'new_item_name'              => __( 'Nova Item', 'atg_budismo' ),
		'add_new_item'               => __( 'Adicionar Item', 'atg_budismo' ),
		'edit_item'                  => __( 'Editar Item', 'atg_budismo' ),
		'update_item'                => __( 'Atualizar Item', 'atg_budismo' ),
		'separate_items_with_commas' => __( 'Separate items', 'atg_budismo' ),
		'search_items'               => __( 'Buscar Itens', 'atg_budismo' ),
		'add_or_remove_items'        => __( 'Adicionar ou Remover Itens', 'atg_budismo' ),
		'choose_from_most_used'      => __( 'Selecionar itens mais usados', 'atg_budismo' ),
		'not_found'                  => __( 'Nada encontrado', 'atg_budismo' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'rewrite' 					 => array('hierarchical' => true),
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'query_var'                  => 'tax_itens',
	);
	register_taxonomy( 'itens_loja', 'loja', $args );
}
// Hook into the 'init' action
add_action( 'init', 'itens_loja', 1 );

// OCULTANDO A BARRA ADMIN NO FRONT
// add_filter('show_admin_bar', '__return_false');

// LIMIT EXCERPT
function string_limit_words($string, $word_limit)
{
  	$words = explode(' ', $string, ($word_limit + 1));
  	if(count($words) > $word_limit)
	array_pop($words);
  	return implode(' ', $words);
}