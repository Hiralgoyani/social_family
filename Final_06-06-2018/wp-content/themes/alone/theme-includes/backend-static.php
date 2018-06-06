<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}
/**
 * Include static files: javascript and css
 */

$alone_template_directory = get_template_directory_uri();
// include media
wp_enqueue_media();

$TBFW = defined( 'FW' );   if ($TBFW ) {
    $alone_version = fw()->theme->manifest->get_version();
} else {
    $alone_version = '1.0';
}

wp_enqueue_style(
	'css-theme-admin',
	$alone_template_directory . '/assets/css/theme-admin.css',
	array(),
    $alone_version
);

if( is_rtl() ) {
	wp_enqueue_style(
		'css-admin-rtl',
		$alone_template_directory . '/assets/css/admin-rtl.css',
		array(),
        $alone_version
	);
}

wp_enqueue_script(
	'js-theme-admin',
	$alone_template_directory . '/assets/js/theme-admin.js',
	array( 'jquery', ),
    $alone_version,
	true
);

wp_localize_script('js-theme-admin', 'BtPhpVars', array(
	'ajax_url' => admin_url('admin-ajax.php'),
));
