<?php
/* 
*   Habilitación de menu
*/
function legger_menus()
{
    register_nav_menus(array(
        'menu-principal' => 'Menu Principal',
        'menu-servicios' => 'Menu Servicios',
        'menu-rapido' => 'Menu Rapido',
    ));
}
add_action('init', 'legger_menus');

/* 
*   Logo
*/
function theme_prefix_setup() {

    add_theme_support( 'post-thumbnails' );

    add_theme_support('custom-logo', array(
        'height'      => 100, 
        'width'       => 400, 
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'theme_prefix_setup');

/* 
*   Habilitación subida de SVG
*/
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

/* 
*   Resoluciones de imagenes
*/
function img_setup_theme() {
    add_image_size('custom-size', 423, 519, true); // Normal resolution
    add_image_size('custom-size-2x', 846, 1038, true); // High resolution
}
add_action('after_img_setup_theme', 'setup_theme');

/* 
* Guarda archivos JSON de ACF en la carpeta '/acf-json' dentro del tema activo.
*/
function my_acf_json_save_point( $path ) {
	return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );

/* 
* Eliminar las etiquetas <p>
*/
add_filter('wpcf7_autop_or_not', '__return_false');

// CPT Imágenes diagnósticas
function registrar_cpt_imagenes() {
    $labels = [
        'name'               => 'Imágenes diagnósticas',
        'singular_name'      => 'Imágen diagnóstica',
        'add_new'            => 'Añadir Nuevo',
        'add_new_item'       => 'Añadir Nueva Imágen diagnóstica',
        'edit_item'          => 'Editar Imágen diagnóstica',
        'new_item'           => 'Nueva Imágen diagnóstica',
        'view_item'          => 'Ver Imágen diagnóstica',
        'search_items'       => 'Buscar Imágen diagnóstica',
        'not_found'          => 'No se encontraron Imágenes diagnósticas',
        'not_found_in_trash' => 'No se encontraron Imágenes diagnósticas en la papelera',
        'all_items'          => 'Todos las Imágenes diagnósticas',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'imagenes'],
        'supports'           => ['title', 'editor', 'thumbnail'],
        'menu_icon'          => 'dashicons-format-gallery',
        'show_in_rest'       => true,
    ];

    register_post_type('imagenesdiagnosticas', $args);
}
add_action('init', 'registrar_cpt_imagenes');

// CPT Servicios
function registrar_cpt_servicios() {
    $labels = [
        'name'               => 'Servicios',
        'singular_name'      => 'Servicio',
        'add_new'            => 'Añadir Nuevo',
        'add_new_item'       => 'Añadir Nuevo Servicio',
        'edit_item'          => 'Editar Servicio',
        'new_item'           => 'Nuevo Servicio',
        'view_item'          => 'Ver Servicio',
        'search_items'       => 'Buscar Servicio',
        'not_found'          => 'No se encontraron Servicios',
        'not_found_in_trash' => 'No se encontraron Servicios en la papelera',
        'all_items'          => 'Todos los Servicios',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'servicio'],
        'supports'           => ['title', 'editor', 'thumbnail'],
        'menu_icon'          => 'dashicons-businessman',
        'show_in_rest'       => true,
    ];

    register_post_type('servicios', $args);
}
add_action('init', 'registrar_cpt_servicios');

// CPT Especialidades
function registrar_cpt_especialidades() {
    $labels = [
        'name'               => 'Especialidades',
        'singular_name'      => 'Especialidad',
        'add_new'            => 'Añadir Nuevo',
        'add_new_item'       => 'Añadir Nueva Especialidad',
        'edit_item'          => 'Editar Especialidad',
        'new_item'           => 'Nueva Especialidad',
        'view_item'          => 'Ver Especialidad',
        'search_items'       => 'Buscar Especialidad',
        'not_found'          => 'No se encontraron Especialidades',
        'not_found_in_trash' => 'No se encontraron Especialidades en la papelera',
        'all_items'          => 'Todos las Especialidades',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'especialidad'],
        'supports'           => ['title', 'editor', 'thumbnail'],
        'menu_icon'          => 'dashicons-list-view',
        'show_in_rest'       => true,
    ];

    register_post_type('especialidades', $args);
}
add_action('init', 'registrar_cpt_especialidades');

