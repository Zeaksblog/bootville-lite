<?php
/**
 * The template for displaying all single posts.
 *
 * @package bootville
 */

get_header(); ?>

	<div class="row">

	<div id="primary" class="col-md-8 col-lg-8">
		<main id="main" class="site-main" role="main">		
	  <!-- breadcrumbs -->
      <?php
        if ( function_exists('bootville_breadcrumbs') )
          bootville_breadcrumbs();
      ?>	

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php bootville_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
