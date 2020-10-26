<?php

/* --------------------------------------------------------------
    ENQUEUE AND REGISTER CSS
-------------------------------------------------------------- */

require_once('includes/wp_enqueue_styles.php');

/* --------------------------------------------------------------
    ENQUEUE AND REGISTER JS
-------------------------------------------------------------- */

if (!is_admin()) add_action('wp_enqueue_scripts', 'urbanmove_jquery_enqueue');
function urbanmove_jquery_enqueue()
{
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate');
    if ($_SERVER['REMOTE_ADDR'] == '::1') {
        /*- JQUERY ON LOCAL  -*/
        wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', false, '3.5.1', false);
        /*- JQUERY MIGRATE ON LOCAL  -*/
        wp_register_script('jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate.min.js',  array('jquery'), '3.1.0', false);
    } else {
        /*- JQUERY ON WEB  -*/
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', false, '3.5.1', false);
        /*- JQUERY MIGRATE ON WEB  -*/
        wp_register_script('jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.3.1.js', array('jquery'), '3.3.1', true);
    }
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-migrate');
}

/* NOW ALL THE JS FILES */

require_once('includes/wp_enqueue_scripts.php');

/* --------------------------------------------------------------
    ADD CUSTOM WALKER BOOTSTRAP
-------------------------------------------------------------- */

add_action('after_setup_theme', 'urbanmove_register_navwalker');
function urbanmove_register_navwalker()
{
    require_once('includes/class-wp-bootstrap-navwalker.php');
}

/* --------------------------------------------------------------
    ADD CUSTOM WORDPRESS FUNCTIONS
-------------------------------------------------------------- */

require_once('includes/wp_custom_functions.php');

/* --------------------------------------------------------------
    ADD REQUIRED WORDPRESS PLUGINS
-------------------------------------------------------------- */

require_once('includes/class-tgm-plugin-activation.php');
require_once('includes/class-required-plugins.php');

/* --------------------------------------------------------------
    ADD CUSTOM WOOCOMMERCE OVERRIDES
-------------------------------------------------------------- */
if (class_exists('WooCommerce')) {
    require_once('includes/wp_woocommerce_functions.php');
}

/* --------------------------------------------------------------
    ADD JETPACK COMPATIBILITY
-------------------------------------------------------------- */
if (defined('JETPACK__VERSION')) {
    require_once('includes/wp_jetpack_functions.php');
}

/* --------------------------------------------------------------
    ADD NAV MENUS LOCATIONS
-------------------------------------------------------------- */

register_nav_menus(array(
    'header_menu' => __('Menu Header - Principal', 'urbanmove')
));

/* --------------------------------------------------------------
    ADD DYNAMIC SIDEBAR SUPPORT
-------------------------------------------------------------- */

add_action('widgets_init', 'urbanmove_widgets_init');

