<?php 
    $grupoListado = get_field('grupo_tarjeta_listado');
    $subtitulo = $grupoListado['subtitulo'] ?? '';
    $titulo = $grupoListado['titulo'] ?? '';

    $hayContenido = $subtitulo || $titulo;
?>

<?php if ($hayContenido): ?>
<section class="bg-menu py-5">
    <div class="container text-center">
        <?php if( $subtitulo ): ?>
            <span class="text-uppercase custom-span primary-text"><?php echo esc_html($subtitulo); ?></span>
        <?php endif; ?>
        <?php if( $titulo ): ?>
            <h2 class="mb-4">
                <?php echo esc_html($titulo); ?>
            </h2>
        <?php endif; ?>

        <div class="row text-start">
            <?php foreach ($grupoListado['listado'] as $item): ?>
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start gap-2 mb-2">
                            <img src="<?php echo esc_url($item['imagen']['url']); ?>" alt="<?php echo esc_attr($item['imagen']['alt']); ?>" /><?php echo esc_html($item['texto']); ?>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>