<?php 
    $grupoTextoImagenCTA = get_field('grupo_texto_imagen_cta');
    $titulo = $grupoTextoImagenCTA['titulo'] ?? '';
    $descripcion = $grupoTextoImagenCTA['descripcion'] ?? '';
    $imagen = $grupoTextoImagenCTA['imagen'] ?? '';
?>

<section class="bg-cerulean">
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0">
                <h2 class="my-4 text-white"><?php echo esc_html($titulo); ?></h2>
                <p class="mb-5 text-white"><?php echo esc_html($descripcion); ?></p>
                <?php
                    if (is_array($grupoTextoImagenCTA) && isset($grupoTextoImagenCTA['cta'])) :
                        $cta = $grupoTextoImagenCTA['cta'];
                        if (is_array($cta) && isset($cta['url'], $cta['title'])) :
                            $url = $cta['url'];
                            $texto = $cta['title'];
                ?>
                    <a href="<?php echo esc_url($url); ?>" class="btn custom-btn-cta-cerulean"><?php echo esc_html($texto); ?></a>
                <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="col-md-6 margin-negative">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded"/>
            </div>
        </div>
    </div>
</section>