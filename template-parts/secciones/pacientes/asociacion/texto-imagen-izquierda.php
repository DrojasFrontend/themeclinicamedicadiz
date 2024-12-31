<?php 
    $grupoTextoImagenIzquierda = get_field('grupo_texto_imagen_izquierda');
    $titulo = $grupoTextoImagenIzquierda['titulo'] ?? '';
    $descripcion = $grupoTextoImagenIzquierda['descripcion'] ?? '';
    $imagen = $grupoTextoImagenIzquierda['imagen'] ?? '';
?>

<section class="bg-menu py-72 py-60 px-18">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded" />
            </div>
            <div class="col-md-6">
                <h2 class="my-4"><?php echo esc_html($titulo); ?></h2>
                <div><?php echo $descripcion; ?></div>
            </div>
        </div>
    </div>
</section>