<?php
global $post;

$alone_post_options = alone_listing_post_media($post->ID);
// echo '<pre>'; print_r($alone_post_options); echo '</pre>';
?>
<!-- Featured image -->
<?php if(!empty($alone_post_options['featured_image'])) { ?>
  <div class="post-featured-image-wrap">
    <div href="<?php the_permalink(); ?>" class="post-featured-image-link">
      <?php echo "{$alone_post_options['featured_image']}"; ?>
    </div>
    <a class="icon-view-detail" href="<?php the_permalink() ?>"><?php echo esc_html__('Read More', 'alone') ?> <span class="ion-ios-arrow-thin-right"></span></a>
    <div class="extra-meta-bottom">
      <!-- post comment -->
      <div class="post-total-comment" title="<?php _e('Comment', 'alone'); ?>">
        <?php echo "{$alone_post_options['comments']}"; ?>
        <?php echo ((int) $alone_post_options['comments'] <= 1) ? esc_html__('Comment', 'alone') : esc_html__('Comments', 'alone')  ?>
      </div>

      <!-- post view -->
      <div class="post-total-view" title="<?php _e('View', 'alone'); ?>">
        <?php echo "{$alone_post_options['views']}"; ?>
        <?php echo ((int) $alone_post_options['views'] <= 1) ? esc_html__('View', 'alone') : esc_html__('Views', 'alone')  ?>
      </div>
    </div>
  </div>
<?php } ?>

<!-- entry -->
<div class="post-entry-wrap">

  <!-- Cat & tag -->
  <div class="cat-meta">
    <?php //echo ! empty( $alone_post_options['category_list'] ) ? '<div class="post-category">' . $alone_post_options['category_list'] . '</div>' : ''; ?>
  </div>

  <!-- title -->
  <?php echo "{$alone_post_options['title_link']}"; ?>

  <div class="extra-meta">
    <!-- post date -->
    <div class="post-date" title="<?php _e('Date', 'alone'); ?>">
      <?php echo "{$alone_post_options['date']}"; ?>
    </div>

    <!-- post author -->
    <div class="post-author" title="<?php //_e('Author', 'alone'); ?>">
      <span><?php //echo esc_html__('By ', 'alone') ?></span>
      <?php //echo "{$alone_post_options['author_link']}"; ?>
    </div>
  </div>

  <?php the_excerpt(); ?>

  <?php echo "{$alone_post_options['readmore']}"; ?>
</div>
