<?php

// funcion para contar las letras de cada post en la introduccion en el index
     function custom_excerpt_length( $length ) {
      return 20;
       }
      add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
 
    // funcion para habilitar la opcion para subir imagenes destacadas a cada post
      add_theme_support( 'post-thumbnails' ); 

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
	register_nav_menu('secondary', 'Footer Navigation', array());
	
}


add_action('init', 'bubba_theme_setup');

//Function widget areas

/**
 * Register our sidebars and widgetized areas.
 *
 */
function footer_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'footer_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer_2',
		'id'            => 'footer_2',
		'class'			=> 'none',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<p class=""><strong>',
		'after_title'   => '</strong></p>',
	) );

	register_sidebar( array(
		'name'          => 'Footer_3',
		'id'            => 'footer_3',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<p class=""><strong>',
		'after_title'   => '</strong></p>',
	) );

}
add_action( 'widgets_init', 'footer_widgets_init' );



/**
 * WTI Custom Navigation Menu widget class
 *
 */

class Wti_Custom_Nav_Menu_Widget extends WP_Widget {

    function __construct() {
        $widget_ops = array( 'description' => __('Use this widget to add one of your custom menus as a widget.') );
        parent::__construct( 'custom_nav_menu', __('WTI Custom Menu'), $widget_ops );
    }

    function widget($args, $instance) {
        // Get menu
        $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

        if ( !$nav_menu )
            return;

        $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $args['before_widget'];

        if ( !empty($instance['title']) )
            echo $args['before_title'] . $instance['title'] . $args['after_title'];

        wp_nav_menu(
                array(
                    'fallback_cb' => '',
                    'container' => '',
                    'menu_class' => $instance['menu_class'],
                    'menu' => $nav_menu
                )
            );

        echo $args['after_widget'];
    }

    function update( $new_instance, $old_instance ) {
        $instance['title'] = strip_tags ( stripslashes ( $new_instance['title'] ) );
        $instance['menu_class'] = strip_tags ( stripslashes ( trim ( $new_instance['menu_class'] ) ) );
        $instance['nav_menu'] = (int) $new_instance['nav_menu'];

        return $instance;
    }

    function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : '';
        $menu_class = isset( $instance['menu_class'] ) ? $instance['menu_class'] : '';
        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

        // Get menus
        $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

        // If no menus exists, direct the user to go and create some.
        if ( !$menus ) {
            echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
            return;
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('menu_class'); ?>"><?php _e('Menu Class:') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('menu_class'); ?>" name="<?php echo $this->get_field_name('menu_class'); ?>" value="<?php echo $menu_class; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
            <select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
        <?php
            foreach ( $menus as $menu ) {
                echo '<option value="' . $menu->term_id . '"'
                    . selected( $nav_menu, $menu->term_id, false )
                    . '>'. $menu->name . '</option>';
            }
        ?>
            </select>
        </p>
        <?php
    }
}

function wti_custom_nav_menu_widget() {
    register_widget('Wti_Custom_Nav_Menu_Widget');
}

add_action ( 'widgets_init', 'wti_custom_nav_menu_widget', 1 );

//Relative URL Metaslider (for mobile)

function metaslider_protocol_relative_urls($cropped_url, $orig_url) {
    return str_replace('http://', '//', $cropped_url);
}
add_filter('metaslider_resized_image_url', 'metaslider_protocol_relative_urls', 10, 2);