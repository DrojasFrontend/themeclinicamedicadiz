<?php
    $global_content = get_page_by_path('contenido-header-footer')->ID;
    $grupo_header = ($global_content) ? get_field('grupo_header', $global_content) : null;

    $imagen = $grupo_header['imagen'] ?? '';
    $headerMenuButton = $grupo_header['boton_menu'] ?? '';
    $imagenCTA = $grupo_header['imagen_cta'] ?? '';
    $imagenCapitalPartners = $grupo_header['imagen_capital_partners'] ?? '';
    $imagenCapitalPartnersMobile = $grupo_header['imagen_capital_partners_mobile'] ?? '';
    $enlaceCapitalPartners = $grupo_header['enlace'] ?? '';
    $texto = $grupo_header['texto'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=get_the_title()?></title>

    <!-- meta tag header includes -->
    <meta name="author" content="Taylor Callsen" />
    <meta name="description" content="<?=get_the_excerpt()?>" /> 
    <meta name="keywords" content="<?=$metaTags?>">
    <link rel="canonical" href="<?=wp_get_canonical_url()?>">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" />
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gilda+Display&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&family=Sulphur+Point:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <meta name="robots" content="index, follow">

    <!-- compatability header includes -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- open graph header includes -->
    <meta property="og:title" content="<?=get_the_title()?>" />
    <meta property="og:url" content="<?=wp_get_canonical_url()?>" />
    <meta property="og:description" content="<?=get_the_excerpt()?>" />

    <!-- wordpress header includes -->
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<div class="bg-success d-none d-lg-block custom-font-size text-white py-1">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex gap-4 align-items-center text-white top-bar-white">
            <?php echo $texto; ?>
        </div>
        <?php if (have_rows('grupo_header', $global_content)) : ?>
        <div>
            <?php while (have_rows('grupo_header', $global_content)) : the_row(); ?>
                <?php if (have_rows('redes')) : ?>
                    <?php while (have_rows('redes')) : the_row(); ?>
                        <?php 
                            $imagenIcono = get_sub_field('imagen');
                            $cta = get_sub_field('cta');
                            if (is_array($cta) && isset($cta['url'], $cta['target'])) :
                                $url = $cta['url'];
                                $target = $cta['target'] ? $cta['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="me-3 align-middle text-decoration-none">
                            <img src="<?php echo esc_url($imagenIcono['url']); ?>" alt="<?php echo esc_attr($imagenIcono['alt']); ?>" width="18" />
                        </a>
                            <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<nav class="navbar d-unset navbar-expand-lg navbar-dark bg-menu p-0">
    <div class="container d-unset m-0 m-lg-auto p-0">
        <div class="d-flex justify-content-between p-1 w-100 border-bottom-header">
            <a class="navbar-brand d-flex align-items-center" href="<?php echo esc_url( home_url('/') ); ?>">
                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="main_nav">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-principal',
                    'container' => 'div',
                    'container_class' => 'collapse navbar-collapse px-3',
                    'container_id' => 'main_nav',
                    'menu_class' => 'navbar-nav menu-main',
                    'walker' => new Mega_Menu_Walker(),
                ));
            ?>

            <!-- Submenu Mobile -->
            <?php 
            $menu_items = wp_get_nav_menu_items('menu-principal');
            if ($menu_items) {
                $menu_structure = [];
                
                foreach ($menu_items as $item) {
                    if ($item->menu_item_parent == 0) {
                        $menu_structure[$item->ID] = [
                            'title' => $item->title,
                            'url' => $item->url,
                            'subitems' => []
                        ];
                    } else {
                        $menu_structure[$item->menu_item_parent]['subitems'][] = [
                            'title' => $item->title,
                            'url' => $item->url,
                        ];
                    }
                }

                foreach ($menu_structure as $menu_id => $menu) {
                    ?>
                    <div id="menu-id-<?php echo $menu_id; ?>" class="menu-sub bg-menu d-none position-relative overflow-hidden">
                        <button class="custom-buttonMobile p-2 text-white border-0 mb-2 fw-bold" onclick="showMainMenu()"><?php echo $menu['title']; ?></button>
                        <div class="row g-3">
                            <div class="col p-4 m-0">
                                <div class="col-megamenu">
                                    <ul class="list-unstyled d-flex flex-column gap-4">
                                        <?php
                                            if (!empty($menu['subitems'])) {
                                                foreach ($menu['subitems'] as $subitem) {
                                                    ?>
                                                    <li><a href="<?php echo esc_url($subitem['url']); ?>"><?php echo esc_html($subitem['title']); ?></a></li>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="py-4 px-3 py-lg-0 bg-calendar-mobile w-100">
            <?php
                if ($headerMenuButton) {
                    $url = $headerMenuButton['url'];
                    $titulo = $headerMenuButton['title'];
                    $target = $headerMenuButton['target'] ? $headerMenuButton['target'] : '_self';
            ?>
            <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="navbar-brand d-flex gap-2 justify-content-lg-center align-items-center">
                <img src="<?php echo esc_url($imagenCTA['url']); ?>" alt="<?php echo esc_attr($imagenCTA['alt']); ?>" class="mw-100" width="24">
                <span class="fs-24 nav-underline position-relative"><?php echo esc_html($titulo); ?></span>
            </a>
            <?php        
                }
            ?>
        </div>
        <div class="d-none d-lg-block">
            <?php
                $urlCapitalPartners = $enlaceCapitalPartners['url'];
                $targetCapitalPartners = $enlaceCapitalPartners['target'] ? $enlaceCapitalPartners['target'] : '_self';
            ?>
            <a class="navbar-brand d-flex align-items-center" href="<?php echo esc_url($urlCapitalPartners); ?>" target="<?php echo esc_attr($targetCapitalPartners); ?>">
                <img src="<?php echo esc_url($imagenCapitalPartners['url']); ?>" alt="<?php echo esc_attr($imagenCapitalPartners['alt']); ?>">
            </a>
        </div>
        <div class="py-4 px-3 bg-success text-white d-lg-none w-100">
            <p class="fs-22">Síguenos en:</p>
            <?php if (have_rows('grupo_header', $global_content)) : ?>
                <div class="d-flex gap-3 mt-3">
                    <?php while (have_rows('grupo_header', $global_content)) : the_row(); ?>
                        <?php if (have_rows('redes')) : ?>
                            <?php while (have_rows('redes')) : the_row(); ?>
                                <?php 
                                    $imagenIcono = get_sub_field('imagen');
                                    $cta = get_sub_field('cta');
                                    if (is_array($cta) && isset($cta['url'], $cta['target'])) :
                                        $url = $cta['url'];
                                        $title = $cta['title'];
                                        $target = $cta['target'] ? $cta['target'] : '_self';
                                ?>
                                <div class="text-center">
                                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>">
                                        <img src="<?php echo esc_url($imagenIcono['url']); ?>" alt="<?php echo esc_attr($imagenIcono['alt']); ?>" width="42" />
                                    </a>
                                    <p class="mt-2 custom-font-size"><?php echo esc_html($title); ?></p>
                                </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="py-4 px-3 bg-darkBlueImage text-white d-lg-none w-100">
            <p class="custom-font-size">Hacemos parte del grupo</p>
            <?php
                $urlCapitalPartners = $enlaceCapitalPartners['url'];
                $targetCapitalPartners = $enlaceCapitalPartners['target'] ? $enlaceCapitalPartners['target'] : '_self';
            ?>
            <a href="<?php echo esc_url($urlCapitalPartners); ?>" target="<?php echo esc_attr($targetCapitalPartners); ?>">
                <img src="<?php echo esc_url($imagenCapitalPartnersMobile['url']); ?>" alt="<?php echo esc_attr($imagenCapitalPartnersMobile['alt']); ?>" />
            </a>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script> 
    function isMobile() { 
        return window.innerWidth <= 1024;
    }

    function handleMobileSubMenu(event, menuId) {
        event.preventDefault();
        
        if (isMobile()) {
            const mainMenu = document.querySelector('.menu-main');
            if (mainMenu) {
                mainMenu.classList.add('d-none'); // Ocultar menú principal
            }

            const subMenu = document.getElementById(menuId);
            
            document.querySelectorAll('.menu-sub').forEach(menu => {
                menu.classList.add('d-none');
                menu.classList.remove('d-block');
            });
            
            if (subMenu) {
                if (subMenu.classList.contains('d-none')) {
                    subMenu.classList.remove('d-none');
                    subMenu.classList.add('d-block');
                } else {
                    subMenu.classList.remove('d-block');
                    subMenu.classList.add('d-none');
                }
            }
        }
    }

    function showMainMenu() {
        const mainMenu = document.querySelector('.menu-main');
        if (mainMenu) {
            mainMenu.classList.remove('d-none');
        }

        document.querySelectorAll('.menu-sub').forEach(subMenu => {
            subMenu.classList.remove('d-block');
            subMenu.classList.add('d-none');
        });
    }

    window.addEventListener('resize', function () {
        if (!isMobile()) {
            const mainMenu = document.querySelector('.menu-main');
            if (mainMenu) {
                mainMenu.classList.remove('d-none');
            }

            document.querySelectorAll('.menu-sub').forEach(subMenu => {
                subMenu.classList.remove('d-block');
                subMenu.classList.add('d-none');
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const toggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('#main_nav');

        if (toggler && navbarCollapse) {
            navbarCollapse.addEventListener('show.bs.collapse', function () {
                toggler.classList.add('toggled');
            });

            navbarCollapse.addEventListener('hide.bs.collapse', function () {
                toggler.classList.remove('toggled');
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const menuItems = document.querySelectorAll('.menu-item-has-children');

        menuItems.forEach(item => {
            const submenu = item.querySelector('.dropdown-menu');

            if (submenu) {
                let hideTimeout;

                item.addEventListener('mouseenter', () => {
                    clearTimeout(hideTimeout);
                    closeAllMenus();
                    submenu.classList.add('show');
                });

                item.addEventListener('mouseleave', () => {
                    hideTimeout = setTimeout(() => {
                        submenu.classList.remove('show');
                    }, 200);
                });

                window.addEventListener('scroll', () => {
                    submenu.classList.remove('show');
                });
            }
        });

        function closeAllMenus() {
            document.querySelectorAll('.dropdown-menu.show').forEach(openSubmenu => {
                openSubmenu.classList.remove('show');
            });
        }
    });

</script>