<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( ! defined( 'FW' ) ) {
	return;
}

$dream_customizer_option = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option() : array();
$dream_page_options      = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option() : array();

$page_options_enable                       = fw_akg( 'enable_page_options/selected_value', $dream_page_options );
$selected_custom_page_header_id            = fw_akg( 'enable_page_options/fw_enable_page_options/custom_page_header_layout_value', $dream_page_options );
$dream_page_options_selected_header_id = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( $selected_custom_page_header_id ) : array();

global $dream_scss_variables;
$dream_scss_variables = array();

if ( empty( $dream_customizer_option ) ) {
	return;
}

if ( $page_options_enable == 'fw_enable_page_options' ) {
	if ( empty( $selected_custom_page_header_id ) ) {
		$dream_color_settings           = fw_akg( 'enable_page_options/fw_enable_page_options/color_settings', $dream_page_options );
		$dream_typography_page_settings = fw_akg( 'enable_page_options/fw_enable_page_options/typography_settings', $dream_page_options );
	} else {
		$dream_color_settings           = fw_akg( 'enable_page_options/fw_enable_page_options/color_settings', $dream_page_options_selected_header_id );
		$dream_typography_page_settings = fw_akg( 'enable_page_options/fw_enable_page_options/typography_settings', $dream_page_options_selected_header_id );
	}
} else {
	$dream_color_settings = $dream_customizer_option['color_settings'];
}
$dream_color_settings      = array_merge( $dream_customizer_option['color_settings'], $dream_color_settings );
$dream_typography_settings = $dream_customizer_option['typography_settings'];
$dream_website_background  = $dream_customizer_option['website_background'];

if ( $page_options_enable == 'fw_enable_page_options' ) {
	if ( empty( $selected_custom_page_header_id ) ) {
		$dream_header_settings = fw_akg( 'enable_page_options/fw_enable_page_options/header_settings', $dream_page_options );
	} else {
		$dream_header_settings = fw_akg( 'enable_page_options/fw_enable_page_options/header_settings', $dream_page_options_selected_header_id );
	}
} else {
	$dream_header_settings = $dream_customizer_option['header_settings'];
}

$dream_title_bar_settings                               = $dream_customizer_option['general_title_bar'];
$dream_footer_settings                                  = $dream_customizer_option['footer_settings'];
$dream_logo_settings                                    = $dream_customizer_option['logo_settings'];
$dream_buttons_settings_page_options                    = fw_akg( 'enable_page_options/fw_enable_page_options/buttons_settings', $dream_page_options );
$dream_buttons_settings_page_options_selected_header_id = fw_akg( 'enable_page_options/fw_enable_page_options/buttons_settings', $dream_page_options_selected_header_id );
$dream_scss_variables['website-bg-color']               = ( isset( $dream_website_background['website_bg_color'] ) && ! empty( $dream_website_background['website_bg_color'] ) ) ? $dream_website_background['website_bg_color'] : '#ffffff';

// website background
if ( isset( $dream_website_background['website_bg']['type'] ) && $dream_website_background['website_bg']['type'] == 'custom' ) {
	// custom image
	if ( isset( $dream_website_background['website_bg']['data']['icon'] ) && ! empty( $dream_website_background['website_bg']['data']['icon'] ) ) {
		$dream_scss_variables['body-bg-image'] = '"' . dream_change_original_link_with_cdn( $dream_website_background['website_bg']['data']['icon'] ) . '"';
	}
	$dream_modified_variables['body-bg-repeat'] = 'repeat';
} elseif ( isset( $dream_website_background['website_bg']['type'] ) && $dream_website_background['website_bg']['type'] == 'predefined' ) {
	if ( isset( $dream_website_background['website_bg']['predefined'] ) && $dream_website_background['website_bg']['predefined'] != 'none' ) {
		// predefined image
		$dream_scss_variables['body-bg-image']  = '"' . dream_change_original_link_with_cdn( $dream_website_background['website_bg']['data']['icon'] ) . '"';
		$dream_scss_variables['body-bg-repeat'] = $dream_website_background['website_bg']['data']['css']['background-repeat'];
	}
}

// boxed site width
if ( isset( $dream_customizer_option['container_site_type']['selected'] ) && $dream_customizer_option['container_site_type']['selected'] == 'bt-side-boxed' ) {
	// boxed margin top/bottom
	if ( ! empty( $dream_customizer_option['container_site_type']['bt-side-boxed']['site_margin'] ) ) {
		$dream_scss_variables['boxed-site-margin-bottom'] = $dream_customizer_option['container_site_type']['bt-side-boxed']['site_margin'] . 'px';
		$dream_scss_variables['boxed-site-margin-top']    = $dream_customizer_option['container_site_type']['bt-side-boxed']['site_margin'] . 'px';
	}

	// boxed container background
	if ( isset( $dream_customizer_option['container_site_type']['bt-side-boxed']['boxed_container_bg'] ) && ! empty( $dream_customizer_option['container_site_type']['bt-side-boxed']['boxed_container_bg'] ) ) {
		$dream_scss_variables['boxed-container-bg'] = $dream_customizer_option['container_site_type']['bt-side-boxed']['boxed_container_bg'];
	}
}

