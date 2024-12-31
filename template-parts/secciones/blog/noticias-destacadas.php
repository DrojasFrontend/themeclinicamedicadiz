<?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'category_name' => 'destacadas'
    );
    $destacados = new WP_Query($args);

    $page_for_posts_id = get_option('page_for_posts');
    $grupoNoticiasDestacadas = get_field('grupo_noticias_destacadas', $page_for_posts_id);
    $titulo = $grupoNoticiasDestacadas['titulo'] ?? '';
?>

<section class="bg-post">
    <div class="container py-5">
        <div class="row">
            <?php if ($destacados->have_posts()): ?>
                <?php $first_post = true; ?>
                <?php while ($destacados->have_posts()): $destacados->the_post(); ?>
                    <?php if ($first_post): ?>
                        <div class="col-lg-7 mb-4">
                            <div class="card bg-transparent h-100 border-0">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?php the_title(); ?></h4>
                                    <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn-transparent ps-0 fw-semibold nav-underline">Seguir leyendo<span class="ms-2"></a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                        <path d="M15.3998 10.3835L10.8098 5.79348C10.6225 5.60723 10.369 5.50269 10.1048 5.50269C9.84065 5.50269 9.5872 5.60723 9.39983 5.79348C9.3061 5.88644 9.23171 5.99704 9.18094 6.1189C9.13017 6.24076 9.10403 6.37147 9.10403 6.50348C9.10403 6.63549 9.13017 6.7662 9.18094 6.88805C9.23171 7.00991 9.3061 7.12052 9.39983 7.21348L13.9998 11.7935C14.0936 11.8864 14.168 11.997 14.2187 12.1189C14.2695 12.2408 14.2956 12.3715 14.2956 12.5035C14.2956 12.6355 14.2695 12.7662 14.2187 12.8881C14.168 13.0099 14.0936 13.1205 13.9998 13.2135L9.39983 17.7935C9.21153 17.9805 9.10521 18.2346 9.10428 18.4999C9.10334 18.7653 9.20786 19.0202 9.39483 19.2085C9.58181 19.3968 9.83593 19.5031 10.1013 19.504C10.3667 19.505 10.6215 19.4005 10.8098 19.2135L15.3998 14.6235C15.9616 14.061 16.2772 13.2985 16.2772 12.5035C16.2772 11.7085 15.9616 10.946 15.3998 10.3835Z" fill="#1A5091"/>
                                    </svg></span>
                                </div>
                            </div>
                        </div>
                        <?php $first_post = false; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p>No se encontraron publicaciones destacadas.</p>
            <?php endif; ?>

            <div class="col-lg-5">
                <h3 class="mb-3"><?php echo esc_html($titulo); ?></h3>
                <div class="row g-3">
                    <?php
                    $args_secundarios = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'category_name' => 'destacadas',
                        'offset' => 1
                    );
                    $secundarios = new WP_Query($args_secundarios);

                    if ($secundarios->have_posts()): 
                        while ($secundarios->have_posts()): $secundarios->the_post(); ?>
                            <div class="col-12">
                                <div class="card bg-transparent border-0 d-flex flex-row-reverse">
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" class="img-fluid rounded" alt="<?php the_title(); ?>">
                                    <div class="me-1">
                                        <h6 class="card-title mb-1"><?php the_title(); ?></h6>
                                        <small class="custom-font"><?php echo get_the_date(); ?></small>
                                        <a href="<?php the_permalink(); ?>" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else: ?>
                        <p>No hay más noticias destacadas.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>