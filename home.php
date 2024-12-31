<?php
    get_header();
?>

<?php

    // Sección Hero
    get_template_part('template-parts/secciones/blog/hero-blog');

    // Sección Noticias Destacadas
    get_template_part('template-parts/secciones/blog/noticias-destacadas');

    // Sección Noticias
    get_template_part('template-parts/secciones/blog/noticias');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');

?>

<?php
    get_footer();
?>