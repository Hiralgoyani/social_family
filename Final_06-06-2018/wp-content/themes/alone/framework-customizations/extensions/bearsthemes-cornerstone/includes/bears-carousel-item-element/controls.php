<?php
/**
 * Element Controls
 */

return array(
  'title' => array(
    'type' => 'text',
    'ui' => array(
      'title' => __( 'Title', 'alone' ),
    ),
    'context' => 'content',
  ),
  'content' => array(
    'type'    => 'editor',
    'ui' => array(
      'title' => __( 'Content', 'alone' ),
    ),
  )
);
