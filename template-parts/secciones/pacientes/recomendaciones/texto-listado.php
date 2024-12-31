<?php 
    $grupoTextoImagen = get_field('grupo_texto_listado');
    $subtitulo = $grupoTextoImagen['subtitulo'] ?? '';
    $titulo = $grupoTextoImagen['titulo'] ?? '';

    $slides = $grupoTextoImagen['listado'] ?? [];
    $totalSlides = is_array($slides) ? count($slides) : 0;
?>

<section class="bg-menu pt-72 pb-114 py-60 px-18">
    <div class="container overflow-hidden">
        <p class="text-center text-uppercase custom-span primary-text"><?php echo esc_html($subtitulo); ?></p>
        <h2 class="mb-5 text-center"><?php echo esc_html($titulo); ?></h2>

        <?php if (have_rows('grupo_texto_listado')) : ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 d-none d-md-flex">
                <?php while (have_rows('grupo_texto_listado')) : the_row(); ?>
                    <?php if (have_rows('listado')) : ?>
                        <?php while (have_rows('listado')) : the_row(); ?>
                            <div class="col">
                                <?php 
                                    $imagen = get_sub_field('imagen');
                                    $descripcion = get_sub_field('descripcion');
                                ?>
                                <div class="">
                                    <div class="item-icon mb-3">
                                        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" />
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
                    $columns = 4;
                    $items = []; 
                    while (have_rows('grupo_texto_listado')) : the_row(); 
                        if (have_rows('listado')) : 
                            while (have_rows('listado')) : the_row();
                                $items[] = [
                                    'imagen' => get_sub_field('imagen'),
                                    'descripcion' => get_sub_field('descripcion')
                                ];
                            endwhile;
                        endif;
                    endwhile;

                    $totalSlides = ceil(count($items) / $columns);
                    for ($i = 0; $i < $totalSlides; $i++): ?>
                        <div class="swiper-slide flex-column">
                            <?php for ($j = 0; $j < $columns; $j++): 
                                $index = $i + ($j * $totalSlides);
                                if (isset($items[$index])): 
                                    $imagen = $items[$index]['imagen'];
                                    $descripcion = $items[$index]['descripcion'];
                            ?>
                                <div class="item">
                                    <div class="item-icon mb-3">
                                        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="w-auto" />
                                    </div>
                                    <p class="item-description"><?php echo esc_html($descripcion); ?></p>
                                </div>
                            <?php endif; endfor; ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <div class="custom-paginationcards d-flex gap-3 justify-content-center align-items-center d-block d-md-none">
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
                        const totalSlides = this.slides.length; // Obtén el número total de slides directamente
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