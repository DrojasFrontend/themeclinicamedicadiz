<?php 
    $grupoTarjetaListado = get_field('grupo_tarjeta_listado');
    $titulo = $grupoTarjetaListado['titulo'] ?? '';
?>

<section class="pt-114 pb-72 py-60 px-18">
    <div class="container">
        <h2 class="mb-4"><?php echo esc_html($titulo); ?></h2>
        <?php if (have_rows('grupo_tarjeta_listado')) : ?>
            <div class="row g-4">
                <?php while (have_rows('grupo_tarjeta_listado')) : the_row(); ?>
                    <?php if (have_rows('tarjeta')) : ?>
                        <?php while (have_rows('tarjeta')) : the_row(); ?>
                            <div class="col-md-6 col-lg-6">
                                <div class="card-historia-clinica p-4 h-100">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Si es el paciente, usted debe presentar</h5>
                                        <?php if (have_rows('listado')) : ?>
                                            <?php while (have_rows('listado')) : the_row(); ?>
                                                <div>
                                                    <div class="d-flex align-items-start gap-2 mb-2">
                                                        <?php 
                                                        $icono = get_sub_field('icono'); 
                                                        if ($icono) : ?>
                                                            <div><img src="<?php echo esc_url($icono['url']); ?>" alt="<?php echo esc_attr($icono['alt']); ?>" /></div>
                                                        <?php endif; ?>
                                                        
                                                        <div><?php the_sub_field('texto'); ?></div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
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