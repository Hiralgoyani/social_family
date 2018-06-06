<?php
$atts = array();
$form_id = $post->ID;

// * http://php.net/manual/en/function.parse-str.php
parse_str( $data, $atts );

extract( shortcode_atts( array(
   'show_text' => true,
   'show_bar' => true,
   'layout' => 'default',
   'text_color' => '',
   'el_class' => '',
   'css' => '',
), $atts ) ); // print_r($atts);

$goal_option = get_post_meta( $form_id, '_give_goal_option', true );
$form        = new Give_Donate_Form( $form_id );
$goal        = $form->goal;
$goal_format = get_post_meta( $form_id, '_give_goal_format', true );
$income      = $form->get_earnings();
$color       = get_post_meta( $form_id, '_give_goal_color', true );

// set color if empty
if(empty($color)) $color = '#333';
if(empty($text_color)) $text_color = '#333';

//Sanity check - ensure form has goal set to output
if ( empty( $form->ID )
	|| ( is_singular( 'give_forms' ) && ! give_is_setting_enabled( $goal_option ) )
	|| ! give_is_setting_enabled( $goal_option )
	|| $goal == 0
) {
	//not this form, bail
	return false;
}

$progress = round( ( $income / $goal ) * 100, 2 );

if ( $income >= $goal ) { $progress = 100; }

// Get formatted amount.
$income = give_human_format_large_amount( give_format_amount( $income ) );
$goal = give_human_format_large_amount( give_format_amount( $goal ) );

// text color
$text_color_css = ( ! empty($text_color) ) ? 'color: ' . $text_color . ';' : '';

$shape_type = array(
  'circle' => 'circle',
  'heart' => 'custom',
  'square' => 'custom',
  'circle_2' => 'circle',
);

$shape_color = array(
  'circle' => $color,
  'square' => $color,
  'heart' => '#ff2727',
  'circle_2' => $color,
);

$text_setting = array(
  'circle' => 'show',
  'square' => '',
  'heart' => '',
  'circle_2' => '',
);

//
$progressbar_attr = array(
  // 'class' => 'progressbar-selector-element' . $shape,
  'data-progressbar-svg' => base64_encode(json_encode(array(
    /* source */
    'shape' => isset($shape_type[$layout]) ? $shape_type[$layout] : '', //'circle',
    'progressValue' => $progress,
    'color' => $shape_color[$layout], //$color,
    'strokeWidth' => 6,
    'trailColor' => 'rgba(238,238,238,0.3)',
    'trailWidth' => 3,
    'easing' => 'easeInOut',
    'duration' => 1800,
    'textSetings' => $text_setting[$layout],
    'animateTransformSettings' => 'show',
    'delay' => 300,
    /* transform */
    'colorTransform' => $shape_color[$layout],
    'strokeWidthTransform' => 8,
    /* text */
    'label' => '{percent}%',
    'text_color' => (! empty($text_color)) ? $text_color : '',
  ))),
);

$temp_variables = array(
  '{pricing_text}'      => sprintf(
    __('%1$s of %2$s raised', 'alone'),
    '<span class="income" style="'. $text_color_css .'">' . apply_filters( 'give_goal_amount_raised_output', give_currency_filter( $income ) ) . '</span>',
    '<span class="goal-text">' . apply_filters( 'give_goal_amount_target_output', give_currency_filter( $goal ) ) . '</span>'),

  '{percentage_text}'   => sprintf(
    __( '%s%% funded', 'alone' ),
    '<span class="give-percentage" style="'. $text_color_css .'">' . apply_filters( 'give_goal_amount_funded_percentage_output', round( $progress ) ) . '</span>'),

  '{progress_bar}'      => implode('', array(
    '<div class="give-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="'. $progress .'">',
      '<span style="width: '. $progress .'%; background-color: '. $color .';"></span>',
    '</div>',
  )),

  '{progress_thinbar}' => implode('', array(
    '<div class="progress-bar" data-give-animate-progress-thinbar="" data-progress-val="'. $progress .'">',
      '<div class="progress-line" style="width: '. $progress .'%; background-color: '. $color .';">',
        '<span class="tick-progress" style="border-top-color: '. $color .';" data-toggle="tooltip" data-placement="top" title="'. $progress .'%"></span>',
      '</div>',
    '</div>',
  )),

  '{progress_circlebar}' => implode('', array(
    '<div class="progress-bar" '. html_build_attributes($progressbar_attr) .'></div>',
  )),

  '{progress_heartbar}' => implode('', array(
    '<div class="progress-bar">',
      '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" viewBox="0 0 100 100">',
        '<path fill-opacity="0" stroke-width="3" stroke="#eee" d="M81.495,13.923c-11.368-5.261-26.234-0.311-31.489,11.032C44.74,13.612,29.879,8.657,18.511,13.923  C6.402,19.539,0.613,33.883,10.175,50.804c6.792,12.04,18.826,21.111,39.831,37.379c20.993-16.268,33.033-25.344,39.819-37.379  C99.387,33.883,93.598,19.539,81.495,13.923z"/>',
        '<path '. html_build_attributes($progressbar_attr) .' fill-opacity="0" stroke-width="3" stroke="#ff2727" d="M81.495,13.923c-11.368-5.261-26.234-0.311-31.489,11.032C44.74,13.612,29.879,8.657,18.511,13.923  C6.402,19.539,0.613,33.883,10.175,50.804c6.792,12.04,18.826,21.111,39.831,37.379c20.993-16.268,33.033-25.344,39.819-37.379  C99.387,33.883,93.598,19.539,81.495,13.923z"/>',
      '</svg>',
    '</div>',
  )),

  '{progress_squarebar}' => implode('', array(
    '<div class="progress-bar">',
      '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" viewBox="0 0 100 100">',
        '<path d="M 1.5,2 L 98,2 L 98,98 L 2,98 L 2,2" stroke="#eee" stroke-width="3" fill-opacity="0"/>',
        '<path '. html_build_attributes($progressbar_attr) .' d="M 0,2 L 98,2 L 98,98 L 2,98 L 2,4" stroke="'. $color .'" stroke-width="3" fill-opacity="0" style="stroke-dasharray: 384, 384; stroke-dashoffset: 0;"/>',
      '</svg>',
    '</div>',
  )),

  '{progress_circle2bar}' => implode('', array(
    '<div class="progress-bar" '. html_build_attributes($progressbar_attr) .'>',
    '</div>',
  )),
);

