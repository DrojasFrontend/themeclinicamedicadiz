<?php 
    $grupoTextoImagen = get_field('grupo_texto_imagen');
    $subtitulo = $grupoTextoImagen['subtitulo'] ?? '';
    $titulo = $grupoTextoImagen['titulo'] ?? '';
    $descripcion = $grupoTextoImagen['descripcion'] ?? '';
    $imagen = $grupoTextoImagen['imagen'] ?? '';
?>

<section class="bg-desech pt-72 pb-90 py-60 px-18">
    <div class="container">
        <div class="row flex-column-reverse flex-md-row">
            <div class="col-md-6 mt-4 mt-md-0">
                <span class="text-uppercase custom-span primary-text"><?php echo esc_html($subtitulo); ?></span>
                <h2 class="my-4"><?php echo esc_html($titulo); ?></h2>
                <div><?php echo $descripcion; ?></div>
            </div>

            <div class="col-md-6">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded" />
            </div>
        </div>
    </div>
</section>