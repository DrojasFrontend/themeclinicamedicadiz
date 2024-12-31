<?php 
    $grupoTextoImagen = get_field('grupo_texto_imagen');
    $subtitulo = $grupoTextoImagen['subtitulo'] ?? '';
    $titulo = $grupoTextoImagen['titulo'] ?? '';
    $descripcion = $grupoTextoImagen['descripcion'] ?? '';
    $imagen = $grupoTextoImagen['imagen'] ?? '';
?>

<section class="bg-menu pt-md-3 pb-5 px-18">
    <div class="container">
        <div class="row align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 mt-3 mt-md-0">
                <?php if( $subtitulo ): ?>
                    <span class="text-uppercase custom-span primary-text"><?php echo esc_html($subtitulo); ?></span>
                <?php endif; ?>
                <?php if( $titulo ): ?>
                    <h2 class="my-4"><?php echo esc_html($titulo); ?></h2>
                <?php endif; ?>
                <?php if( $descripcion ): ?>
                    <p class="mb-4"><?php echo esc_html($descripcion); ?></p>
                <?php endif; ?>
                <?php
                    if (is_array($grupoTextoImagen) && isset($grupoTextoImagen['cta'])) :
                        $cta = $grupoTextoImagen['cta'];
                        if (is_array($cta) && isset($cta['url'], $cta['title'])) :
                            $url = $cta['url'];
                            $texto = $cta['title'];
                ?>
                    <a href="<?php echo esc_url($url); ?>" class="btn custom-btn"><?php echo esc_html($texto); ?></a>
                <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="col-md-6">
                <?php if ($imagen) : ?>
                    <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>