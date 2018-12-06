<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//fw_print( fw_get_db_post_option() );
$dream_admin_url = admin_url();

$dream_template_directory      = get_template_directory_uri();
$pages                        = get_pages();
$selected_page_header_options = array( '' => __( '- Select -', 'dream' ) );
if ( ! empty( $pages ) ) {
	foreach ( $pages as $page ) {
		if ( fw_akg( 'enable_page_options/selected_value', fw_get_db_post_option( $page->ID ) ) == 'fw_enable_page_options' && ( $page->ID != get_the_ID() ) && empty( fw_akg( 'enable_page_options/fw_enable_page_options/custom_page_header_layout_value', fw_get_db_post_option( $page->ID ) ) ) ) {
			$selected_page_header_options[ $page->ID ] = html_entity_decode( get_the_title( $page->ID ) );
		}
	}
}

$dream_page_colors         = array(
	'color_1' => '#1490d7',
	'color_2' => '#1e1e27',
);
$dream_page_colors_options = ( ! empty( fw_akg( 'enable_page_options/fw_enable_page_options/color_settings', fw_get_db_post_option() ) ) ) ? fw_akg( 'enable_page_options/fw_enable_page_options/color_settings', fw_get_db_post_option() ) : array();
$dream_page_colors         = array_merge( $dream_page_colors, $dream_page_colors_options );
$page_custom_options      = fw_akg( 'enable_page_options', fw_get_db_post_option() );

if ( isset( $page_custom_options ) ) {
	add_filter( 'fw_tf_typography_color_palette_choices', '_dream_filter_tf_typography_color' );
}

