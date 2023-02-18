 ==========>>Wp Widget<<==========

# class My_Widget extends WP_Widget 
for creating widget call property must be inherited from WP_widget

# WP_widget for methodes
for creating a custom widget generally methode are over write

# public function __construct()
this methode for initialize the widget and set widget name and $arg
parent::__construct(
			'my-widget',  // Base ID
			'My Widget'   // Name
		);
add_action( 'widgets_init', function() { //register widget by action hook
			register_widget( 'My_Widget' );
		});

public $args = array( //this property is for set up arguent to pass them to form,update,and widget methode
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
		'before_widget' => '<div class="widget-wrap">',
		'after_widget'  => '</div></div>',
)


# public function form( $instance ) 
this function is for admin fron-end where admin set all custom value for widget
$intance argument of the methode represent the value (array) have already setted to widgets

$this->get_field_id('title') //this methode set a field for widget and get field id
$this->get_field_name('title') // this return a particular field name



# public function update( $new_instance, $old_instance )
this function set argument and return the argument for widget 
so that form methode use that arguments of array and set value for widget
$new_instance represent the current setted value by $this->get_field_id() methode
to set the value for widget the sytex bellow can be follwed

$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
$text  = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'text_domain' );

return $instance //returning the set for value for widget

# public function widget( $args, $instance ) 
this function is for wedsite fron-end section
$args represent default widget wrapper
$args["before_widget"] and $args["after_widget"] used for wrape the widget[rercommender for wrap up widget]
$instance represent the value setted on form methode