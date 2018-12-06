<?php

global $dream_colors, $dream_typography;

$dream_colors = array(
	'color_1' => '#88C000',
	'color_2' => '#ACF300',
	'color_3' => '#1f1f1f',
	'color_4' => '#808080',
	'color_5' => '#ebebeb'
);

$dream_admin_url               = admin_url();
$dream_template_directory      = get_template_directory_uri();
$dream_color_settings          = fw_get_db_customizer_option( 'color_settings', $dream_colors );
$options_custom_footer_layout = array();

/* Footer Builder */
$select_footer_settings = array(
	apply_filters( 'bears_options_custom_footer_layout', $options_custom_footer_layout ),
	'show_footer_widgets' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'selected_value' => array(
				'label'        => esc_html__( 'Footer Widgets', 'dream' ),
				'desc'         => esc_html__( 'Show footer widgets?', 'dream' ),
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
				'footer_sidebar'              => array(
					'type'          => 'addable-popup',
					'size'          => 'medium',
					'limit'         => 4,
					'label'         => esc_html__( 'Footer Sidebar List', 'dream' ),
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
				'footer_widgets_bg'           => array(
					'type'         => 'multi-picker',
					'label'        => false,
					'desc'         => false,
					'picker'       => array(
						'background' => array(
							'label'   => esc_html__( 'Background', 'dream' ),
							'desc'    => esc_html__( 'Select the background for your widget area', 'dream' ),
							'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
							'type'    => 'radio',
							'choices' => array(
								'none'  => esc_html__( 'None', 'dream' ),
								'image' => esc_html__( 'Image', 'dream' ),
								'color' => esc_html__( 'Color', 'dream' ),
							),
							'value'   => 'color'
						),
					),
					'choices'      => array(
						'none'  => array(),
						'color' => array(
							'background_color' => array(
								'label'   => false,
								'desc'    => esc_html__( 'Select the background color', 'dream' ),
								'value'   => $dream_color_settings['color_4'],
								'choices' => $dream_color_settings,
								'type'    => 'color-palette'
							),
						),
						'image' => array(
							'background_image' => array(
								'label'   => false,
								'type'    => 'background-image',
								'choices' => array(//	in future may will set predefined images
								)
							),
							'background_color' => array(
								'label'   => false,
								'desc'    => esc_html__( 'Select the background color', 'dream' ),
								'help'    => esc_html__( 'The default color palette can be changed from the', 'dream' ) . ' <a target="_blank" href="' . $dream_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . esc_html__( 'Colors section', 'dream' ) . '</a> ' . esc_html__( 'found in the Theme Settings page', 'dream' ),
								'value'   => '',
								'choices' => $dream_color_settings,
								'type'    => 'color-palette'
							),
							'repeat'           => array(
								'label'   => false,
								'desc'    => esc_html__( 'Select how will the background repeat', 'dream' ),
								'type'    => 'short-select',
								'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
								'value'   => 'no-repeat',
								'choices' => array(
									'no-repeat' => esc_html__( 'No-Repeat', 'dream' ),
									'repeat'    => esc_html__( 'Repeat', 'dream' ),
									'repeat-x'  => esc_html__( 'Repeat-X', 'dream' ),
									'repeat-y'  => esc_html__( 'Repeat-Y', 'dream' ),
								)
							),
							'bg_position_x'    => array(
								'label'   => false,
								'desc'    => esc_html__( 'Select the horizontal background position', 'dream' ),
								'type'    => 'short-select',
								'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
								'value'   => 'left',
								'choices' => array(
									'left'   => esc_html__( 'Left', 'dream' ),
									'center' => esc_html__( 'Center', 'dream' ),
									'right'  => esc_html__( 'Right', 'dream' ),
								)
							),
							'bg_position_y'    => array(
								'label'   => false,
								'desc'    => esc_html__( 'Select the vertical background position', 'dream' ),
								'type'    => 'short-select',
								'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
								'value'   => 'top',
								'choices' => array(
									'top'    => esc_html__( 'Top', 'dream' ),
									'center' => esc_html__( 'Center', 'dream' ),
									'bottom' => esc_html__( 'Bottom', 'dream' ),
								)
							),
							'bg_size'          => array(
								'label' => false,
								'desc'  => esc_html__( 'Select the background size', 'dream' ),
								'help'  => esc_html__( 'Auto - Default value, the background image has the original width and height. Cover - Scale the background image so that the background area is completely covered by the image. Contain - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'dream' ),
								'type'  => 'short-select',
								'attr'  => array( 'class' => 'fw-checkbox-float-left' ),
								'value'   => 'auto',
								'choices' => array(
									'auto'    => esc_html__( 'Auto', 'dream' ),
									'cover'   => esc_html__( 'Cover', 'dream' ),
									'contain' => esc_html__( 'Contain', 'dream' ),
								)
							),
							'overlay_options'  => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'overlay' => array(
										'type'         => 'switch',
										'label'        => esc_html__( 'Overlay Color', 'dream' ),
										'desc'         => esc_html__( 'Enable image overlay color?', 'dream' ),
										'value'        => 'no',
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
									'no'  => array(),
									'yes' => array(
										'background'            => array(
											'label'   => esc_html__( '', 'dream' ),
											'desc'    => esc_html__( 'Select the overlay color', 'dream' ),
											'value'   => $dream_color_settings['color_1'],
											'choices' => $dream_color_settings,
											'type'    => 'color-palette'
										),
										'overlay_opacity_image' => array(
											'type'       => 'slider',
											'value'      => 80,
											'properties' => array(
												'min' => 0,
												'max' => 100,
												'sep' => 1,
											),
											'label'      => esc_html__( '', 'dream' ),
											'desc'       => esc_html__( 'Select the overlay color opacity in %', 'dream' ),
										)
									),
								),
							),
						),
					),
					'show_borders' => false,
				),
				'footer_widgets_titles_color' => array(
					'label'   => esc_html__( 'Titles Color', 'dream' ),
					'desc'    => esc_html__( 'Select the footer widgets titles color', 'dream' ),
					'value'   => '#ffffff',
					'choices' => $dream_color_settings,
					'type'    => 'color-palette'
				),
				'body_widgets_text_color'     => array(
					'label'   => esc_html__( 'Body Text Color', 'dream' ),
					'desc'    => esc_html__( 'Select the footer widgets body text color', 'dream' ),
					'value'   => '#898d8e',
					'choices' => $dream_color_settings,
					'type'    => 'color-palette'
				),
			),
		),
		'show_borders' => false,
	),
	'copyright_group'     => array(
		'type'    => 'group',
		'attr'    => array( 'class' => 'border-bottom-none' ),
		'options' => array(
			'copyright'          => array(
				'label' => esc_html__( 'Copyright', 'dream' ),
				'desc'  => esc_html__( 'Please enter the copyright text', 'dream' ),
				'type'  => 'textarea',
				'value' => 'Copyright &copy;2017 <a rel="nofollow" href="http://bearsthemes.com">Bearsthemes</a>. All Rights Reserved',
			),
			'copyright_position' => array(
				'label'   => esc_html__( 'Position', 'dream' ),
				'desc'    => esc_html__( 'Select the copyright position', 'dream' ),
				'type'    => 'image-picker',
				'value'   => 'bt-copyright-center',
				'choices' => array(
					'bt-copyright-left'   => array(
						'small' => array(
							'height' => 50,
							'src'    => $dream_template_directory . '/assets/images/image-picker/left-position.jpg',
							'title'  => esc_html__( 'Left', 'dream' )
						),
					),
					'bt-copyright-center' => array(
						'small' => array(
							'height' => 50,
							'src'    => $dream_template_directory . '/assets/images/image-picker/center-position.jpg',
							'title'  => esc_html__( 'Center', 'dream' )
						),
					),
					'bt-copyright-right'  => array(
						'small' => array(
							'height' => 50,
							'src'    => $dream_template_directory . '/assets/images/image-picker/right-position.jpg',
							'title'  => esc_html__( 'Right', 'dream' )
						),
					),
				),
			),
			'html_label'         => array(
				'type'  => 'html',
				'html'  => '',
				'value' => '',
				'label' => esc_html__( 'Spacing', 'dream' ),
			),
			'copyright_top'      => array(
				'label' => false,
				'desc'  => esc_html__( 'top', 'dream' ),
				'type'  => 'short-text',
				'value' => '40',
			),
			'copyright_bottom'   => array(
				'label' => false,
				'desc'  => esc_html__( 'bottom ', 'dream' ),
				'type'  => 'short-text',
				'value' => '30',
			),
			'footer_bg_color'    => array(
				'label'   => esc_html__( 'Background Color', 'dream' ),
				'desc'    => esc_html__( 'Select the copyright background color', 'dream' ),
				'value'   => '#fafafa',
				'choices' => $dream_color_settings,
				'type'    => 'color-palette'
			),
		)
	)
);

$options = array(
	$select_footer_settings,
);