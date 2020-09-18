<?php

/* --------------------------------------------------------------
    ADD THEME SUPPORT
-------------------------------------------------------------- */
load_theme_textdomain( 'urbanmove', get_template_directory() . '/languages' );
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' ));
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
add_theme_support( 'customize-selective-refresh-widgets' );
add_theme_support( 'custom-background',
                  array(
                      'default-image' => '',
                      'default-color' => 'ffffff',
                      'wp-head-callback' => '_custom_background_cb',
                      'admin-head-callback' => '',
                      'admin-preview-callback' => ''
                  )
                 );
add_theme_support( 'custom-logo', array(
    'height'      => 250,
    'width'       => 250,
    'flex-width'  => true,
    'flex-height' => true,
) );
add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
) );

/* ADD SHORTCODE SUPPORT TO TEXT WIDGETS */
add_filter('widget_text', 'do_shortcode');

/* --------------------------------------------------------------
    SECURITY ISSUES
-------------------------------------------------------------- */
/* REMOVE WORDPRESS VERSION */
function urbanmove_remove_version() {
    return '';
}
add_filter('the_generator', 'urbanmove_remove_version');

/* CHANGE WORDPRESS ERROR ON LOGIN */
function urbanmove_wordpress_errors(){
    return __('Valores Incorrectos, intente de nuevo', 'urbanmove');
}
add_filter( 'login_errors', 'urbanmove_wordpress_errors' );

/* DISABLE WORDPRESS RSS FEEDS */
function urbanmove_disable_feed() {
    wp_die( __('No hay RSS Feeds disponibles', 'urbanmove') );
}

add_action('do_feed', 'urbanmove_disable_feed', 1);
add_action('do_feed_rdf', 'urbanmove_disable_feed', 1);
add_action('do_feed_rss', 'urbanmove_disable_feed', 1);
add_action('do_feed_rss2', 'urbanmove_disable_feed', 1);
add_action('do_feed_atom', 'urbanmove_disable_feed', 1);

/* --------------------------------------------------------------
    IMAGES RESPONSIVE ON ATTACHMENT IMAGES
-------------------------------------------------------------- */
function image_tag_class($class) {
    $class .= ' img-fluid';
    return $class;
}
add_filter('get_image_tag_class', 'image_tag_class' );

/* --------------------------------------------------------------
    ADD NAV ITEM TO MENU AND LINKS
-------------------------------------------------------------- */
function special_nav_class($classes, $item){
    $classes[] = 'nav-item';
    if( in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function add_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

/* --------------------------------------------------------------
    CUSTOM ADMIN LOGIN
-------------------------------------------------------------- */

function custom_admin_styles() {
    $version_remove = NULL;
    wp_register_style('wp-admin-style', get_template_directory_uri() . '/css/custom-wordpress-admin-style.css', false, $version_remove, 'all');
    wp_enqueue_style('wp-admin-style');
}
add_action('login_head', 'custom_admin_styles');
add_action('admin_init', 'custom_admin_styles');

/* --------------------------------------------------------------
    CUSTOM ADMIN LOGO
-------------------------------------------------------------- */

function urbanmove_custom_logo() {
    ob_start();
?>
<style type="text/css">
    #wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon:before {
        background-image: url(<?php echo get_template_directory_uri('/');
        ?>/images/icon-wp.png) !important;
        background-size: cover;
        background-position: 0 0;
        color: rgba(0, 0, 0, 0);
    }

    #wpadminbar #wp-admin-bar-wp-logo.hover>.ab-item .ab-icon {
        background-position: 0 0;
    }
</style>
<?php
    $content = ob_get_clean();
    echo $content;
}

add_action('wp_before_admin_bar_render', 'urbanmove_custom_logo');


/* --------------------------------------------------------------
    CUSTOM ADMIN FOOTER
-------------------------------------------------------------- */
function dashboard_footer() {
    echo '<span id="footer-thankyou">';
    _e ('Gracias por crear con ', 'urbanmove' );
    echo '<a href="http://wordpress.org/" target="_blank">WordPress.</a> - ';
    _e ('Tema desarrollado por ', 'urbanmove' );
    echo '<a href="http://robertochoa.com.ve/?utm_source=footer_admin&utm_medium=link&utm_content=urbanmove" target="_blank">Robert Ochoa</a></span>';
}
add_filter('admin_footer_text', 'dashboard_footer');
