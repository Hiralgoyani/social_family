<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


if ( ! function_exists( 'fw_theme_ext_portfolio_get_gallery_images' ) ) :
	/**
	 * Get gallery images
	 *
	 * @param integer $post_id
	 */
	function fw_theme_ext_portfolio_get_gallery_images( $post_id = 0 ) {
		if ( 0 === $post_id && null === ( $post_id = get_the_ID() ) ) {
			return array();
		}

		$options = get_post_meta( $post_id, 'fw_options', true );

		return isset( $options['project-gallery'] ) ? $options['project-gallery'] : array();
	}
endif;

if( ! function_exists('alone_get_all_taxomony_portfolio') ) :
	function alone_get_all_taxomony_portfolio($params = array()) {
		$taxonomy = 'fw-portfolio-category';

		$args = array();
		if(isset ($params['hide_empty'])) {
			$args['hide_empty'] = $params['hide_empty'];
		}

		$terms = get_terms($taxonomy, $args);
		// echo '<pre>'; print_r($terms); echo '</pre>';
		return $terms;
	}
endif;

if(! function_exists('alone_builder_filter_taxonomy_portfolio')) :
	/**
	 * alone_builder_filter_taxonomy_portfolio
	 *
	 * @param [array] 		$params
	 * @param [boolean] 	$filter_masonry
	 */
	function alone_builder_filter_taxonomy_portfolio($params = array(), $filter_masonry = false) {
		$terms = alone_get_all_taxomony_portfolio();
		if(empty($terms) || count($terms) <= 0) return;

		$is_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		$classes = array('portfolio-filter-wrap', 'portfolio-filter-button-group');
		/* add custom class */
		if(isset ($params['custom_class'])) $classes[] = $params['custom_class'];

		echo '<div class="'. implode(' ', $classes) .'">';
		echo ($filter_masonry == true) ? '<a href="#" data-filter="*" class="portfolio-filter-item is-active">'. esc_html__('All', 'alone') .'</a>' : '';
		foreach($terms as $term) {
			if(isset($params['in_slug']) && ! empty($params['in_slug'])) {
				$slug_arr = explode(',', $params['in_slug']);
				if(! in_array($term->slug, $slug_arr)) continue;
			}

			$classes = array('portfolio-filter-item');
			if(! empty($is_term) && $is_term->slug == $term->slug)
				$classes[] = 'is-active';
		?>
		<a href="<?php echo esc_attr(get_term_link($term)); ?>" class="<?php echo esc_attr(implode(' ', $classes)); ?>" data-filter=".<?php echo "{$term->slug}"; ?>"><?php echo "{$term->name}"; ?></a>
		<?php
		}
		echo '</div>';
	}
endif;

if ( ! function_exists( 'fw_theme_portfolio_post_taxonomies' ) ) :
	/**
	 * Return portfolio post taxonomies
	 *
	 * @param integer $post_id
	 * @param boolean $return
	 */
	function fw_theme_portfolio_post_taxonomies( $post_id, $return = false ) {

		$taxonomy = 'fw-portfolio-category';
		$terms    = wp_get_post_terms( $post_id, $taxonomy );
		$list     = '';
		$checked  = false;
		foreach ( $terms as $term ) {
			if ( $term->parent == 0 ) {
				// if is checked parent category
				$list .= $term->slug . ', ';
				$checked = true;
			} else {
				$list .= $term->slug . ', ';
				$parent_id = $term->parent;
			}
		}

		if ( ! $checked ) {
			// if is not checked parent category extract this parent
			if ( isset( $parent_id ) ) {
				$term = get_term_by( 'id', $parent_id, $taxonomy );
				$list .= $term->slug . ', ';
			}
		}

		if ( $return ) {
			return $list;
		} else {
			echo "{$list}";
		}
	}
endif;


if ( ! function_exists( 'fw_theme_portfolio_name_taxonomies' ) ) :
	/**
	 * Return portfolio post taxonomies names
	 *
	 * @param integer $post_id
	 * @param boolean $return
	 */
	function fw_theme_portfolio_name_taxonomies( $post_id, $classes = false ) {
		$taxonomy  = 'fw-portfolio-category';
		$terms     = wp_get_post_terms( $post_id, $taxonomy );
		$result 	 = array();

		if(! empty($terms) && count($terms) > 0) :
			foreach ( $terms as $term ) {
				$term_link = get_term_link( $term );
				array_push($result, array(
					'term_link' => $term_link,
					'name'			=> $term->name,
					'slug'			=> $term->slug,
				));
			}
		endif;

		if($classes == true && count($result) > 0) {
			$class_list = array();
			foreach($result as $item) {
				array_push($class_list, $item['slug']);
			}

			$result = implode(' ', $class_list);
		}

		return $result;
	}