// CPT Especialistas
function registrar_cpt_especialistas() {
    $labels = [
        'name'               => 'Especialistas',
        'singular_name'      => 'Especialista',
        'add_new'            => 'Añadir Nuevo',
        'add_new_item'       => 'Añadir Nuevo Especialista',
        'edit_item'          => 'Editar Especialista',
        'new_item'           => 'Nuevo Especialista',
        'view_item'          => 'Ver Especialista',
        'search_items'       => 'Buscar Especialista',
        'not_found'          => 'No se encontraron Especialistas',
        'not_found_in_trash' => 'No se encontraron Especialistas en la papelera',
        'all_items'          => 'Todos los Especialistas',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'especialista'],
        'supports'           => ['title', 'editor', 'thumbnail'],
        'menu_icon'          => 'dashicons-groups',
        'show_in_rest'       => true,
    ];

    register_post_type('especialistas', $args);
}
add_action('init', 'registrar_cpt_especialistas');

function registrar_taxonomia_idiomas() {
    $labels = [
        'name'              => 'Idiomas',
        'singular_name'     => 'Idioma',
        'search_items'      => 'Buscar Idiomas',
        'all_items'         => 'Todos los Idiomas',
        'parent_item'       => 'Idioma Padre',
        'parent_item_colon' => 'Idioma Padre:',
        'edit_item'         => 'Editar Idioma',
        'update_item'       => 'Actualizar Idioma',
        'add_new_item'      => 'Añadir Nuevo Idioma',
        'new_item_name'     => 'Nuevo Nombre de Idioma',
        'menu_name'         => 'Idiomas',
    ];

    $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'idiomas'],
        'show_in_rest'      => true,
    ];

    register_taxonomy('idiomas', ['especialistas'], $args);
}
add_action('init', 'registrar_taxonomia_idiomas');

// CPT Vacantes
function registrar_cpt_vacantes() {
    $labels = [
        'name'               => 'Vacantes',
        'singular_name'      => 'Vacante',
        'add_new'            => 'Añadir Nuevo',
        'add_new_item'       => 'Añadir Nueva Vacante',
        'edit_item'          => 'Editar Vacante',
        'new_item'           => 'Nueva Vacante',
        'view_item'          => 'Ver Vacante',
        'search_items'       => 'Buscar Vacante',
        'not_found'          => 'No se encontraron Vacantes',
        'not_found_in_trash' => 'No se encontraron Vacantes en la papelera',
        'all_items'          => 'Todos las Vacantes',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'vacantes'],
        'supports'           => ['title', 'editor', 'thumbnail'],
        'menu_icon'          => 'dashicons-admin-users',
        'show_in_rest'       => true,
    ];

    register_post_type('vacantes', $args);
}
add_action('init', 'registrar_cpt_vacantes');

//
function get_specialties_data() {
    $args = [
    'post_type' => 'especialidades',
    'posts_per_page' => -1
    ];

    $query = new WP_Query($args);

    $especialidades = [];
    if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $especialidades[] = [
        'title' => get_the_title(),
        'link' => get_permalink(),
        'image' => get_the_post_thumbnail_url() ?: 'default-image.jpg'
        ];
    }
    }
    wp_reset_postdata();

    return $especialidades;
}

// Servicios
function get_servicios_data() {
    $args = [
    'post_type' => 'servicios',
    'posts_per_page' => -1
    ];

    $query = new WP_Query($args);

    $servicios = [];
    if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $servicios[] = [
        'title' => get_the_title(),
        'link' => get_permalink(),
        'image' => get_the_post_thumbnail_url() ?: 'default-image.jpg'
        ];
    }
    }
    wp_reset_postdata();

    return $servicios;
}

