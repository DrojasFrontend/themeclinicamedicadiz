<?php 
    $grupoTextoImagen = get_field('grupo_texto_imagen');
    $imagenListado = $grupoTextoImagen['imagen'] ?? '';
?>

<section class="bg-menu">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="<?php echo esc_url($imagenListado['url']); ?>" alt="<?php echo esc_attr($imagenListado['alt']); ?>" class="img-fluid rounded">
            </div>
            <?php if (have_rows('grupo_texto_imagen_listado')) : ?>
                <div class="col-md-6">
                    <?php while (have_rows('grupo_texto_imagen')) : the_row(); ?>
                        <?php if (have_rows('texto_descripcion')) : ?>
                            <?php while (have_rows('texto_descripcion')) : the_row(); ?>
                                <div class="mb-4">
                                    <?php 
                                        $titulo = get_sub_field('titulo');
                                        $descripcion = get_sub_field('descripcion');
                                    ?>
                                    <h4><?php echo $titulo; ?></h4>
                                    <p><?php echo $descripcion; ?></p>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>