<?php
require_once('includes/class-recent-widget.php');

// Theme supports.
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );



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