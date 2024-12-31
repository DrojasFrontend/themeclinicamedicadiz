<?php 
    $grupoTarjetaListado = get_field('grupo_tarjeta_listado');
    $fondo = $grupoTarjetaListado['fondo'] ?? '';
    $subtitulo = $grupoTarjetaListado['subtitulo'] ?? '';
    $titulo = $grupoTarjetaListado['titulo'] ?? '';

    $slides = $grupoTarjetaListado['listado'] ?? [];
    $totalSlides = is_array($slides) ? count($slides) : 0;
?>

<section style="background-image: url('<?php echo esc_url($fondo['url']); ?>'); background-size: cover;" class="py-72 pt-112 pb-60 px-18 bg-menu">
    <div class="container overflow-hidden">
        <div class="text-center mb-5 mb-md-0">
            <span class="text-uppercase custom-span tertiary-text"><?php echo esc_html($subtitulo); ?></span>
            <h2 class=""><?php echo esc_html($titulo); ?></h2>
        </div>
        <?php if (have_rows('grupo_tarjeta_listado')) : ?>
            <div class="row mt-4 gy-4 d-none d-md-flex">
                <?php while (have_rows('grupo_tarjeta_listado')) : the_row(); ?>
                        <?php if (have_rows('listado')) : ?>
                            <?php while (have_rows('listado')) : the_row(); ?>
                                <div class="col-12 col-md-6">
                                    <?php 
                                        $titulo = get_sub_field('titulo');
                                        $descripcion = get_sub_field('descripcion');
                                    ?>
                                    <div class="card card-corporate border-0 h-100">
                                        <div class="card-body py-5 px-4">
                                            <h4 class="tertiary-text"><?php echo esc_html($titulo); ?></h4>
                                            <p class="mt-3"><?php echo esc_html($descripcion); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
            <div class="swiper-container slide-container-mobile d-md-none" data-total-slides="<?php echo $totalSlides; ?>">
                <div class="swiper-wrapper">
                    <?php while (have_rows('grupo_tarjeta_listado')) : the_row(); ?>
                        <?php if (have_rows('listado')) : ?>
                            <?php while (have_rows('listado')) : the_row(); ?>
                                <div class="swiper-slide">
                                    <?php 
                                        $titulo = get_sub_field('titulo');
                                        $descripcion = get_sub_field('descripcion');
                                    ?>
                                    <div class="card card-corporate border-0 h-100">
                                        <div class="card-body py-5 px-4">
                                            <h4 class="tertiary-text"><?php echo esc_html($titulo); ?></h4>
                                            <p class="mt-3"><?php echo esc_html($descripcion); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="custom-paginationcards mt-5 d-flex gap-3 justify-content-center align-items-center d-block d-md-none">
                <div class="counter d-flex gap-1">
                    <span class="current-slide fw-bold">1</span> / <span class="total-slides">3</span>
                </div>
                <div id="pagination-cards" class="swiper-pagination"></div>
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