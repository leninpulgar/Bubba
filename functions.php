<?php

add_filter('show_admin_bar', '__return_false');

function bubba_script_enqueue() {

	//Google Fonts
    wp_register_style( 'Oswald', 'https://fonts.googleapis.com/css?family=Oswald');
    wp_register_style('OpenSans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800');
    wp_enqueue_style('Oswald');
    wp_enqueue_style('OpenSans');

	//CSS
	
	wp_enqueue_style( 'foundationcss', get_template_directory_uri() . '/css/foundation.css', array(), '6.0', 'all');
	wp_enqueue_style('foundationappcss', get_template_directory_uri(). '/css/app.css', array(), '6.0', 'all');
    wp_enqueue_style('socialregular', get_stylesheet_directory_uri() . '/fonts/social-regular/ss-social-regular.css', array(), '1.0', 'all');
    wp_enqueue_style('socialstandard', get_stylesheet_directory_uri() . '/fonts/standard/ss-standard.css', array(), '1.0', 'all');
    wp_enqueue_style( 'bubbastyle', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all' );

    //Template CSS

    wp_enqueue_style('theme-style', get_stylesheet_uri() );

	//JS
	wp_deregister_script('jquery');  
  	wp_register_script('jquery', get_template_directory_uri() . '/js/vendor/jquery.min.js', array(),'2.1.4',false);
	wp_enqueue_script( 'foundationjs', get_template_directory_uri() . '/js/foundation.js', array('jquery'), '6.0', true);
	wp_enqueue_script( 'what-input', get_template_directory_uri() . '/js/vendor/what-input.min.js', array('jquery'), '6.1', true);
	wp_register_script( 'app', get_template_directory_uri() . '/js/app.js', array('jquery'), '6.0', true);
	wp_enqueue_script('app');

	wp_register_script( $handle, $src, $deps, $ver, $in_footer );
	
	
	
}

add_action( 'wp_enqueue_scripts', 'bubba_script_enqueue');


function bubba_theme_setup() {
	
	add_theme_support('menus');
	
	register_nav_menu('primary', 'Primary Header Navigation');
	register_nav_menu('secondary', 'Footer Navigation');
	
}


add_action('init', 'bubba_theme_setup');