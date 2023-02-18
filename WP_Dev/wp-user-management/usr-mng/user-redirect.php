<?php
//cutom redirection
class CustomRedirect{
    private $redirect_url,$request_routes;

    public function custom_redirect($redirect,$routes){
    $this->redirect_url = $redirect;
    $this->request_routes = $routes;
    $this->custom_redirect_action();
    }

   public function custom_redirect_callback(){
    if(in_array($_SERVER["REQUEST_URI"],$this->request_routes)){
        wp_redirect($this->redirect_url);
        exit;
       }
   }
   
   public function custom_redirect_action(){
    add_action('init',[$this,'custom_redirect_callback']);
   }
   
}

//asiign service for router