<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( ! is_admin() ) {
	$ext_instance       = fw()->extensions->get( 'portfolio' );
	$settings           = $ext_instance->get_settings();
	$ext_name           = $ext_instance->get_name();
	$ext_version        = $ext_instance->manifest->get_version();
	$alone_template_directory = get_template_directory_uri();

	if ( is_tax( $settings['taxonomy_name'] ) || is_post_type_archive( $settings['post_type'] ) ) {

		global $wp_query;
		$max_num_pages = $wp_query->max_num_pages;
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}

		wp_register_script( 'general', $alone_template_directory . '/js/general.js', array( 'jquery' ) );
		// localize ajax_url
		wp_localize_script( 'general', 'BtPhpVars', array(
			'ajax_url'       => admin_url( 'admin-ajax.php' ),
			'paged'          => $paged,
			'max_num_pages'  => $max_num_pages,
			'loading_text'   => esc_html__( 'Loading ...', 'alone' ),
			'load_more_text' => esc_html__( 'Load More', 'alone' ),
			'posts_per_page' => get_option( 'posts_per_page' ),
		) );

	}
}
