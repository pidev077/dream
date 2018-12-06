<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'vc_gitem_event' => array(
		'name' => __( 'Event Informaton', 'dream' ),
		'base' => 'vc_gitem_event',
		'icon' => 'vc_icon-event',
		'category' => __( 'Content', 'dream' ),
		'description' => __( 'Get Event data, ex: author, price, count student...', 'dream' ),
		'php_class_name' => 'Vc_Gitem_Event_Shortcode',
		'params' => apply_filters('vc_gitem_event_params',
			array(
				array(
					'type' => 'dropdown',
					'heading' => __( 'Source', 'dream' ),
					'param_name' => 'source',
					'admin_label' => true,
					'value' => array(
						__( 'Day', 'dream' ) => 'day',
						__( 'Time', 'dream' ) => 'time',
						__( 'Location', 'dream' ) => 'location',
					),
					'save_always' => true,
					'description' => __( 'Select source.', 'dream' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'dream' ),
					'param_name' => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'dream' ),
				),
			)
		),
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
);
