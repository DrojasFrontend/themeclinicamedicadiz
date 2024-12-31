<?php 
    $grupoHero = get_field('grupo_hero');
    $titulo = $grupoHero['titulo'] ?? '';
?>

<section class="bg-nosotros">
    <div class="container py-5">
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
        <div class="row">
            <div class="col">
                <h1 class="my-4 text-center"><?php echo esc_html($titulo); ?></h1>
            </div>
        </div>
    </div>
</section>