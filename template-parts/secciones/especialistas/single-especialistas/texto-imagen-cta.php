<?php 
    $grupoTextoImagen = get_field('grupo_texto_imagen_cta');
    $subtitulo = $grupoTextoImagen['subtitulo'] ?? null;
    $titulo = $grupoTextoImagen['titulo'] ?? null;
    $descripcion = $grupoTextoImagen['descripcion'] ?? null;
    $imagen = $grupoTextoImagen['imagen'] ?? null;
    $cta = $grupoTextoImagen['cta'] ?? null;

    $hayContenido = $titulo || $descripcion || $imagen;
?>

<?php if ($hayContenido): ?>
<section class="bg-pigment-green py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if( $subtitulo ): ?>
                    <span class="text-uppercase custom-span text-white"><?php echo esc_html($subtitulo); ?></span>
                <?php endif; ?>
                <?php if( $titulo ): ?>
                    <h2 class="my-4 text-white"><?php echo esc_html($titulo); ?></h2>
                <?php endif; ?>
                <?php if( $descripcion ): ?>
                    <div class="mb-5 text-white"><?php echo $descripcion; ?></div>
                <?php endif; ?>
                <?php
                    if (is_array($grupoTextoImagen) && isset($grupoTextoImagen['cta'])) :
                        $cta = $grupoTextoImagen['cta'];
                        if (is_array($cta) && isset($cta['url'], $cta['title'], $cta['target'])) :
                            $url = $cta['url'];
                            $texto = $cta['title'];
                            $target = $cta['target'] ? $cta['target'] : '_self';
                ?>
                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="btn custom-btn-cta-cerulean text-decoration-none"><?php echo esc_html($texto); ?></a>
                <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="col-md-6 margin-negative mt-3 mt-md-0">
                <?php if ($imagen) : ?>
                    <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid"/>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>