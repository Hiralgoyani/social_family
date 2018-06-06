<?php if (!defined('FW')) die('Forbidden');

class FW_Ext_Mega_Menu_Custom_Walker extends Walker_Nav_Menu
{
	/**
	 * Start the element output.
	 *
	 * @see Walker::start_el()
	 *
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 * @param int    $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$style_arr = array();

		// extra options
		$extra_options = array();
		if ($item_type = fw_ext_mega_menu_get_db_item_option($item->ID, 'type')) {
		    $extra_options = fw_ext_mega_menu_get_db_item_option($item->ID, $item_type);
		    $extra_options['menu_item_type'] = $item_type;
		    // echo '<pre>'; print_r($extra_options); echo '</pre>';
		}

		// the Bears custom menu item default
		{
			/**
			 * Menu item type
			 */
			if(isset($extra_options['menu_type']['selected'])) {
				$classes[] = 'menu-item-custom-type-' . $extra_options['menu_type']['selected'];
			}

			/**
			 * Menu item hidden title
			 */
			if(isset($extra_options['hidden_menu_title']) && $extra_options['hidden_menu_title'] == 'yes') {
				$classes[] = 'menu-item-hidden-title-' . $extra_options['hidden_menu_title'];
			}

			/**
			 * Menu item custom class
			 */
			if(isset($extra_options['custom_class'])) {
				$classes[] = $extra_options['custom_class'];
			}

			/**
			 * Menu item custom spacing
			 */
			if(isset($extra_options['custom_spacing']['selected']) && $extra_options['custom_spacing']['selected'] == 'yes') {
				$classes[] = 'menu-item-custom-spacing';

				// left
				if(strlen($extra_options['custom_spacing']['yes']['left']))
					$style_arr[] = 'margin-left: ' . (int) $extra_options['custom_spacing']['yes']['left'] . 'px';

				// right
				if(strlen($extra_options['custom_spacing']['yes']['right']))
					$style_arr[] = 'margin-right: ' . (int) $extra_options['custom_spacing']['yes']['right'] . 'px';
			}
		}

		// the bears custom mega menu item
		{
			// title-off
			if ($depth > 0 && fw_ext_mega_menu_get_meta($item, 'title-off')) {
				$classes[] = 'title-hidden';
			}

			// custom width item mega-menu
			if(isset($extra_options['menu_mega_item_width']) && !empty($extra_options['menu_mega_item_width'])) {
				$style_arr[] = 'width: ' . (int) $extra_options['menu_mega_item_width'] . 'px';
			}

			/**
			 * Mega Menu item type
			 */
			if(isset($extra_options['mega_menu_type']['selected'])) {
				$classes[] = 'mega-menu-item-custom-type-' . $extra_options['mega_menu_type']['selected'];
			}
		}

		$style_attr = ' style="'. esc_attr( implode('; ', $style_arr) ) .'"';

		/**
		 * Filter the CSS class(es) applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filter the ID applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . $style_attr .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		/**
		 * Filter the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

# BEGIN - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		// $item_output = $args->before;
		// $item_output .= '<a'. $attributes .'>';
		// /** This filter is documented in wp-includes/post-template.php */
		// $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		// $item_output .= '</a>';
		// $item_output .= $args->after;
		$title = apply_filters('the_title', $item->title, $item->ID);
		$attributes = array_filter($atts);
		$item_output = fw_ext('megamenu')->render_str('item-link', compact('item', 'attributes', 'title', 'args', 'depth', 'extra_options'));

		/* put extra meta */
		$extra_options['item'] = $item;
		$extra_options['item_link_title'] = $title;
		$extra_options['item_link_attributes'] = $attributes;
		$extra_options['item_link_args'] = $args;

		{
			// the bears custom content menu item
			if(isset($extra_options['menu_type']['selected']) && !empty($extra_options['menu_type']['selected'])) {
				$item_output = apply_filters( 'alone:menuitem:filter:type:' . $extra_options['menu_type']['selected'], $item_output, $extra_options );
			}
		}

		{
			// the bears custom content mega-menu item
			if(isset($extra_options['mega_menu_type']['selected']) && !empty($extra_options['mega_menu_type']['selected'])) {
				// echo "{$extra_options['mega_menu_type']['selected']}";
				$item_output = apply_filters( 'alone:megamenuitem:filter:type:' . $extra_options['mega_menu_type']['selected'], $item_output, $extra_options );
			}
		}
