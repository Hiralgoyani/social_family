<?php
if (!defined('FW')) {
    die('Forbidden');
}

get_header();
alone_title_bar();
global $post;
$alone_sidebar_position = function_exists('fw_ext_sidebars_get_current_position') ? fw_ext_sidebars_get_current_position() : 'right';
$alone_post_options = alone_single_post_options($post->ID);
$options = fw_get_db_post_option($post->ID, fw()->extensions->get('events')->get_event_option_id());
$event_options = fw_get_db_post_option($post->ID);
// $general_events_options    = fw_get_db_settings_option('general_events_options');
// echo '<pre>';print_r($event_options); echo '</pre>';
// alone_event_check_user_booked($post->ID, 'conghieu1@gmail.com');
$event_cat_list = get_the_term_list($post->ID, 'fw-event-taxonomy-name', '', ', ');
$thumb_url = get_the_post_thumbnail_url($post->ID, 'large');
?>
<section class="bt-main-row bt-section-space <?php alone_get_content_class('main', $alone_sidebar_position); ?>" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
    <div class="container">
        <div class="row">
            <div class="bt-content-area <?php alone_get_content_class('content', $alone_sidebar_position); ?>">
                <div class="bt-col-inner">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class("post-event post-event-details"); ?> itemscope="itemscope" itemtype="http://schema.org/EventPosting" itemprop="eventPost">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="event-heading">
                                        <?php if (!empty($thumb_url)) : ?>
                                            <div class="event-post-thumb">
                                                <img src="<?php echo esc_attr($thumb_url); ?>" alt="#"/>
                                            </div>
                                        <?php endif; ?>
                                        <div class="entry-heading-text">
                                            <h4 class="title"><?php the_title(); ?></h4>
                                            <?php if (!empty($event_cat_list)) : ?>
                                                <div class="event-cat-list"><?php echo $event_cat_list; ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <?php 
                                        $get_img = get_post_meta($post->ID,'image_src');
                                        //print_r($get_img[0]);
                                        if($get_img[0] != ""){
                                        ?>
										<br/>
                                        <div><center><font style="font-family:aclonica;margin:1% 0px;font-size:22px;">All images</font></center></div>
										<br/>
                                        <div class="container1">
                                            <?php
                                            foreach (get_post_meta($post->ID, 'image_src') as $image_src) {
                                                echo'<div class="mySlides_event_slide"><div class="numbertext1"></div><img src="' . $image_src . '" style="width:100%;height:425px;"></div>';
                                            }
                                            ?>

                                            <a class="prev1" onclick="plusSlides1(-1)">❮</a>
                                            <a class="next1" onclick="plusSlides1(1)">❯</a>

                                            <div class="caption-container1">
                                                <p id="caption1"></p>
                                            </div>

                                            <div class="row1" >

                                                <?php
                                                $i = 1;
                                                foreach (get_post_meta($post->ID, 'image_src') as $image_src):
                                                    ?>
                                                    <div class="column1">
                                                        <img class="demo cursor1"  src="<?= $image_src ?>" style="width:100%;height:100px;" onclick="currentSlide(<?= $i ?>)"  alt="" />
                                                    </div>
                                                    <?php
                                                    $i++;
                                                endforeach;
                                                ?>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        else
                                        {
                                       ?>
                                        <hr/><div><center><font style="font-family:aclonica;margin:1% 0px;">This event more images not available...!</font></center></div>
                                        <?php
                                        }
                                        ?>
                                    </div>



                                    <div class="event-content clearfix">
                                        <?php //the_content();    ?>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <!-- call map shortcode -->
                                    <div class="map-location-wrap">
                                        <div class="row">
                                            <?php if (!empty($options['event_location'])) : ?>
                                                <div class="col-sm-12">
                                                    <div class="location-info event-location" itemprop="location" itemscope itemtype="http://schema.org/Place">
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                        <?php if (!empty($options['event_location']['address'])) : ?>
                                                            <span itemprop="name"><?php echo esc_attr($options['event_location']['address']); ?></span>,
                                                        <?php endif; ?>
                                                        <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                                            <?php if (!empty($options['event_location']['state'])) : ?>
                                                                <span itemprop="addressLocality">
                                                                    <?php
                                                                    if ($options['event_location']['city'] != $options['event_location']['state'] && !empty($options['event_location']['city'])) {
                                                                        echo esc_attr($options['event_location']['city'] . ', ');
                                                                    }
                                                                    echo esc_attr($options['event_location']['state']);
                                                                    ?>
                                                                </span>
                                                                <?php if (!empty($options['event_location']['country'])) : ?>,<?php endif; ?>
                                                            <?php endif; ?>
                                                            <?php if (!empty($options['event_location']['country'])) : ?>
                                                                <span itemprop="addressRegion"><?php echo esc_attr($options['event_location']['country']); ?></span>
                                                            <?php endif; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php echo fw_ext_events_render_map() ?>
                                        <!-- .call map shortcode -->
                                    </div>

                                    <!-- Booking form -->
                                    <?php if (defined('UNYSON_EVENT_HELPER')) bearsthemes_event_booking_form($post->ID); ?>

                                    <div class="event-extra-meta">
                                        <!-- additional information about event -->
                                        <?php if (isset($options['event_children'])) : $alone_count = 0; ?>
                                            <?php
                                            $date_format = get_option('date_format', 'F j, Y');
                                            $time_format = get_option('time_format', 'F j, Y');
                                            $final_date_format = $date_format . ' ' . $time_format;
                                            ?>
                                            <?php foreach ($options['event_children'] as $key => $row) : ?>
                                                <?php if (empty($row['event_date_range']['from']) or empty($row['event_date_range']['to'])) : ?>
                                                    <?php continue; ?>
                                                <?php endif; ?>

                                                <?php
                                                ++$alone_count;
                                                $dates_count = count($options['event_children']);
                                                ?>
                                                <?php
                                                if ($alone_count == 2) {
                                                    echo '<div class="fw-more-events-content">';
                                                }
                                                ?>
                                                <div class="details-event-button">
                                                    <button class="btn btn-default" data-uri="<?php echo esc_url(add_query_arg(array('row_id' => $key, 'calendar' => 'google'), fw_current_url())); ?>" type="button"><?php esc_html_e('Google Calendar', 'alone') ?></button>
                                                    <button class="btn btn-default" data-uri="<?php echo esc_url(add_query_arg(array('row_id' => $key, 'calendar' => 'ical'), fw_current_url())); ?>" type="button"><?php esc_html_e('Ical Export', 'alone') ?></button>
                                                </div>
                                                <ul class="details-event">
                                                    <li itemprop="startDate">
                                                        <b><?php esc_html_e('Start', 'alone') ?>:</b> <?php echo date($final_date_format, strtotime($row['event_date_range']['from'])); ?><?php
                                                        if ($dates_count >= 2 && $alone_count == 1) {
                                                            echo '<span class="fw-events-more-link">, ' . '<a class="fw-show-more-events closed" hre="#">' . (count($options['event_children']) - 1) . ' ';
                                                            esc_html_e('More', 'alone');
                                                            echo '</a></span>';
                                                        }
                                                        ?>
                                                    </li>
                                                    <li><b><?php esc_html_e('End', 'alone') ?>:</b> <?php echo date($final_date_format, strtotime($row['event_date_range']['to'])); ?></li>

                                                    <?php if (empty($row['event-user']) === false) : ?>
                                                        <li>
                                                            <b><?php esc_html_e('Speakers', 'alone') ?>:</b>
                                                            <?php foreach ($row['event-user'] as $user_id) : ?>
                                                                <?php $user_info = get_userdata($user_id); ?>
                                                                <?php echo esc_html($user_info->display_name); ?>
                                                                <?php echo( $user_id !== end($row['event-user']) ? ', ' : '' ); ?>
                                                            <?php endforeach; ?>
                                                        </li>
                                                    <?php endif; ?>

                                                </ul>
                                            <?php endforeach; ?>
                                            <?php
                                            if ($alone_count >= 2) {
                                                echo '</div>';
                                            } // /.fw-more-events-content 
                                            ?>
                                        <?php endif; ?><!-- .additional information about event -->
                                    </div>
                                    <div class="event-sharing">
                                        <span><?php echo _e('Sharing: ', 'alone'); ?></span>
                                        <?php echo alone_share_post(array('facebook' => true, 'twitter' => true, 'google_plus' => true, 'linkedin' => true, 'pinterest' => false)) ?>
                                    </div>       

                                </div>
                            </div>
                            <?php do_action('fw_theme_ext_events_after_content'); ?>
                        </article>
                        <?php
// if ($alone_portfolio_single_settings['show_comment'] == 'yes') comments_template();
                    endwhile;
                    ?>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
