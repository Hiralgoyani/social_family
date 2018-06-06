<?php
$options_fdm = get_option( 'food-and-drink-menu-settings', array() );
$custom_layout_class = (isset($options_fdm['fdm-style'])) ? "fdm-custom-class-style-{$options_fdm['fdm-style']}" : '';
$this->classes[] = $custom_layout_class;
?>
<ul<?php echo fdm_format_classes( $this->classes ); ?>>
	<li class="fdm-section-header">
		<h3><?php echo $this->title; ?></h3>
	</li>
	<?php echo $this->print_items(); ?>
	<?php if ( $this->description ) : ?>
	<li class="fdm-section-footer">
		<p><?php echo $this->description; ?></p>
	</li>
	<?php endif; ?>
</ul>
