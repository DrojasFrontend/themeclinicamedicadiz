<?php
    /* Template Name: Historia Clinica */
    get_header();
?>

<?php

    // Sección Hero
    get_template_part('template-parts/secciones/pacientes/historia-clinica/hero');

    // Sección Texto Imagen
    get_template_part('template-parts/secciones/pacientes/historia-clinica/texto-imagen');

    // Sección Tarjeta Listado
    get_template_part('template-parts/secciones/pacientes/historia-clinica/tarjeta-listado');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php
    get_footer();
?>