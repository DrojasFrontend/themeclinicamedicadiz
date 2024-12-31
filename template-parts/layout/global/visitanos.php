<?php
    $global_content = get_page_by_path('contenido-global')->ID;
    $group_visit = ($global_content) ? get_field('grupo_visitanos', $global_content) : null;

    $fondo = $group_visit['fondo'];
?>

<section class="py-5 bg-cta-fondo" style="background-image: url('<?php echo esc_url($fondo['url']); ?>');">
    <div class="container">
        <div class="row text-lg-start">
        <?php
            if ($group_visit && isset($group_visit['items'])):
            foreach ($group_visit['items'] as $item):
                $imagen = $item['imagen'];
                $titulo = $item['titulo'];
                $descripcion = $item['descripcion'];
                ?>
                <div class="col-lg-4 mb-4">
                    <h4>
                        <?php if ($imagen): ?>
                            <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="me-2">
                        <?php endif; ?>
                        <?php echo esc_html($titulo); ?>
                    </h4>
                    <?php if ($descripcion): ?>
                        <div>
                            <?php echo wp_kses_post($descripcion); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
            endforeach;
        endif;
        ?>
        </div>
    </div>
</section>