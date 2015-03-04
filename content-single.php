<?php
/**
 * @package bootville
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php bootville_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

	<?php
		// Display author bio if post isn't password protected
		if ( ! post_password_required() ) : ?>
		
		<?php if ( get_the_author_meta('description') != '' ) : ?>       
			<div class="author-meta well well-lg">
				<div class="media">
					<div class="media-object pull-left">
						<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta( 'ID' ), 80 ); }?>
					</div>
					<div class="media-body">
						<h5 class="media-heading"><?php the_author_posts_link(); ?></h5>
						<p><?php the_author_meta('description') ?></p>
						<?php
						// Retrieve a custom field value
						$twitterHandle = get_the_author_meta('twitter'); 
						$fbHandle = get_the_author_meta('facebook');
						$gHandle = get_the_author_meta('gplus');
						?>
						<p> 
							<?php if ( get_the_author_meta('twitter') != '' ) : ?>
							<a href="http://twitter.com/<?php echo $twitterHandle; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
						<?php endif; // no twitter handle ?>

							<?php if ( get_the_author_meta('facebook') != '' ) : ?>
							<a href="<?php echo $fbHandle; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
							<?php endif; // no facebook url ?>

							<?php if ( get_the_author_meta('gplus') != '' ) : ?>
							<a href="/<?php echo $gHandle; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
							<?php endif; // no google+ url ?>
						</p>
					</div>
				</div>
			</div><!-- end of #author-meta -->
        <?php endif; // no description, no author's meta ?>
			
	<?php
		//end password protection check 
	endif; ?>
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bootville' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'bootville' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
