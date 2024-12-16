<?php
function khabarxpress_enqueue_styles() {
    // Enqueue theme stylesheet
    wp_enqueue_style('khabarxpress-style', get_stylesheet_uri());

    // Enqueue Bootstrap CSS and JS
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);


    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', [], null);
}
add_action('wp_enqueue_scripts', 'khabarxpress_enqueue_styles');


// Add theme support
function khabarxpress_setup() {
    // Add support for a custom logo
    add_theme_support('custom-logo', [
        // 'height'      => 100,
        // 'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    // Register menus
    register_nav_menus([
        'primary-menu' => __('Primary Menu', 'khabarxpress'),
        'social-menu'  => __('Social Menu', 'khabarxpress'),
    ]);
}
add_action('after_setup_theme', 'khabarxpress_setup');

// Register widget area for header ads
function khabarxpress_widgets_init() {
    register_sidebar([
        'name'          => __('Header Advertisement', 'khabarxpress'),
        'id'            => 'header-ads',
        'before_widget' => '<div class="header-ads">',
        'after_widget'  => '</div>',
    ]);
}
add_action('widgets_init', 'khabarxpress_widgets_init');

// Customize theme options
function khabarxpress_customize_register($wp_customize) {
    // Social Links section
    $wp_customize->add_section('social_links', [
        'title'    => __('Social Links', 'khabarxpress'),
        'priority' => 40,
    ]);

    // Define social networks
    $social_networks = ['facebook', 'twitter', 'instagram', 'linkedin'];

    // Add settings and controls for each social network link
    foreach ($social_networks as $network) {
        $wp_customize->add_setting("{$network}_link", [
            'default' => '#',
        ]);
        $wp_customize->add_control("{$network}_link", [
            'label'   => ucfirst($network) . ' URL',
            'section' => 'social_links',
            'type'    => 'url',
        ]);
    }
}
add_action('customize_register', 'khabarxpress_customize_register');



function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
?>
