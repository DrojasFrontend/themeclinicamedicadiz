<?php
    $grupoTarjetaIcono = get_field('grupo_tarjeta_fondo');
    $fondo = $grupoTarjetaIcono['fondo'] ?? '';
?>

<section class="py-5 bg-cta-fondo px-18" style="background-image: url('<?php echo esc_url($fondo['url']); ?>');">
    <div class="container mn-130">
        <?php if (have_rows('grupo_tarjeta_fondo')) : ?>
            <div class="row justify-content-center pt-4 g-4">
            <?php while (have_rows('grupo_tarjeta_fondo')) : the_row(); ?>
                <?php if (have_rows('tarjeta')) : ?>
                    <?php while (have_rows('tarjeta')) : the_row(); ?>
                        <div class="col-12 col-md-5 col-lg-4">
                        <?php 
                            $imagen = get_sub_field('imagen');
                            $titulo = get_sub_field('titulo');
                            $icono = get_sub_field('icono');
                            $texto = get_sub_field('texto');
                            $cta = get_sub_field('cta');
                        ?>
                            <div class="card event-card h-100">
                                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>">
                                <div class="card-body d-flex flex-column flex-fill">
                                    <h4 class="card-title"><?php echo esc_html($titulo); ?></h4>
                                    <div class="d-flex gap-2 flex-fill">
                                        <img src="<?php echo esc_url($icono['url']); ?>" alt="<?php echo esc_attr($icono['alt']); ?>" class="max-content" />
                                        <p class="fw-bold custom-font-size"><?php echo esc_html($texto); ?></p>
                                    </div>
                                    <div class="d-flex align-items-center mt-4">
                                    <?php
                                        if (is_array($cta) && isset($cta['url'], $cta['title'])) :
                                            $url = $cta['url'];
                                            $texto = $cta['title'];
                                            $target = $cta['target'] ? $cta['target'] : '_self';
                                    ?>
                                        <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="btn-transparent fw-bold p-0 nav-underline"><?php echo esc_html($texto); ?></a>
                                        <span class="ms-2"><img src="/wp-content/uploads/fi-rr-angle-small-right-5.png" class="align-middle" /></span>
                                    <?php endif; ?>
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