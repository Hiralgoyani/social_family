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
		'group'      => esc_html__( 'Attention Seekers', 'alone' ),
		'animations' => array(
			'bounce'     => esc_html__( 'bounce', 'alone' ),
			'flash'      => esc_html__( 'flash', 'alone' ),
			'pulse'      => esc_html__( 'pulse', 'alone' ),
			'rubberBand' => esc_html__( 'rubberBand', 'alone' ),
			'shake'      => esc_html__( 'shake', 'alone' ),
			'swing'      => esc_html__( 'swing', 'alone' ),
			'tada'       => esc_html__( 'tada', 'alone' ),
			'wobble'     => esc_html__( 'wobble', 'alone' ),
			'jello'      => esc_html__( 'jello', 'alone' ),
		)
	),
	'bouncing_entrances' => array(
		'group'      => esc_html__( 'Bouncing Entrances', 'alone' ),
		'animations' => array(
			'bounceIn'      => esc_html__( 'bounceIn', 'alone' ),
			'bounceInDown'  => esc_html__( 'bounceInDown', 'alone' ),
			'bounceInLeft'  => esc_html__( 'bounceInLeft', 'alone' ),
			'bounceInRight' => esc_html__( 'bounceInRight', 'alone' ),
			'bounceInUp'    => esc_html__( 'bounceInUp', 'alone' ),
		)
	),
	'bouncing_exists'    => array(
		'group'      => esc_html__( 'Bouncing Exits', 'alone' ),
		'animations' => array(
			'bounceOut'      => esc_html__( 'bounceOut', 'alone' ),
			'bounceOutDown'  => esc_html__( 'bounceOutDown', 'alone' ),
			'bounceOutLeft'  => esc_html__( 'bounceOutLeft', 'alone' ),
			'rubberBand'     => esc_html__( 'rubberBand', 'alone' ),
			'bounceOutRight' => esc_html__( 'bounceOutRight', 'alone' ),
			'bounceOutUp'    => esc_html__( 'bounceOutUp', 'alone' ),
		)
	),
	'fading_entrances'   => array(
		'group'      => esc_html__( 'Fading Entrances', 'alone' ),
		'animations' => array(
			'fadeIn'         => esc_html__( 'fadeIn', 'alone' ),
			'fadeInDown'     => esc_html__( 'fadeInDown', 'alone' ),
			'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'alone' ),
			'fadeInLeft'     => esc_html__( 'fadeInLeft', 'alone' ),
			'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'alone' ),
			'fadeInRight'    => esc_html__( 'fadeInRight', 'alone' ),
			'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'alone' ),
			'fadeInUp'       => esc_html__( 'fadeInUp', 'alone' ),
			'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'alone' )
		)
	),
	'fading_exists'      => array(
		'group'      => esc_html__( 'Fading Exits', 'alone' ),
		'animations' => array(
			'fadeOut'         => esc_html__( 'fadeOut', 'alone' ),
			'fadeOutDown'     => esc_html__( 'fadeOutDown', 'alone' ),
			'fadeOutDownBig'  => esc_html__( 'fadeOutDownBig', 'alone' ),
			'fadeOutLeft'     => esc_html__( 'fadeOutLeft', 'alone' ),
			'fadeOutLeftBig'  => esc_html__( 'fadeOutLeftBig', 'alone' ),
			'fadeOutRight'    => esc_html__( 'fadeOutRight', 'alone' ),
			'fadeOutRightBig' => esc_html__( 'fadeOutRightBig', 'alone' ),
			'fadeOutUp'       => esc_html__( 'fadeOutUp', 'alone' ),
			'fadeOutUpBig'    => esc_html__( 'fadeOutUpBig', 'alone' )
		)
	),
	'flippers'           => array(
		'group'      => esc_html__( 'Flippers', 'alone' ),
		'animations' => array(
			'flip'           => esc_html__( 'flip', 'alone' ),
			'flipInX'        => esc_html__( 'flipInX', 'alone' ),
			'flipInY'        => esc_html__( 'flipInY', 'alone' ),
			'flipOutX'       => esc_html__( 'flipOutX', 'alone' ),
			'fadeOutLeftBig' => esc_html__( 'flipOutY', 'alone' ),
			'flipOutY'       => esc_html__( 'fadeOutRight', 'alone' )
		)
	),
	'lightspeed'         => array(
		'group'      => esc_html__( 'Lightspeed', 'alone' ),
		'animations' => array(
			'lightSpeedIn'  => esc_html__( 'lightSpeedIn', 'alone' ),
			'lightSpeedOut' => esc_html__( 'lightSpeedOut', 'alone' )
		)
	),
	'rotating_entrances' => array(
		'group'      => esc_html__( 'Rotating Entrances', 'alone' ),
		'animations' => array(
			'rotateIn'          => esc_html__( 'rotateIn', 'alone' ),
			'rotateInDownLeft'  => esc_html__( 'rotateInDownLeft', 'alone' ),
			'rotateInDownRight' => esc_html__( 'rotateInDownRight', 'alone' ),
			'rotateInUpLeft'    => esc_html__( 'rotateInUpLeft', 'alone' ),
			'rotateInUpRight'   => esc_html__( 'rotateInUpRight', 'alone' )
		)
	),
	'rotating_exists'    => array(
		'group'      => esc_html__( 'Rotating Exits', 'alone' ),
		'animations' => array(
			'rotateOut'          => esc_html__( 'rotateOut', 'alone' ),
			'rotateOutDownLeft'  => esc_html__( 'rotateOutDownLeft', 'alone' ),
			'rotateOutDownRight' => esc_html__( 'rotateOutDownRight', 'alone' ),
			'rotateOutUpLeft'    => esc_html__( 'rotateOutUpLeft', 'alone' ),
			'rotateOutUpRight'   => esc_html__( 'rotateOutUpRight', 'alone' )
		)
	),
	'sliding_entrances'  => array(
		'group'      => esc_html__( 'Sliding Entrances', 'alone' ),
		'animations' => array(
			'slideInUp'    => esc_html__( 'slideInUp', 'alone' ),
			'slideInDown'  => esc_html__( 'slideInDown', 'alone' ),
			'slideInLeft'  => esc_html__( 'slideInLeft', 'alone' ),
			'slideInRight' => esc_html__( 'slideInRight', 'alone' )
		)
	),
	'sliding_exists'     => array(
		'group'      => esc_html__( 'Sliding Exits', 'alone' ),
		'animations' => array(
			'slideOutUp'    => esc_html__( 'slideOutUp', 'alone' ),
			'slideOutDown'  => esc_html__( 'slideOutDown', 'alone' ),
			'slideOutLeft'  => esc_html__( 'slideOutLeft', 'alone' ),
			'slideOutRight' => esc_html__( 'slideOutRight', 'alone' )
		)
	),
	'zoom_entrances'     => array(
		'group'      => esc_html__( 'Zoom Entrances', 'alone' ),
		'animations' => array(
			'zoomIn'      => esc_html__( 'zoomIn', 'alone' ),
			'zoomInDown'  => esc_html__( 'zoomInDown', 'alone' ),
			'zoomInLeft'  => esc_html__( 'zoomInLeft', 'alone' ),
			'zoomInRight' => esc_html__( 'zoomInRight', 'alone' ),
			'zoomInUp'    => esc_html__( 'zoomInUp', 'alone' )
		)
	),
	'zoom_exists'        => array(
		'group'      => esc_html__( 'Zoom Exits', 'alone' ),
		'animations' => array(
			'zoomOut'      => esc_html__( 'zoomOut', 'alone' ),
			'zoomOutDown'  => esc_html__( 'zoomOutDown', 'alone' ),
			'zoomOutLeft'  => esc_html__( 'zoomOutLeft', 'alone' ),
			'zoomOutRight' => esc_html__( 'zoomOutRight', 'alone' ),
			'zoomOutUp'    => esc_html__( 'zoomOutUp', 'alone' )
		)
	),
	'specials'           => array(
		'group'      => esc_html__( 'Specials', 'alone' ),
		'animations' => array(
			'hinge'   => esc_html__( 'hinge', 'alone' ),
			'rollIn'  => esc_html__( 'rollIn', 'alone' ),
			'rollOut' => esc_html__( 'rollOut', 'alone' )
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
							value="<?php echo esc_attr( $key ); ?>" <?php echo ($data['value']['animation'] === $key) ? ' selected="selected" ' : ''; ?>><?php echo esc_html( $animation ); ?></option>
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
