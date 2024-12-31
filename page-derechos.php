<?php
    /* Template Name: Derechos */
    get_header();
?>

<?php

    // Sección Hero
    get_template_part('template-parts/secciones/pacientes/derechos/hero');

    // Sección Tab Content
    get_template_part('template-parts/secciones/pacientes/derechos/tab-content');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php
    get_footer();
?>