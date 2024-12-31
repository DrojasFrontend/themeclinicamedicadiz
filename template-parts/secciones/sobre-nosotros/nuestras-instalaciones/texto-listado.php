<?php 
    $grupoTarjetaListado = get_field('grupo_listado');
    $subtitulo = $grupoTarjetaListado['subtitulo'] ?? '';
    $titulo = $grupoTarjetaListado['titulo'] ?? '';
    $descripcion = $grupoTarjetaListado['descripcion'] ?? '';

    $slides = $grupoTarjetaListado['listado'] ?? [];
    $totalSlides = is_array($slides) ? count($slides) : 0;
?>

<section class="py-5 px-18">
    <div class="container overflow-hidden">
        <p class="text-uppercase custom-span tertiary-text text-center"><?php echo esc_html($subtitulo); ?></p>
        <h2 class="mb-4 text-center"><?php echo esc_html($titulo); ?></h2>
        <p class="text-center mb-4"><?php echo esc_html($descripcion); ?></p>

        <?php if (have_rows('grupo_listado')) : ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 d-none d-md-flex">
                <?php while (have_rows('grupo_listado')) : the_row(); ?>
                    <?php if (have_rows('listado')) : ?>
                        <?php while (have_rows('listado')) : the_row(); ?>
                            <div class="col">
                                <?php 
                                    $titulo = get_sub_field('titulo');
                                    $descripcion = get_sub_field('descripcion');
                                ?>
                                <div class="">
                                    <div class="item-icon mb-3">
                                        <h3 class="tertiary-text"><?php echo esc_html($titulo); ?></h3>
                                    </div>
                                    <p class="item-description"><?php echo esc_html($descripcion); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
            <div class="swiper-container slide-container-mobile d-md-none" data-total-slides="<?php echo $totalSlides; ?>">
                <div class="swiper-wrapper">
                    <?php 
                        $columns = 3;
                        $itemsPerSlide = ceil($totalSlides / $columns); 
                        $counter = 0;
                    ?>
                    <?php while (have_rows('grupo_listado')) : the_row(); ?>
                        <?php if (have_rows('listado')) : ?>
                            <?php while (have_rows('listado')) : the_row(); ?>
                                <?php if ($counter % $columns === 0): ?>
                                    <div class="swiper-slide">
                                        <div class="row">
                                <?php endif; ?>
                                            <div class="col-12">
                                                <?php 
                                                    $titulo = get_sub_field('titulo');
                                                    $descripcion = get_sub_field('descripcion');
                                                ?>
                                                <div class="item">
                                                    <h3 class="tertiary-text"><?php echo esc_html($titulo); ?></h3>
                                                    <p class="item-description"><?php echo esc_html($descripcion); ?></p>
                                                </div>
                                            </div>
                                <?php $counter++; ?>
                                <?php if ($counter % $columns === 0): ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>

                    <?php if ($counter % $columns !== 0): ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

            <div class="custom-paginationcards d-flex gap-3 justify-content-center align-items-center d-block d-md-none mt-3">
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
                            const totalSlides = document.querySelector(".swiper-container").querySelectorAll(".swiper-slide").length;
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