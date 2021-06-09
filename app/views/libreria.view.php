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
                        <form class="form-horizontal"  action="/libreria" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="precio">Precio</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input class="text-center" type="number" min="0" class="form-control" name="precio" ">
                                </div>
                            </div>
                            </br>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="editorial">Editorial</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="titulo">Título</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div style="width: 350px; margin: auto;">
                                        <select name="editorial">
                                            <?php use DWES\core\app;

                                            foreach ($editoriales as $editorial) : ?>
                                                <option value="<?= $editorial->getId() ?>"><?= $editorial->getNombre() ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group col-md-6">
                                    <input class="text-center" type="text" min="1" class="form-control" name="titulo">
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
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Autor</label>
                                <input type="text" class="form-control" name="autor">
                            </div>
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
            <th>Título</th>
            <th>Precio</th>
            <?php if(App::get('user')->getRole() === "ROLE_ADMIN") : ?>
                <th>Usuario</th>
            <?php endif; ?>

        </tr>
        <?php foreach($libros as $libro) : ?>
            <tr>
                <td><img width="100" src="<?= strlen($libro->getFoto()) > 0 ? $libro->getPathFeature() : '/img/feature/sincasa.png' ?>" alt="<?= $libro->getAutor() ?>"></td>
                <td><?= $libro->getTitulo()?></td>
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

<script type="text/javascript" src="/js/casas.js"></script>

