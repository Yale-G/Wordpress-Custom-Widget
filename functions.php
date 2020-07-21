<?php

// Theme supports.
add_theme_support( 'title-tag' );

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