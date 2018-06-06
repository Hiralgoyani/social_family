<?php
$post_comment_num = wp_count_comments(get_the_ID())->total_comments;
$post_view_num = alone_get_post_views(get_the_ID());
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'search-post-item' ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<div class="post-inner">
    <div class="post-type"><?php echo get_post_type(); ?></div>
    <a href="<?php the_permalink(); ?>" class="title-link"><h4 class="title"><?php the_title(); ?></h4></a>
    <div class="extra-meta">
      <!-- post date -->
      <div class="post-date" title="<?php _e('Date', 'alone'); ?>">
        <?php the_date(); ?>
      </div>

      <!-- post author -->
      <div class="post-author" title="<?php _e('Author', 'alone'); ?>">
        <span><?php echo esc_html__('By ', 'alone') ?></span>
        <a href="<?php echo esc_attr(get_the_author_link()); ?>"><?php echo get_the_author(); ?></a>
      </div>

      <!-- post comment -->
      <div class="post-total-comment" title="<?php _e('Comment', 'alone'); ?>">
        <?php echo "{$post_comment_num}"; ?>
        <?php echo ((int) $post_comment_num <= 1) ? esc_html__('Comment', 'alone') : esc_html__('Comments', 'alone')  ?>
      </div>

      <!-- post view -->
      <div class="post-total-view" title="<?php _e('View', 'alone'); ?>">
        <?php echo "{$post_view_num}"; ?>
        <?php echo ((int) $post_view_num <= 1) ? esc_html__('View', 'alone') : esc_html__('Views', 'alone')  ?>
      </div>
    </div>
	</div>
</article>
