<?php
?>
<form class="custom-search-form" role="search" method="get" action="#">
  <label>
    <input class="search-field" data-search-ajax-result="" placeholder="<?php _e('Type to search...', 'alone'); ?>" value="<?php the_search_query(); ?>" name="s" type="search">
    <button type="submit" class="search-submit"><span class="ion-ios-search"></span></button>
  </label>
</form>
<div id="notification-search-ajax-result">

</div>
