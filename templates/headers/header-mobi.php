<?php
$_FW = defined( 'FW' );
$header_options = dream_builder_options_header();
extract($header_options);

$dream_logo_settings = defined( 'FW' ) ? fw_get_db_customizer_option( 'logo_settings' ) : array();
$dream_logo_retina = defined( 'FW' ) ? fw_akg('logo/image/retina_logo', $dream_logo_settings) : '';// $dream_logo_settings['logo']['image']['retina_logo'];
$header_class_arr = array( basename( __FILE__, '.php' ), $dream_logo_retina, 'fw-menu-position-right', $dream_absolute_header );
?>
<header class="bt-header-mobi <?php echo esc_attr( implode( ' ',  $header_class_arr ) ); ?>" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	<!-- Header top bar -->
	<?php if ( $dream_enable_header_top_bar_mobi == 'yes' ) { ?>
	<div class="bt-header-top-bar-mobi">
		<div class="container">
			<div class="row">
				<?php dream_top_bar_mobi(); ?>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- Header main menu -->
	<div class="bt-header-mobi-main">
		<div class="container">
			<div class="bt-container-logo bt-vertical-align-middle">
				<?php dream_logo(); ?>
			</div><!--
			--><div class="bt-container-menu bt-vertical-align-middle">
				<div class="bt-nav-wrap" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
					<?php
					if( ! $_FW ) { ?>
						<div class="default-mobi-menu-wrap" data-default-menu-mobi-handle>
							<button class="button-toggle-ui"><?php _e('Menu', 'dream'); ?></button>
							<?php fw_theme_nav_menu( 'mobi_menu' ); ?>
						</div>
					<?php } else {
						fw_theme_nav_menu( 'mobi_menu' );
					}
					?>
				</div>
			</div>
		</div>
	</div>
</header>
