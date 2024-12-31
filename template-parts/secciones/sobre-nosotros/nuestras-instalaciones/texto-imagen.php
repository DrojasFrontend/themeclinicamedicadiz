<?php 
    $GrupoTextoImagen = get_field('grupo_texto_imagen');
    $titulo = $GrupoTextoImagen['titulo'] ?? '';
    $descripcion = $GrupoTextoImagen['descripcion'] ?? '';
    $CTA = $GrupoTextoImagen['cta'] ?? '';
    $imagen = $GrupoTextoImagen['imagen'] ?? '';
?>

<section class="bg-pigment-green pt-72 px-18">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0">
                <h2 class="text-white my-4"><?php echo esc_html($titulo); ?></h2>
                <p class="text-white mb-4"><?php echo esc_html($descripcion); ?></p>
                <?php
                    if (is_array($CTA) && isset($CTA['url'], $CTA['title'] , $CTA['target'])) :
                        $url = $CTA['url'];
                        $texto = $CTA['title'];
                        $target = $CTA['target'] ? $CTA['target'] : '_self';
                ?>
                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="btn custom-btn-cta-cerulean text-decoration-none"><?php echo esc_html($texto); ?></a>
                <?php endif; ?>
            </div>

            <div class="col-md-6 margin-negative">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded" />
            </div>
        </div>
    </div>
</section>