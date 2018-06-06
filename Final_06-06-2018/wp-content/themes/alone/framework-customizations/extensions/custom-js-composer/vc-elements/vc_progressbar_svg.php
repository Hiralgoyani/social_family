<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Params extraction
$atts = shortcode_atts(
  array(
    'self'              => '',
    'content'           => '',
    /* Source */
    'shape'             => 'circle',
    'progress_value'    => 80,
    'color'             => '#00FF85',
    'stroke_width'      => 2,
    'trail_color'       => '#EEEEEE',
    'trail_width'       => 1,
    'duration'          => 1400,
    'easing'            => 'easeInOut',
    'text_setings'      => 'show',
    'animate_transform_settings' => 'show',
    'delay'             => 200,
    /* Transform */
    'color_transform'   => '#32FCEF',
    'stroke_width_transform' => 4,
    /* text */
    'content'           => '{percent}%',
    'text_color'        => '#333',
    /* Style */
    'el_id'             => '',
    'el_class'          => '',
    'css'               => '',
  ),
  $atts
);
extract($atts); // echo '<pre>';print_r($atts);echo '</pre>';

$content = wpb_js_remove_wpautop($content, true);

$progressbar_attr = array(
  'class' => 'progressbar-selector-element' . $shape,
  'data-progressbar-svg' => base64_encode(json_encode(array(
    /* source */
    'shape' => $shape,
    'progressValue' => $progress_value,
    'color' => $color,
    'strokeWidth' => $stroke_width,
    'trailColor' => $trail_color,
    'trailWidth' => $trail_width,
    'easing' => $easing,
    'duration' => $duration,
    'textSetings' => $text_setings,
    'animateTransformSettings' => $animate_transform_settings,
    'delay' => $delay,
    /* transform */
    'colorTransform' => $color_transform,
    'strokeWidthTransform' => $stroke_width_transform,
    /* text */
    'label' => do_shortcode($content),
    'text_color' => $text_color,
  ))),
);

/**
 * @var $css_class
 */
extract( $self->getStyles( $el_class, $css, $atts ) );

/** elm ID **/
$attr_id = '';
if(! empty($el_id)) { $attr_id = "id='{$el_id}'"; }
?>
<div <?php echo esc_attr($attr_id); ?> class="<?php echo esc_attr($css_class); ?>">
  <div class="vc-custom-inner-wrap">
    <div <?php echo html_build_attributes($progressbar_attr); ?>></div>
  </div>
</div>
