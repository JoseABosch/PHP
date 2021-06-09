    <!-- Contact Section Begin -->
    <section class="contact-section">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">
                    <div class="row align-content-center">
                        <div class="col-lg-7 offset-lg-1">
                            <div class="contact-text">
                                <div class="section-title">
                                    <span>Contacto</span>
                                    <h2>Envíe su mensaje</h2>
                                </div>
                                <form class="contact-form" action="/contact" method="post">
                                    <?php if(!empty($errores) || strlen($nuevo) > 0):?>
                                    <div class="alert alert-<?=empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">x</span>
                                        </button>

                                        <?php if(empty($errores)) : ?>
                                        <?php if(strlen($nuevo) > 0):?>
                                            <?php echo $nuevo;?>
                                        <?php endif;?>
                                        <?php else : ?>
                                            <ul>
                                                <?php foreach ($errores as $error) : ?>
                                                    <li><?= $error ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif;?>
                                    <div style="margin-bottom: 50px">
                                        <select name="nombre">
                                            <?php foreach ($usuarios as $usuario) : ?>
                                                <option value="<?= $usuario->getUsername() ?>">Para: <?= $usuario->getUsername() ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <br><br><br>
                                    <input type="text" placeholder="Last name" name="apellidos" value="<?= $apellidos ?>">
                                    <input type="text" placeholder="Email" name="email" value="<?= $email ?>">
                                    <input type="text" placeholder="Subject" name="asunto" value="<?= $asunto ?>">
                                    <textarea placeholder="Message" name="texto"><?= $texto ?></textarea>
                                    <button type="submit" class="site-btn">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
