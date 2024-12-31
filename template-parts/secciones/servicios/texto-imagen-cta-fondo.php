<?php 
    $grupoTextoImagenFondo = get_field('grupo_texto_imagen_fondo');
    $fondo = $grupoTextoImagenFondo['fondo'] ?? '';
    $subtitulo = $grupoTextoImagenFondo['subtitulo'] ?? '';
    $titulo = $grupoTextoImagenFondo['titulo'] ?? '';
    $descripcion = $grupoTextoImagenFondo['descripcion'] ?? '';
    $cta = $grupoTextoImagenFondo['cta'];
    $imagen = $grupoTextoImagenFondo['imagen'] ?? '';
?>

<section style="background-image: url('<?php echo esc_url($fondo['url']); ?>');" class="bg-cta-fondo">
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-6">
                <span class="text-uppercase custom-span primary-text text-white"><?php echo esc_html($subtitulo); ?></span>
                <h2 class="my-4 text-white"><?php echo esc_html($titulo); ?></h2>
                <p class="mb-5 text-white"><?php echo esc_html($descripcion); ?></p>
                <?php
                    if (is_array($cta) && isset($cta['url'], $cta['title'], $cta['target'])) :
                        $url = $cta['url'];
                        $texto = $cta['title'];
                        $target = $cta['target'] ? $cta['target'] : '_self';
                ?>
                <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="btn custom-btn-cta"><?php echo esc_html($texto); ?></a>
                <?php
                    endif;
                ?>
            </div>

            <div class="col-md-6">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded"/>
            </div>
        </div>
    </div>
</section>