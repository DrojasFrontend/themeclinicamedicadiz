<?php
    $biografia = get_field('biografia');
    $especialidades = get_field('especialistas_especialidades');
    $idiomas = get_the_terms(get_the_ID(), 'idiomas');
?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-5">
                <?php 
                if ($idiomas && !is_wp_error($idiomas)):
                    $idiomas_lista = array();

                    foreach ($idiomas as $idioma) {
                        $idiomas_lista[] = $idioma->name;
                    }

                    $idiomas_str = implode(', ', $idiomas_lista);
                    ?>

                    <p class="custom-font-size color-grey">Idiomas</p>
                    <p class="fw-bolder"><?php echo esc_html($idiomas_str); ?></p>
                <?php endif; ?>

                <?php 
                if (have_rows('redes')): ?>
                    <div class="mt-4">
                        <?php while (have_rows('redes')): the_row(); 
                            $imagen = get_sub_field('imagen');
                            $cta = get_sub_field('cta');
                            ?>
                            <a href="<?php echo esc_url($cta['url']); ?>" class="">
                                <div class="d-flex gap-2">
                                    <?php if ($imagen): ?>
                                        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="max-content">
                                    <?php endif; ?>
                                    <?php if ($cta): ?>
                                        <h5><?php echo esc_html($cta['title']); ?></h5>
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-9">
                <?php if ($biografia): ?>
                    <h4 class="my-4">Biografía</h4>
                    <p><?php echo esc_html($biografia); ?></p>
                <?php endif; ?>

                <?php if (have_rows('grupo_area_de_interes')): ?>
                    <?php while (have_rows('grupo_area_de_interes')): the_row(); ?>
                        <?php if (have_rows('areas_de_interes')): ?>
                            <h5 class="mt-4 mb-3">Áreas de interés</h5>
                            <div class="row">
                                <?php 
                                $counter = 0;
                                ?>
                                <?php while (have_rows('areas_de_interes')): the_row(); ?>
                                    <?php 
                                        $area = get_sub_field('area'); 
                                        $counter++;
                                    ?>

                                    <?php if ($counter % 4 == 1): ?>
                                        <div class="col-md-6">
                                            <ul>
                                    <?php endif; ?>

                                    <li><?php echo esc_html($area); ?></li>

                                    <?php
                                    if ($counter % 4 == 0): 
                                    ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>

                                <?php 
                                if ($counter % 4 != 0): 
                                ?>
                                    </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (have_rows('grupo_reconocimientos')): ?>
                    <?php while (have_rows('grupo_reconocimientos')): the_row(); ?>
                        <?php if (have_rows('reconocimientos')): ?>
                            <h5 class="mt-4 mb-3">Reconocimientos</h5>
                            <div class="row">
                                <?php 
                                $counter = 0;
                                ?>
                                <?php while (have_rows('reconocimientos')): the_row(); ?>
                                    <?php 
                                        $area = get_sub_field('items'); 
                                        $counter++;
                                    ?>

                                    <?php if ($counter % 4 == 1): ?>
                                        <div class="col-md-6">
                                            <ul>
                                    <?php endif; ?>

                                    <li><?php echo esc_html($area); ?></li>

                                    <?php
                                    if ($counter % 4 == 0): 
                                    ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>

                                <?php 
                                if ($counter % 4 != 0): 
                                ?>
                                    </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if ($especialidades): ?>
                    <h5 class="my-4">Especialidad</h5>
                    <?php foreach ($especialidades as $especialidad): ?>
                            <p class="fw-bolder">
                                <?php echo get_the_title($especialidad->ID); ?>
                            </p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay especialidades asignadas.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>