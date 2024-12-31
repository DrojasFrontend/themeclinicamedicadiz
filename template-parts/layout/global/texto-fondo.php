<?php

    $global_content = get_page_by_path('contenido-global')->ID;
    $grupoTextoImagenFondo = ($global_content) ? get_field('grupo_fondo', $global_content) : null;

    $imagenFondo = $grupoTextoImagenFondo['fondo'] ?? '';
    $subtitulo = $grupoTextoImagenFondo['subtitulo'] ?? '';
    $titulo = $grupoTextoImagenFondo['titulo'] ?? '';
    $descripcion = $grupoTextoImagenFondo['descripcion'] ?? '';
    $icono = $grupoTextoImagenFondo['icono'];
    $texto = $grupoTextoImagenFondo['texto'] ?? '';
    $imagen = $grupoTextoImagenFondo['imagen'] ?? '';
?>

<section style="background-image: url('<?php echo esc_url($imagenFondo['url']); ?>');" class="bg-cta-fondo py-72 py-60 px-18">
    <div class="container">
        <div class="row flex-column-reverse flex-md-row">
            <div class="col-md-6 mb-4 mb-lg-0 mt-4 mt-md-0">
                <span class="text-uppercase custom-span primary-text text-white"><?php echo esc_html($subtitulo); ?></span>
                <h2 class="my-4 text-white"><?php echo esc_html($titulo); ?></h2>
                <div class="mb-2 text-white"><?php echo $descripcion; ?></div>
                <div class="d-flex gap-2">
                    <img src="<?php echo esc_url($icono['url']); ?>" alt="<?php echo esc_attr($icono['alt']); ?>" />
                    <p class="text-white mb-0"><?php echo esc_html($texto); ?></p>
                </div>
            </div>

            <div class="col-md-6 mn-120 mn-100">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded"/>
            </div>
        </div>
    </div>
</section>