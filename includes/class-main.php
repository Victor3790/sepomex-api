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
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
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
				<div class="mt-3">
					<label class="sepomex-label" for="zipcode">Código Postal:</label>
					<input 
						class="sepomex-form-control" 
						type="text" 
						inputmode="numeric" 
						pattern="[0-9]*" 
						maxlength="5" 
						id="zipcode" 
						name="zipcode" 
						required placeholder="Ingresa tu código postal..."
					>
				</div>
				<div class="mt-3">
					<label class="sepomex-label" for="state">Estado:</label>
					<select class="sepomex-form-control" id="state" name="state" required>
						<option value="">Selecciona un estado...</option>
					</select>
				</div>
				<div class="mt-3">
					<label class="sepomex-label" for="municipality">Municipio:</label>
					<select class="sepomex-form-control" id="municipality" name="municipality" required>
						<option value="">Selecciona un municipio...</option>
					</select>
				</div>
				<div class="mt-3">				
					<label class="sepomex-label" for="colonia">Colonia:</label>
					<select class="sepomex-form-control" id="colonia" name="colonia" required>
						<option value="">Selecciona una colonia...</option>
					</select>
				</div>
				<div class="mt-3">					
					<input type="submit" value="Submit">
				</div>
			</form>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Enqueue scripts and styles.
	 */
	public function enqueue_scripts() {
		wp_enqueue_style(
			'sepomex-api-css',
			\Sepomex_API\PLUGIN_URL . 'assets/css/styles.css',
			array(),
			\Sepomex_API\VERSION
		);

		wp_enqueue_script(
			'sepomex-api-js',
			\Sepomex_API\PLUGIN_URL . 'assets/js/sepomex-api.js',
			array( 'jquery' ),
			\Sepomex_API\VERSION,
			true
		);
	}
}
