<?php
$dream_footer_settings   = defined( 'FW' ) ? fw_get_db_customizer_option( 'footer_settings' ) : array();
$dream_footer_sidebar = isset( $dream_footer_settings['show_footer_widgets']['yes']['footer_sidebar'] ) ? $dream_footer_settings['show_footer_widgets']['yes']['footer_sidebar'] : array();
// echo '<pre>'; print_r($dream_footer_settings); echo '</pre>';
// footer widgets overlay
$dream_overlay_style_footer_widgets = '';
if ( isset( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['overlay'] ) && $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['overlay'] == 'yes' && $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] == 'image' ) {
	$dream_overlay_bg = $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['yes']['background']['id'];
	$dream_opacity    = ( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['yes']['overlay_opacity_image'] ) / 100;
	if ( $dream_overlay_bg == 'fw-custom' && ! empty( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['yes']['background']['color'] ) ) {
		$dream_overlay_style_footer_widgets = '<div class="fw-main-row-overlay" style="background-color: ' . $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['yes']['background']['color'] . '; opacity: ' . $dream_opacity . ';"></div>';
	} else {
		$dream_overlay_style_footer_widgets = '<div class="fw-main-row-overlay fw_theme_bg_' . $dream_overlay_bg . '" style="opacity: ' . $dream_opacity . ';"></div>';
	}
}
?>
<div class="bt-footer-widgets footer-cols-4">
	<?php echo "{$dream_overlay_style_footer_widgets}"; ?>
	<div class="bt-inner">
		<div class="container">
			<div class="bt-row">
				<?php
				$count = count($dream_footer_sidebar);
				// footer col class
				$foolter_col_class = array(
					1 => 'col-md-12 col-sm-12',
					2 => 'col-md-6 col-sm-6',
					3 => 'col-md-4 col-sm-4',
					4 => 'col-md-3 col-sm-6' );

				if( is_array($dream_footer_sidebar) && $count > 0 ) {
					foreach($dream_footer_sidebar as $footer_item) {
						$class = array(
							'footer-sidebar-item',
							// $foolter_col_class[$count],
							'bt-col-' . $count,
							$footer_item['content_align'],
							$footer_item['custom_class']);
					?><!--
					--><div class="<?php echo implode(' ', $class); ?>">
						<?php dynamic_sidebar( $footer_item['sidebar_id'] ); ?>
					</div><!--
					--><?php
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
