<?php
$layout = 'auth';
/** @var Array $data */

?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Registracia</h5>
                    <div class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-signin" method="post" action="?c=auth&a=registr">
                        <div class="form-label-group mb-3">
                            <input name="login" type="text" id="login" class="form-control" placeholder="meno"
                                   required autofocus>
                        </div>
                        <div class="form-label-group mb-3">
                            <input name="lastName" type="text" id="lastName" class="form-control" placeholder="priezvisko"
                                   required autofocus>
                        </div>
                        <div class="form-label-group mb-3">
                            <input name="email" type="email" id="email" class="form-control"
                                   placeholder="email" required>
                        </div>
                        <div class="form-label-group mb-3">
                            <input name="password" type="password" id="password" class="form-control"
                                   placeholder="heslo" required>
                        </div>
                        <div class="form-label-group mb-3">
                            <input name="password2" type="password" id="password2" class="form-control"
                                   placeholder="heslo znova" required>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" name="submit">Registrovat
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>