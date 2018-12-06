<?php
/**
 * The Sidebar containing the main widget area
 */

$dream_sidebar_position = null;
if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) :
	$dream_sidebar_position = fw_ext_sidebars_get_current_position();
	if ( $dream_sidebar_position !== 'full' && $dream_sidebar_position !== null ) : ?>
		<div class="col-md-3 col-sm-12 bt-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			<div class="bt-col-inner">
				<?php if ( $dream_sidebar_position === 'left' || $dream_sidebar_position === 'right' ) : ?>
					<?php echo fw_ext_sidebars_show( 'blue' ); ?>
				<?php endif; ?>
			</div><!-- /.inner -->
		</div><!-- /.sidebar -->
	<?php endif; ?>
<?php else : ?>
	<div class="col-md-3 col-sm-12 bt-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<div class="bt-col-inner">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			<?php } ?>
		</div><!-- /.inner -->
	</div><!-- /.sidebar -->
<?php endif; ?>
