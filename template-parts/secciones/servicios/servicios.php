<section class="bg-blueService">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <input type="text" name="search" id="searchInput" class="form-control" placeholder="Ingresa el servicio que buscas" onkeyup="filterSpecialties()">
            </div>
            <div class="col-md-4">
                <select name="order" class="form-select" onchange="this.form.submit()">
                    <option value="asc" <?php echo (isset($_GET['order']) && $_GET['order'] === 'asc') ? 'selected' : ''; ?>>Ordenar por</option>
                </select>
            </div>
        </div>
    </div>
</section>

<section class="bg-menu">
    <div class="container py-5">
        <div class="row" id="specialtiesContainer">
            
        </div>
        <nav class="mt-4">
            <ul class="pagination justify-content-center" id="pagination">
                
            </ul>
        </nav>
    </div>
</section>

<script>
    let specialties = [];
    let filteredSpecialties = [];
    const itemsPerPage = 12;
    let currentPage = 1;

    function renderSpecialties() {
        const container = document.getElementById('specialtiesContainer');
        container.innerHTML = '';

        if (filteredSpecialties.length === 0) {
            container.innerHTML = `
                <div class="col-12 text-center">
                    <p>No hay resultados que coincidan con tu búsqueda.</p>
                </div>
            `;
            return;
        }

        const start = (currentPage - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const pageItems = filteredSpecialties.slice(start, end);

        pageItems.forEach(specialty => {
        container.innerHTML += `
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100 border-0">
                    <img src="${specialty.image}" class="card-img-top" alt="${specialty.title}">
                    <div class="py-4 px-3 d-flex flex-column flex-fill">
                        <h5 class="card-title flex-fill">${specialty.title}</h5>
                        <div class="d-flex align-items-center">
                            <a href="${specialty.link}" class="btn-transparent fw-bold p-0 nav-underline">Conoce más</a>
                            <span class="ms-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path d="M15.3998 10.3835L10.8098 5.79348C10.6225 5.60723 10.369 5.50269 10.1048 5.50269C9.84065 5.50269 9.5872 5.60723 9.39983 5.79348C9.3061 5.88644 9.23171 5.99704 9.18094 6.1189C9.13017 6.24076 9.10403 6.37147 9.10403 6.50348C9.10403 6.63549 9.13017 6.7662 9.18094 6.88805C9.23171 7.00991 9.3061 7.12052 9.39983 7.21348L13.9998 11.7935C14.0936 11.8864 14.168 11.997 14.2187 12.1189C14.2695 12.2408 14.2956 12.3715 14.2956 12.5035C14.2956 12.6355 14.2695 12.7662 14.2187 12.8881C14.168 13.0099 14.0936 13.1205 13.9998 13.2135L9.39983 17.7935C9.21153 17.9805 9.10521 18.2346 9.10428 18.4999C9.10334 18.7653 9.20786 19.0202 9.39483 19.2085C9.58181 19.3968 9.83593 19.5031 10.1013 19.504C10.3667 19.505 10.6215 19.4005 10.8098 19.2135L15.3998 14.6235C15.9616 14.061 16.2772 13.2985 16.2772 12.5035C16.2772 11.7085 15.9616 10.946 15.3998 10.3835Z" fill="#1A5091"/>
                            </svg></span>
                        </div>
                    </div>
                </div>
            </div>
        `;
        });

        renderPagination();
    }

    function renderPagination() {
        const totalPages = Math.ceil(filteredSpecialties.length / itemsPerPage);
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';

        if (currentPage > 1) {
            pagination.innerHTML += `
                <li class="page-item">
                    <button class="pagination-arrows" onclick="goToPage(${currentPage - 1})">
                        <img src="/wp-content/uploads/BTTN-SLIDER.svg" />
                    </button>
                </li>
            `;
        }

        const maxVisiblePages = 5;
        let startPage = Math.max(1, currentPage - 2);
        let endPage = Math.min(totalPages, currentPage + 2);

        if (startPage > 1) {
            pagination.innerHTML += `
                <li>
                    <a class="page-link" href="#" onclick="goToPage(1)">1</a>
                </li>
            `;
            if (startPage > 2) {
                pagination.innerHTML += `
                    <li class="page-item disabled">
                        <span class="page-link">-</span>
                    </li>
                `;
            }
        }

        for (let i = startPage; i <= endPage; i++) {
            pagination.innerHTML += `
                <li class="page-item ${i === currentPage ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="goToPage(${i})">${i}</a>
                </li>
            `;
        }

        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                pagination.innerHTML += `
                    <li class="page-item disabled">
                        <span class="page-link">-</span>
                    </li>
                `;
            }
            pagination.innerHTML += `
                <li class="page-item">
                    <a class="page-link" href="#" onclick="goToPage(${totalPages})">${totalPages}</a>
                </li>
            `;
        }

        if (currentPage < totalPages) {
            pagination.innerHTML += `
                <li class="page-item">
                    <button class="pagination-arrows" onclick="goToPage(${currentPage + 1})">
                        <img src="/wp-content/uploads/BTTN-SLIDER-1.svg" />
                    </button>
                </li>
            `;
        }
    }

    function goToPage(page) {
        currentPage = page;
        renderSpecialties();
    }

    function filterSpecialties() {
        const query = document.getElementById('searchInput').value.toLowerCase();
        filteredSpecialties = specialties.filter(specialty => specialty.title.toLowerCase().includes(query));
        currentPage = 1;
        renderSpecialties();
    }

    document.addEventListener('DOMContentLoaded', () => {
        specialties = <?php echo json_encode(get_servicios_data()); ?>;
        filteredSpecialties = specialties;
        renderSpecialties();
    });
</script>