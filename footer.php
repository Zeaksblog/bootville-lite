<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package bootville
 */
?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="footer-widgets row">
				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>

				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>

				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
			</div><!--row-->
	
			<div class="row credits">
						<div class="col-md-6 col-lg-6">
							<?php if (has_nav_menu('footer-menu', 'bootville')) { ?>
								<nav role="navigation">
								<?php wp_nav_menu(array(
								  'container'       => '',
								  'menu_class'      => 'footer-menu',
								  'theme_location'  => 'footer-menu')
								); 
								?>
							  </nav>
							<?php } ?>
						</div>
					<div class="col-md-6 col-lg-6">
				<p class="copyright">&copy; <?php _e('Copyright', 'bootville'); ?> <?php echo date('Y'); ?> - <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
				</div>
			</div><!-- .row -->	
	</footer><!-- #colophon -->

</div><!-- #wrap -->

<?php wp_footer(); ?>

</body>
</html>