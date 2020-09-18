<?php

/* --------------------------------------------------------------
    1.- HOME: HERO SECTION
-------------------------------------------------------------- */
$cmb_home_hero = new_cmb2_box( array(
    'id'            => $prefix . 'home_hero_metabox',
    'title'         => esc_html__( 'Home: Hero Principal', 'urbanmove' ),
    'object_types'  => array( 'page' ),
    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/page-home.php' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,
    'closed'     => false
) );

$cmb_home_hero->add_field( array(
    'id'   => $prefix . 'hero_banner_bg',
    'name'      => esc_html__( 'Imagen Auxiliar del Hero', 'urbanmove' ),
    'desc'      => esc_html__( 'Cargar un fondo para esta sección', 'urbanmove' ),
    'type'    => 'file',

    'options' => array(
        'url' => false
    ),
    'text'    => array(
        'add_upload_file_text' => esc_html__( 'Cargar Imagen de Fondo', 'urbanmove' ),
    ),
    'query_args' => array(
        'type' => array(
            'image/gif',
            'image/jpeg',
            'image/png'
        )
    ),
    'preview_size' => 'medium'
) );

/* --------------------------------------------------------------
    2.- HOME: DESCANSO SECTION
-------------------------------------------------------------- */
$cmb_home_descanso = new_cmb2_box( array(
    'id'            => $prefix . 'home_descanso_metabox',
    'title'         => esc_html__( 'Home: Descanso Principal', 'urbanmove' ),
    'object_types'  => array( 'page' ),
    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/page-home.php' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,
    'closed'     => false
) );

$cmb_home_descanso->add_field( array(
    'id'   => $prefix . 'home_descanso_bg',
    'name'      => esc_html__( 'Imagen de Fondo', 'urbanmove' ),
    'desc'      => esc_html__( 'Cargar un fondo para esta sección', 'urbanmove' ),
    'type'    => 'file',

    'options' => array(
        'url' => false
    ),
    'text'    => array(
        'add_upload_file_text' => esc_html__( 'Cargar Imagen de Fondo', 'urbanmove' ),
    ),
    'query_args' => array(
        'type' => array(
            'image/gif',
            'image/jpeg',
            'image/png'
        )
    ),
    'preview_size' => 'medium'
) );

$group_field_id = $cmb_home_descanso->add_field( array(
    'id'          => $prefix . 'home_descanso_group',
    'type'        => 'group',
    'name'          => esc_html__('Texto de la Sección', 'urbanmove'),
    'desc'          => esc_html__('Cargue los textos para incluirlos en esta sección', 'urbanmove'),
    'options'     => array(
        'group_title'       => __( 'Item {#}', 'urbanmove' ),
        'add_button'        => __( 'Agregar otro Item', 'urbanmove' ),
        'remove_button'     => __( 'Remover Item', 'urbanmove' ),
        'sortable'          => true,
        'closed'         => true,
        'remove_confirm' => esc_html__( '¿Estas seguro de remover este Item?', 'urbanmove' )
    )
) );

$cmb_home_descanso->add_group_field( $group_field_id, array(
    'id'        => 'text',
    'name'      => esc_html__( 'Texto del Item', 'urbanmove' ),
    'desc'      => esc_html__( 'Ingresa un texto descriptivo del item', 'urbanmove' ),
    'type' => 'textarea_small'
) );



$cmb_home_descanso->add_field( array(
    'id'   => $prefix . 'home_descanso_image',
    'name'      => esc_html__( 'Imagen Principal', 'urbanmove' ),
    'desc'      => esc_html__( 'Cargar una Imagen para esta sección', 'urbanmove' ),
    'type'    => 'file',

    'options' => array(
        'url' => false
    ),
    'text'    => array(
        'add_upload_file_text' => esc_html__( 'Cargar Imagen', 'urbanmove' ),
    ),
    'query_args' => array(
        'type' => array(
            'image/gif',
            'image/jpeg',
            'image/png'
        )
    ),
    'preview_size' => 'medium'
) );