endif;


if ( ! function_exists( 'fw_theme_portfolio_filter' ) ) :
	/**
	 * Display portfolio filter
	 *
	 * @param boolean $filter_enabled
	 * @param string $uniqid
	 * @param boolean $isotope
	 */
	function fw_theme_portfolio_filter( $filter_enabled, $uniqid, $isotope = false ) {
		if ( $filter_enabled == 'yes' ) {
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			if ( ! $term ) {
				return; // if term is false
			}
			$taxonomy = $term->taxonomy;
			$term_id  = $term->term_id;
			$children = get_term_children( $term_id, $taxonomy );
			if ( empty( $children ) && $isotope ) {
				return; // if current term hasn't children - don't show filter
			}
			$template_slug   = $term->slug;
			$template_parent = $term->parent;
			$args            = array( 'taxonomy' => $taxonomy );
			$terms           = get_terms( $taxonomy, $args );
			$alone_count   = count( $terms );
			$i               = 0;
			if ( $template_parent == 0 ) {
				$template_parent = $term_id;
			}

			echo '<div class="fw-portfolio-filter">
                <ul id="fw-portfolio-filter-' . $uniqid . '" class="portfolio_filter" data-isotope="'.(int)$isotope.'" data-list-id="fw-portfolio-list-'.$uniqid.'">';
			if ( $alone_count > 0 ) {
				$term_list = $term_view_all = '';
				foreach ( $terms as $term ) {
					$i ++;
					if ( $template_parent != $term->parent ) {
						if ( $term->slug == $template_slug ) {
							$alone_permalink     = get_term_link( $term->slug, $taxonomy );
							$icon          = '';
							$category_icon = fw_get_db_term_option( $term->term_id, $taxonomy, 'category_icon', '' );
							if ( $category_icon != '' ) {
								$icon = '<i class="' . $category_icon . '"></i>';
							}
							$term_view_all .= '<li class="categories-item active" data-category="' . $template_slug . '"><a href="' . $alone_permalink . '">' . $icon . alone_translate($term->name) . '</a></li>';
						} elseif ( $template_parent == $term->term_id ) {
							$alone_permalink     = get_term_link( $term->slug, $taxonomy );
							$icon          = '';
							$category_icon = fw_get_db_term_option( $term->term_id, $taxonomy, 'category_icon', '' );
							if ( $category_icon != '' ) {
								$icon = '<i class="' . $category_icon . '"></i>';
							}
							$term_view_all .= '<li class="categories-item" data-category="' . $term->slug . '"><a href="' . $alone_permalink . '">' . $icon . alone_translate($term->name) . '</a></li>';
						}
					} elseif ( $template_parent == $term->parent ) {
						if ( $term->slug == $template_slug ) {
							$alone_permalink     = get_term_link( $term->slug, $taxonomy );
							$icon          = '';
							$category_icon = fw_get_db_term_option( $term->term_id, $taxonomy, 'category_icon', '' );
							if ( $category_icon != '' ) {
								$icon = '<i class="' . $category_icon . '"></i>';
							}
							$term_list .= '<li class="categories-item active" data-category="' . $template_slug . '"><a href="' . $alone_permalink . '">' . $icon . alone_translate($term->name) . '</a></li>';
						} else {
							$alone_permalink     = get_term_link( $term->slug, $taxonomy );
							$icon          = '';
							$category_icon = fw_get_db_term_option( $term->term_id, $taxonomy, 'category_icon', '' );
							if ( $category_icon != '' ) {
								$icon = '<i class="' . $category_icon . '"></i>';
							}
							$term_list .= '<li class="categories-item" data-category="' . $term->slug . '"><a href="' . $alone_permalink . '">' . $icon . alone_translate($term->name) . '</a></li>';
						}
					}
				}
				echo "{$term_view_all} {$term_list}";
			}
			echo '</ul>
                <a class="prev" id="fw-portfolio-filter-' . esc_attr($uniqid) . '-prev" href="#"><i class="fa"></i></a>
                <a class="next" id="fw-portfolio-filter-' . esc_attr($uniqid) . '-next" href="#"><i class="fa"></i></a>
            </div>';
		}
	}
