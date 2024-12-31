<?php 
    $grupoImagen = get_field('grupo_imagen');
    $imagen = $grupoImagen['imagen'] ?? '';
?>

<section class="bg-blue-opacity py-5">
    <div class="container">
        <div class="row flex-column-reverse flex-md-row">
            <div class="col-md-6">
                <div class="form-container">
                    <?php echo do_shortcode('[contact-form-7 id="c8b0dc1" title="Formulario Atención"]'); ?>
                </div>
            </div>
            <div class="col-md-6 text-center mn-t">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>