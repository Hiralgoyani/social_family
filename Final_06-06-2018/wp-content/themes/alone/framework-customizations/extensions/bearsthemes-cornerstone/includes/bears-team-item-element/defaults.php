<?php
$social_team_template = "
<ul class='team-social-layout-default'>
	<li><a href='#' data-toggle='tooltip' title='Facebook' target='_blank'><i class='fa fa-facebook'></i></a></li>
	<li><a href='#' data-toggle='tooltip' title='Google+' target='_blank'><i class='fa fa-google-plus'></i></a></li>
	<li><a href='#' data-toggle='tooltip' title='Twitter' target='_blank'><i class='fa fa-twitter'></i></a></li>
</ul>";

return array(
	'id'          						=> '',
	'class'       						=> '',
	'style'       						=> '',

  /* general settings */
	'layout'									=> '',
  'avatar'                  => '',
  'title'                   => esc_html__('John Doe', 'alone'),
  'subtitle'                => esc_html__('CEO/Founder TF', 'alone'),
  'content'                 => $social_team_template,
	'title_color'             => '#ffffff',
  'subtitle_color'          => '#ffffff',
	'title_custom_typography'	=> '',
	'subtitle_custom_typography'	=> '',
	'content_custom_typography'		=> '',
);
