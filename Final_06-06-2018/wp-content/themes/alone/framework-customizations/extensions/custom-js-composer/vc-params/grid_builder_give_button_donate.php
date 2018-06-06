<?php
global $__VcShadowWPBakeryVisualComposerAbstract;

if(! function_exists('_alone_vc_element_give_button_donate')) :
  function _alone_vc_element_give_button_donate( $shortcodes ) {
     $shortcodes['vc_give_button_donate'] = array(
       'name' => __( 'Give Button Donate', 'alone' ),
       'base' => 'vc_give_button_donate',
       'icon' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/give-donations-icon.png',
       'category' => __( 'Give (Donations)', 'alone' ),
       'description' => __( 'Show button donate', 'alone' ),
       'post_type' => Vc_Grid_Item_Editor::postType(),
       'params' => array(
          array(
            'type' => 'dropdown',
            'heading' => __('Style', 'alone'),
            'value' => array(
              __('Rounded', 'alone') => 'rounded',
              __('Square', 'alone') => 'square',
              __('Circle', 'alone') => 'circle',
            ),
            'std' => 'rounded',
            'description' => __('Select a style for button', 'alone'),
            'param_name' => 'style',
          ),
          array(
            'type' => 'dropdown',
            'heading' => __('Alignment', 'alone'),
            'value' => array(
              __('Left', 'alone') => 'left',
              __('Right', 'alone') => 'right',
              __('Center', 'alone') => 'center',
            ),
            'std' => 'left',
            'description' => __('Select alignment for button', 'alone'),
            'param_name' => 'alignment',
          ),
          array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'alone' ),
            'param_name' => 'el_class',
            'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'alone' ),
          ),
          /* style */
          array(
            'type' => 'css_editor',
            'heading' => __( 'CSS box', 'alone' ),
            'param_name' => 'css',
            'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'alone' ),
            'group' => __( 'Design Options', 'alone' ),
          ),
       ),
    );
     return $shortcodes;
  }

  add_filter('vc_grid_item_shortcodes', '_alone_vc_element_give_button_donate');
endif;

if(! function_exists('_alone_vc_gitem_template_attribute_give_button_donate') ):
  function _alone_vc_gitem_template_attribute_give_button_donate( $value, $data ) {
     /**
      * @var Wp_Post $post
      * @var string $data
      */

     extract( array_merge( array(
        'post' => null,
        'data' => ''
     ), $data ) );

     // return a template for give_goal_progress variable
     return fw_render_view(
      get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements/vc_grid_item/attributes/give_button_donate.php',
      array(
        'post' => $post,
        'data' => $data
      ),
      true
    );
  }
  add_filter( 'vc_gitem_template_attribute_give_button_donate', '_alone_vc_gitem_template_attribute_give_button_donate', 10, 2 );
endif;

// output function
if(! function_exists('alone_vc_give_button_donate_render')) :
  function alone_vc_give_button_donate_render($atts, $content, $tag) {

    return '{{ give_button_donate:' . http_build_query( (array) $atts ) . ' }}';
  }
  $__VcShadowWPBakeryVisualComposerAbstract->addShortCode('vc_give_button_donate', 'alone_vc_give_button_donate_render');
endif;
