<?php
$layout = 'auth';
/** @var Array $data */

?>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<a href="?c=home&a=index" style="color: rgb(0,100,0);"> <i class='far fa-arrow-alt-circle-left' style='font-size:30px'></i></a> 

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Registracia</h5>
                    <div class="text-center text-danger mb-3" id = "vypisReg">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-signin" method="post" action="?c=auth&a=registr">
                        <div class="form-label-group mb-3">
                            <input name="login" type="text" id="loginReg" class="form-control" placeholder="meno"
                                   required autofocus>
                        </div>
                        <div class="form-label-group mb-3">
                            <input name="lastName" type="text" id="lastNameReg" class="form-control" placeholder="priezvisko"
                                   required >
                        </div>
                        <div class="form-label-group mb-3">
                            <div id = "regEmail"></div>
                            <input name="email" type="email" id="emailReg" class="form-control"
                                   placeholder="email" required>
                        </div>
                        <div class="form-label-group mb-3">
                            <input name="password" type="password" id="passwordReg1" class="form-control"
                                   placeholder="heslo" required>
                        </div>
                        <div class="form-label-group mb-3">
                            <input name="password2" type="password" id="passwordReg2" class="form-control"
                                   placeholder="heslo znova" required>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" name="submit" id="buttonReg" disabled>Registrovat
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="public/js/registration.js"></script>