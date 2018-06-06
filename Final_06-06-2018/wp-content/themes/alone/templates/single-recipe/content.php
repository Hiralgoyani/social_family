<?php
$recipe_post_data = array(
  'featured_image'   => get_template_directory_uri() . '/assets/images/image-default.jpg',
  'video'            => '',
  'gallery_data'     => array(),
  'page_template'    => get_query_var( 'template', 'default' ),
  'content_columns'  => 'col-md-8',
);

switch ($recipe_post_data['page_template']) {
  case 'recipe_fully_template': $recipe_post_data['content_columns'] = 'col-md-8'; break;
  default: $recipe_post_data['content_columns'] = 'col-md-12'; break;
}

$TBFW = defined( 'FW' );
if ($TBFW ) {
  $post_settings    = fw_get_db_post_option(get_the_ID());
  $recipe_post_data['gallery_data ']    = (isset($post_settings['gallery_images']) && count($post_settings['gallery_images']) > 0) ? $post_settings['gallery_images'] : array();
  $recipe_post_data['video']           = (isset($post_settings['video']) && ! empty($post_settings['video'])) ? $post_settings['video'] : '';
}

$image_background_elem = '';
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  $style_inline = "background: url(". get_the_post_thumbnail_url(get_the_ID(), 'large') .") center center / cover;";
  $image_background_elem = "<div class='background-overlay' style='{$style_inline}' data-stellar-background-ratio='0.8'></div>";
}
?>
<article id="post-recipe-<?php the_ID(); ?>" <?php post_class( "post-recipe post-recipe-details" ); ?> itemscope="itemscope" itemtype="http://schema.org/RecipePosting" itemprop="recipePost">
	<div class="fw-col-inner">
		<div class="entry-content clearfix" itemprop="text">
      <div class="row">
        <?php ($recipe_post_data['page_template'] == 'recipe_fully_template') ? alone_render_recipe_media_single('', $recipe_post_data['page_template']) : ''; ?>
        <div class="<?php echo esc_attr($recipe_post_data['content_columns']); ?>">
          <div class="recipe-entry-wrap"><?php the_content(); ?></div>
        </div>
      </div>
		</div>
    <?php ($recipe_post_data['page_template'] == 'default') ? alone_render_recipe_media_single('', $recipe_post_data['page_template']) : ''; ?>
	</div>
</article>
