<?php
/**
 * The template for displaying full width pages.
 Template Name: Full Width
 *
 * @package bootville
 */

get_header(); ?>


	<div class="row">
		
	<div id="primary" class="col-lg-12 col-md-12">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	</div><!-- .row -->
<?php get_footer(); ?>