# END - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		/**
		 * Filter a menu item's starting output.
		 *
		 * The menu item's starting output only includes $args->before, the opening <a>,
		 * the menu item's title, the closing </a>, and $args->after. Currently, there is
		 * no filter for modifying the opening and closing <li> for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @see wp_nav_menu()
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item        Menu item data object.
		 * @param int    $depth       Depth of menu item. Used for padding.
		 * @param array  $args        An array of wp_nav_menu() arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el_custom', $item_output, $item, $depth, $args );
	}

	/**
	 * @see Walker::display_element
	 */
	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {

		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];
		$id       = $element->$id_field;

		// extra options
		$extra_options = array();
		if ($item_type = fw_ext_mega_menu_get_db_item_option($id, 'type')) {
		    $extra_options = fw_ext_mega_menu_get_db_item_option($id, $item_type);
		    // echo '<pre>'; print_r($extra_options); echo '</pre>';
		}

		//display this element
		$this->has_children = ! empty( $children_elements[ $id ] );
		if ( isset( $args[0] ) && is_array( $args[0] ) ) {
			$args[0]['has_children'] = $this->has_children; // Backwards compatibility.
		}

		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'start_el'), $cb_args);

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){
# BEGIN - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
				if ($depth == 0 && fw_ext_mega_menu_get_meta($id, 'enabled') && fw_ext_mega_menu_get_meta($child, 'new-row')) {
					if (isset($newlevel) && $newlevel) {
						$cb_args = array_merge( array(&$output, $depth), $args);
						call_user_func_array(array($this, 'end_lvl'), $cb_args);
						unset($newlevel);
					}
				}
# END - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
				if ( !isset($newlevel) ) {
					$newlevel = true;
# BEGIN - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					if (!isset($mega_menu_container) && $depth == 0 && fw_ext_mega_menu_get_meta($id, 'enabled')) {
						$mega_menu_container = apply_filters('fw_ext_mega_menu_container', array(
							'tag'  => 'div',
							'attr' => array( 'class' => 'mega-menu' )
						), array(
							'element' => $element,
							'children_elements' => $children_elements,
							'max_depth' => $max_depth,
							'depth' => $depth,
							'args' => $args,
						));
						$output .= '<'. $mega_menu_container['tag'] .' '. fw_attr_to_html($mega_menu_container['attr']) .'>';
					}

					$classes = array('sub-menu' => true);
					if (isset($mega_menu_container)) {
						if ($this->row_contains_icons($element, $child, $children_elements)) {
							$classes['sub-menu-has-icons'] = true;
						}
						$classes['mega-menu-row'] = true;;
					}
					else {
						if ($this->sub_menu_contains_icons($element, $children_elements)) {
							$classes['sub-menu-has-icons'] = true;
						}
					}
					$classes = apply_filters('fw_ext_mega_menu_start_lvl_classes', $classes, array(
						'element' => $element,
						'children_elements' => $children_elements,
						'max_depth' => $max_depth,
						'depth' => $depth,
						'args' => $args,
						'mega_menu_container' => isset($mega_menu_container) ? $mega_menu_container : false
					));
					$classes = array_filter($classes);
# END - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					//start the child delimiter
# BEGIN - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					//$cb_args = array_merge( array(&$output, $depth), $args);
					$cb_args = array_merge(
						array(&$output, $depth),
						$args,
						array( implode(' ', array_keys($classes)) )
					);

					/* bears - put $extra_options */
					if(count($extra_options) > 0) $cb_args[] = $extra_options;
# END - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					call_user_func_array(array($this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array($this, 'end_lvl'), $cb_args);
		}

# BEGIN - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		if (isset($mega_menu_container)) {
			$output .= '</'. $mega_menu_container['tag'] .'>';
		}
# END - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'end_el'), $cb_args);
	}

	function start_lvl( &$output, $depth = 0, $args = array(), $class = 'sub-menu', $extra_options = array() ) {
		// echo '<pre>'; print_r($extra_options); echo '</pre>';
		$indent = str_repeat("\t", $depth);
		$style_arr = array();

		// bears custom mega-item row
		{
			// sub menu position display class
			if(isset($extra_options['menu_mega_sub_menu_position']))
				$class .= ' ' . $extra_options['menu_mega_sub_menu_position'];

			// custom background
			if(isset($extra_options['menu_mega_background_image']) && !empty($extra_options['menu_mega_background_image']['url'])) {
				$style_arr = array(
					'background: url('. $extra_options['menu_mega_background_image']['url'] .') no-repeat center center / cover'
				);
			}
		}
		$style = implode('; ', $style_arr);

		$output .= "\n$indent<ul class=\"$class\" style=\"$style\">\n";
	}

	protected function sub_menu_contains_icons($element, $children_elements) {
		$id_field = $this->db_fields['id'];
		$id = $element->$id_field;
		foreach ($children_elements[$id] as $child) {
			if (fw_ext_mega_menu_get_meta($child, 'icon')) {
				return true;
			}
		}
		return false;
	}

	protected function row_contains_icons($row, $first_column, $children_elements) {

		$id_field = $this->db_fields['id'];
		$row_id = $row->$id_field;

		reset($children_elements[$row_id]);

		// navigate to $first_column
		while ($child = next($children_elements[$row_id])) {
			if ($child->$id_field == $first_column->$id_field) {
				break;
			}
		}

		// scan row
		while (true) {
			if (fw_ext_mega_menu_get_meta($child, 'icon')) {
				return true;
			}
			$child = next($children_elements[$row_id]);
			if ($child === false || fw_ext_mega_menu_get_meta($child, 'new-row')) {
				break;
			}
		}

		return false;
	}
}
