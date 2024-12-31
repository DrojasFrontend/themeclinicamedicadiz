<?php
    /* Template Name: Hospital Verde */
    get_header();
?>

<?php
    // Sección Hero
    get_template_part('template-parts/secciones/sobre-nosotros/hospital-verde/hero');

    // Sección Carrusel Imagenes
    get_template_part('template-parts/secciones/sobre-nosotros/hospital-verde/carrusel-imagenes');

    // Sección Tarjeta Fondo
    get_template_part('template-parts/secciones/sobre-nosotros/hospital-verde/tarjeta-fondo');

    // Sección Texto Video
    get_template_part('template-parts/secciones/sobre-nosotros/hospital-verde/texto-video');

    // Sección Noticias
    get_template_part('template-parts/secciones/sobre-nosotros/hospital-verde/noticias');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php
    get_footer();
?>