/* --------------------------------------------------------------
    3.- HOME: SLIDER SECTION
-------------------------------------------------------------- */
$cmb_home_slider = new_cmb2_box( array(
    'id'            => $prefix . 'home_slider_metabox',
    'title'         => esc_html__( 'Home: Slider Principal', 'urbanmove' ),
    'object_types'  => array( 'page' ),
    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/page-home.php' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,
    'closed'     => false
) );

$cmb_home_slider->add_field( array(
    'id'   => $prefix . 'home_slider_bg',
    'name'      => esc_html__( 'Imagen de Fondo', 'urbanmove' ),
    'desc'      => esc_html__( 'Cargar un fondo para esta sección', 'urbanmove' ),
    'type'    => 'file',

    'options' => array(
        'url' => false
    ),
    'text'    => array(
        'add_upload_file_text' => esc_html__( 'Cargar Imagen de Fondo', 'urbanmove' ),
    ),
    'query_args' => array(
        'type' => array(
            'image/gif',
            'image/jpeg',
            'image/png'
        )
    ),
    'preview_size' => 'medium'
) );

$group_field_id = $cmb_home_slider->add_field( array(
    'id'          => $prefix . 'home_slider_group',
    'type'        => 'group',
    'name'          => esc_html__('Texto de la Sección', 'urbanmove'),
    'desc'          => esc_html__('Cargue los textos para incluirlos en esta sección', 'urbanmove'),
    'options'     => array(
        'group_title'       => __( 'Item {#}', 'urbanmove' ),
        'add_button'        => __( 'Agregar otro Item', 'urbanmove' ),
        'remove_button'     => __( 'Remover Item', 'urbanmove' ),
        'sortable'          => true,
        'closed'         => true,
        'remove_confirm' => esc_html__( '¿Estas seguro de remover este Item?', 'urbanmove' )
    )
) );

$cmb_home_slider->add_group_field( $group_field_id, array(
    'id'   => 'icon',
    'name'      => esc_html__( 'Imagen de Fondo', 'urbanmove' ),
    'desc'      => esc_html__( 'Cargar un fondo para esta sección', 'urbanmove' ),
    'type'    => 'file',

    'options' => array(
        'url' => false
    ),
    'text'    => array(
        'add_upload_file_text' => esc_html__( 'Cargar Imagen de Fondo', 'urbanmove' ),
    ),
    'query_args' => array(
        'type' => array(
            'image/gif',
            'image/jpeg',
            'image/png'
        )
    ),
    'preview_size' => 'avatar'
) );

$cmb_home_slider->add_group_field( $group_field_id, array(
    'id'        => 'text',
    'name'      => esc_html__( 'Texto del Item', 'urbanmove' ),
    'desc'      => esc_html__( 'Ingresa un texto descriptivo del item', 'urbanmove' ),
    'type' => 'wysiwyg',
    'options' => array(
        'textarea_rows' => get_option('default_post_edit_rows', 2),
        'teeny' => false
    )
) );

/* --------------------------------------------------------------
    4.- HOME: CARDS SECTION
-------------------------------------------------------------- */
$cmb_home_cards = new_cmb2_box( array(
    'id'            => $prefix . 'home_card_metabox',
    'title'         => esc_html__( 'Home: Sección de Cards', 'urbanmove' ),
    'object_types'  => array( 'page' ),
    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/page-home.php' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,
    'closed'     => false
) );

$cmb_home_cards->add_field( array(
    'id'   => $prefix . 'home_cards_bg',
    'name'      => esc_html__( 'Imagen de Fondo', 'urbanmove' ),
    'desc'      => esc_html__( 'Cargar un fondo para esta sección', 'urbanmove' ),
    'type'    => 'file',

    'options' => array(
        'url' => false
    ),
    'text'    => array(
        'add_upload_file_text' => esc_html__( 'Cargar Imagen de Fondo', 'urbanmove' ),
    ),
    'query_args' => array(
        'type' => array(
            'image/gif',
            'image/jpeg',
            'image/png'
        )
    ),
    'preview_size' => 'medium'
) );

