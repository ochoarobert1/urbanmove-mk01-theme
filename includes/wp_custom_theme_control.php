<?php
/* --------------------------------------------------------------
WP CUSTOMIZE SECTION - CUSTOM SETTINGS
-------------------------------------------------------------- */

add_action( 'customize_register', 'urbanmove_customize_register' );

function urbanmove_customize_register( $wp_customize ) {

    /* HEADER */
    $wp_customize->add_section('umv_header_settings', array(
        'title'    => __('Cabecera', 'urbanmove'),
        'description' => __('Opciones para los elementos de la cabecera', 'urbanmove'),
        'priority' => 30
    ));

    $wp_customize->add_setting('umv_header_settings[phone_number]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'
    ));

    $wp_customize->add_control( 'phone_number', array(
        'type' => 'text',
        'label'    => __('Número Telefónico [Visible]', 'urbanmove'),
        'description' => __( 'Agregar número telefónico en un formato visible para el público', 'urbanmove' ),
        'section'  => 'umv_header_settings',
        'settings' => 'umv_header_settings[phone_number]'
    ));

    $wp_customize->add_setting('umv_header_settings[formatted_phone_number]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'
    ));

    $wp_customize->add_control( 'formatted_phone_number', array(
        'type' => 'text',
        'label'    => __('Número Telefónico', 'urbanmove'),
        'description' => __( 'Agregar número telefonico con formato para el link', 'urbanmove' ),
        'section'  => 'umv_header_settings',
        'settings' => 'umv_header_settings[formatted_phone_number]'
    ));

    $wp_customize->add_setting('umv_header_settings[email_address]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'

    ));

    $wp_customize->add_control( 'email_address', array(
        'type' => 'text',
        'label'    => __('Correo Electrónico', 'urbanmove'),
        'description' => __( 'Agregar direccion de Correo Electrónico', 'urbanmove' ),
        'section'  => 'umv_header_settings',
        'settings' => 'umv_header_settings[email_address]'
    ));

    /* SOCIAL SETTINGS */
    $wp_customize->add_section('umv_social_settings', array(
        'title'    => __('Redes Sociales', 'urbanmove'),
        'description' => __('Agregue aqui las redes sociales de la página, serán usadas globalmente', 'urbanmove'),
        'priority' => 175,
    ));

    $wp_customize->add_setting('umv_social_settings[facebook]', array(
        'default'           => '',
        'sanitize_callback' => 'urbanmove_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control( 'facebook', array(
        'type' => 'url',
        'section' => 'umv_social_settings',
        'settings' => 'umv_social_settings[facebook]',
        'label' => __( 'Facebook', 'urbanmove' ),
    ));

    $wp_customize->add_setting('umv_social_settings[twitter]', array(
        'default'           => '',
        'sanitize_callback' => 'urbanmove_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control( 'twitter', array(
        'type' => 'url',
        'section' => 'umv_social_settings',
        'settings' => 'umv_social_settings[twitter]',
        'label' => __( 'Twitter', 'urbanmove' ),
    ));

    $wp_customize->add_setting('umv_social_settings[instagram]', array(
        'default'           => '',
        'sanitize_callback' => 'urbanmove_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'instagram', array(
        'type' => 'url',
        'section' => 'umv_social_settings',
        'settings' => 'umv_social_settings[instagram]',
        'label' => __( 'Instagram', 'urbanmove' ),
    ));

    $wp_customize->add_setting('umv_social_settings[linkedin]', array(
        'default'           => '',
        'sanitize_callback' => 'urbanmove_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control( 'linkedin', array(
        'type' => 'url',
        'section' => 'umv_social_settings',
        'settings' => 'umv_social_settings[linkedin]',
        'label' => __( 'LinkedIn', 'urbanmove' ),
    ));

    $wp_customize->add_setting('umv_social_settings[youtube]', array(
        'default'           => '',
        'sanitize_callback' => 'urbanmove_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'youtube', array(
        'type' => 'url',
        'section' => 'umv_social_settings',
        'settings' => 'umv_social_settings[youtube]',
        'label' => __( 'YouTube', 'urbanmove' ),
    ) );

    /* COOKIES SETTINGS */
    $wp_customize->add_section('umv_cookie_settings', array(
        'title'    => __('Cookies', 'urbanmove'),
        'description' => __('Opciones de Cookies', 'urbanmove'),
        'priority' => 176,
    ));

    $wp_customize->add_setting('umv_cookie_settings[cookie_text]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'

    ));

    $wp_customize->add_control( 'cookie_text', array(
        'type' => 'textarea',
        'label'    => __('Cookie consent', 'urbanmove'),
        'description' => __( 'Texto del Cookie consent.' ),
        'section'  => 'umv_cookie_settings',
        'settings' => 'umv_cookie_settings[cookie_text]'
    ));

    $wp_customize->add_setting('umv_cookie_settings[cookie_link]', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'cookie_link', array(
        'type'     => 'dropdown-pages',
        'section' => 'umv_cookie_settings',
        'settings' => 'umv_cookie_settings[cookie_link]',
        'label' => __( 'Link de Cookies', 'urbanmove' ),
    ) );

}

