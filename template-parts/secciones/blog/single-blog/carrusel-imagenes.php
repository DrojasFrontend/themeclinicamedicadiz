<?php
    $grupoSlides = get_field('grupo_slides');
    $slides = !empty($grupoSlides['slides']) ? $grupoSlides['slides'] : [];
    $totalSlides = is_array($slides) ? count($slides) : 0;
?>

<section class="bg-menu py-5">
    <div class="container-fluid position-relative">
        <?php if ($totalSlides > 0): ?>
            <!-- Swiper Slider -->
            <div class="swiper-container-wrapper custom-img-swiper">
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
        <?php endif; ?>
        <!-- Pagination -->
        <div class="swiper-button-next navRight swiper-navBtn swiper-bg-blue">
            <img src="/wp-content/uploads/fi-rr-angle-small-right-3.png">
        </div>
        <div class="swiper-button-prev navLeft swiper-navBtn swiper-bg-blue">
            <img src="/wp-content/uploads/fi-rr-angle-small-right-2.png">
        </div>
        <div class="custom-pagination2 mt-5 d-flex justify-content-center align-items-center gap-3">
            <div class="counter">
                <span class="current-slide fw-bold">1</span> / <span class="total-slides">5</span>
            </div>
            <div id="pagination1" class="swiper-pagination"></div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".swiper-container", {
    slidesPerView: 1, // Number of slides visible
    centeredSlides: true, // Center the active slide
    spaceBetween: 30, // Space between slides
    loop: true, // Enable looping
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
        // Responsive design, changing slidesPerView based on screen width Code by Amit Niranjan
        640: {
        slidesPerView: 1
        },
        768: {
        slidesPerView: 1
        },
        1024: {
        slidesPerView: 2.5
        }
    }
});
</script>