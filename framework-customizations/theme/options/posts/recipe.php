<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$dream_template_directory = get_template_directory_uri();
$dream_admin_url          = admin_url();

$options            = array(
	'side'              => array(
		'title'    => esc_html__( 'Header Image', 'dream' ),
		'type'     => 'box',
		'context'  => 'side',
		'priority' => 'low',
		'options'  => array(
			'header_image' => array(
				'label' => esc_html__( 'Add Image', 'dream' ),
				'desc'  => esc_html__( 'Upload header image', 'dream' ),
				// 'help'  => esc_html__( '', 'dream' ) . ' <a target="_blank" href="' . $dream_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-portfolio-posts">' . esc_html__( 'Portfolio tab', 'dream' ) . '</a>',
				'type'  => 'upload',
			),
		),
	),
  'gallery'              => array(
		'title'    => esc_html__( 'Gallery Image', 'dream' ),
		'type'     => 'box',
		'context'  => 'side',
		'priority' => 'low',
		'options'  => array(
      'gallery_images' => array(
        'label' => esc_html__( 'Add Image', 'dream' ),
        'desc'  => esc_html__( 'Upload header image', 'dream' ),
        'type'  => 'multi-upload',
      ),
		),
	),
	'video'              => array(
		'title'    => esc_html__( 'Video', 'dream' ),
		'type'     => 'box',
		'context'  => 'side',
		'priority' => 'low',
		'options'  => array(
      'video' => array(
        'label' => esc_html__( 'Add Video Link', 'dream' ),
        'desc'  => '<p>Add video for recipe you can use Vimeo or Youtube</p> Example: <br /><b>Youtube</b>: <u>https://www.youtube.com/watch?v=meBbDqAXago</u><br /><b>Vimeo</b>: <u>https://vimeo.com/1084537</u>',
        'type'  => 'text',
      ),
		),
	),
);