function urbanmove_sanitize_url( $url ) {
    return esc_url_raw( $url );
}

/* --------------------------------------------------------------
CUSTOM CONTROL PANEL
-------------------------------------------------------------- */

function register_urbanmove_settings() {
    register_setting( 'urbanmove-settings-group', 'origen_matrix' );
    register_setting( 'urbanmove-settings-group', 'destino_matrix' );
    register_setting( 'urbanmove-settings-group', 'precio_airport' );
    register_setting( 'urbanmove-settings-group', 'precio_train' );
    register_setting( 'urbanmove-settings-group', 'precio_else' );
}

add_action('admin_menu', 'urbanmove_custom_panel_control');

function urbanmove_custom_panel_control() {
    add_menu_page(
        __( 'Distance Matrix', 'urbanmove' ),
        __( 'Distance Matrix','urbanmove' ),
        'manage_options',
        'urbanmove-control-panel',
        'urbanmove_control_panel_callback',
        'dashicons-admin-generic',
        120
    );
    add_action( 'admin_init', 'register_urbanmove_settings' );
}

function urbanmove_control_panel_callback() {
    ob_start();
?>
<div class="urbanmove-admin-header-container">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-color.png" alt="urbanmove" />
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
</div>
<form method="post" action="options.php" class="urbanmove-admin-content-container">
    <?php settings_fields( 'urbanmove-settings-group' ); ?>
    <?php do_settings_sections( 'urbanmove-settings-group' ); ?>
    <div class="urbanmove-admin-content-item">
        <table class="form-table">
            <tr valign="center">
                <th scope="row"><?php _e('Tabla de Origenes / Destinos', 'urbanmove'); ?></th>
            </tr>
            <tr>
                <td>
                    <textarea name="origen_matrix" id="origen_matrix" cols="100" rows="10" style="max-width: 100%; width: 100%;"><?php echo esc_attr( get_option('origen_matrix') ); ?></textarea>
                </td>
            </tr>
        </table>
    </div>
    <div class="urbanmove-admin-content-item">
        <table class="form-table">
            <tr valign="center">
                <th scope="row"><?php _e('Precio (Aeropuerto)', 'urbanmove'); ?></th>
            </tr>
            <tr>
                <td>
                    <textarea name="precio_airport" id="precio_airport" cols="100" rows="10" style="max-width: 100%; width: 100%;"><?php echo esc_attr( get_option('precio_airport') ); ?></textarea>
                </td>
            </tr>
        </table>
    </div>
    <div class="urbanmove-admin-content-item">
        <table class="form-table">
            <tr valign="center">
                <th scope="row"><?php _e('Precio (Estacion de Trenes)', 'urbanmove'); ?></th>
            </tr>
            <tr>
                <td>
                    <textarea name="precio_train" id="precio_train" cols="100" rows="10" style="max-width: 100%; width: 100%;"><?php echo esc_attr( get_option('precio_train') ); ?></textarea>
                </td>
            </tr>
        </table>
    </div>
    <div class="urbanmove-admin-content-item">
        <table class="form-table">
            <tr valign="center">
                <th scope="row"><?php _e('Precio (Cualquier Destino)', 'urbanmove'); ?></th>
            </tr>
            <tr>
                <td>
                    <textarea name="precio_else" id="precio_else" cols="100" rows="10" style="max-width: 100%; width: 100%;"><?php echo esc_attr( get_option('precio_else') ); ?></textarea>
                </td>
            </tr>
        </table>
    </div>
    <div class="urbanmove-admin-content-submit">
        <?php submit_button(); ?>
    </div>
</form>
<?php
    $content = ob_get_clean();
    echo $content;
}