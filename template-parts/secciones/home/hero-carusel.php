<?php
    $grupoHero = get_field('grupo_hero');
    $slides = $grupoHero['slides'];
    $totalSlides = is_array($slides) ? count($slides) : 0;
?>

<section class="bg-hero pt-84 pb-54 pt-42 pb-67 px-30 position-relative">
    <div class="container position-relative">
        <div class="p-0 position-relative slide-container3 swiper" data-total-slides="<?php echo $totalSlides; ?>">
            <div class="swiper-wrapper">
                <?php foreach ($slides as $slide): ?>
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="row flex-column-reverse flex-lg-row p-0 align-items-center">
                                <div class="col-lg-6 p-0 hero-content">
                                    <h1 class="text-white mb-4"><?php echo esc_html($slide['titulo']); ?></h1>
                                    <hr class="hr color-hr text-white" />
                                    <p class="lead text-white mb-4"><?php echo esc_html($slide['descripcion']); ?></p>
                                    <?php if (!empty($slide['cta'])): ?>
                                        <a href="<?php echo esc_url($slide['cta']['url']); ?>" class="btn custom-btn-hero" target="<?php echo esc_attr($slide['cta']['target']); ?>">
                                            <?php echo esc_html($slide['cta']['title']); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 p-0 hero-image mb-4 mb-lg-0">
                                    <?php if (!empty($slide['imagen'])): ?>
                                        <img class="w-100" src="<?php echo esc_url($slide['imagen']['url']); ?>" alt="<?php echo esc_attr($slide['imagen']['alt']); ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="swiper-button-next swiper-navBtn swiper-bg-white d-none d-lg-block">
            <img src="/wp-content/uploads/fi-rr-angle-small-right.png">
        </div>
        <div class="swiper-button-prev swiper-navBtn swiper-bg-white d-none d-lg-block">
            <img src="/wp-content/uploads/fi-rr-angle-small-right-1.png">
        </div>
        <div class="custom-pagination-counter mtn-40 mt-5 mt-md-0 d-flex gap-3 justify-content-center align-items-center">
            <div class="counter d-flex gap-1 text-white">
                <span class="current-slide fw-bold">1</span> / <span class="total-slides">3</span>
            </div>
            <div class="swiper-pagination3"></div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".slide-container3", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        grabCursor: true,
        pagination: {
            el: ".swiper-pagination3",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: { slidesPerView: 1, },
            520: { slidesPerView: 1 },
            950: { slidesPerView: 1 },
        },
        on: {
            init: function () {
                var totalSlides = document.querySelector(".slide-container3").dataset.totalSlides;
                document.querySelector(".custom-pagination-counter .total-slides").textContent = totalSlides;
                document.querySelector(".custom-pagination-counter .current-slide").textContent = this.realIndex + 1;
            },
            slideChange: function () {
                document.querySelector(".custom-pagination-counter .current-slide").textContent = this.realIndex + 1;
            },
        },
    });
</script>