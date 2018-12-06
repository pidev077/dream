<?php
/*
Element Description: VC Pricing Table
*/

// Element Class
class vcPricingTable extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        global $__VcShadowWPBakeryVisualComposerAbstract;
        add_action( 'init', array( $this, 'vc_pricing_table_mapping' ) );
        $__VcShadowWPBakeryVisualComposerAbstract->addShortCode('vc_pricing_table', array( $this, 'vc_pricing_table_html' ));
    }

    // Element Mapping
    public function vc_pricing_table_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
          array(
            'name' => __('Pricing Table', 'dream'),
            'base' => 'vc_pricing_table',
            'description' => __('Pricing table element', 'dream'),
            'category' => __('Theme Elements', 'dream'),
            'icon' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/pricing-table.png',
            'params' => array(
              /* source */
              array(
          			'type' => 'param_group',
          			'heading' => __( 'Values', 'dream' ),
          			'param_name' => 'values',
          			'description' => __( 'Enter value item for slider.', 'dream' ),
          			'value' => urlencode( json_encode( array(
          				array(
                    'graphic_max_width' => 120,
                    'heading' => __('Basic', 'dream'),
                    'sub_heading' => __('Individual', 'dream'),
          					'content_item' => '<p>A simple option but powerful to manage your business</p><p>Email support</p>',
                    'featured_column' => '',
                    'currency' => '$',
                    'price' => '9',
                    'interval' => __('Month', 'dream'),
                    'show_button' => 'show',
                    'button_text' => __('Sign Up', 'dream'),
                    'href' => '#',
          				),
          				array(
                    'graphic_max_width' => 120,
                    'heading' => __('Premium', 'dream'),
                    'sub_heading' => __('Business', 'dream'),
          					'content_item' => '<p>Unlimited product including apps integrations and more features</p><p>Mon-Fri support</p>',
                    'featured_column' => 'yes',
                    'currency' => '$',
                    'price' => '49',
                    'interval' => __('Month', 'dream'),
                    'show_button' => 'show',
                    'button_text' => __('Sign Up', 'dream'),
                    'href' => '#',
          				),
          				array(
                    'graphic_max_width' => 120,
                    'heading' => __('Ultimate', 'dream'),
                    'sub_heading' => __('Enterprise', 'dream'),
          					'content_item' => '<p>A wise choice for companies that want to grow long term</p><p>24/7 support</p>',
                    'featured_column' => '',
                    'currency' => '$',
                    'price' => '99',
                    'interval' => __('Month', 'dream'),
                    'show_button' => 'show',
                    'button_text' => __('Sign Up', 'dream'),
                    'href' => '#',
          				),
          			) ) ),
          			'params' => array(
                  array(
                    'type' => 'attach_image',
                    'heading' => __('Graphic Image', 'dream'),
                    'param_name' => 'graphic_image',
                    'description' => __('Select graphic image for item.', 'dream'),
                  ),
                  array(
                    'type' => 'textfield',
                    'heading' => __( 'Graphic Max Width', 'dream' ),
                    'param_name' => 'graphic_max_width',
                    'description' => __( 'Enter max width for graphic (px)', 'dream' ),
                    'value' => '120',
                  ),
                  array(
                    'type' => 'textfield',
                    'heading' => __( 'Heading', 'dream' ),
                    'param_name' => 'heading',
                    'description' => __( 'Enter heading for pricing table', 'dream' ),
                    'admin_label' => true,
                  ),
                  array(
                    'type' => 'textfield',
                    'heading' => __( 'Sub Heading', 'dream' ),
                    'param_name' => 'sub_heading', // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
                    'description' => __( 'Enter sub-heading for pricing table.', 'dream' )
                  ),
                  array(
                    'type' => 'textarea',
                    'heading' => __( 'Content', 'dream' ),
                    'param_name' => 'content_item', // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
                    'description' => __( 'Enter content for pricing table.', 'dream' ),
                  ),
                  array(
                    'type' => 'checkbox',
                    'heading' => __('Featured Column', 'dream'),
                    'value' => array(
                      __('Enable to specify this column as your item', 'dream') => 'yes',
                    ),
                    'std' => '',
                    'param_name' => 'featured_column',
                  ),
                  array(
                    'type' => 'textfield',
                    'heading' => __('Currency','dream'),
                    'value' => '$',
                    'description' => __('Enter your desired currency symbol here.', 'dream'),
                    'param_name' => 'currency',
                  ),
                  array(
                    'type' => 'textfield',
                    'heading' => __('Price','dream'),
                    'value' => '20.99',
                    'description' => __('Enter the price for this column.', 'dream'),
                    'param_name' => 'price',
                  ),
                  array(
                    'type' => 'textfield',
                    'heading' => __('Interval','dream'),
                    'value' => __('Per Month', 'dream'),
                    'description' => __('Enter the duration for this payment.', 'dream'),
                    'param_name' => 'interval',
                  ),
                  array(
                    'type'          => 'checkbox',
                    'heading'       => __('Button', 'dream'),
                    // 'description'   => __('', 'dream'),
                    'value'         => array(
                      __('Select if you want to show button.', 'dream') => 'show',
                    ),
                    'param_name'    => 'show_button',
                  ),
                  array(
                    'type' => 'textfield',
                    'heading' => __('Button Text', 'dream'),
                    'param_name' => 'button_text',
                    'value' => __('Sign Up', 'dream'),
                    'description' => __('Enter the button text item.', 'dream'),
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
                    'description' => __('Enter the link item.', 'dream'),
                    'group' => 'Button',
                    'value' => '#',
                    'dependency' => array(
              				'element' => 'show_button',
              				'value' => 'show',
              			),
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
              /* button */
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
                'group' => 'Button Options',
              ),
              array(
                'type'          => 'checkbox',
                'heading'       => __('Open Link In New Window', 'dream'),
                'value'         => array(
                  __('Select to open your link in new window.', 'dream') => 'yes',
                ),
                'param_name'    => 'open_link_in_new_tab',
                'group' => 'Button Options',
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
  		$css_class = apply_filters( 'vc_pricing_table_filter_class', 'wpb_theme_custom_element wpb_pricing_table ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

  		return array(
  			'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
  			'styles' => $styles,
  		);
    }

    public function template($temp = 'default', $params = array()) {
      $output = '';

      $show_button = fw_akg('{show_button}', $params);
      $open_link_in_new_tab = fw_akg('{open_link_in_new_tab}', $params);
      $target_link = ($open_link_in_new_tab == 'yes') ? 'target="_blank"' : '';
      $button_temp = ($show_button == 'show') ? '<div><a href="{href}" class="pricing-table-button btn-type-{button_type}" '. $target_link .'>{button_text}</a></div>' : '';

      switch($temp) {
        case 'custom':
          break;

        default:

          $output = implode('', array(
            '<div class="pricing-table-item-inner pricing-table-layout-'. $temp .' featured-item-{featured_column}">',
              ! empty($params['{graphic_image_utl}']) ? '<div class="pricing-table-graphic-image"><img src="{graphic_image_utl}" alt="#" style="max-width: {graphic_max_width}px;"/></div>' : '',
              '<h4 class="pricing-table-heading">{heading}</h4>',
              ! empty($params['{sub_heading}']) ? '<div class="pricing-table-sub-heading">{sub_heading}</div>' : '',
              '<div class="entry-content">{content_item}</div>',
              '<div class="pricing-table-price">',
                '<span class="currency">{currency}</span>',
                '<span class="price">{price}</span>',
                '<span class="interval">{interval}</span>',
              '</div>',
              $button_temp,
            '</div>',
          ));
          break;
      }

      return str_replace(array_keys($params), array_values($params), $output);
    }

    // Element HTML
    public function vc_pricing_table_html( $atts, $content ) {
      $atts['self'] = $this;
      $atts['content'] = $content;
      return fw_render_view(get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements/vc_pricing_table.php', array('atts' => $atts), true);
    }

} // End Element Class


// Element Class Init
new vcPricingTable();
