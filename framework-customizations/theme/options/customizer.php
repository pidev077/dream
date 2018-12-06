<?php if (!defined('FW')) { die('Forbidden'); }

/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in backend
 */

global $dream_colors, $dream_typography;

$dream_colors = array(
	'color_1' => '#88C000',
	'color_2' => '#ACF300',
	'color_3' => '#1f1f1f',
	'color_4' => '#808080',
	'color_5' => '#ebebeb'
);
$dream_typography = array(
	'h1' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '55',
		'line-height' => '65',
		'letter-spacing' => '0',
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
		'letter-spacing' => '0',
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
		'letter-spacing' => '0',
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
		'letter-spacing' => '0',
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
		'letter-spacing' => '0',
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
		'letter-spacing' => '0',
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
		),
		'children' => array(
			'custom_position_logo_menu' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc'  => false,
				'picker' => array(
					'select' => array(
						'type' => 'switch',
						'label'   => __('Custom Position Logo & Menu', 'dream'),
						'left-choice' => array(
							'value' => 'no',
							'label' => esc_html__('No', 'dream'),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__('Yes', 'dream'),
						),
						'value' => 'no',
					)
				),
				'choices' => array(
					'yes' => array(
						'position_logo_menu' => array(
							'type' => 'addable-popup',
							'size' => 'medium',
							'limit' => 3,
							'label' => __('Position Logo & Menu', 'dream'),
							'desc' => __('Add logo(position) & menu(position) you want display', 'dream'),
							'template' => '{{=name}}',
							'popup-title' => null,
							'value' => array(
								array(
									'name' => esc_html__('Primary Menu', 'dream'),
									'width' => 40,
									'type' => array(
										'select' => 'menu',
										'menu'=> array(
											'menu_type' => 'primary',
										)
									),
									'content_align' => 'text-left',
									'custom_class'	=> '',
								),
								array(
									'name' => esc_html__('Logo', 'dream'),
									'width' => 20,
									'type' => array(
										'select' => 'logo',
									),
									'content_align' => 'text-center',
									'custom_class'	=> '',
								),
								array(
									'name' => esc_html__('Secondary Menu', 'dream'),
									'width' => 40,
									'type' => array(
										'select' => 'menu',
										'menu'=> array(
											'menu_type' => 'secondary',
										)
									),
									'content_align' => 'text-right',
									'custom_class'	=> '',
								),
							),
							'popup-options' => array(
								'name' => array(
									'label' => esc_html__('Name', 'dream'),
									'desc' => esc_html__('Enter a name (it is for internal use and will not appear on the front end)', 'dream'),
									'type' => 'text',
								),
								'width' => array(
									'type' => 'slider',
									// 'value' => 996,
									'label' => esc_html__('Width', 'dream'),
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'desc' => esc_html__('Select the width in %', 'dream'),
								),
								'type' => array(
									'type' => 'multi-picker',
									'label' => false,
									'desc'  => false,
									'picker' => array(
										'select' => array(
											'type' => 'switch',
											'label'   => esc_html__('Select Type', 'dream'),
											'left-choice' => array(
												'value' => 'menu',
												'label' => esc_html__('Menu', 'dream'),
											),
											'right-choice' => array(
												'value' => 'logo',
												'label' => esc_html__('Logo', 'dream'),
											),
										)
									),
									'choices' => array(
										'menu' => array(
											'menu_type' => array(
												'type' => 'short-select',
												'label' => esc_html__( 'Menu Type', 'dream' ),
												'desc' => esc_html__( 'Please select menu type', 'dream' ),
												'choices' => array(
													'primary' 	=> esc_html__( 'Primary Menu', 'dream' ),
													'secondary' => esc_html__( 'Secondary Menu', 'dream' ),
												),
											),
										)
									)
								),
								'content_align' => array(
									'label' => esc_html__('Content Align', 'dream'),
									'desc' => esc_html__('Select the content align', 'dream'),
									'type' => 'image-picker',
									'value' => 'text-left',
									'choices' => array(
										'text-left' => array(
											'small' => array(
												'height' => 50,
												'src' => $dream_template_directory . '/assets/images/image-picker/left-position.jpg',
												'title' => esc_html__('Left', 'dream')
											),
										),
										'text-center' => array(
											'small' => array(
												'height' => 50,
												'src' => $dream_template_directory . '/assets/images/image-picker/center-position.jpg',
												'title' => esc_html__('Center', 'dream')
											),
										),
										'text-right' => array(
											'small' => array(
												'height' => 50,
												'src' => $dream_template_directory . '/assets/images/image-picker/right-position.jpg',
												'title' => esc_html__('Right', 'dream')
											),
										),
									),
								),
								'custom_class' => array(
									'label' => esc_html__( 'Custom Class', 'dream' ),
									'desc' => esc_html__('Custom class', 'dream'),
									'type' => 'text',
									'value' => '',
								),
							)
						),
					)
				),
			),
		),
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
		),
		'children' => array(
			'custom_position_logo_sidebar' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc'  => false,
				'picker' => array(
					'select' => array(
						'type' => 'switch',
						'label'   => __('Custom Position Logo & Sidebar', 'dream'),
						// 'desc'    => __('Custom position Logo & Sidebar for header 3', 'dream'),
						'left-choice' => array(
							'value' => 'no',
							'label' => esc_html__('No', 'dream'),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__('Yes', 'dream'),
						),
						'value' => 'no',
					)
				),
				'choices' => array(
					'yes' => array(
						'position_logo_sidebar' => array(
							'type' => 'addable-popup',
							'size' => 'medium',
							'limit' => 4,
							'label' => __('Position Logo & Sidebar', 'dream'),
							'desc' => __('Add logo(position) & sidebar you want display', 'dream'),
							'template' => '{{=name}}',
							'popup-title' => null,
							'value' => array(
								array(
									'name' => esc_html__('Sidebar Left', 'dream'),
									'width' => 40,
									'type' => array(
										'select' => 'sidebar',
										'sidebar'=> array(
											'sidebar_id' => 'blank',
										)
									),
									'content_align' => 'text-center',
									'custom_class'	=> '',
								),
								array(
									'name' => esc_html__('Logo', 'dream'),
									'width' => 20,
									'type' => array(
										'select' => 'logo',
									),
									'content_align' => 'text-center',
									'custom_class'	=> '',
								),
								array(
									'name' => esc_html__('Sidebar Right', 'dream'),
									'width' => 40,
									'type' => array(
										'select' => 'sidebar',
										'sidebar'=> array(
											'sidebar_id' => 'blank',
										)
									),
									'content_align' => 'text-right',
									'custom_class'	=> '',
								),
							),
							'popup-options' => array(
								'name' => array(
									'label' => esc_html__('Name', 'dream'),
									'desc' => esc_html__('Enter a name (it is for internal use and will not appear on the front end)', 'dream'),
									'type' => 'text',
								),
								'width' => array(
									'type' => 'slider',
									// 'value' => 996,
									'label' => esc_html__('Width', 'dream'),
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'desc' => esc_html__('Select the width in %', 'dream'),
								),
								'type' => array(
									'type' => 'multi-picker',
									'label' => false,
									'desc'  => false,
									'picker' => array(
										'select' => array(
											'type' => 'switch',
											'label'   => esc_html__('Select Type', 'dream'),
											'left-choice' => array(
												'value' => 'sidebar',
												'label' => esc_html__('Sidebar', 'dream'),
											),
											'right-choice' => array(
												'value' => 'logo',
												'label' => esc_html__('Logo', 'dream'),
											),
										)
									),
									'choices' => array(
										'sidebar' => array(
											'sidebar_id' => array(
												'type' => 'short-select',
												'label' => esc_html__( 'Sitebar', 'dream' ),
												'desc' => esc_html__( 'Please select sitebar', 'dream' ),
												'choices' => dream_get_sidebars(array('blank' => esc_html__('- Display Blank -', 'dream'))),
											),
										)
									)
								),
								'content_align' => array(
									'label' => esc_html__('Content Align', 'dream'),
									'desc' => esc_html__('Select the content align', 'dream'),
									'type' => 'image-picker',
									'value' => 'text-left',
									'choices' => array(
										'text-left' => array(
											'small' => array(
												'height' => 50,
												'src' => $dream_template_directory . '/assets/images/image-picker/left-position.jpg',
												'title' => esc_html__('Left', 'dream')
											),
										),
										'text-center' => array(
											'small' => array(
												'height' => 50,
												'src' => $dream_template_directory . '/assets/images/image-picker/center-position.jpg',
												'title' => esc_html__('Center', 'dream')
											),
										),
										'text-right' => array(
											'small' => array(
												'height' => 50,
												'src' => $dream_template_directory . '/assets/images/image-picker/right-position.jpg',
												'title' => esc_html__('Right', 'dream')
											),
										),
									),
								),
								'custom_class' => array(
									'label' => esc_html__( 'Custom Class', 'dream' ),
									'desc' => esc_html__('Custom class', 'dream'),
									'type' => 'text',
									'value' => '',
								),
							),
						),
					)
				)
			),
			'html_label_logo_sidebar_padding' => array(
				'type' => 'html',
				'html' => '',
				'value' => '',
				'label' => __('Logo & Sidebar Padding', 'dream'),
			),
			'logo_sidebar_padding_top' => array(
				'label' => false,
				'desc' => esc_html__('top', 'dream'),
				'type' => 'short-text',
				'value' => 15,
			),
			'logo_sidebar_padding_bottom' => array(
				'label' => false,
				'desc' => esc_html__('bottom ', 'dream'),
				'type' => 'short-text',
				'value' => 15,
			),
			'logo_sidebar_bg_color' => array(
				'label' => esc_html__('Background Color', 'dream'),
				'desc' => __('Select the background color for Logo & Sidebar', 'dream'),
				'value' => '#ffffff',
				'type' => 'color-picker',
			),
			'logo_sidebar_shadow_effect' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc'  => false,
				'picker' => array(
					'select' => array(
						'type' => 'switch',
						'label'   => esc_html__('Shadow Effect', 'dream'),
						'left-choice' => array(
							'value' => 'no',
							'label' => esc_html__('No', 'dream'),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__('Yes', 'dream'),
						),
						'value' => 'yes',
					)
				),
				'choices' => array(
					'yes' => array(
						'shadow_color' => array(
							'label' => esc_html__('Shadow Color', 'dream'),
							'desc' => esc_html__('Select the shadow color', 'dream'),
							'value' => '#222222',
							'type' => 'color-picker',
						)
					)
				)
			),
			'custom_position_menu' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc'  => false,
				'picker' => array(
					'select' => array(
						'type' => 'switch',
						'label'   => __('Custom Position Menu', 'dream'),
						'left-choice' => array(
							'value' => 'no',
							'label' => esc_html__('No', 'dream'),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__('Yes', 'dream'),
						),
						'value' => 'no',
					)
				),
				'choices' => array(
					'yes' => array(
						'position_menu' => array(
							'type' => 'addable-popup',
							'size' => 'medium',
							'limit' => 2,
							'label' => __('Add Menu', 'dream'),
							'desc' => __('Add menu you want display', 'dream'),
							'template' => '{{=name}}',
							'popup-title' => null,
							'value' => array(
								array(
									'name' => esc_html__('Primary Menu', 'dream'),
									'width' => 100,
									'menu_type' => 'primary',
									'content_align' => 'text-left',
									'custom_class'	=> '',
								),
							),
							'popup-options' => array(
								'name' => array(
									'label' => esc_html__('Name', 'dream'),
									'desc' => esc_html__('Enter a name (it is for internal use and will not appear on the front end)', 'dream'),
									'type' => 'text',
								),
								'width' => array(
									'type' => 'slider',
									// 'value' => 996,
									'label' => esc_html__('Width', 'dream'),
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'desc' => esc_html__('Select the width in %', 'dream'),
								),
								'menu_type' => array(
									'type' => 'short-select',
									'label' => esc_html__( 'Menu Type', 'dream' ),
									'desc' => esc_html__( 'Please select menu type', 'dream' ),
									'choices' => array(
										'primary' 	=> esc_html__( 'Primary Menu', 'dream' ),
										'secondary' => esc_html__( 'Secondary Menu', 'dream' ),
									),
								),
								'content_align' => array(
									'label' => esc_html__('Content Align', 'dream'),
									'desc' => esc_html__('Select the content align', 'dream'),
									'type' => 'image-picker',
									'value' => 'text-left',
									'choices' => array(
										'text-left' => array(
											'small' => array(
												'height' => 50,
												'src' => $dream_template_directory . '/assets/images/image-picker/left-position.jpg',
												'title' => esc_html__('Left', 'dream')
											),
										),
										'text-center' => array(
											'small' => array(
												'height' => 50,
												'src' => $dream_template_directory . '/assets/images/image-picker/center-position.jpg',
												'title' => esc_html__('Center', 'dream')
											),
										),
										'text-right' => array(
											'small' => array(
												'height' => 50,
												'src' => $dream_template_directory . '/assets/images/image-picker/right-position.jpg',
												'title' => esc_html__('Right', 'dream')
											),
										),
									),
								),
								'custom_class' => array(
									'label' => esc_html__( 'Custom Class', 'dream' ),
									'desc' => esc_html__('Custom class', 'dream'),
									'type' => 'text',
									'value' => '',
								),
							)
						),
					)
				),
			),
		)
	),
	/*
	'header-4' => array(
		'parent' => array(
			'small' => array(
				'height' => 75,
				'src' => $dream_template_directory . '/assets/images/image-picker/header-type7.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $dream_template_directory . '/assets/images/image-picker/header-type7.jpg'
			),
		)
	),
	*/
);

