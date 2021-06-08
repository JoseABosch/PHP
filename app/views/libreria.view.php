    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Insertar libro</h2>
                        </br>
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
                        <div class="breadcrumb-option">
                        <form class="form-horizontal"  action="libreria" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="precio">Precio</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Titulo">Título</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input class="text-center" type="number" min="0" class="form-control" name="precio" ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input class="text-center" type="number" min="1" class="form-control" name="titulo">
                                </div>
                            </div>
                            </br>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="autor">Autor</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input class="text-center" type="number" min="0" class="form-control" name="autor">
                                </div>
                            </div>
                            </br>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div style="width: 350px; margin: auto;">
                                        <select name="editorial">
                                            <?php use JOSE\core\App;

                                            foreach ($editoriales as $editorial) : ?>
                                                <option value="<?= $editorial->getId() ?>"><?= $editorial->getNombre() ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            </br>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div style="width: 350px; margin: auto;">
                                        <input style="border-color: grey" class="form-control" type="file" name="imagen" id="imagen">
                                    </div>

                                </div>
                            </div>
                            </br>
                            <input  type="submit" class="btn btn-primary" value="add">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section Begin -->
<div>
    <table class="table" style="margin: auto; width: 60%" >
        <tr>
            <th>Imagen</th>
            <th>Provincia</th>
            <th>Precio</th>
            <?php if(App::get('user')->getRole() === "ROLE_ADMIN") : ?>
                <th>Usuario</th>
            <?php endif; ?>

        </tr>
        <?php foreach($libros as $libro) : ?>
            <tr>
                <td><img width="100" src="<?= strlen($libro->getFoto()) > 0 ? $libro->getPathFeature() : '/img/feature/sinlibro.png' ?>" alt="<?= $libro->getTitulo() ?>"></td>
                <td><?= $libro->getAutor()?></td>
                <td><?= $libro->getPrecio()?> €</td>
                <?php if(App::get('user')->getRole() === "ROLE_ADMIN") : ?>
                    <td><?= $libro->getUsuarioAsociado()->getUsername() ?></td>
                <?php endif; ?>
                <td>
                    <a href="/libreria/<?= $libro->getId() ?>" title="Ver detalle" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                    <a href="/libreria/<?= $libro->getId() ?>" title="Eliminar libro" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php ;endforeach ?>
    </table>
</div>
    <!-- Blog Section Begin -->
    <section class="blog-section blog-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-item">
                        <div class="sb-pic">
                            <img src="img/blog/latest-1.jpg" alt="">
                        </div>
                        <div class="sb-text">
                            <ul>
                                <li><i class="fa fa-user"></i> Adam Smith</li>
                                <li><i class="fa fa-clock-o"></i> 18th Jan, 2019</li>
                            </ul>
                            <h4><a href="blog-details.php">Enhance Your Brand Potential With Giant.</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-item">
                        <div class="sb-pic">
                            <img src="img/blog/latest-2.jpg" alt="">
                        </div>
                        <div class="sb-text">
                            <ul>
                                <li><i class="fa fa-user"></i> Adam Smith</li>
                                <li><i class="fa fa-clock-o"></i> 18th Jan, 2019</li>
                            </ul>
                            <h4><a href="blog-details.php">Illustration In Marketing Materials</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-item">
                        <div class="sb-pic">
                            <img src="img/blog/latest-3.jpg" alt="">
                        </div>
                        <div class="sb-text">
                            <ul>
                                <li><i class="fa fa-user"></i> Adam Smith</li>
                                <li><i class="fa fa-clock-o"></i> 22th Jan, 2019</li>
                            </ul>
                            <h4><a href="blog-details.php">Branding Do You Know Who You Are</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-item">
                        <div class="sb-pic">
                            <img src="img/blog/latest-4.jpg" alt="">
                        </div>
                        <div class="sb-text">
                            <ul>
                                <li><i class="fa fa-user"></i> Adam Smith</li>
                                <li><i class="fa fa-clock-o"></i> 24th Jan, 2019</li>
                            </ul>
                            <h4><a href="blog-details.php">Looking For Your Dvd Printing Solution</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-item">
                        <div class="sb-pic">
                            <img src="img/blog/latest-5.jpg" alt="">
                        </div>
                        <div class="sb-text">
                            <ul>
                                <li><i class="fa fa-user"></i> Adam Smith</li>
                                <li><i class="fa fa-clock-o"></i> 29th Jan, 2019</li>
                            </ul>
                            <h4><a href="blog-details.php">How To Set Intentions That Energize You</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-item">
                        <div class="sb-pic">
                            <img src="img/blog/latest-6.jpg" alt="">
                        </div>
                        <div class="sb-text">
                            <ul>
                                <li><i class="fa fa-user"></i> Adam Smith</li>
                                <li><i class="fa fa-clock-o"></i> 30th Jan, 2019</li>
                            </ul>
                            <h4><a href="blog-details.php">Do Your Self Realizations Quickly Fade</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-item">
                        <div class="sb-pic">
                            <img src="img/blog/latest-3.jpg" alt="">
                        </div>
                        <div class="sb-text">
                            <ul>
                                <li><i class="fa fa-user"></i> Adam Smith</li>
                                <li><i class="fa fa-clock-o"></i> 02th Feb, 2019</li>
                            </ul>
                            <h4><a href="blog-details.php">Motivation How To Build Trust At Work</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-item">
                        <div class="sb-pic">
                            <img src="img/blog/latest-7.jpg" alt="">
                        </div>
                        <div class="sb-text">
                            <ul>
                                <li><i class="fa fa-user"></i> Adam Smith</li>
                                <li><i class="fa fa-clock-o"></i> 09th Feb, 2019</li>
                            </ul>
                            <h4><a href="blog-details.php">Not All Blank Cassettes Are Created Equal</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-item">
                        <div class="sb-pic">
                            <img src="img/blog/latest-8.jpg" alt="">
                        </div>
                        <div class="sb-text">
                            <ul>
                                <li><i class="fa fa-user"></i> Adam Smith</li>
                                <li><i class="fa fa-clock-o"></i> 12th Feb, 2019</li>
                            </ul>
                            <h4><a href="blog-details.php">The Small Change That Creates Massive Results</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="loadmore">
                        <a href="#" class="primary-btn">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
<script type="text/javascript" src="/js/libros.js"></script>

