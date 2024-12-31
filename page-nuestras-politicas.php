<?php
/*
Template Name: Pacientes
*/
get_header();
?>

<?php
    // Sección Hero
    get_template_part('template-parts/secciones/nuestras-politicas/hero');

    // Sección Hero Info
    get_template_part('template-parts/secciones/nuestras-politicas/tab-content');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php get_footer(); ?>