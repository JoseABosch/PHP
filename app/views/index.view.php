    <!-- Feature Section Begin -->
    <section class="feature-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Últimas novedades</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="feature-carousel owl-carousel">
                    <?php use DWES\core\App; ?>
                    <?php foreach($libros as $libro) : ?>
                        <div class="col-lg-4">
                            <div class="feature-item">
                                <div class="fi-pic set-bg" data-setbg="<?= strlen($libro->getFoto()) > 0 ? '/' . $libro->getPathFeature() : '/img/feature/sincasa.png' ?>">
                                    <div class="pic-tag">
                                        <div class="s-text"><?= $libro->getEditorialAsociada()->getNombre();?></div>
                                    </div>
                                </div>
                                <div class="fi-text">
                                    <div class="inside-text">
                                        <h4><?= $libro->getTitulo() ?></h4>
                                        <ul>
                                            <li><i class="fa fa-info-circle"></i> <?= $libro -> getAutor() ?></li>
                                        </ul>
                                        <h5 class="price"><?= $libro-> getPrecio() ?> €</h5>
                                        <hr>
                                        <h7 style= "color: #2cbdb8;" class="price"><i class="fa fa-user-o"></i> <?= $libro->getUsuarioAsociado()->getUsername();?></h7>
                                        <?php if(App::get('user') !== null && (App::get('user') ->getId() !== $libro->getUsuario())) :?>
                                        <form class="form-horizontal"  action="" method="post">
                                            <input id="prodId" name="idLibro" type="hidden" value=<?= $libro-> getId() ?>>
                                            <input style="margin-top: 10px"  type="submit" class="btn btn-danger" value="Comprar">
                                        </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php ;endforeach ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Section End -->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        function  Buscar()
        {
            let numHabitaciones = document.getElementById("numero_habitaciones").value;
            let precio = document.getElementById("priceRange").value;
            precio = precio.replace("[","").replace("]","").replace("$","");
            let precios = precio.split("-");

            if(numHabitaciones.length == 0)  numHabitaciones =  "0";
            window.location='/buscar/' + numHabitaciones + '/' +  precios[0] +'/' + precios[1];
        }
    </script>