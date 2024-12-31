<?php
    $name = isset($_GET['your-name']) ? htmlspecialchars($_GET['your-name']) : 'Usuario';
    $request = isset($_GET['amp;tipo-de-solicitud']) ? htmlspecialchars($_GET['amp;tipo-de-solicitud']) : 'solicitud';
?>

<section class="bg-menu py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <img src="http://medicadiz.local/wp-content/uploads/Outline-2.png" />
                <h2 class="my-4"><?php echo $name; ?>, hemos recibido tu comentario</h2>
                <p>Gracias por compartir tu <strong class="fw-bold"><?php echo $request; ?></strong> con nosotros. Valoramos tu tiempo y revisaremos tu mensaje para darte una respuesta lo más pronto posible.</p>
                <a href="/" class="btn custom-btn mt-4">Ir al inicio</a>
            </div>
        </div>
    </div>
</section>