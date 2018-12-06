<?php
// check Visual Composer plugin active
if(! function_exists( 'vc_add_param' )) return;


// Before VC Init
if(! function_exists('_dream_vc_before_init_actions')) :
  function _dream_vc_before_init_actions() {
    // Link your VC elements's folder
    if( function_exists('vc_set_shortcodes_templates_dir') ){
        vc_set_shortcodes_templates_dir( get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements' );
    }

    dream_vc_load_custom_elements();
  }
endif;
add_action( 'vc_before_init', '_dream_vc_before_init_actions' );

// After VC Init
if(! function_exists('_dream_vc_after_init_actions')) :
  function _dream_vc_after_init_actions() {

    // Add Params vc_progress_bar
    $vc_progress_bar_new_params = array(
      array(
        'type' => 'dropdown',
        'heading' => __('Ui', 'dream'),
        'param_name' => 'custom_ui',
        'value' => array(
          __('Default', 'dream') => '',
          __('Round - Slender', 'dream') => 'round-slender',
          __('Square - Slender', 'dream') => 'square-slender',
          __('Slender line', 'dream') => 'slender-line',
        ),
        'std'         => 'default',
        'description' => __( "Custom ui for each item progress bar (default / Round / Square)", 'dream' ),
        'group'       => __('Extra Group', 'dream'),
      ),
    );
    vc_add_params('vc_progress_bar', $vc_progress_bar_new_params);

    // Add Params vc_custom_heading
    $vc_custom_heading_new_params = array(
      array(
        "type" => "textfield",
        "heading" => __('Letter Spacing', 'dream'),
        "param_name" => 'custom_letter_spacing',
        "value" => '',
        'group'       => __('Extra Group', 'dream'),
      )
    );
    vc_add_params('vc_custom_heading', $vc_custom_heading_new_params);

    // Add Params vc_custom_heading
    $vc_icon_new_params = array(
      array(
        "type" => "dropdown",
        "heading" => __('Action', 'dream'),
        "param_name" => 'custom_action',
        'value' => array(
          __('Default', 'dream') => '',
          __('Click on open lightbox', 'dream') => 'lightbox',
        ),
        'description' => __('Optons: Default / Lightbox (Image, Video - Youtube, Vimeo, Video Html5)', 'dream'),
        'group'       => __('Extra Group', 'dream'),
      )
    );
    vc_add_params('vc_icon', $vc_icon_new_params);

    //vc_row
		$vc_row_new_params = array(
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Row Container', 'dream' ),
				'param_name'  => 'row_container',
				'value'       => array(
					__( 'Default', 'dream' )                                               => 'no_container',
					__( 'Row Container', 'dream' )                                         => 'container',
					__( 'Row Container Fully (width: 1600px; max-width: 100%;)', 'yolo' ) => 'container_fully',
					__( 'Custom Width Container', 'dream' )                                => 'custom_width_container',
				),
				'std'         => 'container',
				'weight'      => 1,
				'description' => __( 'Choose options of row', 'dream' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Custom width container', 'dream' ),
				'param_name'  => 'row_container_width',
				'value'       => '1600px',
				'dependency'  => array(
					'element' => 'row_container',
					'value'   => 'custom_width_container',
				),
				'weight'      => 1,
				'description' => __( 'Input width of container (ex: 1600px).', 'dream' ),
			),
		);
		vc_add_params( 'vc_row', $vc_row_new_params );
    // remove params type in vc_post_slider
    vc_remove_param('vc_posts_slider', 'type');
  }
endif;
add_action('vc_after_init', '_dream_vc_after_init_actions');

if(! function_exists('_dream_vc_image_picker_settings_field')) :
  function _dream_vc_image_picker_settings_field( $settings, $value ) {
    $output = '';

    if ( ! empty( $settings['value'] ) ) {
  		foreach ( $settings['value'] as $index => $data ) {

  			$selected = '';
  			if ( '' !== $value && $index === $value ) {
  				$selected = ' checked="checked"';
  			}
  			$option_class = str_replace( '#', 'hash-', $index );
  			$output .= '<label class="image-picker-item">
          <input type="radio" name="' . $settings['param_name'] . '" value="' . esc_attr( $index ) . '" class="radio ' . esc_attr( $option_class ) . '" ' . $selected . ' />
          <span><img src="'. $data .'" alt="#"/></span>
          </label>';
  		}
  	}

    return '<div class="vc_image_picker_block">' .
           $output .
           '<input type="hidden" name="' . $settings['param_name'] . '" value="' . esc_attr( $value ) . '" class="wpb_vc_param_value"/>' .
           '</div>'; // This is html markup that will be outputted in content elements edit form
  }
endif;
vc_add_shortcode_param( 'vc_image_picker', '_dream_vc_image_picker_settings_field' );


if(! function_exists('_dream_vc_load_default_templates')) :
  /**
   * _dream_vc_load_default_templates
   * @since 0.0.7
   */
  function _dream_vc_load_default_templates($templates) {
    $templates = array_merge($templates, dream_vc_load_templates(get_template_directory() . "/framework-customizations/extensions/custom-js-composer/vc-templates-default/*.php", 'dream'));

    //Load additional templates from plugins or themes
    //foreach($templates as $additional_location) $templates = array_merge($templates, dream_vc_load_templates( trailingslashit($additional_location) . '*.php', 'plugin'));

    return $templates;
  }
endif;
add_filter('vc_load_default_templates', '_dream_vc_load_default_templates', 12);

// Add Poppins Google fonts
if ( ! function_exists( '_dream_vc_fonts' ) ) {
	function _dream_vc_fonts( $fonts_list ) {
		/** @var font_family $poppins */
		$poppins->font_family             = 'Poppins';
		$poppins->font_types              = '300 light regular:300:normal,400 regular:400:normal,500 bold regular:500:normal,600 bold regular:600:normal,700 bold regular:700:normal';
		$poppins->font_styles             = 'regular';
		$poppins->font_family_description = esc_html_e( 'Select font family', 'dream' );
		$poppins->font_style_description  = esc_html_e( 'Select font styling', 'dream' );
		$fonts_list[]                     = $poppins;

		return $fonts_list;
	}
}
add_filter( 'vc_google_fonts_get_fonts_filter', '_dream_vc_fonts' );
