<?php

$post_args = array(
  'sort' => 'recent',
  'items' => 6,
  'date_format' => 'l, j, M',
  // 'category' => $atts['post_cat'],
);
$results = alone_get_posts($post_args);

$_temp = array(
  'template_wrap' => implode('', array(
    '<div class="bt-row">',
      '{post_items}',
    '</div>',
  )),
  'template_noresult' => implode('', array(
    '<p class="text-result">'. __('No posts to show!', 'alone') .'</p>',
    '',
  )),
  'item_template_default' => implode('', array(
    '<div class="bt-col-3">',
      '<div class="item-inner item-template-default">',
        '<a href="{post_link}">',
          '<div class="feature-image" style="background: url({featured_img}) center center / cover, #333;">',
            '<div class="post-date">{post_date}</div>',
          '</div>',
        '</a>',
        '<a class="post-link" href="{post_link}">{post_title}</a>',
      '</div>',
    '</div>',
  )),
);

// echo '<pre>'; print_r($results); echo '</pre>';
if(count($results) > 0) :
  $post_items = '';
  foreach($results as $item) :
    $variables = array(
      'id' => fw_akg('post_id', $item),
      '{post_date}' => fw_akg('post_date_post', $item),
      '{featured_img}' => '',
      '{post_title}' => fw_akg('post_title', $item),
      '{post_link}' => fw_akg('post_link', $item),
    );

    /* check featured image exist */
    if ( has_post_thumbnail(fw_akg('post_id', $item)) ) {
      $variables['{featured_img}'] = get_the_post_thumbnail_url(fw_akg('post_id', $item), 'medium_large');
    }

    $post_items .= str_replace(array_keys($variables), array_values($variables), fw_akg('item_template_default', $_temp));
  endforeach;

  $output = str_replace( '{post_items}', $post_items, fw_akg('template_wrap', $_temp) );
else :

  $output = fw_akg('template_noresult', $_temp);
endif;

echo "{$output}";
