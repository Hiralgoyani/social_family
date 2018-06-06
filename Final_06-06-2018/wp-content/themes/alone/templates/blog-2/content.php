<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

global $post;

$TBFW = defined( 'FW' );
$layout_creative = 'default';
if ($TBFW ) {
  $post_settings = alone_get_settings_by_post_id($post->ID);
  $layout_creative = isset($post_settings['post_general_tab']['blog_layout_style_cretive']) ? $post_settings['post_general_tab']['blog_layout_style_cretive'] : 'default';
}

$article_classes = array(
	'post',
	'clearfix',
	'post-list-type-' . basename(__DIR__),
  'post-creative-layout-' . $layout_creative,
	'grid-item' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( implode(' ', $article_classes) ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<div class="post-inner">
    <?php get_template_part( 'templates/blog-2/layout/' . $layout_creative . '/content', get_post_format() ); ?>
	</div>
</article>
