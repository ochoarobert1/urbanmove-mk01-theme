<?php
/* WOOCOMMERCE CUSTOM COMMANDS */

/* WOOCOMMERCE - DECLARE THEME SUPPORT - BEGIN */
add_action( 'after_setup_theme', 'urbanmove_woocommerce_support' );
function urbanmove_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
/* WOOCOMMERCE - DECLARE THEME SUPPORT - END */

/* WOOCOMMERCE - CUSTOM WRAPPER - BEGIN */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'urbanmove_woocommerce_custom_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'urbanmove_woocommerce_custom_wrapper_end', 10);

function urbanmove_woocommerce_custom_wrapper_start() {
    echo '<section id="main" class="container-fluid"><div class="row"><div class="woocustom-main-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">';
}

function urbanmove_woocommerce_custom_wrapper_end() {
    echo '</div></div></section>';
}
/* WOOCOMMERCE - CUSTOM WRAPPER - END */

/* WOOCOMMERCE - ARCHIVE PRODUCT - START */
//remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
/* WOOCOMMERCE - ARCHIVE PRODUCT - END */


/* WOOCOMMERCE - CUSTOM CONTENT PRODUCT - SHOP - START */
//remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
//remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
//remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
//remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
/* WOOCOMMERCE - CUSTOM CONTENT PRODUCT - SHOP - END */


/* WOOCOMMERCE - SINGLE PRODUCT - START */
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
//remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
/* WOOCOMMERCE - SINGLE PRODUCT - END */
