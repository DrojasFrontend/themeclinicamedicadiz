<?php
    $grupoHero = get_field('grupo_hero');
    $slides = $grupoHero['slides'] ?? '';
    $totalSlides = is_array($slides) ? count($slides) : 0;
?>

<section class="bg-nosotros pt-84 pb-54 pt-42 pb-67 px-6 position-relative">
    <div class="container position-relative">
        <div class="p-0 slide-container-hero swiper" data-total-slides="<?php echo $totalSlides; ?>">
            <div class="row mb-5">
                <div class="col">
                    <nav class="custom-font" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-2">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item fw-bold active" aria-current="page">Conócenos</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="swiper-wrapper">
                <?php foreach ($slides as $slide): ?>
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="row flex-column-reverse flex-lg-row p-0 align-items-center">
                                <div class="col-lg-6 hero-content">
                                    <span class="text-uppercase custom-span"><?php echo esc_html($slide['subtitulo']); ?></span>
                                    <h1 class="my-4"><?php echo esc_html($slide['titulo']); ?></h1>
                                    <hr class="hr color-hr-body" />
                                    <p class="lead mb-4"><?php echo esc_html($slide['descripcion']); ?></p>
                                </div>
                                <div class="col-lg-6 hero-image mb-4 mb-lg-0">
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
        <div class="custom-pagination mt-5 d-flex gap-3 mtn-40 justify-content-center justify-content-lg-start align-items-center">
            <div class="counter d-flex gap-1">
                <span class="current-slide fw-bold">1</span> / <span class="total-slides">3</span>
            </div>
            <div id="pagination-hero" class="swiper-pagination"></div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".slide-container-hero", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        grabCursor: true,
        pagination: {
            el: "#pagination-hero",
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
                var totalSlides = document.querySelector(".slide-container-hero").dataset.totalSlides;
                document.querySelector(".custom-pagination .total-slides").textContent = totalSlides;
                document.querySelector(".custom-pagination .current-slide").textContent = this.realIndex + 1;
            },
            slideChange: function () {
                document.querySelector(".custom-pagination .current-slide").textContent = this.realIndex + 1;
            },
        },
    });
</script>