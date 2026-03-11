<?php
/**
 * File class-main.php
 *
 * This file belongs to the Sepomex API plugin.
 *
 * Responsibilities:
 * - Initialize the plugin.
 * - Register WordPress hooks (actions and filters).
 *
 * @package    Sepomex_API
 * @since      1.0.0
 * @author     Your Name
 * @license    GPL-2.0-or-later
 */

namespace Sepomex_API;

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/**
 * Main class for the Sepomex API plugin.
 */
class Main {
	/**
	 * The plugin instance.
	 *
	 * @var Main
	 */
	private static $instance = null;

	/**
	 * The constructor.
	 */
	private function __construct() {
		$this->define_constants();

		// Add Hooks here.
		add_shortcode( 'sepomex_hello', array( $this, 'hello_world_shortcode' ) );
	}

	/**
	 * Get an instance.
	 *
	 * @return Main
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Define the constants for the plugin.
	 */
	private function define_constants() {
		if ( ! defined( __NAMESPACE__ . '\VERSION' ) ) {
			define( __NAMESPACE__ . '\VERSION', '1.0.0' );
		}

		if ( ! defined( __NAMESPACE__ . '\PLUGIN_DIR' ) ) {
			define( __NAMESPACE__ . '\PLUGIN_DIR', plugin_dir_path( SEPOMEX_API_PLUGIN_FILE ) );
		}

		if ( ! defined( __NAMESPACE__ . '\PLUGIN_URL' ) ) {
			define( __NAMESPACE__ . '\PLUGIN_URL', plugin_dir_url( SEPOMEX_API_PLUGIN_FILE ) );
		}
	}

	/**
	 * Handle the sepomex_hello shortcode.
	 *
	 * @return string The HTML output for the shortcode.
	 */
	public function hello_world_shortcode() {
		return '<h1>Hello World from Sepomex API!</h1>';
	}
}
