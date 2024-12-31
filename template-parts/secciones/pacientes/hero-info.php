<?php 
    $grupoHeroInfo = get_field('grupo_hero_informacion');
    $fondo = $grupoHeroInfo['fondo'];
    $subtitulo = $grupoHeroInfo['subtitulo'];
    $titulo = $grupoHeroInfo['titulo'];
    $descripcion = $grupoHeroInfo['descripcion'];
?>

<section class="pt-72 pb-48 py-60 px-18 text-md-center text-white bg-hunter-green" style="background-image: url('<?php echo esc_url($fondo['url']); ?>');">
    <div class="container">
        <?php if( $subtitulo ): ?>
            <p class="custom-font-size custom-span"><?php echo esc_html($subtitulo); ?></p>
        <?php endif; ?>
        <?php if( $titulo ): ?>
            <h2 class="mt-3"><?php echo esc_html($titulo); ?></h2>
        <?php endif; ?>
        <?php if( $descripcion ): ?>
            <p class="mt-3"><?php echo wp_kses_post($descripcion); ?></p>
        <?php endif; ?>
    </div>
</section>