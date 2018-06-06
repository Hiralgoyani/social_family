<?php
$atts = array();
$form_id = $post->ID;

// * http://php.net/manual/en/function.parse-str.php
parse_str( $data, $atts );

extract( shortcode_atts( array(
  'style' => 'rounded',
  'alignment' => 'left',
  'el_class' => '',
  'css' => '',
), $atts ) );

$_class = implode(' ', array(
  $el_class,
  'give-btn-style-' . $style,
  'give-btn-alignment-' . $alignment,
  apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode(' ', $_class) . ' ' . vc_shortcode_custom_css_class( $css, ' ' ), null, $atts ),
  'custom-give-button-donate',
));
?>
<div class="give-button-donate <?php echo esc_attr($_class); ?>">
  <?php echo do_shortcode('[give_form id="'. $form_id .'" show_title="true" show_goal="false" show_content="none" display_style="button"]'); ?>
</div>
