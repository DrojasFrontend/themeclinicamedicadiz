<?php
    /* Template Name: Trabaja con nosotros */
    get_header();
?>

<?php
    // Sección Hero
    get_template_part('template-parts/secciones/sobre-nosotros/trabaja-con-nosotros/hero');

    // Sección Texto Imagen
    get_template_part('template-parts/secciones/sobre-nosotros/trabaja-con-nosotros/texto-imagen');

    // Sección Vacantes
    get_template_part('template-parts/secciones/sobre-nosotros/trabaja-con-nosotros/vacantes');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php
    get_footer();
?>