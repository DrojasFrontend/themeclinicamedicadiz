<section class="pt-5 px-18 bg-menu"> 
    <div class="container">
        <div class="row">
            <nav class="col-md-3 col-lg-4 d-none d-md-block">
                <ul class="nav flex-column gap-3" id="tabsMenu" role="tablist">
                    <?php if( have_rows('grupo_politicas') ): ?>
                        <?php $index = 1; ?>
                        <?php while( have_rows('grupo_politicas') ): the_row(); ?>
                            <?php if( have_rows('politicas') ): ?>
                                <?php while( have_rows('politicas') ): the_row(); ?>
                                    <?php
                                        $titulo = get_sub_field('titulo');
                                    ?>
                                    <li class="bg-single-blog-notice br-6 p-3 nav-bg-hover nav-item d-flex align-items-center justify-content-between">
                                        <a class="nav-link <?php echo $index === 1 ? 'active' : ''; ?>" 
                                            id="tab<?php echo $index; ?>" 
                                            data-bs-toggle="pill" 
                                            href="#content<?php echo $index; ?>" 
                                            role="tab">
                                            <?php echo esc_html($titulo); ?>
                                        </a>
                                        <span class="ms-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                                <path d="M15.3998 10.3835L10.8098 5.79348C10.6225 5.60723 10.369 5.50269 10.1048 5.50269C9.84065 5.50269 9.5872 5.60723 9.39983 5.79348C9.3061 5.88644 9.23171 5.99704 9.18094 6.1189C9.13017 6.24076 9.10403 6.37147 9.10403 6.50348C9.10403 6.63549 9.13017 6.7662 9.18094 6.88805C9.23171 7.00991 9.3061 7.12052 9.39983 7.21348L13.9998 11.7935C14.0936 11.8864 14.168 11.997 14.2187 12.1189C14.2695 12.2408 14.2956 12.3715 14.2956 12.5035C14.2956 12.6355 14.2695 12.7662 14.2187 12.8881C14.168 13.0099 14.0936 13.1205 13.9998 13.2135L9.39983 17.7935C9.21153 17.9805 9.10521 18.2346 9.10428 18.4999C9.10334 18.7653 9.20786 19.0202 9.39483 19.2085C9.58181 19.3968 9.83593 19.5031 10.1013 19.504C10.3667 19.505 10.6215 19.4005 10.8098 19.2135L15.3998 14.6235C15.9616 14.061 16.2772 13.2985 16.2772 12.5035C16.2772 11.7085 15.9616 10.946 15.3998 10.3835Z" fill="#1A5091"/>
                                            </svg>
                                        </span>
                                    </li>
                                    <?php $index++; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </nav>
            <main class="col-md-9 col-lg-8">
                <button id="selectPolicyBtn" class="btn custom-btn-nav d-block d-md-none mb-3">Seleccionar política</button>
                <div class="tab-content" id="tabsContent">
                    <?php if( have_rows('grupo_politicas') ): ?>
                        <?php $index = 1; ?>
                        <?php while( have_rows('grupo_politicas') ): the_row(); ?>
                            <?php if( have_rows('politicas') ): ?>
                                <?php while( have_rows('politicas') ): the_row(); ?>
                                    <?php
                                        $titulo = get_sub_field('titulo');
                                        $contenido = get_sub_field('contenido');
                                    ?>
                                    <div class="tab-pane fade <?php echo $index === 1 ? 'show active' : ''; ?>" 
                                            id="content<?php echo $index; ?>" 
                                            role="tabpanel">
                                        <h2><?php echo esc_html($titulo); ?></h2>
                                        <div><?php echo $contenido; ?></div>
                                    </div>
                                    <?php $index++; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>
</section>

<div class="modal fade" id="selectPolicyModal" tabindex="-1" aria-labelledby="selectPolicyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectPolicyModalLabel">Seleccionar política</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav flex-column gap-3" id="modalTabsMenu">
                    <?php if( have_rows('grupo_politicas') ): ?>
                        <?php $index = 1; ?>
                            <?php while( have_rows('grupo_politicas') ): the_row(); ?>
                                <?php if( have_rows('politicas') ): ?>
                                    <?php while( have_rows('politicas') ): the_row(); ?>
                                        <?php
                                            $titulo = get_sub_field('titulo');
                                        ?>
                                        <li class="bg-single-blog-notice br-6 p-3 nav-bg-hover nav-item bg-">
                                            <a class="nav-link fs-16" href="#" data-bs-target="#content<?php echo $index; ?>"><?php echo esc_html($titulo); ?></a>
                                        </li>
                                    <?php $index++; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectPolicyBtn = document.getElementById('selectPolicyBtn');
        const selectPolicyModal = new bootstrap.Modal(document.getElementById('selectPolicyModal'));
        const tabsContent = document.getElementById('tabsContent');
        const modalLinks = document.querySelectorAll('#modalTabsMenu .nav-link');
        const tabLinks = document.querySelectorAll('#tabsMenu .nav-link');
        
        let isMobile = window.innerWidth < 768;

        function showSelectedContent(target) {
            const allTabs = tabsContent.querySelectorAll('.tab-pane');
            allTabs.forEach(tab => {
                tab.classList.remove('show', 'active');
            });

            const selectedTab = document.querySelector(target);
            selectedTab.classList.add('show', 'active');
        }

        selectPolicyBtn.addEventListener('click', function () {
            selectPolicyModal.show();
        });

        modalLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();

                const target = this.getAttribute('data-bs-target');
                showSelectedContent(target);

                selectPolicyModal.hide();

                selectPolicyBtn.classList.remove('d-none');
            });
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                if (isMobile) {
                    const activeTab = document.querySelector('.tab-pane.active');
                    const activeTabLink = document.querySelector(`#tabsMenu a[href="#${activeTab.id}"]`);
                    
                    if (activeTabLink) {
                        activeTabLink.classList.add('active');
                    }
                    
                    activeTab.classList.add('show', 'active');
                }
                isMobile = false;
            } else {
                isMobile = true;
                selectPolicyBtn.classList.remove('d-none');
                const activeTab = document.querySelector('.tab-pane.active');
                if (activeTab) {
                    activeTab.classList.remove('show', 'active');
                }
            }
        });

        if (window.innerWidth >= 768) {
            const firstTab = document.querySelector('.tab-pane');
            firstTab.classList.add('show', 'active');
        }
    });
</script>