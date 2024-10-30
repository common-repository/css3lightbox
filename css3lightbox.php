<?php
/*
* Plugin Name: CSS3 Lightbox
* Version: 1.0.3
* Plugin URI: http://www.digitalsday.com
* Description: CSS3 Lightbox is a high-performance pure CSS3 lightbox without jQuery or Javascript and works with all modern browser. Mobile optimized, faster and smarter than any other jQuery lightbox
* Author: Rene Hermenau, Steffen Arnold
* Author URI: http://www.digitalsday.com
  
* CSS3 Lightbox is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 2 of the License, or
* any later version.
*
* CSS3 Lightbox is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Click-Fraud Monitoring. If not, see <http://www.gnu.org/licenses/>.
*/

/* Quit */
defined('ABSPATH') OR exit;

/* Define some important constants
 * VERSION_KEY is important for the upgrade routine. Must be updated to current version */
if (!defined('CSS3LIGHTBOX_VERSION_KEY'))
    define('CSS3LIGHTBOX_VERSION_KEY', 'css3lightbox_version');

if (!defined('CSS3LIGHTBOX_VERSION_NUM'))
    define('CSS3LIGHTBOX_VERSION_NUM', '1.0.3');
add_option(CSS3LIGHTBOX_VERSION_KEY, CSS3LIGHTBOX_VERSION_NUM);

global $wpdb;
global $installed_ver;

/* get the current version */
//$installed_ver = get_option('mashsharer_version');

define('CSS3LIGHTBOX_INSTALLED_VER', get_option('mashsharer_version'));
define('CSS3LIGHTBOX_PLUGIN_URL', plugin_dir_url( __FILE__ )); //production
define('CSS3LIGHTBOX_PLUGIN_INSTALL_FILE', plugin_basename(__FILE__));

include_once ('class.css3lightbox.php');

if( !is_admin()){
	function css3lightbox_add_styles() {
	wp_register_style('css3lightbox_style', plugins_url('assets/style.css', __FILE__));
	wp_enqueue_style('css3lightbox_style');
}
add_action( 'wp_enqueue_scripts', 'css3lightbox_add_styles' );
}
 /* redirect user to settings page after activation - comes later*/
 
 /*function css3lightbox_redirect() {
    if (get_option('css3lightbox_do_activation_redirect', false)) {
        delete_option('css3lightbox_do_activation_redirect');
        if(!isset($_GET['activate-multi']))
        {
            wp_redirect("options-general.php?page=css3lightbox-config");
        }
    }
}
 add_action('admin_init', 'css3lightbox_redirect');   
*/
?>