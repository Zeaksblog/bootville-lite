<?php
/**
 * Search Form Template
 *
 * @package bootville
 */
?>

<form method="get" class="form-search" action="<?php echo home_url( '/' ); ?>">
	<div class="row">
		<div class="col-lg-12">
			<div class="input-group">
				<input type="text" class="form-control search-query" name="s" placeholder="<?php esc_attr_e('search here &hellip;', 'bootville'); ?>" />
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'bootville'); ?>"><?php _e('Search', 'bootville'); ?></button>
				</span>
			</div><!-- .input-group -->
		</div><!-- .col-lg-12 -->
	</div><!-- .row -->
</form>