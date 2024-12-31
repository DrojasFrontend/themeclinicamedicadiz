<?php
/*
Template Name: Pacientes
*/
get_header();
?>

<?php
    // Sección Hero
    get_template_part('template-parts/secciones/pacientes/hero');

    // Sección Hero Info
    get_template_part('template-parts/secciones/pacientes/hero-info');

    // Sección Info
    get_template_part('template-parts/secciones/pacientes/info');

    // Sección Listado
    get_template_part('template-parts/secciones/pacientes/list');

    // Sección Texto Imagen
    get_template_part('template-parts/secciones/pacientes/texto-imagen');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php get_footer(); ?>