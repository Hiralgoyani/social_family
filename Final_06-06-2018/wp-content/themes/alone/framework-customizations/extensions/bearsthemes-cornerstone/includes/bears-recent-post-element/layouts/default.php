<?php
$post_item = $atts['post_item'];
$image_html = (isset($post_item['post_img']) && ! empty($post_item['post_img'])) ? "<img src='{$post_item['post_img']['url']}' alt='#'>" : '';

$term_list_html = get_the_term_list( $post_item['post_id'], 'category', '', ', ' );
?>
<div class="grid-item">
  <?php // echo '<pre>'; print_r($atts['post_item']); echo '</pre>'; ?>
  <div class="post-item-inner">
    <?php if(! empty($image_html)) { ?>
    <div class="featured-image-wrap">
      <?php echo $image_html; ?>
      <a href="<?php echo esc_attr($post_item['post_link']); ?>" class="readmore-icon-link"><?php echo esc_html__('Read More', 'alone'); ?> <i class="ion-ios-arrow-thin-right"></i></a>
    </div>
    <?php } ?>

    <div class="entry-content">
      <?php if(! empty($term_list_html)) { echo "<div class='term-list-wrap'>{$term_list_html}</div>"; } ?>
      <a href="<?php echo esc_attr($post_item['post_link']); ?>" class="title-link">
        <h4 class="title"><?php echo "{$post_item['post_title']}"; ?></h4>
      </a>
      <div class="excerpt"><p><?php echo "{$post_item['post_excerpt']}"; ?></p></div>
      <a href="<?php echo esc_attr($post_item['post_link']); ?>" class="readmore-link"><?php echo esc_html__('Read More', 'alone'); ?></a>
    </div>
  </div>
</div>
