<div class="give-form-navigation-link-wrap">
<?php
$prev_post = get_previous_post();
if($prev_post) {
   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
   echo implode('', array(
     '<a class="prev-link" rel="prev" href="'. get_permalink($prev_post->ID) .'" title="'. $prev_title .'" class="">',
      '<div class="btn-text"><span class="ion-ios-arrow-left"></span>' . __('Previous post', 'alone') . '</div>',
      '<div class="title-text">&quot;'. $prev_title . '&quot;</div>',
     '</a>',
   ));
   // echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" ">&laquo; Previous post<br /><strong>&quot;'. $prev_title . '&quot;</strong></a>' . "\n";
}

$next_post = get_next_post();
if($next_post) {
   $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
   echo implode('', array(
     '<a class="next-link" rel="prev" href="'. get_permalink($next_post->ID) .'" title="'. $next_title .'" class="">',
      '<div class="btn-text">' . __('Next post', 'alone') . '<span class="ion-ios-arrow-right"></span></div>',
      '<div class="title-text">&quot;'. $next_title . '&quot;</div>',
     '</a>',
   ));
   // echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class=" ">Next post &raquo;<br /><strong>&quot;'. $next_title . '&quot;</strong></a>' . "\n";
}
?>
</div>