/* Header layout */
$dream_header_layout = array(
	'header-1' => array(
		'parent' => array(
			'small' => array(
				'height' => 75,
				'src'    => $dream_template_directory . '/assets/images/image-picker/header-type1.jpg'
			),
			'large' => array(
				'height' => 214,
				'src'    => $dream_template_directory . '/assets/images/image-picker/header-type1.jpg'
			),
		)
	),
	'header-2' => array(
		'parent'   => array(
			'small' => array(
				'height' => 75,
				'src'    => $dream_template_directory . '/assets/images/image-picker/header-type2.jpg'
			),
			'large' => array(
				'height' => 214,
				'src'    => $dream_template_directory . '/assets/images/image-picker/header-type2.jpg'
			),
		),
		'children' => array(
			'custom_position_logo_menu' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'select' => array(
						'type'         => 'switch',
						'label'        => __( 'Custom Position Logo & Menu', 'dream' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'dream' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'dream' ),
						),
						'value'        => 'no',
					)
				),
				'choices' => array(
					'yes' => array(
						'position_logo_menu' => array(
							'type'          => 'addable-popup',
							'size'          => 'medium',
							'limit'         => 4,
							'label'         => __( 'Position Logo, Menu & Sidebar', 'dream' ),
							'desc'          => __( 'Add logo(position) & menu(position) you want display', 'dream' ),
							'template'      => '{{=name}}',
							'popup-title'   => null,
							'value'         => array(
								array(
									'name'          => esc_html__( 'Primary Menu', 'dream' ),
									'width'         => 40,
									'type'          => array(
										'select' => 'menu',
										'menu'   => array(
											'menu_type' => 'primary',
										)
									),
									'content_align' => 'text-left',
									'custom_class'  => '',
								),
								array(
									'name'          => esc_html__( 'Logo', 'dream' ),
									'width'         => 15,
									'type'          => array(
										'select' => 'logo',
									),
									'content_align' => 'text-center',
									'custom_class'  => '',
								),
								array(
									'name'          => esc_html__( 'Secondary Menu', 'dream' ),
									'width'         => 30,
									'type'          => array(
										'select' => 'menu',
										'menu'   => array(
											'menu_type' => 'secondary',
										)
									),
									'content_align' => 'text-right',
									'custom_class'  => '',
								),
								array(
									'name'          => esc_html__( 'Sidebar', 'dream' ),
									'width'         => 15,
									'type'          => array(
										'select'  => 'sidebar',
										'sidebar' => array(
											'sidebar_id' => 'blank',
										)
									),
									'content_align' => 'text-right',
									'custom_class'  => '',
								),
							),
							'popup-options' => array(
								'name'          => array(
									'label' => esc_html__( 'Name', 'dream' ),
									'desc'  => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end)', 'dream' ),
									'type'  => 'text',
								),
								'width'         => array(
									'type'       => 'slider',
									// 'value' => 996,
									'label'      => esc_html__( 'Width', 'dream' ),
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'desc'       => esc_html__( 'Select the width in %', 'dream' ),
								),
								'type'          => array(
									'type'    => 'multi-picker',
									'label'   => false,
									'desc'    => false,
									'picker'  => array(
										'select' => array(
											'type'    => 'radio',
											'label'   => esc_html__( 'Select Type', 'dream' ),
											'value'   => 'sidebar',
											'choices' => array(
												'logo'    => __( 'Logo', 'dream' ),
												'menu'    => __( 'Menu', 'dream' ),
												'sidebar' => __( 'Sidebar', 'dream' ),
											),
										)
									),
									'choices' => array(
										'menu'    => array(
											'menu_type' => array(
												'type'    => 'select',
												'label'   => esc_html__( 'Menu Type', 'dream' ),
												'desc'    => esc_html__( 'Please select menu type', 'dream' ),
												'choices' => array(
													'primary'   => esc_html__( 'Primary Menu', 'dream' ),
													'secondary' => esc_html__( 'Secondary Menu', 'dream' ),
												),
											),
										),
										'sidebar' => array(
											'sidebar_id' => array(
												'type'    => 'select',
												'label'   => esc_html__( 'Sidebar', 'dream' ),
												'desc'    => esc_html__( 'Please select sidebar', 'dream' ),
												'choices' => dream_get_sidebars( array( 'blank' => esc_html__( '- Display Blank -', 'dream' ) ) ),
											),
										)
									)
								),
								'content_align' => array(
									'label'   => esc_html__( 'Content Align', 'dream' ),
									'desc'    => esc_html__( 'Select the content align', 'dream' ),
									'type'    => 'image-picker',
									'value'   => 'text-left',
									'choices' => array(
										'text-left'   => array(
											'small' => array(
												'height' => 50,
												'src'    => $dream_template_directory . '/assets/images/image-picker/left-position.jpg',
												'title'  => esc_html__( 'Left', 'dream' )
											),
										),
										'text-center' => array(
											'small' => array(
												'height' => 50,
												'src'    => $dream_template_directory . '/assets/images/image-picker/center-position.jpg',
												'title'  => esc_html__( 'Center', 'dream' )
											),
										),
										'text-right'  => array(
											'small' => array(
												'height' => 50,
												'src'    => $dream_template_directory . '/assets/images/image-picker/right-position.jpg',
												'title'  => esc_html__( 'Right', 'dream' )
											),
										),
									),
								),
								'custom_class'  => array(
									'label' => esc_html__( 'Custom Class', 'dream' ),
									'desc'  => esc_html__( 'Custom class', 'dream' ),
									'type'  => 'text',
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
		'parent'   => array(
			'small' => array(
				'height' => 75,
				'src'    => $dream_template_directory . '/assets/images/image-picker/header-type3.jpg'
			),
			'large' => array(
				'height' => 214,
				'src'    => $dream_template_directory . '/assets/images/image-picker/header-type3.jpg'
			),
		),
		'children' => array(
			'custom_position_logo_sidebar' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'select' => array(
						'type'         => 'switch',
						'label'        => __( 'Custom Position Logo & Sidebar', 'dream' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'dream' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'dream' ),
						),
						'value'        => 'no',
					)
				),
				'choices' => array(
					'yes' => array(
						'position_logo_sidebar' => array(
							'type'          => 'addable-popup',
							'size'          => 'medium',
							'limit'         => 4,
							'label'         => __( 'Position Logo & Sidebar', 'dream' ),
							'desc'          => __( 'Add logo(position) & sidebar you want display', 'dream' ),
							'template'      => '{{=name}}',
							'popup-title'   => null,
							'value'         => array(
								array(
									'name'          => esc_html__( 'Sidebar Left', 'dream' ),
									'width'         => 40,
									'type'          => array(
										'select'  => 'sidebar',
										'sidebar' => array(
											'sidebar_id' => 'blank',
										)
									),
									'content_align' => 'text-center',
									'custom_class'  => '',
								),
								array(
									'name'          => esc_html__( 'Logo', 'dream' ),
									'width'         => 20,
									'type'          => array(
										'select' => 'logo',
									),
									'content_align' => 'text-center',
									'custom_class'  => '',
								),
								array(
									'name'          => esc_html__( 'Sidebar Right', 'dream' ),
									'width'         => 40,
									'type'          => array(
										'select'  => 'sidebar',
										'sidebar' => array(
											'sidebar_id' => 'blank',
										)
									),
									'content_align' => 'text-right',
									'custom_class'  => '',
								),
							),
							'popup-options' => array(
								'name'          => array(
									'label' => esc_html__( 'Name', 'dream' ),
									'desc'  => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end)', 'dream' ),
									'type'  => 'text',
								),
								'width'         => array(
									'type'       => 'slider',
									'label'      => esc_html__( 'Width', 'dream' ),
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'desc'       => esc_html__( 'Select the width in %', 'dream' ),
								),
								'type'          => array(
									'type'    => 'multi-picker',
									'label'   => false,
									'desc'    => false,
									'picker'  => array(
										'select' => array(
											'type'         => 'switch',
											'label'        => esc_html__( 'Select Type', 'dream' ),
											'left-choice'  => array(
												'value' => 'sidebar',
												'label' => esc_html__( 'Sidebar', 'dream' ),
											),
											'right-choice' => array(
												'value' => 'logo',
												'label' => esc_html__( 'Logo', 'dream' ),
											),
										)
									),
									'choices' => array(
										'sidebar' => array(
											'sidebar_id' => array(
												'type'    => 'short-select',
												'label'   => esc_html__( 'Sitebar', 'dream' ),
												'desc'    => esc_html__( 'Please select sitebar', 'dream' ),
												'choices' => dream_get_sidebars( array( 'blank' => esc_html__( '- Display Blank -', 'dream' ) ) ),
											),
										)
									)
								),
								'content_align' => array(
									'label'   => esc_html__( 'Content Align', 'dream' ),
									'desc'    => esc_html__( 'Select the content align', 'dream' ),
									'type'    => 'image-picker',
									'value'   => 'text-left',
									'choices' => array(
										'text-left'   => array(
											'small' => array(
												'height' => 50,
												'src'    => $dream_template_directory . '/assets/images/image-picker/left-position.jpg',
												'title'  => esc_html__( 'Left', 'dream' )
											),
										),
										'text-center' => array(
											'small' => array(
												'height' => 50,
												'src'    => $dream_template_directory . '/assets/images/image-picker/center-position.jpg',
												'title'  => esc_html__( 'Center', 'dream' )
											),
										),
										'text-right'  => array(
											'small' => array(
												'height' => 50,
												'src'    => $dream_template_directory . '/assets/images/image-picker/right-position.jpg',
												'title'  => esc_html__( 'Right', 'dream' )
											),
										),
									),
								),
								'custom_class'  => array(
									'label' => esc_html__( 'Custom Class', 'dream' ),
									'desc'  => esc_html__( 'Custom class', 'dream' ),
									'type'  => 'text',
									'value' => '',
								),
							),
						),
					)
				)
			),
			//			'html_label_logo_sidebar_padding' => array(
			//				'type'  => 'html',
			//				'html'  => '',
			//				'value' => '',
			//				'label' => __( 'Logo & Sidebar Padding', 'dream' ),
			//			),
			'logo_sidebar_padding_top'     => array(
				'label' => __( 'Logo & Sidebar Padding Top', 'dream' ),
				'desc'  => esc_html__( 'top', 'dream' ),
				'type'  => 'short-text',
				'value' => 15,
			),
			'logo_sidebar_padding_bottom'  => array(
				'label' => __( 'Logo & Sidebar Padding Bottom', 'dream' ),
				'desc'  => esc_html__( 'bottom ', 'dream' ),
				'type'  => 'short-text',
				'value' => 15,
			),
			'logo_sidebar_bg_color'        => array(
				'label' => esc_html__( 'Background Color', 'dream' ),
				'desc'  => __( 'Select the background color for Logo & Sidebar', 'dream' ),
				'value' => '#ffffff',
				'type'  => 'color-picker',
			),
			'logo_sidebar_shadow_effect'   => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'select' => array(
						'type'         => 'switch',
						'label'        => esc_html__( 'Shadow Effect', 'dream' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'dream' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'dream' ),
						),
						'value'        => 'yes',
					)
				),
				'choices' => array(
					'yes' => array(
						'shadow_color' => array(
							'label' => esc_html__( 'Shadow Color', 'dream' ),
							'desc'  => esc_html__( 'Select the shadow color', 'dream' ),
							'value' => '#222222',
							'type'  => 'color-picker',
						)
					)
				)
			),
			'custom_position_menu'         => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'select' => array(
						'type'         => 'switch',
						'label'        => __( 'Custom Position Menu', 'dream' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'dream' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'dream' ),
						),
						'value'        => 'no',
					)
				),
				'choices' => array(
					'yes' => array(
						'position_menu' => array(
							'type'          => 'addable-popup',
							'size'          => 'medium',
							'limit'         => 2,
							'label'         => __( 'Add Menu', 'dream' ),
							'desc'          => __( 'Add menu you want display', 'dream' ),
							'template'      => '{{=name}}',
							'popup-title'   => null,
							'value'         => array(
								array(
									'name'          => esc_html__( 'Primary Menu', 'dream' ),
									'width'         => 100,
									'menu_type'     => 'primary',
									'content_align' => 'text-left',
									'custom_class'  => '',
								),
							),
							'popup-options' => array(
								'name'          => array(
									'label' => esc_html__( 'Name', 'dream' ),
									'desc'  => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end)', 'dream' ),
									'type'  => 'text',
								),
								'width'         => array(
									'type'       => 'slider',
									'label'      => esc_html__( 'Width', 'dream' ),
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'desc'       => esc_html__( 'Select the width in %', 'dream' ),
								),
								'menu_type'     => array(
									'type'    => 'short-select',
									'label'   => esc_html__( 'Menu Type', 'dream' ),
									'desc'    => esc_html__( 'Please select menu type', 'dream' ),
									'choices' => array(
										'primary'   => esc_html__( 'Primary Menu', 'dream' ),
										'secondary' => esc_html__( 'Secondary Menu', 'dream' ),
									),
								),
								'content_align' => array(
									'label'   => esc_html__( 'Content Align', 'dream' ),
									'desc'    => esc_html__( 'Select the content align', 'dream' ),
									'type'    => 'image-picker',
									'value'   => 'text-left',
									'choices' => array(
										'text-left'   => array(
											'small' => array(
												'height' => 50,
												'src'    => $dream_template_directory . '/assets/images/image-picker/left-position.jpg',
												'title'  => esc_html__( 'Left', 'dream' )
											),
										),
										'text-center' => array(
											'small' => array(
												'height' => 50,
												'src'    => $dream_template_directory . '/assets/images/image-picker/center-position.jpg',
												'title'  => esc_html__( 'Center', 'dream' )
											),
										),
										'text-right'  => array(
											'small' => array(
												'height' => 50,
												'src'    => $dream_template_directory . '/assets/images/image-picker/right-position.jpg',
												'title'  => esc_html__( 'Right', 'dream' )
											),
										),
									),
								),
								'custom_class'  => array(
									'label' => esc_html__( 'Custom Class', 'dream' ),
									'desc'  => esc_html__( 'Custom class', 'dream' ),
									'type'  => 'text',
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

$options = array(
	'page-side'      => array(
		'title'    => esc_html__( 'Header Image', 'dream' ),
		'type'     => 'box',
		'context'  => 'side',
		'priority' => 'low',
		'options'  => array(
			'header_image'  => array(
				'label' => esc_html__( 'Add Image', 'dream' ),
				'desc'  => esc_html__( 'Upload header image', 'dream' ),
				// 'help'  => esc_html__( 'You can set a general header image for all your pages from the Theme Settings page under the', 'dream' ) . ' <a target="_blank" href="' . $dream_admin_url . 'themes.php?page=fw-settings#fw-options-tab-pages">' . esc_html__( 'Pages tab', 'dream' ) . '</a>',
				'type'  => 'upload',
			),
			'section_space' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Select section space', 'dream' ),
				'value'   => '',
				'help'    => esc_html__( 'This option applies for "Default Template", "Blog page".', 'dream' ),
				'choices' => array(
					''                 => esc_html__( 'Yes', 'dream' ),
					'section-space-no' => esc_html__( 'No', 'dream' ),
				)
			),
		),
	),
	'container-size' => array(
		'title'    => esc_html__( 'Container Size', 'dream' ),
		'type'     => 'box',
		'context'  => 'side',
		'priority' => 'low',
		'options'  => array(
			'container_size' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Select Container Size', 'dream' ),
				'value'   => '',
				'help'    => esc_html__( 'This option applies for "Default Template", "Blog page".', 'dream' ),
				'choices' => array(
					''                => esc_html__( 'Default', 'dream' ),
					'container-large' => esc_html__( 'Container Large', 'dream' ),
				)
			),
		),
	),


	'page-options-box' => array(
		'title'    => esc_html__( 'Page Header Options', 'dream' ),
		'type'     => 'box',
		'priority' => 'low',
		'attr'     => array( 'class' => 'fw-color-picker-palette' ),
		'options'  => array(
			'enable_page_options' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'selected_value' => array(
						'type'         => 'switch',
						'value'        => 'fw_no_enable_page_options',
						'attr'         => array(),
						'label'        => esc_html__( 'Enable header page options', 'dream' ),
						'desc'         => esc_html__( 'Enable and setting header page options?', 'dream' ),
						'left-choice'  => array(
							'value' => 'fw_no_enable_page_options',
							'label' => esc_html__( 'No', 'dream' ),
						),
						'right-choice' => array(
							'value' => 'fw_enable_page_options',
							'label' => esc_html__( 'Yes', 'dream' ),
						),
					)
				),
				'choices'      => array(
					'fw_enable_page_options' => array(
						'header_custom_class'    => array(
							'label' => esc_html__( 'Header Class', 'dream' ),
							'desc'  => esc_html__( '', 'dream' ),
							'type'  => 'short-text',
							'value' => '',
						),
						'custom_page_header_layout_value' => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Select Header', 'dream' ),
							'desc'    => esc_html__( 'If you choose this option, the custom changes below will not apply.', 'dream' ),
							'value'   => '',
							'choices' => $selected_page_header_options,
						),
						'color_settings'                  => array(
							'type'          => 'multi',
							'label'         => false,
							'inner-options' => array(
								'color_1' => array(
									'label' => esc_html__( 'Accent Color', 'dream' ),
									'desc'  => esc_html__( 'Color 1', 'dream' ),
									'type'  => 'color-picker',
									'value' => $dream_page_colors['color_1'],
								),
								'color_2' => array(
									'label' => esc_html__( 'Second Color', 'dream' ),
									'desc'  => esc_html__( 'Color 2', 'dream' ),
									'type'  => 'color-picker',
									'value' => $dream_page_colors['color_2'],
								),
							)
						),
						'buttons_settings'                => array(
							'type'          => 'multi',
							'label'         => false,
							'inner-options' => array(
								'links_color_group'   => array(
									'type'    => 'group',
									'options' => array(
										'links_normal_state' => array(
											'label'   => esc_html__( 'Links Color', 'dream' ),
											'desc'    => esc_html__( 'normal state', 'dream' ),
											'value'   => $dream_page_colors['color_2'],
											'choices' => $dream_page_colors,
											'type'    => 'color-palette'
										),
										'links_hover_state'  => array(
											'label'   => esc_html__( 'Link Hover Color', 'dream' ),
											'desc'    => esc_html__( 'hover state', 'dream' ),
											'value'   => $dream_page_colors['color_1'],
											'choices' => $dream_page_colors,
											'type'    => 'color-palette'
										),
									)
								),
								'buttons_color_group' => array(
									'type'    => 'group',
									'attr'    => array( 'class' => 'border-bottom-none' ),
									'options' => array(
										'buttons_normal_state' => array(
											'label'   => esc_html__( 'Background buttons color', 'dream' ),
											'desc'    => esc_html__( 'normal state', 'dream' ),
											'value'   => $dream_page_colors['color_1'],
											'choices' => $dream_page_colors,
											'type'    => 'color-palette'
										),
										'buttons_hover_state'  => array(
											'label'   => esc_html__( 'Background buttons hover color', 'dream' ),
											'desc'    => esc_html__( 'hover state', 'dream' ),
											'value'   => $dream_page_colors['color_1'],
											'choices' => $dream_page_colors,
											'type'    => 'color-palette'
										),
									)
								),
							)
						),
						'header_settings'                 => array(
							'type'          => 'multi',
							'label'         => false,
							'attr'          => array(
								'class' => 'fw-option-type-multi-show-borders',
							),
							'inner-options' => array(
								'header_group'               => array(
									'type'    => 'group',
									'options' => array(
										'header_type_picker'    => array(
											'type'         => 'multi-picker',
											'label'        => false,
											'desc'         => false,
											'picker'       => array(
												'header_type' => array(
													'label'   => esc_html__( 'Header Type', 'dream' ),
													'type'    => 'image-picker',
													'value'   => 'header-1',
													'desc'    => esc_html__( 'Select the prefered header type', 'dream' ),
													'choices' => dream_load_decentralize_setting( $dream_header_layout, 'parent' ),
												),
											),
											'choices'      => dream_load_decentralize_setting( $dream_header_layout, 'children' ),
											'show_borders' => false,
										),
										'transform_header_mobi' => array(
											'type'       => 'slider',
											'value'      => 996,
											'label'      => esc_html__( 'Transform Header Mobi', 'dream' ),
											'properties' => array(
												'min' => 320,
												'max' => 1170,
												'sep' => 1,
											),
											'desc'       => esc_html__( 'Select the website width transform header mobi in px', 'dream' ),
										),
										//										'html_label'            => array(
										//											'type'  => 'html',
										//											'html'  => '',
										//											'value' => '',
										//											'label' => esc_html__( 'Header Padding', 'dream' ),
										//										),
										'header_padding_top'    => array(
											'label' => esc_html__( 'Header Padding Top', 'dream' ),
											'desc'  => esc_html__( 'top', 'dream' ),
											'type'  => 'short-text',
											'value' => '5',
										),
										'header_padding_bottom' => array(
											'label' => esc_html__( 'Header Padding Bottom', 'dream' ),
											'desc'  => esc_html__( 'bottom ', 'dream' ),
											'type'  => 'short-text',
											'value' => '5',
										),
										'header_bg_color'       => array(
											'label'   => esc_html__( 'Background Color', 'dream' ),
											'desc'    => esc_html__( 'Select header background color', 'dream' ),
											'value'   => '#ffffff',
											'choices' => $dream_page_colors,
											'type'    => 'color-palette'
										),
										'dropdown_bg_color'     => array(
											'label'   => esc_html__( 'Dropdown Bg Color', 'dream' ),
											'desc'    => esc_html__( 'Select the dropdown background color', 'dream' ),
											'value'   => '#ffffff',
											'choices' => $dream_page_colors,
											'type'    => 'color-palette'
										),
										'header_menu_position'  => array(
											'label'   => esc_html__( 'Menu Position', 'dream' ),
											'desc'    => esc_html__( 'Select the menu position', 'dream' ),
											'type'    => 'image-picker',
											'value'   => 'fw-menu-position-right',
											'choices' => array(
												'fw-menu-position-left'   => array(
													'small' => array(
														'height' => 50,
														'src'    => $dream_template_directory . '/assets/images/image-picker/left-position.jpg',
														'title'  => esc_html__( 'Left', 'dream' )
													),
												),
												'fw-menu-position-center' => array(
													'small' => array(
														'height' => 50,
														'src'    => $dream_template_directory . '/assets/images/image-picker/center-position.jpg',
														'title'  => esc_html__( 'Center', 'dream' )
													),
												),
												'fw-menu-position-right'  => array(
													'small' => array(
														'height' => 50,
														'src'    => $dream_template_directory . '/assets/images/image-picker/right-position.jpg',
														'title'  => esc_html__( 'Right', 'dream' )
													),
												),
											),
										),
									)
								),
								'enable_header_full_content' => array(
									'type'         => 'switch',
									'value'        => '',
									'attr'         => array(),
									'label'        => esc_html__( 'Header Full Content', 'dream' ),
									'desc'         => esc_html__( 'Make the header full content?', 'dream' ),
									'left-choice'  => array(
										'value' => '',
										'label' => esc_html__( 'No', 'dream' ),
									),
									'right-choice' => array(
										'value' => 'bt-header-full-content',
										'label' => esc_html__( 'Yes', 'dream' ),
									),
								),
								'enable_absolute_header'     => array(
									'type'         => 'multi-picker',
									'label'        => false,
									'desc'         => false,
									'picker'       => array(
										'selected_value' => array(
											'type'         => 'switch',
											'value'        => 'fw-no-absolute-header',
											'attr'         => array(),
											'label'        => esc_html__( 'Absolute Header', 'dream' ),
											'desc'         => esc_html__( 'Make the header position absolute?', 'dream' ),
											'help'         => sprintf( "%s", esc_html__( 'This absolute positioning will put the header on top of the header image.', 'dream' ) ),
											'left-choice'  => array(
												'value' => 'fw-no-absolute-header',
												'label' => esc_html__( 'No', 'dream' ),
											),
											'right-choice' => array(
												'value' => 'fw-absolute-header',
												'label' => esc_html__( 'Yes', 'dream' ),
											),
										)
									),
									'choices'      => array(
										'fw-absolute-header' => array(
											'absolute_opacity' => array(
												'type'       => 'slider',
												'value'      => 65,
												'properties' => array(
													'min' => 0,
													'max' => 100,
													'sep' => 1,
												),
												'label'      => '',
												'desc'       => esc_html__( 'Select the header background opacity', 'dream' ),
											),
										),
									),
									'show_borders' => false,
								),
								'enable_sticky_header'       => array(
									'type'         => 'multi-picker',
									'label'        => false,
									'desc'         => false,
									'picker'       => array(
										'selected_value' => array(
											'type'         => 'switch',
											'value'        => 'fw-no-sticky-header',
											'attr'         => array(),
											'label'        => esc_html__( 'Sticky Header', 'dream' ),
											'desc'         => esc_html__( 'Make the header sticky?', 'dream' ),
											'left-choice'  => array(
												'value' => 'fw-no-sticky-header',
												'label' => esc_html__( 'No', 'dream' ),
											),
											'right-choice' => array(
												'value' => 'fw-sticky-header',
												'label' => esc_html__( 'Yes', 'dream' ),
											),
										)
									),
									'choices'      => array(
										'fw-sticky-header' => array(
											'image_logo_sticky'            => array(
												'label' => esc_html__( 'Image Logo Sticky', 'dream' ),
												'desc'  => esc_html__( 'Upload logo image', 'dream' ),
												'type'  => 'upload'
											),
											//											'html_label'                   => array(
											//												'type'  => 'html',
											//												'html'  => '',
											//												'value' => '',
											//												'label' => esc_html__( 'Header Sticky Padding', 'dream' ),
											//											),
											'header_sticky_padding_top'    => array(
												'label' => esc_html__( 'Header Sticky Padding Top', 'dream' ),
												'desc'  => esc_html__( 'top', 'dream' ),
												'type'  => 'short-text',
												'value' => 0,
											),
											'header_sticky_padding_bottom' => array(
												'label' => esc_html__( 'Header Sticky Padding Bottom', 'dream' ),
												'desc'  => esc_html__( 'bottom ', 'dream' ),
												'type'  => 'short-text',
												'value' => 0,
											),
											'background_color'             => array(
												'label'   => esc_html__( 'Background Color', 'dream' ),
												'desc'    => esc_html__( "Select the header's top bar background color", "dream" ),
												'value'   => '#ffffff',
												'choices' => $dream_page_colors,
												'type'    => 'color-palette'
											),
											'sticky_opacity'               => array(
												'type'       => 'slider',
												'value'      => 5,
												'properties' => array(
													'min' => 0,
													'max' => 100,
													'sep' => 1,
												),
												'label'      => '',
												'desc'       => esc_html__( 'Select the header background opacity', 'dream' ),
											),
											'menu_item_color'              => array(
												'label'   => esc_html__( 'Menu Item Color', 'dream' ),
												'desc'    => esc_html__( "Select the menu items color (level 1)", "dream" ),
												'value'   => $dream_page_colors['color_2'],
												'choices' => $dream_page_colors,
												'type'    => 'color-palette'
											),
											'menu_item_color_hover'        => array(
												'label'   => esc_html__( "Menu items color hover", "dream" ),
												'desc'    => esc_html__( "Select the menu items color hover (level 1)", "dream" ),
												'value'   => '#a7a7a7',
												'choices' => $dream_page_colors,
												'type'    => 'color-palette'
											),
										),
									),
									'show_borders' => false,
								),
								'enable_header_top_bar'      => array(
									'type'         => 'multi-picker',
									'label'        => false,
									'desc'         => false,
									'picker'       => array(
										'selected_value' => array(
											'label'        => esc_html__( 'Header Top Bar', 'dream' ),
											'desc'         => esc_html__( 'Enable the header top bar?', 'dream' ),
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
											'header_top_bar_bg'  => array(
												'label'   => esc_html__( "Top bar background color", "dream" ),
												'desc'    => esc_html__( "Select the header's top bar background color", "dream" ),
												'value'   => '#1f1f1f',
												'choices' => $dream_page_colors,
												'type'    => 'color-palette'
											),
											'header_top_sidebar' => array(
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
													'content_align' => array(
														'label'   => esc_html__( 'Content Align', 'dream' ),
														'desc'    => esc_html__( 'Select the content align', 'dream' ),
														'type'    => 'image-picker',
														'value'   => 'fw-sidebar-content-align-left',
														'choices' => array(
															'fw-sidebar-content-align-left'   => array(
																'small' => array(
																	'height' => 50,
																	'src'    => $dream_template_directory . '/assets/images/image-picker/left-position.jpg',
																	'title'  => esc_html__( 'Left', 'dream' )
																),
															),
															'fw-sidebar-content-align-center' => array(
																'small' => array(
																	'height' => 50,
																	'src'    => $dream_template_directory . '/assets/images/image-picker/center-position.jpg',
																	'title'  => esc_html__( 'Center', 'dream' )
																),
															),
															'fw-sidebar-content-align-right'  => array(
																'small' => array(
																	'height' => 50,
																	'src'    => $dream_template_directory . '/assets/images/image-picker/right-position.jpg',
																	'title'  => esc_html__( 'Right', 'dream' )
																),
															),
														),
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
						),
						'typography_settings'             => array(
							'type'          => 'multi',
							'label'         => false,
							'attr'          => array(
								'class' => 'fw-option-type-multi-show-borders',
							),
							'inner-options' => array(
								'header_top_bar_text'         => array(
									'label' => esc_html__( 'Header Top Bar Style', 'dream' ),
									'type'  => 'tf-typography',
									'value' => array(
										'google_font'    => true,
										'subset'         => 'latin',
										'variation'      => 'regular',
										'family'         => 'Poppins',
										'style'          => '',
										'weight'         => '',
										'size'           => '14',
										'line-height'    => '36',
										'letter-spacing' => '0.3',
										'color-palette'  => $dream_page_colors['color_2'],
									),
								),
								'header_menu_group'           => array(
									'type'    => 'group',
									'options' => array(
										'header_menu'               => array(
											'label' => esc_html__( 'Header Menu Style', 'dream' ),
											'type'  => 'tf-typography',
											'value' => array(
												'google_font'    => true,
												'subset'         => 'latin',
												'variation'      => '500',
												'family'         => 'Poppins',
												'style'          => '',
												'weight'         => '',
												'size'           => '14',
												'line-height'    => '66',
												'letter-spacing' => '0',
												'color-palette'  => $dream_page_colors['color_2'],
											),
										),
										'header_menu_hover'         => array(
											'label'   => esc_html__( 'Items hover color', 'dream' ),
											'desc'    => esc_html__( 'Select the menu items hover color', 'dream' ),
											'value'   => '#a7a7a7',
											'choices' => $dream_page_colors,
											'type'    => 'color-palette'
										),
										'header_menu_items_spacing' => array(
											'type'  => 'short-text',
											'value' => '40',
											'label' => esc_html__( 'Menu Items Spacing', 'dream' ),
											'desc'  => esc_html__( 'Select the menu items spacing in pixels', 'dream' ),
										)
									)
								),
								'header_sub_menu_group'       => array(
									'type'    => 'group',
									'options' => array(
										'header_sub_menu'               => array(
											'label' => esc_html__( 'Header Sub-Menu Style', 'dream' ),
											'type'  => 'tf-typography',
											'value' => array(
												'google_font'    => true,
												'subset'         => 'latin',
												'variation'      => 'regular',
												'family'         => 'Poppins',
												'style'          => '',
												'weight'         => '',
												'size'           => '14',
												'line-height'    => '36',
												'letter-spacing' => '0',
												'color-palette'  => $dream_page_colors['color_2'],
											),
										),
										'header_sub_menu_hover'         => array(
											'label'   => esc_html__( 'Items hover color', 'dream' ),
											'desc'    => esc_html__( 'Select the sub menu items hover color', 'dream' ),
											'value'   => '#a7a7a7',
											'choices' => $dream_page_colors,
											'type'    => 'color-palette'
										),
										'header_sub_menu_items_spacing' => array(
											'type'  => 'short-text',
											'value' => '2',
											'label' => esc_html__( 'Sub Menu Items Spacing', 'dream' ),
											'desc'  => esc_html__( 'Select the menu items spacing in pixels', 'dream' ),
										)
									)
								),
//								'footer_copyright_typography' => array(
//									'label' => __( 'Footer Copyright Style', 'dream' ),
//									'type'  => 'tf-typography',
//									'value' => array(
//										'google_font'    => true,
//										'subset'         => 'latin',
//										'variation'      => 'regular',
//										'family'         => 'Poppins',
//										'style'          => '',
//										'weight'         => '',
//										'size'           => '15',
//										'line-height'    => '45',
//										'letter-spacing' => '0',
//										'value'          => '#5a596a',
//										'color-palette'  => $dream_page_colors['color_2'],
//									),
//								),
							)
						)
					),
				),
				'show_borders' => false,
			),
		),
	),
);
