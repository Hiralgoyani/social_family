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
    'content'           => '►',
    'href'              => '#',
    'width'             => 100,
    'height'            => 100,
    'color_1'           => '#36DFE7',
    'color_2'           => '#8F17E1',
    'color_3'           => '#BF09E6',
    'text_color'        => '#FFFFFF',
    'align'             => 'center',
    'action'            => '',
    /* Style */
    'el_id'             => '',
    'el_class'          => '',
    'css'               => '',
  ),
  $atts
);
extract($atts); // echo '<pre>';print_r($atts);echo '</pre>';

$content = wpb_js_remove_wpautop($content, true);

/**
 * @var $css_class
 */
extract( $self->getStyles( $el_class, $css, $atts ) );

/** elm ID **/
$attr_id = '';
if(! empty($el_id)) { $attr_id = "id='{$el_id}'"; }

$liquid_button_attr = array(
  'class' => 'liquid-button-svg',
  'data-width' => (int) $width,
  'data-height' => (int) $height,
  'data-color1' => $color_1,
  'data-color2' => $color_2,
  'data-color3' => $color_3,
  'data-liquid-button' => '',
);
?>
<div <?php echo esc_attr($attr_id); ?> class="<?php echo esc_attr($css_class); ?> text-<?php echo esc_attr($align); ?>">
  <div class="vc-custom-inner-wrap" <?php echo ($action == 'lightbox') ? 'data-bears-lightgallery' : ''; ?>>
    <a class="liquid-button-link item" href="<?php echo esc_attr($href); ?>">
      <svg <?php echo html_build_attributes($liquid_button_attr); ?>></svg>
      <div class="liquid-button-text" style="color: <?php echo esc_attr($text_color); ?>"><?php echo "{$content}"; ?></div>
    </a>
  </div>
</div>
