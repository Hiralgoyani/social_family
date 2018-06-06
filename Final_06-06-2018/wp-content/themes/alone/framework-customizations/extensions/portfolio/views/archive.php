<?php
get_header();
global $wp_query;
$ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
$ext_portfolio_settings = $ext_portfolio_instance->get_settings();

$taxonomy   = $ext_portfolio_settings['taxonomy_name'];
$term       = get_term_by( 'slug', get_query_var( 'term' ), $taxonomy );
$term_id    = ( ! empty( $term->term_id ) ) ? $term->term_id : 0;
$categories = fw_ext_portfolio_get_listing_categories( $term_id, $taxonomy );
$alone_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';
$alone_portfolio_settings = alone_get_options_portfolio();

$listing_classes  = 'fw-portfolio-item';
$advanced_options = array();

$loop_data = array(
	'settings'         => $ext_portfolio_settings,
	'categories'       => $categories,
	// 'image_sizes'      => $ext_portfolio_instance->get_image_sizes(),
	// 'listing_classes'  => $listing_classes,
	// 'portfolio_type'   => $portfolio_type, // only for portraits/landscape
	'advanced_options' => $advanced_options,
);
set_query_var( 'fw_portfolio_loop_data', $loop_data );

alone_title_bar();
?>
<section class="bt-main-row bt-section-space <?php alone_get_content_class('main', $alone_sidebar_position); ?>" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="container">
		<div class="row">
			<div class="bt-content-area <?php alone_get_content_class( 'content', $alone_sidebar_position ); ?>">
				<div class="bt-col-inner">
					<?php // if( function_exists('fw_ext_breadcrumbs') ) fw_ext_breadcrumbs(); ?>
					<?php
					/* portfolio filter */
					if($alone_portfolio_settings['show_filter'] == 'yes'){
						echo alone_builder_filter_taxonomy_portfolio();
					}
					?>
					<div class="portfolio-list" data-bears-masonryhybrid='{"col": <?php echo esc_attr( (int) $alone_portfolio_settings['number_portfolio_in_row'] ); ?>}' data-bears-lightgallery='{"selector": ".zoom-image"}'>
						<div class="grid-sizer"></div>
						<div class="gutter-sizer"></div>
						<?php if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'framework-customizations/extensions' . $ext_portfolio_instance->get_rel_path() . '/views/loop', $alone_portfolio_settings['portfolio_type'] );
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
unset( $ext_portfolio_instance );
unset( $ext_portfolio_settings );
set_query_var( 'fw_portfolio_loop_data', '' );
get_footer();
