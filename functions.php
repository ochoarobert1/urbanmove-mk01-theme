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
    $url = 'https://api.mapbox.com/directions/v5/mapbox/driving/' . $origen . ';' . $destino . '?alternatives=false&geometries=geojson&steps=false&access_token=pk.eyJ1Ijoib2Nob2Fyb2JlcnQxIiwiYSI6ImNrZjVsa3QwMTBleXIyem54azRhNjRkbzUifQ.kaUskuoajoOKezeLtjjFSg';
    var_dump($url);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $resultado = json_decode($result);
    var_dump($resultado);
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

function get_unique_distance_price_table($origen, $destino)
{
    $arr_origenes = explode(',', get_option('origen_matrix'));
    $precio_airport = explode(',', get_option('precio_airport'));
    $precio_train = explode(',', get_option('precio_train'));
    $precio_else = explode(',', get_option('precio_else'));

    $clave = array_search($destino, $arr_origenes);
    if (strpos($origen, 'Aeropuerto') !== false) {
        $precio = $precio_airport[$clave];
    } elseif (strpos($origen, 'Tren') !== false) {
        $precio = $precio_train[$clave];
    } else {
        $precio = $precio_else[$clave];
    }
    return $precio;
}

function get_total_distance_price_table($origen, $destino, $check)
{
    $arr_origenes = explode(',', get_option('origen_matrix'));
    $precio_airport = explode(',', get_option('precio_airport'));
    $precio_train = explode(',', get_option('precio_train'));
    $precio_else = explode(',', get_option('precio_else'));

    $clave = array_search($destino, $arr_origenes);
    if (strpos($origen, 'Aeropuerto') !== false) {
        $precio = $precio_airport[$clave];
    } elseif (strpos($origen, 'Tren') !== false) {
        $precio = $precio_train[$clave];
    } else {
        $precio = $precio_else[$clave];
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

// Hook in
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields', 9999);
add_filter('woocommerce_default_address_fields', 'custom_override_checkout_fields', 9999);

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields($fields)
{
    $fields['billing']['billing_address_1']['label'] = 'Dirección de Facturación (requerido para pago con tarjeta)';
    return $fields;
}

add_filter('woocommerce_billing_fields', 'custom_woocommerce_billing_fields');

function custom_woocommerce_billing_fields($fields)
{

    $fields['billing_required'] = array(
        'label' => __('Voy a requerir envío de factura por email', 'woocommerce'), // Add custom field label
        'placeholder' => _x('Seleccione si se necesita una factura fiscal impresa', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'checkbox', // add field type
        'priority' => 41,
        'class' => array('form-row-custom')    // add class name
    );

    $fields['billing_nif'] = array(
        'label' => __('NIF', 'woocommerce'), // Add custom field label
        'placeholder' => _x('Ingrese el NIF de la empresa', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'text', // add field type
        'priority' => 32,
        'class' => array('form-row-custom')    // add class name
    );

    return $fields;
}

add_filter('woocommerce_get_country_locale', 'wpse_120741_wc_change_state_label_locale');
function wpse_120741_wc_change_state_label_locale($locale)
{
    $locale['ES']['address_1']['label'] = __('Dirección de Facturación (requerido para pago con tarjeta)', 'woocommerce');
    return $locale;
}



/**
 * Add the field to the checkout
 */
add_action('woocommerce_after_order_notes', 'my_custom_checkout_field');

function my_custom_checkout_field($checkout)
{

    echo '<div id="my_custom_checkout_field"><h3>' . __('Datos de Recogida', 'urbanmove') . '</h3>';

    woocommerce_form_field('dir_recogida', array(
        'type'          => 'textarea',
        'class'         => array('custom_field-class form-row-wide'),
        'label'         => __('Direccion, Hotel ó Número de Vuelo'),
        'required'      => true,
        'placeholder'   => __('Ingrese donde pasaremos por ud.'),
    ), $checkout->get_value('dir_recogida'));



    echo '</div>';
}

add_filter('woocommerce_email_order_meta_keys', 'my_custom_order_meta_keys');

function my_custom_order_meta_keys($keys)
{
    $keys[] = 'Direccion, Hotel ó Número de Vuelo '; // This will look for a custom field called 'Tracking Code' and add it to emails
    $keys[] = 'Voy a requerir envío de factura por email'; // This will look for a custom field called 'Tracking Code' and add it to emails
    $keys[] = 'NIF'; // This will look for a custom field called 'Tracking Code' and add it to emails
    return $keys;
}

function kia_display_email_order_meta($order, $sent_to_admin, $plain_text)
{
    $nif = $order->get_meta('_billing_nif');
    $factura = $order->get_meta('_billing_required');
    $direccion = $order->get_meta('dir_recogida');

    echo '<h2 style="color: #007e98;font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;font-size: 18px;font-weight: bold;line-height: 130%;margin: 0 0 18px;text-align: left">Datos Adicionales</h2>';

    if ($nif != '') {
        echo '<p><strong>' . __('NIF') . ':</strong> ' . $nif . '</p>';
    }
    if ($factura != '') {
        $checktext = ($factura == 1) ? 'Si' : 'No';
        echo '<p><strong>' . __('Requiere envío de factura por email') . ':</strong> ' . $checktext . '</p>';
    } else {
        echo '<p><strong>' . __('Requiere envío de factura por email') . ':</strong> No </p>';
    }

    if ($direccion != '') {
        echo '<p><strong>' . __('Direccion, Hotel ó Número de Vuelo') . ':</strong><br> ' . $direccion . '</p>';
    }
}
add_action('woocommerce_email_customer_details', 'kia_display_email_order_meta', 30, 3);

/**
 * Update the order meta with field value
 */
add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');

function my_custom_checkout_field_update_order_meta($order_id)
{
    if (!empty($_POST['dir_recogida'])) {
        update_post_meta($order_id, 'dir_recogida', sanitize_text_field($_POST['dir_recogida']));
    }

    if (!empty($_POST['_billing_required'])) {
        update_post_meta($order_id, '_billing_required', sanitize_text_field($_POST['_billing_required']));
    }

    if (!empty($_POST['_billing_nif'])) {
        update_post_meta($order_id, 'NIF', sanitize_text_field($_POST['_billing_nif']));
    }
}

add_action('woocommerce_admin_order_data_after_billing_address', 'custom_billing_display_admin_order_meta', 10, 1);
function custom_billing_display_admin_order_meta($order)
{
    $order_id = method_exists($order, 'get_id') ? $order->get_id() : $order->id;
    $nif = get_post_meta($order_id, '_billing_nif', true);
    if ($nif != '') {
        echo '<p><strong>' . __('NIF') . ':</strong> ' . $nif . '</p>';
    }
    $check = get_post_meta($order_id, '_billing_required', true);
    if ($check != '') {
        $checktext = ($check == 1) ? 'Si' : 'No';
        echo '<p><strong>' . __('Requiere envío de factura por email') . ':</strong> ' . $checktext . '</p>';
    }
}

add_action('woocommerce_admin_order_data_after_shipping_address', 'custom_notes_display_admin_order_meta', 10, 1);
function custom_notes_display_admin_order_meta($order)
{
    $order_id = method_exists($order, 'get_id') ? $order->get_id() : $order->id;
    $direccion = get_post_meta($order_id, 'dir_recogida', true);
    if ($direccion != '') {
        echo '<p><strong>' . __('Direccion, Hotel ó Número de Vuelo') . ':</strong><br> ' . $direccion . '</p>';
    }
}