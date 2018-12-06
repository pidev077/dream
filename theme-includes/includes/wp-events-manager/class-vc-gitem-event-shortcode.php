<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class Vc_Gitem_Event_Shortcode extends WPBakeryShortCode {
	/**
	 * @param $atts
	 * @param null $content
	 *
	 * @return mixed|void
	 */
	protected function content( $atts, $content = null ) {
		$field_key = $label = '';
		/**
		 * @var string $el_class
		 * @var string $source
		 */
		extract( shortcode_atts( array(
			'el_class' => '',
			'source' => '',
		), $atts ) );
		$css_class = 'vc_gitem_event'
		             . ( strlen( $el_class ) ? ' ' . $el_class : '' )
		             . ( strlen( $source ) ? ' vc_gitem_event_' . $source : '' );

		return '<div class="' . esc_attr( $css_class ) . '">'
		       . '{{ event:'.$source.' }}'
		       . '</div>';
	}
}
