<?php 
    $grupoListado = get_field('grupo_texto_listado_blue');
    $subtitulo = $grupoListado['subtitulo'] ?? '';
    $titulo = $grupoListado['titulo'] ?? '';
    $descripcion = $grupoListado['descripcion'] ?? '';
    $cta = $grupoListado['cta'] ?? '';

    $hayContenido = $subtitulo || $titulo;
?>

<?php if ($hayContenido): ?>
<section class="py-5">
    <div class="container text-center">
        <?php if( $subtitulo ): ?>
            <span class="text-uppercase custom-span secondary-text"><?php echo esc_html($subtitulo); ?></span>
        <?php endif; ?>
        <?php if( $titulo ): ?>
            <h2 class="mb-4">
                <?php echo esc_html($titulo); ?>
            </h2>
        <?php endif; ?>
        <?php if( $descripcion ): ?>
            <p class="mb-4">
                <?php echo esc_html($descripcion); ?>
            </p>
        <?php endif; ?>

        <?php if (!empty($grupoListado['listado'])): ?>
            <div class="row text-start">
                <?php foreach ($grupoListado['listado'] as $item): ?>
                    <div class="col-md-3">
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-start gap-2 mb-2">
                                <img src="<?php echo esc_url($item['imagen']['url']); ?>" alt="<?php echo esc_attr($item['imagen']['alt']); ?>" /><?php echo esc_html($item['texto']); ?>
                            </li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php
            if (is_array($cta) && isset($cta['url'], $cta['title'], $cta['target'])) :
                $url = $cta['url'];
                $texto = $cta['title'];
                $target = $cta['target'] ? $cta['target'] : '_self';
        ?>
            <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="btn custom-btn"><?php echo esc_html($texto); ?></a>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>