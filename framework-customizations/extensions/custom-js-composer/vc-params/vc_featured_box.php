<?php
/*
Element Description: VC Featured Box
*/

// Element Class
class vcFeaturedBox extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        global $__VcShadowWPBakeryVisualComposerAbstract;
        add_action( 'init', array( $this, 'vc_featured_box_mapping' ) );
        $__VcShadowWPBakeryVisualComposerAbstract->addShortCode('vc_featured_box', array( $this, 'vc_featured_box_html' ));
    }

    // Element Mapping
    public function vc_featured_box_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
          array(
            'name' => __('Featured Box', 'dream'),
            'base' => 'vc_featured_box',
            'description' => __('Featured Box', 'dream'),
            'category' => __('Theme Elements', 'dream'),
            'icon' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/featured-box.png',
            'params' => array(
              /* source */
              array(
                'type'  => 'textfield',
                'heading' => __('Heading', 'dream'),
                'param_name' => 'heading_text',
                'value' => __('Heading text', 'dream'),
                'description' => __('Enter heading featured box.', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'textarea',
                'heading' => __('Content', 'dream'),
                'param_name' => 'content_text',
                'value' => __('I am featured box. Click edit button to change this text.', 'dream'),
                'description' => __('Enter content featured box.', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'colorpicker',
                'heading' => __( 'Heading Color', 'dream' ),
                'param_name' => 'heading_color',
                'value' => '#222', // default dark
                'description' => __( 'Choose heading color.', 'dream' ),
                'group' => 'Source',
              ),
              array(
                'type' => 'colorpicker',
                'heading' => __( 'Content Color', 'dream' ),
                'param_name' => 'content_color',
                'value' => '#444', // default dark
                'description' => __( 'Choose content color.', 'dream' ),
                'group' => 'Source',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __( 'Graphic', 'dream' ),
                'param_name' => 'graphic',
                'value' => array(
                  __('Icon', 'dream') => 'icon',
                  __('Image', 'dream') => 'image',
                ),
                'std' => 'icon',
                'description' => __( 'Choose between an icon and a custom image for your graphic.', 'dream' ),
                'group' => 'Source',
              ),
              array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'dream' ),
                'param_name' => 'icon',
                'settings' => array(
                  'emptyIcon' => false,
                  'type' => 'fontawesome',
                  'iconsPerPage' => 32,
                ),
                'dependency' => array(
          				'element' => 'graphic',
          				'value' => 'icon',
          			),
                'description' => __('Select icon featured box.', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'attach_image',
                'heading' => __('Image', 'dream'),
                'param_name' => 'image',
                'dependency' => array(
          				'element' => 'graphic',
          				'value' => 'image',
          			),
                'description' => __('Select image featured box.', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'colorpicker',
                'heading' => __( 'Graphic Color', 'dream' ),
                'param_name' => 'graphic_color',
                'value' => '#fff', // default white
                'dependency' => array(
          				'element' => 'graphic',
          				'value' => 'icon',
          			),
                'description' => __( 'Choose graphic color.', 'dream' ),
                'group' => 'Source',
              ),
              array(
                'type' => 'colorpicker',
                'heading' => __( 'Graphic Background Color', 'dream' ),
                'param_name' => 'graphic_background_color',
                'value' => '#2ECC71', // default white
                'dependency' => array(
          				'element' => 'graphic',
          				'value' => 'icon',
          			),
                'description' => __( 'Choose graphic background color.', 'dream' ),
                'group' => 'Source',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Graphic Size', 'dream'),
                'param_name' => 'graphic_size',
                'value' => '50',
                'description' => __('Specify the size of your graphic (px).', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Graphic Shape', 'dream'),
                'param_name' => 'graphic_shape',
                'value' => array(
                  __('Square' , 'dream') => 'square',
                  __('Rounded' , 'dream') => 'rounded',
                  __('Circle' , 'dream') => 'circle',
                ),
                'std' => 'rounded',
                'description' => __('Choose a shape for your featured box graphic.', 'dream'),
                'dependency' => array(
          				'element' => 'graphic',
          				'value' => 'icon',
          			),
                'group' => 'Source',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Horizontal Alignment', 'dream'),
                'param_name' => 'horizontal_alignment',
                'value' => array(
                  __('Left' , 'dream') => 'left',
                  __('Center' , 'dream') => 'center',
                  __('Right' , 'dream') => 'right',
                ),
                'std' => 'center',
                'description' => __('Select the horizontal alignment of the featured box', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Content Alignment', 'dream'),
                'param_name' => 'content_alignment',
                'value' => array(
                  __('Left' , 'dream') => 'left',
                  __('Center' , 'dream') => 'center',
                  __('Right' , 'dream') => 'right',
                ),
                'std' => 'center',
                'dependency' => array(
          				'element' => 'horizontal_alignment',
          				'value' => 'center',
          			),
                'description' => __('Select the content alignment of the featured box', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Vertical Alignment', 'dream'),
                'param_name' => 'vertical_alignment_horizontal_left',
                'value' => array(
                  __('Top' , 'dream') => 'top',
                  __('Middle' , 'dream') => 'middle',
                ),
                'std' => 'top',
                'dependency' => array(
          				'element' => 'horizontal_alignment',
          				'value' => 'left',
          			),
                'description' => __('Select the vertical alignment of the featured box', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Vertical Alignment', 'dream'),
                'param_name' => 'vertical_alignment_horizontal_right',
                'value' => array(
                  __('Top' , 'dream') => 'top',
                  __('Middle' , 'dream') => 'middle',
                ),
                'std' => 'top',
                'dependency' => array(
          				'element' => 'horizontal_alignment',
          				'value' => 'right',
          			),
                'description' => __('Select the vertical alignment of the featured box', 'dream'),
                'group' => 'Source',
              ),
              array(
                'type'          => 'checkbox',
                'heading'       => __('Button', 'dream'),
                // 'description'   => __('', 'dream'),
                'value'         => array(
                  __('Select if you want to show button.', 'dream') => 'show',
                ),
                'param_name'    => 'show_button',
                'group' => 'Source',
              ),
              /* button */
              array(
                'type' => 'textfield',
                'heading' => __('Button Text', 'dream'),
                'param_name' => 'button_text',
                'value' => __('Read More', 'dream'),
                'description' => __('Enter the button text featured box.', 'dream'),
                'group' => 'Button',
                'dependency' => array(
          				'element' => 'show_button',
          				'value' => 'show',
          			),
              ),
              array(
          			'type' => 'href',
          			'heading' => __( 'URL (Link)', 'dream' ),
          			'param_name' => 'href',
                'description' => __('Enter the link featured box.', 'dream'),
                'group' => 'Button',
                'value' => '#',
                'dependency' => array(
          				'element' => 'show_button',
          				'value' => 'show',
          			),
          		),
              /*
              array(
                'type' => 'dropdown',
                'heading' => __('Type', 'dream'),
                'param_name' => 'button_type',
                'value' => array(
                  __('Square' , 'dream') => 'square',
                  __('Rounded' , 'dream') => 'rounded',
                  __('Circle' , 'dream') => 'circle',
                ),
                'std' => 'rounded',
                'description' => __('Choose a button type.', 'dream'),
                'dependency' => array(
          				'element' => 'show_button',
          				'value' => 'show',
          			),
                'group' => 'Button',
              ),
              */
              array(
                'type'          => 'checkbox',
                'heading'       => __('Open Link In New Window', 'dream'),
                'value'         => array(
                  __('Select to open your link in new window.', 'dream') => 'yes',
                ),
                'param_name'    => 'open_link_in_new_tab',
                'dependency' => array(
          				'element' => 'show_button',
          				'value' => 'show',
          			),
                'group' => 'Button',
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
              /* css editor */
              array(
                'type' => 'css_editor',
                'heading' => __( 'Css', 'dream' ),
                'param_name' => 'css',
                'group' => __( 'Design Options', 'dream' ),
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
  		$css_class = apply_filters( 'vc_featured_box_filter_class', 'wpb_theme_custom_element wpb_featured_box ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

  		return array(
  			'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
  			'styles' => $styles,
  		);
    }

    public function icon_html($atts) {
      $output = '';
      $graphic = fw_akg('graphic', $atts);

      switch($graphic) {
        case 'icon':
          $style = implode(';', array(
            'width: ' . fw_akg('graphic_size', $atts) . 'px',
            'height: ' . fw_akg('graphic_size', $atts) . 'px',
            'background-color: ' . fw_akg('graphic_background_color', $atts),
          ));

          $output = implode('', array(
            '<div class="type-'. $graphic .' graphic-shape-'. fw_akg('graphic_shape', $atts) .'" style="'. $style .'">',
              '<span style="color: '. fw_akg('graphic_color', $atts) .'" class="_icon '. fw_akg('icon', $atts) .'"></span>',
            '</div>',
          ));
          break;
        case 'image':
          $img_data = wp_get_attachment_image_src((int) fw_akg('image', $atts), 'full');
          $img_src = fw_akg('0', $img_data);
          $style = implode(';', array(
            'width: ' . fw_akg('graphic_size', $atts) . 'px',
          ));

          $output = implode('', array(
            '<div class="type-'. $graphic .'" style="'. $style .'">',
              '<img src="'. $img_src .'" alt="#">',
            '</div>',
          ));
          break;
      }

      return $output;
    }

    public function button_html($atts = array()) {
      $show_button = fw_akg('show_button', $atts);

      if(trim($show_button) != 'show') return;

      $output               = '';
      $button_text          = fw_akg('button_text', $atts);
      $href                 = fw_akg('href', $atts);
      $button_type          = fw_akg('button_type', $atts);
      $open_link_in_new_tab = fw_akg('open_link_in_new_tab', $atts);

      $target = ($open_link_in_new_tab == 'yes') ? 'target="_blank"' : '';

      $output = '<a href="'. $href .'" class="featured-button btn-type-'. $button_type .'" '. $target .'>'. $button_text .'</a>';
      return $output;
    }

    public function getAlignmentClass($atts) {
      $output = '';
      $horizontal_alignment = fw_akg('horizontal_alignment', $atts);

      switch ($horizontal_alignment) {
        case 'center':
          $output = "content-alignment-" . fw_akg('content_alignment', $atts);
          break;

        case 'left':
          $output = "vertical-alignment-" . fw_akg('vertical_alignment_horizontal_left', $atts);
          break;

        case 'right':
          $output = "vertical-alignment-" . fw_akg('vertical_alignment_horizontal_right', $atts);
          break;
      }

      return $output;
    }

    public function template($temp = 'default', $params = array()) {

    }

    // Element HTML
    public function vc_featured_box_html( $atts, $content ) {
      $atts['self'] = $this;
      $atts['content'] = $content;
      return fw_render_view(get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements/vc_featured_box.php', array('atts' => $atts), true);
    }

} // End Element Class


// Element Class Init
new vcFeaturedBox();
