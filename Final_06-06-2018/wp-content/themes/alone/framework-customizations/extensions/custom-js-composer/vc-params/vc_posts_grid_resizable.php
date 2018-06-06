<?php
/*
Element Description: VC Posts Grid Resizable
*/

// Element Class
class vcPostsGridResizable extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        global $__VcShadowWPBakeryVisualComposerAbstract;
        add_action( 'init', array( $this, 'vc_posts_grid_resizable_mapping' ) );
        $__VcShadowWPBakeryVisualComposerAbstract->addShortCode('vc_posts_grid_resizable', array( $this, 'vc_posts_grid_resizable_html' ));
    }

    function get_support_post_types() {
      $post_types = array(
        __('Post (Default)', 'alone') => 'post',
        __('Image Gallery', 'alone') => 'image_gallery',
      );

      /* WooCommerce */
      if(class_exists('WooCommerce')) :
        $post_types[__('Products (WooCommerce)', 'alone')] = 'products';
      endif;

      /* give plugon */
      if (class_exists('Give')) :
        $post_types[__('Give Forms (Give Donations)', 'alone')] = 'give_forms';
      endif;

      return $post_types;
    }

    // Element Mapping
    public function vc_posts_grid_resizable_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
          array(
            'name' => __('Posts Grid Resizable', 'alone'),
            'base' => 'vc_posts_grid_resizable',
            'description' => __('Posts Grid Resizable', 'alone'),
            'category' => __('Theme Elements', 'alone'),
            'icon' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/posts-grid-resizable.png',
            'params' => array(
              /* source */
              array(
                'type' => 'dropdown',
                'heading' => __('Post Type', 'alone'),
                'param_name' => 'post_type',
                'description' => __('Select content type for your grid.', 'alone'),
                'value' => $this->get_support_post_types(),
                'std' => 'post',
                'group' => 'Source',
                'admin_label'   => true,
              ),

              /* start param for post type 'post' */
              array(
                'type' => 'dropdown',
                'heading' => __('Sort', 'alone'),
                'param_name' => 'post_sort',
                'description' => __('Select sort type for data.', 'alone'),
                'value' => array(
                  __('Recent Post', 'alone') => 'recent',
                  __('Popular Post', 'alone') => 'popular',
                  __('Commented', 'alone') => 'commented',
                ),
                'std' => 'recent',
                'dependency' => array(
          				'element' => 'post_type',
          				'value' => 'post',
          			),
                'group' => 'Source',
                // 'admin_label'   => true,
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Category (ID)', 'alone'),
                'param_name' => 'post_cat',
                'value' => '',
                'description' => __('Enter category ID you\'d want to filter (Ex: 9,12,14)', 'alone'),
                'dependency' => array(
          				'element' => 'post_type',
          				'value' => 'post',
          			),
                'group' => 'Source',
                // 'admin_label'   => true,
              ),
              array(
          			'type' => 'textfield',
          			'heading' => __( 'Total Items', 'alone' ),
          			'param_name' => 'post_total_items',
          			'description' => __( 'Set max limit for items in grid or enter -1 to display all (limited to 1000).', 'alone' ),
                'value' => 9,
                'group' => 'Source',
                // 'admin_label'   => true,
                'dependency' => array(
                  'element' => 'post_type',
          				'value' => 'post',
                ),
              ),
              /* end param for post type 'post' */

              /* start param for post type 'image_gallery' */
              array(
              	'type'        => 'attach_images',
              	'heading'     => __( 'Images', 'alone' ),
              	'description' => __( 'Add image gallery.', 'alone' ),
              	'param_name'  => 'image_gallery_data',
              	'value'       => '',
                'dependency' => array(
          				'element' => 'post_type',
          				'value' => 'image_gallery',
          			),
                'group' => 'Source',
                // 'admin_label'   => true,
              ),
              /* end param for post type 'image_gallery' */

              /* start param for post type 'products (woocommerce)' */
              array(
                'type' => 'dropdown',
                'heading' => __('Sort', 'alone'),
                'param_name' => 'products_sort',
                'description' => __('Select sort type for data.', 'alone'),
                'value' => array(
                  __('All products', 'alone') => '',
                  __('Featured Products', 'alone') => 'featured',
                  __('Onsale Products', 'alone') => 'onsale',
                  __('By Category', 'alone') => 'by_category_id',
                ),
                'std' => '',
                'dependency' => array(
          				'element' => 'post_type',
          				'value' => 'products',
          			),
                'group' => 'Source',
                // 'admin_label'   => true,
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Category (ID)', 'alone'),
                'param_name' => 'products_cat',
                'value' => '',
                'description' => __('Enter products category ID you\'d want to filter (Ex: 9,12,14)', 'alone'),
                'dependency' => array(
                  'element' => 'products_sort',
                  'value' => 'by_category_id',
                ),
                'group' => 'Source',
                // 'admin_label'   => true,
              ),
              array(
          			'type' => 'textfield',
          			'heading' => __( 'Total Items', 'alone' ),
          			'param_name' => 'products_total_items',
          			'description' => __( 'Set max limit for items in grid or enter -1 to display all (limited to 1000).', 'alone' ),
                'value' => 9,
                'group' => 'Source',
                // 'admin_label'   => true,
                'dependency' => array(
                  'element' => 'post_type',
          				'value' => 'products',
                ),
              ),
              /* end param for post type 'products (woocommerce)' */

              /* start param for post type 'give_forms (Give Donations)' */
              array(
          			'type' => 'textfield',
          			'heading' => __( 'Total Items', 'alone' ),
          			'param_name' => 'give_forms_total_items',
          			'description' => __( 'Set max limit for items in grid or enter -1 to display all (limited to 1000).', 'alone' ),
                'value' => 9,
                'group' => 'Source',
                // 'admin_label'   => true,
                'dependency' => array(
                  'element' => 'post_type',
          				'value' => 'give_forms',
                ),
              ),
              /* end param for post type 'products (woocommerce)' */

              array(
          			'type' => 'el_id',
          			'heading' => __( 'Element ID', 'alone' ),
          			'param_name' => 'el_id',
          			'description' => __( 'Enter element ID .', 'alone' ),
                'group' => 'Source',
                'admin_label'   => true,
              ),
          		array(
          			'type' => 'textfield',
          			'heading' => __( 'Extra class name', 'alone' ),
          			'param_name' => 'el_class',
          			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'alone' ),
                'group' => 'Source',
                'admin_label'   => true,
              ),
              /* Skin */
              array(
                'type' => 'vc_image_picker',
                'heading' => __( 'Select Skin (Post)', 'alone' ),
                'param_name' => 'post_skin',
                'value' => array(
                  'default' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/post-skin-default.jpg',
                  // 'block-image' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/posts-slider-layout-2.jpg',
                ),
                'std' => 'default',
                'description' => __('Select a skin display for item', 'alone'),
                'group' => 'Skin Settings',
                'dependency' => array(
                  'element' => 'post_type',
          				'value' => 'post',
                ),
              ),
              array(
                'type' => 'vc_image_picker',
                'heading' => __( 'Skin', 'alone' ),
                'param_name' => 'image_gallery_skin',
                'value' => array(
                  'default' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/image-gallery-skin-default.jpg',
                  // 'block-image' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/posts-slider-layout-2.jpg',
                ),
                'std' => 'default',
                'description' => __('Select a skin display for item', 'alone'),
                'group' => 'Skin Settings',
                'dependency' => array(
                  'element' => 'post_type',
          				'value' => 'image_gallery',
                ),
              ),
              array(
                'type' => 'vc_image_picker',
                'heading' => __( 'Skin', 'alone' ),
                'param_name' => 'products_skin',
                'value' => array(
                  'default' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/products-skin-default.jpg',
                  // 'block-image' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/posts-slider-layout-2.jpg',
                ),
                'std' => 'default',
                'description' => __('Select a skin display for item', 'alone'),
                'group' => 'Skin Settings',
                'dependency' => array(
                  'element' => 'post_type',
          				'value' => 'products',
                ),
              ),
              array(
                'type' => 'vc_image_picker',
                'heading' => __( 'Skin', 'alone' ),
                'param_name' => 'give_forms_skin',
                'value' => array(
                  'default' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/give-forms-skin-default.jpg',
                  // 'block-image' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/posts-slider-layout-2.jpg',
                ),
                'std' => 'default',
                'description' => __('Select a skin display for item', 'alone'),
                'group' => 'Skin Settings',
                'dependency' => array(
                  'element' => 'post_type',
          				'value' => 'give_forms',
                ),
              ),
              /* Grid Setings */
              array(
            		'type' => 'el_id',
            		'param_name' => 'grid_id',
            		'settings' => array(
            			'auto_generate' => true,
            		),
            		'heading' => __( 'Grid ID (auto generate)', 'alone' ),
            		'description' => __( 'Enter grid ID.', 'alone' ),
                'group' => 'Grid Settings',
            	),
              array(
                'type' => 'textfield',
                'heading' => __('Columns', 'alone'),
                'param_name' => 'grid_col',
                'description' => __('Enter number items in row', 'alone'),
                'value' => 3,
                'group' => 'Grid Settings',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Gap', 'alone'),
                'param_name' => 'grid_gap',
                'description' => __('Enter number space for each item', 'alone'),
                'value' => 30,
                'group' => 'Grid Settings',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('celHeight', 'alone'),
                'param_name' => 'cel_height',
                'description' => __('Enter number celHeifgt for each item', 'alone'),
                'value' => 320,
                'group' => 'Grid Settings',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Columns In Table (Responsive)', 'alone'),
                'param_name' => 'col_in_table',
                'description' => __('Enter number items in row on table', 'alone'),
                'value' => 2,
                'group' => 'Grid Settings',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Columns In Mobi (Responsive)', 'alone'),
                'param_name' => 'col_in_mobi',
                'description' => __('Enter number items in row on mobi', 'alone'),
                'value' => 1,
                'group' => 'Grid Settings',
              ),
              /* css editor */
              array(
                'type' => 'css_editor',
                'heading' => __( 'Css', 'alone' ),
                'param_name' => 'css',
                'group' => __( 'Design Options general', 'alone' ),
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
  		$css_class = apply_filters( 'vc_posts_grid_resizable_filter_class', 'wpb_theme_custom_element wpb_posts_grid_resizable ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

  		return array(
  			'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
  			'styles' => $styles,
  		);
    }

    public function get_data($atts) {
      $post_type = $atts['post_type'];
      $result = null;

      switch ($post_type) {
        case 'post':
          $args = array(
            'sort' => $atts['post_sort'],
            'items' => $atts['post_total_items'],
            'date_format' => 'l, j, M',
            'category' => $atts['post_cat'],
          );
          $result = alone_get_posts($args);
          break;

        case 'image_gallery':
          $gallery_arr = explode(',', $atts['image_gallery_data']);
          if(is_array($gallery_arr) && count($gallery_arr) > 0) :
            $result = array();
            foreach($gallery_arr as $id) {
              $img_medium_large_data = wp_get_attachment_image_src($id, 'medium_large');
              $img_medium_large = wp_get_attachment_image_src($id, 'large');

              $result[] = array(
                'id' => $id,
                'medium-large' => $img_medium_large_data[0],
                'large' => $img_medium_large[0],
              );
            }
          endif;
          break;

        case 'products':
          if(! class_exists('WooCommerce')){ return; }
          # code...
          $args = array(
            'number' => $atts['products_total_items'],
            'show' => $atts['products_sort'],
          );

          $products_query = alone_get_products($args);
          if ( $products_query->have_posts() ) {
          	$result = $products_query->posts;
          	wp_reset_postdata();
          }

          break;

        case 'give_forms':
          if(! class_exists('Give')){ return; }
          # code...

          $args = array(
            'post_type' => 'give_forms',
            'items' => $atts['give_forms_total_items'],
            'date_format' => 'l, j, M',
          );
          $result = alone_get_posts($args);
          break;
      }

      return $result;
    }

    public function post_variable($post_id) {

      $variable = array(
        '{pid}' => $post_id,
        '{post_title}' => get_the_title($post_id),
        '{post_link}' => get_permalink($post_id),
        '{post_featured_image}' => get_template_directory_uri() . '/assets/images/image-default-2.jpg',
        '{term_list}' => get_the_term_list($post_id, 'category', '<div class="post-term-list">', ',', '</div>'),
      );

      /* check featured image exist */
      if ( has_post_thumbnail($post_id) ) {
        $variable['{post_featured_image}'] = get_the_post_thumbnail_url($post_id, 'medium_large');
      }

      return $variable;
    }

    public function product_variable($product_id, $data) {
      $product = wc_get_product( $product_id );
      $add_to_cart_button = alone_product_add_to_cart_button($product_id, array( 'simple_text' => '<span class="ion-ios-cart"></span>'));

      $variable = array(
        '{id}' => $product_id,
        '{product_featured_image}' => get_template_directory_uri() . '/assets/images/image-default-2.jpg',
        '{product_title}' => $data->post_title,
        '{product_link}' => get_permalink($product_id),
        '{product_excerpt}' => $data->post_excerpt,
        '{term_list}' => get_the_term_list($product_id, 'product_cat', '<div class="post-term-list">', ',', '</div>'),
        '{rating_html}' => wc_get_rating_html( $product->get_average_rating() ),
        '{price_html}' => $product->get_price_html(),
        '{sale_html}' => ($product->is_on_sale()) ? '<div class="product-sale">'. __('Sale!', 'alone') .'</div>' : '',
        '{add_to_cart_html}' => ( $product->is_type( 'simple' ) ) ? $add_to_cart_button : '',
        '{readmore_html}'=> '<a class="button readmore" href="'. get_permalink($product_id) .'" title="'. __('View detail', 'alone') .'"><span class="ion-ios-eye"></span></a>',
      );

      /* check featured image exist */
      if ( has_post_thumbnail($product_id) ) {
        $variable['{product_featured_image}'] = get_the_post_thumbnail_url($product_id, 'medium_large');
      }

      return $variable;
    }

    public function give_forms_variable($form_id) {
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

      $variable = array(
        '{id}' => $form_id,
        '{form_title}' => get_the_title($form_id),
        '{form_link}' => get_permalink($form_id),
        '{form_featured_image}' => get_template_directory_uri() . '/assets/images/image-default-2.jpg',
        '{color}' => $color,
        '{pricing_text}' => sprintf(
          __('%1$s of %2$s raised', 'alone'),
          '<span class="income">' . apply_filters( 'give_goal_amount_raised_output', give_currency_filter( $income ) ) . '</span>',
          '<span class="goal-text">' . apply_filters( 'give_goal_amount_target_output', give_currency_filter( $goal ) ) . '</span>'),
        '{percentage_text}' => sprintf(
          __( '%s%% funded', 'alone' ),
          '<span class="give-percentage">' . apply_filters( 'give_goal_amount_funded_percentage_output', round( $progress ) ) . '</span>'),

        '{goal_progress_bar_default}' => '',
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
            'trailColor' => 'rgba(238,238,238,0.5)',
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

        $variable['{goal_progress_bar_default}'] = '<div '. html_build_attributes($progressbar_style_default_attr) .'></div>';
      }

      /* check featured image exist */
      if ( has_post_thumbnail($form_id) ) {
        $variable['{form_featured_image}'] = get_the_post_thumbnail_url($form_id, 'medium_large');
      }

      return $variable;
    }

    public function _template($temp = '', $item_data = array(), $atts) {
      if(empty($temp)) return;
      $output = '';

      switch ($temp) {
        case 'post:default':
          $variable = $this->post_variable($item_data['post_id']);

          $temp_arr = array(
            '<div class="background-image-backend" style="background: url({post_featured_image}) center center / cover, #333;"></div>',
            '<div class="entry-content">',
              '{term_list}',
              '<a class="title-link" href="{post_link}" title="{post_title}">',
                '<h4 class="title">{post_title}</h4>',
              '</a>',
            '</div>',
            '<a class="readmore" href="{post_link}" title="{post_title}"><span class="ion-ios-arrow-right"></span></a>',
          );

          $output = str_replace(array_keys($variable), array_values($variable), implode('', $temp_arr));
          break;

        case 'image_gallery:default':
          # code...
          $thumb_img = get_post( $item_data['id'] );
          $variable = array(
            '{id}' => $item_data['id'],
            '{medium_large_src}' => $item_data['medium-large'],
            '{large_src}' => $item_data['large'],
            '{description}' => $thumb_img->post_content,
            '{caption}' => $thumb_img->post_excerpt,
          );

          $temp_arr = array(
            '<div class="image-item" style="background: url({medium_large_src}) center center / cover, #333">',
              '<a href="{large_src}" class="zoom-item" title="{description}">',
                '<span class="ion-ios-plus-empty"></span>',
                '<img src="{medium_large_src}" />',
              '</a>',
            '</div>',
          );

          $output = str_replace(array_keys($variable), array_values($variable), implode('', $temp_arr));
          break;

        case 'products:default':
          $variable = $this->product_variable($item_data->ID, $item_data);

          $temp_arr = array(
            '<div class="woocommerce">',
              '<div class="background-image-backend" style="background: url({product_featured_image}) center center / cover, #333;"></div>',
              '{sale_html}',
              '<div class="entry-content">',
                '<a class="title-link" href="{product_link}" title="{product_title}"><h4 class="title">{product_title}</h4></a>',
                '<div class="p-price-wrap">{price_html}</div>',
              '</div>',
              '<div class="entry-button">',
                '{readmore_html}',
                '{add_to_cart_html}',
              '</div>',
              '{rating_html}',
            '</div>',
          );

          $output = str_replace(array_keys($variable), array_values($variable), implode('', $temp_arr));
          unset($variable);
          break;

          case 'give_forms:default':

            $variable = $this->give_forms_variable($item_data['post_id']);

            $temp_arr = array(
              '<div class="background-image-backend" style="background: url({form_featured_image}) center center / cover, #333;"></div>',
              '<div class="entry-progress-bar">',
                '<div class="goal-progress-bar-wrap">',
                  '{goal_progress_bar_default}',
                  '<div class="give-price-wrap">{pricing_text}</div>',
                '</div>',
              '</div>',
              '<div class="entry-content">',
                '<a class="title-link" href="{form_link}" title="{form_title}">',
                  '<h4 class="title">{form_title}</h4>',
                '</a>',
              '</div>',
              '<a class="readmore-btn" href="{form_link}" title="{form_title}"><span class="ion-ios-arrow-right"></span></a>',
            );

            $output = str_replace(array_keys($variable), array_values($variable), implode('', $temp_arr));
            break;
      }

      return $output;
    }

    // Element HTML
    public function vc_posts_grid_resizable_html( $atts, $content ) {
      $atts['self'] = $this;
      $atts['content'] = $content;
      return fw_render_view(get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements/vc_posts_grid_resizable.php', array('atts' => $atts), true);
    }

} // End Element Class


// Element Class Init
new vcPostsGridResizable();
