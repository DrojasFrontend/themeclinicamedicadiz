<?php 
    $grupoTabs = get_field('grupo_tabs');

if ($grupoTabs) : 
    $repetidorTabs = $grupoTabs['repetidor_tabs'];
    ?>
    <section class="bg-menu pt-42 pb-68 pb-0">
        <div class="container">
            <div class="tabs-section">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php 
                    $tabIndex = 0;
                    foreach ($repetidorTabs as $tab) : 
                        $tabID = sanitize_title($tab['titulo']);
                        ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php echo $tabIndex === 0 ? 'active' : ''; ?>" 
                                    id="<?php echo $tabID; ?>-tab" 
                                    data-bs-toggle="tab" 
                                    data-bs-target="#<?php echo $tabID; ?>" 
                                    type="button" 
                                    role="tab" 
                                    aria-controls="<?php echo $tabID; ?>" 
                                    aria-selected="<?php echo $tabIndex === 0 ? 'true' : 'false'; ?>">
                                <?php echo esc_html($tab['titulo']); ?>
                            </button>
                        </li>
                        <?php 
                        $tabIndex++;
                    endforeach; 
                    ?>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <?php 
                    $contentIndex = 0;
                    foreach ($repetidorTabs as $tab) : 
                        $tabID = sanitize_title($tab['titulo']);
                        $tabItems = $tab['items'];
                        $globalCounter = 1;
                        ?>
                        <div class="tab-pane fade <?php echo $contentIndex === 0 ? 'show active' : ''; ?>" 
                            id="<?php echo $tabID; ?>" 
                            role="tabpanel" 
                            aria-labelledby="<?php echo $tabID; ?>-tab">
                            <div class="row">
                                <?php 
                                $rows = array_chunk($tabItems, 2);

                                foreach ($rows as $row) : ?>
                                    <div class="row mb-3">
                                        <?php foreach ($row as $item) : ?>
                                            <div class="col-md-6">
                                                <ul>
                                                    <li>
                                                        <h4 class="primary-text"><?php echo $globalCounter; ?></h4>
                                                        <?php echo esc_html($item['texto']); ?>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php $globalCounter++; ?>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php 
                        $contentIndex++;
                    endforeach; 
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>