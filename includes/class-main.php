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
		add_shortcode( 'sepomex_form', array( $this, 'sepomex_form_shortcode' ) );
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
	 * Handle the sepomex_form shortcode.
	 *
	 * @return string The HTML output for the shortcode.
	 */
	public function sepomex_form_shortcode() {
		ob_start();
		?>
		<div class="sepomex-api-form">
			<h2>Sepomex API Form</h2>
			<form method="post" action="">
				<div>
					<label for="zipcode">Enter Zip Code:</label>
					<input type="text" id="zipcode" name="zipcode" maxlength="5" placeholder="12345" required>
				</div>
				<div>
					<label for="state">Select State:</label>
					<select id="state" name="state" required>
						<option value="">Choose a state...</option>
					</select>
				</div>
				<div>
					<input type="submit" value="Submit">
				</div>
			</form>
		</div>
		<?php
		return ob_get_clean();
	}
}
