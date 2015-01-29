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