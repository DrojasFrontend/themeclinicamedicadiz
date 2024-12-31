<?php 
    $grupoTextoImagen = get_field('grupo_texto_imagen');
    $subtitulo = $grupoTextoImagen['subtitulo'];
    $titulo = $grupoTextoImagen['titulo'];
    $descripcion = $grupoTextoImagen['descripcion'];
    $imagen = $grupoTextoImagen['imagen'];
?>

<section class="bg-desech py-72 py-60 px-18">
    <div class="container">
        <div class="row align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 mt-3 mt-md-0">
                <?php if( $subtitulo ): ?>
                    <span class="text-uppercase custom-span primary-text"><?php echo esc_html($subtitulo); ?></span>
                <?php endif; ?>
                <?php if( $titulo ): ?>
                    <h2 class="my-4"><?php echo esc_html($titulo); ?></h2>
                <?php endif; ?>
                <?php if( $descripcion ): ?>
                    <p><?php echo esc_html($descripcion); ?></p>
                <?php endif; ?>
                <?php if (have_rows('grupo_texto_imagen')) : ?>
                    <div class="row mt-3">
                        <?php while (have_rows('grupo_texto_imagen')) : the_row(); ?>
                            <?php if (have_rows('listado')) : ?>
                                <?php while (have_rows('listado')) : the_row(); ?>
                                    <?php 
                                        $color_titulo = get_sub_field('color_titulo'); 
                                    ?>
                                    <div class="col-6 col-lg-4 seccion__canecas">
                                        <p class="caneca-titulo color-<?php echo esc_attr($color_titulo); ?> fw-bolder"><?php the_sub_field('titulo'); ?></p>
                                        <?php if (have_rows('items')) : ?>
                                            <?php while (have_rows('items')) : the_row(); ?>
                                                <ul>
                                                    <li><?php the_sub_field('item'); ?></li>
                                                </ul>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-6 mn-140">
                <?php if ($imagen): ?>
                    <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>