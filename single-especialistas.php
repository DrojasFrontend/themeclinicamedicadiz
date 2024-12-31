<?php
    get_header();
?>

<?php

    // Sección Hero
    get_template_part('template-parts/secciones/especialistas/single-especialistas/hero');

    // Sección Información Especialistas
    get_template_part('template-parts/secciones/especialistas/single-especialistas/información-especialistas');

    // Sección Texto Imagen CTA
    get_template_part('template-parts/secciones/especialistas/single-especialistas/texto-imagen-cta');

    // Sección Carusel Especialistas
    get_template_part('template-parts/secciones/especialistas/single-especialistas/carusel-especialistas');

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');

?>
    
<?php
    get_footer();
?>