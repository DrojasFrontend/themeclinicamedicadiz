<?php 
    $grupoTextoImagenListado = get_field('grupo_texto_imagen_listado');
    $subtitulo = $grupoTextoImagenListado['subtitulo'] ?? '';
    $titulo = $grupoTextoImagenListado['titulo'] ?? '';
    $imagenListado = $grupoTextoImagenListado['imagen'] ?? '';
?>

<section class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <?php if( $subtitulo ): ?>
                <span class="text-uppercase custom-span primary-text"><?php echo esc_html($subtitulo); ?></span>
            <?php endif; ?>
            <?php if( $titulo ): ?>
                <h2 class="my-4"><?php echo esc_html($titulo); ?></h2>
            <?php endif; ?>
            <?php if (have_rows('grupo_texto_imagen_listado')) : ?>
                <ul class="list-unstyled">
                    <?php while (have_rows('grupo_texto_imagen_listado')) : the_row(); ?>
                        <?php if (have_rows('listado')) : ?>
                            <?php while (have_rows('listado')) : the_row(); ?>
                                <li class="mb-3 d-flex gap-2">
                                    <?php 
                                        $imagen = get_sub_field('imagen');
                                        $descripcion = get_sub_field('descripcion');
                                    ?>
                                    <?php if ($imagen) : ?>
                                        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" width="48" height="48" />
                                    <?php endif; ?>
                                    <span><?php echo $descripcion; ?></span>
                                </li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>

        </div>
        <div class="col-md-6 text-center">
            <img src="<?php echo esc_url($imagenListado['url']); ?>" alt="<?php echo esc_attr($imagenListado['alt']); ?>" class="img-fluid rounded">
        </div>
    </div>
</section>