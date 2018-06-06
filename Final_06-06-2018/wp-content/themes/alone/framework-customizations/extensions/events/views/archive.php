<?php
get_header();
global $wp_query;
$ext_event_instance = fw()->extensions->get( 'events' );
$ext_event_settings = fw_get_db_ext_settings_option('events');

$alone_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';
$alone_event_settings = fw_get_db_customizer_option('events_settings/events_archive');
$number_in_row = fw_akg('number_form_in_row', $alone_event_settings);
// echo '<pre>'; print_r($alone_event_settings); echo '</pre>';

$listing_classes  = 'fw-event-item';
$advanced_options = array();

alone_title_bar();
?>
<section class="bt-main-row bt-section-space <?php alone_get_content_class('main', $alone_sidebar_position); ?>" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="container">
		<div class="row">
			<div class="bt-content-area <?php alone_get_content_class( 'content', $alone_sidebar_position ); ?>">
				<div class="bt-col-inner">
					<div class="event-list" data-bears-masonryhybrid='{"col": <?php echo esc_attr($number_in_row); ?>}'>
						<div class="grid-sizer"></div>
						<div class="gutter-sizer"></div>
						<?php if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'framework-customizations/extensions' . $ext_event_instance->get_rel_path() . '/views/loop', 'default' );
							endwhile;
						else :
							// If no content, include the "No posts found" template.
							get_template_part( 'content', 'none' );
						endif; ?>
					</div><!-- /.postlist-->
					<?php alone_paging_navigation(); // archive pagination ?>
				</div>
			</div><!-- /.fw-content-area-->

			<?php get_sidebar(); ?>
		</div><!-- /.fw-row-->
	</div><!-- /.fw-container-->
</section>
<?php
// free memory
unset( $ext_event_instance );
unset( $ext_event_settings );
set_query_var( 'fw_event_loop_data', '' );
get_footer();
