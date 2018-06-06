<?php
$notification_center_settings = fw_get_db_customizer_option('notification_center_settings');
$notification_style = fw_get_db_customizer_option('notification_center_settings/style/style');

$owl_opts = json_encode(array(
  'items'               => 1,
  'loop'                => false,
  'center'              => false,
  'margin'              => 30,
  'URLhashListener'     => true,
  'URLhashSelector'     => '.notification-heading-tabs .nav-tab-item',
  'autoplayHoverPause'  => true,
  // 'startPosition'       => '#',
  'nav'                 => false,
  'dots'                => false,
));

$notification_attributes_owl = html_build_attributes(array(
  'id' => 'notification-slider-panel',
  'class' => 'owl-carousel',
  'data-bears-owl-carousel' => $owl_opts,
));

$notification_data = array();

/* Search */
if(fw_akg('notification_search/display', $notification_center_settings) == 'yes') {
  $notification_data[] = array(
    'label' => fw_akg('notification_search/label', $notification_center_settings),
    'hash' => 'notification-search',
    'template' => get_template_directory() . '/templates/notification_center/content-search.php',
    'class' => 'search',
  );
}

/* Post */
if(fw_akg('notification_post/display', $notification_center_settings) == 'yes') {
  $notification_data[] = array(
    'label' => fw_akg('notification_post/label', $notification_center_settings),
    'hash' => 'notification-post',
    'template' => get_template_directory() . '/templates/notification_center/content-posts.php',
    'class' => 'post',
  );
}

/* Login */
if(fw_akg('notification_login/display', $notification_center_settings) == 'yes') {
  $notification_data[] = array(
    'label' => fw_akg('notification_login/label', $notification_center_settings),
    'hash' => 'notification-login',
    'template' => get_template_directory() . '/templates/notification_center/content-login.php',
    'class' => 'login',
  );
}

/* Cart */
if(class_exists('WooCommerce') && fw_akg('notification_cart/display', $notification_center_settings) == 'yes') {
  $notification_data[] = array(
    'label' => fw_akg('notification_cart/label', $notification_center_settings),
    'hash' => 'notification-cart',
    'template' => get_template_directory() . '/templates/notification_center/content-cart.php',
    'class' => 'cart',
  );
}
?>
<div class="notification-wrap <?php echo esc_attr($notification_style); ?>" style="<?php echo esc_attr($background_style); ?>">
  <a href="#" class="close-notification">
    <span class="ion-ios-close-empty"></span>
  </a>
  <div class="notification-inner">
    <div class="notification-heading-tabs">
      <?php
      if(count($notification_data) > 0) :
        foreach($notification_data as $notification_item) :
          echo "<a href='#{$notification_item['hash']}' class='nav-tab-item'>{$notification_item['label']}</a>";
        endforeach;
      endif;
      ?>
    </div>
    <div class="notification-content-tabs">
      <div class="notification-content-tabs-inner">
        <div <?php echo "{$notification_attributes_owl}"; ?>>
          <?php
          if(count($notification_data) > 0) :
            foreach($notification_data as $notification_item) :
              echo implode('', array(
                '<div class="item" data-hash="'. $notification_item['hash'] .'">',
                  '<div class="item-inner tab-container-'. $notification_item['class'] .'">',
                    fw_render_view($notification_item['template'], array(), true),
                  '</div>',
                '</div>',
              ));
            endforeach;
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
