<!-- Feature Section Begin -->
<section class="feature-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2> Detalle del libro <?= $libro->getTitulo() ?></h2>
                </div>
            </div>
        </div>
        <div class="row" style="margin: auto">
                    <div class="col-md-6">
                        <img src="<?= strlen($libro->getFoto()) > 0 ? '/' . $libro->getPathFeature() : '/img/feature/sincasa.png' ?>" width="100%; margin-left: 60px">
                    </div>

                    <div class="col-md-6">
                        <div class="fi-text">
                            <div class="inside-text">
                                <p style="margin: 20px">Precio: <?= $libro->getPrecio() ?> €</p>
                                <p style="margin: 20px">Editorial: <?= $libro->getEditorialAsociada()->getNombre()?></p>
                                <p style="margin: 20px">Autor: <?= $libro-> getAutor()?></p>
                                <p style="margin: 20px">Propietario: <?= $libro-> getUsuarioAsociado()->getUsername()?></p>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" onclick="window.location='/libreria-editar/<?php echo $libro->getId();?>' ">Ir a editar</button>
                                </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>
</section>
<!-- Feature Section End -->

