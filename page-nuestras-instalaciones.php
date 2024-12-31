<?php
    /* Template Name: Nuestras Instalaciones */
    get_header();
?>

<?php
    // Sección Hero
    get_template_part('template-parts/secciones/sobre-nosotros/nuestras-instalaciones/hero');

    // Sección Texto Video
    get_template_part('template-parts/secciones/sobre-nosotros/nuestras-instalaciones/texto-video');

    // Sección Texto Listado
    get_template_part('template-parts/secciones/sobre-nosotros/nuestras-instalaciones/texto-listado');

    // Sección Texto Pestaña
    get_template_part('template-parts/secciones/sobre-nosotros/nuestras-instalaciones/texto-pestaña');

    // Sección Servicios
    get_template_part('template-parts/secciones/sobre-nosotros/nuestras-instalaciones/servicios');

    // Sección Texto Imagen
    get_template_part('template-parts/secciones/sobre-nosotros/nuestras-instalaciones/texto-imagen');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php
    get_footer();
?>