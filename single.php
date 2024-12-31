<?php
    get_header();
?>

<?php
    // Sección Hero
    get_template_part('template-parts/secciones/blog/single-blog/hero');

    // Sección Single
    get_template_part('template-parts/secciones/blog/single-blog/single-post');

    // Sección Carrusel Imagenes
    get_template_part('template-parts/secciones/blog/single-blog/carrusel-imagenes');

     // Sección Single Video
    get_template_part('template-parts/secciones/blog/single-blog/single-video');

    // Sección Noticias
    get_template_part('template-parts/secciones/blog/single-blog/noticias');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php
    get_footer();
?>