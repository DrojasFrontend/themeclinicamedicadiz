<?php
    $query_args = array(
        'post_type' => 'post',
        'posts_per_page' => 9,
    );
    $blog_query = new WP_Query($query_args);
    $total_posts = $blog_query->found_posts;

    $page_for_posts_id = get_option('page_for_posts');
    $grupoNoticias = get_field('grupo_noticias', $page_for_posts_id);
    $titulo = $grupoNoticias['titulo'] ?? '';
?>

<section class="bg-menu">
    <div class="container py-5">
        <div class="row align-items-center mb-4">
            <div class="col">
                <h2 class="my-4"><?php echo esc_html($titulo); ?></h2>
            </div>
        </div>

        <div class="position-relative">
            <div class="slide-container swiper" data-total-slides="<?php echo esc_attr($total_posts); ?>">
                <div class="slide-content">
                    <div class="card-wrapper swiper-wrapper">
                        <?php
                            if ($blog_query->have_posts()) :
                                while ($blog_query->have_posts()) : $blog_query->the_post();
                                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    $title = get_the_title();
                                    $excerpt = get_the_excerpt();
                                    $date = get_the_date('j \d\e F');
                                    $reading_time = '6 minutos de lectura';
                                    $permalink = get_the_permalink();
                                    ?>
                                    <div class="card border-0 bg-transparent swiper-slide">
                                        <img src="<?php echo esc_url($thumbnail); ?>" class="card-img-top" alt="<?php echo esc_attr($title); ?>">
                                        <div class="pt-4 d-flex flex-column flex-fill">
                                            <h5 class="card-title"><?php echo esc_html($title); ?></h5>
                                            <p class="card-text"><?php echo esc_html($excerpt); ?></p>
                                            <small class="text-muted d-block mb-2 flex-fill"><?php echo esc_html($date); ?> | <?php echo esc_html($reading_time); ?></small>
                                            <div class="d-flex align-items-center">
                                                <a href="<?php echo esc_url($permalink); ?>" class="btn-transparent fw-bold p-0 nav-underline">Seguir leyendo</a>
                                                <span class="ms-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                                    <path d="M15.3998 10.3835L10.8098 5.79348C10.6225 5.60723 10.369 5.50269 10.1048 5.50269C9.84065 5.50269 9.5872 5.60723 9.39983 5.79348C9.3061 5.88644 9.23171 5.99704 9.18094 6.1189C9.13017 6.24076 9.10403 6.37147 9.10403 6.50348C9.10403 6.63549 9.13017 6.7662 9.18094 6.88805C9.23171 7.00991 9.3061 7.12052 9.39983 7.21348L13.9998 11.7935C14.0936 11.8864 14.168 11.997 14.2187 12.1189C14.2695 12.2408 14.2956 12.3715 14.2956 12.5035C14.2956 12.6355 14.2695 12.7662 14.2187 12.8881C14.168 13.0099 14.0936 13.1205 13.9998 13.2135L9.39983 17.7935C9.21153 17.9805 9.10521 18.2346 9.10428 18.4999C9.10334 18.7653 9.20786 19.0202 9.39483 19.2085C9.58181 19.3968 9.83593 19.5031 10.1013 19.504C10.3667 19.505 10.6215 19.4005 10.8098 19.2135L15.3998 14.6235C15.9616 14.061 16.2772 13.2985 16.2772 12.5035C16.2772 11.7085 15.9616 10.946 15.3998 10.3835Z" fill="#1A5091"/>
                                                </svg></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<p>No se encontraron entradas.</p>';
                            endif;
                        ?>
                    </div>
                </div>

            </div>
            <div class="swiper-button-next swiper-navBtn swiper-bg-blue d-none d-lg-block">
                <img src="/wp-content/uploads/fi-rr-angle-small-right-3.png">
            </div>
            <div class="swiper-button-prev swiper-navBtn swiper-bg-blue d-none d-lg-block">
                <img src="/wp-content/uploads/fi-rr-angle-small-right-2.png">
            </div>
            <div class="custom-pagination mt-5 d-flex justify-content-center align-items-center gap-3">
                <div class="counter">
                    <span class="current-slide fw-bold">1</span> / <span class="total-slides">5</span>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiperContainer = document.querySelector(".slide-container");
var totalSlides = swiperContainer.dataset.totalSlides;

var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 25,
    loop: true,
    centerSlide: true,
    fade: true,
    grabCursor: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: { slidesPerView: 1, },
        520: { slidesPerView: 2 },
        950: { slidesPerView: 3 },
    },
    on: {
        init: function () {
            document.querySelector(".custom-pagination .total-slides").textContent = totalSlides;
            document.querySelector(".custom-pagination .current-slide").textContent = this.realIndex + 1;
        },
        slideChange: function () {
            document.querySelector(".custom-pagination .current-slide").textContent = this.realIndex + 1;
        },
    },
});

</script>