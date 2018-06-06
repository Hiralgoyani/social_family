<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

// replace default walker
{
    remove_filter('wp_nav_menu_args', '_filter_fw_ext_mega_menu_wp_nav_menu_args');

    /** @internal */
    function _filter_theme_ext_mega_menu_wp_nav_menu_args($args) {
        $args['walker'] = new FW_Ext_Mega_Menu_Custom_Walker();

        return $args;
    }
    add_filter('wp_nav_menu_args', '_filter_theme_ext_mega_menu_wp_nav_menu_args');
}

// the Bears hook
{
	if(!function_exists('_filter_fw_ext_mega_menu_walker_nav_menu_start_el_custom')) :
		/**
		 * nav-menu-template.php L174
		 * Walker_Nav_Menu::start_el
		 *
		 * @param $item_output
		 * @param $item
		 * @param $depth
		 * @param $args
		 * @return string
		 * @internal
		 */
		function _filter_fw_ext_mega_menu_walker_nav_menu_start_el_custom($item_output, $item, $depth, $args) {
			if (!fw_ext_mega_menu_is_mm_item($item)) {
				return $item_output;
			}

			/* html template */
			// <li>
			//     {{ item_output }}
			//     <div>{{ item.description }}</div>
			//     <div class="mega-menu">
			//         <ul class="sub-menu"></ul>
			//     </div>
			// </li>

			// Note that raw description is stored in post_content field.
			$trim_post_content = trim($item->post_content);
			if ($depth > 0 && $trim_post_content) {
				$item_output .= '<div>' . do_shortcode($item->post_content) . '</div>';
			}

			return $item_output;
		}
	endif;
	add_filter('walker_nav_menu_start_el_custom', '_filter_fw_ext_mega_menu_walker_nav_menu_start_el_custom', 10, 4);

	if(!function_exists('_alone_menuitem_filter_content_type_search')) :
		/**
		 * _alone_menuitem_filter_content_type_search
		 *
		 */
		function _alone_menuitem_filter_content_type_search( $content = '', $options ) {
		   	/* check menu item type (default) */
		   	if($options['menu_item_type'] != 'default') return $content;

		   	$content .= '<div class="menu-item-custom-wrap search-form-container">' . get_search_form(false) . '</div>';
		    return $content;
		}
	endif;
	add_filter( 'alone:menuitem:filter:type:search', '_alone_menuitem_filter_content_type_search', 10, 3 );

	if(!function_exists('_alone_menuitem_filter_content_type_button_donate')) :
		/**
		 * _alone_menuitem_filter_content_type_search
		 *
		 */
		function _alone_menuitem_filter_content_type_button_donate( $content = '', $options ) {
		   	/* check menu item type (default) */
		   	if($options['menu_item_type'] != 'default') return $content;

				if (class_exists('Give')) :
					$button_donate_opts = fw_akg('menu_type/button_donate', $options);
					$form_id = fw_akg('form_id/0', $button_donate_opts);
					$button_title = fw_akg('button_title', $button_donate_opts);

					$variables = array(
						'{form_id}' => fw_akg('form_id/0', $button_donate_opts),
						'{button_title}' => fw_akg('button_title', $button_donate_opts),
						'{show_title}' => fw_akg('show_title', $button_donate_opts),
						'{show_goal}' => fw_akg('show_goal', $button_donate_opts),
						'{show_content}' => fw_akg('show_content', $button_donate_opts),
					);

					$shortcode_text = str_replace(array_keys($variables), array_values($variables), '[give_form id="{form_id}" show_title="{show_title}" show_goal="{show_goal}" show_content="{show_content}" display_style="button" continue_button_title="{button_title}"]');
					$content .= do_shortcode($shortcode_text);
				endif;
				
		    return $content;
		}
	endif;
	add_filter( 'alone:menuitem:filter:type:button_donate', '_alone_menuitem_filter_content_type_button_donate', 10, 3 );

	if(!function_exists('_alone_menuitem_filter_content_type_notification_center')) :
		/**
		 * _alone_menuitem_filter_content_type_notification_center
		 *
		 */
		function _alone_menuitem_filter_content_type_notification_center( $content = '', $options ) {
		   	/* check menu item type (default) */
		   	if($options['menu_item_type'] != 'default') return $content;
				$notification_center_opts = fw_akg('menu_type/notification_center', $options);
				$output = array();
				// echo '<pre>'; print_r($notification_center_opts); echo '</pre>';

				/* Search */
				if(fw_akg('search_notification_settings/display', $notification_center_opts) == 'show') :
					$output[] = implode('', array(
						'<div class="notification-center-item">',
							'<a href="#notification-search" class="" data-notification="notification-search">',
								alone_load_icon_v2(fw_akg('search_notification_settings/icon', $notification_center_opts)),
							'</a>',
						'</div>',
					));
				endif;

				/* Login */
				if(fw_akg('login_notification_settings/display', $notification_center_opts) == 'show') :
					$output[] = implode('', array(
						'<div class="notification-center-item">',
							'<a href="#notification-login" class="" data-notification="notification-login">',
								alone_load_icon_v2(fw_akg('login_notification_settings/icon', $notification_center_opts)),
							'</a>',
						'</div>',
					));
				endif;

				/* Cart */
				if(fw_akg('cart_notification_settings/display', $notification_center_opts) == 'show') :
					$output[] = implode('', array(
						'<div class="notification-center-item">',
							'<a href="#notification-cart" class="" data-notification="notification-cart">',
								alone_load_icon_v2(fw_akg('cart_notification_settings/icon', $notification_center_opts)),
								'<span class="notification-cart-total-qtt-dk notification-cart-total-qtt-mb"></span>',
							'</a>',
						'</div>',
					));
				endif;

				return $content . '<div class="notification-center-icon">'. implode('', $output) .'</div>';
		}
	endif;
	add_filter( 'alone:menuitem:filter:type:notification_center', '_alone_menuitem_filter_content_type_notification_center', 10, 3 );

	if(!function_exists('_alone_menuitem_filter_content_type_offcanvasmenu')) :
		/**
		 * _alone_menuitem_filter_content_type_offcanvasmenu
		 *
		 */
		function _alone_menuitem_filter_content_type_offcanvasmenu( $content = '', $options ) {
			/* check menu item type (default) */
		   	if($options['menu_item_type'] != 'default') return $content;

			// check off-canvas menu exist
				$trim_menutype_offcanvas_menu = trim($options['menu_type']['off-cavans-menu']['menu']);
		   	if(!isset($options['menu_type']['off-cavans-menu']['menu']) || empty($trim_menutype_offcanvas_menu)) return;

		   	$menu_slug = trim($options['menu_type']['off-cavans-menu']['menu']);
		   	$args = array(
		   		'menu' => $menu_slug,
		   		'echo' => false,
		   	);
		   	$menu_content = wp_nav_menu($args);
		   	$content .= '<div class="menu-item-custom-wrap off-canvas-menu-wrap">
		   		<span class="off-canvas-menu-closed"><i class="ion-ios-close-empty"></i></span>
		   		<div class="off-canvas-menu-container">
				'. $menu_content .'
				</div>
		   	</div>';
		    return $content;
		}
	endif;
	add_filter( 'alone:menuitem:filter:type:off-cavans-menu', '_alone_menuitem_filter_content_type_offcanvasmenu', 10, 2 );

	if(!function_exists('_alone_menuitem_filter_content_type_html')) :
		/**
		 * _alone_menuitem_filter_content_type_html
		 */
		function _alone_menuitem_filter_content_type_html( $content = '', $options ) {
			/* check menu item type (default) */
		   	if($options['menu_item_type'] != 'default') return $content;

			// echo '<pre>'; print_r($options); echo '</pre>';
			$content .= isset($options['menu_type']['html']['html_content']) ? $options['menu_type']['html']['html_content'] : '';
			return do_shortcode( $content );
		}
	endif;
	add_filter( 'alone:menuitem:filter:type:html', '_alone_menuitem_filter_content_type_html', 10, 2 );

	if(!function_exists('_alone_menuitem_filter_content_type_sidebar')) :
		/**
		 * _alone_menuitem_filter_content_type_sidebar
		 */
		function _alone_menuitem_filter_content_type_sidebar( $content = '', $options ) {
			/* check menu item type (default) */
		   	if($options['menu_item_type'] != 'default') return $content;

			ob_start();
			dynamic_sidebar( $options['menu_type']['sidebar']['sidebar_id'] );
			$sidebar_content = ob_get_clean();

			$content .= '<div class="menu-item-custom-wrap sidebar-container">' . $sidebar_content . '</div>';

	    return $content;
		}
	endif;
	add_filter( 'alone:menuitem:filter:type:sidebar', '_alone_menuitem_filter_content_type_sidebar', 10, 2 );

	if(!function_exists('_alone_megamenuitem_filter_content_type_sidebar')) :
		/**
		 * _alone_megamenuitem_filter_content_type_sidebar
		 *
		 */
		function _alone_megamenuitem_filter_content_type_sidebar( $content = '', $options ) {
			/* check menu item type (default) */
		   	if($options['menu_item_type'] != 'item') return $content;

			ob_start();
			dynamic_sidebar( $options['mega_menu_type']['sidebar']['sidebar_id'] );
			$sidebar_content = ob_get_clean();
			$content .= '<div class="menu-item-custom-wrap sidebar-container">' . $sidebar_content . '</div>';
		  return $content;
		}
	endif;
	add_filter( 'alone:megamenuitem:filter:type:sidebar', '_alone_megamenuitem_filter_content_type_sidebar', 10, 2 );

	if(!function_exists('_alone_menuitem_filter_content_type_woocommerce_mini_cart')) :
		/**
		 * _alone_menuitem_filter_content_type_woocommerce_mini_cart
		 *
		 */
		function _alone_menuitem_filter_content_type_woocommerce_mini_cart( $content = '', $options ) {
			/* check menu item type (default) */
			if($options['menu_item_type'] != 'default') return $content;

			/* extract data */
			extract($options);

			/* get megamenu data */
			$megamenu = fw()->extensions->get( 'megamenu' );

			$icon_class = ''; $content = '';
			if ( $megamenu->show_icon() ) {
				if ( $icon = fw_mega_menu_get_meta( $item, 'icon' ) ) {
					$icon_class = '<i class="' . trim( @$item_link_attributes['class'] . " $icon" ) . '"></i>';
				}
			}

			$array_variable = array(
				'{total_quantity}' => '<span id="bearsthemes_minicart_total_quantity_elem" class="total-qtt">0</span>',
				'{total_price}' => '<span id="bearsthemes_minicart_total_price_elem" class="total-price">$0.00</span>',
			);

			// Make a menu WordPress way
			$content .= $item_link_args->before;
			$content .= '<a ' . fw_attr_to_html( $item_link_attributes ) . '>' . $icon_class . '<span>' . str_replace(array_keys($array_variable), array_values($array_variable), $item_link_title) . '</span>' . '</a>';
			$content .= $item_link_args->after;

			// content mini cart
			$content .= '
			<div class="menu-item-custom-wrap woocommerce-mini-cart-container">
				<!-- <div id="bearsthemes_minicart_products_container_elem" class="minicart-products-container"> -->
				<div class="minicart-products-container bearsthemes_minicart_products_container_elem">
					<div class="widget_shopping_cart_content">
						<ul class="cart_list product_list_widget ">
							<li class="empty">'. esc_html__('No products in the cart!', 'alone') .'</li>
						</ul><!-- end product list -->
					</div>
				</div>
			</div>';

		  return $content;
		}
	endif;
	add_filter( 'alone:menuitem:filter:type:woocommerce-mini-cart', '_alone_menuitem_filter_content_type_woocommerce_mini_cart', 10, 2 );
}
