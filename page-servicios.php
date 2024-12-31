<?php
    get_header();
?>

<?php
    // Sección Hero
    get_template_part('template-parts/secciones/servicios/hero');

    // Sección Buscador y listado de servicios
    get_template_part('template-parts/secciones/servicios/servicios');

    // Sección Texto Imagen CTA Fondo
    get_template_part('template-parts/secciones/servicios/texto-imagen-cta-fondo');

    // Sección Contactanos
    get_template_part('template-parts/layout/global/contacto');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');
?>

<?php 
get_footer();
?>