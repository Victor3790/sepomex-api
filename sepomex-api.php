<?php
/**
 * Plugin Name: Sepomex API
 * Plugin URI:
 * Description: A WordPress plugin for integrating with Sepomex API
 * Version: 1.0.0
 * Author: Your Name
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package Sepomex_API
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

// Define the plugin file path.
if ( ! defined( 'SEPOMEX_API_PLUGIN_FILE' ) ) {
	define( 'SEPOMEX_API_PLUGIN_FILE', __FILE__ );
}

require_once 'includes/class-main.php';

$sepomex_api = Sepomex_API\Main::get_instance();
