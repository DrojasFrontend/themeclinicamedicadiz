<?php
    /* Template Name: Trabaja con nosotros */
    get_header();
?>

<?php
    // Sección Hero
    get_template_part('template-parts/secciones/sobre-nosotros/convenios/hero');

    // Tarjeta Imagen
    get_template_part('template-parts/secciones/sobre-nosotros/convenios/tarjeta-imagen');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php
    get_footer();
?>