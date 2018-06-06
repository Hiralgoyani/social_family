<?php
/*
Plugin Name: Visual Composer Templates Library
Description: Library Visual Composer Templates
Version: 1.0.2
GitHub Plugin URI: https://github.com/Huynhhuynh/vc-template-library
Author: SophieRepo
Author URI: https://sophierepo.com/vc-template-library
Text Domain: vctl
License: GPLv2 or later
*/

//Prefix for hooks
$VCTL_PREFIX = 'vctl';

/** Hook into VC and assembles "Default Templates" data **/
add_action('after_setup_theme', function()
{
    global $VCTL_PREFIX;

    /** Optionally remove the default templates **/
    add_filter('vc_load_default_templates', function($templates) use ($VCTL_PREFIX)
    {
        if(apply_filters("{$VCTL_PREFIX}_disable_builtin_templates", false))
            return array();
        else
            return $templates;
    }, 11);

    /** Add our templates **/
    add_filter('vc_load_default_templates', function($templates) use ($VCTL_PREFIX)
    {
        //Load templates from plugin /vc_templates directory
        $templates = array_merge($templates, vctl_load_templates(__DIR__ . "/vc_templates/*.php", 'vctl'));

        //Load templates from theme
        $templates = array_merge($templates, vctl_load_templates( trailingslashit(get_stylesheet_directory()) . 'vc_templates/*.php', 'theme'));

        //Load additional templates from plugins or themes
        foreach(apply_filters("{$VCTL_PREFIX}_template_locations", array()) as $additional_location)
            $templates = array_merge($templates, vctl_load_templates( trailingslashit($additional_location) . '*.php', 'plugin'));

        return $templates;
    }, 12);
});

if(! function_exists('vctl_load_templates')) :
  /**
   * Handles template loading
   *
   * @param string $folder
   * @param string $hook_prefix
   * @return array
   */
  function vctl_load_templates($folder = 'default_templates', $hook_prefix = 'vctl')
  {
      global $VCTL_PREFIX;

      $templates = array();

      //Load default tempaltes
      foreach (glob($folder) as $filename)
      {
        $template_params = vctl_get_template_data($filename);
        $filename_clean = basename($filename, '.php');

        $data = array();
        $data['name']         = __( apply_filters("{$VCTL_PREFIX}_{$hook_prefix}_name_{$filename_clean}", $template_params['template_name']), apply_filters("{$VCTL_PREFIX}_vctl", 'vctl') );
        $data['weight']       = apply_filters("{$VCTL_PREFIX}_{$hook_prefix}_weight_{$filename_clean}", apply_filters("{$VCTL_PREFIX}_default_weight", 0));
        $data['custom_class'] = apply_filters("{$VCTL_PREFIX}_{$hook_prefix}_class_{$filename_clean}", "vctl_{$hook_prefix}_{$filename_clean}");
        $data['content']      = apply_filters("{$VCTL_PREFIX}_{$hook_prefix}_content_{$filename_clean}", file_get_contents($filename));
        $templates[] = $data;
      }

      return $templates;
  }
endif;

if(! function_exists('vctl_prettify_name')) :
  /**
   * Prettifies an ugly file name
   *
   * @param $name
   * @return string
   */
  function vctl_prettify_name($name)
  {
      global $VCTL_PREFIX;

      //Normalize spaces
      $name = str_replace(array('-', '_'), ' ', $name);

      $ret = '';
      foreach(explode(' ', $name) as $word)
          $ret .= ucfirst($word) . ' ';

      return rtrim($ret);
  }
endif;

if(! function_exists('vctl_get_template_data')) :
  /**
   * vctl_get_template_data
   * @since 1.0.0
   */
  function vctl_get_template_data($file) {
    $default_headers = array(
      'template_name' => 'Template Name',
      'preview_image' => 'Preview Image',
      'descriptions'  => 'Descriptions',
    );

    return get_file_data($file, $default_headers);
  }
endif;
