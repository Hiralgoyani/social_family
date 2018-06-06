<?php
/*
Element Description: VC Give Forms Slider
*/

// Element Class
class vcGiveFormsSlider extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        global $__VcShadowWPBakeryVisualComposerAbstract;
        add_action( 'init', array( $this, 'vc_give_forms_slider_mapping' ) );
        $__VcShadowWPBakeryVisualComposerAbstract->addShortCode('vc_give_forms_slider', array( $this, 'vc_give_forms_slider_html' ));
    }

    // Element Mapping
    public function vc_give_forms_slider_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
          array(
            'name' => __('Give Forms Slider', 'alone'),
            'base' => 'vc_give_forms_slider',
            'description' => __('Give forms slider (carousel)', 'alone'),
            'category' => __('Give', 'alone'),
            'icon' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/give-donations-icon.png',
            'params' => array(
              array(
                'type' => 'textfield',
                'heading' => __('Number of Posts to Show', 'alone'),
                'param_name' => 'number_posts_show',
                'value' => '5',
                'admin_label' => true,
                'group' => 'Source',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __( 'Data Type', 'alone' ),
                'param_name' => 'data_type',
                'value' => array(
                  __('Recent', 'alone') => 'recent',
                  __('By ID', 'alone') => 'by_id',
                ),
                'std' => 'recent',
                'description' => __( 'Select a post data type', 'alone' ),
                'admin_label' => true,
                'group' => 'Source',
              ),
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Forms ID', 'alone' ),
                'param_name' => 'forms_id',
                'dependency' => array(
                  'element' => 'data_type',
                  'value' => 'by_id',
                ),
                'value' => '',
                'description' => __('Enter form id you would like show (Ex: 1,2,3).', 'alone'),
                'group' => 'Source',
              ),
              array(
          			'type' => 'el_id',
          			'heading' => __( 'Element ID', 'alone' ),
          			'param_name' => 'el_id',
          			'description' => __( 'Enter element ID .', 'alone' ),
                'group' => 'Source',
              ),
          		array(
          			'type' => 'textfield',
          			'heading' => __( 'Extra class name', 'alone' ),
          			'param_name' => 'el_class',
          			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'alone' ),
                'group' => 'Source',
              ),
              /*** Layout Options ***/
              array(
                'type' => 'dropdown',
                'heading' => __('Image Size', 'alone'),
                'param_name' => 'image_size',
                'value' => array(
                  array('value' => 'thumbnail', 'label' => esc_html__('Thumbnail', 'alone')),
                  array('value' => 'medium', 'label' => esc_html__('Medium', 'alone')),
                  array('value' => 'medium_large', 'label' => esc_html__('Medium Large', 'alone')),
                  array('value' => 'large', 'label' => esc_html__('Large', 'alone')),
                  array('value' => 'alone-image-large', 'label' => esc_html__('Large (1228 x 691)', 'alone')),
                  array('value' => 'alone-image-medium', 'label' => esc_html__('Medium (614 x 346)', 'alone')),
                  array('value' => 'alone-image-small', 'label' => esc_html__('Small (295 x 166)', 'alone')),
                  array('value' => 'alone-image-square-800', 'label' => esc_html__('Square (800 x 800)', 'alone')),
                  array('value' => 'alone-image-square-300', 'label' => esc_html__('Square (300 x 300)', 'alone')),
                ),
                'std' => 'alone-image-medium',
                'description' => __('Select a image size', 'alone'),
                'group' => 'Layout',
              ),
              array(
                'type' => 'vc_image_picker',
                'heading' => __( 'Select Layout', 'alone' ),
                'param_name' => 'layout',
                'value' => array(
                  'default' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/give-forms-slider-default.jpg',
                  'style-1' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/give-forms-slider-layout-2.jpg',
                  'style-2' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/give-forms-slider-layout-3.jpg',
                ),
                'std' => 'default',
                'description' => __('Select a layout display', 'alone'),
                'group' => 'Layout',
              ),
              /*** Slider Options ***/
              array(
                'type' => 'textfield',
                'heading' => __('Items', 'alone'),
                'param_name' => 'items',
                'value' => '1',
                'admin_label' => false,
                'description' => __('The number of items you want to see on the screen.', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Margin', 'alone'),
                'param_name' => 'margin',
                'value' => '0',
                'admin_label' => false,
                'description' => __('margin-right(px) on item.', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Loop', 'alone'),
                'param_name' => 'loop',
                'value' => array(
                  __('Yes', 'alone') => '1',
                  __('No', 'alone') => '0',
                ),
                'std' => '0',
                'description' => __('Infinity loop. Duplicate last and first items to get loop illusion.', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Center', 'alone'),
                'param_name' => 'center',
                'value' => array(
                  __('Yes', 'alone') => '1',
                  __('No', 'alone') => '0',
                ),
                'std' => '0',
                'description' => __('Center item. Works well with even an odd number of items.', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('stagePadding', 'alone'),
                'param_name' => __('stage_padding', 'alone'),
                'value' => '0',
                'description' => __('Padding left and right on stage (can see neighbours).', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('startPosition', 'alone'),
                'param_name' => __('start_position', 'alone'),
                'value' => '0',
                'description' => __('Start position or URL Hash string like `#id`.', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Nav', 'alone'),
                'param_name' => 'nav',
                'value' => array(
                  __('Yes', 'alone') => '1',
                  __('No', 'alone') => '0',
                ),
                'std' => '0',
                'description' => __('Show next/prev buttons.', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Dots', 'alone'),
                'param_name' => 'dots',
                'value' => array(
                  __('Yes', 'alone') => '1',
                  __('No', 'alone') => '0',
                ),
                'std' => '0',
                'description' => __('Show dots navigation.', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('slideBy', 'alone'),
                'param_name' => __('slide_by', 'alone'),
                'value' => 1,
                'description' => __('Navigation slide by x. `page` string can be set to slide by page.', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Autoplay', 'alone'),
                'param_name' => 'autoplay',
                'value' => array(
                  __('Yes', 'alone') => '1',
                  __('No', 'alone') => '0',
                ),
                'std' => '0',
                'description' => __('Autoplay.', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('autoplayHoverPause', 'alone'),
                'param_name' => 'autoplay_hover_pause',
                'value' => array(
                  __('Yes', 'alone') => '1',
                  __('No', 'alone') => '0',
                ),
                'std' => '0',
                'description' => __('Pause on mouse hover.', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('autoplayTimeout', 'alone'),
                'param_name' => 'autoplay_timeout',
                'value' => '5000',
                'description' => __('Autoplay interval timeout.', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('smartSpeed', 'alone'),
                'param_name' => 'smart_speed',
                'value' => '250',
                'description' => __('AutoplaySpeed Calculate. More info to come..', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Table Items', 'alone'),
                'param_name' => 'responsive_table_items',
                'value' => '1',
                'admin_label' => false,
                'description' => __('The number of items you want to see on the table screen.', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Mobile Items', 'alone'),
                'param_name' => 'responsive_mobile_items',
                'value' => '1',
                'admin_label' => false,
                'description' => __('The number of items you want to see on the mobile screen.', 'alone'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'css_editor',
                'heading' => __( 'Css', 'alone' ),
                'param_name' => 'css',
                'group' => __( 'Design options', 'alone' ),
              ),
            ),
          )
        );
    }

    /**
  	 * Parses google_fonts_data and font_container_data to get needed css styles to markup
  	 *
  	 * @param $el_class
  	 * @param $css
  	 * @param $atts
  	 *
  	 * @since 1.0
  	 * @return array
  	 */
    public function getStyles($el_class, $css, $atts) {
      $styles = array();

      /**
  		 * Filter 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG' to change vc_custom_heading class
  		 *
  		 * @param string - filter_name
  		 * @param string - element_class
  		 * @param string - shortcode_name
  		 * @param array - shortcode_attributes
  		 *
  		 * @since 4.3
  		 */
  		$css_class = apply_filters( 'vc_give_forms_slider_filter_class', 'wpb_theme_custom_element wpb_give_forms_slider ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

  		return array(
  			'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
  			'styles' => $styles,
  		);
    }

    public function _variables($form_id = null, $atts = array()) {
      $goal_option = get_post_meta( $form_id, '_give_goal_option', true );
      $form        = new Give_Donate_Form( $form_id );
      $goal        = $form->goal;
      $goal_format = get_post_meta( $form_id, '_give_goal_format', true );
      $income      = $form->get_earnings();
      $color       = get_post_meta( $form_id, '_give_goal_color', true );

      // set color if empty
      if(empty($color)) $color = '#01FFCC';
      $progress = ($goal === 0) ? 0 : round( ( $income / $goal ) * 100, 2 );

      if ( $income >= $goal ) { $progress = 100; }

      // Get formatted amount.
      $income = give_human_format_large_amount( give_format_amount( $income ) );
      $goal = give_human_format_large_amount( give_format_amount( $goal ) );

      $button_donate = implode('', array(
        '<div class="give-button-donate">',
          do_shortcode('[give_form id="'. $form_id .'" show_title="true" show_goal="false" show_content="none" display_style="button"]'),
        '</div>',
      ));

      $variable = array(
        '{id}' => $form_id,
        '{form_title}' => get_the_title($form_id),
        '{form_link}' => get_permalink($form_id),
        '{form_featured_image}' => get_template_directory_uri() . '/assets/images/image-default-2.jpg',
        '{color}' => $color,
        '{author_name}' => get_the_author(),
      	'{date}' => get_the_date(),
        '{donors_count}' => $form->get_sales(),
        '{pricing_text}' => sprintf(
          __('%1$s of %2$s raised', 'alone'),
          '<span class="income">' . apply_filters( 'give_goal_amount_raised_output', give_currency_filter( $income ) ) . '</span>',
          '<span class="goal-text">' . apply_filters( 'give_goal_amount_target_output', give_currency_filter( $goal ) ) . '</span>'),
        '{percentage_text}' => sprintf(
          __( '%s%% funded', 'alone' ),
          '<span class="give-percentage">' . apply_filters( 'give_goal_amount_funded_percentage_output', round( $progress ) ) . '</span>'),

        '{goal_progress_bar_default}' => '',
        '{button_donate}' => $button_donate,
      );

      //Sanity check - ensure form has goal set to output
      if ( empty( $form->ID )
      	|| ( is_singular( 'give_forms' ) && ! give_is_setting_enabled( $goal_option ) )
      	|| ! give_is_setting_enabled( $goal_option )
      	|| $goal == 0
      ) {
      	//

      } else {

        $progressbar_style_default_attr = array(
          'class' => 'give-goal-progress-bar',
          'data-progressbar-svg' => json_encode(array(
            /* source */
            'shape' => 'circle', //'circle',
            'progressValue' => $progress,
            'color' => $color,
            'strokeWidth' => 20,
            'trailColor' => 'rgb(222, 222, 222)',
            'trailWidth' => 3,
            'easing' => 'easeInOut',
            'duration' => 1800,
            'textSetings' => '',
            'animateTransformSettings' => 'show',
            'delay' => 300,
            /* transform */
            'colorTransform' => $color,
            'strokeWidthTransform' => 20,
            /* text */
            'label' => '{percent}%',
            'text_color' => '#fff',
          )),
        );
        $progressbar_style_1_attr = array(
          'class' => 'give-goal-progress-bar',
          'data-progressbar-svg' => json_encode(array(
            /* source */
            'shape' => 'line', //'line',
            'progressValue' => $progress,
            'color' => $color,
            'strokeWidth' => 1,
            'trailColor' => 'rgb(222, 222, 222)',
            'trailWidth' => 1,
            'easing' => 'easeInOut',
            'duration' => 1800,
            'textSetings' => '',
            'animateTransformSettings' => 'show',
            'delay' => 300,
            // 'svgStyleWidth' => '100%',
            // 'svgStyleHeight' => '100%',
            /* transform */
            'colorTransform' => $color,
            'strokeWidthTransform' => 2,
            /* text */
            // 'textSetings' => 'show',
            // 'label' => '{percent}%',
            // 'text_color' => '#fff',
          )),
        );

        $variable['{goal_progress_bar_default}'] = '<div '. html_build_attributes($progressbar_style_default_attr) .'></div>';
        $variable['{goal_progress_bar_style_1}'] = '<div '. html_build_attributes($progressbar_style_1_attr) .'></div>';
      }

      /* check featured image exist */
      if ( has_post_thumbnail($form_id) ) {
        $variable['{form_featured_image}'] = get_the_post_thumbnail_url($form_id, $atts['image_size']);
      }

      return $variable;
    }

    public function _template($temp = 'default', $form_id = null, $atts = array()) {
      $params = $this->_variables($form_id, $atts);

      $output = '';
      $template = array();

      /* layout default */
      $template['default'] = implode('', array(
        '<div class="item-inner give-forms-slider-layout-default">',
          '<div class="featured-image">',
            '<img src="{form_featured_image}" alt="#">',
            '<div class="give-goal-progress-wrap">',
              '{goal_progress_bar_default}',
              '<div class="give-price-wrap">{pricing_text}</div>',
            '</div>',
            // '<a class="readmore-btn" href="{form_link}" title="{form_title}"><span class="ion-ios-arrow-right"></span></a>',
            '{button_donate}',
          '</div>',
          '<div class="entry-content">',
            '<div class="meta-donor">'. __('Donor', 'alone') .' {donors_count}</div>',
            '<a href="{form_link}" class="title-link"><h4 class="title">{form_title}</h4></a>',
            '<div class="extra-meta">',
              '<div class="meta-item meta-author">{author_name}</div>',
              ' / ',
              '<div class="meta-item meta-date">{date}</div>',
            '</div>',
            '<a href="{form_link}" class="readmore-btn">'. __('Read More' , 'alone') .' <span class="ion-ios-arrow-thin-right"></span></a>',
          '</div>',
        '</div>',
      ));

      /* layout style 1 horizontal give forms  */
      $template['style-1'] = implode('', array(
        '<div class="item-inner give-forms-slider-layout-style-1">',
          '<div class="featured-image " style="background: url({form_featured_image}) center center / cover, #9E9E9E;">',
            //'<img src="{form_featured_image}" alt="#">',
            '<a class="readmore-link" href="{form_link}" title="View detail"><span class="ion-ios-arrow-right"></span></a>',
          '</div>',
          '<div class="entry-content ">',
            '<div class="entry-content-inner">',
              '<div class="meta-donor">'. __('Donor', 'alone') .' {donors_count}</div>',
              '<div class="give-goal-progress-wrap">',
                '<div class="give-price-wrap">{pricing_text}</div>',
                '{goal_progress_bar_style_1}',
              '</div>',
              '<a href="{form_link}" class="title-link"><h4 class="title">{form_title}</h4></a>',
              '<div class="extra-meta">',
                '<div class="meta-item meta-author">{author_name}</div>',
                ' / ',
                '<div class="meta-item meta-date">{date}</div>',
              '</div>',
              '<a class="readmore-btn" href="{form_link}" title="{form_title}">'. __('Read More', 'alone') .' <span class="ion-ios-arrow-thin-right"></span></a>',
            '</div>',
          '</div>',
        '</div>',
      ));

      /* style-2 */
      $template['style-2'] = implode('', array(
        '<div class="item-inner give-forms-slider-layout-style-2">',
          '<div class="meta-donor">{donors_count} '. __('Donor', 'alone') .'</div>',
          '<div class="featured-image">',
            '<a href="{form_link}">',
              '<img src="{form_featured_image}" alt="#">',
            '</a>',
          '</div>',
          '<div class="entry-content ">',
            '<div class="entry-content-inner">',
              '<div class="give-goal-progress-wrap">',
                '<div class="give-price-wrap">{pricing_text}</div>',
                '{goal_progress_bar_style_1}',
              '</div>',
              '<a href="{form_link}" class="title-link"><h4 class="title">{form_title}</h4></a>',
              '<div class="entry-bot">',
                '<a class="readmore-btn" href="{form_link}" title="{form_title}">'. __('Read More', 'alone') .' <span class="ion-ios-arrow-thin-right"></span></a>',
                '<div class="extra-meta">',
                  '<div class="meta-item meta-author">{author_name}</div>',
                  ' / ',
                  '<div class="meta-item meta-date">{date}</div>',
                '</div>',
              '</div>',
            '</div>',
          '</div>',
        '</div>',
      ));

      /* layout blog-image */
      $template['block-image'] = implode('', array(

      ));

      $template = apply_filters('vc_give_forms_slider:template', $template);

      return str_replace(array_keys($params), array_values($params), fw_akg($temp, $template));
    }

    // Element HTML
    public function vc_give_forms_slider_html( $atts ) {
      $atts['self'] = $this;
      return fw_render_view(get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements/vc_give_forms_slider.php', array('atts' => $atts), true);
    }

} // End Element Class


// Element Class Init
new vcGiveFormsSlider();
