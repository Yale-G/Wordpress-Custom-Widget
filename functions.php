<?php

// Theme supports.
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

// Creating the widget 
class wpb_widget extends WP_Widget {
  
    function __construct() {
    parent::__construct(
      
    // Base ID of your widget
    'wpb_widget', 
      
    // Widget name will appear in UI
    __('WPDummy Widget', 'wpb_widget_domain'), 
      
    // Widget description
    array( 'description' => __( 'Sample dummy widget', 'wpb_widget_domain' ), ) 
    );
    }
      
    // Creating widget front-end
      
    public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
      
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
      
    // This is where you run the code and display the output
    echo __( 'Dummy Widget with dummy content', 'wpb_widget_domain' );
    echo $args['after_widget'];
    }
              
    // Widget Backend 
    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
    }
    else {
    $title = __( 'New title', 'wpb_widget_domain' );
    }
    // Widget admin form
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
    name="<?php echo $this->get_field_name( 'title' ); ?>" 
    type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php 
    }
          
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
    }
     
    // Class wpb_widget ends here
    } 
     
     
    // Register and load the widget
    function wpb_load_widget() {
        register_widget( 'wpb_widget' );
    }
    add_action( 'widgets_init', 'wpb_load_widget' );

// Sidebars
function flame_news_post_widgets_init() {
    register_sidebar( array(
        'name'          => 'Primary Sidebar' ,       
        'id'            => 'primary',
        'description'   => 'this is a simple sidebar',
        'before_widget' => '<div id="%1s" class="widget %2s">' ,
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="title-widget">',
        'after_title'   => '</h5>'
    ));

}

add_action( 'widgets_init', 'flame_news_post_widgets_init');

// Menus.
function register_menus() {

    register_nav_menus( array(
        'main_menu'         => 'Main Menu',
        'complementary_menu' => 'Complementary Menu',
        'category_menu'     => 'Category Menu',
        'footer_menu'       => 'Footer Menu'
    ));
}

add_action( 'init', 'register_menus' ); // do_action( 'init' );

// Theme Assets.
function register_theme_scripts() {
    wp_enqueue_style('style', get_stylesheet_uri());
}
// var_dump(get_stylesheet_uri());
add_action( 'wp_enqueue_scripts', 'register_theme_scripts');