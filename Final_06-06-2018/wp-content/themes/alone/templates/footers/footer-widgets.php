<?php
$alone_footer_settings   = defined( 'FW' ) ? fw_get_db_customizer_option( 'footer_settings' ) : array();
$alone_footer_sidebar = isset( $alone_footer_settings['show_footer_widgets']['yes']['footer_sidebar'] ) ? $alone_footer_settings['show_footer_widgets']['yes']['footer_sidebar'] : array();
// echo '<pre>'; print_r($alone_footer_settings); echo '</pre>';
// footer widgets overlay
$alone_overlay_style_footer_widgets = '';
if ( isset( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['overlay'] ) && $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['overlay'] == 'yes' && $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] == 'image' ) {
	$alone_overlay_bg = $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['yes']['background']['id'];
	$alone_opacity    = ( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['yes']['overlay_opacity_image'] ) / 100;
	if ( $alone_overlay_bg == 'fw-custom' && ! empty( $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['yes']['background']['color'] ) ) {
		$alone_overlay_style_footer_widgets = '<div class="fw-main-row-overlay" style="background-color: ' . $alone_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['yes']['background']['color'] . '; opacity: ' . $alone_opacity . ';"></div>';
	} else {
		$alone_overlay_style_footer_widgets = '<div class="fw-main-row-overlay fw_theme_bg_' . $alone_overlay_bg . '" style="opacity: ' . $alone_opacity . ';"></div>';
	}
}
?>
<div class="bt-footer-widgets footer-cols-4">
	<?php echo "{$alone_overlay_style_footer_widgets}"; ?>
	<div class="bt-inner">
		<div class="container">
			<div class="bt-row">
				<?php
				$count = count($alone_footer_sidebar);
				// footer col class
				$foolter_col_class = array(
					1 => 'col-md-12 col-sm-12',
					2 => 'col-md-6 col-sm-6',
					3 => 'col-md-4 col-sm-4',
					4 => 'col-md-3 col-sm-6' );

				if( is_array($alone_footer_sidebar) && $count > 0 ) {
					foreach($alone_footer_sidebar as $footer_item) {
						$class = array(
							'footer-sidebar-item',
							// $foolter_col_class[$count],
							'bt-col-' . $count,
							$footer_item['content_align'],
							$footer_item['custom_class']);
					?><!--
					--><div class="<?php echo implode(' ', $class); ?>">
						<?php dynamic_sidebar( $footer_item['sidebar_id'] ); ?>
					</div><!--
					--><?php
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
