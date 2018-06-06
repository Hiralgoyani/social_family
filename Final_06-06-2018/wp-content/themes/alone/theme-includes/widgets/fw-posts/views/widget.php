<?php
/**
 * @var $instance
 * @var $before_widget
 * @var $after_widget
 * @var $title
 */
?>
<?php if ( ! empty( $instance ) ) :
	$items = 5;
	if(isset($instance['posts_number']) && $instance['posts_number'] != ''){
		$items = (int)$instance['posts_number'];
	}

	$date_query = array();
	if($instance['days'] != ''){
		$days = (int)$instance['days'];
		$time = time() - ($days * 24 * 60 * 60);
		$date_query = array(
			'after'     => date('F jS, Y', $time),
			'before'    => date('F jS, Y'),
			'inclusive' => true,
		);
	}

	$args = array(
		'sort' => $instance['type'],
		'items' => $items,
		'image_post' => $instance['show_images'],
		'return_image_tag' => false,
		'return_for_alone_image' => true,
		'image_width' => 130,
		'image_height' => 130,
		'image_class' => '',
		'date_format' => 'l, j, M',
		'category' => $instance['category'],
		'date_query' => $date_query
	);
	$fw_posts = alone_get_posts($args);

	// print_r($fw_posts);
	$args = array(
		'attr' => array( 'class' => 'attachment-post-thumbnail' ),
		'size'     => 'medium',
	);

	echo "{$before_widget}";
	echo "{$title}";
	?>
	<ul class="fw-side-posts-list">
		<?php foreach($fw_posts as $item): ?>
			<li>
				<?php if($instance['show_images']) : ?>
					<?php if($item['post_img'] != '') : ?>
						<?php
						// print_r($item);
						$image = wp_get_attachment_image_src(fw_akg('post_img/attachment_id', $item), 'thumbnail');
						$_style_bg_image = "background: url(". $image[0] .") no-repeat center center / cover;";
						// $image = alone_get_image( $item['post_img']['attachment_id'], $args );
						?>
						<div class="fw-widget-post-image fw-block-image-parent fw-overlay-1 fw-image-frame">
							<a href="<?php echo esc_url($item['post_link']); ?>" class="fw-thumbnail-post-list" style="<?php echo esc_attr($_style_bg_image); ?>">
								<?php // echo "{$image}"; ?>
								<div class="post-image-bg" style="background: url()"></div>
							</a>
						</div>
					<?php else : ?>
						<div class="fw-widget-post-image fw-block-image-parent fw-overlay-1 fw-image-frame">
							<a href="<?php echo esc_url($item['post_link']); ?>" class="fw-thumbnail-post-list">
								<img data-src="<?php echo esc_url(get_template_directory_uri()).'/images/no-photo-max-size.jpg'; ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="lazyload" alt="" />
							</a>
						</div>
					<?php endif; ?>
				<?php endif; ?>

				<div class="posts-content">
					<a href="<?php echo esc_url($item['post_link']); ?>" class="post-title"><?php echo "{$item['post_title']}"; ?></a>
					<?php if($instance['display_date']): ?>
						<span class="post-date"><?php echo "{$item['post_date_post']}"; ?></span>
					<?php endif; ?>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php
	echo "{$after_widget}";
endif; ?>
