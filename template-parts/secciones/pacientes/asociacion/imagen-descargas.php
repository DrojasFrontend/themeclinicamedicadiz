<?php 
    $grupoActas = get_field('grupo_actas');
    $titulo = $grupoActas['titulo'] ?? '';
?>

<section class="bg-menu pt-72 pt-60 px-18">
    <div class="container">
        <h2 class="mb-5 text-center"><?php echo esc_html($titulo); ?></h2>

        <?php if (have_rows('grupo_actas')) : ?>
            <div class="row row-cols-2 row-cols-lg-4 g-4">
                <?php while (have_rows('grupo_actas')) : the_row(); ?>
                    <?php if (have_rows('items')) : ?>
                        <?php while (have_rows('items')) : the_row(); ?>
                            <div class="col">
                                <?php 
                                    $imagen = get_sub_field('imagen');
                                    $cta = get_sub_field('cta');
                                ?>
                                <div class="">
                                    <div class="item-icon text-lg-center mb-3">
                                        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" />
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <?php
                                            if (is_array($cta) && isset($cta['url'], $cta['title'])) :
                                                $url = $cta['url'];
                                                $texto = $cta['title'];
                                        ?>
                                            <a href="<?php echo esc_url($url); ?>" class="btn-transparent fw-bold text-start p-0 nav-underline"><?php echo esc_html($texto); ?></a>
                                            <span class="ms-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                                <path d="M15.3998 10.3835L10.8098 5.79348C10.6225 5.60723 10.369 5.50269 10.1048 5.50269C9.84065 5.50269 9.5872 5.60723 9.39983 5.79348C9.3061 5.88644 9.23171 5.99704 9.18094 6.1189C9.13017 6.24076 9.10403 6.37147 9.10403 6.50348C9.10403 6.63549 9.13017 6.7662 9.18094 6.88805C9.23171 7.00991 9.3061 7.12052 9.39983 7.21348L13.9998 11.7935C14.0936 11.8864 14.168 11.997 14.2187 12.1189C14.2695 12.2408 14.2956 12.3715 14.2956 12.5035C14.2956 12.6355 14.2695 12.7662 14.2187 12.8881C14.168 13.0099 14.0936 13.1205 13.9998 13.2135L9.39983 17.7935C9.21153 17.9805 9.10521 18.2346 9.10428 18.4999C9.10334 18.7653 9.20786 19.0202 9.39483 19.2085C9.58181 19.3968 9.83593 19.5031 10.1013 19.504C10.3667 19.505 10.6215 19.4005 10.8098 19.2135L15.3998 14.6235C15.9616 14.061 16.2772 13.2985 16.2772 12.5035C16.2772 11.7085 15.9616 10.946 15.3998 10.3835Z" fill="#1A5091"/>
                                            </svg></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>