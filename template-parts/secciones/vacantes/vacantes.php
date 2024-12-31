<?php

if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="bg-menu py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid mb-4">
                        </div>
                        <div class="col-lg-6">
                            <h4 class="mb-3"><?php the_title(); ?></h4>
                            <p class="fw-bold mb-3">Requisitos</p>
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>
                    <div class="text-center mb-5">
                        <h2 class="mt-5">Envíanos tu hoja de vida</h2>
                        <p class="mt-3">Completa el formulario y envíanos tu solicitud. Pronto estaremos en contacto contigo.</p>
                    </div>
                </div>
                <div class="col-lg-6 mx-auto">
                    <!-- Formulario -->
                    <form class="row" id="vacante-form" method="post" enctype="multipart/form-data" action="<?php echo admin_url('admin-post.php'); ?>">
                        <h6 class="mb-3">Datos personales</h6>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="apellido" id="apellido" placeholder="Apellidos" class="form-control" required>
                        </div>
                        <h6 class="mb-3">Datos de contacto</h6>
                        <div class="col-md-6 mb-3">
                            <input type="email" name="email" id="email" placeholder="Correo electrónico" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="tel" name="telefono" id="telefono" placeholder="Número de contacto" class="form-control" required>
                        </div>
                        <h6 class="mb-3">Hoja de vida</h6>
                        <div class="col-12 mb-3">
                            <input type="file" name="cv" id="cv" class="form-control" accept=".pdf" required>
                        </div>
                        <div class="d-flex gap-1 align-items-center mb-3">
                            <input class="form-check-input" type="checkbox" id="terminos" name="terminos" required>
                            <label class="form-check-label custom-font-size" for="terminos">
                                Acepto <a href="/terminos-y-condiciones" target="_blank">Términos y condiciones</a> y <a href="/politica-de-privacidad" target="_blank">Política de tratamiento y protección de datos personales</a>.
                            </label>
                        </div>
                        <input type="hidden" name="action" value="enviar_vacante">
                        <input type="hidden" name="vacante_titulo" value="<?php the_title(); ?>">
                        <div class="d-flex gap-5 mt-3">
                            <a href="/trabaja-con-nosotros" class="btn custom-btn-blue">Volver</a>
                            <button type="submit" class="btn custom-btn">Enviar aplicación</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; endif;