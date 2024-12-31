<?php
    $nombre = isset($_GET['nombre']) ? sanitize_text_field($_GET['nombre']) : 'Postulante';
    $vacante = isset($_GET['vacante']) ? sanitize_text_field($_GET['vacante']) : 'Vacante';
?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <img src="http://medicadiz.local/wp-content/uploads/Outline-2.png" />
                <h2 class="my-4">Muchas gracias, <?php echo $nombre; ?></h2>
                <p>Agradecemos tu interés en formar parte de la familia Medicadiz y tomarte el tiempo de postularte a la vacante: <strong class="fw-bold"><?php echo $vacante; ?></strong></p>
                <p class="mt-2">Nuestro equipo de selección revisará tu perfil cuidadosamente. Estaremos en contacto contigo para los siguientes pasos del proceso de selección.</p>
                <div class="d-flex gap-4 justify-content-center mt-5">
                    <a href="/trabaja-con-nosotros" class="btn custom-btn-blue">Ver más vacantes</a>
                    <a href="/" class="btn custom-btn">Ir al inicio</a>
                </div>
            </div>
        </div>
    </div>
</section>