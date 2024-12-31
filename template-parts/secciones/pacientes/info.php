<?php 
    $grupoContenido = get_field('grupo_contenido');
    $subtitulo = $grupoContenido['subtitulo'];
    $titulo = $grupoContenido['titulo'];
    $descripcion = $grupoContenido['descripcion'];
    $imagen = $grupoContenido['imagen'];
?>

<section class="py-72 py-60 px-18 text-center">
    <div class="container">
        <?php if( $subtitulo ): ?>
            <span class="text-uppercase custom-span primary-text"><?php echo esc_html($subtitulo); ?></span>
        <?php endif; ?>
        <?php if( $titulo ): ?>
            <h2 class="mt-3"><?php echo esc_html($titulo); ?></h2>
        <?php endif; ?>
        <?php if( $descripcion ): ?>
            <p class="mt-3"><?php echo esc_html($descripcion); ?></p>
        <?php endif; ?>
        <?php if ($imagen): ?>
            <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="mw-100" />
        <?php endif; ?>
    </div>
</section>