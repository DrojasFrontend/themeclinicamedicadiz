<?php 
    $grupoTextoImagenCTA = get_field('grupo_texto_imagen_cta');
    $titulo = $grupoTextoImagenCTA['titulo'] ?? '';
    $descripcion = $grupoTextoImagenCTA['descripcion'] ?? '';
    $imagen = $grupoTextoImagenCTA['imagen'] ?? '';
?>

<section class="bg-cerulean pt-72 pb-4 py-60 px-18">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="my-4 text-white"><?php echo esc_html($titulo); ?></h2>
                <p class="mb-3 mb-md-4 text-white"><?php echo esc_html($descripcion); ?></p>
                <?php
                    if (is_array($grupoTextoImagenCTA) && isset($grupoTextoImagenCTA['cta'])) :
                        $cta = $grupoTextoImagenCTA['cta'];
                        if (is_array($cta) && isset($cta['url'], $cta['title'])) :
                            $url = $cta['url'];
                            $texto = $cta['title'];
                ?>
                    <a href="<?php echo esc_url($url); ?>" class="btn custom-btn-hero"><?php echo esc_html($texto); ?></a>
                <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="col-md-6 mt-5 mt-md-0 margin-negative">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded"/>
            </div>
        </div>
    </div>
</section>