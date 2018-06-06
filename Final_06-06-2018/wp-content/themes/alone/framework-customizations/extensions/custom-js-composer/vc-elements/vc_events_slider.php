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
		'post_total_items'	=> 3,
		'type'							=> 'recent',
		'taxonomy_ids'			=> '',
		'event_ids'					=> '',
		/* Layout */
		'image_size'				=> 'alone-image-medium',
		'layout'						=> 'default',
    /* Slider Options */
    'items'             => 3,
    'margin'            => 30,
    'loop'              => 0,
    'center'            => 0,
    'stage_padding'     => 0,
    'start_position'    => 0,
    'nav'               => 0,
    'dots'              => 0,
    'slide_by'          => 1,
    'autoplay'          => 0,
    'autoplay_hover_pause'=> 0,
    'autoplay_timeout'  => 5000,
    'smart_speed'       => 250,
    'responsive_table_items'  => 1,
    'responsive_mobile_items' => 1,
    /* Style */
    'el_id'             => '',
    'el_class'          => '',
    'css_item'					=> '',
    'css'               => '',
  ),
  $atts
);
extract($atts); // echo '<pre>'; print_r($atts); echo '</pre>';

$events_data = $self->event_get_posts($atts); // echo '<pre>'; print_r($data); echo '</pre>';

/** Owl options **/
$owl_options = json_encode(array(
  'items'             => (int)$items,
  'margin'            => (int)$margin,
  'loop'              => (int)$loop,
  'center'            => (int)$center,
  'stagePadding'      => (int)$stage_padding,
  'startPosition'     => (int)$start_position,
  'nav'               => (int)$nav,
  'dots'              => (int)$dots,
  'slideBy'           => (int)$slide_by,
  'autoplay'          => (int)$autoplay,
  'autoplayHoverPause'=> (int)$autoplay_hover_pause,
  'autoplayTimeout'   => (int)$autoplay_timeout,
  'smartSpeed'        => (int)$smart_speed,
  'responsive'        => array(
    0   => array(
      'items' => 1,
      'stagePadding' => 0),
    480 => array(
      'items' => (int)$responsive_mobile_items,
      'stagePadding' => 0),
    768 => array(
      'items' => (int)$responsive_table_items,
      'stagePadding' => 0),
		1000 => array(
			'items' => (int)$items,
      'stagePadding' => (int)$stage_padding),
  ),
));
// fix visual builder on frontend
$owl_options = base64_encode($owl_options);

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
		<div class="owl-carousel" data-bears-owl-carousel='<?php echo esc_attr($owl_options); ?>'>
			<?php
      if(count($events_data) > 0):
        foreach($events_data as $item) {
          echo sprintf('<div class="item">%s</div>', $self->_template($layout, $item, $atts));
        }
      else :
        echo sprintf('<div class="item">%s</div>', __('There are no event to display!', 'alone'));
      endif;
      ?>
    </div>
  </div>
</div>
