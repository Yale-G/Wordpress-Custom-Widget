<?php
// Widget constructor
class crp_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
           
            //ID 
            'crp_widget',

            //Name
            'Custom Recent Posts',

            //Description
            array( 'description' => 'A custom widget showing the 
                most recent posts in the website')
        );
    }

    // Widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

        
        // before & after widget args defined by the theme
        echo $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        ?>

        <!-- Display Output -->
        <?php 
        // the custom query
        $query_args = array( 'cat'            => '22',
                             'posts_per_page' => '3'
                             );
        $the_query = new WP_Query( $query_args ); ?>
 
        <?php if ( $the_query->have_posts() ) : ?>
           

            <!-- pagination here -->
 
            <!-- the loop -->
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'thumbnail' ); ?>
                <?php endif ?>
                <a href="<?php the_permalink() ?>" rel="bookmark" title=" <?php the_title_attribute(); ?>">
                <?php the_title(); ?></a>
                <div class="post-dates">
                    <?php the_time('F j, Y') ?>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <!-- end of the loop -->
 
            <!-- pagination here -->
 
        
 
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
        



      
        <?php 
        echo $args['after_widget'];
    }
    

    // back-end (if the title is not registered)
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            
        }
        else {
            $title = 'New title';
        }
        if ( isset( $instance[ 'tasos' ] ) ) {
            $tasos = $instance[ 'tasos' ];
        }
        else {
            $tasos = 'Place your text here ... ';
        }
        // widget admin form
        ?> 
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
                name="<?php echo $this->get_field_name( 'title' ); ?>" 
                type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'tasos' ); ?>"><?php _e( 'Text:' ); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'tasos' ); ?>" 
                name="<?php echo $this->get_field_name( 'tasos' ); ?>" ><?php echo esc_attr( $tasos ); ?></textarea>

            </p>
        <?php    
    }

    // Updating widget replace old instance with new 
    public function update( $new_instance, $old_instance ) {
        $instance            = array();
        $instance[ 'title' ] = ( ! empty( $new_instance[ 'title' ] ) ) ? strip_tags( $new_instance[ 'title' ] ) : '';
        $instance[ 'tasos' ] = ( ! empty( $new_instance[ 'tasos' ] ) ) ? strip_tags( $new_instance[ 'tasos' ] ) : '';
        return $instance;
    }

}

// Register/load the widget
function crp_load_widget() {
    register_widget( 'crp_widget' );
}
add_action( 'widgets_init' , 'crp_load_widget' );


?>

