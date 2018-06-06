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
    'number_posts_show' => 6,
    'data_type'         => 'recent',
    'port_ids'          => '',
    'categories'        => '',
    'display_filter'    => 'no',

    /* Grid settings */
    'grid_col'          => 3,
    'grid_gap'          => 30,
    'col_in_table'      => 2,
    'col_in_mobi'       => 1,

    /* Layout Options */
    'image_size'        => 'alone-image-medium',
    'layout'            => 'default',


    /* Style */
    'el_id'             => '',
    'el_class'          => '',
    'css'               => '',
  ),
  $atts
);
extract($atts);

// echo '<pre>'; print_r($atts); echo '</pre>';

$query = $self->get_data($atts);
// echo '<pre>'; print_r($data); echo '</pre>';

/**
 * @var $css_class
 */
extract( $self->getStyles( $el_class, $css, $atts ) );

$rand_filter_id = 'filter-id-' . rand(9, 999);

$masonry_hybrid_attr = array(
  'class' => 'masonry-hybrid-wrap',
  'data-bears-masonryhybrid' => json_encode(array(
    'col'         => (int) $grid_col,
    'space'       => (int) $grid_gap,
    'filter_selector' => '#' . $rand_filter_id,
    'responsive'  => array(
      '860' => array('col' => $col_in_table),
      '577' => array('col' => $col_in_mobi),
    ),
  )),
  'data-bears-lightgallery' => json_encode(array(
    'selector'  => '.zoom-item',
		'thumbnail' => true,
  )),
);

/** elm ID **/
$attr_id = '';
if(! empty($el_id)) { $attr_id = "id='{$el_id}'"; }


?>
<div <?php echo esc_attr($attr_id); ?> class="<?php echo esc_attr($css_class); ?>">
  <div class="vc-custom-inner-wrap">
    <?php if($display_filter == 'yes') : ?>
      <div class="filter-wrap" id="<?php echo esc_attr($rand_filter_id); ?>">
        <?php echo $self->filter_nav_render($atts); ?>
      </div>
    <?php endif; ?>

    <div <?php echo html_build_attributes($masonry_hybrid_attr); ?>>
      <div class="grid-sizer"></div>
      <div class="gutter-sizer"></div>
      <?php
      if ( $query->have_posts() ) {
      	while ( $query->have_posts() ) {
      		$query->the_post();

          $grid_item_attr = array(
            'class' => implode(' ', array(
              'grid-item',
              "item-skin-{$layout}",
              $self->taxonomy_class_per_post(get_the_ID()),
            )),
          );

          echo implode('', array(
            '<div '. html_build_attributes($grid_item_attr) .'>',
              '<div class="item-inner">',
                $self->_template($layout, get_the_ID(), $atts),
              '</div>',
            '</div>',
          ));
      	}

        wp_reset_postdata();
      }
      ?>
    </div>
  </div>
</div>
