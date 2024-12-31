<?php 
    $grupoListado = get_field('grupo_listado');
    $titulo = $grupoListado['titulo'];
?>

<section class="bg-menu pt-72 pb-144 py-60 px-18">
    <div class="container text-center">
        <?php if( $titulo ): ?>
            <p class="mb-4 fw-bold">
                <?php echo esc_html($titulo); ?>
            </p>
        <?php endif; ?>

        <div class="row text-start row-gap-3">
            <?php foreach ($grupoListado['listado'] as $item): ?>
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start gap-2 mb-2">
                            <img src="<?php echo esc_url($item['imagen']['url']); ?>" alt="<?php echo esc_attr($item['imagen']['alt']); ?>" /><?php echo esc_html($item['titulo']); ?>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>