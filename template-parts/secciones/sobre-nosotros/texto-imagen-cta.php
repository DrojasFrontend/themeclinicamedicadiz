<?php 
    $grupoTextoImagenCTA = get_field('grupo_texto_cta');
    $subtitulo = $grupoTextoImagenCTA['subtitulo'] ?? '';
    $titulo = $grupoTextoImagenCTA['titulo'] ?? '';
    $descripcion = $grupoTextoImagenCTA['descripcion'] ?? '';
    $cta = $grupoTextoImagenCTA['cta'] ?? '';
    $imagen = $grupoTextoImagenCTA['imagen'] ?? '';
?>

<section class="bg-alice-blue pt-95 pt-60 px-18">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span class="text-uppercase custom-span tertiary-text"><?php echo esc_html($subtitulo); ?></span>
                <h2 class="my-4"><?php echo esc_html($titulo); ?></h2>
                <p class="mb-4"><?php echo esc_html($descripcion); ?></p>
                <?php
                    if (is_array($cta) && isset($cta['url'], $cta['title'])) :
                        $url = $cta['url'];
                        $texto = $cta['title'];
                ?>
                    <a href="<?php echo esc_url($url); ?>" class="btn custom-btn"><?php echo esc_html($texto); ?></a>
                <?php endif; ?>
            </div>

            <div class="col-md-6 mt-5 mt-md-0 margin-negative">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded" />
            </div>
        </div>
    </div>
</section>