$cmb_home_cards->add_field( array(
    'id'        => $prefix . 'home_cards_content',
    'name'      => esc_html__( 'Contenido Principal', 'urbanmove' ),
    'desc'      => esc_html__( 'Ingresa un texto descriptivo para la seccion', 'urbanmove' ),
    'type' => 'wysiwyg',
    'options' => array(
        'textarea_rows' => get_option('default_post_edit_rows', 2),
        'teeny' => false
    )
) );

$group_field_id = $cmb_home_cards->add_field( array(
    'id'          => $prefix . 'home_cards_group',
    'type'        => 'group',
    'name'          => esc_html__('Cartas de la Sección', 'urbanmove'),
    'desc'          => esc_html__('Cargue el contenidos de las cartas para incluirlos en esta sección', 'urbanmove'),
    'options'     => array(
        'group_title'       => __( 'Card {#}', 'urbanmove' ),
        'add_button'        => __( 'Agregar otro Card', 'urbanmove' ),
        'remove_button'     => __( 'Remover Card', 'urbanmove' ),
        'sortable'          => true,
        'closed'         => true,
        'remove_confirm' => esc_html__( '¿Estas seguro de remover este Card?', 'urbanmove' )
    )
) );

$cmb_home_cards->add_group_field( $group_field_id, array(
    'id'   => 'icon',
    'name'      => esc_html__( 'Imagen de Fondo', 'urbanmove' ),
    'desc'      => esc_html__( 'Cargar un fondo para esta sección', 'urbanmove' ),
    'type'    => 'file',

    'options' => array(
        'url' => false
    ),
    'text'    => array(
        'add_upload_file_text' => esc_html__( 'Cargar Imagen de Fondo', 'urbanmove' ),
    ),
    'query_args' => array(
        'type' => array(
            'image/gif',
            'image/jpeg',
            'image/png'
        )
    ),
    'preview_size' => 'avatar'
) );

$cmb_home_cards->add_group_field( $group_field_id, array(
    'id'        => 'text',
    'name'      => esc_html__( 'Texto del Item', 'urbanmove' ),
    'desc'      => esc_html__( 'Ingresa un texto descriptivo del item', 'urbanmove' ),
    'type' => 'textarea_small'
) );

/* --------------------------------------------------------------
    4.1- HOME: TESTIMONIALS SECTION
-------------------------------------------------------------- */
$cmb_home_testimonial = new_cmb2_box( array(
    'id'            => $prefix . 'home_card2_metabox',
    'title'         => esc_html__( 'Home: Sección de Testimoniales', 'urbanmove' ),
    'object_types'  => array( 'page' ),
    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/page-home.php' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,
    'closed'     => false
) );

$group_field_id = $cmb_home_testimonial->add_field( array(
    'id'          => $prefix . 'home_testimonial_group',
    'type'        => 'group',
    'name'          => esc_html__('Testimoniales de la Sección', 'urbanmove'),
    'desc'          => esc_html__('Cargue los testimonios para incluirlos en esta sección', 'urbanmove'),
    'options'     => array(
        'group_title'       => __( 'Testimonio {#}', 'urbanmove' ),
        'add_button'        => __( 'Agregar otro Testimonio', 'urbanmove' ),
        'remove_button'     => __( 'Remover Testimonio', 'urbanmove' ),
        'sortable'          => true,
        'closed'         => true,
        'remove_confirm' => esc_html__( '¿Estas seguro de remover este Testimonio?', 'urbanmove' )
    )
) );

$cmb_home_testimonial->add_group_field( $group_field_id, array(
    'id'   => 'image',
    'name'      => esc_html__( 'Imagen de Testimonio', 'urbanmove' ),
    'desc'      => esc_html__( 'Cargar un Testimonio para esta sección', 'urbanmove' ),
    'type'    => 'file',

    'options' => array(
        'url' => false
    ),
    'text'    => array(
        'add_upload_file_text' => esc_html__( 'Cargar Imagen de Testimonio', 'urbanmove' ),
    ),
    'query_args' => array(
        'type' => array(
            'image/gif',
            'image/jpeg',
            'image/png'
        )
    ),
    'preview_size' => 'avatar'
) );

