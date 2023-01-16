<?php

use App\Models\Location;

/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Post $formular */

$loc = Location::getAll('id_user = ?', [$auth->getLoggedUserId()]);

if ($loc != null)
{

?>
<div id="objInfo"></div>
<div class = "container objednavkyForm">
<form method="post" action="?c=orders&a=objednat">
    <div class = "offset-1"> 
        <h2 style = "margin-bottom: 3%;">Nová objednávka </h2>
        <div class="form-group row">
            <label for="menoAPriezvisko" class="col-sm-4 col-form-label">Meno a priezvisko</label>
            <label for="menoAPriezvisko" class="col-sm-4 col-form-label">Tel. číslo</label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="menoapriezvisko" class="col-sm-4 form-control"><?php echo $auth->getLoggedUserName()," ",$auth->getLoggedUserLastName(); ?></label>
            </div> 
            <div class="col-sm-4">
                <label for="menoapriezvisko" class="col-sm-4 form-control">(+421) <?php echo $auth->getLoggedUserTel(); ?></label>
            </div>
        </div>
        <div class="form-group " style = "margin-top: 15px;">
            <label for="staticEmail" class="col-sm-8 col-form-label">Email</label>
            <div class="col-sm-8">
                <label for="email" class="col-sm-8 form-control"><?php echo $_SESSION['user']; ?></label>
            </div>
        </div>
        <div class="form-group" style = "margin-top: 15px;">
            <label for="menoAPriezvisko" class="col-sm-2 col-form-label">Dodacia adresa</label>
            <div class="col-sm-8">
                <label for="menoapriezvisko" class="col-sm-4 form-control"><?php echo $auth->getLoggedUserAddress(); ?></label>
            </div>
        </div>
        <div class="form-check" style = "margin-top: 15px;">
            <input class="form-check-input" type="radio" name="vyberKrabice" id="radios" value="1" checked>
            <label class="form-check-label" for="inlineCheckbox1">Krabica veka a dno</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="vyberKrabice" id="radios" value="2">
            <label class="form-check-label" for="inlineCheckbox2">Krabica zaklápacia</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="vyberKrabice" id="radios" value="3">
            <label class="form-check-label" for="inlineCheckbox3">Krabica s rúčkou na koláče</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="vyberKrabice" id="radios" value="4">
            <label class="form-check-label" for="inlineCheckbox3">Krabica zaklápacia na tortu</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="vyberKrabice" id="radios" value="5">
            <label class="form-check-label" for="inlineCheckbox3">Krabica zaklápacia na pizzu</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="vyberKrabice" id="radios" value="6">
            <label class="form-check-label" for="inlineCheckbox3">Krabica platónka/dno</label>
        </div>
        <div class="form-group row" style = "margin-top: 15px;">
            <div class="col-sm-5">
                <label for="zadajte" class="col-sm-5 form-check-label">Zadajte počet kusov</label>
            </div> 
            <div class="col-sm-3">
                <select class="form-control mr-sm-2" name="kusy" id="kusy">
                <option selected>1</option>
                <?php 
                for ($i = 2; $i <= 30; $i++) {
                 ?>
                <option value="<?= $i ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
            </div>
        </div>
        <input class="btn btn-primary " id="submitObjednavka" type="submit" style = "margin-top: 60px;" name="objedn" value="Potvrdiť objednávku"/>
    </div>
</form>
</div>


<?php } else {
    ?> 
    <h3 style = "color: red; margin-top: 30px;">Predtým ako si môžte objednať niektorý z našich produktov, si musíte vypniť informácie o dodacej adrese v profile!</h3>
    <div style="height: 50vh;"> </div>
    <?php
} ?>

<footer style = "margin-top: 10%;">
    <div class = "container" >
        <ul>
            <li>Združená výrobné družstvo</li>
            <li>Zimná 94</li>
            <li>052 01 Spišská Nová Ves</li>
            <li>Informácie: (+421) 53/44 240 71</li>
            <li>E-mail: zdruzena@zdruzena.sk</li>
        </ul>
        <!--<a href="https://www.facebook.com/" target="_blank"><img src="img/Facebook-logo.png" alt="logoFB"></a>-->
    </div>
    <div class="copyright">Združena <i class="fa fa-copyright"> 2022</i></div>
  </footer>