$goal_templates = array(

  'default' => implode('', array(
    '<div class="give-goal-progress">',
      // show text
      ( ! empty( $show_text ) ) ? implode('', array(
        '<div class="raised" style="'. $text_color_css .'">',
          ( $goal_format !== 'percentage' ) ? '{pricing_text}' : '{percentage_text}',
        '</div>',
      )) : '',
      // show bar
      ( ! empty( $show_bar ) ) ? '{progress_bar}' : '',
    '</div>',
  )),

  'thinbar' => implode('', array(
    '<div class="give-goal-progress-thinbar">',
      // show bar
      ( ! empty( $show_bar ) ) ? '{progress_thinbar}' : '',
      // show text
      ( ! empty( $show_text ) ) ? implode('', array(
        '<div class="raised" style="'. $text_color_css .'">',
          ( $goal_format !== 'percentage' ) ? '{pricing_text}' : '{percentage_text}',
        '</div>',
      )) : '',
    '</div>',
  )),

  'circle' => implode('', array(
    '<div class="give-goal-progress-circle-svg">',
      // show bar
      ( ! empty( $show_bar ) ) ? '{progress_circlebar}' : '',
      // show text
      ( ! empty( $show_text ) ) ? implode('', array(
        '<div class="raised" style="'. $text_color_css .'">',
          ( $goal_format !== 'percentage' ) ? '{pricing_text}' : '{percentage_text}',
        '</div>',
      )) : '',
    '</div>',
  )),

  'heart' => implode('', array(
    '<div class="give-goal-progress-heart-svg">',
      // show bar
      ( ! empty( $show_bar ) ) ? '{progress_heartbar}' : '',
      // show text
      ( ! empty( $show_text ) ) ? implode('', array(
        '<div class="raised" style="'. $text_color_css .'">',
          ( $goal_format !== 'percentage' ) ? '{pricing_text}' : '{percentage_text}',
        '</div>',
      )) : '',
    '</div>',
  )),

  'square' => implode('', array(
    '<div class="give-goal-progress-square-svg">',
      // show bar
      ( ! empty( $show_bar ) ) ? '{progress_squarebar}' : '',
      // show text
      ( ! empty( $show_text ) ) ? implode('', array(
        '<div class="raised" style="'. $text_color_css .'">',
          ( $goal_format !== 'percentage' ) ? '{pricing_text}' : '{percentage_text}',
        '</div>',
      )) : '',
    '</div>',
  )),

  'circle_2' => implode('', array(
    '<div class="give-goal-progress-circle2-svg">',
      // show bar
      ( ! empty( $show_bar ) ) ? '{progress_circle2bar}' : '',
      // show text
      ( ! empty( $show_text ) ) ? implode('', array(
        '<div class="raised" style="'. $text_color_css .'">',
          ( $goal_format !== 'percentage' ) ? '{pricing_text}' : '{percentage_text}',
        '</div>',
      )) : '',
    '</div>',
  )),
);

$_class = implode(' ', array(
  $el_class,
  apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode(' ', $_class) . ' ' . vc_shortcode_custom_css_class( $css, ' ' ), null, $atts ),
  'custom-goal-temp-' . $layout,
  'custom-give-goal-progress',
));
?>
<div class="give-goal-progress <?php echo esc_attr($_class); ?>">
  <?php echo str_replace(array_keys($temp_variables), array_values($temp_variables), $goal_templates[$layout]); ?>
</div><!-- /.goal-progress -->
