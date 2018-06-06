<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Params extraction
$atts = shortcode_atts(
  array(
    'self'              => '',
    /* Source */
    'number_posts_show' => 5,
    'data_type'         => 'recent',
    'forms_id'          => '',
    /* Layout Options */
    'image_size'				=> 'alone-image-medium',
    'layout'						=> 'default',
    /* Slider Options */
    'items'             => 1,
    'margin'            => 0,
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
    'css'               => '',
  ),
  $atts
);
extract($atts);

$_args_query = array(
  'post_type'           => 'give_forms',
  'sort'                => $data_type,
  'items'               => $number_posts_show,
  'post_by_id'          => explode(',', $forms_id),
);

/**
 * @ result $posts_data is array post data
 * Innter item
 *    @var post_img [array]
 *    @var post_date_post
 *    @var post_id
 *    @var $post_class
 *    @var $post_title
 *    @var $post_link
 *    @var $post_author_link
 *    @var $post_author_name
 *    @var $post_comment_numb
 *    @var $post_excerpt
 */
$posts_data = alone_get_posts($_args_query);

/**
 * @var $css_class
 */
extract( $self->getStyles( $el_class, $css, $atts ) );

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

/** elm ID **/
$attr_id = '';
if(! empty($el_id)) { $attr_id = "id='{$el_id}'"; }
?>
<div <?php echo esc_attr($attr_id); ?> class="<?php echo esc_attr($css_class); ?>">
  <div class="vc-custom-inner-wrap">
    <div class="owl-carousel" data-bears-owl-carousel='<?php echo esc_attr($owl_options); ?>'>
      <?php
      if(count($posts_data) > 0):
        foreach($posts_data as $item) {
          echo sprintf('<div class="item">%s</div>', $self->_template($layout, $item['post_id'], $atts));
        }
      else :
        echo sprintf('<div class="item">%s</div>', __('There are no posts to display!', 'alone'));
      endif;
      ?>
    </div>
  </div>
</div>
