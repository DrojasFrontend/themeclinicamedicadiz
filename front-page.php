<?php 
get_header();
?>
<main>
  <div class="row">
      <?php
        // Sección Hero Carusel
        get_template_part('template-parts/secciones/home/hero-carusel');

        // Sección Tarjeta Iconos
        get_template_part('template-parts/secciones/home/tarjeta-icono');

        // Sección Servicios
        get_template_part('template-parts/secciones/home/servicios');

        // Sección Texto Imagen CTA
        get_template_part('template-parts/secciones/home/texto-imagen-cta');

        // Sección Texto Imagen
        get_template_part('template-parts/secciones/home/texto-imagen');

        // Sección Tarjeta Imagen Fondo
        get_template_part('template-parts/secciones/home/tarjeta-imagen-fondo');

        // Sección Noticias
        get_template_part('template-parts/secciones/home/noticias');

        // Sección Texto Imagen CTA Fondo
        get_template_part('template-parts/secciones/home/texto-imagen-cta-fondo');

        // Sección Contactanos
        get_template_part('template-parts/layout/global/contacto');

        // Sección Visitanos
        get_template_part('template-parts/layout/global/visitanos');
      ?>
      
  </div>
</main>
<?php 
get_footer();
?>