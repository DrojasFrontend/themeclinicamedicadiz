<?php 
    $grupoHero = get_field('grupo_hero');
    $subtitulo = $grupoHero['subtitulo'] ?? '';
    $titulo = $grupoHero['titulo'] ?? '';
    $descripcion = $grupoHero['descripcion'] ?? '';
    $imagen = $grupoHero['imagen'] ?? '';
?>

<section class="bg-nosotros py-5 px-18">
    <div class="container">
        <div class="row custom-breadcrumb mb-5 ">
            <div class="col">
                <nav class="custom-font custom-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a class="custom-breadcrumb" href="/">Home</a></li>
                        <li class="breadcrumb-item custom-breadcrumb fw-bold" aria-current="page">Conócenos</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 mt-4 mt-md-0">
                <span class="text-uppercase custom-span"><?php echo esc_html($subtitulo); ?></span>
                <h1 class="my-4"><?php echo esc_html($titulo); ?></h1>
                <hr class="color-hr">
                <p><?php echo esc_html($descripcion); ?></p>
            </div>

            <div class="col-md-6">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid rounded" />
            </div>
        </div>
    </div>
</section>