<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="no-js ie ie7 lt-ie9 lt-ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="no-js ie ie8 lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="ATG Budismo">
    <meta name="keyword" content="ATG Budismo" />
    <meta name="author" content="Marcelo Marcelino">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- GOOGLE FONT -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
    <!-- FAVICON -->
	<link href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" rel="shortcut icon" />
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	
	<!-- BX SLIDER CSS -->
	<link href="<?php echo get_template_directory_uri(); ?>/assets/css/jquery.bxslider.css" rel="stylesheet" />

	<!-- CUSTOM CSS -->
	<link href="<?php echo get_template_directory_uri(); ?>/assets/css/custom.css" rel="stylesheet" />
</head>

<body <?php body_class(); ?>>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	<div class="container-fluid">
		<header id="header"class="navbar-fixed-top" role="banner">
			<nav id="main-navigation" class="container navbar navbar-default" role="navigation">
				<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'odin' ); ?>"><?php _e( 'Skip to content', 'odin' ); ?></a>
				<div class="navbar-header col-sm-4">
					<a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="navbar-brand">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img//logo.png" alt="ATG Budismo">
					</a>
					<button type="button" class="navbar-toggle  navbar-right" data-toggle="collapse" data-target=".navbar-main-navigation">
						<span class="sr-only"><?php _e( 'Toggle navigation', 'odin' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse navbar-main-navigation navbar-right">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'depth'          => 2,
								'container'      => false,
								'menu_class'     => 'nav navbar-nav',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);
					?>
					<?php get_search_form(); ?>
					<div class="col-md-1 col-sm-2 social">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Principal') ) : ?>
						<?php endif; ?>
						<?php 
							$languageCode = substr(get_bloginfo( 'language' ), 0, 2);
							if ($languageCode=='en') { 
								$faceUrl = 'https://www.facebook.com/atgbuddhism';
							} elseif ($languageCode=='pt') {
								$faceUrl = 'https://www.facebook.com/atgbudismo';
							}
						?>
						<a href="<?php echo $faceUrl; ?>" title="Facebook English" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/face_icon.png" alt="Facebook English">
						</a>
					</div>
				</div><!-- .navbar-collapse -->
			</nav><!-- #main-menu -->
		</header><!-- #header -->
	    <div id="main" class="site-main row">