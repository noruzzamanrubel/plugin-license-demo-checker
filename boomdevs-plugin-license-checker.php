<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://boomdevs.com/
 * @since             1.0.0
 * @package           Boomdevs_Plugin_License_Checker
 *
 * @wordpress-plugin
 * Plugin Name:       BoomDevs Plugin License Checker
 * Plugin URI:        http://boomdevs.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            BoomDevs
 * Author URI:        http://boomdevs.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       boomdevs-plugin-license-checker
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BOOMDEVS_PLUGIN_LICENSE_CHECKER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-boomdevs-plugin-license-checker-activator.php
 */
function activate_boomdevs_plugin_license_checker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-boomdevs-plugin-license-checker-activator.php';
	Boomdevs_Plugin_License_Checker_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-boomdevs-plugin-license-checker-deactivator.php
 */
function deactivate_boomdevs_plugin_license_checker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-boomdevs-plugin-license-checker-deactivator.php';
	Boomdevs_Plugin_License_Checker_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_boomdevs_plugin_license_checker' );
register_deactivation_hook( __FILE__, 'deactivate_boomdevs_plugin_license_checker' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-boomdevs-plugin-license-checker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_boomdevs_plugin_license_checker() {

	$plugin = new Boomdevs_Plugin_License_Checker();
	$plugin->run();

}
run_boomdevs_plugin_license_checker();