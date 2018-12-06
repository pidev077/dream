<?php
/*
Element Description: VC Review
*/

// Element Class
class vcBaseReview extends WPBakeryShortCode {

	// Element Init
	function __construct() {
		global $__VcShadowWPBakeryVisualComposerAbstract;
		add_action( 'init', array( $this, 'vc_base_review_mapping' ) );
		$__VcShadowWPBakeryVisualComposerAbstract->addShortCode( 'vc_base_review', array(
			$this,
			'vc_base_review_html'
		) );
	}

	// Element Mapping
	public function vc_base_review_mapping() {

		// Stop all if VC is not enabled
		if ( ! defined( 'WPB_VC_VERSION' ) ) {
			return;
		}

		// Map the block with vc_map()
		vc_map( array(
			'name'        => __( 'Base review', 'dream' ),
			'base'        => 'vc_base_review',
			'description' => __( 'Base OWL review', 'dream' ),
			'category'    => __( 'Theme Elements', 'dream' ),
			'icon'        => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/base-testominal.png',
			'params'      => array(
				/* source */
				array(
					'type'        => 'param_group',
					'heading'     => __( 'Values', 'dream' ),
					'param_name'  => 'values',
					'description' => __( 'Enter value item for slider.', 'dream' ),
					'value'       => urlencode( json_encode( array(
						array(
							'label'              => __( 'Your Name', 'dream' ),
							'manger'             => __( 'position', 'dream' ),
							'content_item'       => __( 'I am test text block one. Click edit button to change this text.', 'dream' ),
							'image'              => __( 0, 'dream' ),
						),
						array(
							'label'              => __( 'Your Name', 'dream' ),
							'manger'             => __( 'position', 'dream' ),
							'content_item'       => __( 'I am test text block two. Click edit button to change this text.', 'dream' ),
							'image'              => __( 0, 'dream' ),
						),
						array(
							'label'              => __( 'Your Name', 'dream' ),
							'manger'             => __( 'position', 'dream' ),
							'content_item'       => __( 'I am test text block three. Click edit button to change this text.', 'dream' ),
							'image'              => __( 0, 'dream' ),
						),
					) ) ),
					'params'      => array(
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Name', 'dream' ),
							'param_name'  => 'label',
							'description' => __( 'Enter a name', 'dream' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Position', 'dream' ),
							'param_name'  => 'manger',
							'description' => __( 'Enter a position', 'dream' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textarea',
							'heading'     => __( 'Content', 'dream' ),
							'param_name'  => 'content_item',
							'description' => __( 'Enter your content.', 'dream' )
						),
						array(
							'type'       => 'attach_image',
							'heading'    => __( 'Avatar', 'dream' ),
							'param_name' => 'image',
							'group'      => 'Source',
						),
					),
					'group'       => 'Source',
				),
				array(
          'type'        => 'dropdown',
          'heading'     => __( 'Layout', 'dream' ),
          'param_name'  => 'review_layout',
          'value'       => array(
            __( 'Default', 'dream' ) => 'default',
            __( 'Style 1', 'dream' ) => 'style-1',
            __( 'Style 2', 'dream' ) => 'style-2',
          ),
          'std'         => 'default',
          'description' => __( 'Select layout of review.', 'dream' ),
          'group'       => 'Source',
        ),
				array(
					'type'        => 'el_id',
					'heading'     => __( 'Element ID', 'dream' ),
					'param_name'  => 'el_id',
					'description' => __( 'Enter element ID .', 'dream' ),
					'group'       => 'Source',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'dream' ),
					'param_name'  => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'dream' ),
					'group'       => 'Source',
				),
				/*** Slider Options ***/
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Items', 'dream' ),
					'param_name'  => 'items',
					'value'       => '3',
					'admin_label' => false,
					'description' => __( 'The number of items you want to see on the screen.', 'dream' ),
					'group'       => 'Slider Options',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Margin', 'dream' ),
					'param_name'  => 'margin',
					'value'       => '30',
					'admin_label' => false,
					'description' => __( 'margin-right(px) on item.', 'dream' ),
					'group'       => 'Slider Options',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Loop', 'dream' ),
					'param_name'  => 'loop',
					'value'       => array(
						__( 'Yes', 'dream' ) => '1',
						__( 'No', 'dream' )  => '0',
					),
					'std'         => '0',
					'description' => __( 'Infinity loop. Duplicate last and first items to get loop illusion.', 'dream' ),
					'group'       => 'Slider Options',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Center', 'dream' ),
					'param_name'  => 'center',
					'value'       => array(
						__( 'Yes', 'dream' ) => '1',
						__( 'No', 'dream' )  => '0',
					),
					'std'         => '0',
					'description' => __( 'Center item. Works well with even an odd number of items.', 'dream' ),
					'group'       => 'Slider Options',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'stagePadding', 'dream' ),
					'param_name'  => __( 'stage_padding', 'dream' ),
					'value'       => '0',
					'description' => __( 'Padding left and right on stage (can see neighbours).', 'dream' ),
					'group'       => 'Slider Options',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'startPosition', 'dream' ),
					'param_name'  => __( 'start_position', 'dream' ),
					'value'       => '0',
					'description' => __( 'Start position or URL Hash string like `#id`.', 'dream' ),
					'group'       => 'Slider Options',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Nav', 'dream' ),
					'param_name'  => 'nav',
					'value'       => array(
						__( 'Yes', 'dream' ) => '1',
						__( 'No', 'dream' )  => '0',
					),
					'std'         => '0',
					'description' => __( 'Show next/prev buttons.', 'dream' ),
					'group'       => 'Slider Options',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Dots', 'dream' ),
					'param_name'  => 'dots',
					'value'       => array(
						__( 'Yes', 'dream' ) => '1',
						__( 'No', 'dream' )  => '0',
					),
					'std'         => '0',
					'description' => __( 'Show dots navigation.', 'dream' ),
					'group'       => 'Slider Options',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'slideBy', 'dream' ),
					'param_name'  => __( 'slide_by', 'dream' ),
					'value'       => 1,
					'description' => __( 'Navigation slide by x. `page` string can be set to slide by page.', 'dream' ),
					'group'       => 'Slider Options',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Autoplay', 'dream' ),
					'param_name'  => 'autoplay',
					'value'       => array(
						__( 'Yes', 'dream' ) => '1',
						__( 'No', 'dream' )  => '0',
					),
					'std'         => '0',
					'description' => __( 'Autoplay.', 'dream' ),
					'group'       => 'Slider Options',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'autoplayHoverPause', 'dream' ),
					'param_name'  => 'autoplay_hover_pause',
					'value'       => array(
						__( 'Yes', 'dream' ) => '1',
						__( 'No', 'dream' )  => '0',
					),
					'std'         => '0',
					'description' => __( 'Pause on mouse hover.', 'dream' ),
					'group'       => 'Slider Options',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'autoplayTimeout', 'dream' ),
					'param_name'  => 'autoplay_timeout',
					'value'       => '5000',
					'description' => __( 'Autoplay interval timeout.', 'dream' ),
					'group'       => 'Slider Options',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'smartSpeed', 'dream' ),
					'param_name'  => 'smart_speed',
					'value'       => '250',
					'description' => __( 'AutoplaySpeed Calculate. More info to come..', 'dream' ),
					'group'       => 'Slider Options',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Table Items', 'dream' ),
					'param_name'  => 'responsive_table_items',
					'value'       => '1',
					'admin_label' => false,
					'description' => __( 'The number of items you want to see on the table screen.', 'dream' ),
					'group'       => 'Slider Options',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Mobile Items', 'dream' ),
					'param_name'  => 'responsive_mobile_items',
					'value'       => '1',
					'admin_label' => false,
					'description' => __( 'The number of items you want to see on the mobile screen.', 'dream' ),
					'group'       => 'Slider Options',
				),
				/* css editor */
				array(
					'type'       => 'css_editor',
					'heading'    => __( 'Css', 'dream' ),
					'param_name' => 'css_item',
					'group'      => __( 'Design Options items', 'dream' ),
				),
				array(
					'type'       => 'css_editor',
					'heading'    => __( 'Css', 'dream' ),
					'param_name' => 'css',
					'group'      => __( 'Design Options general', 'dream' ),
				),
			),
		) );
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
	public function getStyles( $el_class, $css, $atts ) {
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
		$css_class = apply_filters( 'vc_base_review_filter_class', 'wpb_theme_custom_element wpb_base_review ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

		return array(
			'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
			'styles'    => $styles,
		);
	}

	public function getStylesSliderItem( $class, $css, $atts ) {
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
		$css_class = apply_filters( 'vc_base_review_item_filter_class', $class . ' ' . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

		return array(
			'css_class_item' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
			'styles_item'    => $styles,
		);
	}

	public function _template( $temp = 'default', $item = array(), $atts = array() ) {
		$variables = array(
			'{layout}'         => fw_akg( 'review_layout', $item ),
			'{name}'           => fw_akg( 'label', $item ),
			'{position}'       => fw_akg( 'manger', $item ),
			'{content_item}'   => do_shortcode( fw_akg( 'content_item', $item ) ),
			'{image}'          => fw_akg( 'image', $item ),
			'{css_class_item}' => fw_akg( 'css_class_item', $item ),
		);

		$imgid            = $item['image'];
		$image_attributes = wp_get_attachment_image_src( $imgid, 'full' );
		$imgSrc           = $image_attributes[0];

		switch ( $temp ) {
			case 'default':
				$output = implode( '', array(
					'<article class="dream-review">',
						'<div class="bt-content">',
							'<div class="bt-excerpt">{content_item}</div>',
						'</div>',
            '<div class="bt-info-review">',
              '<div class="bt-thumb"><img src="' . $imgSrc . '"/></div>',
              '<div class="bt-name-position">',
                '<h3 class="bt-title">{name}</h3>',
                '<div class="bt-position">{position}</div>',
              '</div>',
            '</div>',
					'</article>',
				) );
				break;
				case 'style-1':
					$output = implode( '', array(
						'<article class="dream-review">',
						'<div class="bt-info-review">',
							'<div class="bt-thumb"><img src="' . $imgSrc . '"/></div>',
						'</div>',
							'<div class="bt-content">',
								'<div class="bt-excerpt">{content_item}</div>',
								'<div class="bt-name-position">',
									'<h3 class="bt-title">{name}</h3>',
								'</div>',
								'<div class="bt-position">{position}</div>',
							'</div>',
						'</article>',
					) );
					break;
					case 'style-2':
						$output = implode( '', array(
							'<article class="dream-review">',
								'<div class="bt-info-review">',
									'<div class="bt-thumb"><img src="' . $imgSrc . '"/></div>',
								'</div>',
								'<div class="bt-content">',
									'<div class="bt-excerpt">{content_item}</div>',
									'<div class="bt-name-position">',
										'<h3 class="bt-title">{name}</h3>',
									'</div>',
									'<div class="bt-position">{position}</div>',
								'</div>',
							'</article>',
						) );
					break;
		}

		return str_replace( array_keys( $variables ), array_values( $variables ), $output );
	}

	// Element HTML
	public function vc_base_review_html( $atts, $content ) {
		$atts['self']    = $this;
		$atts['content'] = $content;

		return fw_render_view( get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements/client_review.php', array( 'atts' => $atts ), true );
	}

} // End Element Class


// Element Class Init
new vcBaseReview();
