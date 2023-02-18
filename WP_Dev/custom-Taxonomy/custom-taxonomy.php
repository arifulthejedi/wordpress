<?php 


// Register Taxonomy 

class RegisterTaxonomy{
	private $name_pl,$name,$post_type,$description,$slug,$request_route;

	public function __construct($name,$plural,$slug,$post_type,$description){

		$this->name = $name;
		$this->slug = $slug;
		$this->post_type = $post_type;
		$this->description = $description;
		$this->name_pl = $plural;
		add_action( 'init',[$this,"create_tax"]);
	}
	public function create_rest_route(){
		add_action("rest_api_init",[$this,"register_route"]);
	}
	
	public function create_tax(){

	$labels = array(
		'name'              => _x( $this->name_pl, 'taxonomy general name', 'textdomain' ),//name plu
		'singular_name'     => _x( $this->name, 'taxonomy singular name', 'textdomain' ),//name sing
		'search_items'      => __( 'Search'.$this->name_pl, 'textdomain' ), //label for admin panel
		'all_items'         => __( 'All '.$this->name_pl, 'textdomain' ),//label for admin panel
		'parent_item'       => __( 'Parent '.$this->name, 'textdomain' ),
		'parent_item_colon' => __( 'Parent '.$this->name.':', 'textdomain' ),
		'edit_item'         => __( 'Edit '.$this->name, 'textdomain' ),//edit label for admin panel
		'update_item'       => __( 'Update '.$this->name, 'textdomain' ),//update label for admin panel
		'add_new_item'      => __( 'Add New '.$this->name, 'textdomain' ), //title for addin new taxonomy on admin
		'new_item_name'     => __( 'New '.$this->name.' Name', 'textdomain' ),//title for addin new taxonomy name on admin
		'menu_name'         => __( $this->name, 'textdomain' ), //title for taxonomy on admin panel
	);


	$args = array(
		'labels' => $labels,
		'description' => __( $this->description, 'textdomain' ),//description of taxonomy
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'rest_base' => $this->slug,
	);
/*
$ar1 = slug of taxonomy 
$arg2 = array of post type slug
*/
register_taxonomy( $this->slug,$this->post_type, $args); 
}

public function register_route(){

	$this->request_route = str_replace("wp-json/".$this->slug."/","", $_SERVER["REQUEST_URI"]);

    register_rest_route($this->slug,$this->request_route,[
	'methods' => 'GET',
    'callback' => [$this,"rest_route_callback"],
	]);
 }

 public function rest_route_callback(WP_REST_Request $request){
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$the_query = new WP_Query( array(
		'tax_query' => array(
			array (
				'taxonomy' =>$this->slug,
				'field' => 'slug',
				'terms' => $this->request_route,
			)
		),
		'posts_per_page' => 10,
		'paged' =>  $paged,
	) );
    $posts = $the_query->get_posts();
	 
	return $posts;
}



}

