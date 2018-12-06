<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' ); }

$options   = array(
	'custom_header_image' => array(
		'label' => __( 'Custom Header Image', 'dream' ),
		'desc'  => __( 'Upload the image for header', 'dream' ),
		'help'  => __( 'Select custom header image, could you can select header image for all page at theme Customize/Title bar', 'dream' ),
		'type'  => 'upload',
		'value' => '',
	),
  'custom_category_title' => array(
    'label'   => __('Custom Header Title', 'dream'),
    'desc'    => __( 'Enter custom title product category. (default category name if this field empty)', 'dream' ),
    'type'    => 'text',
    'value'   => '',
  ),
);
