=== Visual Composer Templates Library ===
Contributors: (this should be a list of wordpress.org userid's)
Donate link: #
Tags: visual composer, template default, visual composer template
Requires at least: 4.2.0
Tested up to: 4.8.0
Stable tag: 4.7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This plugin provides a framework for creating themes and plugins that utilize the built-in template function in Visual Composer (as of version 4.4). It works by loading templates from files in your theme (and optionally plugin) folders, making it possible to version control templates in a simple way.


== Description ==

## Visual Composer Templates Library

This plugin provides a framework for creating themes and plugins that utilize the built-in template function in Visual Composer (as of version 4.4)

Video Demo:
[youtube https://www.youtube.com/watch?v=oIfizD9Qz3E]

It works by loading templates from files in your theme (and optionally plugin) folders, making it possible to version control templates in a simple way.

### Building templates

Building a template is easy. Start out by creating a layout in Visual Composer. (For example, by creating a new page with the layout you want.)

When you are done, click the "Classic mode" button to return to the TinyMCE WYSISYG, and then click on the Text tab. Now you can copy the content of your layout into a template!

Workflow:
screenshot-1.(png|jpg|jpeg|gif)


### Using in a theme

To bundle templates with your theme, create the folder:

`
/your-theme/vc_templates
`

Then, create a file, for example:

`
/your-theme/vc_templates/my-template.php
`

The only requirement is that the file has a .php extension.

Paste the template you got from the "Building templates" section above, and you will see a new template called "My Template" after you click on Templates > Default Templates in Visual Composer. You're done!

Workflow: 
screenshot-2.(png|jpg|jpeg|gif)

== Installation ==
 
This section describes how to install the plugin and get it working.

e.g.

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the Settings->Plugin Name screen to configure the plugin
1. (Make your instructions match the desired user flow for activating and installing your plugin. Include any steps that might be needed for explanatory purposes)


== Frequently Asked Questions ==


== Screenshots ==
screenshot-1.(png|jpg|jpeg|gif)
screenshot-2.(png|jpg|jpeg|gif)
screenshot-3.(png|jpg|jpeg|gif)
screenshot-4.(png|jpg|jpeg|gif)
screenshot-5.(png|jpg|jpeg|gif)
screenshot-6.(png|jpg|jpeg|gif)
screenshot-7.(png|jpg|jpeg|gif)
screenshot-8.(png|jpg|jpeg|gif)
screenshot-9.(png|jpg|jpeg|gif)
screenshot-10.(png|jpg|jpeg|gif)
screenshot-11.(png|jpg|jpeg|gif)
screenshot-12.(png|jpg|jpeg|gif)
screenshot-13.(png|jpg|jpeg|gif)

== Changelog ==

= 1.0 =
* Released 1.0.0