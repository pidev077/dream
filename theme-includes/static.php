<?php if (!defined('ABSPATH')) {
	die('Direct access forbidden.');
}
/**
 * Include static files: javascript and css
 */

$dream_template_directory = get_template_directory_uri();
if (defined('FW')) {
	$dream_version = fw()->theme->manifest->get_version();
} else {
	$dream_version = '1.0';
}

/**
 * Enqueue scripts and styles for the front end.
 */

// Load jquery
// wp_enqueue_script( 'jquery' );

// jquery ui resizable
wp_enqueue_script( 'jquery-ui-resizable' );

if (is_singular() && comments_open() && get_option('thread_comments')) {
	wp_enqueue_script('comment-reply');
}

// Load bootstrap Css
wp_enqueue_style(
	'bootstrap',
	$dream_template_directory . '/assets/bootstrap/css/bootstrap.css',
	array(),
	$dream_version
);

// Load bootstrap script
wp_enqueue_script(
	'bootstrap',
	$dream_template_directory . '/assets/bootstrap/js/bootstrap.js',
	array( 'jquery' ),
	$dream_version,
	true
);

// Load font-awesome stylesheet.
wp_enqueue_style(
	'font-awesome',
	$dream_template_directory . '/assets/css/font-awesome.css',
	array(),
	$dream_version
);

// Load ionicons stylesheet.
wp_enqueue_style(
	'ionicons',
	$dream_template_directory . '/assets/fonts/ionicons/css/ionicons.min.css',
	array(),
	$dream_version
);

wp_enqueue_script(
	'lazysizes',
	$dream_template_directory . '/assets/js/lazysizes.min.js',
	array('jquery'),
	$dream_version,
	true
);

// Load stellar (parallax session)
wp_enqueue_script(
	'stellar',
	$dream_template_directory . '/assets/js/jquery.stellar.min.js',
	array('jquery'),
	$dream_version,
	true
);

// isotope
wp_enqueue_script(
	'isotope',
	$dream_template_directory . '/assets/js/isotope.pkgd.min.js',
	array(),
	$dream_version,
	true
);

// mousewheel
wp_enqueue_script(
	'mousewheel',
	$dream_template_directory . '/assets/js/jquery.mousewheel.min.js',
	array('jquery'),
	$dream_version,
	true
);

// vimeo player api
wp_enqueue_script(
	'froogaloop2',
	$dream_template_directory . '/assets/js/froogaloop2.min.js',
	array(),
	$dream_version,
	true
);

// lightGallery
wp_enqueue_style(
	'lightGallery',
	$dream_template_directory . '/assets/lightGallery/css/lightgallery.min.css',
	array(),
	$dream_version
);

wp_enqueue_script(
	'lightGallery',
	$dream_template_directory . '/assets/lightGallery/js/lightgallery.min.js',
	array('jquery', 'mousewheel'),
	$dream_version,
	true
);

wp_enqueue_script(
	'lg-zoom',
	$dream_template_directory . '/assets/lightGallery/js/lg-zoom.min.js',
	array('lightGallery'),
	$dream_version,
	true
);

wp_enqueue_script(
	'lg-autoplay',
	$dream_template_directory . '/assets/lightGallery/js/lg-autoplay.min.js',
	array('lightGallery'),
	$dream_version,
	true
);

wp_enqueue_script(
	'lg-thumbnail',
	$dream_template_directory . '/assets/lightGallery/js/lg-thumbnail.min.js',
	array('lightGallery'),
	$dream_version,
	true
);

wp_enqueue_script(
	'lg-video',
	$dream_template_directory . '/assets/lightGallery/js/lg-video.min.js',
	array('lightGallery'),
	$dream_version,
	true
);

wp_enqueue_script(
	'jquery-plugin',
	$dream_template_directory . '/assets/jquery-countdown/jquery.plugin.min.js',
	array('jquery'),
	$dream_version
);
wp_enqueue_script(
	'jquery-countdown',
	$dream_template_directory . '/assets/jquery-countdown/jquery.countdown.min.js',
	array('jquery'),
	$dream_version
);

// owl.carousel 2.1
wp_enqueue_style(
	'owl.carousel',
	$dream_template_directory . '/assets/owl.carousel/assets/owl.carousel.min.css',
	array(),
	$dream_version
);

wp_enqueue_script(
	'owl.carousel',
	$dream_template_directory . '/assets/owl.carousel/owl.carousel.min.js',
	array('jquery'),
	$dream_version,
	true
);

/* tilt */
wp_enqueue_script(
	'tilt',
	$dream_template_directory . '/assets/js/tilt.jquery.min.js',
	array('jquery'),
	$dream_version,
	true
);

/* sweetalert */
wp_enqueue_style(
	'sweetalert',
	$dream_template_directory . '/assets/sweetalert/dist/sweetalert.css',
	array(),
	$dream_version
);
wp_enqueue_script(
	'sweetalert',
	$dream_template_directory . '/assets/sweetalert/dist/sweetalert.min.js',
	array('jquery'),
	$dream_version,
	true
);

//progressbar.min.js
wp_enqueue_script(
	'progressbarjs',
	$dream_template_directory . '/assets/js/progressbar.min.js',
	array('jquery'),
	$dream_version,
	true
);

// jquery.waypoints.js support jquery.counterup.min.js
wp_enqueue_script(
	'waypoints',
	$dream_template_directory . '/assets/js/jquery.waypoints.js',
	array('jquery'),
	$dream_version,
	true
);
// jquery.counterup.min.js
wp_enqueue_script(
	'counterup',
	$dream_template_directory . '/assets/js/jquery.counterup.min.js',
	array('jquery', 'waypoints'),
	$dream_version,
	true
);

// Load animate stylesheet.
wp_enqueue_style(
	'animate',
	$dream_template_directory . '/assets/css/animate.css',
	array(),
	$dream_version
);

// Load our main stylesheet.
wp_enqueue_style(
 'fw-theme-style',
 get_stylesheet_uri(),
 array(),
 $dream_version
);

add_editor_style();

// Load local font
wp_enqueue_style(
	'dream-local-font',
	$dream_template_directory . '/assets/fonts/local-font.css',
	array(),
	$dream_version
);

// Load theme stylesheet.
wp_enqueue_style(
	'dream-theme-style',
	$dream_template_directory . '/assets/css/dream.css',
	array(),
	$dream_version
);

// Load theme script
wp_enqueue_script(
	'dream-theme-script',
	$dream_template_directory . '/assets/js/theme-script.js',
	array( 'jquery' ),
	$dream_version,
	true
);

wp_localize_script('dream-theme-script', 'BtPhpVars', array(
	'ajax_url' => admin_url('admin-ajax.php'),
	'template_directory' => $dream_template_directory,
	'previous' => esc_html__('Previous', 'dream'),
	'next' => esc_html__('Next', 'dream'),
	'smartphone_animations' => function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('enable_smartphone_animations', 'no') : 'no',
	'fail_form_error' => esc_html__('Sorry you are an error in ajax, please contact the administrator of the website', 'dream'),
));
