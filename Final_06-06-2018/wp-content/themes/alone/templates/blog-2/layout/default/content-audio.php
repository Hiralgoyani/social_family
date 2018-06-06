<?php
global $post;

$alone_post_options = alone_listing_post_media($post->ID);
// echo '<pre>'; print_r($alone_post_options); echo '</pre>';

$image_background_elem = '';
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  $style_inline = "background: url(". get_the_post_thumbnail_url($post->ID, $alone_post_options['image_size']) .") no-repeat center center / cover;";
  $image_background_elem = "<div class='post-quote-image-background' style='{$style_inline}'></div>";
}
?>

<div class="post-header-audio-wrap">
  <?php echo (isset($alone_post_options['audio']) && ! empty($alone_post_options['audio'])) ? $alone_post_options['audio'] : ''; ?>
</div>

<!-- entry -->
<div class="post-entry-wrap">

  <!-- Cat & tag -->
  <div class="cat-meta">
    <?php echo ! empty( $alone_post_options['category_list'] ) ? '<div class="post-category">' . $alone_post_options['category_list'] . '</div>' : ''; ?>
  </div>

  <!-- title -->
  <?php echo "{$alone_post_options['title_link']}"; ?>

  <div class="extra-meta">
    <!-- post date -->
    <div class="post-date" title="<?php _e('Date', 'alone'); ?>">
      <?php echo "{$alone_post_options['date']}"; ?>
    </div>

    <!-- post author -->
    <div class="post-author" title="<?php _e('Author', 'alone'); ?>">
      <span><?php echo esc_html__('By ', 'alone') ?></span>
      <?php echo "{$alone_post_options['author_link']}"; ?>
    </div>

    <!-- post comment -->
    <div class="post-total-comment" title="<?php _e('Comment', 'alone'); ?>">
      <i class="fa fa-comment" aria-hidden="true"></i>
      <?php echo "{$alone_post_options['comments']}"; ?>
      <?php // echo ((int) $alone_post_options['comments'] <= 1) ? esc_html__('Comment', 'alone') : esc_html__('Comments', 'alone')  ?>
    </div>

    <!-- post view -->
    <div class="post-total-view" title="<?php _e('View', 'alone'); ?>">
      <i class="fa fa-eye" aria-hidden="true"></i>
      <?php echo "{$alone_post_options['views']}"; ?>
      <?php // echo ((int) $alone_post_options['views'] <= 1) ? esc_html__('View', 'alone') : esc_html__('Views', 'alone')  ?>
    </div>
  </div>

  <?php echo "{$alone_post_options['readmore']}"; ?>
</div>