// links and buttons colors
if ( $page_options_enable == 'fw_enable_page_options' ) {
	if ( empty( $selected_custom_page_header_id ) ) {
		if ( isset( $dream_buttons_settings_page_options['links_normal_state'] ) && ! empty( $dream_buttons_settings_page_options['links_normal_state'] ) ) {
			if ( isset( $dream_buttons_settings_page_options['links_normal_state']['id'] ) && $dream_buttons_settings_page_options['links_normal_state']['id'] == 'fw-custom' ) {
				if ( ! empty( $dream_buttons_settings_page_options['links_normal_state']['color'] ) ) {
					$dream_scss_variables['link-color'] = $dream_buttons_settings_page_options['links_normal_state']['color'];
				}
			} elseif ( isset( $dream_buttons_settings_page_options['links_normal_state']['id'] ) ) {
				$dream_scss_variables['link-color'] = $dream_color_settings[ $dream_buttons_settings_page_options['links_normal_state']['id'] ];
			}
		}
		if ( isset( $dream_buttons_settings_page_options['links_hover_state'] ) && ! empty( $dream_buttons_settings_page_options['links_hover_state'] ) ) {
			if ( isset( $dream_buttons_settings_page_options['links_hover_state']['id'] ) && $dream_buttons_settings_page_options['links_hover_state']['id'] == 'fw-custom' ) {
				if ( ! empty( $dream_buttons_settings_page_options['links_hover_state']['color'] ) ) {
					$dream_scss_variables['link-hover-color'] = $dream_buttons_settings_page_options['links_hover_state']['color'];
				}
			} elseif ( isset( $dream_buttons_settings_page_options['links_hover_state']['id'] ) ) {
				$dream_scss_variables['link-hover-color'] = $dream_color_settings[ $dream_buttons_settings_page_options['links_hover_state']['id'] ];
			}
		}
		if ( isset( $dream_buttons_settings_page_options['buttons_normal_state'] ) && ! empty( $dream_buttons_settings_page_options['buttons_normal_state'] ) ) {
			if ( isset( $dream_buttons_settings_page_options['buttons_normal_state']['id'] ) && $dream_buttons_settings_page_options['buttons_normal_state']['id'] == 'fw-custom' ) {
				if ( ! empty( $dream_buttons_settings_page_options['buttons_normal_state']['color'] ) ) {
					$dream_scss_variables['fw-btn-color'] = $dream_buttons_settings_page_options['buttons_normal_state']['color'];
				}
			} elseif ( isset( $dream_buttons_settings_page_options['buttons_normal_state']['id'] ) ) {
				$dream_scss_variables['fw-btn-color'] = $dream_color_settings[ $dream_buttons_settings_page_options['buttons_normal_state']['id'] ];
			}
		}
		if ( isset( $dream_buttons_settings_page_options['buttons_hover_state'] ) && ! empty( $dream_buttons_settings_page_options['buttons_hover_state'] ) ) {
			if ( isset( $dream_buttons_settings_page_options['buttons_hover_state']['id'] ) && $dream_buttons_settings_page_options['buttons_hover_state']['id'] == 'fw-custom' ) {
				if ( ! empty( $dream_buttons_settings_page_options['buttons_hover_state']['color'] ) ) {
					$dream_scss_variables['fw-btn-hover-color'] = $dream_buttons_settings_page_options['buttons_hover_state']['color'];
				}
			} elseif ( isset( $dream_buttons_settings_page_options['buttons_hover_state']['id'] ) ) {
				$dream_scss_variables['fw-btn-hover-color'] = $dream_color_settings[ $dream_buttons_settings_page_options['buttons_hover_state']['id'] ];
			}
		}
	} else {
		if ( isset( $dream_buttons_settings_page_options_selected_header_id['links_normal_state'] ) && ! empty( $dream_buttons_settings_page_options_selected_header_id['links_normal_state'] ) ) {
			if ( isset( $dream_buttons_settings_page_options_selected_header_id['links_normal_state']['id'] ) && $dream_buttons_settings_page_options_selected_header_id['links_normal_state']['id'] == 'fw-custom' ) {
				if ( ! empty( $dream_buttons_settings_page_options_selected_header_id['links_normal_state']['color'] ) ) {
					$dream_scss_variables['link-color'] = $dream_buttons_settings_page_options_selected_header_id['links_normal_state']['color'];
				}
			} elseif ( isset( $dream_buttons_settings_page_options_selected_header_id['links_normal_state']['id'] ) ) {
				$dream_scss_variables['link-color'] = $dream_color_settings[ $dream_buttons_settings_page_options_selected_header_id['links_normal_state']['id'] ];
			}
		}
		if ( isset( $dream_buttons_settings_page_options_selected_header_id['links_hover_state'] ) && ! empty( $dream_buttons_settings_page_options_selected_header_id['links_hover_state'] ) ) {
			if ( isset( $dream_buttons_settings_page_options_selected_header_id['links_hover_state']['id'] ) && $dream_buttons_settings_page_options_selected_header_id['links_hover_state']['id'] == 'fw-custom' ) {
				if ( ! empty( $dream_buttons_settings_page_options_selected_header_id['links_hover_state']['color'] ) ) {
					$dream_scss_variables['link-hover-color'] = $dream_buttons_settings_page_options_selected_header_id['links_hover_state']['color'];
				}
			} elseif ( isset( $dream_buttons_settings_page_options_selected_header_id['links_hover_state']['id'] ) ) {
				$dream_scss_variables['link-hover-color'] = $dream_color_settings[ $dream_buttons_settings_page_options_selected_header_id['links_hover_state']['id'] ];
			}
		}
		if ( isset( $dream_buttons_settings_page_options_selected_header_id['buttons_normal_state'] ) && ! empty( $dream_buttons_settings_page_options_selected_header_id['buttons_normal_state'] ) ) {
			if ( isset( $dream_buttons_settings_page_options_selected_header_id['buttons_normal_state']['id'] ) && $dream_buttons_settings_page_options_selected_header_id['buttons_normal_state']['id'] == 'fw-custom' ) {
				if ( ! empty( $dream_buttons_settings_page_options_selected_header_id['buttons_normal_state']['color'] ) ) {
					$dream_scss_variables['fw-btn-color'] = $dream_buttons_settings_page_options_selected_header_id['buttons_normal_state']['color'];
				}
			} elseif ( isset( $dream_buttons_settings_page_options_selected_header_id['buttons_normal_state']['id'] ) ) {
				$dream_scss_variables['fw-btn-color'] = $dream_color_settings[ $dream_buttons_settings_page_options_selected_header_id['buttons_normal_state']['id'] ];
			}
		}
		if ( isset( $dream_buttons_settings_page_options_selected_header_id['buttons_hover_state'] ) && ! empty( $dream_buttons_settings_page_options_selected_header_id['buttons_hover_state'] ) ) {
			if ( isset( $dream_buttons_settings_page_options_selected_header_id['buttons_hover_state']['id'] ) && $dream_buttons_settings_page_options_selected_header_id['buttons_hover_state']['id'] == 'fw-custom' ) {
				if ( ! empty( $dream_buttons_settings_page_options_selected_header_id['buttons_hover_state']['color'] ) ) {
					$dream_scss_variables['fw-btn-hover-color'] = $dream_buttons_settings_page_options_selected_header_id['buttons_hover_state']['color'];
				}
			} elseif ( isset( $dream_buttons_settings_page_options_selected_header_id['buttons_hover_state']['id'] ) ) {
				$dream_scss_variables['fw-btn-hover-color'] = $dream_color_settings[ $dream_buttons_settings_page_options_selected_header_id['buttons_hover_state']['id'] ];
			}
		}
	}
} else {
	if ( isset( $dream_customizer_option['buttons_settings']['links_normal_state'] ) && ! empty( $dream_customizer_option['buttons_settings']['links_normal_state'] ) ) {
		if ( isset( $dream_customizer_option['buttons_settings']['links_normal_state']['id'] ) && $dream_customizer_option['buttons_settings']['links_normal_state']['id'] == 'fw-custom' ) {
			if ( ! empty( $dream_customizer_option['buttons_settings']['links_normal_state']['color'] ) ) {
				$dream_scss_variables['link-color'] = $dream_customizer_option['buttons_settings']['links_normal_state']['color'];
			}
		} elseif ( isset( $dream_customizer_option['buttons_settings']['links_normal_state']['id'] ) ) {
			$dream_scss_variables['link-color'] = $dream_color_settings[ $dream_customizer_option['buttons_settings']['links_normal_state']['id'] ];
		}
	}
	if ( isset( $dream_customizer_option['buttons_settings']['links_hover_state'] ) && ! empty( $dream_customizer_option['buttons_settings']['links_hover_state'] ) ) {
		if ( isset( $dream_customizer_option['buttons_settings']['links_hover_state']['id'] ) && $dream_customizer_option['buttons_settings']['links_hover_state']['id'] == 'fw-custom' ) {
			if ( ! empty( $dream_customizer_option['buttons_settings']['links_hover_state']['color'] ) ) {
				$dream_scss_variables['link-hover-color'] = $dream_customizer_option['buttons_settings']['links_hover_state']['color'];
			}
		} elseif ( isset( $dream_customizer_option['buttons_settings']['links_hover_state']['id'] ) ) {
			$dream_scss_variables['link-hover-color'] = $dream_color_settings[ $dream_customizer_option['buttons_settings']['links_hover_state']['id'] ];
		}
	}
	if ( isset( $dream_customizer_option['buttons_settings']['buttons_normal_state'] ) && ! empty( $dream_customizer_option['buttons_settings']['buttons_normal_state'] ) ) {
		if ( isset( $dream_customizer_option['buttons_settings']['buttons_normal_state']['id'] ) && $dream_customizer_option['buttons_settings']['buttons_normal_state']['id'] == 'fw-custom' ) {
			if ( ! empty( $dream_customizer_option['buttons_settings']['buttons_normal_state']['color'] ) ) {
				$dream_scss_variables['fw-btn-color'] = $dream_customizer_option['buttons_settings']['buttons_normal_state']['color'];
			}
		} elseif ( isset( $dream_customizer_option['buttons_settings']['buttons_normal_state']['id'] ) ) {
			$dream_scss_variables['fw-btn-color'] = $dream_color_settings[ $dream_customizer_option['buttons_settings']['buttons_normal_state']['id'] ];
		}
	}
	if ( isset( $dream_customizer_option['buttons_settings']['buttons_hover_state'] ) && ! empty( $dream_customizer_option['buttons_settings']['buttons_hover_state'] ) ) {
		if ( isset( $dream_customizer_option['buttons_settings']['buttons_hover_state']['id'] ) && $dream_customizer_option['buttons_settings']['buttons_hover_state']['id'] == 'fw-custom' ) {
			if ( ! empty( $dream_customizer_option['buttons_settings']['buttons_hover_state']['color'] ) ) {
				$dream_scss_variables['fw-btn-hover-color'] = $dream_customizer_option['buttons_settings']['buttons_hover_state']['color'];
			}
		} elseif ( isset( $dream_customizer_option['buttons_settings']['buttons_hover_state']['id'] ) ) {
			$dream_scss_variables['fw-btn-hover-color'] = $dream_color_settings[ $dream_customizer_option['buttons_settings']['buttons_hover_state']['id'] ];
		}
	}
}

