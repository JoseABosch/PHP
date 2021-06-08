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
        <form action="/libreria-update" method="post" enctype="multipart/form-data">
        <div class="row" style="margin: auto">

            <div class="col-md-6">
                <img src="<?= strlen($libro->getFoto()) > 0 ? '/' . $libro->getPathFeature() : '/img/feature/sinlibro.png' ?>" width="100%; margin-left: 60px">
            </div>

            <div class="col-md-6">
                <div class="fi-text">

                    <?php if(!empty($errores)):?>
                        <div class="alert alert-<?=empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>

                            <ul>
                                <?php foreach ($errores as $error) : ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif;?>

                    <div class="form-group">
                    <label>
                        Precio:
                    </label>
                    <input class="text-center" type="number" min="0"  value="<?php echo $libro->getPrecio();?>" class="form-control" name="precio">
                    </div>
                    <div class="form-group">
                        <label>
                            Título:
                        </label>
                        <textarea name="titulo" class="form-control"><?php echo $libro->getTitulo();?></textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            Autor:
                        </label>
                        <input class="text-center" type="number" min="0"  value="<?php echo $libro->getAutor();?>" class="form-control" name="autor">
                    </div>


                    <input class="text-center" style="display: none;visibility: hidden;" type="text" min="0"  value="<?php echo $libro->getId();?>" class="form-control" name="id">
                    <div class="row" style="width: 100%;">
                        <div class="col-md-12">
                            <input  type="submit" class="btn btn-primary" value="Editar">
                        </div>

                </div>
            </div>
        </div>
    </div>
            </form>
    </div>
</section>
<!-- Feature Section End -->

