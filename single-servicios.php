<?php
    get_header();
?>

<?php

    // Sección Hero
    get_template_part('template-parts/secciones/servicios/single-servicios/hero');

    // Sección Tarjeta Icono
    get_template_part('template-parts/secciones/servicios/single-servicios/tarjeta-icono');

    // Sección Texto Imagen Izquierda Blue
    get_template_part('template-parts/secciones/servicios/single-servicios/texto-imagen-izquierda-blue');

    // Sección Texto Imagen
    get_template_part('template-parts/secciones/servicios/single-servicios/texto-imagen');

     // Sección Texto Imagen Izquierda
    get_template_part('template-parts/secciones/servicios/single-servicios/texto-imagen-izquierda');

    // Sección Texto Imagen Blue
    get_template_part('template-parts/secciones/servicios/single-servicios/texto-imagen-blue');

    // Sección Texto Imagen Izquierda Blue Espaciado
    get_template_part('template-parts/secciones/servicios/single-servicios/texto-izquierda-blue-espaciado');

    // Sección Tarjeta Listado
    get_template_part('template-parts/secciones/servicios/single-servicios/tarjeta-listado');

    // Sección Tarjeta Fondo
    get_template_part('template-parts/secciones/servicios/single-servicios/tarjeta-listado-fondo');

    // Sección Texto Listado Blue
    get_template_part('template-parts/secciones/servicios/single-servicios/texto-listado-blue');

    // Sección Listado Servicios
    get_template_part('template-parts/secciones/servicios/single-servicios/listado-servicios');

    // Sección Texto Listado
    get_template_part('template-parts/secciones/servicios/single-servicios/texto-listado');

    // Sección Texto Imagen Fondo
    get_template_part('template-parts/secciones/servicios/single-servicios/texto-imagen-fondo');

    // Sección Contactanos
    $grupo_mostrar_contactanos = get_field('grupo_mostrar_contactanos', get_the_ID());
    if (!empty($grupo_mostrar_contactanos['mostrar_contactanos'])) {
        get_template_part('template-parts/layout/global/contacto');
    }

    // Sección Visitanos
    get_template_part('template-parts/layout/global/visitanos');

?>
    
<?php
    get_footer();
?>