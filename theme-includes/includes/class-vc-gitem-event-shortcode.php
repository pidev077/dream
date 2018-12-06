<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
if( class_exists( 'Vc_Manager' ) ) {
	class Vc_Vendor_Event implements Vc_Vendor_Interface {

		/**
		 * Initializing actions when backend/frontend editor renders to enqueue fix-js file
		 * @since 4.3.3
		 */
		public function load() {
			if ( did_action( 'vc-vendor-event-load' ) ) {
				return;
			}
			add_filter( 'vc_grid_item_shortcodes', array(
					$this,
					'mapGridItemShortcodes',
				) );

			do_action( 'vc-vendor-event-load', $this );
		}

		public function mapGridItemShortcodes( array $shortcodes ) {
			require_once get_template_directory().'/theme-includes/includes/wp-events-manager/class-vc-gitem-event-shortcode.php';
			require_once get_template_directory().'/theme-includes/includes/wp-events-manager/grid-item-attributes.php';
			$wc_shortcodes = include get_template_directory().'/theme-includes/includes/wp-events-manager/grid-item-shortcodes.php';
			return $shortcodes + $wc_shortcodes;
		}
	}

	add_action( 'after_setup_theme', 'vc_init_vendor_event' ); // for themes
	function vc_init_vendor_event() {
		if ( did_action( 'vc-vendor-event-load' ) ) {
			return;
		}
		if ( class_exists( 'WPEMS' ) ) {
			$vendor = new Vc_Vendor_Event();
			add_action( 'vc_after_set_mode',
				array(
					$vendor,
					'load',
				) );
		}
	}
}
