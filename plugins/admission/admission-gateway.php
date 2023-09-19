<?php 

/**
* Plugin Name: Admission payment gateway plugin
* Description: This plugin can implement bkash pamyent in the wordpress site
* Author: Ariful Islam
* Version: 1.0.0
* License: MIT
* Requires PHP: 5.6
*/


//including the js and css file
function IncludeScriptUser() {
    // Enqueue custom JavaScript
    wp_enqueue_script('pymentGateway-users-script', plugin_dir_url(__FILE__) . 'assets/script.js',[], '1.0', true);

    // Enqueue custom CSS
    wp_enqueue_style('pymentGateway-users-style', plugin_dir_url(__FILE__) . 'assets/style.css',[], '1.0');
}


function IncludeScriptAdmin(){
       // Enqueue custom JavaScript
       wp_enqueue_script('pymentGateway-admin-script', plugin_dir_url(__FILE__) . 'assets/script.js',[], '1.0', true);

       // Enqueue custom CSS
       wp_enqueue_style('pymentGateway-admin-style', plugin_dir_url(__FILE__) . 'assets/style.css',[], '1.0'); 
}


add_action('wp_enqueue_scripts', 'IncludeScriptUser');//for visitor view

add_action('admin_enqueue_scripts', 'IncludeScriptAdmin');//for admin panel view




//creating custom database table
global $wpdb;
$table_name = $wpdb->prefix . 'bkash_payment_gateway';

$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE IF NOT EXISTS $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    class VARCHAR(100) NOT NULL,
    parent_name VARCHAR(100) NOT NULL,
    payment_method VARCHAR(100) NOT NULL,
    payment DOUBLE PRECISION NOT NULL,
    PRIMARY KEY  (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
$admission = dbDelta($sql);



//admin panel view
function my_plugin_add_menu_page() {
    add_menu_page(
        'My Plugin Settings',
        'Pament Gateway',
        'manage_options',
        'my-plugin-settings',
        'my_plugin_render_settings_page',
        'dashicons-admin-plugins',
        100
    );
}



function my_plugin_render_settings_page() { //here the admin panel view page 

//retrieve data from database
global $wpdb;
$table_name = $wpdb->prefix . 'bkash_payment_gateway';


$admission_data = $wpdb->get_results("SELECT * FROM $table_name", OBJECT);

    ?>
    <div id="bkash-payment-plugin-admin">
        <center><h2>My Plugin Settings</h2></center>
        <table>
            <thead>
            <tr>
                <th>Student</th>
                <th>Age</th>
                <th>Class</th>
                <th>Prent</th>
                <th>Payment Method</th>
                <th>Payment</th>
            </tr> 
           </thead>
           <tbody>
             <tr>
        <?php        
        if ($admission_data) {
            foreach ($admission_data as $row) {
                echo "<tr><td>$row->name</td><td>$row->age</td><td>$row->class</td><td>$row->parent_name</td><td>$row->payment_method</td><td>$row->payment</td></tr>";
            }
        } else {
            echo "No data found in the custom table.";
        }
               
        ?>
       </tbody>
    </table>
    </div>
    <?php
}



add_action('admin_menu', 'my_plugin_add_menu_page');




//creating a custom page
function create_custom_page() {
//user content view
$plugin_file = __FILE__;
$plugin_dir_path = plugin_dir_path($plugin_file);

$content = file_get_contents($plugin_dir_path."/assets/user-view.html");
    // Check if the page doesn't already exist
    $page = get_page_by_path("admission");
    if (!$page) {
        // Prepare the page data
        $page_data = array(
            'post_title'    => "Admisson",
            'post_content'  => $content,
            'post_status'   => 'publish',
            'post_type'     => 'page',   //post type you can change
            'post_name'     => 'admission',
        );

        // Insert the page into the database using wp_insert_post
        $page_id = wp_insert_post($page_data);

        if ($page_id) {
            echo "Custom page created successfully!";
        } else {
            echo "Failed to create custom page.";
        }
    } else {
        echo "Custom page already exists.";
    }
}

// Hook the create_custom_page function to run when the plugin is activated
register_activation_hook(__FILE__, 'create_custom_page');




//getiing data from user
function handle_user_data_submission($request) {
    $data = $request->get_json_params(); // Get JSON data sent by the user

  if($data['name'] && $data['parent_name'] && $data['age'] && $data['class'] && $data['payment_method'] && $data['payment']){
    //verify data

    //insert data
    global $wpdb;
    $table_name = $wpdb->prefix . 'bkash_payment_gateway';

    //$data = []; //data of user 
     $res = $wpdb->insert($table_name, $data); //inser to table
     if($res){
        return ["message" => "Data submitted Successfully","submit" => true];
     }else{
        return ["message" => "Data field submit","submit" => false];
     }

  }else{
    return ["message" => "Data field missing"];
  }

}

function register_custom_routes() {
    register_rest_route('payment/v1', 'submit', array(
        'methods' => 'POST',
        'callback' => 'handle_user_data_submission',
    ));
}

add_action('rest_api_init', 'register_custom_routes');



