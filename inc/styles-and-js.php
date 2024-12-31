<?php
function enqueue_scripts() {
    // Enqueue CSS
    $mainFilePath = glob( get_template_directory() . '/css/build/main.min.*.css' );
    $mainFileURI = get_template_directory_uri() . '/css/build/' . basename($mainFilePath[0]);
    wp_enqueue_style( 'main_css', $mainFileURI );

    // Enqueue Slick JS
    wp_enqueue_script( 'slick_js', get_template_directory_uri() . '/js/src/libs/slick.min.js', array('jquery'), null, true );

    // Enqueue Main JS (assuming this exists)
    $mainJsFilePath = glob( get_template_directory() . '/js/build/main.min.*.js' );
    $mainJsFileURI = get_template_directory_uri() . '/js/build/' . basename($mainJsFilePath[0]);
    wp_enqueue_script( 'main_js', $mainJsFileURI, array('jquery', 'slick_js'), null, true );

    // Localize Script
    wp_localize_script('main_js', 'lm_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
?>
