<?php
    $grupoContenidoVideo = get_field('grupo_contenido_video');
    $contenido = $grupoContenidoVideo['contenido'] ?? '';
    $imagen = $grupoContenidoVideo['imagen'] ?? '';
    $url = $grupoContenidoVideo['enlace_video'] ?? '';
    $contenidoFondo = $grupoContenidoVideo['contenido_fondo'] ?? '';
?>

<section class="pb-5 bg-menu">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="content">
                    <div class="mb-5">
                        <?php echo $contenido; ?>
                    </div>
                    <?php if (!empty($imagen)): ?>
                        <a href="<?php echo esc_url($url); ?>" target="_blank">
                            <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="d-block m-auto mw-100">
                        </a>
                    <?php endif; ?>
                    <?php if ($contenidoFondo) : ?>
                        <div class="mt-5 bg-alice-blue p-3">
                            <p><strong><?php echo esc_html($contenidoFondo); ?></strong></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>