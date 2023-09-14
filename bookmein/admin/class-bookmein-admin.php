<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://localhost/ariful-islam
 * @since      1.0.0
 *
 * @package    Bookmein
 * @subpackage Bookmein/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bookmein
 * @subpackage Bookmein/admin
 * @author     Ariful Islam <localhost@ariful.islam.com>
 */
class Bookmein_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/*
		Here place for attatch all css script for admin panel
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bookmein-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'custom', plugin_dir_url( __FILE__ ) .'css/custom-1.css',array(), $this->version, 'all' );
		//wp_enqueue_style( 'bootstrap-theme', plugin_dir_url( __FILE__ ) . 'css/theme.css',array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

        /*
		Here all js script file include on admin panel
		*/
         //arg for attatch js on footer false for attach on header
		 wp_enqueue_script( 'bootstrap', plugin_dir_url( __FILE__ ) . 'js/bookmein.js','', $this->version,true);
		 wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bookmein-admin.js','', $this->version,true);
	}

		//function for admin manu
		public function bookmein_menu(){
			add_menu_page( 'Book me In plugin', 'BookmeIn', 'manage_options',"bookmein",[$this,'bookmein_component'],'dashicons-database', 70 );

			//submenu1 for showing campaigns
			add_submenu_page( 'bookmein', 'Campaigns', 'Campaigns','manage_options', 'bookmein-campaigns',[$this,'bookmein_campaigns']);

			//submenu2 for showing clients details
			add_submenu_page( 'bookmein', 'Clients', 'Clients','manage_options', 'bookmein-clients',[$this,'bookmein_clients']);    
}


//Bookmein html template
public function bookmein_component(){
	        ob_start();
			include 'partials/bookmein.php';			
	        ob_end_flush();
		}


//campaigns html template
public function bookmein_campaigns(){
	ob_start();
	include 'partials/campaigns.php';
	ob_end_flush();
}

//bookmein html clients
public function bookmein_clients(){
	ob_start();
	include 'partials/clients.php';
	ob_end_flush();
	}
	
}