$cmb_home_testimonial->add_group_field( $group_field_id, array(
    'id'        => 'author',
    'name'      => esc_html__( 'Autor del Testimonio', 'urbanmove' ),
    'desc'      => esc_html__( 'Ingresa el nombre del autor', 'urbanmove' ),
    'type' => 'text'
) );

$cmb_home_testimonial->add_group_field( $group_field_id, array(
    'id'        => 'desc',
    'name'      => esc_html__( 'Texto del Testimonio', 'urbanmove' ),
    'desc'      => esc_html__( 'Ingresa el Texto del Testimonio', 'urbanmove' ),
    'type' => 'wysiwyg',
    'options' => array(
        'textarea_rows' => get_option('default_post_edit_rows', 2),
        'teeny' => false
    )
) );

/* --------------------------------------------------------------
    5- HOME: CONTACT SECTION
-------------------------------------------------------------- */
$cmb_home_contact = new_cmb2_box( array(
    'id'            => $prefix . 'home_contact_metabox',
    'title'         => esc_html__( 'Home: Sección de Contacto', 'urbanmove' ),
    'object_types'  => array( 'page' ),
    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/page-home.php' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,
    'closed'     => false
) );

$cmb_home_contact->add_field( array(
    'id'        => $prefix . 'home_contact_dir',
    'name'      => esc_html__( 'Dirección de la empresa', 'urbanmove' ),
    'desc'      => esc_html__( 'Ingresa la dirección de la empresa', 'urbanmove' ),
    'type' => 'text'
) );

$cmb_home_contact->add_field( array(
    'id'        => $prefix . 'home_contact_embed',
    'name'      => esc_html__( 'Google Maps Embed', 'urbanmove' ),
    'desc'      => esc_html__( 'Ingresa el codigo embed del mapa', 'urbanmove' ),
    'type' => 'textarea_code'
) );

$cmb_home_contact->add_field( array(
    'id'        => $prefix . 'home_contact_logo',
    'name'      => esc_html__( 'Logo de la Empresa', 'urbanmove' ),
    'desc'      => esc_html__( 'Cargar el loego para esta sección', 'urbanmove' ),
    'type'    => 'file',

    'options' => array(
        'url' => false
    ),
    'text'    => array(
        'add_upload_file_text' => esc_html__( 'Cargar Loego', 'urbanmove' ),
    ),
    'query_args' => array(
        'type' => array(
            'image/gif',
            'image/jpeg',
            'image/png'
        )
    ),
    'preview_size' => 'avatar'
) );

$cmb_home_contact->add_field( array(
    'id'        => $prefix . 'home_contact_email',
    'name'      => esc_html__( 'Correo de Contacto', 'urbanmove' ),
    'desc'      => esc_html__( 'Ingresa el correo de la empresa', 'urbanmove' ),
    'type' => 'text'
) );

$cmb_home_contact->add_field( array(
    'id'        => $prefix . 'home_contact_telf',
    'name'      => esc_html__( 'Teléfono de Contacto', 'urbanmove' ),
    'desc'      => esc_html__( 'Ingresa el correo de la empresa', 'urbanmove' ),
    'type' => 'text'
) );

$cmb_home_contact->add_field( array(
    'id'        => $prefix . 'home_contact_twitter',
    'name'      => esc_html__( 'Twitter', 'urbanmove' ),
    'desc'      => esc_html__( 'Ingresa el perfil de twitter de la empresa', 'urbanmove' ),
    'type' => 'text'
) );

$cmb_home_contact->add_field( array(
    'id'        => $prefix . 'home_contact_posttext',
    'name'      => esc_html__( 'Texto posterior a Datos de Contacto', 'urbanmove' ),
    'desc'      => esc_html__( 'Ingresa el texto descriptivo a esta zona', 'urbanmove' ),
    'type' => 'text'
) );

