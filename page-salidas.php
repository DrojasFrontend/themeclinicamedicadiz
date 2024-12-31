<?php
    /* Template Name: Salidas */
    get_header();
?>

<?php

    // Sección Hero
    get_template_part('template-parts/secciones/pacientes/salidas/hero');

    // Sección Texto Imagen
    get_template_part('template-parts/secciones/pacientes/salidas/texto-imagen');

    // Sección Tarjeta Icono
    get_template_part('template-parts/secciones/pacientes/salidas/tarjeta-icono');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php
    get_footer();
?>