<div id="contact">
    <div class="container">
        <div style="margin: auto; margin-top: 40px"  class="col-xs-12 col-sm-8 col-sm-push-2">
            <h2>LOGIN</h2>
            <hr>
            <form class="form-horizontal" action="/login" method="post">
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
                    <div class="col-xs-6">
                        <label for="username" class="label-control">Username</label>
                        <input class="form-control" name="username" id="username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="password" class="label-control">Password</label>
                        <input class="form-control" type="password" name="password" id="password">
                        <button style="margin-top: 20px" type="submit" class="site-btn">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>