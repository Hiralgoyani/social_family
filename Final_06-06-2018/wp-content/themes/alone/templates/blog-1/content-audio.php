<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

global $post;
$alone_post_options = alone_listing_post_media($post->ID);
// print_r( $alone_post_options );

$article_classes = array(
	'post',
	'clearfix',
	'post-list-type-' . basename(__DIR__),
	'grid-item' );

$alone_post_thumbnail_url = get_the_post_thumbnail_url($post->ID, 'alone-image-medium');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( implode(' ', $article_classes) ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<div class="post-inner">
		<!-- Post audio -->
		<?php if(!empty($alone_post_options['audio'])) { ?>
			<div class="post-block-audio-wrap" style="background: url(<?php echo esc_attr($alone_post_thumbnail_url); ?>) no-repeat center center / cover;">
				<?php echo "{$alone_post_options['audio']}"; ?>
			</div>
		<?php } ?>

		<!-- entry wrap -->
		<div class="entry-wrap">
			<!-- title -->
			<?php echo "{$alone_post_options['title_link']}"; ?>

			<!-- Cat & tag -->
			<div class="cat-tag-meta">
				<?php echo ! empty( $alone_post_options['category_list'] ) ? '<div class="post-category"><i class="ion-ios-folder" title="'. esc_attr('category', 'alone') .'"></i>' . $alone_post_options['category_list'] . '</div>' : ''; ?>
				<?php echo ! empty( $alone_post_options['tag_list'] ) ? '<div class="post-tag"><i class="ion-ios-pricetag" title="'. esc_attr('tag', 'alone') .'"></i>' . $alone_post_options['tag_list'] . '</div>' : ''; ?>
			</div>

			<?php the_excerpt(); ?>
			<div class="extra-meta">
				<!-- post date -->
				<div class="post-date" title="<?php _e('Date', 'alone'); ?>">
					<i class="ion-ios-clock-outline"></i>
					<?php echo "{$alone_post_options['date']}"; ?>
				</div>

				<!-- post comment -->
				<div class="post-total-comment" title="<?php _e('Comment', 'alone'); ?>">
					<i class="ion-ios-chatbubble"></i>
					<?php echo "{$alone_post_options['comments']}"; ?>
				</div>

				<!-- post view -->
				<div class="post-total-view" title="<?php _e('View', 'alone'); ?>">
					<i class="ion-eye"></i>
					<?php echo "{$alone_post_options['views']}"; ?>
				</div>
			</div>
			<?php // echo "{$alone_post_options['readmore']}"; ?>
		</div>
	</div>
</article>
