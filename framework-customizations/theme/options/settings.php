<?php if (!defined('FW')) { die('Forbidden'); }

/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in backend
 */

$dream_portfolio_tab = $dream_events_tab = $dream_products_tab = $dream_learning_tab = $dream_bbpress_tab = $dream_buddypress_tab = array();
if (fw_ext('portfolio')) {
	$dream_portfolio_tab = fw()->theme->get_options('portfolio-tab');
}
if (fw_ext('events')) {
	// options events
}
if (fw_ext('learning')) {
	// options learning
}
if (class_exists('WooCommerce')) {
	// options WooCommerce
}
if (class_exists('bbPress')) {
	// options bbPress
}
if (class_exists('BuddyPress')) {
	// options BuddyPress
}

$dream_requirements_tab = fw()->theme->get_options('theme-requirements');

global $dream_colors, $dream_typography;
$dream_colors = array(
	'color_1' => '#d12a5c',
	'color_2' => '#49ca9f',
	'color_3' => '#1f1f1f',
	'color_4' => '#808080',
	'color_5' => '#ebebeb'
);
$dream_typography = array(
	'h1' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => 'regular',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '55',
		'line-height' => '65',
		'letter-spacing' => '-2',
	),
	'h2' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '40',
		'line-height' => '56',
		'letter-spacing' => '-2',
	),
	'h3' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '32',
		'line-height' => '38',
		'letter-spacing' => '-2',
	),
	'h4' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '26',
		'line-height' => '32',
		'letter-spacing' => '-2',
	),
	'h5' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '19',
		'line-height' => '28',
		'letter-spacing' => '-1',
	),
	'h6' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '14',
		'line-height' => '26',
		'letter-spacing' => '-1',
	),
	'buttons' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => 'regular',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '12',
		'line-height' => '30',
		'letter-spacing' => '0',
	),
	'subtitles' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '300',
		'family' => 'Merriweather',
		'style' => '',
		'weight' => '',
		'size' => '22',
		'line-height' => '39',
		'letter-spacing' => '0.5',
	),
	'body_text' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => 'regular',
		'family' => 'Quattrocento Sans',
		'style' => '',
		'weight' => '',
		'size' => '16.5',
		'line-height' => '28',
		'letter-spacing' => '0',
	),
);

$dream_admin_url = admin_url();
$dream_template_directory = get_template_directory_uri();

/* Old version */
// $dream_color_settings = fw_get_db_settings_option('color_settings', $dream_colors);
// $dream_typography_settings = fw_get_db_settings_option('typography_settings', $dream_typography);

/* New version */
$dream_color_settings = fw_get_db_customizer_option('color_settings', $dream_colors);
$dream_typography_settings = fw_get_db_customizer_option('typography_settings', $dream_typography);

/* Header layout */
$dream_header_layout = array(
	'header-1' => array(
		'parent' => array(
			'small' => array(
				'height' => 75,
				'src' => $dream_template_directory . '/assets/images/image-picker/header-type1.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $dream_template_directory . '/assets/images/image-picker/header-type1.jpg'
			),
		)
	),
	'header-2' => array(
		'parent' => array(
			'small' => array(
				'height' => 75,
				'src' => $dream_template_directory . '/assets/images/image-picker/header-type2.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $dream_template_directory . '/assets/images/image-picker/header-type2.jpg'
			),
		)
	),
	'header-3' => array(
		'parent' => array(
			'small' => array(
				'height' => 75,
				'src' => $dream_template_directory . '/assets/images/image-picker/header-type3.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $dream_template_directory . '/assets/images/image-picker/header-type3.jpg'
			),
		)
	),
);

/* Blog layout */
$dream_blog_layout = array(
	'blog-1' => array(
		'parent' => array(
			'small' => array(
				'height' => 70,
				'src' => $dream_template_directory . '/assets/images/image-picker/blog-style1.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $dream_template_directory . '/assets/images/image-picker/blog-style1.jpg'
			),
		),
	),
	'blog-2' => array(
		'parent' => array(
			'small' => array(
				'height' => 70,
				'src' => $dream_template_directory . '/assets/images/image-picker/blog-style2.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $dream_template_directory . '/assets/images/image-picker/blog-style2.jpg'
			),
		),
	),
	'blog-3' => array(
		'parent' => array(
			'small' => array(
				'height' => 70,
				'src' => $dream_template_directory . '/assets/images/image-picker/blog-style3.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $dream_template_directory . '/assets/images/image-picker/blog-style3.jpg'
			),
		),
	)
);

