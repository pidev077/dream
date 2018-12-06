<?php
/**
 * The template for displaying Archive pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 */
$_FW = defined( 'FW' );
$dream_sidebar_position = 'none';
$dream_general_posts_options = dream_general_posts_options();

/* START - custom size container variable */
$post_id = (int) get_queried_object_ID();
$content_class = 'content'; $sidebar_template = '';

get_header();
dream_title_bar();

if ( $_FW ) {
	$post_fw_options_custom_values_serialize = get_post_custom_values('fw_options', $post_id); //fw_get_db_post_option($post_id, 'container_size', '');
	$post_fw_options_custom_values = ! empty($post_fw_options_custom_values_serialize) ? unserialize(trim($post_fw_options_custom_values_serialize[0])) : array('container_size' => '');
	$page_container_size = isset($post_fw_options_custom_values['container_size']) ? $post_fw_options_custom_values['container_size'] : '';

	switch ($page_container_size) {
		case 'container-large': $content_class = 'fully'; $sidebar_template = 'fully-template'; break;
	}
}
/* END - custom size container variable */
?>
<section class="bt-main-row bt-section-space <?php dream_get_content_class('main', $dream_sidebar_position); ?>" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="container <?php echo esc_attr( ($content_class == 'fully') ? 'container-fully' : '' ); ?>">
		<div class="row">
			<div class="bt-content-area <?php dream_get_content_class( $content_class, $dream_sidebar_position ); ?>">
				<div class="bt-col-inner">
					<?php // if( function_exists('fw_ext_breadcrumbs') && bearsthemes_check_is_bbpress() == '' ) fw_ext_breadcrumbs(); ?>
					<div class="postlist" data-bears-masonryhybrid='{"col": <?php echo esc_attr($dream_general_posts_options['number_post_in_row']); ?>, "space": 40}'>
						<div class="grid-sizer"></div>
						<div class="gutter-sizer"></div>
						<?php
            do_action( 'tp_event_archive_description' );
            ?>
                <div class="list-tab-event">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab-happening" data-toggle="tab"><?php esc_html_e( 'Happening', 'dream' ); ?></a></li>
                        <li><a href="#tab-upcoming" data-toggle="tab"><?php esc_html_e( 'Upcoming', 'dream' ); ?></a></li>
                        <li><a href="#tab-expired" data-toggle="tab"><?php esc_html_e( 'Expired', 'dream' ); ?></a></li>
                    </ul>
                    <div class="tab-content bt-list-event">
            			<?php
            			foreach ( array( 'happening', 'upcoming', 'expired' ) as $type ) :
            				get_template_part( 'wp-events-manager/archive-event', $type );
            			endforeach;
            			?>
                    </div>
                </div>
					</div><!-- /.postlist-->
					<?php dream_paging_navigation(); // archive pagination ?>
				</div>
			</div><!-- /.bt-content-area-->
		</div><!-- /.row-->
	</div><!-- /.container-->
</section>
<?php get_footer(); ?>
