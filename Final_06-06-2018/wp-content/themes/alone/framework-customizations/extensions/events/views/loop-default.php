<?php
$event_classes = array(
	'event-item',
	'clearfix',
	'event-list-type-' . basename(__FILE__, '.php'),
	'grid-item' );

$event_options = fw_get_db_post_option(get_the_ID());
// echo '<pre>'; print_r($event_options); echo '</pre>';
$venue =  fw_akg('general-event/event_location/venue', $event_options);
$limit_space = fw_akg('total_space', $event_options);
$image = alone_get_image(get_post_thumbnail_id(), array('size' => 'large-medium'));
?>
<article id="event-<?php the_ID(); ?>" <?php post_class( implode(' ', $event_classes) ); ?> itemscope="itemscope" itemtype="http://schema.org/eventPosting" itemprop="eventPost">
	<div class="event-inner">
	
		<div class="event-entry-wrap">
			<!-- venue -->
		<!--	<?php //if(! empty($venue)) : ?>
			<div class="event-venue">
				<span class="ion-ios-location"></span>
        <?php //echo "{$venue}"; ?>
			</div>
			<?php //endif; ?>  -->

			<!-- title -->
			<a href="<?php the_permalink(); ?>" class="event-title-link">
				<h4 class="event-title" style="font-size:16px;"><?php the_title(); ?></h4>
			</a>
			
				<!-- Featured image -->
				<?php
				if(! empty($image)) { ?>
				<div class="event-featured-image-wrap">
				  <?php echo "{$image}" ?>
						
				</div>
				<?php } ?>

			<!-- excerpt --><br/>
			<div class="event-content" style="font-size:14px;">
				<?php the_excerpt(); ?>
			</div>
			
			<!-- date start -->
		  <div class="event-start-date">
					<span class="ion-ios-clock-outline"></span>
			<?php echo (function_exists('bearsthemes_event_get_start_time')) ? bearsthemes_event_get_start_time(get_the_ID()) : ''; ?>
		  </div>

			<!-- View detail -->
			<a href="<?php the_permalink(); ?>" class="event-view-detail">
				<span><?php _e('View Details', 'alone'); ?></span>
        <i class="ion-ios-arrow-thin-right"></i>
			</a>
		</div>
	</div>
</article>
