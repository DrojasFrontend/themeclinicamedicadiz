<?php
    $grupoTarjetaIcono = get_field('grupo_tarjeta_icono');
    $fondo = $grupoTarjetaIcono['fondo'] ?? '';
    $subtitulo = $grupoTarjetaIcono['subtitulo'] ?? '';
    $titulo = $grupoTarjetaIcono['titulo'] ?? '';
    $cta = $grupoTarjetaIcono['cta'] ?? '';

    $slides = $grupoTarjetaIcono['tarjeta'] ?? [];
    $totalSlides = is_array($slides) ? count($slides) : 0;
?>

<section class="py-lg-5 pt-60 px-18 bg-cta-fondo" style="background-image: url('<?php echo esc_url($fondo['url']); ?>');">
    <div class="container">
        <p class="text-uppercase custom-span text-white text-center"><?php echo esc_html($subtitulo); ?></p>
        <h2 class="my-4 text-white text-center"><?php echo esc_html($titulo); ?></h2>

        <?php if (have_rows('grupo_tarjeta_icono')) : ?>
            <div class="row justify-content-center pt-4 g-4 mbn-100 d-none d-md-flex">
            <?php while (have_rows('grupo_tarjeta_icono')) : the_row(); ?>
                <?php if (have_rows('tarjeta')) : ?>
                    <?php while (have_rows('tarjeta')) : the_row(); ?>
                        <div class="col-12 col-md-5 col-lg-4">
                        <?php 
                            $imagen = get_sub_field('imagen');
                            $titulo = get_sub_field('titulo');
                            $cta = get_sub_field('cta');
                        ?>
                            <div class="card event-card">
                                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>">
                                <div class="card-body">
                                    <h4 class="card-title tertiary-text"><?php echo esc_html($titulo); ?></h4>
                                    <div class="d-flex align-items-center mt-4">
                                    <?php
                                        if (is_array($cta) && isset($cta['url'], $cta['title'])) :
                                            $url = $cta['url'];
                                            $texto = $cta['title'];
                                            $target = $cta['target'] ? $cta['target'] : '_self';
                                    ?>
                                        <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="btn-transparent fw-bold p-0 nav-underline"><?php echo esc_html($texto); ?></a>
                                        <span class="ms-2"><img src="http://medicadiz.local/wp-content/uploads/Outline-1.png" class="align-middle" /></span>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php endwhile; ?>
            </div>
            <div class="swiper-container slide-container-mobile d-md-none overflow-hidden" data-total-slides="<?php echo $totalSlides; ?>">
                <div class="swiper-wrapper">
                    <?php while (have_rows('grupo_tarjeta_icono')) : the_row(); ?>
                        <?php if (have_rows('tarjeta')) : ?>
                            <?php while (have_rows('tarjeta')) : the_row(); ?>
                                <div class="swiper-slide">
                                    <?php 
                                        $imagen = get_sub_field('imagen');
                                        $titulo = get_sub_field('titulo');
                                        $cta = get_sub_field('cta');
                                    ?>
                                    <div class="col-12 col-md-5 col-lg-4">
                                        <div class="card event-card">
                                            <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>">
                                            <div class="card-body">
                                                <h4 class="card-title tertiary-text"><?php echo esc_html($titulo); ?></h4>
                                                <div class="d-flex align-items-center mt-4">
                                                <?php
                                                    if (is_array($cta) && isset($cta['url'], $cta['title'])) :
                                                        $url = $cta['url'];
                                                        $texto = $cta['title'];
                                                        $target = $cta['target'] ? $cta['target'] : '_self';
                                                ?>
                                                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="btn-transparent fw-bold p-0 nav-underline"><?php echo esc_html($texto); ?></a>
                                                    <span class="ms-2"><img src="http://medicadiz.local/wp-content/uploads/Outline-1.png" class="align-middle" /></span>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
                <div class="custom-paginationcards mt-5 d-flex gap-3 justify-content-center align-items-center d-block d-md-none">
                <div class="counter d-flex gap-1">
                    <span class="current-slide fw-bold">1</span> / <span class="total-slides">3</span>
                </div>
                <div id="pagination-cards" class="swiper-pagination"></div>
            </div>
            </div>
            
        <?php endif; ?>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let swiperInstance = null;

        function initializeSwiper() {
            if (window.innerWidth < 768 && !swiperInstance) {
                swiperInstance = new Swiper(".slide-container-mobile", {
                    slidesPerView: 1,
                    spaceBetween: 10,
                    loop: true,
                    pagination: {
                        el: "#pagination-cards",
                        clickable: true,
                    },
                    watchOverflow: true,
                    on: {
                        init: function () {
                            const totalSlides = document.querySelector(".slide-container-mobile").dataset.totalSlides;
                            document.querySelector(".custom-paginationcards .total-slides").textContent = totalSlides;
                            document.querySelector(".custom-paginationcards .current-slide").textContent = this.realIndex + 1;
                        },
                        slideChange: function () {
                            document.querySelector(".custom-paginationcards .current-slide").textContent = this.realIndex + 1;
                        },
                    },
                });
            } else if (window.innerWidth >= 768 && swiperInstance) {
                swiperInstance.destroy(true, true);
                swiperInstance = null;
            }
        }
        initializeSwiper();

        window.addEventListener('resize', initializeSwiper);
    });

</script>