<?php

//RegEx for url "/^\/route[.,!?()\/a-zA-Z0-9 ]+$/"


//custom route multilevel route not support;
class CustomRoute{
    private $route,$callBack;

    public function custom_route($route,$callback){
        $this->route = $route;
        $this->callBack = $callback;
        add_action("init",[$this,"action_callback"]);
    }

    public function action_callback(){
        $pattern = sprintf("/^\%s[.,!?()\/a-zA-Z0-9 ]+$/",$this->route);
        $req_uri = $_SERVER["REQUEST_URI"];
        if($req_uri == $this->route || preg_match($pattern,$req_uri)){
            $arg="";
            if($req_uri != $this->route){
                $arg = explode("/",str_replace($this->route."/","",$req_uri));
            }
            ($this->callBack)($arg); //call the callback function and array of argument pass in uri
            exit;
        }    
    }   
} 