$options = array(
	$dream_requirements_tab,
	'general' => array(
		'title' => esc_html__('General', 'dream'),
		'type' => 'tab',
		'options' => array(
			'general-options' => array(
				'title' => esc_html__('General', 'dream'),
				'type' => 'tab',
				'options' => array(
					'general-box' => array(
						'title' => esc_html__('Global Settings', 'dream'),
						'type' => 'box',
						'options' => array(
							'page_404' => array(
								'label' => esc_html__('404 Error Page', 'dream'),
								'desc' => esc_html__('Select the 404 error page', 'dream'),
								'help' => esc_html__('The users will be redirected to this page when the page they are looking for is not found', 'dream'),
								'value' => '',
								'type' => 'select',
								'choices' => dream_list_pages(),
							),
							'enable_coming_soon' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'selected' => array(
										'type' => 'switch',
										'value' => 'no',
										'label' => esc_html__('Coming soon / Maintenance Page', 'dream'),
										'desc' => esc_html__('Enable coming soon/maintenance page?', 'dream'),
										'help' => esc_html__('The users will be redirected to this page when they are not logged in. Note that you need to disable it manually in order to make your website accessible again.', 'dream'),
										'left-choice' => array(
											'value' => 'no',
											'label' => esc_html__('No', 'dream'),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => esc_html__('Yes', 'dream'),
										)
									),
								),
								'choices' => array(
									'yes' => array(
										'coming_soon_page' => array(
											'label' => esc_html__('', 'dream'),
											'desc' => esc_html__('Select the coming soon page', 'dream'),
											'value' => '',
											'type' => 'select',
											'choices' => dream_list_pages(),
										),
									)
								)
							),
						)
					),
				)
			),
			'tracking-scripts' => array(
				'title' => esc_html__('Tracking Scripts', 'dream'),
				'type' => 'tab',
				'options' => array(
					'tracking-box' => array(
						'title' => esc_html__('Tracking Scripts', 'dream'),
						'type' => 'box',
						'options' => array(
							'tracking_scripts' => array(
								'type' => 'addable-popup',
								'size' => 'medium',
								'label' => esc_html__('Tracking Scripts', 'dream'),
								'desc' => esc_html__('Add your tracking scripts (Hotjar, Google Analytics, etc)', 'dream'),
								'template' => '{{=name}}',
								'popup-options' => array(
									'name' => array(
										'label' => esc_html__('Name', 'dream'),
										'desc' => esc_html__('Enter a name (it is for internal use and will not appear on the front end)', 'dream'),
										'type' => 'text',
									),
									'script' => array(
										'label' => esc_html__('Script', 'dream'),
										'desc' => esc_html__('Copy/Paste the tracking script here', 'dream'),
										'type' => 'textarea',
									)
								),
							),
						)
					),
				)
			),
			'api-keys' => array(
				'title' => esc_html__('API Keys', 'dream'),
				'type' => 'tab',
				'options' => array(
					'api-keys-box' => array(
						'title' => esc_html__('Google Maps', 'dream'),
						'type' => 'box',
						'options' => array(
							'gmap-key' => array(
								'label' => esc_html__( 'Google Maps', 'dream' ),
								'type'  => 'gmap-key',
								'desc' => sprintf( esc_html__( 'Create an application in %sGoogle Console%s and add the API Key here.', 'dream' ), '<a target="_blank" href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true">', '</a>' )
							),
						)
					),
				)
			),
		),
	),
	'custom_css_tab' => array(
		'title' => esc_html__('Custom SCSS', 'dream'),
		'type' => 'tab',
		'options' => array(
			'css-box' => array(
				'title' => esc_html__('SCSS (Please enable WP_DEBUG: True)', 'dream'),
				'type' => 'box',
				'options' => array(
					'quick_css' => array(
						'label' => esc_html__('Quick SCSS', 'dream'),
						'desc' => esc_html__('Quick SCSS changes that will be applied to the theme / Scss variable: {accent-color}, {secondary-color}', 'dream'),
						'type' => 'textarea',
						'value' => '',
					),
				)
			),
		)
	),
);
