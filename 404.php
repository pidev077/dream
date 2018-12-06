<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
?>
<?php get_header(); ?>
<?php $dream_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right'; ?>
<div class="no-header-image"></div>
<section class="bt-default-page bt-404-page bt-main-row <?php dream_get_content_class( 'main', $dream_sidebar_position ); ?>">
	<div class="container">
		<div class="row">

			<div class="content-area <?php dream_get_content_class( 'content', $dream_sidebar_position ); ?>">
				<div class="wrap-entry-404 text-center">
					<h1 class="entry-title fw-title-404"><?php esc_html_e( '404', 'dream' ); ?></h1>
					<h3 class="entry-title fw-title-404-sub"><?php esc_html_e( 'Ohh! Page not found', 'dream' ); ?></h3>
					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'dream' ); ?></p>
						<p><?php esc_html_e('Or go back to', 'dream') ?> <a href="<?php echo esc_attr(get_home_url()); ?>"><?php esc_html_e('Homepage.', 'dream') ?></a></p>
						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				</div>
			</div><!-- /.content-area-->

			<?php get_sidebar(); ?> 
		</div><!-- /.row-->
	</div><!-- /.container-->
</section>
<?php get_footer(); ?>
