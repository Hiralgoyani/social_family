<?php
return array(
  'end_date' => array(
    'type'    => 'date',
    'ui' => array(
        'title' => esc_html__( 'Date', 'alone' ),
    ),
    'options' => array(
        'choose_format' => false,
        'default_format' => 'YYYY/MM/DD',
    )
  ),
  'template' => array(
    'type'    => 'textarea',
    'ui' => array(
        'title' => esc_html__( 'Template', 'alone' ),
    ),
  )
);
?>
