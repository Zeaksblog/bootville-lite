<?php
/* Borrowed from Presentation Lite Theme */
define( 'BOOTVILLE_LITE_NAME', 'Bootville Lite' );
define( 'BOOTVILLE_IMG', get_template_directory_uri() . '/inc/images/' );

/**
 * admin page
 */
define( 'BOOTVILLE_FULL_NAME', 'Bootville' );

/***********************************************
* menu item
***********************************************/

function bootville_license_menu() {
	add_theme_page( BOOTVILLE_LITE_NAME, BOOTVILLE_LITE_NAME, 'manage_options', 'bootville-lite', 'bootville_lite_admin' );
}
add_action('admin_menu', 'bootville_license_menu');


/***********************************************
* admin styles
***********************************************/

function bootville_lite_admin_styles() {	
	wp_enqueue_style( 'bootville-lite-admin-style', get_template_directory_uri() . '/inc/css/admin.css' );
}
add_action( 'admin_print_scripts-appearance_page_bootville-lite', 'bootville_lite_admin_styles' );


/***********************************************
* admin page output
***********************************************/

function bootville_lite_admin() { ?>
	<div class="wrap upgrade-wrap">
		<h2 class="headline"><?php echo sprintf( __( 'Upgrade to the Full-Featured Version of %1$s!', 'bootville_lite' ), BOOTVILLE_FULL_NAME ); ?></h2>
		<p>
			<?php echo sprintf(__( 'You are currently using the <strong>LITE</strong> version of %1$s. Upgrade to the full-featured version of %1$s for more options, <strong>Homepage Template with drag and drop layout editor </strong>, more color schemes, Sortable Portfolio Template, 200+ Google fonts, typography options, sidebar layouts, and more!', 'bootville_lite' ), BOOTVILLE_FULL_NAME	); 
			?>
		</p>
		<p><a class="cta-button" href="http://www.themes.zeaks.org/themes/bootville" target="_blank"><?php echo sprintf(__( 'View the Full Version of %1$s', 'bootville_lite' ), BOOTVILLE_FULL_NAME ); ?></a></p>
		<p><?php echo BOOTVILLE_LITE_NAME . __( ' users get 25% off by using Coupon Code: <strong>LITE25</strong> at checkout.', 'bootville_lite' ); ?></p>
		<div class="screenshot">
			<img class="bootville-screenshot" src="<?php echo BOOTVILLE_IMG . 'bootville-full.png'; ?>" alt="Bootville">
		</div>
	</div>
	<?php
	/*
	 * only show child theme instructions if Bootville Lite is the active theme
	 */
	 $bootville_lite = wp_get_theme();
	 if ( $bootville_lite->get( 'Name' ) === 'Bootville Lite' ) : ?>
	
		<div class="wrap child-theme-wrap">
			<h2 class="headline"><?php echo sprintf( __( 'How to Create a Child Theme for %1$s', 'bootville_lite' ), BOOTVILLE_LITE_NAME ); ?></h2>
			<ol>
				<li><?php _e( 'Through FTP, navigate to <code>your_website/wp-content/themes/</code> and in that directory, create a new folder using the name of your child theme. Example: <code>bootville-lite-child</code>.', 'bootville_lite' ); ?></li>
				<li><?php _e( 'Inside of your new folder, create a file called <code>style.css</code>.', 'bootville_lite' ); ?></li>
				<li><?php _e( 'Inside of your new <code>style.css</code> file, add the following CSS:', 'bootville_lite' ); ?>
				
<pre class="bootville-pre">
/*
	Theme Name: your_child_theme_name
	Author: your_name
	Author URI: 
	Description: Child theme for Bootville Lite
	Template: bootville-lite
*/

@import url("../bootville-lite/style.css");

/*--------------------------------------------------------------
Theme customization starts here
--------------------------------------------------------------*/
</pre>
				</li>
				<li><?php _e( 'You may edit all of the above code EXCEPT for the <code>Template</code> line as well and the <code>@import</code> line. The template line tells your child theme what parent theme templates to use, the @import line tells your child theme what stylesheet to use as a base.', 'bootville_lite' ); ?></li>
				<li><?php _e( 'With your new child theme folder in place and the above CSS pasted inside of your <code>style.css</code> file, go back to your WordPress dashboard and navigate to "Appearance -> Themes" and locate your new theme. Activate your new child theme.', 'bootville_lite' ); ?></li>
				<li><?php _e( 'With your child theme activated, you can edit its stylesheet all you like. You may also create a <code>functions.php</code> file in the root of your child theme to add custom PHP.', 'bootville_lite' ); ?></li>
				<li><?php _e( 'Recommended plugins Image Slider: <a href="https://wordpress.org/plugins/cpt-bootstrap-carousel/" target="_blank">CPT Bootstrap Carousel</a> Bootstrap Shortcodes: <a href="https://wordpress.org/plugins/bootstrap-3-shortcodes/" target="_blank">Bootstrap 3 Shortcodes</a>' ); ?>
				<li><?php _e( 'For questions on modifying your theme and other Bootville resources please visit <a href="http://zeaks.org" target="_blank">http://zeaks.org</a>', 'bootville_lite' ); ?></li>
			</ol>
		</div>
		
	<?php endif;
}