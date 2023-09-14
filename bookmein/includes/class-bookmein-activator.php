<?php

/**
 * Fired during plugin activation
 *
 * @link       http://localhost/ariful-islam
 * @since      1.0.0
 *
 * @package    Bookmein
 * @subpackage Bookmein/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Bookmein
 * @subpackage Bookmein/includes
 * @author     Ariful Islam <localhost@ariful.islam.com>
 */



/*
//structure
1.data base
   1.Admin detail
   2.campaign
     1.name
     2.Id
     3.Date
     4.Link
     5.Fields
   2.clients detail
     1.Id
     2.campaign id
     3.info(jason obj)
*/

//make data base based on the information avobe




class Bookmein_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
public  function activate(){
//Creating database table
global $wpdb;
require_once ABSPATH.'/wp-admin/includes/upgrade.php';


//query for table wp_bookmein_campaigns table
$sql_wp_bookmein_campaigns = "CREATE TABLE `wp_bookmein_campaigns` (
	`id` int NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`fields` varchar(1200) NOT NULL,
	`date` date NOT NULL,
	`link` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";	

dbDelta($sql_wp_bookmein_campaigns);


//query for table wp_bookmein_clients_detail table
$sql_wp_bookmein_clients_detail ="CREATE TABLE `wp_bookmein_clients_detail` (
		`id` int NOT NULL AUTO_INCREMENT,
		`campaign_id` int NOT NULL,
		`details` varchar(1200) NOT NULL,
		PRIMARY KEY (`id`),
		FOREIGN KEY (campaign_id) REFERENCES wp_bookmein_campaigns(id)
	   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";	

dbDelta($sql_wp_bookmein_clients_detail);
		


}
}
