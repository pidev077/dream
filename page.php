<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */
global $post; $_FW = defined( 'FW' );
get_header();
dream_title_bar();
$dream_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';

/* START - custom size container variable */
$content_class = 'content'; $sidebar_template = '';
$page_section_space = '';
if ( $_FW ) {
	$page_container_size = fw_get_db_post_option($post->ID, 'container_size', '');
	$page_section_space = fw_get_db_post_option($post->ID, 'section_space', '');
	switch ($page_container_size) {
		case 'container-large': $content_class = 'fully'; $sidebar_template = 'fully-template'; break;
	}
}
/* END - custom size container variable */
?>
<section class="bt-default-page bt-main-row bt-section-space <?php echo esc_attr($page_section_space); ?><?php dream_get_content_class( 'main', $dream_sidebar_position ); ?>" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="container <?php echo esc_attr( ($content_class == 'fully') ? 'container-fully' : '' ); ?>">
		<div class="row">
			<div class="bt-content-area <?php dream_get_content_class( $content_class, $dream_sidebar_position ); ?>">
				<div class="bt-inner">
					<?php // if( function_exists('fw_ext_breadcrumbs') && bearsthemes_check_is_bbpress() == '' ) fw_ext_breadcrumbs(); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="page-<?php the_ID(); ?>" class="post post-details" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
							<div class="inner">
								<div class="entry-content" itemprop="text">
									<?php
									the_content();
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'dream' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									) );
									?>
								</div><!-- /.entry-content -->
							</div><!-- /.inner -->
						</article><!-- /#page-## -->
						<?php if ( comments_open() ) comments_template(); ?>
					<?php break; ?>
					<?php endwhile; ?>
				</div><!-- /.inner -->
			</div><!-- /.content-area -->

			<?php get_sidebar($sidebar_template); ?>
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
<?php get_footer(); ?>
