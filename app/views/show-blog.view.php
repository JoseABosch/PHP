<!-- Feature Section Begin -->
<section class="feature-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Listing From Our Agents</span>
                    <h2>Libro num <?= $libro->getId() ?></h2>
                </div>
            </div>
        </div>
        <div class="row" style="margin: auto">
                    <div class="col-md-6">
                        <img src="<?= strlen($libro->getFoto()) > 0 ? '/' . $libro->getPathFeature() : '/img/feature/sinlibro.png' ?>" width="100%; margin-left: 60px">
                    </div>

                    <div class="col-md-6">
                        <div class="fi-text">
                            <div class="inside-text">
                                <h3 style="margin: 20px"><?= $libro->getPrecio() ?> €</h3>
                                <h4 style="margin: 20px"><?= $libro->getEditorialAsociada()->getNombre(). ' en ' .$libro->getProvincia() ?></h4>

                            </div>
                            <ul class="room-features">
                                <li>
                                    <p>Título: <?= $libro-> getTitulo()?></p>
                                </li>
                                <li>
                                    <p>Autor: <?= $libro-> getAutor()?> </p>
                                </li>
                            </ul>
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

