<?php defined( 'FW' ) or die();

// is executed when the extension is first installed
$extensions = array(
    'bears-import-demo' => array(
        'display'     => true,
        'parent'      => null,
        'name'        => __( 'Bears Import Demo', 'dream' ),
        'description' => __( 'This extension lets you import demo content (an extension of Unyson & Bears Backup plugin).', 'dream' ),
        'thumbnail'   => 'https://raw.githubusercontent.com/Huynhhuynh/bears-import-demo/master/images/thumbnail.jpg',
        'download'    => array(
            'source' => 'github',
            'opts'   => array(
                'user_repo' => 'Huynhhuynh/bears-import-demo'
            ),
        ),
    ),
);