<?php 
    $global_content = get_page_by_path('contenido-header-footer')->ID;
    $group_footer = ($global_content) ? get_field('grupo_footer', $global_content) : null;

    $imagenGlobalFooter = $group_footer['imagen_global_footer'];
    $lista = $group_footer['lista'];
    $segundo_listado = $group_footer['segundo_listado'];
    $redes = $group_footer['redes'];
    $copyright = $group_footer['copyright'];
    $imagenGlobal = $group_footer['imagen_global'];
    $whatsapp_url = $group_footer['enlace'];
    $tooltip_text = $group_footer['tooltip'];
    $whatsapp_icon = $group_footer['imagen'];
?>

<footer class="bg-footer text-white pt-5 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-3">
                <a href="<?php echo esc_url( home_url('/') ); ?>">
                    <img src="<?php echo esc_url($imagenGlobalFooter['url']); ?>" alt="<?php echo esc_attr($imagenGlobalFooter['alt']); ?>">
                </a>
            </div>

            <?php if (!empty($lista) && is_array($lista)) : ?>
                <div class="col-lg-3 mb-3">
                    <ul class="list-unstyled d-flex flex-column gap-2">
                        <?php foreach ($lista as $item) :
                            $enlace = $item['item'];
                            if ($enlace) :
                                $url = esc_url($enlace['url']);
                                $titulo = esc_html($enlace['title']);
                        ?>
                            <li>
                                <a href="<?php echo $url; ?>" class="text-white text-white-custom"><?php echo $titulo; ?></a>
                            </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (!empty($segundo_listado) && is_array($segundo_listado)) : ?>
                <div class="col-lg-3 mb-3">
                    <ul class="list-unstyled d-flex flex-column gap-2">
                        <?php foreach ($segundo_listado as $item) :
                            $enlace = $item['item'];
                            if ($enlace) :
                                $url = esc_url($enlace['url']);
                                $titulo = esc_html($enlace['title']);
                        ?>
                            <li>
                                <a href="<?php echo $url; ?>" class="text-white text-white-custom"><?php echo $titulo; ?></a>
                            </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="col-lg-3 mb-3">
                <span class="custom-font-size">Síguenos:</span>
                <div class="mt-1">
                    <?php
                    if (!empty($group_footer['redes']) && is_array($group_footer['redes'])) : 
                        foreach ($group_footer['redes'] as $red) : 
                            $imagenIcono = $red['imagen'];
                            $iconoUrl = $red['url'];
                            
                            if (!empty($imagenIcono) && !empty($iconoUrl)) :
                    ?>
                            <a href="<?php echo esc_url($iconoUrl); ?>" target="_blank" class="text-decoration-none">
                                <img src="<?php echo esc_url($imagenIcono['url']); ?>" alt="<?php echo esc_attr($imagenIcono['alt']); ?>" />
                            </a>
                    <?php 
                            endif; 
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>

        </div>

        <div class="row mt-4 align-items-center">
            <div class="col-md-5">
                <?php if( $copyright ): ?>
                    <p class="custom-font-size">
                        <?php echo $copyright; ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="col-md-5 text-md-end">
                <?php if( !empty( $imagenGlobal ) ): ?>
                    <img src="<?php echo esc_url($imagenGlobal['url']); ?>" alt="<?php echo esc_attr($imagenGlobal['alt']); ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

<div class="floating-whatsapp">
    <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank">
        <div class="tooltip"><p><?php echo esc_html($tooltip_text); ?></p></div>
        <div>
            <img src="<?php echo esc_url($whatsapp_icon['url']); ?>" alt="WhatsApp">
        </div>
    </a>
</div>