<?php 
    $grupoHero = get_field('grupo_hero');
    $titulo = $grupoHero['titulo'] ?? '';
    $descripcion = $grupoHero['descripcion'] ?? '';
    $imagen = $grupoHero['imagen'] ?? '';
?>

<section class="bg-hero">
    <div class="container py-5 text-white">
        <div class="row mb-5 ">
            <div class="col">
                <nav class="text-white custom-font" aria-label="breadcrumb">
                    <ol class="breadcrumb text-white mb-2">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item text-white fw-bold active" aria-current="page">Servicios</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="my-4"><?php echo esc_html($titulo); ?></h1>
                <p class="mb-4"><?php echo esc_html($descripcion); ?></p>
            </div>

            <div class="col-md-6">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded" />
            </div>
        </div>
    </div>
</section>