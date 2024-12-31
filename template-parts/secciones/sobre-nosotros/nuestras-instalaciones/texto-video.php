<?php 
    $grupoTextoVideo = get_field('grupo_texto_video');
    $subtitulo = $grupoTextoVideo['subtitulo'] ?? '';
    $titulo = $grupoTextoVideo['titulo'] ?? '';
    $descripcion = $grupoTextoVideo['descripcion'] ?? '';
    $imagen = $grupoTextoVideo['imagen'] ?? '';
    $urlVideo = $grupoTextoVideo['enlace_video'] ?? '';
?>

<section class="bg-menu py-5 px-18">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span class="text-uppercase custom-span tertiary-text"><?php echo esc_html($subtitulo); ?></span>
                <h2 class="my-4"><?php echo esc_html($titulo); ?></h2>
                <div><?php echo $descripcion; ?></div>
            </div>

            <div class="col-md-6">
                <?php
                    if (is_array($urlVideo) && isset($urlVideo['url'], $urlVideo['target'])) :
                        $url = $urlVideo['url'];
                        $target = $urlVideo['target'] ? $urlVideo['target'] : '_self';
                ?>
                <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>">
                    <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded" />
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>