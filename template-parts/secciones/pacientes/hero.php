<?php 
    $grupoHero = get_field('grupo_hero');
    $titulo = $grupoHero['titulo'];
?>

<section class="pt-24 pb-85 pb-114 px-18 bg-bluePatient">
    <div class="container">
        <div class="row mb-5 ">
            <div class="col">
                <nav class="text-white custom-font" aria-label="breadcrumb">
                    <ol class="breadcrumb text-white mb-2">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active fw-bolder" aria-current="page">Pacientes y familia</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row text-white">
            <div class="col text-md-center">
                <?php if( $titulo ): ?>
                    <h1 class="mb-0"><?php echo esc_html($titulo); ?></h1>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>