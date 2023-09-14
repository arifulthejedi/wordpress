<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://localhost/ariful-islam
 * @since      1.0.0
 *
 * @package    Bookmein
 * @subpackage Bookmein/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bookmein
 * @subpackage Bookmein/public
 * @author     Ariful Islam <localhost@ariful.islam.com>
 */
class Bookmein_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
public function enqueue_styles() {
//custom css for public 
wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bookmein-public.css', array(), $this->version, 'all' );

//Boostrap css
wp_enqueue_style( 'Boostrap', plugin_dir_url( __FILE__ ) . 'css/boostrap.css', array(), $this->version, 'all' );
//boostrap theme
wp_enqueue_style( 'theme', plugin_dir_url( __FILE__ ) . 'css/theme.css', array(), $this->version, 'all' );

}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *Need to make functionality for equeue script on spacific posts
	 * @since    1.0.0
	 */
public function enqueue_scripts() {
//$arg attach js in footer and false attach in header of wp theme
//Boostrap js
wp_enqueue_script( 'Boostrap', plugin_dir_url( __FILE__ ) . 'js/bookmein.js', array('jquery'), $this->version,"" );
//custom js
wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bookmein-public.js', array(), $this->version,"" );

}


}