endif;

if ( ! function_exists( 'alone_get_portfolio' ) ):
	/**
	 *  Generate array portfolio with:
	 *
	 * @param [string] 		$orderby 				: post_date, post_title
	 * @param [string] 		$order 					: DESC, applySelectorClass
	 * @param [int] 			$items 					: post per page (default 4)
	 * @param [string] 		$post_type 			: fw-portfolio
	 * @param [slug, ID] 	$category				: //
	 * @param [int] 			$excerpt_length : default 10
	 */
	function alone_get_portfolio( $args = null ) {
		$defaults = array(
			'orderby'             => 'post_date', // post_date,
			'order'             	=> 'DESC', // ASC, DESC
			'items'               => 4,
			'post_type'           => 'fw-portfolio',
			'category'            => '',
			'date_format'         => 'F jS, Y',
			'image_size'			 		=> 'medium_large',
			'image_default'	 			=> get_template_directory_uri() . '/assets/images/image-default.jpg',
		);

		extract( wp_parse_args( $args, $defaults ) );
		global $post;
		$bt_cat_slug = ( ! empty( $category ) ) ? $category : '';
		$query_data = array(
			'post_type'      => $post_type,
			'orderby'        => $orderby,
			'order '         => $order,
			// 'category_name'  => $bt_cat_slug,
			'posts_per_page' => $items,
		);

		/* taxonomy */
		$bt_cat_slug = trim($bt_cat_slug);
		if(! empty($bt_cat_slug)) {
			$cat_arr = explode(',', $bt_cat_slug);
			$query_data['tax_query'] = array(
				'relation' => 'OR',
				// array(
				// 	'taxonomy' => 'fw-portfolio-category',
				// 	'field'    => 'slug',
				// 	'terms'    => explode(',', $bt_cat_slug),
				// )
			);
			if(count($cat_arr) > 0) {
				foreach($cat_arr as $cat_item) {
					array_push($query_data['tax_query'], array(
						'taxonomy' => 'fw-portfolio-category',
						'field'    => 'slug',
						'terms'    => trim($cat_item),
					));
				}
			}
		}

		$query = new WP_Query($query_data);
		$posts = $query->get_posts();

		$bt_post_option = array();
		$alone_count = 0;
		if ( ! empty( $posts ) ) {
			foreach ( $posts as $post_elm ) {
				setup_postdata( $post_elm );
				$post_thumbnail_id = get_post_thumbnail_id( $post_elm->ID );
				$post_thumbnail    = wp_get_attachment_image_src( $post_thumbnail_id, $image_size );
				$post_image_full   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
				$time_format  		 = apply_filters( '_filter_portfolio_time_format', $date_format );

				/* post data */
				$bt_post_item 													= array();
				$bt_post_item['ID'] 										= $post_elm->ID;
				$bt_post_item['thumbnail'] 							= ! empty( $post_thumbnail ) ? $post_thumbnail[0] : $image_default;
				$bt_post_item['image_full'] 						= ! empty( $post_image_full ) ? $post_image_full[0] : $image_default;
				$bt_post_item['date_post'] 							= get_the_time( $time_format, $post_elm->ID );
				$bt_post_item['post_title']        			= get_the_title( $post_elm->ID );
				$bt_post_item['post_link']         			= get_permalink( $post_elm->ID );
				$bt_post_item['post_author_link']  			= get_author_posts_url( get_the_author_meta( 'ID' ) );
				$bt_post_item['post_author_name']  			= get_the_author();
				$bt_post_item['post_comment_numb'] 			= get_comments_number( $post_elm->ID );
				$bt_post_item['post_excerpt']      			= ( isset( $post_elm ) ) ? get_the_excerpt( $post_elm->ID ) : '';
				$bt_post_item['post_taxonomy']      		= ( isset( $post_elm ) ) ? fw_theme_portfolio_name_taxonomies( $post_elm->ID ) : '';
				$bt_post_item['post_taxonomy_classes'] 	= ( isset( $post_elm ) ) ? fw_theme_portfolio_name_taxonomies( $post_elm->ID, true ) : '';

				/* pust item */
				array_push($bt_post_option, $bt_post_item);
			}
			wp_reset_postdata();
		}

		return $bt_post_option;
	}
endif;
