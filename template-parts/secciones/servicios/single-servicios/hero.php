<?php 
    $grupoHero = get_field('grupo_hero');
    $imagen = $grupoHero['imagen'] ?? '';
?>

<section class="bg-hero">
    <div class="container py-5 text-white">
        <div class="row mb-5 ">
            <div class="col">
                <nav class="text-white custom-font" aria-label="breadcrumb">
                    <ol class="breadcrumb text-white mb-2">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item text-white"><a class="text-white" href="/servicios">Servicios</a></li>
                        <li class="breadcrumb-item text-white fw-bold active" aria-current="page"><?php the_title();?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h1 class="my-4"><?php the_title();?></h1>
                <p class="mb-4"><?php the_content(); ?></p>
                <?php
                    if (is_array($grupoHero) && isset($grupoHero['cta'])) :
                        $cta = $grupoHero['cta'];
                        if (is_array($cta) && isset($cta['url'], $cta['title'])) :
                            $url = $cta['url'];
                            $texto = $cta['title'];
                ?>
                    <a href="<?php echo esc_url($url); ?>" class="btn custom-btn-hero mt-3"><?php echo esc_html($texto); ?></a>
                <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="col-md-6">
                <?php if ($imagen) : ?>
                    <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>