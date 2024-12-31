<?php 
    $grupoTextoImagen = get_field('grupo_texto_fondo');
    $subtitulo = $grupoTextoImagen['subtitulo'];
    $titulo = $grupoTextoImagen['titulo'];
    $descripcion = $grupoTextoImagen['descripcion'];
    $imagen = $grupoTextoImagen['imagen'];
    $imagenFondo = $grupoTextoImagen['fondo'];
?>

<section style="background-image: url('<?php echo esc_url($imagenFondo['url']); ?>');" class="bg-cta-fondo pt-5 px-18">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if( $subtitulo ): ?>
                    <span class="text-uppercase custom-span primary-text text-white"><?php echo esc_html($subtitulo); ?></span>
                <?php endif; ?>
                <?php if( $titulo ): ?>
                    <h2 class="my-4 text-white"><?php echo esc_html($titulo); ?></h2>
                <?php endif; ?>
                <?php if( $descripcion ): ?>
                    <p class="mb-5 text-white"><?php echo esc_html($descripcion); ?></p>
                <?php endif; ?>
                <?php
                    if (is_array($grupoTextoImagen) && isset($grupoTextoImagen['cta'])) :
                        $cta = $grupoTextoImagen['cta'];
                        if (is_array($cta) && isset($cta['url'], $cta['title'])) :
                            $url = $cta['url'];
                            $texto = $cta['title'];
                ?>
                    <a href="<?php echo esc_url($url); ?>" class="btn custom-btn-cta"><?php echo esc_html($texto); ?></a>
                <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="col-md-6 margin-negative mt-3 mt-md-0 z-3">
                <?php if ($imagen) : ?>
                    <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid"/>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>