// h1
if ( isset( $dream_typography_settings['h1'] ) ) {
	$font_styles                                   = dream_get_font_array( $dream_typography_settings['h1'], $dream_color_settings );
	$dream_scss_variables['fw-h1-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-h1-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-h1-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-h1-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $dream_scss_variables['fw-h1-color'] = $font_styles['color'] : '';
	$dream_scss_variables['fw-h1-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-h1-font-weight'] = $font_styles['font-weight'];
}

// h2
if ( isset( $dream_typography_settings['h2'] ) ) {
	$font_styles                                   = dream_get_font_array( $dream_typography_settings['h2'], $dream_color_settings );
	$dream_scss_variables['fw-h2-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-h2-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-h2-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-h2-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $dream_scss_variables['fw-h2-color'] = $font_styles['color'] : '';
	$dream_scss_variables['fw-h2-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-h2-font-weight'] = $font_styles['font-weight'];
}

// h3
if ( isset( $dream_typography_settings['h3'] ) ) {
	$font_styles                                   = dream_get_font_array( $dream_typography_settings['h3'], $dream_color_settings );
	$dream_scss_variables['fw-h3-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-h3-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-h3-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-h3-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $dream_scss_variables['fw-h3-color'] = $font_styles['color'] : '';
	$dream_scss_variables['fw-h3-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-h3-font-weight'] = $font_styles['font-weight'];
}

// h4
if ( isset( $dream_typography_settings['h4'] ) ) {
	$font_styles                                   = dream_get_font_array( $dream_typography_settings['h4'], $dream_color_settings );
	$dream_scss_variables['fw-h4-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-h4-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-h4-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-h4-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $dream_scss_variables['fw-h4-color'] = $font_styles['color'] : '';
	$dream_scss_variables['fw-h4-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-h4-font-weight'] = $font_styles['font-weight'];
}

// h5
if ( isset( $dream_typography_settings['h5'] ) ) {
	$font_styles                                   = dream_get_font_array( $dream_typography_settings['h5'], $dream_color_settings );
	$dream_scss_variables['fw-h5-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-h5-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-h5-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-h5-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $dream_scss_variables['fw-h5-color'] = $font_styles['color'] : '';
	$dream_scss_variables['fw-h5-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-h5-font-weight'] = $font_styles['font-weight'];
}

// h6
if ( isset( $dream_typography_settings['h6'] ) ) {
	$font_styles                                   = dream_get_font_array( $dream_typography_settings['h6'], $dream_color_settings );
	$dream_scss_variables['fw-h6-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-h6-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-h6-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-h6-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $dream_scss_variables['fw-h6-color'] = $font_styles['color'] : '';
	$dream_scss_variables['fw-h6-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-h6-font-weight'] = $font_styles['font-weight'];
}

// body
if ( isset( $dream_typography_settings['body_text'] ) ) {
	$font_styles                                  = dream_get_font_array( $dream_typography_settings['body_text'], $dream_color_settings );
	$dream_scss_variables['font-family-base'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['font-size-base'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['line-height-base'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['font-letter-spacing-base'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $dream_scss_variables['text-color'] = $font_styles['color'] : '';
	$dream_scss_variables['font-style-base']  = $font_styles['font-style'];
	$dream_scss_variables['font-weight-base'] = $font_styles['font-weight'];
}

// buttons
if ( isset( $dream_typography_settings['buttons'] ) ) {
	$font_styles                                        = dream_get_font_array( $dream_typography_settings['buttons'], $dream_color_settings );
	$dream_scss_variables['fw-buttons-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-buttons-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-buttons-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-buttons-letter-spacing'] = $font_styles['letter-spacing'] : '';
	$dream_scss_variables['fw-buttons-color']       = ! empty( $font_styles['color'] ) ? $font_styles['color'] : '#ffffff';
	$dream_scss_variables['fw-buttons-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-buttons-font-weight'] = $font_styles['font-weight'];
}
if ( isset( $dream_typography_settings['buttons_hover']['id'] ) && $dream_typography_settings['buttons_hover']['id'] == 'fw-custom' ) {
	if ( ! empty( $dream_typography_settings['buttons_hover']['color'] ) ) {
		$dream_scss_variables['fw-buttons-hover-color'] = $dream_typography_settings['buttons_hover']['color'];
	}
} elseif ( isset( $dream_typography_settings['buttons_hover']['id'] ) ) {
	$dream_scss_variables['fw-buttons-hover-color'] = $dream_color_settings[ $dream_typography_settings['buttons_hover']['id'] ];
}

// top-bar
if ( $page_options_enable == 'fw_enable_page_options' && isset( $dream_typography_page_settings['header_top_bar_text'] ) ) {
	$font_styles                                        = dream_get_font_array( $dream_typography_page_settings['header_top_bar_text'], $dream_color_settings );
	$dream_scss_variables['fw-top-bar-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-top-bar-font-size-text'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-top-bar-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-top-bar-letter-spacing'] = $font_styles['letter-spacing'] : '';
	$dream_scss_variables['fw-top-bar-text-color']  = ! empty( $font_styles['color'] ) ? $font_styles['color'] : '#333333';
	$dream_scss_variables['fw-top-bar-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-top-bar-font-weight'] = $font_styles['font-weight'];
} elseif ( isset( $dream_typography_settings['header_top_bar_text'] ) ) {
	$font_styles                                        = dream_get_font_array( $dream_typography_settings['header_top_bar_text'], $dream_color_settings );
	$dream_scss_variables['fw-top-bar-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-top-bar-font-size-text'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-top-bar-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-top-bar-letter-spacing'] = $font_styles['letter-spacing'] : '';
	$dream_scss_variables['fw-top-bar-text-color']  = ! empty( $font_styles['color'] ) ? $font_styles['color'] : '#333333';
	$dream_scss_variables['fw-top-bar-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-top-bar-font-weight'] = $font_styles['font-weight'];
}

// header padding top - bottom
$dream_scss_variables['header-padding-top']    = ( ! empty( $dream_header_settings['header_padding_top'] ) ) ? (int) $dream_header_settings['header_padding_top'] . 'px' : '0px';
$dream_scss_variables['header-padding-bottom'] = ( ! empty( $dream_header_settings['header_padding_bottom'] ) ) ? (int) $dream_header_settings['header_padding_bottom'] . 'px' : '0px';

// header 3 extra options
$header_3_options                                                 = dream_get_header_3_options();
$dream_scss_variables['header-3-logo-sidebar-padding-top']    = ! empty( $header_3_options['header-3']['logo_sidebar_padding_top'] ) ? (int) $header_3_options['header-3']['logo_sidebar_padding_top'] . 'px' : '0px';
$dream_scss_variables['header-3-logo-sidebar-padding-bottom'] = ! empty( $header_3_options['header-3']['logo_sidebar_padding_bottom'] ) ? (int) $header_3_options['header-3']['logo_sidebar_padding_bottom'] . 'px' : '0px';
$dream_scss_variables['header-3-logo-sidebar-bg-color']       = ! empty( $header_3_options['header-3']['logo_sidebar_bg_color'] ) ? $header_3_options['header-3']['logo_sidebar_bg_color'] : '#ffffff';
$dream_scss_variables['header-3-logo-sidebar-shadow-color']   = ! empty( $header_3_options['header-3']['logo_sidebar_shadow_effect']['yes']['shadow_color'] ) ? $header_3_options['header-3']['logo_sidebar_shadow_effect']['yes']['shadow_color'] : '#222222';

// header menu
if ( $page_options_enable == 'fw_enable_page_options' && isset( $dream_typography_page_settings['header_menu'] ) ) {
	$font_styles                                     = dream_get_font_array( $dream_typography_page_settings['header_menu'], $dream_color_settings );
	$dream_scss_variables['fw-menu-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-menu-item-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-menu-item-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-menu-letter-spacing'] = $font_styles['letter-spacing'] : '';
	$dream_scss_variables['fw-top-menu-color']   = ! empty( $font_styles['color'] ) ? $font_styles['color'] : '#222';
	$dream_scss_variables['fw-menu-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-menu-font-weight'] = $font_styles['font-weight'];
} elseif ( isset( $dream_typography_settings['header_menu'] ) ) {
	$font_styles                                     = dream_get_font_array( $dream_typography_settings['header_menu'], $dream_color_settings );
	$dream_scss_variables['fw-menu-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-menu-item-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-menu-item-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-menu-letter-spacing'] = $font_styles['letter-spacing'] : '';
	$dream_scss_variables['fw-top-menu-color']   = ! empty( $font_styles['color'] ) ? $font_styles['color'] : '#222';
	$dream_scss_variables['fw-menu-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-menu-font-weight'] = $font_styles['font-weight'];
}

// header menu hover color
if ( $page_options_enable == 'fw_enable_page_options' && isset( $dream_typography_page_settings['header_menu_hover'] ) ) {
	if ( isset( $dream_typography_page_settings['header_menu_hover']['id'] ) && $dream_typography_page_settings['header_menu_hover']['id'] == 'fw-custom' ) {
		if ( ! empty( $dream_typography_page_settings['header_menu_hover']['color'] ) ) {
			$dream_scss_variables['fw-top-menu-line-color'] = $dream_scss_variables['fw-top-menu-item-color-hover'] = $dream_typography_page_settings['header_menu_hover']['color'];
		}
	} elseif ( isset( $dream_typography_page_settings['header_menu_hover']['id'] ) ) {
		$dream_scss_variables['fw-top-menu-line-color'] = $dream_scss_variables['fw-top-menu-item-color-hover'] = $dream_color_settings[ $dream_typography_page_settings['header_menu_hover']['id'] ];
	}
} elseif ( isset( $dream_typography_settings['header_menu_hover']['id'] ) && $dream_typography_settings['header_menu_hover']['id'] == 'fw-custom' ) {
	if ( ! empty( $dream_typography_settings['header_menu_hover']['color'] ) ) {
		$dream_scss_variables['fw-top-menu-line-color'] = $dream_scss_variables['fw-top-menu-item-color-hover'] = $dream_typography_settings['header_menu_hover']['color'];
	}
} elseif ( isset( $dream_typography_settings['header_menu_hover']['id'] ) ) {
	$dream_scss_variables['fw-top-menu-line-color'] = $dream_scss_variables['fw-top-menu-item-color-hover'] = $dream_color_settings[ $dream_typography_settings['header_menu_hover']['id'] ];
}

if ( $page_options_enable == 'fw_enable_page_options' && isset( $dream_typography_page_settings['header_menu_items_spacing'] ) ) {
	$dream_scss_variables['fw-menu-item-margin-left'] = $dream_typography_page_settings['header_menu_items_spacing'] . 'px';
} elseif ( isset( $dream_typography_settings['header_menu_items_spacing'] ) ) {
	$dream_scss_variables['fw-menu-item-margin-left'] = $dream_typography_settings['header_menu_items_spacing'] . 'px';
}

// header sub menu
if ( $page_options_enable == 'fw_enable_page_options' && isset( $dream_typography_page_settings['header_sub_menu'] ) ) {
	$font_styles                                         = dream_get_font_array( $dream_typography_page_settings['header_sub_menu'], $dream_color_settings );
	$dream_scss_variables['fw-sub-menu-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-sub-menu-item-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-sub-menu-item-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-sub-menu-letter-spacing'] = $font_styles['letter-spacing'] : '';
	$dream_scss_variables['fw-sub-menu-color']       = ! empty( $font_styles['color'] ) ? $font_styles['color'] : '#ebebeb';
	$dream_scss_variables['fw-sub-menu-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-sub-menu-font-weight'] = $font_styles['font-weight'];
} elseif ( isset( $dream_typography_settings['header_sub_menu'] ) ) {
	$font_styles                                         = dream_get_font_array( $dream_typography_settings['header_sub_menu'], $dream_color_settings );
	$dream_scss_variables['fw-sub-menu-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-sub-menu-item-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-sub-menu-item-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-sub-menu-letter-spacing'] = $font_styles['letter-spacing'] : '';
	$dream_scss_variables['fw-sub-menu-color']       = ! empty( $font_styles['color'] ) ? $font_styles['color'] : '#ebebeb';
	$dream_scss_variables['fw-sub-menu-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-sub-menu-font-weight'] = $font_styles['font-weight'];
}

// header sub menu hover color
if ( $page_options_enable == 'fw_enable_page_options' && isset( $dream_typography_page_settings['header_sub_menu_hover'] ) ) {
	if ( isset( $dream_typography_page_settings['header_sub_menu_hover']['id'] ) && $dream_typography_page_settings['header_sub_menu_hover']['id'] == 'fw-custom' ) {
		if ( ! empty( $dream_typography_page_settings['header_sub_menu_hover']['color'] ) ) {
			$dream_scss_variables['fw-sub-menu-item-color-hover'] = $dream_typography_page_settings['header_sub_menu_hover']['color'];
		}
	} elseif ( isset( $dream_typography_page_settings['header_sub_menu_hover']['id'] ) ) {
		$dream_scss_variables['fw-sub-menu-item-color-hover'] = $dream_color_settings[ $dream_typography_page_settings['header_sub_menu_hover']['id'] ];
	}
} elseif ( isset( $dream_typography_settings['header_sub_menu_hover']['id'] ) && $dream_typography_settings['header_sub_menu_hover']['id'] == 'fw-custom' ) {
	if ( ! empty( $dream_typography_settings['header_sub_menu_hover']['color'] ) ) {
		$dream_scss_variables['fw-sub-menu-item-color-hover'] = $dream_typography_settings['header_sub_menu_hover']['color'];
	}
} elseif ( isset( $dream_typography_settings['header_sub_menu_hover']['id'] ) ) {
	$dream_scss_variables['fw-sub-menu-item-color-hover'] = $dream_color_settings[ $dream_typography_settings['header_sub_menu_hover']['id'] ];
}

// header sub menu item spacing
if ( $page_options_enable == 'fw_enable_page_options' && isset( $dream_typography_page_settings['header_sub_menu_items_spacing'] ) ) {
	$dream_scss_variables['fw-sub-menu-item-padding-top-bottom'] = isset( $dream_typography_page_settings['header_sub_menu_items_spacing'] ) ? $dream_typography_page_settings['header_sub_menu_items_spacing'] . 'px' : '0px';
} elseif ( isset( $dream_typography_settings['header_sub_menu_items_spacing'] ) ) {
	$dream_scss_variables['fw-sub-menu-item-padding-top-bottom'] = isset( $dream_typography_settings['header_sub_menu_items_spacing'] ) ? $dream_typography_settings['header_sub_menu_items_spacing'] . 'px' : '0px';
}

// header absolute
if ( isset( $dream_header_settings['enable_absolute_header'] ) ) {
	$dream_scss_variables['fw-header-absolute-opacity'] = $dream_header_settings['enable_absolute_header']['fw-absolute-header']['absolute_opacity'] . '%';
}

// header sticky
if ( isset( $dream_header_settings['enable_sticky_header'] ) ) {
	// sticky padding
	$dream_scss_variables['fw-header-sticky-padding-top']    = ! empty( $dream_header_settings['enable_sticky_header']['fw-sticky-header']['header_sticky_padding_top'] ) ? $dream_header_settings['enable_sticky_header']['fw-sticky-header']['header_sticky_padding_top'] . 'px' : '0px';
	$dream_scss_variables['fw-header-sticky-padding-bottom'] = ! empty( $dream_header_settings['enable_sticky_header']['fw-sticky-header']['header_sticky_padding_bottom'] ) ? $dream_header_settings['enable_sticky_header']['fw-sticky-header']['header_sticky_padding_bottom'] . 'px' : '0px';

	// sticky header color
	$dream_header_color_sticky = $dream_header_settings['enable_sticky_header']['fw-sticky-header']['background_color'];
	if ( $dream_header_color_sticky['id'] == 'fw-custom' ) {
		$dream_scss_variables['fw-header-sticky-color'] = $dream_header_color_sticky['color'];
	} else {
		$dream_scss_variables['fw-header-sticky-color'] = $dream_color_settings[ $dream_header_color_sticky['id'] ];
	}

	// opacity
	$dream_scss_variables['fw-header-sticky-opacity'] = $dream_header_settings['enable_sticky_header']['fw-sticky-header']['sticky_opacity'] . '%';

	// sticky header menu color lvl 1
	$dream_header_sticky_menu_item_color = $dream_header_settings['enable_sticky_header']['fw-sticky-header']['menu_item_color'];
	if ( $dream_header_sticky_menu_item_color['id'] == 'fw-custom' ) {
		$dream_scss_variables['fw-header-sticky-menu-item-color-lvl1'] = $dream_header_sticky_menu_item_color['color'];
	} else {
		$dream_scss_variables['fw-header-sticky-menu-item-color-lvl1'] = $dream_color_settings[ $dream_header_sticky_menu_item_color['id'] ];
	}

	// sticky header menu hover color lvl 1
	$dream_header_sticky_menu_item_color_hover = $dream_header_settings['enable_sticky_header']['fw-sticky-header']['menu_item_color_hover'];
	if ( $dream_header_sticky_menu_item_color_hover['id'] == 'fw-custom' ) {
		$dream_scss_variables['fw-header-sticky-menu-item-hover-color-lvl1'] = $dream_header_sticky_menu_item_color_hover['color'];
	} else {
		$dream_scss_variables['fw-header-sticky-menu-item-hover-color-lvl1'] = $dream_color_settings[ $dream_header_sticky_menu_item_color_hover['id'] ];
	}
}

// title bar title typography
if ( isset( $dream_title_bar_settings['title_bar_title_typography'] ) ) {
	$font_styles = dream_get_font_array( $dream_title_bar_settings['title_bar_title_typography']['typography'], $dream_color_settings );

	$dream_scss_variables['fw-title-bar-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-title-bar-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-title-bar-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-title-bar-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $dream_scss_variables['fw-title-bar-color'] = $font_styles['color'] : '';
	$dream_scss_variables['fw-title-bar-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-title-bar-font-weight'] = $font_styles['font-weight'];
}

// title bar description typography
if ( isset( $dream_title_bar_settings['title_bar_description_typography'] ) ) {
	$font_styles                                                      = dream_get_font_array( $dream_title_bar_settings['title_bar_description_typography']['typography'], $dream_color_settings );
	$dream_scss_variables['fw-title-bar-description-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-title-bar-description-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-title-bar-description-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-title-bar-description-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $dream_scss_variables['fw-title-bar-description-color'] = $font_styles['color'] : '';
	$dream_scss_variables['fw-title-bar-description-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-title-bar-description-font-weight'] = $font_styles['font-weight'];
}

// breadcrumbs_typography
if ( isset( $dream_title_bar_settings['breadcrumbs_typography'] ) ) {
	$font_styles                                                   = dream_get_font_array( $dream_title_bar_settings['breadcrumbs_typography']['typography'], $dream_color_settings );
	$dream_scss_variables['breadcrumbs-typographyfont-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['breadcrumbs-typographyfont-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['breadcrumbs-typographyfont-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['breadcrumbs-typographyfont-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $dream_scss_variables['breadcrumbs-typographyfont-color'] = $font_styles['color'] : '#333';
	$dream_scss_variables['breadcrumbs-typographyfont-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['breadcrumbs-typographyfont-font-weight'] = $font_styles['font-weight'];

	$dream_scss_variables['breadcrumbs-typographyfont-text-uppercase'] = ( isset( $dream_title_bar_settings['breadcrumbs_typography']['text_uppercase'] ) && $dream_title_bar_settings['breadcrumbs_typography']['text_uppercase'] == 'yes' ) ? 'uppercase' : 'initial';
}

// footer copyright
if ( $page_options_enable == 'fw_enable_page_options' && isset( $dream_typography_page_settings['footer_copyright_typography'] ) ) {
	$font_styles                                          = dream_get_font_array( $dream_typography_page_settings['footer_copyright_typography'], $dream_color_settings );
	$dream_scss_variables['fw-copyright-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-copyright-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-copyright-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-copyright-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $dream_scss_variables['fw-copyright-text-color'] = $font_styles['color'] : '';
	$dream_scss_variables['fw-copyright-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-copyright-font-weight'] = $font_styles['font-weight'];
} elseif ( isset( $dream_typography_settings['footer_copyright_typography'] ) ) {
	$font_styles                                          = dream_get_font_array( $dream_typography_settings['footer_copyright_typography'], $dream_color_settings );
	$dream_scss_variables['fw-copyright-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-copyright-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-copyright-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-copyright-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $dream_scss_variables['fw-copyright-text-color'] = $font_styles['color'] : '';
	$dream_scss_variables['fw-copyright-font-style']  = $font_styles['font-style'];
	$dream_scss_variables['fw-copyright-font-weight'] = $font_styles['font-weight'];
}

// transform header mobi
$dream_scss_variables['max-width-transform-header-mobi'] = isset( $dream_header_settings['transform_header_mobi'] ) ? $dream_header_settings['transform_header_mobi'] . 'px' : '996px';

// header bg color
if ( isset( $dream_header_settings['header_bg_color']['id'] ) && $dream_header_settings['header_bg_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $dream_header_settings['header_bg_color']['color'] ) ) {
		$dream_scss_variables['fw-menu-bg'] = $dream_header_settings['header_bg_color']['color'];
	}
} elseif ( isset( $dream_header_settings['header_bg_color']['id'] ) ) {
	$dream_scss_variables['fw-menu-bg'] = $dream_color_settings[ $dream_header_settings['header_bg_color']['id'] ];
}

// header menu color
if ( isset( $dream_header_settings['menu_color']['id'] ) && $dream_header_settings['menu_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $dream_header_settings['menu_color']['color'] ) ) {
		$dream_scss_variables['fw-menu-color'] = $dream_header_settings['menu_color']['color'];
	}
} elseif ( isset( $dream_header_settings['menu_color']['id'] ) ) {
	$dream_scss_variables['fw-menu-color'] = $dream_color_settings[ $dream_header_settings['menu_color']['id'] ];
}

// header dropdown bg color
if ( isset( $dream_header_settings['dropdown_bg_color']['id'] ) && $dream_header_settings['dropdown_bg_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $dream_header_settings['dropdown_bg_color']['color'] ) ) {
		$dream_scss_variables['fw-dropdown-bg-color'] = $dream_header_settings['dropdown_bg_color']['color'];
	}
} elseif ( isset( $dream_header_settings['dropdown_bg_color']['id'] ) ) {
	$dream_scss_variables['fw-dropdown-bg-color'] = $dream_color_settings[ $dream_header_settings['dropdown_bg_color']['id'] ];
}

// header dropdown links color
if ( isset( $dream_header_settings['dropdown_links_color']['id'] ) && $dream_header_settings['dropdown_links_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $dream_header_settings['dropdown_links_color']['color'] ) ) {
		$dream_scss_variables['fw-dropdown-text-color'] = $dream_header_settings['dropdown_links_color']['color'];
	}
} elseif ( isset( $dream_header_settings['dropdown_links_color']['id'] ) ) {
	$dream_scss_variables['fw-dropdown-text-color'] = $dream_color_settings[ $dream_header_settings['dropdown_links_color']['id'] ];
}

// header top bar
if ( $dream_header_settings['enable_header_top_bar']['selected_value'] == 'yes' ) {
	// header top bar color
	if ( isset( $dream_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['id'] ) && $dream_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['id'] == 'fw-custom' ) {
		if ( ! empty( $dream_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['color'] ) ) {
			$dream_scss_variables['fw-top-bar-bg'] = $dream_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['color'];
		}
	} elseif ( isset( $dream_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['id'] ) ) {
		$dream_scss_variables['fw-top-bar-bg'] = $dream_color_settings[ $dream_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['id'] ];
	}
}

if ( isset( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] ) && $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] != 'none' ) {
	if ( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] == 'color' && isset( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['id'] ) && $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['color'] ) ) {
			$dream_scss_variables['fw-footer-widgets-bg'] = $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['color'];
		} else {
			// for empty color
			$dream_scss_variables['fw-footer-widgets-bg'] = 'transparent';
		}
	} elseif ( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] == 'color' && isset( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['id'] ) ) {
		$dream_scss_variables['fw-footer-widgets-bg'] = $dream_color_settings[ $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['id'] ];
	} elseif ( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] == 'image' ) {
		if ( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_color']['id'] == 'fw-custom' ) {
			if ( ! empty( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_color']['color'] ) ) {
				$dream_scss_variables['fw-footer-widgets-bg'] = $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_color']['color'];
			} else {
				// for empty color
				$dream_scss_variables['fw-footer-widgets-bg'] = 'transparent';
			}
		} else {
			$dream_scss_variables['fw-footer-widgets-bg'] = $dream_color_settings[ $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_color']['id'] ];
		}

		if ( ! empty( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_image']['data'] ) ) {
			$temp_style = '';
			if ( isset( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_image']['data']['icon'] ) && ! empty( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_image']['data']['icon'] ) ) {
				$dream_scss_variables['fw-footer-widget-bg-image'] = '"' . dream_change_original_link_with_cdn( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_image']['data']['icon'] ) . '"';
			}
			$dream_scss_variables['fw-footer-widget-bg-repeat']   = $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['repeat'];
			$temp_style                                               .= ' ' . $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['bg_position_x'];
			$temp_style                                               .= ' ' . $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['bg_position_y'];
			$dream_scss_variables['fw-footer-widget-bg-position'] = $temp_style;
			$dream_scss_variables['fw-footer-widget-bg-size']     = $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['bg_size'];
		}
	}
} else {
	// background none
	$dream_scss_variables['fw-footer-widgets-bg'] = 'transparent';
}

// titles color
if ( isset( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['id'] ) && $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['color'] ) ) {
		$dream_scss_variables['fw-footer-widgets-title'] = $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['color'];
	}
} elseif ( isset( $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['id'] ) ) {
	$dream_scss_variables['fw-footer-widgets-title'] = $dream_color_settings[ $dream_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['id'] ];
}

// text color
if ( isset( $dream_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['id'] ) && $dream_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $dream_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['color'] ) ) {
		$dream_scss_variables['fw-footer-widgets-text-color'] = $dream_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['color'];
	}
} elseif ( isset( $dream_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['id'] ) ) {
	$dream_scss_variables['fw-footer-widgets-text-color'] = $dream_color_settings[ $dream_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['id'] ];
}

// footer
if ( isset( $dream_footer_settings['footer_bg_color']['id'] ) && $dream_footer_settings['footer_bg_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $dream_footer_settings['footer_bg_color']['color'] ) ) {
		$dream_scss_variables['fw-footer-bar-bg'] = $dream_footer_settings['footer_bg_color']['color'];
	}
} elseif ( isset( $dream_footer_settings['footer_bg_color']['id'] ) ) {
	$dream_scss_variables['fw-footer-bar-bg'] = $dream_color_settings[ $dream_footer_settings['footer_bg_color']['id'] ];
}

// footer padding top & bottom
if ( isset( $dream_footer_settings['copyright_top'] ) && $dream_footer_settings['copyright_top'] != '' ) {
	$dream_scss_variables['fw-footer-bar-padding-top'] = (int) $dream_footer_settings['copyright_top'] . 'px';
}
if ( isset( $dream_footer_settings['copyright_bottom'] ) && $dream_footer_settings['copyright_bottom'] != '' ) {
	$dream_scss_variables['fw-footer-bar-padding-bot'] = (int) $dream_footer_settings['copyright_bottom'] . 'px';
}

// logo width and height
if ( isset( $dream_logo_settings['logo']['image']['image_logo']['attachment_id'] ) && $dream_logo_settings['logo']['image']['image_logo']['attachment_id'] != '' ) {
	$logo_image = wp_get_attachment_image_src( $dream_logo_settings['logo']['image']['image_logo']['attachment_id'], 'full' );
	if ( isset( $logo_image['1'] ) && isset( $logo_image['2'] ) ) {
		$dream_scss_variables['fw-menu-logo-width']  = $logo_image['1'] . 'px';
		$dream_scss_variables['fw-menu-logo-height'] = $logo_image['2'] . 'px';
	}
}

// logo sticky width and height
if ( isset( $dream_header_settings['enable_sticky_header']['fw-sticky-header']['image_logo_sticky']['attachment_id'] ) && $dream_header_settings['enable_sticky_header']['fw-sticky-header']['image_logo_sticky']['attachment_id'] != '' ) {
	$logo_image = wp_get_attachment_image_src( $dream_header_settings['enable_sticky_header']['fw-sticky-header']['image_logo_sticky']['attachment_id'], 'full' );
	if ( isset( $logo_image['1'] ) && isset( $logo_image['2'] ) ) {
		$dream_scss_variables['fw-menu-logo-sticky-width']  = $logo_image['1'] . 'px';
		$dream_scss_variables['fw-menu-logo-sticky-height'] = $logo_image['2'] . 'px';
	}
}

// text logo options
if ( $dream_logo_settings['logo']['selected_value'] == 'text' ) {
	// logo title font
	if ( isset( $dream_logo_settings['logo']['text']['logo_title_font'] ) ) {
		$font_styles                                           = dream_get_font_array( $dream_logo_settings['logo']['text']['logo_title_font'], $dream_color_settings );
		$dream_scss_variables['fw-logo-title-font-family'] = $font_styles['font-family'];
		( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-logo-title-font-size'] = $font_styles['font-size'] : '';
		( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-logo-title-line-height'] = $font_styles['line-height'] : '';
		( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-logo-title-letter-spacing'] = $font_styles['letter-spacing'] : '';
		! empty( $font_styles['color'] ) ? $dream_scss_variables['fw-logo-title-color'] = $font_styles['color'] : '';
		$dream_scss_variables['fw-logo-title-font-style']  = $font_styles['font-style'];
		$dream_scss_variables['fw-logo-title-font-weight'] = $font_styles['font-weight'];
	}

	// logo subtitle font
	if ( isset( $dream_logo_settings['logo']['text']['logo_subtitle_font'] ) ) {
		$font_styles                                              = dream_get_font_array( $dream_logo_settings['logo']['text']['logo_subtitle_font'], $dream_color_settings );
		$dream_scss_variables['fw-logo-subtitle-font-family'] = $font_styles['font-family'];
		( $font_styles['font-size'] != 'px' ) ? $dream_scss_variables['fw-logo-subtitle-font-size'] = $font_styles['font-size'] : '';
		( $font_styles['line-height'] != 'px' ) ? $dream_scss_variables['fw-logo-subtitle-line-height'] = $font_styles['line-height'] : '';
		( $font_styles['letter-spacing'] != 'px' ) ? $dream_scss_variables['fw-logo-subtitle-letter-spacing'] = $font_styles['letter-spacing'] : '';
		! empty( $font_styles['color'] ) ? $dream_scss_variables['fw-logo-subtitle-color'] = $font_styles['color'] : '';
		$dream_scss_variables['fw-logo-subtitle-font-style']  = $font_styles['font-style'];
		$dream_scss_variables['fw-logo-subtitle-font-weight'] = $font_styles['font-weight'];
	}
}

// scroll to top button
if ( isset( $dream_customizer_option['scroll_to_top_styling'] ) ) {
	$color = dream_get_color_palette_color_and_class( $dream_customizer_option['scroll_to_top_styling']['color'], array( 'return_color' => true ) );
	if ( ! empty( $color['color'] ) ) {
		$dream_scss_variables['fw-scroll-to-top-color'] = $color['color'];
	}
}

// color
if ( isset( $dream_color_settings['color_1'] ) && $dream_color_settings['color_1'] != '' ) {
	$dream_scss_variables['theme-color-1'] = $dream_color_settings['color_1'];
}
if ( isset( $dream_color_settings['color_2'] ) && $dream_color_settings['color_2'] != '' ) {
	$dream_scss_variables['theme-color-2'] = $dream_color_settings['color_2'];
}
if ( isset( $dream_color_settings['color_3'] ) && $dream_color_settings['color_3'] != '' ) {
	$dream_scss_variables['theme-color-3'] = $dream_color_settings['color_3'];
}
if ( isset( $dream_color_settings['color_4'] ) && $dream_color_settings['color_4'] != '' ) {
	$dream_scss_variables['theme-color-4'] = $dream_color_settings['color_4'];
}
if ( isset( $dream_color_settings['color_5'] ) && $dream_color_settings['color_5'] != '' ) {
	$dream_scss_variables['theme-color-5'] = $dream_color_settings['color_5'];
}


/**
 * Scss handle
 */
