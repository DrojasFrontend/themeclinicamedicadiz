<?php 
    $grupoTextoImagenFondo = get_field('grupo_texto_imagen_fondo');
    $fondo = $grupoTextoImagenFondo['fondo'] ?? '';
    $imagen = $grupoTextoImagenFondo['imagen'] ?? '';
    $subtitulo = $grupoTextoImagenFondo['titulo'] ?? '';
    $titulo = $grupoTextoImagenFondo['titulo'] ?? '';
    $descripcion = $grupoTextoImagenFondo['descripcion'] ?? '';
?>

<section style="background-image: url('<?php echo esc_url($fondo['url']); ?>');" class="bg-cta-fondo pb-72 px-18 pb-60">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mn-70 mn-50">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded"/>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <span class="text-uppercase custom-span primary-text text-white"><?php echo esc_html($subtitulo); ?></span>
                <h2 class="my-4 text-white"><?php echo esc_html($titulo); ?></h2>
                <div><?php echo $descripcion; ?></div>
            </div>
        </div>
    </div>
</section>