<?php


/*
1.Copy the full script
2.then customize the script then implement

#methodes
1.constructor for setting the name for widget
2.my_widget_enqueue_script($callback) for enqueue the css and js for the widget
3.widget for the widget fronend [here you can include any particular component $instance contain all argument]
4.form for the admin[here you set the argument for widgets]
5.update for update the widget argument
6.You can also add cutom $custom valriable argument inside the class but outside the class taking any variable value not work
 
*/

class My_widget extends WP_Widget{

	public function __construct() {
		parent::__construct(
			   "my-custom-widget",  // Base ID set class name for the widget section
			    "My custom widget" // Name for the widget
		);
        add_action( 'widgets_init', function() {
			register_widget('My_widget');
		});
	}

    //enqueuing script for the widget
	static public function my_widget_enqueue_script($widget_theme_enqueue_script){
        add_action('wp_enqueue_scripts', $my_theme_enqueue_script);
	}
    
    

	public function widget($args,$instance){
		echo $args["before_widget"];
        /*
        Place for Include the Fronend Componet
        */
        echo "<center><h4>Silence is Golden</h4></center>";
        echo "<pre>"; 
        print_r($instance);    
		echo $args["after_widget"];

	}


	public function form($instance){ //form for admin
        /*
        setting all argument for backend form 
        */
        $argument = [
            "Name",
            "Age",
            "Id",
            "Hobby"
        ];
        foreach($argument as $key){
            $val = !empty( $instance[$key] ) ? $instance[$key] : esc_html__( '', 'text_domain' );
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id($key) ); ?>"><?php echo esc_html__( $key, 'text_domain' ); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id($key)); ?>" name="<?php echo esc_attr( $this->get_field_name($key) ); ?>" type="text" value="<?php echo esc_attr($val); ?>">
            </p>
          <?php
          }
	}

	public function update($new_instance,$old_instance){ //update form submitted value
      $instance = [];
	  
	  foreach($new_instance as $key){
      $instance[$key] =  ( ! empty( $new_instance[$key] ) ) ? strip_tags( $new_instance[$key] ) : '';

	  }

	  return $new_instance;

	}

}