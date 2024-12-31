<?php 
    $grupoTextoImagenListado = get_field('grupo_texto_imagen');
    $subtitulo = $grupoTextoImagenListado['subtitulo'] ?? '';
    $titulo = $grupoTextoImagenListado['titulo'] ?? '';
    $imagenListado = $grupoTextoImagenListado['imagen'] ?? '';
?>

<section class="pt-72 pb-114 py-60 px-18">
    <div class="container">
        <div class="text-center mb-5">
            <p class="text-center text-uppercase custom-span primary-text"><?php echo esc_html($subtitulo); ?></p>
            <h2 class="mb-4 text-center"><?php echo esc_html($titulo); ?></h2>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo esc_url($imagenListado['url']); ?>" alt="<?php echo esc_attr($imagenListado['alt']); ?>" class="img-fluid rounded">
            </div>
            
            <div class="col-md-6 mt-3 mt-md-0">
                <ul class="list-unstyled">
                
                    <li class="row row-gap-4 mb-3">
                        <?php 
                        $total_items = 0;

                        while (have_rows('grupo_texto_imagen')) : the_row();
                            if (have_rows('listadoul')) {
                                while (have_rows('listadoul')) : the_row();
                                    $total_items++;
                                endwhile;
                            }
                        endwhile;

                        rewind_posts();

                        $current_index = 0;

                        while (have_rows('grupo_texto_imagen')) : the_row();
                            if (have_rows('listadoul')) :
                                while (have_rows('listadoul')) : the_row();
                                    $current_index++;
                                    $imagen = get_sub_field('imagen');
                                    $descripcion = get_sub_field('descripcion');

                                    $is_last = ($current_index == $total_items && $total_items % 2 != 0);
                                    $column_class = $is_last ? 'col-md-12' : 'col-md-6';
                                    ?>
                                    <div class="<?php echo esc_attr($column_class); ?>">
                                        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" />
                                        <p class="mb-0"><?php echo esc_html($descripcion); ?></p>
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                        endwhile;
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>