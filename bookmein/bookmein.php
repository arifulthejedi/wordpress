<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://localhost/ariful-islam
 * @since             1.0.0
 * @package           Bookmein
 *
 * @wordpress-plugin
 * Plugin Name:       BookmeIn
 * Plugin URI:        http://localhost/bookmein
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Ariful Islam
 * Author URI:        http://localhost/ariful-islam
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bookmein
 * Domain Path:       /languages
 */


/*
//Functionality of the plugin
1.admin can add and delete input field
2.multiple admin  
3.add different type of input filed
4.sending otp by email
6.admin define the shedule single/multiple shedule can be add
7.admin can CRUD the users
8.admin can visiually customize the sumbmit form data
9.admin can sent and automate massages to users through email
10.manage multiple campaign
*/



// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


//including basic auth
include 'basic_auth.php';



/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BOOKMEIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bookmein-activator.php
 */
function activate_bookmein() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bookmein-activator.php';
	$act = new Bookmein_Activator();
	$act->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bookmein-deactivator.php
 */
function deactivate_bookmein() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bookmein-deactivator.php';
	$dact = new Bookmein_Deactivator();
	$dact->deactivate();
}

register_activation_hook( __FILE__, 'activate_bookmein' );
register_deactivation_hook( __FILE__, 'deactivate_bookmein' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bookmein.php';
require plugin_dir_path( __FILE__ ) . 'api/admin.php';



/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bookmein() {

	$plugin = new Bookmein();
	$plugin->run();

}
run_bookmein();

