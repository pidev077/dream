<?php if (!defined('FW')) die('Forbidden');

$dream_admin_url          = admin_url();
$options = array(
	'side' => array(
		'title' => esc_html__( 'Header Image', 'dream' ),
		'type'  => 'box',
		'context' => 'side',
		'priority' => 'low',
		'options' => array(
			'header_image' => array(
				'label' => esc_html__( 'Add Image', 'dream' ),
				'desc'  => esc_html__( 'Upload header image', 'dream' ),
				// 'help'  => esc_html__( 'You can set a general header image for all your products and product categories from the Theme Settings page under the', 'dream').' <a target="_blank" href="'.$dream_admin_url.'themes.php?page=fw-settings&_focus_tab=fw-options-tab-posts#fw-options-tab-products">'.esc_html__('Products tab', 'dream').'</a>',
				'type'  => 'upload',
            ),
		),
	),
);
