   <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section contact-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb-option">
                            <a href="#"><i class="fa fa-home"></i> Home</a>
                            <span>Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section Begin -->

    <!-- Contact Section Begin -->
    <section class="contact-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2942.5524090066037!2d-71.10245469994108!3d42.47980730490846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e3748250c43a43%3A0xe1b9879a5e9b6657!2sWinter%20Street%20Public%20Parking%20Lot!5e0!3m2!1sen!2sbd!4v1577299251173!5m2!1sen!2sbd"
                            height="700" style="border:0;" allowfullscreen=""></iframe>
                        <div class="map-inside">
                            <i class="icon_pin"></i>
                            <div class="inside-widget">
                                <h4>New York</h4>
                                <ul>
                                    <li>Phone: +12-345-6789</li>
                                    <li>Add: 16 Creek Ave. Farmingdale, NY</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-7 offset-lg-1">
                            <div class="contact-text">
                                <div class="section-title">
                                    <span>Contacto</span>
                                    <h2>Envíe su mensaje</h2>
                                </div>
                                <form class="contact-form" action="http://dwes.local/contact" method="post">
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
