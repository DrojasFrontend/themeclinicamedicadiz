<?php
    /* Template Name: Servicios */
    get_header();
?>

<?php

    // Sección Hero
    get_template_part('template-parts/secciones/pacientes/servicios/hero');

    // Sección Texto Imagen List
    get_template_part('template-parts/secciones/pacientes/servicios/texto-imagen-list');

    // Sección Texto Imagen
    get_template_part('template-parts/secciones/pacientes/servicios/texto-imagen');

    // Sección Texto Imagen CTA
    get_template_part('template-parts/secciones/pacientes/servicios/texto-imagen-cta');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php
    get_footer();
?>