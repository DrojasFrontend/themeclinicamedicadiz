<?php 
    $grupoTextoImagen = get_field('grupo_texto_imagen_cta');
    $subtitulo = $grupoTextoImagen['subtitulo'] ?? '';
    $titulo = $grupoTextoImagen['titulo'] ?? '';
    $descripcion = $grupoTextoImagen['descripcion'] ?? '';
    $imagen = $grupoTextoImagen['imagen'] ?? '';
?>

<section class="bg-desech pt-72 py-60 px-18">
    <div class="container">
        <div class="row flex-column-reverse flex-md-row mn-40">
            <div class="col-md-7 mt-4 mt-md-0">
                <span class="text-uppercase custom-span primary-text"><?php echo esc_html($subtitulo); ?></span>
                <h2 class="my-4"><?php echo esc_html($titulo); ?></h2>
                <p><?php echo esc_html($descripcion); ?></p>
                <?php if (have_rows('grupo_texto_imagen_cta')) : ?>
                    <div class="mt-3">
                        <?php while (have_rows('grupo_texto_imagen_cta')) : the_row(); ?>
                            <?php if (have_rows('listado')) : ?>
                                <?php while (have_rows('listado')) : the_row(); ?>
                                <?php 
                                    $tituloListado = get_sub_field('titulo');
                                    $texto = get_sub_field('descripcion');
                                ?>
                                    <div class="d-flex align-items-baseline gap-2">
                                        <h4 class="mb-0 tertiary-text"><?php echo esc_html($tituloListado); ?></h4>
                                        <div><?php echo $texto; ?></div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <?php
                    if (is_array($grupoTextoImagen) && isset($grupoTextoImagen['cta'])) :
                        $cta = $grupoTextoImagen['cta'];
                        if (is_array($cta) && isset($cta['url'], $cta['title'])) :
                            $url = $cta['url'];
                            $texto = $cta['title'];
                ?>
                    <a href="<?php echo esc_url($url); ?>" class="btn custom-btn mt-3"><?php echo esc_html($texto); ?></a>
                <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="col-md-5 m-negative-lg-120">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded" />
            </div>
        </div>
    </div>
</section>