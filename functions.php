<?php
// Add theme support for featured images
add_theme_support('post-thumbnails');

// Optional: Set default thumbnail sizes
set_post_thumbnail_size(300, 200, true);

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

    // Sidebar Ad 1
    register_sidebar( array(
        'name'          => 'Sidebar Ad 1',
        'id'            => 'sidebar-ad-1',
        'before_widget' => '<div class="sidebar-ad-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Sidebar Ad 2
    register_sidebar( array(
        'name'          => 'Sidebar Ad 2',
        'id'            => 'sidebar-ad-2',
        'before_widget' => '<div class="sidebar-ad-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Sidebar Ad 3
    register_sidebar( array(
        'name'          => 'Sidebar Ad 3',
        'id'            => 'sidebar-ad-3',
        'before_widget' => '<div class="sidebar-ad-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // After Block Ad 1
    register_sidebar( array(
        'name'          => 'After Block Ad 1',
        'id'            => 'after-block-ad-1',
        'before_widget' => '<div class="after-block-ad-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // After Block Ad 2
    register_sidebar( array(
        'name'          => 'After Block Ad 2',
        'id'            => 'after-block-ad-2',
        'before_widget' => '<div class="after-block-ad-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // After Block Ad 3
    register_sidebar( array(
        'name'          => 'After Block Ad 3',
        'id'            => 'after-block-ad-3',
        'before_widget' => '<div class="after-block-ad-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
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





    // Add Featured-post Options Section
    $wp_customize->add_section( 'featured_post_options' , array(
        'title'      => __( 'Featured-post Options', 'khabarxpress' ),
        'priority'   => 30,
        'description' => 'Customize the Featured Posts section settings',
    ));

    // Add Number of Posts Setting
    $wp_customize->add_setting( 'featured_number_of_posts', array(
        'default' => 6,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control( 'featured_number_of_posts', array(
        'label'      => __( 'Number of Posts', 'khabarxpress' ),
        'section'    => 'featured_post_options',
        'type'       => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 20,
        ),
    ));

    // Add Post Title Font Size Setting
    $wp_customize->add_setting( 'featured_post_title_font_size', array(
        'default' => '24px',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'featured_post_title_font_size', array(
        'label'      => __( 'Post Title Font Size', 'khabarxpress' ),
        'section'    => 'featured_post_options',
        'type'       => 'text',
    ));

    // Add Post Title Color Setting
    $wp_customize->add_setting( 'featured_post_title_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_post_title_color', array(
        'label'      => __( 'Post Title Color', 'khabarxpress' ),
        'section'    => 'featured_post_options',
    )));

    // Add Post Content Font Size Setting
    $wp_customize->add_setting( 'featured_post_content_font_size', array(
        'default' => '16px',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'featured_post_content_font_size', array(
        'label'      => __( 'Post Content Font Size', 'khabarxpress' ),
        'section'    => 'featured_post_options',
        'type'       => 'text',
    ));

    // Add Post Content Color Setting
    $wp_customize->add_setting( 'featured_post_content_color', array(
        'default' => '#666666',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_post_content_color', array(
        'label'      => __( 'Post Content Color', 'khabarxpress' ),
        'section'    => 'featured_post_options',
    )));
}
add_action('customize_register', 'khabarxpress_customize_register');



function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );



function welcome_advertisement_customize_register($wp_customize) {
    // Section
    $wp_customize->add_section('welcome_advertisement_section', array(
        'title'       => __('Welcome Screen Advertisement', 'textdomain'),
        'description' => __('Settings for the Welcome Screen Advertisement', 'textdomain'),
        'priority'    => 160,
    ));

    // Enable Advertisement Toggle
    $wp_customize->add_setting('enable_advertisement', array(
        'default' => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('enable_advertisement', array(
        'type'     => 'checkbox',
        'section'  => 'welcome_advertisement_section',
        'label'    => __('Enable Advertisement', 'textdomain'),
    ));

    // Advertisement Design Layout
    $wp_customize->add_setting('advertisement_layout', array(
        'default' => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('advertisement_layout', array(
        'type'    => 'select',
        'section' => 'welcome_advertisement_section',
        'label'   => __('Advertisement Design Layout', 'textdomain'),
        'choices' => array(
            'default' => __('Default', 'textdomain'),
            'custom'  => __('Custom', 'textdomain'),
        ),
    ));

    // Welcome Message
    $wp_customize->add_setting('advertisement_message', array(
        'default'           => __('Welcome Advertisement Message', 'textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('advertisement_message', array(
        'type'    => 'text',
        'section' => 'welcome_advertisement_section',
        'label'   => __('Welcome Advertisement Message', 'textdomain'),
    ));

    // Advertisement Image
    $wp_customize->add_setting('advertisement_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'advertisement_image', array(
        'label'    => __('Upload Advertisement Image', 'textdomain'),
        'section'  => 'welcome_advertisement_section',
    )));

    // Advertisement Link
    $wp_customize->add_setting('advertisement_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('advertisement_link', array(
        'type'    => 'url',
        'section' => 'welcome_advertisement_section',
        'label'   => __('Advertisement Link', 'textdomain'),
        'description' => __('Leave empty if you don\'t want the image to have a link.', 'textdomain'),
    ));
}
add_action('customize_register', 'welcome_advertisement_customize_register');


?>