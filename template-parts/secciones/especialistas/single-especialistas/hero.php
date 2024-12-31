<?php
    $genero = get_field('genero');
?>

<section class="bg-blueDark py-5">
    <div class="container text-white m-negative-120 m-negative-0 m-negative-lg-120">
        <div class="row flex-column-reverse flex-md-row">
            <div class="col-md-3">
                <figure class="bg-white">
                    <?php 
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('large', ['class' => 'img-fluid d-block m-auto rounded', 'alt' => get_the_title()]);
                        }
                    ?>
                </figure>
            </div>
            <div class="col-md-9">
                <h2 class="my-4">
                    <?php 
                        if ($genero === 'hombre') {
                            echo 'Dr. ';
                        } elseif ($genero === 'mujer') {
                            echo 'Dra. ';
                        }
                        the_title();
                    ?>
                </h2>
            </div>
        </div>
    </div>
</section>