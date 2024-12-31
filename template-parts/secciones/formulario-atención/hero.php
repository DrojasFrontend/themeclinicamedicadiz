<?php 
    $grupoHero = get_field('grupo_hero');
    $titulo = $grupoHero['titulo'] ?? '';
    $descripcion = $grupoHero['descripcion'] ?? '';
?>

<section class="pt-84 pb-90 py-60 px-20 bg-alice-blue">
    <div class="container">
        <h1><?php echo esc_html($titulo); ?></h1>
        <p class="mt-3"><?php echo esc_html($descripcion); ?></p>
    </div>
</section>