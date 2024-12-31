<?php
    /* Template Name: Imagenes Diagnosticas */
    get_header();
?>

<?php

    // Sección Hero
    get_template_part('template-parts/secciones/pacientes/imagenes-diagnosticas/hero');

    // Sección Imagenes Diagnosticas
    get_template_part('template-parts/secciones/pacientes/imagenes-diagnosticas/imagenes-diagnosticas');

    // Sección Texto Imagen CTA
    get_template_part('template-parts/secciones/pacientes/imagenes-diagnosticas/texto-imagen-cta');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php
    get_footer();
?>