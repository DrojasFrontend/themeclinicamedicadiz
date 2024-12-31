<?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = [
        'post_type' => 'servicios',
        'posts_per_page' => 4,
        'paged' => $paged,
    ];
    $query = new WP_Query($args);

    $grupoListadoServicios = get_field('grupo_listado_servicios');
    $subtitulo = $grupoListadoServicios['subtitulo'] ?? '';
    $titulo = $grupoListadoServicios['titulo'] ?? '';

    $hayContenido = $subtitulo || $titulo;
?>

<?php if ($hayContenido): ?>
<section class="bg-menu py-5 py-60 px-18">
    <div class="container">
        <div class="mb-5">
            <span class="text-uppercase custom-span primary-text"><?php echo esc_html($subtitulo); ?></span>
            <h2 class="mt-2 mb-4"><?php echo esc_html($titulo); ?></h2>
        </div>
        <div class="row g-4" id="post-container">
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 post-item">
                    <div class="card h-100 border-0">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <div class="py-4 px-3 d-flex flex-column flex-fill">
                            <h5 class="card-title flex-fill"><?php the_title(); ?></h5>
                            <div class="d-flex align-items-center">
                                <a href="<?php the_permalink(); ?>" class="btn-transparent fw-bold p-0 nav-underline">Conoce más</a>
                                <span class="ms-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                    <path d="M15.3998 10.3835L10.8098 5.79348C10.6225 5.60723 10.369 5.50269 10.1048 5.50269C9.84065 5.50269 9.5872 5.60723 9.39983 5.79348C9.3061 5.88644 9.23171 5.99704 9.18094 6.1189C9.13017 6.24076 9.10403 6.37147 9.10403 6.50348C9.10403 6.63549 9.13017 6.7662 9.18094 6.88805C9.23171 7.00991 9.3061 7.12052 9.39983 7.21348L13.9998 11.7935C14.0936 11.8864 14.168 11.997 14.2187 12.1189C14.2695 12.2408 14.2956 12.3715 14.2956 12.5035C14.2956 12.6355 14.2695 12.7662 14.2187 12.8881C14.168 13.0099 14.0936 13.1205 13.9998 13.2135L9.39983 17.7935C9.21153 17.9805 9.10521 18.2346 9.10428 18.4999C9.10334 18.7653 9.20786 19.0202 9.39483 19.2085C9.58181 19.3968 9.83593 19.5031 10.1013 19.504C10.3667 19.505 10.6215 19.4005 10.8098 19.2135L15.3998 14.6235C15.9616 14.061 16.2772 13.2985 16.2772 12.5035C16.2772 11.7085 15.9616 10.946 15.3998 10.3835Z" fill="#1A5091"/>
                                </svg></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="text-center mt-4">
            <button id="loadMoreBtn" class="btn custom-btn-mobile d-md-none">Ver más</button>
        </div>
        
        <nav class="mt-4">
            <ul class="pagination justify-content-center" id="pagination">
                <?php
                $total_pages = $query->max_num_pages;
                if ($total_pages > 1) {
                    if ($paged > 1) {
                        echo '<li class="page-item">';
                        echo '<button class="pagination-arrows" onclick="goToPage(' . ($paged - 1) . ')">';
                        echo '<img src="/wp-content/uploads/BTTN-SLIDER.svg">';
                        echo '</button>';
                        echo '</li>';
                    }

                    for ($i = 1; $i <= $total_pages; $i++) {
                        $active_class = ($i == $paged) ? 'active' : '';
                        echo '<li class="page-item ' . $active_class . '">';
                        echo '<a class="page-link" href="#" onclick="goToPage(' . $i . ')">' . $i . '</a>';
                        echo '</li>';
                    }

                    if ($paged < $total_pages) {
                        echo '<li class="page-item">';
                        echo '<button class="pagination-arrows" onclick="goToPage(' . ($paged + 1) . ')">';
                        echo '<img src="/wp-content/uploads/BTTN-SLIDER-1.svg">';
                        echo '</button>';
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        </nav>
    </div>
</section>
<?php endif; ?>

<?php wp_reset_postdata(); ?>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        const postContainer = document.getElementById('post-container');
        const loadMoreButton = document.getElementById('loadMoreBtn');
        let isMobile = window.innerWidth <= 768;
        let itemsPerPage = isMobile ? 3 : 8;
        let currentPage = 1;

        function paginatePosts() {
            const items = Array.from(postContainer.getElementsByClassName('post-item'));
            items.forEach((item, index) => {
                item.style.display = index < itemsPerPage * currentPage ? 'block' : 'none';
            });

            if (itemsPerPage * currentPage >= items.length) {
                loadMoreButton.style.display = 'none';
            } else {
                loadMoreButton.style.display = 'block';
            }
        }

        function handleResize() {
            const newIsMobile = window.innerWidth <= 768;
            if (newIsMobile !== isMobile) {
                isMobile = newIsMobile;
                itemsPerPage = isMobile ? 3 : 8;
                currentPage = 1;
                paginatePosts();
            }
        }

        loadMoreButton.addEventListener('click', function () {
            currentPage++;
            paginatePosts();
        });

        window.addEventListener('resize', handleResize);

        paginatePosts();
    });

    function goToPage(page) {
        const url = new URL(window.location.href);
        url.searchParams.set('paged', page);
        window.location.href = url.toString();
    }
</script>