<?php
/**
 * Plugin Name: Piklist Plugin Builder
 * Plugin URI: http://lautman.ca
 * Description: Boilerplate for building WordPress plugins with Piklist
 * Version:0.1
 * Author: michaellautman
 * Author URI: http://lautman.ca
 * Plugin Type: Piklist
 *

 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume 
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *

 * @license http://www.gnu.org/licenses/old-licenses/gpl-3.0.html
 */

/* Launch the plugin. */

/***DO NOT DELETE OR EDIT*/

/*Include the Piklist Checker*/
add_action('init', 'my_init_function');
function my_init_function()
{
  if(is_admin())
  {
   include_once('class-piklist-checker.php');
 
   if (!piklist_checker::check(__FILE__))
   {
     return;
   }
  }
}

/***START BUILDING YOUR PLUGIN*/
//Register The Settings Page
//Customize to Build Your Settings Page
add_filter('piklist_admin_pages', 'builder_setting_pages');
  function builder_setting_pages($pages)
  {
     $pages[] = array(
      'page_title' => __('Builder Settings')
      ,'menu_title' => __('Builder', 'piklist')
      ,'sub_menu' => 'themes.php' //Under Appearance menu
      ,'capability' => 'manage_options'
      ,'menu_slug' => 'custom_settings'
      ,'setting' => 'builder_settings'
      ,'menu_icon' => plugins_url('piklist/parts/img/piklist-icon.png')
      ,'page_icon' => plugins_url('piklist/parts/img/piklist-page-icon-32.png')
      ,'single_line' => true
      ,'default_tab' => 'Basic'
      ,'save_text' => 'Save Settings'
    );
 
    return $pages;
  }
 
//Register Custom Post Type
//Uncomment and Customize to create a Custom Post Type
/*
add_filter('piklist_post_types', 'builder_demo_post_type');
 function builder_demo_post_type($post_types)
 {
  $post_types['builder'] = array(
    'labels' => piklist('post_type_labels', 'Builder Demo')
    ,'title' => __('Enter a new  Title')
    ,'public' => true
    ,'rewrite' => array(
      'slug' => 'builder-demo'
    )
    ,'supports' => array(
      'author'
      ,'revisions'
    )
    ,'hide_meta_box' => array(
      'slug'
      ,'author'
      ,'revisions'
      ,'comments'
      ,'commentstatus'
    )
  );
return $post_types;
}
*/