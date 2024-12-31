<?php
    /* Template Name: Recomendaciones */
    get_header();
?>

<?php

    // Sección Hero
    get_template_part('template-parts/secciones/pacientes/recomendaciones/hero');

    // Sección Texto Listado
    get_template_part('template-parts/secciones/pacientes/recomendaciones/texto-listado');

    // Sección Texto Imagen Listado
    get_template_part('template-parts/secciones/pacientes/recomendaciones/texto-imagen-listado');

    // Sección Texto Imagen CTA Fondo
    get_template_part('template-parts/layout/global/texto-fondo');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php
    get_footer();
?>