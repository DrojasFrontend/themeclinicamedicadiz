<?php 
    $grupoImagenes = get_field('grupo_imagenes');
    $titulo = $grupoImagenes['titulo'] ?? '';
?>

<section class="bg-menu py-5 px-18">
    <div class="container">
        <h2 class="mb-4"><?php echo esc_html($titulo); ?></h2>

        <?php if (have_rows('grupo_imagenes')) : ?>
            <div class="row mt-3 row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <?php while (have_rows('grupo_imagenes')) : the_row(); ?>
                    <?php if (have_rows('items')) : ?>
                        <?php while (have_rows('items')) : the_row(); ?>
                            <div class="col">
                                <?php 
                                    $imagen = get_sub_field('imagen');
                                ?>
                                <div class="shadow-convenios">
                                    <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="w-100" />
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>