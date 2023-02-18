<?php 

//add option for mutilple feuture images(wigets)

//upload media to wp with wp rest

//manage wp archieve for media


//wp regiter rest route
function create_rest_route(){
    add_action("rest_api_init",[$this,"register_route"]);
}
    
function register_route(){

    register_rest_route("/photo","/upload",[
    'methods' => ['GET','POST'],
    'callback' => "rest_route_callback",
    ]);
 }

 
function rest_route_callback(WP_REST_Request $request){
    return "request has recieved";
}
