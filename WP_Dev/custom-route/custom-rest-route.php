<?php

//custom rest route for retrieve content


class CustomRestRoute{
    private $taxonomy,$request_route;
    public function __construct($taxonomy){
         $this->taxonomy = $taxonomy;
         $this->create_rest_route();
    }


    public function create_rest_route(){
        add_action("rest_api_init",[$this,"register_route"]);
    }
        
    public function register_route(){

        $this->request_route = str_replace("wp-json/".$this->taxonomy."/","", $_SERVER["REQUEST_URI"]);
    
        register_rest_route($this->taxonomy,$this->request_route,[
        'methods' => 'GET',
        'callback' => [$this,"rest_route_callback"],
        ]);
     }
    
     public function rest_route_callback(WP_REST_Request $request){
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $the_query = new WP_Query( array(
            'tax_query' => array(
                array (
                    'taxonomy' =>$this->taxonomy,
                    'field' => 'slug',
                    'terms' => $this->request_route,
                )
            ),
            'posts_per_page' => 10, //for number of post retrieve
            'paged' =>  $paged,
        ) );
        $posts = $the_query->get_posts();
         
        return $posts;
    }

}






