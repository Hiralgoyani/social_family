<div class="grid-item portfolio-item <?php echo esc_attr($item['post_taxonomy_classes']); ?>">
  <?php // echo '<pre>'; print_r($item); echo '</pre>'; ?>
  <div class="portfolio-item-inner">
    <?php
    /* thumbnail */
    if(! empty($item['thumbnail'])) {
      echo '<div class="thumbnail-wrap"><img src="'. $item['thumbnail'] .'" alt="#"></div>';
    } ?>

    <div class="content-entry">
      <a href="<?php echo esc_attr($item['post_link']); ?>" class="item-link"><h4 class="item-title"><?php echo "{$item['post_title']}"; ?></h4></a>
      <div class="btn-action-wrap">
        <a href="<?php echo esc_attr($item['image_full']); ?>" class="item-zoom"><i class="fa fa-search" aria-hidden="true"></i></a>
        <a href="<?php echo esc_attr($item['post_link']); ?>" class="item-view-detail"><i class="fa fa-link" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</div>
