<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var  string $id
 * @var  array $option
 * @var  array $data
 */

{
	$wrapper_attr = $option['attr'];

	unset(
		$wrapper_attr['value'],
		$wrapper_attr['name']
	);
}

//animation type
$animations = array(
	'animation_seekers'  => array(
		'group'      => esc_html__( 'Attention Seekers', 'dream' ),
		'animations' => array(
			'bounce'     => esc_html__( 'bounce', 'dream' ),
			'flash'      => esc_html__( 'flash', 'dream' ),
			'pulse'      => esc_html__( 'pulse', 'dream' ),
			'rubberBand' => esc_html__( 'rubberBand', 'dream' ),
			'shake'      => esc_html__( 'shake', 'dream' ),
			'swing'      => esc_html__( 'swing', 'dream' ),
			'tada'       => esc_html__( 'tada', 'dream' ),
			'wobble'     => esc_html__( 'wobble', 'dream' ),
			'jello'      => esc_html__( 'jello', 'dream' ),
		)
	),
	'bouncing_entrances' => array(
		'group'      => esc_html__( 'Bouncing Entrances', 'dream' ),
		'animations' => array(
			'bounceIn'      => esc_html__( 'bounceIn', 'dream' ),
			'bounceInDown'  => esc_html__( 'bounceInDown', 'dream' ),
			'bounceInLeft'  => esc_html__( 'bounceInLeft', 'dream' ),
			'bounceInRight' => esc_html__( 'bounceInRight', 'dream' ),
			'bounceInUp'    => esc_html__( 'bounceInUp', 'dream' ),
		)
	),
	'bouncing_exists'    => array(
		'group'      => esc_html__( 'Bouncing Exits', 'dream' ),
		'animations' => array(
			'bounceOut'      => esc_html__( 'bounceOut', 'dream' ),
			'bounceOutDown'  => esc_html__( 'bounceOutDown', 'dream' ),
			'bounceOutLeft'  => esc_html__( 'bounceOutLeft', 'dream' ),
			'rubberBand'     => esc_html__( 'rubberBand', 'dream' ),
			'bounceOutRight' => esc_html__( 'bounceOutRight', 'dream' ),
			'bounceOutUp'    => esc_html__( 'bounceOutUp', 'dream' ),
		)
	),
	'fading_entrances'   => array(
		'group'      => esc_html__( 'Fading Entrances', 'dream' ),
		'animations' => array(
			'fadeIn'         => esc_html__( 'fadeIn', 'dream' ),
			'fadeInDown'     => esc_html__( 'fadeInDown', 'dream' ),
			'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'dream' ),
			'fadeInLeft'     => esc_html__( 'fadeInLeft', 'dream' ),
			'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'dream' ),
			'fadeInRight'    => esc_html__( 'fadeInRight', 'dream' ),
			'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'dream' ),
			'fadeInUp'       => esc_html__( 'fadeInUp', 'dream' ),
			'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'dream' )
		)
	),
	'fading_exists'      => array(
		'group'      => esc_html__( 'Fading Exits', 'dream' ),
		'animations' => array(
			'fadeOut'         => esc_html__( 'fadeOut', 'dream' ),
			'fadeOutDown'     => esc_html__( 'fadeOutDown', 'dream' ),
			'fadeOutDownBig'  => esc_html__( 'fadeOutDownBig', 'dream' ),
			'fadeOutLeft'     => esc_html__( 'fadeOutLeft', 'dream' ),
			'fadeOutLeftBig'  => esc_html__( 'fadeOutLeftBig', 'dream' ),
			'fadeOutRight'    => esc_html__( 'fadeOutRight', 'dream' ),
			'fadeOutRightBig' => esc_html__( 'fadeOutRightBig', 'dream' ),
			'fadeOutUp'       => esc_html__( 'fadeOutUp', 'dream' ),
			'fadeOutUpBig'    => esc_html__( 'fadeOutUpBig', 'dream' )
		)
	),
	'flippers'           => array(
		'group'      => esc_html__( 'Flippers', 'dream' ),
		'animations' => array(
			'flip'           => esc_html__( 'flip', 'dream' ),
			'flipInX'        => esc_html__( 'flipInX', 'dream' ),
			'flipInY'        => esc_html__( 'flipInY', 'dream' ),
			'flipOutX'       => esc_html__( 'flipOutX', 'dream' ),
			'fadeOutLeftBig' => esc_html__( 'flipOutY', 'dream' ),
			'flipOutY'       => esc_html__( 'fadeOutRight', 'dream' )
		)
	),
	'lightspeed'         => array(
		'group'      => esc_html__( 'Lightspeed', 'dream' ),
		'animations' => array(
			'lightSpeedIn'  => esc_html__( 'lightSpeedIn', 'dream' ),
			'lightSpeedOut' => esc_html__( 'lightSpeedOut', 'dream' )
		)
	),
	'rotating_entrances' => array(
		'group'      => esc_html__( 'Rotating Entrances', 'dream' ),
		'animations' => array(
			'rotateIn'          => esc_html__( 'rotateIn', 'dream' ),
			'rotateInDownLeft'  => esc_html__( 'rotateInDownLeft', 'dream' ),
			'rotateInDownRight' => esc_html__( 'rotateInDownRight', 'dream' ),
			'rotateInUpLeft'    => esc_html__( 'rotateInUpLeft', 'dream' ),
			'rotateInUpRight'   => esc_html__( 'rotateInUpRight', 'dream' )
		)
	),
	'rotating_exists'    => array(
		'group'      => esc_html__( 'Rotating Exits', 'dream' ),
		'animations' => array(
			'rotateOut'          => esc_html__( 'rotateOut', 'dream' ),
			'rotateOutDownLeft'  => esc_html__( 'rotateOutDownLeft', 'dream' ),
			'rotateOutDownRight' => esc_html__( 'rotateOutDownRight', 'dream' ),
			'rotateOutUpLeft'    => esc_html__( 'rotateOutUpLeft', 'dream' ),
			'rotateOutUpRight'   => esc_html__( 'rotateOutUpRight', 'dream' )
		)
	),
	'sliding_entrances'  => array(
		'group'      => esc_html__( 'Sliding Entrances', 'dream' ),
		'animations' => array(
			'slideInUp'    => esc_html__( 'slideInUp', 'dream' ),
			'slideInDown'  => esc_html__( 'slideInDown', 'dream' ),
			'slideInLeft'  => esc_html__( 'slideInLeft', 'dream' ),
			'slideInRight' => esc_html__( 'slideInRight', 'dream' )
		)
	),
	'sliding_exists'     => array(
		'group'      => esc_html__( 'Sliding Exits', 'dream' ),
		'animations' => array(
			'slideOutUp'    => esc_html__( 'slideOutUp', 'dream' ),
			'slideOutDown'  => esc_html__( 'slideOutDown', 'dream' ),
			'slideOutLeft'  => esc_html__( 'slideOutLeft', 'dream' ),
			'slideOutRight' => esc_html__( 'slideOutRight', 'dream' )
		)
	),
	'zoom_entrances'     => array(
		'group'      => esc_html__( 'Zoom Entrances', 'dream' ),
		'animations' => array(
			'zoomIn'      => esc_html__( 'zoomIn', 'dream' ),
			'zoomInDown'  => esc_html__( 'zoomInDown', 'dream' ),
			'zoomInLeft'  => esc_html__( 'zoomInLeft', 'dream' ),
			'zoomInRight' => esc_html__( 'zoomInRight', 'dream' ),
			'zoomInUp'    => esc_html__( 'zoomInUp', 'dream' )
		)
	),
	'zoom_exists'        => array(
		'group'      => esc_html__( 'Zoom Exits', 'dream' ),
		'animations' => array(
			'zoomOut'      => esc_html__( 'zoomOut', 'dream' ),
			'zoomOutDown'  => esc_html__( 'zoomOutDown', 'dream' ),
			'zoomOutLeft'  => esc_html__( 'zoomOutLeft', 'dream' ),
			'zoomOutRight' => esc_html__( 'zoomOutRight', 'dream' ),
			'zoomOutUp'    => esc_html__( 'zoomOutUp', 'dream' )
		)
	),
	'specials'           => array(
		'group'      => esc_html__( 'Specials', 'dream' ),
		'animations' => array(
			'hinge'   => esc_html__( 'hinge', 'dream' ),
			'rollIn'  => esc_html__( 'rollIn', 'dream' ),
			'rollOut' => esc_html__( 'rollOut', 'dream' )
		)
	),
);

