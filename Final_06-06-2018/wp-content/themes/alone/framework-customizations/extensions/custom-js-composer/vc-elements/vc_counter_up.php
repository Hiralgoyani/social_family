<?php
if ( ! defined('ABSPATH')) {
    die('-1');
}

// Params extraction
$atts = shortcode_atts(
  array(
    'self'              => '',
    'content'           => '',
    /* Source */
    'counter_number'    => '2,846',
    'before_prefix'     => '$',
    'after_prefix'      => '',
    'text_color'        => '#000000',
    'delay'             => '10',
    'time'              => '1000',
    'align'             => 'center',
    'use_theme_fonts'   => '',
    'google_fonts'      => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
		'font_container'    => 'h2',

    /* Style */
    'el_id'             => '',
    'el_class'          => '',
    'css'               => '',
  ),
  $atts
);
extract($atts);
// echo '<pre>';print_r($atts);echo '</pre>';

// This is needed to extract $font_container_data and $google_fonts_data
extract( $self->getAttributes( $atts ) );

$content = wpb_js_remove_wpautop($content, true);

/**
 * @var $css_class
 */
extract( $self->getStyles( $el_class, $css, $google_fonts_data, $font_container_data, $atts ) );

$self->enqueueGoogleFonts($google_fonts_data);

if ( ! empty( $styles ) ) {
	$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
} else {
	$style = '';
}

/** elm ID **/
$attr_id = '';
if(! empty($el_id)) { $attr_id = "id='{$el_id}'"; }

$counteup_data = json_encode(array(
  'delay' => $delay,
  'time' => $time,
));

$variables = array(
  '{tag}'                 => fw_akg('values/tag', $font_container_data),
  '{style_attr}'          => $style,
  '{counter_number}'      => $counter_number,
  '{before_prefix}'       => $before_prefix,
  '{after_prefix}'        => $after_prefix,
);

$templates = array(
  'default' => implode('', array(
    '<{tag} {style_attr}>',
      '{before_prefix}',
      '<span class="counterUp" data-bears-counterup="{counter_number}">',
        '{counter_number}',
      '</span>',
      '{after_prefix}',
    '</{tag}>',
  )),
);

?>
<div <?php echo esc_attr($attr_id); ?> class="<?php echo esc_attr($css_class); ?> text-<?php echo esc_attr($align); ?>">
  <div class="vc-custom-inner-wrap">
    <?php echo str_replace(array_keys($variables), array_values($variables), $templates['default']); ?>
  </div>
</div>
