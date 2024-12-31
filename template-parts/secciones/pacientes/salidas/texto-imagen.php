<?php 
    $grupoTextoImagen = get_field('grupo_texto_imagen');
    $subtitulo = $grupoTextoImagen['subtitulo'] ?? '';
    $titulo = $grupoTextoImagen['titulo'] ?? '';
    $descripcion = $grupoTextoImagen['descripcion'] ?? '';
    $imagen = $grupoTextoImagen['imagen'] ?? '';
?>

<section class="bg-desech pt-72 py-60 px-18">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span class="text-uppercase custom-span primary-text"><?php echo esc_html($subtitulo); ?></span>
                <h2 class="my-4"><?php echo esc_html($titulo); ?></h2>
                <p><?php echo esc_html($descripcion); ?></p>
            </div>

            <div class="col-md-6 m-negative-120">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded" />
            </div>
        </div>
    </div>
</section>