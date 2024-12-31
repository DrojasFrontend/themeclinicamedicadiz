<section class="pt-72 pb-160 py-60 px-18">
    <div class="container">
        <?php if (have_rows('grupo_texto_icono')) : ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <?php while (have_rows('grupo_texto_icono')) : the_row(); ?>
                    <?php if (have_rows('listado')) : ?>
                        <?php while (have_rows('listado')) : the_row(); ?>
                            <div class="col">
                                <div class="hospital-card">
                                    <h5 class="paynegrey"><?php the_sub_field('titulo'); ?></h5>
                                    <?php if (have_rows('listado_icono')) : ?>
                                        <?php while (have_rows('listado_icono')) : the_row(); ?>
                                            <div class="d-flex gap-2 mt-3">
                                                <?php 
                                                    $icono = get_sub_field('icono'); 
                                                if ($icono) : ?>
                                                    <img src="<?php echo esc_url($icono['url']); ?>" alt="<?php echo esc_attr($icono['alt']); ?>" class="h-100" />
                                                <?php endif; ?>
                                                <p class="mb-0"><?php the_sub_field('texto'); ?></p>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>