<?php 
    $grupoTabs = get_field('nuestras_sedes');
    $subtitulo = $grupoTabs['subtitulo'] ?? '';
    $titulo = $grupoTabs['titulo'] ?? '';

    if ($grupoTabs) : 
        $repetidorTabs = $grupoTabs['sedes'];
?>
<section class="bg-menu py-5 px-18">
    <div class="container">
        <div class="text-center mb-4">
            <span class="text-uppercase custom-span tertiary-text"><?php echo esc_html($subtitulo); ?></span>
            <h2 class=""><?php echo esc_html($titulo); ?></h2>
        </div>

        <ul class="nav nav-tabs mb-4 justify-content-center" id="sedesTab" role="tablist">
            <?php 
            $tabIndex = 0;
            foreach ($repetidorTabs as $tab) : 
                $tabID = sanitize_title($tab['titulo']);
            ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php echo $tabIndex === 0 ? 'active' : ''; ?> fw-semibold" 
                        id="sede-<?php echo $tabID; ?>-tab" 
                        data-bs-toggle="tab" 
                        data-bs-target="#sede-<?php echo $tabID; ?>" 
                        type="button" 
                        role="tab" 
                        aria-controls="sede-<?php echo $tabID; ?>" 
                        aria-selected="<?php echo $tabIndex === 0 ? 'true' : 'false'; ?>">
                    <?php echo esc_html($tab['titulo']); ?>
                </button>
            </li>
            <?php 
            $tabIndex++;
            endforeach; 
            ?>
        </ul>

        <div class="tab-content" id="sedesTabContent">
            <?php 
            $contentIndex = 0;
            foreach ($repetidorTabs as $tab) : 
                $tabID = sanitize_title($tab['titulo']);
                $tabItems = $tab['items'];
            ?>
            <div class="tab-pane <?php echo $contentIndex === 0 ? 'active show' : 'fade'; ?>" 
                id="sede-<?php echo $tabID; ?>" 
                role="tabpanel" 
                aria-labelledby="sede-<?php echo $tabID; ?>-tab">
                <div class="row align-items-center">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <h2 class="mb-3"><?php echo esc_html($tab['titulo']); ?></h2>
                        <?php if ($tabItems): ?>
                            <?php foreach ($tabItems as $item): 
                                $icono = $item['imagen'];
                                $texto = $item['texto'];
                            ?>
                            <div class="d-flex align-items-center gap-2 mt-2">
                                <?php if ($icono): ?>
                                    <img src="<?php echo esc_url($icono['url']); ?>" alt="<?php echo esc_attr($icono['alt']); ?>" />
                                <?php endif; ?>
                                <div class="mb-0"><?php echo $texto; ?></div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <?php if (!empty($tab['imagen'])): ?>
                            <img src="<?php echo esc_url($tab['imagen']['url']); ?>" alt="<?php echo esc_attr($tab['imagen']['alt']); ?>" class="img-fluid rounded-3 shadow-sm">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php 
            $contentIndex++;
            endforeach; 
            ?>
        </div>
    </div>
</section>
<?php endif; ?>