<?php
global $__VcShadowWPBakeryVisualComposerAbstract;

if(! function_exists('_alone_vc_element_give_goal_progress')) :
  function _alone_vc_element_give_goal_progress( $shortcodes ) {
     $shortcodes['vc_give_goal_progress'] = array(
       'name' => __( 'Give Goal Progress', 'alone' ),
       'base' => 'vc_give_goal_progress',
       'icon' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/give-donations-icon.png',
       'category' => __( 'Give (Donations)', 'alone' ),
       'description' => __( 'Show goal progress current form', 'alone' ),
       'post_type' => Vc_Grid_Item_Editor::postType(),
       'params' => array(
         array(
          'type'          => 'checkbox',
          'admin_label'   => true,
          'heading'       => __('Show Text', 'alone'),
          // 'description'   => __('Select to show text', 'alone'),
          'value'         => array(
            __('Select to show text', 'alone') => true
          ),
          'std'           => true,
          'param_name'    => 'show_text',
        ),
        array(
          'type'          => 'checkbox',
          'admin_label'   => true,
          'heading'       => __('Show Bar', 'alone'),
          // 'description'   => __('Select to show text', 'alone'),
          'value'         => array(
           __('Select to show bar', 'alone') => true
          ),
          'std'           => true,
          'param_name'    => 'show_bar',
        ),
        array(
          'type' => 'vc_image_picker',
          'heading' => __( 'Select Layout', 'alone' ),
          'param_name' => 'layout',
          'value' => array(
            'default' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/give-goal-layout-default.jpg',
            'thinbar' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/give-goal-layout-thinbar.jpg',
            'circle' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/give-goal-layout-circle.jpg',
            'heart' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/give-goal-layout-heart.jpg',
            'square' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/give-goal-layout-square.jpg',
            'circle_2' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/give-goal-layout-circle2.jpg',
          ),
          'std' => 'default',
          'description' => __('Select a layout display', 'alone'),
        ),
        array(
          'type' => 'colorpicker',
          'heading' => __( 'Text Color', 'alone' ),
          'param_name' => 'text_color',
          'value' => '', // default dark
          'description' => __( 'Choose text color.', 'alone' ),
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

  add_filter('vc_grid_item_shortcodes', '_alone_vc_element_give_goal_progress');
endif;

if(! function_exists('_alone_vc_gitem_template_attribute_give_goal_progress') ):
  function _alone_vc_gitem_template_attribute_give_goal_progress( $value, $data ) {
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
      get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements/vc_grid_item/attributes/give_goal_progress.php',
      array(
        'post' => $post,
        'data' => $data
      ),
      true
    );
  }
  add_filter( 'vc_gitem_template_attribute_give_goal_progress', '_alone_vc_gitem_template_attribute_give_goal_progress', 10, 2 );
endif;

// output function
if(! function_exists('alone_vc_give_goal_progress_render')) :
  function alone_vc_give_goal_progress_render($atts, $content, $tag) {

    return '{{ give_goal_progress:' . http_build_query( (array) $atts ) . ' }}';
  }
  $__VcShadowWPBakeryVisualComposerAbstract->addShortCode('vc_give_goal_progress', 'alone_vc_give_goal_progress_render');
endif;
