<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ragu.design
 * @since             1.0.0
 * @package           Flexib
 *
 * @wordpress-plugin
 * Plugin Name:       Flexible Blocks - Gutenberg Extended
 * Plugin URI:        http://flexibleblocks.com
 * Description:       Extend the gutenberg blocks with this plugin for more layouts
 * Version:           1.0.0
 * Author:            Ragu Design
 * Author URI:        https://ragu.design
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       flexib
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
define( 'FLEXIB_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-flexib-activator.php
 */
function activate_flexib() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-flexib-activator.php';
	Flexib_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-flexib-deactivator.php
 */
function deactivate_flexib() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-flexib-deactivator.php';
	Flexib_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_flexib' );
register_deactivation_hook( __FILE__, 'deactivate_flexib' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-flexib.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_flexib() {

	$plugin = new Flexib();
	$plugin->run();

}
run_flexib();
