<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://boomdevs.com/
 * @since      1.0.0
 *
 * @package    Boomdevs_Plugin_License_Checker
 * @subpackage Boomdevs_Plugin_License_Checker/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Boomdevs_Plugin_License_Checker
 * @subpackage Boomdevs_Plugin_License_Checker/includes
 * @author     BoomDevs <contact@boomdevs.com>
 */
class Boomdevs_Plugin_License_Checker_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'boomdevs-plugin-license-checker',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
