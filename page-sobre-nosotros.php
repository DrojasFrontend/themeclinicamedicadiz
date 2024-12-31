<?php
    /* Template Name: Sobre Nosotros */
    get_header();
?>

<?php
    // Sección Hero
    get_template_part('template-parts/secciones/sobre-nosotros/hero');

    // Sección Texto Imagen
    get_template_part('template-parts/secciones/sobre-nosotros/texto-imagen');

    // Sección Nuestros Pilares
    get_template_part('template-parts/secciones/sobre-nosotros/pilares-cards');

    // Sección Texto Imagen CTA
    get_template_part('template-parts/secciones/sobre-nosotros/texto-imagen-cta');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php
    get_footer();
?>