<section class="pt-144 pt-102 pb-72 px-18">
    <div class="container">
        <?php if (have_rows('grupo_tarjeta_icono')) : ?>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php while (have_rows('grupo_tarjeta_icono')) : the_row(); ?>
                    <?php if (have_rows('tarjeta')) : ?>
                        <?php while (have_rows('tarjeta')) : the_row(); ?>
                            <div class="col">
                                <?php 
                                    $icono = get_sub_field('icono');
                                    $texto = get_sub_field('texto');
                                ?>
                                <div class="card-clinica p-4 h-100">
                                    <div class="d-flex align-items-start">
                                        <div class="me-3">
                                            <img src="<?php echo esc_url($icono['url']); ?>" alt="<?php echo esc_attr($icono['alt']); ?>" />
                                        </div>
                                        <div>
                                            <p class="mb-0"><?php echo esc_html($texto); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>