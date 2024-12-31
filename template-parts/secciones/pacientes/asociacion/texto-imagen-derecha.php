<?php 
    $grupoTextoImagenDerecha = get_field('grupo_texto_imagen_derecha');
    $titulo = $grupoTextoImagenDerecha['titulo'] ?? '';
    $descripcion = $grupoTextoImagenDerecha['descripcion'] ?? '';
    $imagen = $grupoTextoImagenDerecha['imagen'] ?? '';
?>

<section class="bg-menu pt-72 pb-144 px-18 pb-90">
    <div class="container">
        <div class="row align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6">
                <h2 class="my-4"><?php echo esc_html($titulo); ?></h2>
                <div><?php echo $descripcion; ?></div>
            </div>
            <div class="col-md-6">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded" />
            </div>
        </div>
    </div>
</section>