$animations = apply_filters( 'tf-animate-css', $animations );

?>
<div <?php echo fw_attr_to_html( $wrapper_attr ); ?>>

	<div class="fw-option-tf-animation-option fw-option-tf-animation-option-type fw-border-box-sizing fw-col-sm-8">
		<select data-type="type" name="<?php echo esc_attr( $option['attr']['name'] ) ?>[animation]"
		        class="fw-option-tf-animation-option-type-input">
			<?php foreach ( $animations as $group ): ?>
				<optgroup label="<?php echo esc_attr( $group['group'] ); ?>">

					<?php foreach ( $group['animations'] as $key => $animation ): ?>
						<option
							value="<?php echo esc_attr( $key ); ?>" <?php if($data['value']['animation'] === $key){ echo 'selected="selected" ' } ?>><?php echo esc_html( $animation ); ?></option>
					<?php endforeach; ?>

				</optgroup>
			<?php endforeach; ?>
		</select>
	</div>


	<div class="fw-option-tf-animation-option fw-option-tf-animation-option-delay fw-border-box-sizing fw-col-sm-2">
		<input type="text" name="<?php echo esc_attr( $option['attr']['name'] ) ?>[delay]" id=""
		       class="fw-option fw-option-tf-animation-option-delay-input"
		       value="<?php echo esc_attr($data['value']['delay']); ?>">
	</div>
</div>
