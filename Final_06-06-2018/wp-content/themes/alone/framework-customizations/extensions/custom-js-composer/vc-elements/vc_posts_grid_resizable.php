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
    'post_type'         => 'post',
    'post_sort'         => 'recent',    /* [post] */
    'post_cat'          => '',          /* [post] */
    'post_total_items'  => 9,           /* [post] */
    'image_gallery_data'=> '',          /* [image_gallery_data] */
    'products_sort'     => '',          /* [products] */
    'products_cat'      => '',          /* [products] */
    'products_total_items' => 9,        /* [products] */
    'give_forms_total_items' => 9,      /* [give_forms] */
    /* Skin */
    'post_skin'         => 'default',   /* [post] */
    'image_gallery_skin' => 'default',  /* [image_gallery_data] */
    'products_skin'     => 'default',   /* [products] */
    'give_forms_skin'   => 'default',   /* [give_forms] */
    /* Grid settings */
    'grid_id'           => '',
    'grid_col'          => 3, 
    'grid_gap'          => 30,
    'cel_height'        => 320,
    'col_in_table'      => 2,
    'col_in_mobi'       => 1,
    /* Style */
    'el_id'             => '',
    'el_class'          => '',
    'css'               => '',
  ),
  $atts
);
extract($atts); // echo '<pre>'; print_r($atts); echo '</pre>';

$grid_name = 'posts_grid_resizable_' . $grid_id;
$current_user = wp_get_current_user();
$sizeMap = alone_gridmap_masonryhybrid_handle('get', $grid_name);
$skin_name = $atts["{$post_type}_skin"]; // echo $skin_name;

/**
 * @var $css_class
 */
extract( $self->getStyles( $el_class, $css, $atts ) );

/** elm ID **/
$attr_id = '';
if(! empty($el_id)) { $attr_id = "id='{$el_id}'"; }

$data = $self->get_data($atts); // echo '<pre>'; print_r($data); echo '</pre>';

$masonry_hybrid_attr = array(
  'class' => 'masonry-hybrid-wrap',
  'data-bears-masonryhybrid' => json_encode(array(
    'col'         => (int) $grid_col,
    'space'       => (int) $grid_gap,
    'responsive'  => array(
      '860' => array('col' => $col_in_table),
      '577' => array('col' => $col_in_mobi),
    ),
  )),
  'data-bears-masonryhybrid-resize' => json_encode(array(
    'celHeight' => (int) $cel_height,
    'grid_name' => $grid_name,
    ($sizeMap) ? 'sizeMap' : '__sizeMap' => $sizeMap,
    'resize' => (user_can( $current_user, 'administrator' )) ? true : false,
  )),
  'data-bears-lightgallery' => json_encode(array(
    'selector'  => '.zoom-item',
		'thumbnail' => true,
  )),
);

$grid_item_attr = array(
  'class' => implode(' ', array('grid-item', "item-skin-{$post_type}-{$skin_name}")),
);
?>
<div <?php echo esc_attr($attr_id); ?> class="<?php echo esc_attr($css_class); ?>">
  <div class="vc-custom-inner-wrap">
    <div <?php echo html_build_attributes($masonry_hybrid_attr); ?>>
      <div class="grid-sizer"></div>
      <div class="gutter-sizer"></div>
      <?php
      if(! empty($data) && is_array($data) && count($data) > 0) :
        foreach($data as $item) :
          echo implode('', array(
            '<div '. html_build_attributes($grid_item_attr) .'>',
              '<div class="grid-item-inner">',
                $self->_template($post_type.':'.$skin_name, $item, $atts),
              '</div>',
            '</div>',
          ));
        endforeach;
      endif;
      ?>
    </div>
  </div>
</div>
