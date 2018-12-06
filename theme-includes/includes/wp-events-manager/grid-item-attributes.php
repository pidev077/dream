<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Get ACF data
 *
 * @param $value
 * @param $data
 *
 * @return string
 */
function vc_gitem_template_attribute_event( $value, $data ) {
	$label = '';
	/**
	 * @var null|Wp_Post $post ;
	 * @var string $data ;
	 */
	extract( array_merge( array(
		'post' => null,
		'data' => '',
	), $data ) );
	$output = null;
	$display_year = get_theme_mod( 'dream_event_display_year', false );
	$class        = 'item-event';
	$time_format  = get_option( 'time_format' );
	$time_start   = wpems_event_start( $time_format );
	$time_end     = wpems_event_end( $time_format );

	$location   = wpems_event_location();
	$date_show  = wpems_get_time( 'd' );
	$month_show = wpems_get_time( 'F' );
	if ( $display_year ) {
		$month_show .= ', ' . wpems_get_time( 'Y' );
	}
	switch ($data) {
    case 'day':
			$output = '<span>'. $date_show  .'</span>' . $month_show;
      break;
    case 'time':
			$output = '<i class="fa fa-clock-o" aria-hidden="true"></i>'.$time_start . ' - ' . $time_end ;
      break;
    case 'location':
			$output = '<i class="fa fa-map-marker" aria-hidden="true"></i> '.wpems_event_location();
      break;
	}
	return $output = apply_filters( 'vc_gitem_template_attribute_event_value', $output, $data );
}

add_filter( 'vc_gitem_template_attribute_event', 'vc_gitem_template_attribute_event', 10, 2 );
