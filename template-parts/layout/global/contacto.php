<?php
    $global_content = get_page_by_path('contenido-global')->ID;
    $group_contact = ($global_content) ? get_field('grupo_contacto', $global_content) : null;

    $subtitulo = $group_contact['subtitulo'];
    $titulo = $group_contact['titulo'];
?>

<section class="bg-menu py-custom <?php echo is_front_page() ? 'pt-130' : ''; ?>">
    <div class="container">
        <div class="text-center mb-4">
            <?php if( $subtitulo ): ?>
                <span class="text-uppercase custom-span primary-text"><?php echo esc_html($subtitulo); ?></span>
            <?php endif; ?>
            <?php if( $titulo ): ?>
                <h2 class="my-4"><?php echo esc_html($titulo); ?></h2>
            <?php endif; ?>
        </div>
        <div class="row g-4">
        
        <?php
        if ($group_contact && isset($group_contact['tarjetas'])):
                foreach ($group_contact['tarjetas'] as $tarjeta):
                    $imagen = $tarjeta['imagen'];
                    $titulo_tarjeta = $tarjeta['titulo'];
                    $descripcion = $tarjeta['descripcion'];
                    $cta = $tarjeta['cta'];
                    ?>
                    <div class="col-lg-6">
                        <div class="card border-0 bg-transparent h-100">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <?php if ($imagen): ?>
                                        <img src="<?php echo esc_url($imagen['url']); ?>" class="img-fluid rounded w-100" alt="<?php echo esc_attr($imagen['alt']); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-8 d-flex">
                                    <div class="card-body p-0 ps-md-4 d-flex flex-column flex-fill">
                                        <?php if ($titulo_tarjeta): ?>
                                            <h5 class="card-title"><?php echo esc_html($titulo_tarjeta); ?></h5>
                                        <?php endif; ?>
                                        <?php if ($descripcion): ?>
                                            <p class="card-text paragraph-small flex-fill"><?php echo esc_html($descripcion); ?></p>
                                        <?php endif; ?>
                                        <?php if ($cta): ?>
                                            <div class="d-flex align-items-center">
                                                <a href="<?php echo esc_url($cta['url']); ?>" class="btn-transparent fw-bold nav-underline d-flex align-items-center">
                                                    <?php echo esc_html($cta['title']); ?>
                                                </a>
                                                <span class="ms-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                                        <path d="M15.3998 10.3835L10.8098 5.79348C10.6225 5.60723 10.369 5.50269 10.1048 5.50269C9.84065 5.50269 9.5872 5.60723 9.39983 5.79348C9.3061 5.88644 9.23171 5.99704 9.18094 6.1189C9.13017 6.24076 9.10403 6.37147 9.10403 6.50348C9.10403 6.63549 9.13017 6.7662 9.18094 6.88805C9.23171 7.00991 9.3061 7.12052 9.39983 7.21348L13.9998 11.7935C14.0936 11.8864 14.168 11.997 14.2187 12.1189C14.2695 12.2408 14.2956 12.3715 14.2956 12.5035C14.2956 12.6355 14.2695 12.7662 14.2187 12.8881C14.168 13.0099 14.0936 13.1205 13.9998 13.2135L9.39983 17.7935C9.21153 17.9805 9.10521 18.2346 9.10428 18.4999C9.10334 18.7653 9.20786 19.0202 9.39483 19.2085C9.58181 19.3968 9.83593 19.5031 10.1013 19.504C10.3667 19.505 10.6215 19.4005 10.8098 19.2135L15.3998 14.6235C15.9616 14.061 16.2772 13.2985 16.2772 12.5035C16.2772 11.7085 15.9616 10.946 15.3998 10.3835Z" fill="#1A5091"/>
                                                    </svg>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>

        </div>
    </div>
</section>