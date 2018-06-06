<?php
$recipe_post_data = array(
  'featured_image'    => get_template_directory_uri() . '/assets/images/image-default.jpg',
  'recipe_rating'     => 0,
  'recipe_cook_time'  => '?',
  'recipe_cook_time_text' => esc_html__('min', 'alone'),
  'course_term_list'         => get_the_term_list( get_the_ID(), 'course', '', ' ' ),
);

/* check featured image exist */
if ( has_post_thumbnail() ) {
    $featured_image_data = get_the_post_thumbnail_url(get_the_ID(), 'alone-image-medium');
    $recipe_post_data['featured_image'] = $featured_image_data;
}

/* check recipe_rating exist  */
$recipe_rating = get_post_meta( get_the_ID(), 'recipe_rating', true );
if(! empty($recipe_rating)) $recipe_post_data['recipe_rating'] = $recipe_rating;

/* check recipe_cook_time exist */
$recipe_cook_time = get_post_meta( get_the_ID(), 'recipe_cook_time', true );
if(! empty($recipe_cook_time)) $recipe_post_data['recipe_cook_time'] = $recipe_cook_time;

/* check recipe_cook_time_text exist */
$recipe_cook_time_text = get_post_meta( get_the_ID(), 'recipe_cook_time_text', true );
if(! empty($recipe_cook_time_text)) $recipe_post_data['recipe_cook_time_text'] = $recipe_cook_time_text;

/* video recipe */
$button_video_html = '';
if(function_exists('fw_get_db_post_option')) :
  $video_url = fw_get_db_post_option(get_the_ID(), 'video', '');
  if(! empty($video_url)) :
    $button_video_html = '<a class="btn-play-video" href="'. $video_url .'" title="'. get_the_title() .'"><i class="fa fa-play"></i></a>';
  endif;
endif;

$article_classes = array(
	'post-recipe',
	'clearfix',
	'post-list-type-default',
	'grid-item' );
?>
<article id="post-recipe-<?php the_ID(); ?>" <?php post_class( implode(' ', $article_classes) ); ?> itemscope="itemscope" itemtype="http://schema.org/RecipePosting" itemprop="recipePost">
	<div class="post-recipe-inner">
		<!-- Featured image -->
    <div class="featured-image-wrap">
      <div href="<?php the_permalink(); ?>">
        <img src="<?php echo esc_attr($recipe_post_data['featured_image']); ?>" alt="#">
        <a class="read-more-link" href="<?php the_permalink() ?>"><?php echo esc_html__('Read More', 'alone') ?> <i class="ion-ios-arrow-thin-right"></i></a>
      </div>

      <div class="overlay-wrap">
        <?php if(! empty($recipe_post_data['course_term_list'])) : ?>
        <div class="term_list-wrap">
          <?php echo "{$recipe_post_data['course_term_list']}"; ?>
        </div>
        <?php endif; ?>
      </div>
      <?php echo "{$button_video_html}"; ?>
    </div>


		<!-- entry wrap -->
		<div class="entry-wrap">
			<!-- title -->
      <a href="<?php the_permalink(); ?>" class="title-link"><h4 class="title"><?php the_title(); ?></h4></a>

      <!-- Meta -->
      <div class="extra-meta">
        <div class="meta-item cook-time">
          <i class="fa fa-clock-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_html__('cook time', 'alone'); ?>"></i> <?php echo "{$recipe_post_data['recipe_cook_time']} {$recipe_post_data['recipe_cook_time_text']}"; ?>
        </div>
        <div class="meta-item rating">
          <?php echo bearsthemes_build_rating_star(5, $recipe_rating); ?>
        </div>
      </div>

      <!-- excerpt -->
      <div class="excerpt-content"><?php the_excerpt(); ?></div>
		</div>
	</div>
</article>
