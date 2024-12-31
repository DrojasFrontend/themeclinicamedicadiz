<?php
    /* Template Name: Asociación de Usuarios */
    get_header();
?>

<?php

    // Sección Hero
    get_template_part('template-parts/secciones/pacientes/asociacion/hero');

    // Sección Texto Imagen Izquierda
    get_template_part('template-parts/secciones/pacientes/asociacion/texto-imagen-izquierda');

    // Sección Texto Listado
    get_template_part('template-parts/secciones/pacientes/asociacion/texto-listado');

    // Sección Texto Imagen Derecha
    get_template_part('template-parts/secciones/pacientes/asociacion/texto-imagen-derecha');

    // Sección Texto Imagen CTA Fondo
    get_template_part('template-parts/secciones/pacientes/asociacion/texto-imagen-cta-fondo');

    // Sección Texto Listado
    get_template_part('template-parts/secciones/pacientes/asociacion/imagen-descargas');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php
    get_footer();
?>