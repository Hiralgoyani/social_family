<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$loop_data = get_query_var( 'fw_portfolio_loop_data' );
$portfolio_classes = array(
	'portfolio',
	'clearfix',
	'portfolio-list-type-' . basename(__FILE__, '.php'),
	'grid-item' );

$image = alone_get_image(get_post_thumbnail_id(), array('size' => 'alone-image-medium'));
if(! empty($image)) {
	$image_full_arr = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
}
?>
<article id="portfolio-<?php the_ID(); ?>" <?php post_class( implode(' ', $portfolio_classes) ); ?> itemscope="itemscope" itemtype="http://schema.org/PortfolioPosting" itemprop="portfolioPost">
	<div class="portfolio-inner">
		<!-- Featured image -->
    <?php
    if(! empty($image)) { ?>
    <div class="portfolio-featured-image-wrap">
      <?php echo "{$image}" ?>
			<a href="<?php echo esc_attr($image_full_arr[0]) ?>" class="zoom-image"><i class="fa fa-search" aria-hidden="true"></i></a>
    </div>
    <?php } ?>

		<div class="portfolio-entry-wrap">
			<!-- title -->
			<a href="<?php the_permalink(); ?>" class="portfolio-title-link"><h2 class="portfolio-title"><?php the_title(); ?></h2></a>
			
			<!-- excerpt -->
			<div class="portfolio-content">
				<?php the_excerpt(); ?>
			</div>

			<!-- View detail -->
			<a href="<?php the_permalink(); ?>" class="portfolio-view-detail">
				<div><span class="bt-icon-custom"><i class="fa fa-caret-right" aria-hidden="true"></i></span></div>
				<span><?php _e('View Details', 'alone'); ?></span>
			</a>
		</div>
	</div>
</article>
