<?php
$header_options = dream_builder_options_header();
extract($header_options);

$header_class_arr = array( basename( __FILE__, '.php' ), $dream_header_logo_align, $dream_header_full_content, $dream_header_menu_position, $dream_logo_retina );
$header_container_class_arr = array( $dream_absolute_header, $dream_sticky_header );
$header_class_container = !empty($dream_header_full_content) ? 'container-fluid' : 'container';

// echo '<pre>'; print_r($dream_header_settings); echo '</pre>';
?>
<header class="bt-header <?php echo esc_attr( implode( ' ',  $header_class_arr ) ); ?>" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	<!-- Header top bar -->
	<?php if ( $dream_enable_header_top_bar == 'yes' ) { ?>
	<div class="bt-header-top-bar">
		<div class="<?php echo esc_attr($header_class_container); ?>">
			<div class="row">
				<?php dream_top_bar(); ?>
			</div>
		</div>
	</div>
	<?php } ?>

	<!-- Header main menu -->
	<div class="bt-header-main">
		<div class="bt-header-container <?php echo esc_attr( implode( ' ', $header_container_class_arr ) ); ?>">
			<div class="<?php echo esc_attr($header_class_container); ?>">
				<div class="bt-container-logo bt-vertical-align-middle">
					<?php dream_logo(); ?>
				</div><!--
				--><div class="bt-container-menu bt-vertical-align-middle">
					<div class="bt-nav-wrap" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
						<?php fw_theme_nav_menu( 'primary' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
