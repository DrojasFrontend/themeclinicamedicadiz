<?php
    $grupoSlides = get_field('grupo_slides');
    $subtitulo = $grupoSlides['subtitulo'] ?? '';
    $titulo = $grupoSlides['titulo'] ?? '';
    $descripcion = $grupoSlides['descripcion'] ?? '';
    $slides = $grupoSlides['slides'];
    $descripcionSlides = $grupoSlides['descripcion_slide'] ?? '';
    $totalSlides = is_array($slides) ? count($slides) : 0;
?>

<section class="py-72 pt-60 pb-4 px-18 eco-section text-md-center">
    <div class="container position-relative">
        <p class="text-uppercase custom-span primary-text"><?php echo esc_html($subtitulo); ?></p>
        <h2 class="eco-title"><?php echo esc_html($titulo); ?></h2>
        <div class="eco-text mt-4">
            <?php echo $descripcion; ?>
        </div>

        <!-- Swiper Slider -->
        <div class="swiper-container-wrapper">
            <div class="swiper-container" data-total-slides="<?php echo $totalSlides; ?>">
                <div class="swiper-wrapper">
                    <?php foreach ($slides as $slide): ?>
                        <div class="swiper-slide">
                        <?php if (!empty($slide['imagen'])): ?>
                            <img src="<?php echo esc_url($slide['imagen']['url']); ?>" alt="<?php echo esc_attr($slide['imagen']['alt']); ?>">
                        <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="swiper-button-next swiper-navBtn swiper-bg-blue d-none d-lg-block">
            <img src="/wp-content/uploads/fi-rr-angle-small-right-3.png">
        </div>
        <div class="swiper-button-prev swiper-navBtn swiper-bg-blue d-none d-lg-block">
            <img src="/wp-content/uploads/fi-rr-angle-small-right-2.png">
        </div>
        <div class="custom-pagination2 mt-5 d-flex justify-content-center align-items-center gap-3">
            <div class="counter">
                <span class="current-slide fw-bold">1</span> / <span class="total-slides">5</span>
            </div>
            <div id="pagination1" class="swiper-pagination"></div>
        </div>

        <div class="eco-text mt-4">
            <?php echo $descripcionSlides; ?>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".swiper-container", {
    slidesPerView: 1,
    centeredSlides: true,
    spaceBetween: 30,
    loop: true,
    pagination: {
            el: '#pagination1',
            clickable: true,
    },
    navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        on: {
            init: function () {
                var totalSlides = document.querySelector(".swiper-container").dataset.totalSlides;
                document.querySelector(".custom-pagination2 .total-slides").textContent = totalSlides;
                document.querySelector(".custom-pagination2 .current-slide").textContent = this.realIndex + 1;
            },
            slideChange: function () {
                document.querySelector(".custom-pagination2 .current-slide").textContent = this.realIndex + 1;
            },
        },
    breakpoints: {
        640: {
        slidesPerView: 1
        },
        768: {
        slidesPerView: 1
        },
        1024: {
        slidesPerView: 2.0
        }
    }
});
</script>