<?php
$post_item = $atts['post_item'];
$image_overlay_html = (isset($post_item['post_img']) && ! empty($post_item['post_img'])) ? "<div class='image-overlay' style='background: url({$post_item['post_img']['url']}) center center;' data-stellar-background-ratio='0.8'></div>" : '';
$term_list_html = get_the_term_list( $post_item['post_id'], 'category', '', ', ' );
?>
<div class="grid-item">
  <div class="post-item-inner">
    <?php echo (! empty($image_overlay_html)) ? $image_overlay_html : ''; ?>
    <div class="post-entry-wrap">
      <?php if(! empty($term_list_html)) { echo "<div class='term-list-wrap'>{$term_list_html}</div>"; } ?>
      <a href="<?php echo esc_attr($post_item['post_link']); ?>" class="title-link">
        <h4 class="title"><?php echo "{$post_item['post_title']}"; ?></h4>
      </a>
      <a href="<?php echo esc_attr($post_item['post_link']); ?>" class="readmore-link"><?php echo esc_html__('Read More', 'alone'); ?> <i class="ion-ios-arrow-thin-right"></i></a>
    </div>
  </div>
</div>
