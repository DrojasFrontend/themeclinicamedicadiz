<?php
    $grupoContenido = get_field('grupo_contenido_imagen');
    $contenido = $grupoContenido['contenido'] ?? '';
    $imagen = $grupoContenido['imagen'] ?? '';
    $span = $grupoContenido['span'] ?? '';
    $segundoContenido = $grupoContenido['segundo_contenido'] ?? '';
?>

<section class="pt-5 bg-menu">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="mb-4">
                            <h4><?php the_title(); ?></h4>
                            <p class="custom-font-size custom-breadcrumb mt-2"><?php echo get_the_date('l, j \d\e F \d\e Y'); ?></p>
                        </header>

                        <div class="content">
                            <div class="mb-5">
                                <?php echo $contenido; ?>
                            </div>
                            <?php if (!empty($imagen)): ?>
                                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="mw-100">
                            <?php endif; ?>
                            <p class="custom-font-size c-span-blog"><?php echo $span; ?></p>
                            <div class="mt-5">
                                <?php echo $segundoContenido; ?>
                            </div>
                        </div>

                    </article>
                <?php endwhile; else : ?>
                    <p>No se encontraron publicaciones.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>