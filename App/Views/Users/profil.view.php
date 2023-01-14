<?php
$layout = 'auth';
use App\Models\Location;
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\User $user */


?>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<div style = "height: 30px; background-color: rgb(10, 149, 95);">
<a href="?c=home&a=index" style="color: rgb(0,100,0);"> <i class='far fa-arrow-alt-circle-left' style='font-size:30px'></i></a> 
</div>
<div class="container col-7 mt-4">
    <div class="row">
    <div class="col-3">
    <img src="public/images/avatar.jpg" alt="avatar" style = "height: 200px; width: auto; border: 1px solid black; border-radius: 5px;">
    </div>
    <div class="col-8" style="font-size: 18px; margin-top: 10px;">
        <div><b>Meno:</b> <?= $auth->getLoggedUserName();
                         ?></div>
        <div style="margin-top: 10px;"><b>Priezvisko:</b> <?= $auth->getLoggedUserLastName() ?> </div>
        <div style="margin-top: 10px;"><b>Email: </b>  <?= $_SESSION['user'] ?></div>
        <div style="margin-top: 10px;"><b>Tel. č.: (+421) </b> 
        <?php 
            if ($auth->getLoggedUserTel() != 0)
            {
                echo $auth->getLoggedUserTel();
            }
        ?></div>
        <div style="margin-top: 10px;"><b>Dodacia adresa:</b> 
        <?php 
            if ($auth->getLoggedUserAddress() != null)
            {
                echo $auth->getLoggedUserAddress();
            }
        ?>
    </div>
    </div>
    </div>
    <div class="mt-4">
    <a href="?c=users&a=zmenaHesla" class="btn btn-default">Zmeniť heslo</a>
    <a href="?c=users&a=zmenaAdresy" class="btn btn-default">Zmeniť dodaciu adresu</a>
    </div>
    <?php 
    if (isset($_SESSION['heslo']))
    {
        ?> 
        <div class=" text-danger mt-2"><?= @$data['message'] ?></div>
        <form method="post" action="?c=users&a=potvrdZmenuHesla">
            <div>
            <div class="col-4 mt-2">
                <input name="heslo" type="password" id="heslo" class="form-control" placeholder="heslo" required autofocus>
            </div>
            <div class="col-4 mt-2">
                <input name="heslo2" type="password" id="heslo2" class="form-control" placeholder="heslo znova" required autofocus>
            </div>
            <button class="btn btn-primary mt-2" type="submit" name="submit">Zmeniť</button>
            </div>
        </form>
        <?php
    } elseif (isset($_SESSION['adresa']))
    {   unset($_SESSION['adresa']);
        ?> 
        <div class=" text-danger mt-2"><?= @$data['message'] ?></div>
        <form method="post" action="?c=users&a=potvrdZmenuAdresy">
            <div>
            <div class="col-6 mt-2">
                <input name="adresa" type="text" id="adresa" class="form-control" placeholder="adresa" required autofocus>
            </div>
            <div class="col-6 mt-2">
                <input name="psc" type="text" id="psc" class="form-control" placeholder="PSČ" required autofocus>
            </div>
            <div class="col-6 mt-2">
                <input name="mesto" type="text" id="mesto" class="form-control" placeholder="mesto" required autofocus>
            </div>
            <div class="col-6 mt-2">
                <input name="tel" type="text" id="tel" class="form-control" placeholder="tel. č." required autofocus>
            </div>
            <button class="btn btn-primary mt-2" type="submit" name="submit">Zmeniť</button>
            </div>
        </form>
        <?php
    }
    ?>
</div>

