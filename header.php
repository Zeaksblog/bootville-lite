<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package bootville
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrap container" role="document">

<div id="page" class="hfeed site">
<div class="row">
	<header id="masthead" class="site-header" role="banner">
	
			<div class="col-md-6 col-lg-6">
				<span class="pull-left">
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</span>
			</div>		
			<!-- social menu -->
			<div class="col-md-6 col-lg-6"><span class="pull-right">
				<?php if ( has_nav_menu( 'social' ) ) {

					wp_nav_menu(
						array(
							'theme_location'  => 'social',
							'container'       => 'div',
							'container_id'    => 'menu-social',
							'container_class' => 'menu',
							'menu_id'         => 'menu-social-items',
							'menu_class'      => 'menu-items',
							'depth'           => 1,
							'link_before'     => '<span class="screen-reader-text">',
							'link_after'      => '</span>',
							'fallback_cb'     => '',
						)
					);

				} ?>
			</div>
			</span>
		
	</header>
</div> <!--.row-->

			<nav role="navigation">
				<div class="main-menu navbar navbar-default">					
					<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					<!-- display site title in mobile menu -->
						<a class="navbar-brand visible-xs-inline-block" href="<?php echo esc_url( home_url() ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="homepage"><?php bloginfo( 'name' ) ?></a>
					</div>

					<div class="navbar-collapse collapse navbar-responsive-collapse">
						<?php

						wp_nav_menu( array(
							'theme_location' => 'primary',
							'depth'      => 2,
							'container'  => false,
							'menu_class'     => 'nav navbar-nav',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						);

						?>
					</div>
				</div>           
			</nav>

			<!-- Show cpt-bootstrap-carouselplugin if active, show header image if it's not -->
			<?php if (function_exists('cptbc_columns_head')) { ?>

				<div class="header-image">
					<?php echo do_shortcode('[image-carousel]'); ?>
				</div> <!-- .header-image -->

			<?php } else {

			$header_image = get_header_image();
			if ( ! empty($header_image) ) { ?>

				<div class="header-image">
					<img src="<?php header_image(); ?>" />
				</div> <!-- .header-image -->

			<?php } } ?>

<div id="content" class="site-content">