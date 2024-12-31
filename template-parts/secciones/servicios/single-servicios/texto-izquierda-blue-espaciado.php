<?php 
    $grupoTextoImagen = get_field('grupo_texto_blue_espaciado');
    $subtitulo = $grupoTextoImagen['subtitulo'] ?? null;
    $titulo = $grupoTextoImagen['titulo'] ?? null;
    $descripcion = $grupoTextoImagen['descripcion'] ?? null;
    $imagen = $grupoTextoImagen['imagen'] ?? null;

    $hayContenido = $subtitulo || $titulo || $descripcion || $imagen;
?>

<?php if ($hayContenido): ?>
<section class="py-5 bg-menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <?php if ($imagen) : ?>
                    <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded" />
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php if( $subtitulo ): ?>
                    <span class="text-uppercase custom-span secondary-text"><?php echo esc_html($subtitulo); ?></span>
                <?php endif; ?>
                <?php if( $titulo ): ?>
                    <h2 class="my-4"><?php echo esc_html($titulo); ?></h2>
                <?php endif; ?>
                <?php if( $descripcion ): ?>
                    <div class="mb-4"><?php echo $descripcion; ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>