function urbanmove_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar Principal', 'urbanmove'),
        'id' => 'main_sidebar',
        'description' => __('Estos widgets seran vistos en las entradas y páginas del sitio', 'urbanmove'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));

    register_sidebars(4, array(
        'name'          => __('Pie de Página %d', 'urbanmove'),
        'id'            => 'sidebar_footer',
        'description'   => __('Estos widgets seran vistos en el pie de página del sitio', 'urbanmove'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
}



/* --------------------------------------------------------------
    ADD CUSTOM METABOX
-------------------------------------------------------------- */

require_once('includes/wp_custom_metabox.php');

/* --------------------------------------------------------------
    ADD CUSTOM POST TYPE
-------------------------------------------------------------- */

require_once('includes/wp_custom_post_type.php');

/* --------------------------------------------------------------
    ADD CUSTOM THEME CONTROLS
-------------------------------------------------------------- */

require_once('includes/wp_custom_theme_control.php');

/* --------------------------------------------------------------
    ADD CUSTOM IMAGE SIZE
-------------------------------------------------------------- */
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(9999, 400, true);
}
if (function_exists('add_image_size')) {
    add_image_size('avatar', 100, 100, true);
    add_image_size('logo', 250, 100, false);
    add_image_size('blog_img', 276, 217, true);
    add_image_size('single_img', 636, 297, true);
}


function get_geocoding_coodinates($coordinates)
{
    $html_coodinates = urlencode($coordinates);
    $url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' . $html_coodinates . '.json?types=address&access_token=pk.eyJ1Ijoib2Nob2Fyb2JlcnQxIiwiYSI6ImNrZjVsa3QwMTBleXIyem54azRhNjRkbzUifQ.kaUskuoajoOKezeLtjjFSg';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $resultado = json_decode($result);
    return implode(',', $resultado->features[0]->geometry->coordinates);
}

function get_distance_matrix($origen, $destino)
{
    $url = 'https://api.mapbox.com/directions/v5/mapbox/driving/' . urlencode($origen) . ';' . urlencode($destino) . '?alternatives=false&geometries=geojson&steps=false&access_token=pk.eyJ1Ijoib2Nob2Fyb2JlcnQxIiwiYSI6ImNrZjVsa3QwMTBleXIyem54azRhNjRkbzUifQ.kaUskuoajoOKezeLtjjFSg';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $resultado = json_decode($result);
    return $resultado->routes[0]->distance;
}

function get_unique_distance_price($distancia)
{
    if ($distancia < 7) {
        $precio = 25;
    } else {
        if ($distancia > 40) {
            $exceso = $distancia - 40;
            $precio = 40 + ($exceso * 0.90);
        } else {
            $precio = $distancia;
        }
    }
    return $precio;
}

function get_total_distance_price($distancia, $check)
{
    if ($distancia < 7) {
        $precio = 25;
    } else {
        if ($distancia > 40) {
            $exceso = $distancia - 40;
            $precio = 40 + ($exceso * 0.90);
        } else {
            $precio = $distancia;
        }
    }

    if ($check == 1) {
        $precio = $precio + $precio;
    }
    return $precio;
}

function add_custom_gets_url($product_id, $custom_price, $checkida, $origen, $destino, $fecha_origen, $fecha_retorno, $cantidad, $pasajeros)
{
    $url = 'resumen/?add-to-cart=' . $product_id;
    $url .= '&custom_price=' . urlencode($custom_price);
    $url .= '&checkida=' . urlencode($checkida);
    $url .= '&origen=' . urlencode($origen);
    $url .= '&destino=' . urlencode($destino);
    $url .= '&fecha_origen=' . urlencode($fecha_origen);
    $url .= '&fecha_retorno=' . urlencode($fecha_retorno);
    $url .= '&cantidad=' . urlencode($cantidad);
    $url .= '&pasajeros=' . urlencode(join(',', $pasajeros));
    return $url;
}

// Get the custom "amount" from URL and save it as custom data to the cart item
add_filter('woocommerce_add_cart_item_data', 'add_pack_data_to_cart_item_data', 20, 2);
function add_pack_data_to_cart_item_data($cart_item_data, $product_id)
{


    if (!isset($_GET['custom_price']))
        return $cart_item_data;

    $amount = esc_attr($_GET['custom_price']);
    $checkida = $_GET['checkida'];
    $origen = $_GET['origen'];
    $destino = $_GET['destino'];
    $fecha_origen = $_GET['fecha_origen'];
    $fecha_retorno = $_GET['fecha_retorno'];
    $cantidad = $_GET['cantidad'];
    $pasajeros = explode(',', urldecode($_GET['pasajeros']));
    if (empty($amount))
        return $cart_item_data;

    // Set the custom amount in cart object
    $cart_item_data['custom_price'] = (float) $amount;
    $cart_item_data['checkida'] = $checkida;
    $cart_item_data['origen'] = $origen;
    $cart_item_data['destino'] = $destino;
    $cart_item_data['fecha_origen'] =  $fecha_origen;
    $cart_item_data['fecha_retorno'] = $fecha_retorno;
    $cart_item_data['cantidad'] = $cantidad;
    $cart_item_data['pasajeros'] = $pasajeros;
    $cart_item_data['unique_key'] = md5(microtime() . rand()); // Make each item unique

    return $cart_item_data;
}

// Alter conditionally cart item price based on product ID and custom registered "amount"
add_action('woocommerce_before_calculate_totals', 'change_conditionally_cart_item_price', 30, 1);
function change_conditionally_cart_item_price($cart)
{
    if (is_admin() && !defined('DOING_AJAX'))
        return;

    if (did_action('woocommerce_before_calculate_totals') >= 2)
        return;

    // HERE set your targeted product ID

    foreach ($cart->get_cart() as $cart_item) {
        // Checking for the targeted product ID and the registered "amount" cart item custom data to set the new price
        $cart_item['data']->set_price($cart_item['custom_price']);
    }
}

add_filter('woocommerce_get_item_data', 'misha_display_field', 10, 2);

function misha_display_field($item_data, $cart_item)
{
    $format = "d M Y - h:i a";
    if (!empty($cart_item['checkida'])) {
        $idavuelta = ($cart_item['checkida'] == 1) ? 'Ida y Vuelta' : 'Solo Ida';
        $item_data[] = array(
            'key'     => 'Modo de Reserva',
            'value'   => $cart_item['checkida'],
            'display' => $idavuelta, // in case you would like to display "value" in another way (for users)
        );
    }

    if (!empty($cart_item['origen'])) {
        $item_data[] = array(
            'key'     => 'Origen',
            'value'   => $cart_item['origen'],
            'display' => '', // in case you would like to display "value" in another way (for users)
        );
    }

    if (!empty($cart_item['destino'])) {
        $item_data[] = array(
            'key'     => 'Destino',
            'value'   => $cart_item['destino'],
            'display' => '', // in case you would like to display "value" in another way (for users)
        );
    }

    if (!empty($cart_item['fecha_origen'])) {
        $item_data[] = array(
            'key'     => 'Fecha de Salida',
            'value'   => $cart_item['fecha_origen'],
            'display' => date_format(date_create($cart_item['fecha_origen']), $format)
        );
    }

    if (!empty($cart_item['fecha_retorno'])) {
        $item_data[] = array(
            'key'     => 'Fecha de Retorno',
            'value'   => $cart_item['fecha_retorno'],
            'display' => date_format(date_create($cart_item['fecha_retorno']), $format)
        );
    }

    if (!empty($cart_item['cantidad'])) {
        $plural = ($cart_item['cantidad'] > 1) ? 'Pasajeros' : 'Pasajero';
        $item_data[] = array(
            'key'     => 'Cantidad',
            'value'   => $cart_item['cantidad'],
            'display' => $cart_item['cantidad'] . ' ' . $plural
        );
    }

    if (!empty($cart_item['pasajeros'])) {
        $adultos = 0;
        $kids = 0;
        foreach ($cart_item['pasajeros'] as $item) {
            if ($item == 'adult') {
                $adultos = $adultos + 1;
            } else {
                $kids = $kids + 1;
            }
        }
        $plural_adulto = ($adultos > 1) ? 'Adultos' : 'Adulto';
        $plural_kids = ($kids > 1) ? 'Niños' : 'Niño';
        $item_data[] = array(
            'key'     => 'Pasajeros',
            'value'   => $cart_item['pasajeros'],
            'display' => $adultos . ' ' . $plural_adulto . ' / ' . $kids . ' ' . $plural_kids
        );
    }

    return $item_data;
}

function wc_remove_all_quantity_fields($return, $product)
{
    return true;
}
add_filter('woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2);

add_action('woocommerce_add_order_item_meta', 'wdm_add_values_to_order_item_meta', 1, 2);

if (!function_exists('wdm_add_values_to_order_item_meta')) {
    function wdm_add_values_to_order_item_meta($item_id, $values)
    {
        global $woocommerce, $wpdb;
        $format = "d M Y - h:i a";
        $ida_vuelta = ($values['checkida'] == 1) ? 'Ida y Vuelta' : 'Solo Ida';
        wc_add_order_item_meta($item_id, 'Modo de Reserva', $ida_vuelta);
        wc_add_order_item_meta($item_id, 'Origen', $values['origen']);
        wc_add_order_item_meta($item_id, 'Destino', $values['destino']);
        wc_add_order_item_meta($item_id, 'Fecha-Hora de Salida', date_format(date_create($values['fecha_origen']), $format));
        if ($values['checkida'] == 1) {
            wc_add_order_item_meta($item_id, 'Fecha-Hora de Retorno', date_format(date_create($values['fecha_retorno']), $format));
        }
        wc_add_order_item_meta($item_id, 'Cantidad de Pasajeros', $values['cantidad']);
        $adultos = 0;
        $kids = 0;
        foreach ($values['pasajeros'] as $item) {
            if ($item == 'adult') {
                $adultos = $adultos + 1;
            } else {
                $kids = $kids + 1;
            }
        }
        $plural_adulto = ($adultos > 1) ? 'Adultos' : 'Adulto';
        $plural_kids = ($kids > 1) ? 'Niños' : 'Niño';
        wc_add_order_item_meta($item_id, 'Información de Pasajeros', $adultos . ' ' . $plural_adulto . ' / ' . $kids . ' ' . $plural_kids);
    }
}

function remove_added_to_cart_notice()
{
    $notices = WC()->session->get('wc_notices', array());

    foreach ($notices['success'] as $key => &$notice) {
        if (strpos($notice, 'has been added') !== false) {
            $added_to_cart_key = $key;
            break;
        }
    }
    unset($notices['success'][$added_to_cart_key]);

    WC()->session->set('wc_notices', $notices);
}
add_action('woocommerce_before_single_product', 'remove_added_to_cart_notice', 1);
add_action('woocommerce_shortcode_before_product_cat_loop', 'remove_added_to_cart_notice', 1);
add_action('woocommerce_before_shop_loop', 'remove_added_to_cart_notice', 1);

add_filter('wc_add_to_cart_message', 'remove_cart_message');

function remove_cart_message()
{
    return;
}
