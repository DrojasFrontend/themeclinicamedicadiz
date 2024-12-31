<?php 
    $grupoTarjetaListado = get_field('grupo_listado');
    $subtitulo = $grupoTarjetaListado['subtitulo'] ?? '';
    $titulo = $grupoTarjetaListado['titulo'] ?? '';

    $hayContenido = $subtitulo || $titulo;
?>

<?php if ($hayContenido): ?>
<section class="py-5 px-18">
    <div class="container overflow-hidden">
        <p class="text-uppercase custom-span tertiary-text text-center"><?php echo esc_html($subtitulo); ?></p>
        <h2 class="mb-4 text-center"><?php echo esc_html($titulo); ?></h2>

        <?php if (have_rows('grupo_listado')) : ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php while (have_rows('grupo_listado')) : the_row(); ?>
                    <?php if (have_rows('listado')) : ?>
                        <?php while (have_rows('listado')) : the_row(); ?>
                            <div class="col">
                                <?php 
                                    $titulo = get_sub_field('titulo');
                                    $descripcion = get_sub_field('descripcion');
                                ?>
                                <div class="">
                                    <div class="item-icon mb-3">
                                        <h3 class="tertiary-text"><?php echo esc_html($titulo); ?></h3>
                                    </div>
                                    <p class="item-description"><?php echo esc_html($descripcion); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>