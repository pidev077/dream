<?php
/*
Element Description: VC Post Slider 2
*/

// Element Class
class vcLogoBanner extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        global $__VcShadowWPBakeryVisualComposerAbstract;
        add_action( 'init', array( $this, 'vc_logo_banner_mapping' ) );
        $__VcShadowWPBakeryVisualComposerAbstract->addShortCode('vc_logo_banner', array( $this, 'vc_logo_banner_html' ));
    }

    // Element Mapping
    public function vc_logo_banner_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
          array(
            'name' => __('Base logo banner', 'dream'),
            'base' => 'vc_logo_banner',
            'description' => __('Base OWL logo banner', 'dream'),
            'category' => __('Theme Elements', 'dream'),
            'icon' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/base-carousel-logo.png',
            'params' => array(
              /* source */
              array(
          			'type' => 'param_group',
          			'heading' => __( 'Values', 'dream' ),
          			'param_name' => 'values',
          			'description' => __( 'Enter value item for slider.', 'dream' ),
          			'value' => urlencode( json_encode( array(
          				array(
							'image' => __(0, 'dream'),
							'label' => __('Item one', 'dream'),
							'sub' => __('one', 'dream'),
          					'content_item' => __( 'I am test text block one. Click edit button to change this text.', 'dream' ),
          				),
          				array(
							'image' => __(0, 'dream'),
							'label' => __('Item two', 'dream'),
							'sub' => __('two', 'dream'),
          					'content_item' => __( 'I am test text block two. Click edit button to change this text.', 'dream' ),
          				),
          				array(
							'image' => __(0, 'dream'),
							'label' => __('Item three', 'dream'),
							'sub' => __('three', 'dream'),
          					'content_item' => __( 'I am test text block three. Click edit button to change this text.', 'dream' ),
          				),
          			) ) ),
          			'params' => array(
                  array(
                    'type' => 'textfield',
                    'heading' => __( 'Label', 'dream' ),
                    'param_name' => 'label', // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
                    'description' => __( 'Enter a name (it is for internal use and will not appear on the front end)', 'dream' ),
                    'admin_label' => true,
                  ),
				  array(
                    'type' => 'textfield',
                    'heading' => __( 'Sub Label', 'dream' ),
                    'param_name' => 'sub', // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
                    'description' => __( 'Enter a name (it is for internal use and will not appear on the front end)', 'dream' ),
                    'admin_label' => true,
                  ),
                  array(
                    'type' => 'textarea',
                    'heading' => __( 'Content', 'dream' ),
                    'param_name' => 'content_item', // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
                    'description' => __( 'Enter your content.', 'dream' )
                  ),
				  array(
					'type' => 'attach_image',
					'heading' => __('Image', 'dream'),
					'param_name' => 'image',
					'dependency' => array(
							'element' => 'graphic',
							'value' => 'image',
						),
					'description' => __('', 'dream'),
					'group' => 'Source',
					'std' => '0',
				  ),
				  array(
                    'type' => 'textfield',
                    'heading' => __( 'Href', 'dream' ),
                    'param_name' => 'href', // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
                    'description' => __( 'Enter link', 'dream' ),
                    'admin_label' => true,
					'std' => '#',
                  ),
          			),
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
              /*** Slider Options ***/
              array(
                'type' => 'textfield',
                'heading' => __('Items', 'dream'),
                'param_name' => 'items',
                'value' => '3',
                'admin_label' => false,
                'description' => __('The number of items you want to see on the screen.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Margin', 'dream'),
                'param_name' => 'margin',
                'value' => '30',
                'admin_label' => false,
                'description' => __('margin-right(px) on item.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Loop', 'dream'),
                'param_name' => 'loop',
                'value' => array(
                  __('Yes', 'dream') => '1',
                  __('No', 'dream') => '0',
                ),
                'std' => '0',
                'description' => __('Infinity loop. Duplicate last and first items to get loop illusion.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Center', 'dream'),
                'param_name' => 'center',
                'value' => array(
                  __('Yes', 'dream') => '1',
                  __('No', 'dream') => '0',
                ),
                'std' => '0',
                'description' => __('Center item. Works well with even an odd number of items.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('stagePadding', 'dream'),
                'param_name' => __('stage_padding', 'dream'),
                'value' => '0',
                'description' => __('Padding left and right on stage (can see neighbours).', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('startPosition', 'dream'),
                'param_name' => __('start_position', 'dream'),
                'value' => '0',
                'description' => __('Start position or URL Hash string like `#id`.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Nav', 'dream'),
                'param_name' => 'nav',
                'value' => array(
                  __('Yes', 'dream') => '1',
                  __('No', 'dream') => '0',
                ),
                'std' => '0',
                'description' => __('Show next/prev buttons.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Dots', 'dream'),
                'param_name' => 'dots',
                'value' => array(
                  __('Yes', 'dream') => '1',
                  __('No', 'dream') => '0',
                ),
                'std' => '0',
                'description' => __('Show dots navigation.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('slideBy', 'dream'),
                'param_name' => __('slide_by', 'dream'),
                'value' => 1,
                'description' => __('Navigation slide by x. `page` string can be set to slide by page.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Autoplay', 'dream'),
                'param_name' => 'autoplay',
                'value' => array(
                  __('Yes', 'dream') => '1',
                  __('No', 'dream') => '0',
                ),
                'std' => '0',
                'description' => __('Autoplay.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('autoplayHoverPause', 'dream'),
                'param_name' => 'autoplay_hover_pause',
                'value' => array(
                  __('Yes', 'dream') => '1',
                  __('No', 'dream') => '0',
                ),
                'std' => '0',
                'description' => __('Pause on mouse hover.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('autoplayTimeout', 'dream'),
                'param_name' => 'autoplay_timeout',
                'value' => '5000',
                'description' => __('Autoplay interval timeout.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('smartSpeed', 'dream'),
                'param_name' => 'smart_speed',
                'value' => '250',
                'description' => __('AutoplaySpeed Calculate. More info to come..', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Table Items', 'dream'),
                'param_name' => 'responsive_table_items',
                'value' => '1',
                'admin_label' => false,
                'description' => __('The number of items you want to see on the table screen.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Mobile Items', 'dream'),
                'param_name' => 'responsive_mobile_items',
                'value' => '1',
                'admin_label' => false,
                'description' => __('The number of items you want to see on the mobile screen.', 'dream'),
                'group' => 'Slider Options',
              ),
              /* css editor */
              array(
                'type' => 'css_editor',
                'heading' => __( 'Css', 'dream' ),
                'param_name' => 'css_item',
                'group' => __( 'Design Options items', 'dream' ),
              ),
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
  		$css_class = apply_filters( 'vc_logo_banner_filter_class', 'wpb_theme_custom_element wpb_logo_banner ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

  		return array(
  			'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
  			'styles' => $styles,
  		);
    }
    public function getStylesSliderItem($class, $css, $atts) {
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
  		$css_class = apply_filters( 'vc_logo_banner_item_filter_class', $class . ' ' . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

  		return array(
  			'css_class_item' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
  			'styles_item' => $styles,
  		);
    }

    public function template($temp = 'default', $params = array()) {

    }

    // Element HTML
    public function vc_logo_banner_html( $atts, $content ) {
      $atts['self'] = $this;
      $atts['content'] = $content;
      return fw_render_view(get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements/vc_logo_carousel.php', array('atts' => $atts), true);
    }

} // End Element Class


// Element Class Init
new vcLogoBanner();
