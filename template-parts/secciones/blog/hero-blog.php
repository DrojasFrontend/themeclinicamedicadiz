<?php
    $page_for_posts_id = get_option('page_for_posts');
    $grupoHero = get_field('grupo_hero', $page_for_posts_id);
    $subtitulo = $grupoHero['subtitulo'] ?? '';
    $titulo = $grupoHero['titulo'] ?? '';
?>

<section class="py-5 text-center text-white bg-hunter-green">
    <div class="container">
        <p class="custom-font-size custom-span"><?php echo esc_html($subtitulo); ?></p>
        <h1 class="mt-3"><?php echo esc_html($titulo); ?></h1>
    </div>
</section>