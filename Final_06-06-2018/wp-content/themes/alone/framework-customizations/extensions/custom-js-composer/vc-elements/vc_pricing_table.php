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
    'values'            => urlencode( json_encode( array(
      array(
        'graphic_max_width' => 120,
        'heading' => __('Basic', 'alone'),
        'sub_heading' => __('Individual', 'alone'),
        'content_item' => '<p>A simple option but powerful to manage your business</p><p>Email support</p>',
        'featured_column' => '',
        'currency' => '$',
        'price' => '9',
        'interval' => __('Month', 'alone'),
        'show_button' => 'show',
        'button_text' => __('Sign Up', 'alone'),
        'href' => '#',
      ),
      array(
        'graphic_max_width' => 120,
        'heading' => __('Premium', 'alone'),
        'sub_heading' => __('Business', 'alone'),
        'content_item' => '<p>Unlimited product including apps integrations and more features</p><p>Mon-Fri support</p>',
        'featured_column' => 'yes',
        'currency' => '$',
        'price' => '49',
        'interval' => __('Month', 'alone'),
        'show_button' => 'show',
        'button_text' => __('Sign Up', 'alone'),
        'href' => '#',
      ),
      array(
        'graphic_max_width' => 120,
        'heading' => __('Ultimate', 'alone'),
        'sub_heading' => __('Enterprise', 'alone'),
        'content_item' => '<p>A wise choice for companies that want to grow long term</p><p>24/7 support</p>',
        'featured_column' => '',
        'currency' => '$',
        'price' => '99',
        'interval' => __('Month', 'alone'),
        'show_button' => 'show',
        'button_text' => __('Sign Up', 'alone'),
        'href' => '#',
      ),
    ) ) ),
    /* button options */
    'button_type'       => 'rounded',
    'open_link_in_new_tab' => '',
    /* Style */
    'el_id'             => '',
    'el_class'          => '',
    'css'               => '',
  ),
  $atts
);
extract($atts);

/* item slider */
$values = (array) vc_param_group_parse_atts( $values );
$count_item = count($values);

// echo '<pre>'; print_r($values); echo '</pre>';

/**
 * @var $css_class
 */
extract( $self->getStyles( $el_class, $css, $atts ) );

/** elm ID **/
$attr_id = '';
if(! empty($el_id)) { $attr_id = "id='{$el_id}'"; }
?>
<div <?php echo esc_attr($attr_id); ?> class="<?php echo esc_attr($css_class); ?>">
	<div class="vc-custom-inner-wrap pricing-row">
    <?php if(count($count_item) > 0) :
      foreach($values as $item) :
        $graphic_image = fw_akg('graphic_image', $item);

        $temp_variables = array(
          '{graphic_image_utl}' => '',
          '{graphic_max_width}' => fw_akg('graphic_max_width', $item),
          '{heading}'         => fw_akg('heading', $item),
          '{sub_heading}'     => fw_akg('sub_heading', $item),
          '{content_item}'    => fw_akg('content_item', $item),
          '{featured_column}' => fw_akg('featured_column', $item),
          '{currency}'        => fw_akg('currency', $item),
          '{price}'           => fw_akg('price', $item),
          '{interval}'        => fw_akg('interval', $item),
          '{show_button}'     => fw_akg('show_button', $item),
          '{button_text}'     => fw_akg('button_text', $item),
          '{href}'            => fw_akg('href', $item),
          '{button_type}'     => $button_type,
          '{open_link_in_new_tab}' => $open_link_in_new_tab,
        );

        if(! empty($graphic_image)) {
          $graphic_image_data = wp_get_attachment_image_src($graphic_image, 'full');
          $temp_variables['{graphic_image_utl}'] = $graphic_image_data[0];
        }

        echo implode('', array(
          '<div class="pricing-table-item pricing-col-'. $count_item .'">',
            $self->template('default', $temp_variables),
          '</div>',
        ));
      endforeach;
    endif; ?>
  </div>
</div>

<?php unset($atts); ?>