// Especialistas
function get_especialistas_data() {
    $args = [
    'post_type' => 'especialistas',
    'posts_per_page' => -1
    ];

    $query = new WP_Query($args);

    $especialistas = [];
    if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $especialidades_nombres = [];
        $especialidades_relacionadas = get_field('especialistas_especialidades');
            if ($especialidades_relacionadas) {
                foreach ($especialidades_relacionadas as $especialidad) {
                    $especialidades_nombres[] = get_the_title($especialidad);
                }
            }
        $especialistas[] = [
        'title' => get_the_title(),
        'link' => get_permalink(),
        'image' => get_the_post_thumbnail_url() ?: 'default-image.jpg',
        'specialties' => $especialidades_nombres,
        ];
    }
    }
    wp_reset_postdata();

    return $especialistas;
}

//Formulario
function enviar_vacante_formulario() {
    global $wpdb;

    if (!isset($_POST['terminos']) || $_POST['terminos'] !== 'on') {
        wp_die('Debes aceptar los Términos y condiciones y la Política de tratamiento y protección de datos personales para enviar tu postulación.');
    }

    $nombre = sanitize_text_field($_POST['nombre']);
    $apellido = sanitize_text_field($_POST['apellido']);
    $email = sanitize_email($_POST['email']);
    $telefono = sanitize_text_field($_POST['telefono']);
    $vacante_titulo = sanitize_text_field($_POST['vacante_titulo']);
    $cv = $_FILES['cv'];

    if ($cv['type'] === 'application/pdf') {
        $upload_dir = wp_upload_dir();
        $target_path = $upload_dir['path'] . '/' . basename($cv['name']);
        move_uploaded_file($cv['tmp_name'], $target_path);
        $cv_url = $upload_dir['url'] . '/' . basename($cv['name']);
    } else {
        wp_die('El archivo debe ser un PDF.');
    }

    $wpdb->insert(
        $wpdb->prefix . 'vacantes',
        [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'telefono' => $telefono,
            'vacante_titulo' => $vacante_titulo,
            'cv_url' => $cv_url
        ],
        ['%s', '%s', '%s', '%s', '%s', '%s']
    );

    // Enviar correo
    $to = 'luchogallo9722@gmail.com';
    $subject = "Nueva Aplicación para la Vacante: $vacante_titulo";
    $message = "Datos del aplicante:
    - Nombre: $nombre $apellido
    - Correo: $email
    - Teléfono: $telefono
    - CV: $cv_url";

    wp_mail($to, $subject, $message);

    // Redirigir a la Thank You Page
    wp_redirect(home_url('/thank-you/') . '?nombre=' . urlencode($nombre) . '&vacante=' . urlencode($vacante_titulo));
    exit;
}
add_action('admin_post_enviar_vacante', 'enviar_vacante_formulario');
add_action('admin_post_nopriv_enviar_vacante', 'enviar_vacante_formulario');

require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// Walker Nav Menu
class Mega_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        
        if ($depth === 0) {
            $parent_item_title = '';
            
            if (isset($args->parent_title)) {
                $parent_item_title = $args->parent_title;
            }
            
            $classes = 'dropdown-menu custom-border-menu border-bottom-0 rounded-0 megamenu';
            $output .= "\n$indent<div class=\"$classes\"><p class=\"custom-font-size cg-customgray ps-2\">" . esc_html($parent_item_title) . "</p><ul class=\"list-unstyled grid-style\">\n";
        } else {
            $output .= "\n$indent<ul class=\"submenu\">\n";
        }
    }

    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';
        
        $has_children = in_array('menu-item-has-children', $classes);
        if ($depth === 0 && $has_children) {
            $classes[] = 'dropdown has-megamenu';
        }

        $class_names = join(' ', array_filter($classes));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $indent . '<li' . $class_names . '>';

        $attributes = !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        
        if ($depth === 0 && $has_children) {
            $attributes .= ' class="nav-link dropdown-toggle" onclick="handleMobileSubMenu(event, \'menu-id-' . $item->ID . '\')"';
            $attributes .= ' data-bs-toggle="dropdown"';
        } else {
            $attributes .= ' class="nav-link"';
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= '<span class="span-underline">';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</span>';
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

        if ($has_children && $depth === 0) {
            $args->parent_title = $item->title;
        }
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}