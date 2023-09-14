<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://localhost/ariful-islam
 * @since      1.0.0
 *
 * @package    Bookmein
 * @subpackage Bookmein/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Bookmein
 * @subpackage Bookmein/includes
 * @author     Ariful Islam <localhost@ariful.islam.com>
 */
class Bookmein_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
      global $wpdb;
	  $wpdb->query("DROP TABLE IF EXISTS `wp_bookmein_clients_detail`");
	  $wpdb->query("DROP TABLE IF EXISTS `wp_bookmein_campaigns`");
	}

}
