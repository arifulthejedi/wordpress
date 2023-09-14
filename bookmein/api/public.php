<?php

/*
*Hndle all public request and verify data from publics
*Register route for publics
*Save data to wp_bookmein_clients_detail 
*/

//prototype of client request obj
/*
{
    post_id:'',
    form_data:{

    }
}

*/



global $wpdb;

//fetching all name from book-me-in campaign table
$count =$wpdb->get_var("SELECT `name` FROM `wp_bookmein_campaigns`");

$names = '';
//$names = $wpdb->get_col($wpdb->prepare("SELECT `name` FROM `wp_bookmein_campaign`"),ARRAY_N);
$names = $wpdb->get_results($wpdb->prepare("SELECT `name` FROM `wp_bookmein_campaign`"),ARRAY_N);


//rejistering the routes
add_action( 'rest_api_init', 'api_bookmenin');

//function for public route
function api_bookmenin($server){
    register_rest_route("bookmein/v1","/clients",[
        'methods'  => 'POST,GET',
        'callback' => 'api_handler',
    ]);
}




/*
*Functionality for handle rest request
*Check the post name in database
*verify the users data
*Send error
*send success status
*/
function api_handler(WP_REST_Request $request){
    //$request->get_body();//requested  body
    return "Connection is established :)";
}