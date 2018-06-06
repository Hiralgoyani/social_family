<?php
$thumbnail_html = '<img class="give-thumbnail" src="'. get_template_directory_uri() . '/assets/images/image-default-2.jpg' .'" alt="#">';
if ( has_post_thumbnail() ) {
  $thumbnail_html = get_the_post_thumbnail( get_the_ID(), 'alone-image-medium', array( 'class' => 'give-thumbnail' ) );
}

$article_classes = array(
	'post-give',
	'clearfix',
	'post-list-type-default',
	'grid-item' );
?>
<article id="post-recipe-<?php the_ID(); ?>" <?php post_class( implode(' ', $article_classes) ); ?> itemscope="itemscope" itemtype="http://schema.org/GivePosting" itemprop="GivePost">
	<div class="post-give-inner">
    <div class="post-thumbnail-wrap">
      <?php echo "{$thumbnail_html}"; ?>
      <?php echo do_shortcode('[give_form id="'. get_the_ID() .'" show_title="true" show_goal="false" show_content="none" display_style="button"]'); ?>
      <div class="extra-meta">
        <span class="entry-date"><?php echo get_the_date(); ?></span>
      </div>
    </div>
    <div class="post-entry-wrap">
      <?php echo do_shortcode('[give_goal id="'. get_the_ID() .'" show_text="true" show_bar="true"]'); ?>
      <a class="title-link" href="<?php the_permalink(); ?>">
        <h4 class="title"><?php the_title(); ?></h4>
      </a>
      <div class="excerpt"><?php the_excerpt() ?></div>
      <a class="readmore" href="<?php the_permalink(); ?>"><?php _e('Read More', 'alone'); ?> <span class="ion-ios-arrow-thin-right"></span></a>
    </div>
	</div>
</article>
