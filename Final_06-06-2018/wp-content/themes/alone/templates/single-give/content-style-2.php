<?php
/**
 * The template for displaying form content in the single-give-form.php template
 *
 * Override this template by copying it to yourtheme/give/single-give-form/content-single-give-form.php
 *
 * @package       Give/Templates
 * @version       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Fires in single form template, before the form.
 *
 * Allows you to add elements before the form.
 *
 * @since 1.0
 */
do_action( 'give_before_single_form' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}

$form_id = get_the_ID();
$goal_option = get_post_meta( $form_id, '_give_goal_option', true );
$form        = new Give_Donate_Form( $form_id );
$goal        = $form->goal;
$goal_format = get_post_meta( $form_id, '_give_goal_format', true );
$income      = $form->get_earnings();
$color       = get_post_meta( $form_id, '_give_goal_color', true );

$donor = alone_give_get_donor(array('type' => 'by_ID', 'give_forms' => array($form_id)));
// echo '<pre>'; print_r($donor); echo '</pre>';

// set color if empty
if(empty($color)) $color = '#01FFCC';
if(empty($text_color)) $text_color = '#01FFCC';

$progress = round( ( $income / $goal ) * 100, 2 );

if ( $income >= $goal ) { $progress = 100; }

// Get formatted amount.
$income = give_human_format_large_amount( give_format_amount( $income ) );
$goal = give_human_format_large_amount( give_format_amount( $goal ) );

/* check featured image exist */
$featured_image = '';
if ( has_post_thumbnail(get_the_ID()) ) {
  $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
}

ob_start(); do_action( '_alone_action_give_single_form_summary' );
$content_entry = ob_get_clean();

$variable = array(
	'{id}' => $form_id,

	'{title}'	=> get_the_title(),

	'{author_name}' => get_the_author(),

	'{date}' => get_the_date(),

	'{featured_image}' => $featured_image,

	'{content}' => $content_entry,

	'{social_share_post}' => alone_share_post(array('facebook' => true, 'twitter' => true, 'google_plus' => true, 'linkedin' => true, 'pinterest' => false)),

	'{donors_count}' => $form->get_sales(),

	'{donors_slide}' => '', //alone_give_donors_slide($donor),

	'{pricing_text}' => sprintf(
    __('%1$s of %2$s raised', 'alone'),
    '<span class="income">' . apply_filters( 'give_goal_amount_raised_output', give_currency_filter( $income ) ) . '</span>',
    '<span class="goal-text">' . apply_filters( 'give_goal_amount_target_output', give_currency_filter( $goal ) ) . '</span>'),

  '{percentage_text}' => sprintf(
    __( '%s%% funded', 'alone' ),
    '<span class="give-percentage">' . apply_filters( 'give_goal_amount_funded_percentage_output', round( $progress ) ) . '</span>'),

  '{goal_progress_bar_default}' => '',
);

//Sanity check - ensure form has goal set to output
if ( empty( $form->ID )
	|| ( is_singular( 'give_forms' ) && ! give_is_setting_enabled( $goal_option ) )
	|| ! give_is_setting_enabled( $goal_option )
	|| $goal == 0
) {
	// not this form, bail
	//
} else {
  $progressbar_style_default_attr = array(
    'class' => 'give-goal-progress-bar',
    'data-progressbar-svg' => json_encode(array(
      /* source */
      'shape' => 'circle', //'circle',
      'progressValue' => $progress,
      'color' => $color,
      'strokeWidth' => 12,
      'trailColor' => 'rgba(238,238,238,0.5)',
      'trailWidth' => 3,
      'easing' => 'easeInOut',
      'duration' => 1800,
      'textSetings' => '',
      'animateTransformSettings' => 'show',
      'delay' => 300,
      /* transform */
      'colorTransform' => $color,
      'strokeWidthTransform' => 12,
      /* text */
      'label' => '{percent}%',
      'text_color' => '#fff',
    )),
  );

  $variable['{goal_progress_bar_default}'] = '<div '. html_build_attributes($progressbar_style_default_attr) .'></div>';
}

$_template = array(
  '<div class="give-single-heading">',
    '<div class="heading-background" style="background: url({featured_image}) center center; background-size: 150%;" data-stellar-background-ratio="0.8"></div>',
    '<div class="give-progress-bar-wrap">',
      // show donor slide
      '',
			// show bar
      '<div class="give-goal-progress-bar">{goal_progress_bar_default} <div class="give-donor-slide">{donors_slide}</div></div>',
      // show text
			'<div class="raised">',
				( $goal_format !== 'percentage' ) ? '{pricing_text}' : '{percentage_text}',
			'</div>',
    '</div>',
  '</div>',
  '<div class="entry-container">',
		'<div class="give-social-share-post">{social_share_post}</div>',
		'<div class="give-content-wrap">',
			'<div class="title-heading">', /* Start title heading */
				'<h4 class="title">{title}</h4>',
				'<div class="extra-meta">',
					'<div class="meta-item post-author"><span class="ion-ios-compose-outline"></span> {author_name}</div>',
					'<div class="meta-item post-date"><span class="ion-ios-calendar-outline"></span> {date}</div>',
					'<div class="meta-item meta-donors">'. __('Donors:', 'alone') .' {donors_count}</div>',
				'</div>',
			'</div>', /* End title heading */
			'<div class="entry-content">{content}</div>',
		'</div>',
  '</div>',
);
?>

	<div id="give-form-<?php the_ID(); ?>-content" <?php post_class(); ?>>

    <?php echo str_replace(array_keys($variable), array_values($variable), implode('', $_template)); ?>

		<!-- Modal -->
		<div class="modal fade donors-modal-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="donors-modal">
		  <div class="modal-dialog modal-sm" role="document">
		    <div class="modal-content">
					<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <div class="modal-title"><?php _e('List Donors', 'alone'); ?></div>
		      </div>
		      <div class="modal-body">
						<ul class="give-form-donor-listing">
			        <?php
							if(isset($donor) && count($donor) > 0) :
								foreach($donor as $item) :
									$avatar_url = get_avatar_url($item->email, array('size' => 120));
									$purchase_value = give_human_format_large_amount( give_format_amount( $item->purchase_value ) );
									echo implode('', array(
										'<li class="item">',
											'<img class="ava" src="'. $avatar_url .'" alt="#">',
											'<div class="donor-entry-wrap">',
												'<div class="name">'. $item->name .'</div>',
												'<div class="value">'. give_currency_filter($purchase_value) .'</div>',
											'</div>',
										'</li>',
									));
								endforeach;
							else :
								echo '<li class="empty">'. __('Not item...!', 'alone') .'</li>';
							endif;
							?>
						</ul>
		      </div>
		    </div>
		  </div>
		</div>

	</div><!-- #give-form-<?php the_ID(); ?> -->

<?php
/**
 * Fires in single form template, after the form.
 *
 * Allows you to add elements after the form.
 *
 * @since 1.0
 */
do_action( 'give_after_single_form' );
?>
