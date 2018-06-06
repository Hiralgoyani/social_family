<?php
get_header();
global $wp_query;

$alone_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';
$alone_portfolio_settings = alone_get_options_portfolio();
$alone_portfolio_single_settings = $alone_portfolio_settings['portfolio_single'];

$ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
$ext_portfolio_settings = $ext_portfolio_instance->get_settings();
$thumbnails = fw_theme_ext_portfolio_get_gallery_images();
// echo '<pre>'; print_r($thumbnails); echo '</pre>';

$prevPost = get_previous_post();
$nextPost = get_next_post();

alone_title_bar();
?>
<section class="bt-main-row bt-section-space <?php alone_get_content_class( 'main', $alone_sidebar_position ); ?>" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="container">
		<div class="row">
			<div class="bt-content-area <?php alone_get_content_class( 'content', $alone_sidebar_position ); ?>">
				<div class="bt-col-inner">
					<?php // if( function_exists('fw_ext_breadcrumbs') ) fw_ext_breadcrumbs(); ?>
					<?php while ( have_posts() ) : the_post();
						$term_list = get_the_term_list( get_the_ID(), 'fw-portfolio-category', '', ', ' );
						?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( "portfolio portfolio-details" ); ?> itemscope="itemscope" itemtype="http://schema.org/PortfolioPosting" itemprop="portfolioPost">
            	<div class="fw-col-inner">
            		<div class="entry-content clearfix" itemprop="text">
									<div class="row">
										<div class="col-md-6">
											<div class="gallery-wrap" data-bears-lightgallery='{"selector": ".zoom-image", "thumbnail": "true"}'>
												<?php
												/* post thumbnail */
												if ( has_post_thumbnail( get_the_ID() ) ) :
													$thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
													echo "<a href='{$thumbnail_url}' class='zoom-image'><img src='{$thumbnail_url}' alt='". get_the_title() ."'></a>";
												endif;

												/* gallery */
												if(! empty($thumbnails) && count($thumbnails) > 0) :
													foreach($thumbnails as $thumb_item) :
														$image_data = wp_get_attachment_image_src($thumb_item['attachment_id'], 'large');
														echo "<a href='{$thumb_item['url']}' class='zoom-image'><img src='{$image_data[0]}' alt='". get_the_title() ."'></a>";
													endforeach;
												endif;
												?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="entry-content-wrap">
												<h2 class="title"><?php the_title(); ?></h2>
												<div class="extra-meta">
													<?php
													/* $term_list */
													if(! empty($term_list)) : echo '<div class="post-category"><span class="ion-folder"></span> '. $term_list .'</div>'; endif; ?>

													<!-- author -->
													<div class="post-author"><span class="ion-person"></span> <?php echo get_the_author(); ?></div>

													<!-- date -->
													<div class="post-date"><span class="ion-android-time"></span> <?php echo get_the_date(); ?></div>
												</div>
												<div class="entry-the-content">
													<?php the_content(); ?>
													<?php
				            			wp_link_pages( array(
				            				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'alone' ) . '</span>',
				            				'after'       => '</div>',
				            				'link_before' => '<span>',
				            				'link_after'  => '</span>',
				            			) );
				            			?>
												</div>
												<div class="social-share-entry">
													<?php echo alone_share_post(array('facebook' => true, 'twitter' => true, 'google_plus' => true, 'linkedin' => true, 'pinterest' => false)); ?>
												</div>

												<?php if($prevPost || $nextPost) : ?>
													<ul class="previous-next-link">
														<?php if($prevPost) { ?>
													    <li class="previous">
													    	<?php $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(80,80) ); ?>
													      <?php previous_post_link('%link', $prevthumbnail . '<div><div class="icon"><span class="ion-ios-arrow-thin-left"></span> '.__('Previous', 'alone').'</div> <div class="title">%title</div></div>'); ?>
													    </li>
														<?php } if($nextPost) { ?>
													    <li class="next">
													    	<?php $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(80,80) ); ?>
													      <?php next_post_link('%link', $nextthumbnail . '<div><div class="icon">'.__('Next', 'alone').' <span class="ion-ios-arrow-thin-right"></span></div> <div class="title">%title</div></div>'); ?>
													    </li>
														<?php } ?>
													</ul>
												<?php endif; ?>
											</div>
										</div>
									</div>
            		</div>
            	</div>
            </article>
            <?php
						if ($alone_portfolio_single_settings['show_comment'] == 'yes') comments_template();
						break;
					endwhile; ?>
				</div><!-- /.bt-col-inner -->
			</div><!-- /.bt-content-area -->
			<?php get_sidebar(); ?>
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
<?php
// free memory
unset( $ext_portfolio_instance );
unset( $ext_portfolio_settings );
set_query_var( 'fw_portfolio_loop_data', '' );
get_footer();