$dream_shop_box = $dream_post_box = $dream_portfolio_box = $dream_wp_ultimate_recipe_box = $dream_give_box = $dream_events_box = array();
$dream_post_box = fw()->theme->get_options('post-box');
$dream_notification_center_box = fw()->theme->get_options('notification-center-box');

/* Select footer setting */
$dream_select_footer = fw()->theme->get_options( 'custom-footer' );

/* woocommerce */
if (class_exists('WooCommerce')) {
	$dream_shop_box = fw()->theme->get_options('shop-box');
}
/* portfolio */
if (function_exists('fw_ext') && fw_ext('portfolio')) {
  $dream_portfolio_box = fw()->theme->get_options('portfolio-box');
}
/* events */
if (function_exists('fw_ext') && fw_ext('events')) {
  $dream_events_box = fw()->theme->get_options('events-box');
}
/* wp-ultimate-recipe */
if (class_exists('WPUltimateRecipe') || class_exists('WPUltimateRecipePremium')) {
  $dream_wp_ultimate_recipe_box = fw()->theme->get_options('wp-ultimate-recipe-box');
}
/* give */
if (class_exists('Give')) {
	$dream_give_box = fw()->theme->get_options('give-box');
}

$options = array(
	'logo-box' => array(
		'title' => esc_html__('Logo', 'dream'),
		'type' => 'box',
		'options' => array(
			'logo_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
					'logo' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'selected_value' => array(
								'label' => esc_html__('Logo Type', 'dream'),
								'desc' => esc_html__('Select the logo type', 'dream'),
								'attr' => array('class' => 'fw-checkbox-float-left'),
								'value' => 'text',
								'type' => 'radio',
								'choices' => array(
									'text' => esc_html__('Text', 'dream'),
									'image' => esc_html__('Image', 'dream'),
								),
							)
						),
						'choices' => array(
							'text' => array(
								'title' => array(
									'label' => esc_html__('Title', 'dream'),
									'desc' => esc_html__('Enter the title', 'dream'),
									'type' => 'text',
									'value' => get_bloginfo('name')
								),
								'logo_title_font' => array(
									'label' => false, //__('', 'dream'),
									'desc' => esc_html__('Choose the title font', 'dream'),
									'type' => 'tf-typography',
									'value' => array(
										'family' => 'Montserrat',
										'size' => 20,
										'line-height' => 30,
										'style' => '400',
										'letter-spacing' => 0,
									)
								),
								'subtitle' => array(
									'label' => esc_html__('Subtitle', 'dream'),
									'desc' => esc_html__('Enter the subtitle', 'dream'),
									'type' => 'text',
									'value' => '', //__('Bearsthemes', 'dream'),
								),
								'logo_subtitle_font' => array(
									'label' => false, //__('', 'dream'),
									'desc' => esc_html__('Choose the subtitle font', 'dream'),
									'type' => 'tf-typography',
									'value' => array(
										'family' => 'Montserrat',
										'size' => 10,
										'line-height' => 10,
										'style' => '400',
										'letter-spacing' => 0,
									)
								),
							),
							'image' => array(
								'image_logo' => array(
									'label' => false, // __('', 'dream'),
									'desc' => esc_html__('Upload logo image', 'dream'),
									'type' => 'upload'
								),
								'retina_logo' => array(
									'type' => 'switch',
									'label' => false, //__('', 'dream'),
									'desc' => esc_html__('Use logo as retina?', 'dream'),
									'left-choice' => array(
										'value' => 'bt-logo-no-retina',
										'label' => esc_html__('No', 'dream'),
									),
									'right-choice' => array(
										'value' => 'bt-logo-retina',
										'label' => esc_html__('Yes', 'dream'),
									),
									'value' => 'bt-logo-no-retina'
								),
							),
						),
						'show_borders' => false,
					),
				),
			),
		)
	),
	'general-box' => array(
		'title' => esc_html__('General', 'dream'),
		'type' => 'box',
		'options' => array(
			'container_site_type' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'selected' => array(
						'label' => esc_html__('Website Width', 'dream'),
						'desc' => esc_html__("Select your website's width", "dream"),
						'value' => 'bt-full',
						'type' => 'image-picker',
						'choices' => array(
							'bt-full' => array(
								'small' => array(
									'height' => 70,
									'src' => $dream_template_directory . '/assets/images/image-picker/full.jpg'
								),
								'large' => array(
									'height' => 214,
									'src' => $dream_template_directory . '/assets/images/image-picker/full.jpg'
								),
							),
							'bt-side-boxed' => array(
								'small' => array(
									'height' => 70,
									'src' => $dream_template_directory . '/assets/images/image-picker/side-boxed.jpg'
								),
								'large' => array(
									'height' => 214,
									'src' => $dream_template_directory . '/assets/images/image-picker/side-boxed.jpg'
								),
							),
						),
					),
				),
				'choices' => array(
					'bt-side-boxed' => array(
						'site_margin' => array(
							'label' => esc_html__('', 'dream'),
							'desc' => esc_html__('Enter the top and bottom margin', 'dream'),
							'value' => '',
							'type' => 'short-text',
						),
						'boxed_container_bg' => array(
							'label' => esc_html__('Container Background', 'dream'),
							'desc' => esc_html__('Select the website container background', 'dream'),
							'value' => '#ffffff',
							'type' => 'color-picker',
						),
					)
				)
			),
			'website_background' => array(
				'type' => 'multi',
				'label' => false,
				'inner-options' => array(
					'website_bg_color' => array(
						'label' => esc_html__('Website Background', 'dream'),
						'desc' => esc_html__('Select the website background color', 'dream'),
						'value' => '#ffffff',
						'type' => 'color-picker',
					),
					'website_bg' => array(
						'type' => 'background-image',
						'value' => 'none',
						'label' => false, //esc_html__('', 'dream'),
						'desc' => esc_html__('Select the patern overlay', 'dream'),
						'choices' => array(
							'none' => array(
								'icon' => $dream_template_directory . '/assets/images/patterns/no_pattern.jpg',
								'css' => array(
									'background-image' => 'none'
								),
							),
							'bg-1' => array(
								'icon' => $dream_template_directory . '/assets/images/patterns/diagonal_bottom_to_top_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $dream_template_directory . '/assets/images/patterns/diagonal_bottom_to_top_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
							'bg-2' => array(
								'icon' => $dream_template_directory . '/assets/images/patterns/diagonal_top_to_bottom_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $dream_template_directory . '/assets/images/patterns/diagonal_top_to_bottom_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
							'bg-3' => array(
								'icon' => $dream_template_directory . '/assets/images/patterns/dots_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $dream_template_directory . '/assets/images/patterns/dots_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
							'bg-4' => array(
								'icon' => $dream_template_directory . '/assets/images/patterns/noise_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $dream_template_directory . '/assets/images/patterns/noise_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
							'bg-5' => array(
								'icon' => $dream_template_directory . '/assets/images/patterns/romb_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $dream_template_directory . '/assets/images/patterns/romb_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
							'bg-6' => array(
								'icon' => $dream_template_directory . '/assets/images/patterns/square_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $dream_template_directory . '/assets/images/patterns/square_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
							'bg-7' => array(
								'icon' => $dream_template_directory . '/assets/images/patterns/vertical_lines_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $dream_template_directory . '/assets/images/patterns/vertical_lines_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
							'bg-8' => array(
								'icon' => $dream_template_directory . '/assets/images/patterns/waves_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $dream_template_directory . '/assets/images/patterns/waves_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
						)
					)
				)
			),
			'enable_scroll_to' => array(
				'attr' => array('class' => 'scroll-to-top-styling'),
				'type' => 'switch',
				'value' => 'no',
				'label' => esc_html__('Scroll to Top Button', 'dream'),
				'desc' => esc_html__('Enable scroll to top?', 'dream'),
				'left-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'dream'),
				),
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'dream'),
				)
			),
		)
	),
	'header-box' => array(
		'title' => esc_html__('Header', 'dream'),
		'type' => 'box',
		'options' => array(
			'header_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
					'header_group' => array(
						'type' => 'group',
						'options' => array(
							'header_type_picker' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'header_type' => array(
										'label' => esc_html__('Header Type', 'dream'),
										'type' => 'image-picker',
										'value' => 'header-1',
										'desc' => esc_html__('Select the prefered header type', 'dream'),
										'choices' => dream_load_decentralize_setting( $dream_header_layout, 'parent' ),
									),
								),
								'choices' => dream_load_decentralize_setting( $dream_header_layout, 'children' ),
								'show_borders' => false,
							),
							'transform_header_mobi' => array(
								'type' => 'slider',
								'value' => 996,
								'label' => esc_html__('Transform Header Mobi', 'dream'),
								'properties' => array(
									'min' => 320,
									'max' => 1170,
									'sep' => 1,
								),
								'desc' => esc_html__('Select the website width transform header mobi in px', 'dream'),
							),
							'html_label' => array(
								'type' => 'html',
								'html' => '',
								'value' => '',
								'label' => esc_html__('Header Padding', 'dream'),
							),
							'header_padding_top' => array(
								'label' => false,
								'desc' => esc_html__('top', 'dream'),
								'type' => 'short-text',
								'value' => '15',
							),
							'header_padding_bottom' => array(
								'label' => false,
								'desc' => esc_html__('bottom ', 'dream'),
								'type' => 'short-text',
								'value' => '15',
							),
							'header_bg_color' => array(
								'label' => esc_html__('Background Color', 'dream'),
								'desc' => esc_html__('Select header background color', 'dream'),
								'value' => '#ffffff',
								'choices' => $dream_color_settings,
								'type' => 'color-palette'
							),
							'dropdown_bg_color' => array(
								'label' => esc_html__('Dropdown Bg Color', 'dream'),
								'desc' => esc_html__('Select the dropdown background color', 'dream'),
								'value' => '#333333',
								'choices' => $dream_color_settings,
								'type' => 'color-palette'
							),
							'header_menu_position' => array(
								'label' => esc_html__('Menu Position', 'dream'),
								'desc' => esc_html__('Select the menu position', 'dream'),
								'type' => 'image-picker',
								'value' => 'fw-menu-position-right',
								'choices' => array(
									'fw-menu-position-left' => array(
										'small' => array(
											'height' => 50,
											'src' => $dream_template_directory . '/assets/images/image-picker/left-position.jpg',
											'title' => esc_html__('Left', 'dream')
										),
									),
									'fw-menu-position-center' => array(
										'small' => array(
											'height' => 50,
											'src' => $dream_template_directory . '/assets/images/image-picker/center-position.jpg',
											'title' => esc_html__('Center', 'dream')
										),
									),
									'fw-menu-position-right' => array(
										'small' => array(
											'height' => 50,
											'src' => $dream_template_directory . '/assets/images/image-picker/right-position.jpg',
											'title' => esc_html__('Right', 'dream')
										),
									),
								),
							),
						)
					),
					'enable_header_full_content' => array(
						'type' => 'switch',
						'value' => '',
						'attr' => array(),
						'label' => esc_html__('Header Full Content', 'dream'),
						'desc' => esc_html__('Make the header full content?', 'dream'),
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('No', 'dream'),
						),
						'right-choice' => array(
							'value' => 'bt-header-full-content',
							'label' => esc_html__('Yes', 'dream'),
						),
					),
					'enable_absolute_header' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'selected_value' => array(
								'type' => 'switch',
								'value' => 'fw-no-absolute-header',
								'attr' => array(),
								'label' => esc_html__('Absolute Header', 'dream'),
								'desc' => esc_html__('Make the header position absolute?', 'dream'),
								'help' => sprintf("%s", esc_html__('This absolute positioning will put the header on top of the header image.', 'dream')),
								'left-choice' => array(
									'value' => 'fw-no-absolute-header',
									'label' => esc_html__('No', 'dream'),
								),
								'right-choice' => array(
									'value' => 'fw-absolute-header',
									'label' => esc_html__('Yes', 'dream'),
								),
							)
						),
						'choices' => array(
							'fw-absolute-header' => array(
								'absolute_opacity' => array(
									'type' => 'slider',
									'value' => 65,
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'label' => false, //esc_html__('', 'dream'),
									'desc' => esc_html__('Select the header background opacity', 'dream'),
								),
							),
						),
						'show_borders' => false,
					),
					'enable_sticky_header' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'selected_value' => array(
								'type' => 'switch',
								'value' => 'fw-no-sticky-header',
								'attr' => array(),
								'label' => esc_html__('Sticky Header', 'dream'),
								'desc' => esc_html__('Make the header sticky?', 'dream'),
								'left-choice' => array(
									'value' => 'fw-no-sticky-header',
									'label' => esc_html__('No', 'dream'),
								),
								'right-choice' => array(
									'value' => 'fw-sticky-header',
									'label' => esc_html__('Yes', 'dream'),
								),
							)
						),
						'choices' => array(
							'fw-sticky-header' => array(
								'image_logo_sticky' => array(
										'label' => esc_html__('Image Logo Sticky', 'dream'),
										'desc' => esc_html__('Upload logo image', 'dream'),
										'type' => 'upload'
								),
								'html_label' => array(
									'type' => 'html',
									'html' => '',
									'value' => '',
									'label' => esc_html__('Header Sticky Padding', 'dream'),
								),
								'header_sticky_padding_top' => array(
									'label' => false,
									'desc' => esc_html__('top', 'dream'),
									'type' => 'short-text',
									'value' => 0,
								),
								'header_sticky_padding_bottom' => array(
									'label' => false,
									'desc' => esc_html__('bottom ', 'dream'),
									'type' => 'short-text',
									'value' => 0,
								),
								'background_color' => array(
									'label' => esc_html__('Background Color', 'dream'),
									'desc' => esc_html__("Select the header's top bar background color", "dream"),
									'value' => $dream_color_settings['color_3'],
									'choices' => $dream_color_settings,
									'type' => 'color-palette'
								),
								'sticky_opacity' => array(
									'type' => 'slider',
									'value' => 5,
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'label' => esc_html__('', 'dream'),
									'desc' => esc_html__('Select the header background opacity', 'dream'),
								),
								'menu_item_color' => array(
									'label' => esc_html__('Menu Item Color', 'dream'),
									'desc' => esc_html__("Select the menu items color (level 1)", "dream"),
									'value' => $dream_color_settings['color_5'],
									'choices' => $dream_color_settings,
									'type' => 'color-palette'
								),
								'menu_item_color_hover' => array(
									'label' => false, // esc_html__('', 'dream'),
									'desc' => esc_html__("Select the menu items color hover (level 1)", "dream"),
									'value' => $dream_color_settings['color_2'],
									'choices' => $dream_color_settings,
									'type' => 'color-palette'
								),
							),
						),
						'show_borders' => false,
					),
					'enable_header_top_bar' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'selected_value' => array(
								'label' => esc_html__('Header Top Bar', 'dream'),
								'desc' => esc_html__('Enable the header top bar?', 'dream'),
								'type' => 'switch',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__('Yes', 'dream')
								),
								'left-choice' => array(
									'value' => 'no',
									'label' => esc_html__('No', 'dream')
								),
								'value' => 'no',
							)
						),
						'choices' => array(
							'yes' => array(
								'header_top_bar_bg' => array(
									'label' => false, //esc_html__('Background Color', 'dream'),
									'desc' => esc_html__("Select the header's top bar background color", "dream"),
									'value' => $dream_color_settings['color_3'],
									'choices' => $dream_color_settings,
									'type' => 'color-palette'
								),
								'header_top_sidebar' => array(
									'type' => 'addable-popup',
									'size' => 'medium',
									'limit' => 3,
									'label' => esc_html__('Sidebar List', 'dream'),
									'desc' => esc_html__('Add sidebar you want display', 'dream'),
									'template' => '{{=name}}',
									'popup-options' => array(
										'name' => array(
											'label' => esc_html__('Name', 'dream'),
											'desc' => esc_html__('Enter a name (it is for internal use and will not appear on the front end)', 'dream'),
											'type' => 'text',
										),
										'sidebar_id' => array(
											'type' => 'short-select',
											'label' => esc_html__( 'Sitebar', 'dream' ),
											'desc' => esc_html__( 'Please select sitebar', 'dream' ),
											'value' => '',
											'choices' => dream_get_sidebars(),
										),
										'content_align' => array(
											'label' => esc_html__('Content Align', 'dream'),
											'desc' => esc_html__('Select the content align', 'dream'),
											'type' => 'image-picker',
											'value' => 'fw-sidebar-content-align-left',
											'choices' => array(
												'fw-sidebar-content-align-left' => array(
													'small' => array(
														'height' => 50,
														'src' => $dream_template_directory . '/assets/images/image-picker/left-position.jpg',
														'title' => esc_html__('Left', 'dream')
													),
												),
												'fw-sidebar-content-align-center' => array(
													'small' => array(
														'height' => 50,
														'src' => $dream_template_directory . '/assets/images/image-picker/center-position.jpg',
														'title' => esc_html__('Center', 'dream')
													),
												),
												'fw-sidebar-content-align-right' => array(
													'small' => array(
														'height' => 50,
														'src' => $dream_template_directory . '/assets/images/image-picker/right-position.jpg',
														'title' => esc_html__('Right', 'dream')
													),
												),
											),
										),
										'custom_class' => array(
											'label' => esc_html__( 'Custom Class', 'dream' ),
											'desc' => esc_html__('Custom class', 'dream'),
											'type' => 'text',
											'value' => '',
										),
									),
								),
							),
							'no' => array(),
						),
						'show_borders' => false,
					),
					'enable_header_top_bar_mobi'      => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'selected_value' => array(
								'label'        => esc_html__( 'Header Top Bar Mobi', 'dream' ),
								'desc'         => esc_html__( 'Enable the header top bar mobi?', 'dream' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__( 'Yes', 'dream' )
								),
								'left-choice'  => array(
									'value' => 'no',
									'label' => esc_html__( 'No', 'dream' )
								),
								'value'        => 'no',
							)
						),
						'choices'      => array(
							'yes' => array(
								'header_top_mobi_sidebar' => array(
									'type'          => 'addable-popup',
									'size'          => 'medium',
									'limit'         => 3,
									'label'         => esc_html__( 'Sidebar List', 'dream' ),
									'desc'          => esc_html__( 'Add sidebar you want display', 'dream' ),
									'template'      => '{{=name}}',
									'popup-options' => array(
										'name'          => array(
											'label' => esc_html__( 'Name', 'dream' ),
											'desc'  => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end)', 'dream' ),
											'type'  => 'text',
										),
										'sidebar_id'    => array(
											'type'    => 'short-select',
											'label'   => esc_html__( 'Sitebar', 'dream' ),
											'desc'    => esc_html__( 'Please select sitebar', 'dream' ),
											'value'   => '',
											'choices' => dream_get_sidebars(),
										),
										'custom_class'  => array(
											'label' => esc_html__( 'Custom Class', 'dream' ),
											'desc'  => esc_html__( 'Custom class', 'dream' ),
											'type'  => 'text',
											'value' => '',
										),
									),
								),
							),
							'no'  => array(),
						),
						'show_borders' => false,
					),
				)
			)
		)
	),
	'title-bar-box' => array(
		'title' => esc_html__('Title Bar', 'dream'),
		'type' => 'box',
		'options' => array(
			'general_title_bar' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
					'html_label' => array(
						'type' => 'html',
						'html' => '',
						'value' => '',
						'label' => esc_html__('Title bar Spacing', 'dream'),
					),
					'title_bar_top' => array(
						'label' => false,
						'desc' => esc_html__('top', 'dream'),
						'type' => 'short-text',
						'value' => '120',
					),
					'title_bar_bottom' => array(
						'label' => false,
						'desc' => esc_html__('bottom ', 'dream'),
						'type' => 'short-text',
						'value' => '100',
					),
					'title_bar_image' => array(
						'label' => esc_html__('Title Bar Image Background', 'dream'),
						'desc' => esc_html__('Upload a title bar image', 'dream'),
						'type' => 'upload',
					),
					'background_color' => array(
						'label'   => false, //esc_html__( '', 'dream' ),
						'desc'    => esc_html__( 'Select the background color', 'dream' ),
						'value'   => $dream_color_settings['color_5'],
						'choices' => $dream_color_settings,
						'type'    => 'color-palette'
					),
					'title_bar_image_repeat'           => array(
						'label'   => false, //esc_html__( '', 'dream' ),
						'desc'    => esc_html__( 'Select how will the background repeat', 'dream' ),
						'type'    => 'short-select',
						'attr' => array(
							'class' => 'fw-option-type-multi-show-borders',
						),
						'value'   => 'no-repeat',
						'choices' => array(
							'no-repeat' => esc_html__( 'No-Repeat', 'dream' ),
							'repeat'    => esc_html__( 'Repeat', 'dream' ),
							'repeat-x'  => esc_html__( 'Repeat-X', 'dream' ),
							'repeat-y'  => esc_html__( 'Repeat-Y', 'dream' ),
						)
					),
					'title_bar_image_position_x'    => array(
						'label'   => false, //esc_html__( 'Position', 'dream' ),
						'desc'    => esc_html__( 'Select the horizontal background position', 'dream' ),
						'type'    => 'short-select',
						'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
						'value'   => 'center',
						'choices' => array(
							'left'   => esc_html__( 'Left', 'dream' ),
							'center' => esc_html__( 'Center', 'dream' ),
							'right'  => esc_html__( 'Right', 'dream' ),
						)
					),
					'title_bar_image_position_y'    => array(
						'label'   => false, //esc_html__( '', 'dream' ),
						'desc'    => esc_html__( 'Select the vertical background position', 'dream' ),
						'type'    => 'short-select',
						'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
						'value'   => 'center',
						'choices' => array(
							'top'    => esc_html__( 'Top', 'dream' ),
							'center' => esc_html__( 'Center', 'dream' ),
							'bottom' => esc_html__( 'Bottom', 'dream' ),
						)
					),
					'title_bar_image_size'          => array(
						'label'   => false, //esc_html__( 'Size', 'dream' ),
						'desc'    => esc_html__( 'Select the background size', 'dream' ),
						'help'    => esc_html__( 'Auto - Default value, the background image has the original width and height.Cover - Scale the background image so that the background area is completely covered by the image. Contain - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'dream' ),
						'type'    => 'short-select',
						'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
						'value'   => 'cover',
						'choices' => array(
							'auto'    => esc_html__( 'Auto', 'dream' ),
							'cover'   => esc_html__( 'Cover', 'dream' ),
							'contain' => esc_html__( 'Contain', 'dream' ),
						)
					),
					'parallax'         => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'selected' => array(
								'type'         => 'switch',
								'label'        => esc_html__( 'Parallax Effect', 'dream' ),
								'desc'         => esc_html__( 'Create a parallax effect on scroll?', 'dream' ),
								'help'         => esc_html__( "Please use an image that is taller then the section's height in order for the parallax to work properly. If you set the speed at 1 you'll need an image twice the section's height.", "dream" ),
								'value'        => 'yes',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__( 'Yes', 'dream' ),
								),
								'left-choice'  => array(
									'value' => 'no',
									'label' => esc_html__( 'No', 'dream' ),
								),
							),
						),
						'choices' => array(
							'yes' => array(
								'parallax_speed' => array(
									'label'      => false, //esc_html__( '', 'dream' ),
									'desc'       => esc_html__( 'Select the parallax speed', 'dream' ),
									'type'       => 'slider',
									'value'      => 5,
									'properties' => array(
										'min' => 1,
										'max' => 10,
										'sep' => 1,
									),
								),
							)
						)
					),
					'title_bar_overlay_options' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'title_bar_overlay' => array(
								'type' => 'switch',
								'label' => esc_html__('Overlay Color', 'dream'),
								'desc' => esc_html__('Enable image overlay color?', 'dream'),
								'value' => 'no',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__('Yes', 'dream'),
								),
								'left-choice' => array(
									'value' => 'no',
									'label' => esc_html__('No', 'dream'),
								),
							),
						),
						'choices' => array(
							'no' => array(),
							'yes' => array(
								'title_bar_overlay_color' => array(
									'label' => false, //esc_html__('', 'dream'),
									'desc' => esc_html__('Select the image overlay color', 'dream'),
									'value' => $dream_color_settings['color_5'],
									'choices' => $dream_color_settings,
									'type' => 'color-palette'
								),
								'title_bar_overlay_opacity_image' => array(
									'type' => 'slider',
									'value' => 80,
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'label' => false, //esc_html__('', 'dream'),
									'desc' => esc_html__('Select the overlay color opacity in %', 'dream'),
								)
							),
						),
					),
					'content_align' => array(
						'label' => esc_html__('Content Align', 'dream'),
						'desc' => esc_html__('Select the content align', 'dream'),
						'type' => 'image-picker',
						'value' => 'fw-content-align-center',
						'choices' => array(
							'fw-content-align-left' => array(
								'small' => array(
									'height' => 50,
									'src' => $dream_template_directory . '/assets/images/image-picker/left-position.jpg',
									'title' => esc_html__('Left', 'dream')
								),
							),
							'fw-content-align-center' => array(
								'small' => array(
									'height' => 50,
									'src' => $dream_template_directory . '/assets/images/image-picker/center-position.jpg',
									'title' => esc_html__('Center', 'dream')
								),
							),
							'fw-content-align-right' => array(
								'small' => array(
									'height' => 50,
									'src' => $dream_template_directory . '/assets/images/image-picker/right-position.jpg',
									'title' => esc_html__('Right', 'dream')
								),
							),
						),
					),
					'title_bar_title_typography' => array(
						'attr' => array('class' => 'fw-advanced-button'),
						'type' => 'popup',
						'label' => esc_html__('Title', 'dream'),
						'desc' => esc_html__('Change the style / typography of the title', 'dream'),
						'button' => esc_html__('Styling', 'dream'),
						'size' => 'small',
						'popup-options' => array(
							'typography' => array(
								'label' => esc_html__('Title', 'dream'),
								'type' => 'tf-typography',
								'value' => array(
									'google_font' => $dream_typography_settings['h1']['google_font'],
									'subset' => $dream_typography_settings['h1']['subset'],
									'variation' => $dream_typography_settings['h1']['variation'],
									'family' => $dream_typography_settings['h1']['family'],
									'style' => $dream_typography_settings['h1']['style'],
									'weight' => $dream_typography_settings['h1']['weight'],
									'size' => $dream_typography_settings['h1']['size'],
									'line-height' => $dream_typography_settings['h1']['line-height'],
									'letter-spacing' => $dream_typography_settings['h1']['letter-spacing'],
									'color-palette' => '',
								)
							),
						),
					),
					'title_bar_description_typography' => array(
						'attr' => array('class' => 'fw-advanced-button'),
						'type' => 'popup',
						'label' => esc_html__('Description', 'dream'),
						'desc' => esc_html__('Change the style / typography of the description', 'dream'),
						'button' => esc_html__('Styling', 'dream'),
						'size' => 'small',
						'popup-options' => array(
							'typography' => array(
								'label' => esc_html__('Title', 'dream'),
								'type' => 'tf-typography',
								'value' => array(
									'google_font' => $dream_typography_settings['h1']['google_font'],
									'subset' => $dream_typography_settings['h1']['subset'],
									'variation' => $dream_typography_settings['h1']['variation'],
									'family' => $dream_typography_settings['h1']['family'],
									'style' => $dream_typography_settings['h1']['style'],
									'weight' => $dream_typography_settings['h1']['weight'],
									'size' => $dream_typography_settings['h1']['size'],
									'line-height' => $dream_typography_settings['h1']['line-height'],
									'letter-spacing' => $dream_typography_settings['h1']['letter-spacing'],
									'color-palette' => '',
								)
							),
						),
					),
					'breadcrumbs_typography' => array(
						'attr' => array('class' => 'fw-advanced-button'),
						'type' => 'popup',
						'label' => esc_html__('Breadcrumbs Typography', 'dream'),
						'desc' => esc_html__('Change the style / typography of the breadcrumbs', 'dream'),
						'button' => esc_html__('Styling', 'dream'),
						'size' => 'small',
						'popup-options' => array(
							'typography' => array(
								'label' => esc_html__('Breadcrumbs Typography', 'dream'),
								'type' => 'tf-typography',
								'value' => array(
									'google_font' => true,
		              'subset' => 'latin',
		              'variation' => 'regular',
		              'family' => 'Quattrocento Sans',
		              'style' => '',
		              'weight' => '',
		              'size' => '16.5',
		              'line-height' => '30',
		              'letter-spacing' => '0',
		              'color-palette' => '',
								)
							),
							'text_uppercase' => array(
								'label' => esc_html__('Text Uppercase', 'dream'),
								// 'desc' => esc_html__('Show footer widgets?', 'dream'),
								'type' => 'switch',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__('Yes', 'dream')
								),
								'left-choice' => array(
									'value' => 'no',
									'label' => esc_html__('No', 'dream')
								),
								'value' => 'no',
							),
						),
					),
					'default_pages_info' => array(
						'label' => false,
						'desc' => '<i class="fw-info-symbol dashicons dashicons-info"></i>' . esc_html__('These options apply only to pages created with the default template (default WordPress pages) and not with the Visual Builder', 'dream'),
						'type' => 'html',
						'html' => '',
					),
				)
			)
		)
	),
	$dream_notification_center_box,
	$dream_post_box,
	$dream_portfolio_box,
	$dream_events_box,
	$dream_shop_box,
	$dream_wp_ultimate_recipe_box,
	$dream_give_box,
	'footer-box' => array(
		'title' => esc_html__('Footer', 'dream'),
		'type' => 'box',
		'options' => array(
			'footer_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
					$dream_select_footer,
				)
			)
		)
	),
  'colors-box' => array(
    'title' => esc_html__('Colors', 'dream'),
    'type' => 'box',
    'attr' => array('class' => 'fw-color-picker-palette'),
    'options' => array(
      'color_settings' => array(
        'type' => 'multi',
        'label' => false,
        'inner-options' => array(
          'color_1' => array(
            'label' => esc_html__('Color Palette', 'dream'),
            'desc' => esc_html__('Color 1', 'dream'),
            'type' => 'color-picker',
            'value' => $dream_color_settings['color_1'],
          ),
          'color_2' => array(
            'label' => false, //esc_html__('', 'dream'),
            'desc' => esc_html__('Color 2', 'dream'),
            'type' => 'color-picker',
            'value' => $dream_color_settings['color_2'],
          ),
          'color_3' => array(
            'label' => false, //esc_html__('', 'dream'),
            'desc' => esc_html__('Color 3', 'dream'),
            'type' => 'color-picker',
            'value' => $dream_color_settings['color_3'],
          ),
          'color_4' => array(
            'label' => false, //esc_html__('', 'dream'),
            'desc' => esc_html__('Color 4', 'dream'),
            'type' => 'color-picker',
            'value' => $dream_color_settings['color_4'],
          ),
          'color_5' => array(
            'label' => false, //esc_html__('', 'dream'),
            'desc' => esc_html__('Color 5', 'dream'),
            'type' => 'color-picker',
            'value' => $dream_color_settings['color_5'],
          ),
        )
      ),
      'buttons_settings' => array(
        'type' => 'multi',
        'label' => false,
        'inner-options' => array(
          'links_color_group' => array(
            'type' => 'group',
            'options' => array(
              'links_normal_state' => array(
                'label' => esc_html__('Links Color', 'dream'),
                'desc' => esc_html__('normal state', 'dream'),
                'value' => $dream_color_settings['color_1'],
                'choices' => $dream_color_settings,
                'type' => 'color-palette'
              ),
              'links_hover_state' => array(
                'label' => false, //esc_html__('', 'dream'),
                'desc' => esc_html__('hover state', 'dream'),
                'value' => $dream_color_settings['color_2'],
                'choices' => $dream_color_settings,
                'type' => 'color-palette'
              ),
            )
          ),
          'buttons_color_group' => array(
            'type' => 'group',
            'attr' => array('class' => 'border-bottom-none'),
            'options' => array(
              'buttons_normal_state' => array(
                'label' => esc_html__('Buttons Color', 'dream'),
                'desc' => esc_html__('normal state', 'dream'),
                'value' => $dream_color_settings['color_1'],
                'choices' => $dream_color_settings,
                'type' => 'color-palette'
              ),
              'buttons_hover_state' => array(
                'label' => false, //esc_html__('', 'dream'),
                'desc' => esc_html__('hover state', 'dream'),
                'value' => $dream_color_settings['color_2'],
                'choices' => $dream_color_settings,
                'type' => 'color-palette'
              ),
            )
          ),
        )
      ),
    )
  ),
  'typography-box' => array(
    'title' => esc_html__('Typography', 'dream'),
    'type' => 'box',
    'options' => array(
      'typography_settings' => array(
        'type' => 'multi',
        'label' => false,
        'attr' => array(
          'class' => 'fw-option-type-multi-show-borders',
        ),
        'inner-options' => array(
          'body_text' => array(
            'label' => esc_html__('Body Text', 'dream'),
            'type' => 'tf-typography',
            'value' => array(
              'google_font' => true,
              'subset' => 'latin',
              'variation' => 'regular',
              'family' => 'Quattrocento Sans',
              'style' => '',
              'weight' => '',
              'size' => '16.5',
              'line-height' => '28',
              'letter-spacing' => '0',
              'color-palette' => $dream_color_settings['color_3'],
            ),
          ),
					'buttons_typography_group' => array(
            'type' => 'group',
            'attr' => array('class' => 'border-bottom-none'),
            'options' => array(
              'buttons' => array(
                'label' => esc_html__('Buttons', 'dream'),
                'type' => 'tf-typography',
                'value' => array(
                  'google_font' => true,
                  'subset' => 'latin',
                  'variation' => 'regular',
                  'family' => 'Montserrat',
                  'style' => '',
                  'weight' => '',
                  'size' => '12',
                  'line-height' => '20',
                  'letter-spacing' => '0',
                  'color-palette' => $dream_color_settings['color_5'],
                ),
              ),
              'buttons_hover' => array(
                'label' => false, //esc_html__('', 'dream'),
                'desc' => esc_html__('Select buttons hover color', 'dream'),
                'value' => '#ffffff',
                'choices' => $dream_color_settings,
                'type' => 'color-palette'
              ),
            )
          ),
					/* Start extra fonts */
					'extra_typography_group' => array(
						'title' => esc_html__('Extra Typography', 'dream'),
						'type' => 'box',
						'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'extra_typography' => array(
								'type' => 'addable-popup',
								'size' => 'medium',
								'label' => esc_html__('Typography', 'dream'),
								'desc' => esc_html__('Add your typography from google/font', 'dream'),
								'template' => '{{=name}}',
								'popup-options' => array(
									'name' => array(
										'label' => esc_html__('Name', 'dream'),
										'desc' => esc_html__('Enter a name (it is for internal use and will not appear on the front end)', 'dream'),
										'type' => 'text',
									),
									'typography' => array(
										'label' => esc_html__('Typography', 'dream'),
										'type' => 'tf-typography',
										'value' => array(
											'google_font' => true,
											'subset' => 'latin',
											'variation' => 'regular',
											'family' => 'Montserrat',
											'style' => '',
											'weight' => '',
											'size' => '32',
											'line-height' => '50',
											'letter-spacing' => '0',
											'color-palette' => $dream_color_settings['color_3'],
										)
									),
									'class' => array(
										'label' => esc_html__('Class', 'dream'),
										'desc' => esc_html__('Enter a class (Ex: body .custom-font-style-1)', 'dream'),
										'type' => 'text',
									),
								),
							),
						),
					),
					/* End extra font */
					/* H1 - H6 tag */
					'h1-h6-tag' => array(
            'title' => esc_html__('H1 - H6 Tag <p>', 'dream'),
            'type' => 'box',
						'attr' => array('class' => 'customizer-contaner-wrap-options'), // box-setting-toggle-inside-js is-closed
            'options' => array(
							'h1' => array(
		            'label' => esc_html__('H1', 'dream'),
		            'type' => 'tf-typography',
		            'value' => array(
		              'google_font' => true,
		              'subset' => 'latin',
		              'variation' => '700',
		              'family' => 'Montserrat',
		              'style' => '',
		              'weight' => '',
		              'size' => '55',
		              'line-height' => '65',
		              'letter-spacing' => '0',
		              'color-palette' => $dream_color_settings['color_3'],
		            )
		          ),
		          'h2' => array(
		            'label' => esc_html__('H2', 'dream'),
		            'type' => 'tf-typography',
		            'value' => array(
		              'google_font' => true,
		              'subset' => 'latin',
		              'variation' => '700',
		              'family' => 'Montserrat',
		              'style' => '',
		              'weight' => '',
		              'size' => '40',
		              'line-height' => '56',
		              'letter-spacing' => '0',
		              'color-palette' => $dream_color_settings['color_3'],
		            )
		          ),
		          'h3' => array(
		            'label' => esc_html__('H3', 'dream'),
		            'type' => 'tf-typography',
		            'value' => array(
		              'google_font' => true,
		              'subset' => 'latin',
		              'variation' => '700',
		              'family' => 'Montserrat',
		              'style' => '',
		              'weight' => '',
		              'size' => '32',
		              'line-height' => '38',
		              'letter-spacing' => '0',
		              'color-palette' => $dream_color_settings['color_3'],
		            )
		          ),
		          'h4' => array(
		            'label' => esc_html__('H4', 'dream'),
		            'type' => 'tf-typography',
		            'value' => array(
		              'google_font' => true,
		              'subset' => 'latin',
		              'variation' => '700',
		              'family' => 'Montserrat',
		              'style' => '',
		              'weight' => '',
		              'size' => '26',
		              'line-height' => '32',
		              'letter-spacing' => '0',
		              'color-palette' => $dream_color_settings['color_3'],
		            )
		          ),
		          'h5' => array(
		            'label' => esc_html__('H5', 'dream'),
		            'type' => 'tf-typography',
		            'value' => array(
		              'google_font' => true,
		              'subset' => 'latin',
		              'variation' => '700',
		              'family' => 'Montserrat',
		              'style' => '',
		              'weight' => '',
		              'size' => '19',
		              'line-height' => '28',
		              'letter-spacing' => '0',
		              'color-palette' => $dream_color_settings['color_3'],
		            )
		          ),
		          'h6' => array(
		            'label' => esc_html__('p', 'dream'),
		            'type' => 'tf-typography',
		            'value' => array(
		              'google_font' => true,
		              'subset' => 'latin',
		              'variation' => '700',
		              'family' => 'Montserrat',
		              'style' => '',
		              'weight' => '',
		              'size' => '14',
		              'line-height' => '26',
									'letter-spacing' => '0',
		              'color-palette' => $dream_color_settings['color_3'],
		            )
		          ),
						)
					),
					/* End H1 - H6 tag */
          'header-typography-box' => array(
            'title' => esc_html__('Header', 'dream'),
            'type' => 'box',
						'attr' => array('class' => 'customizer-contaner-wrap-options'),
            'options' => array(
              'header_top_bar_text' => array(
                'label' => esc_html__('Header Top Bar', 'dream'),
                'type' => 'tf-typography',
                'value' => array(
                  'google_font' => true,
                  'subset' => 'latin',
                  'variation' => 'regular',
                  'family' => 'NTR',
                  'style' => '',
                  'weight' => '',
                  'size' => '13',
                  'line-height' => '38',
                  'letter-spacing' => '0.3',
                  'color-palette' => $dream_color_settings['color_5'],
                ),
              ),
              'header_menu_group' => array(
                'type' => 'group',
                'attr' => array('class' => 'border-bottom-none'),
                'options' => array(
                  'header_menu' => array(
                    'label' => esc_html__('Header Menu', 'dream'),
                    'type' => 'tf-typography',
                    'value' => array(
                      'google_font' => true,
                      'subset' => 'latin',
                      'variation' => 'regular',
                      'family' => 'Montserrat',
                      'style' => '',
                      'weight' => '',
                      'size' => '13',
                      'line-height' => '30',
                      'letter-spacing' => '0',
                      'color-palette' => $dream_color_settings['color_3'],
                    ),
                  ),
                  'header_menu_hover' => array(
                    'label' => false, //esc_html__('', 'dream'),
                    'desc' => esc_html__('Select the menu items hover color', 'dream'),
                    'value' => $dream_color_settings['color_1'],
                    'choices' => $dream_color_settings,
                    'type' => 'color-palette'
                  ),
                  'header_menu_items_spacing' => array(
                    'type' => 'short-text',
                    'value' => '40',
                    'label' => esc_html__('Menu Items Spacing', 'dream'),
                    'desc' => esc_html__('Select the menu items spacing in pixels', 'dream'),
                  )
                )
              ),
              'header_sub_menu_group' => array(
                'type' => 'group',
                'attr' => array('class' => 'border-bottom-none'),
                'options' => array(
                  'header_sub_menu' => array(
                    'label' => esc_html__('Header Sub-Menu', 'dream'),
                    'type' => 'tf-typography',
                    'value' => array(
                      'google_font' => true,
                      'subset' => 'latin',
                      'variation' => 'regular',
                      'family' => 'Montserrat',
                      'style' => '',
                      'weight' => '',
                      'size' => '13',
                      'line-height' => '30',
                      'letter-spacing' => '0',
                      'color-palette' => $dream_color_settings['color_5'],
                    ),
                  ),
                  'header_sub_menu_hover' => array(
                    'label' => false, //esc_html__('', 'dream'),
                    'desc' => esc_html__('Select the sub menu items hover color', 'dream'),
                    'value' => $dream_color_settings['color_1'],
                    'choices' => $dream_color_settings,
                    'type' => 'color-palette'
                  ),
									'header_sub_menu_items_spacing' => array(
                    'type' => 'short-text',
                    'value' => '5',
                    'label' => esc_html__('Sub Menu Items Spacing', 'dream'),
                    'desc' => esc_html__('Select the menu items spacing in pixels', 'dream'),
                  )
                )
              ),
            )
          ),
          'footer-typography-box' => array(
            'title' => esc_html__('Footer', 'dream'),
            'type' => 'box',
						'attr' => array('class' => 'customizer-contaner-wrap-options'),
            'options' => array(
              'footer_copyright_typography' => array(
                'label' => __('Footer Copyright', 'dream'),
                'type' => 'tf-typography',
                'value' => array(
                  'google_font' => true,
                  'subset' => 'latin',
                  'variation' => 'regular',
                  'family' => 'Quattrocento Sans',
                  'style' => '',
                  'weight' => '',
                  'size' => '15',
                  'line-height' => '45',
                  'letter-spacing' => '0',
                  'color-palette' => $dream_color_settings['color_5'],
                ),
              ),
            )
          ),
        )
      )
    )
  ),
);
?>
