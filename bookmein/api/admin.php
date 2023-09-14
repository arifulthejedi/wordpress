<?php
/*
*Handle all request and response for admin
*Register all route for admin
*create,delete campaign
*Verify admin request
*/


global $wpdb;
//include form components object
include 'component.php';

//include form function 
include 'form.php';
$components = new formComponents;


add_action('rest_api_init','api_bookmein');//wp REST API hook

//function for register route
function api_bookmein($server){
    register_rest_route("bookmein/v1","/admin",[
        'methods'  => 'POST,GET',
        'callback' => 'api_handler',
    ]);
}

//function for handle client request
function api_handler(WP_REST_Request $request){

//here Verifying Admin functionality should be add
    $body = $request->get_body();//request body
    $object = json_decode($body);

//here Verifying the admin request data should be add
    global $components;
    global $admin;
    $form = form($object,$components);

//wp creating remote post
  $url = "http://localhost/wp-json/wp/v2/posts";

// $response = wp_remote_post($url,[
// 'headers' =>[
//             'Authorization' => 'Basic ' . base64_encode('admin:admin'),
// ],//pass and name of admin
// "body" => [
//     "title" => $object[0][0]->title,
//     "content" => $form,
//     "status" => "publish"
// ]]);

return  ":(";
}


