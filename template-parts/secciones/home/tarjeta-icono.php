<?php 
    $grupoIconos = get_field('grupo_tarjetas_iconos');
    $titulo = $grupoIconos['titulo'];
?>

<section class="pt-72 pb-90 py-60 px-30">
    <div class="container p-0">
        <?php if( $titulo ): ?>
            <h2 class="text-center mb-4"><?php echo esc_html($titulo); ?></h2>
        <?php endif; ?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mt-4">
            <?php if (have_rows('grupo_tarjetas_iconos')) : ?>
                <?php while (have_rows('grupo_tarjetas_iconos')) : the_row(); ?>
                <?php if (have_rows('tarjetas')) : ?>
                    <?php while (have_rows('tarjetas')) : the_row(); ?>
                    <?php 
                        $icono = get_sub_field('icono');
                        $titulo = get_sub_field('titulo');
                        $cta = get_sub_field('cta');
                    ?>
                    <div class="col">
                        <div class="card-home d-flex flex-row flex-md-column gap-4 gap-md-0 custom-card h-100 p-3">

                            <?php if ($icono) : ?>
                                <div>
                                    <img 
                                        src="<?php echo esc_url($icono['url']); ?>" 
                                        alt="<?php echo esc_attr($icono['alt']); ?>" 
                                        class="mb-3" 
                                        width="40"
                                    >
                                </div>
                            <?php endif; ?>

                            <div>
                                <?php if ($titulo) : ?>
                                    <h4 class="card-title"><?php echo esc_html($titulo); ?></h4>
                                <?php endif; ?>

                                
                                <?php if ($cta && isset($cta['title'])) : ?>
                                    <p class="card-text mt-2">
                                        <?php echo esc_html($cta['title']); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>