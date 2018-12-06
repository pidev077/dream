<?php
/*
Element Description: VC Progressbar Svg
*/

// Element Class
class vcProgressbarSvg extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        global $__VcShadowWPBakeryVisualComposerAbstract;
        add_action( 'init', array( $this, 'vc_progressbar_svg_mapping' ) );
        $__VcShadowWPBakeryVisualComposerAbstract->addShortCode('vc_progressbar_svg', array($this, 'vc_progressbar_svg_html'));
    }

    // Element Mapping
    public function vc_progressbar_svg_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
          array(
            'name' => __('Progressbar Svg', 'dream'),
            'base' => 'vc_progressbar_svg',
            'description' => __('Progressbar Svg', 'dream'),
            'category' => __('Theme Elements', 'dream'),
            'icon' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/progressbar-svg.png',
            'params' => array(
              /* source */
              array(
                'type' => 'dropdown',
                'heading' => __( 'Shape', 'dream' ),
                'param_name' => 'shape',
                'value' => array(
                  __('Circle', 'dream') => 'circle',
                  __('SemiCircle', 'dream') => 'semi_circle',
                  __('Line', 'dream') => 'line',
                  // __('Custom', 'dream') => 'custom',
                ),
                'std' => 'circle',
                'admin_label' => true,
                'description' => __('Select a shape to display', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Progress Value', 'dream'),
                'param_name' => 'progress_value',
                'value' => 80,
                'description' => __('Enter progress value from 0 to 100 (ex: 80)', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'colorpicker',
                'heading' => __('strokeColor', 'dream'),
                'param_name' => 'color',
                'value' => '#00FF85', //Default Red color
                'description' => __('Select strokeColor', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('strokeWidth', 'dream'),
                'param_name' => 'stroke_width',
                'value' => 2,
                'description' => __('Enter strokeWidth (ex: 2)', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'colorpicker',
                'heading' => __('trailColor', 'dream'),
                'param_name' => 'trail_color',
                'value' => '#EEEEEE', //Default Red color
                'description' => __('Select trailColor', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('trailWidth', 'dream'),
                'param_name' => 'trail_width',
                'value' => 1,
                'description' => __('Enter trailWidth (ex: 1)', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Duration', 'dream'),
                'param_name' => 'duration',
                'value' => 1400,
                'description' => __('Enter duration (ex: 1400)', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Easing', 'dream'),
                'param_name' => 'easing',
                'value' => array(
                  __('linear', 'dream') => 'linear',
                  // __('easeIn', 'dream') => 'easeIn', /* bug render */
                  __('easeOut', 'dream') => 'easeOut',
                  __('easeInOut', 'dream') => 'easeInOut',
                  __('bounce', 'dream') => 'bounce',
                ),
                'std' => 'easeInOut',
                'admin_label' => true,
                'description' => __('Select a easing', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'checkbox',
                'heading' => __( 'Enable Text Settings', 'dream' ),
                // 'description'   => __('description', 'dream'),
                'value' => array(__('Select enable text settings', 'dream') => 'show'),
                'std' => 'show',
                'param_name' => 'text_setings',
                'group' => 'Source',
              ),
              array(
                'type' => 'checkbox',
                'heading' => __( 'Enable Animate Transform Settings', 'dream' ),
                // 'description'   => __('description', 'dream'),
                'value' => array(__('Select enable animate transform settings', 'dream') => 'show'),
                'std' => 'show',
                'param_name'    => 'animate_transform_settings',
                'group' => 'Source',
              ),
              array(
          			'type' => 'textfield',
          			'heading' => __( 'Delay', 'dream' ),
          			'param_name' => 'delay',
          			'description' => __( 'Enter number delay. (Ex: 200)', 'dream' ),
                'value' => 200,
                'group' => 'Source',
              ),
              array(
          			'type' => 'el_id',
          			'heading' => __( 'Element ID', 'dream' ),
          			'param_name' => 'el_id',
          			'description' => __( 'Enter element ID .', 'dream' ),
                'group' => 'Source',
              ),
          		array(
          			'type' => 'textfield',
          			'heading' => __( 'Extra class name', 'dream' ),
          			'param_name' => 'el_class',
          			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'dream' ),
                'group' => 'Source',
              ),
              /* Text Settings */
              array(
          			'type' => 'textarea_html',
          			'heading' => __( 'Content', 'dream' ),
          			'param_name' => 'content',
          			'description' => __( 'Enter label for progress bar (Ex: {percent}%)', 'dream' ),
                'group' => 'Text Settings',
                'value' => '{percent}%',
                'dependency' => array(
                  'element' => 'text_setings',
                  'value' => 'show',
                ),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => __('Color', 'dream'),
                'param_name' => 'text_color',
                'value' => '#333', //Default Red color
                'description' => __('Select color for text', 'dream'),
                'group' => 'Text Settings',
                'dependency' => array(
                  'element' => 'text_setings',
                  'value' => 'show',
                ),
              ),

              /* Animate Transform Settings */
              array(
                'type' => 'colorpicker',
                'heading' => __('strokeColor', 'dream'),
                'param_name' => 'color_transform',
                'value' => '#32FCEF', //Default Red color
                'description' => __('Select strokeColor transform', 'dream'),
                'dependency' => array(
                  'element' => 'animate_transform_settings',
                  'value' => 'show',
                ),
                'group' => 'Animate Transform Settings',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('strokeWidth', 'dream'),
                'param_name' => 'stroke_width_transform',
                'value' => 4,
                'description' => __('Enter strokeWidth transform (ex: 4)', 'dream'),
                'dependency' => array(
                  'element' => 'animate_transform_settings',
                  'value' => 'show',
                ),
                'group' => 'Animate Transform Settings',
              ),
              /* css editor */
              array(
                'type' => 'css_editor',
                'heading' => __( 'Css', 'dream' ),
                'param_name' => 'css',
                'group' => __( 'Design Options general', 'dream' ),
              ),
            ),
          )
        );
    }

    /**
  	 * Parses google_fonts_data and font_container_data to get needed css styles to markup
  	 *
  	 * @param $el_class
  	 * @param $css
  	 * @param $atts
  	 *
  	 * @since 1.0
  	 * @return array
  	 */
    public function getStyles($el_class, $css, $atts) {
      $styles = array();

      /**
  		 * Filter 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG' to change vc_custom_heading class
  		 *
  		 * @param string - filter_name
  		 * @param string - element_class
  		 * @param string - shortcode_name
  		 * @param array - shortcode_attributes
  		 *
  		 * @since 4.3
  		 */
  		$css_class = apply_filters( 'vc_progressbar_svg_filter_class', 'wpb_theme_custom_element wpb_progressbar_svg shape-type-'. fw_akg('shape', $atts) .' ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

  		return array(
  			'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
  			'styles' => $styles,
  		);
    }

    public function template($temp = 'default', $params = array()) {

    }

    // Element HTML
    public function vc_progressbar_svg_html( $atts, $content ) {
      $atts['self'] = $this;
      $atts['content'] = $content;
      return fw_render_view(get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements/vc_progressbar_svg.php', array('atts' => $atts), true);
    }

} // End Element Class


// Element Class Init
new vcProgressbarSvg();
