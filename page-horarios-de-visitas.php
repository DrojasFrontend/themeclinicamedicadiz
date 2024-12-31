<?php
    /* Template Name: Horarios */
    get_header();
?>

<?php

    // Sección Hero
    get_template_part('template-parts/secciones/pacientes/horarios/hero');

    // Sección Texto Imagen
    get_template_part('template-parts/secciones/pacientes/horarios/texto-imagen');

    // Sección Texto Listado
    get_template_part('template-parts/secciones/pacientes/horarios/texto-listado');

    // Sección Texto Imagen Fondo
    get_template_part('template-parts/layout/global/texto-fondo');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php
    get_footer();
?>