<?php
/**
 * Functions and definitions
 *
 */


// Adds dynamic title tags
if ( ! function_exists( 'epignosis_theme_slug_setup' ) ) :
    function epignosis_theme_slug_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo' );
        add_theme_support('customizer');
    }
endif;

add_action( 'after_setup_theme', 'epignosis_theme_slug_setup' );


// Custom theme registration
function custom_theme_customize_register($wp_customize) {

    $wp_customize->add_section('custom_social_media_company', array(
        'title' => __('Company', 'custom-theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('company_title', array(
        'default' => __('Company Title', 'custom-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_title', array(
        'label' => __('Company Title', 'custom-theme'),
        'section' => 'custom_social_media_company',
        'type' => 'text',
    ));

    $wp_customize->add_setting('company_description', array(
        'default' => __('Company Description', 'custom-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_description', array(
        'label' => __('Company Description', 'custom-theme'),
        'section' => 'custom_social_media_company',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('twitter_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('twitter_link', array(
        'label' => __('Twitter Link', 'custom-theme'),
        'section' => 'custom_social_media_company',
        'type' => 'url',
    ));

    $wp_customize->add_setting('facebook_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('facebook_link', array(
        'label' => __('Facebook Link', 'custom-theme'),
        'section' => 'custom_social_media_company',
        'type' => 'url',
    ));

    $wp_customize->add_setting('instagram_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('instagram_link', array(
        'label' => __('Instagram Link', 'custom-theme'),
        'section' => 'custom_social_media_company',
        'type' => 'url',
    ));

    // Header
    $wp_customize->add_section('custom_header', array(
        'title' => __('Header', 'custom-theme'),
        'priority' => 30, // Adjust the priority as needed
    ));

    $wp_customize->add_setting('header_title', array(
        'default' => __('Header Title', 'custom-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('header_title', array(
        'label' => __('Header Title', 'custom-theme'),
        'section' => 'custom_header',
        'type' => 'text',
    ));


    $wp_customize->add_setting('header_description', array(
        'default' => __('Header Description', 'custom-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('header_description', array(
        'label' => __('Header Description', 'custom-theme'),
        'section' => 'custom_header',
        'type' => 'textarea',
    ));

    // About
    $wp_customize->add_section('custom_about_section', array(
        'title' => __('About - Terms', 'custom-theme'),
        'priority' => 30,
    ));


    $wp_customize->add_setting('about_title', array(
        'default' => __('About Title', 'custom-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_title', array(
        'label' => __('About Title', 'custom-theme'),
        'section' => 'custom_about_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_item_1_text', array(
        'default' => __('About Item 1', 'custom-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_item_1_text', array(
        'label' => __('About Item 1 Text', 'custom-theme'),
        'section' => 'custom_about_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_item_1_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('about_item_1_link', array(
        'label' => __('About Item 1 Link', 'custom-theme'),
        'section' => 'custom_about_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('about_item_2_text', array(
        'default' => __('About Item 2', 'custom-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_item_2_text', array(
        'label' => __('About Item 2 Text', 'custom-theme'),
        'section' => 'custom_about_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_item_2_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('about_item_2_link', array(
        'label' => __('About Item 2 Link', 'custom-theme'),
        'section' => 'custom_about_section',
        'type' => 'url',
    ));


    $wp_customize->add_setting('terms_title', array(
        'default' => __('Terms Title', 'custom-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('terms_title', array(
        'label' => __('Terms Title', 'custom-theme'),
        'section' => 'custom_about_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('terms_item_1_text', array(
        'default' => __('Term Item 1', 'custom-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('terms_item_1_text', array(
        'label' => __('Terms Item 1 Text', 'custom-theme'),
        'section' => 'custom_about_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('terms_item_1_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('terms_item_1_link', array(
        'label' => __('Terms Item 1 Link', 'custom-theme'),
        'section' => 'custom_about_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('terms_item_2_text', array(
        'default' => __('About Item 2', 'custom-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('terms_item_2_text', array(
        'label' => __('Terms Item 2 Text', 'custom-theme'),
        'section' => 'custom_about_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('terms_item_2_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('terms_item_2_link', array(
        'label' => __('Terms Item 2 Link', 'custom-theme'),
        'section' => 'custom_about_section',
        'type' => 'url',
    ));

    $wp_customize->add_section('custom_find_us_section', array(
        'title' => __('Find Us', 'custom-theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('find_us_title', array(
        'default' => __('Find Us Title', 'custom-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('find_us_title', array(
        'label' => __('Find Us Title', 'custom-theme'),
        'section' => 'custom_find_us_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('find_us_description', array(
        'default' => __('Find Us Description', 'custom-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('find_us_description', array(
        'label' => __('Find Us Description', 'custom-theme'),
        'section' => 'custom_find_us_section',
        'type' => 'textarea',
    ));

}
add_action('customize_register', 'custom_theme_customize_register');

if ( ! function_exists( 'add_viewport_meta_tag' ) ) :
function add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
}

endif;

add_action('wp_head', 'add_viewport_meta_tag');

// register Style files
if ( ! function_exists( 'epignosis_register_style' ) ) :
function epignosis_register_style(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('epignosis-style', get_stylesheet_uri(), ['epignosis-bootstrap'], $version, 'all');
    wp_enqueue_style('epignosis-font', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap', [], '4.6.0');
    wp_enqueue_style('epignosis-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css', [], '6.1');
    wp_enqueue_style('epignosis-font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css', [], '4.6.0');

}
endif;

add_action( 'wp_enqueue_scripts', 'epignosis_register_style' );

// register Scripts files
if ( ! function_exists( 'epignosis_register_scripts' ) ) :
    function epignosis_register_scripts(){
        wp_enqueue_script('epignosis-jquery', 'https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js', [], '3.5.1', );
        wp_enqueue_script('epignosis-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js', array('epignosis-jquery'), '4.6.1/dist/js/bootstrap.bundle.min.js');
        wp_enqueue_script('epignosis-main', get_template_directory_uri() . '/js/main.js',  array('epignosis-jquery', 'epignosis-bootstrap') );
        wp_localize_script(
            'epignosis-main',
            'obj',
            array( 'ajax_url' => admin_url( 'admin-post.php' ) )
        );
    }
endif;

add_action( 'wp_enqueue_scripts', 'epignosis_register_scripts' );


// Register the menus
if ( ! function_exists( 'epignosis_menus' ) ) :

    function epignosis_menus(){
        $locations = array(
            'primary' => 'Top Menu Items'
        );

        register_nav_menus($locations);
    }

endif;

add_action( 'init', 'epignosis_menus' );

if ( ! function_exists( 'custom_nav_menu_link_attributes' ) ) :

    // Add filter to modify attributes of navigation menu links
    function custom_nav_menu_link_attributes($atts, $item, $args) {
        // Check if the menu location is 'primary'
        if ($args->theme_location == 'primary') {
            // Add 'nav-item' class to the link attributes
            $atts['class'] = 'nav-link';
        }

        return $atts;
    }

endif;
add_filter('nav_menu_link_attributes', 'custom_nav_menu_link_attributes', 10, 3);


if ( ! function_exists( 'create_property_post_type' ) ) :
function create_property_post_type() {
    $labels = array(
        'name'               => __( 'Properties', 'textdomain' ),
        'singular_name'      => __( 'Property', 'textdomain' ),
        'menu_name'          => __( 'Properties', 'textdomain' ),
        'name_admin_bar'     => __( 'Property', 'textdomain' ),
        'add_new'            => __( 'Add New', 'textdomain' ),
        'add_new_item'       => __( 'Add New Property', 'textdomain' ),
        'new_item'           => __( 'New Property', 'textdomain' ),
        'edit_item'          => __( 'Edit Property', 'textdomain' ),
        'view_item'          => __( 'View Property', 'textdomain' ),
        'all_items'          => __( 'All Properties', 'textdomain' ),
        'search_items'       => __( 'Search Properties', 'textdomain' )
    );


    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'property' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor' ),
        'taxonomies'         => array( 'category' ) // You can add more taxonomies if needed
    );

    register_post_type( 'property', $args );
}
endif;

add_action( 'init', 'create_property_post_type' );


add_action('admin_post_handle_contact_form', 'handle_contact_form');
add_action('admin_post_nopriv_handle_contact_form', 'handle_contact_form');

function handle_contact_form() {
    $name = sanitize_text_field($_POST['fname'] . ' ' . $_POST['lname']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    $to =  get_option('admin_email');
    $subject = 'New Contact Form Submission';
    $body = "Name: $name\n\nEmail: $email\n\nMessage: $message";
    $headers = array('Content-Type: text/html; charset=UTF-8', "From: $name <$email>");

    $success = wp_mail($to, $subject, $body, $headers);

    // Send response
    if ($success) {
        wp_send_json_success();
    } else {
        wp_send_json_error();
    }
}



function custom_tips_posts_route() {
    register_rest_route( 'custom/v1', '/tips-posts', array(
        'methods' => 'GET',
        'callback' => 'get_tips_posts',
    ));
}

add_action( 'rest_api_init', 'custom_tips_posts_route' );

function get_tips_posts( $data ) {
    $tips_category = get_category_by_slug( 'tips' );
    $tips_category_id = $tips_category->term_id;

    $args = array(
        'posts_per_page' => 6,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'category'       => $tips_category_id,
    );

    $query = new WP_Query( $args );
    $posts = $query->posts;

    $formatted_posts = array();

    foreach ( $posts as $post ) {
        $formatted_posts[] = array(
            'title' => $post->post_title,
            'content' => $post->post_content,
            'date' => $post->post_date,
            'author' => get_the_author_meta( 'display_name', $post->post_author ),
            'permalink' => get_permalink( $post->ID ),
        );
    }

    return rest_ensure_response( $formatted_posts );
}
