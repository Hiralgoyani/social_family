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
    'heading_text'      => __('Heading text', 'alone'),
    'content_text'      => __('I am featured box. Click edit button to change this text.', 'alone'),
    'heading_color'     => '#222',
    'content_color'     => '#444',
    'graphic'           => 'icon', /* icon or image */
    'icon'              => 'fa fa-archive',
    'image'             => '',
    'graphic_color'     => '#fff',
    'graphic_background_color'  => '#2ECC71',
    'graphic_size'      => 50,
    'graphic_shape'     => 'rounded',
    'horizontal_alignment'  => 'center', /* left or center or right */
    'content_alignment' => 'center',
    'vertical_alignment_horizontal_left' => 'top',
    'vertical_alignment_horizontal_right' => 'top',
		'show_button'				=> '',
		'button_text'				=> 'Read More',
		'href'							=> '#',
		'button_type'				=> 'rounded',
		'open_link_in_new_tab'	=> '',
    /* Style */
    'el_id'             => '',
    'el_class'          => '',
    'css'               => '',
  ),
  $atts
);
extract($atts);
// echo '<pre>'; print_r($atts); echo '</pre>';
/**
 * @var $css_class
 */
extract( $self->getStyles( $el_class, $css, $atts ) );

/** elm ID **/
$attr_id = '';
if(! empty($el_id)) { $attr_id = "id='{$el_id}'"; }

/* params replace for template */
$template_params = array(
  '{icon_html}' 						=> $self->icon_html($atts),
  '{heading_text}' 					=> $heading_text,
  '{content_text}' 					=> $content_text,
  '{heading_color}' 				=> $heading_color,
  '{content_color}' 				=> $content_color,
  '{horizontal_alignment}' 	=> $horizontal_alignment,
  '{content_alignment_class}' => $self->getAlignmentClass($atts),
	'{button_html}'						=> $self->button_html($atts),
);

/* template */
$template = implode('', array(
  '<div class="featured-box-alignment alignment-{horizontal_alignment} {content_alignment_class}">',
    (in_array($horizontal_alignment, array('left', 'center'))) ? '<div class="icon-wrap">{icon_html}</div>' : '',
    '<div class="entry-box-wrap">',
      '<h4 class="featured-box-title" style="color: {heading_color};">{heading_text}</h4>',
      '<div class="featured-box-text" style="color: {content_color};">{content_text}</div>',
			'{button_html}',
    '</div>',
    (in_array($horizontal_alignment, array('right'))) ? '<div class="icon-wrap">{icon_html}</div>' : '',
  '</div>'
));
?>
<div <?php echo esc_attr($attr_id); ?> class="<?php echo esc_attr($css_class); ?>">
  <div class="vc-custom-inner-wrap">
    <?php echo str_replace(array_keys($template_params), array_values($template_params), $template); ?>
  </div>
</div>
