<?php 
    $grupoTextoImagen = get_field('grupo_texto_cta');
    $subtitulo = $grupoTextoImagen['subtitulo'];
    $titulo = $grupoTextoImagen['titulo'];
    $descripcion = $grupoTextoImagen['descripcion'];
    $imagen = $grupoTextoImagen['imagen'];
?>

<section class="overflow-hidden position-relative bg-menu py-0 py-md-5 pt-5 px-18">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-md-6 custom-text">
                <?php if( $subtitulo ): ?>
                    <span class="text-uppercase custom-span primary-text"><?php echo esc_html($subtitulo); ?></span>
                <?php endif; ?>
                <?php if( $titulo ): ?>
                    <h2 class="my-4"><?php echo esc_html($titulo); ?></h2>
                <?php endif; ?>
                <?php if( $descripcion ): ?>
                    <p><?php echo esc_html($descripcion); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if ($imagen) : ?>
        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="mw-100 mw-md-auto custom-img">
    <?php endif; ?>
</section>