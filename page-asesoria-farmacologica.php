<?php
    /* Template Name: Asesoria Farmacologica */
    get_header();
?>

<?php

    // Sección Hero
    get_template_part('template-parts/secciones/pacientes/asesoria/hero');

    // Sección Texto Imagen
    get_template_part('template-parts/secciones/pacientes/asesoria/texto-imagen');

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