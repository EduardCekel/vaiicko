<?php $layout = 'auth' ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5">
            Odhlásili ste sa. <br>
            Znovu <a href="<?= \App\Config\Configuration::LOGIN_URL ?>">prihlásiť</a> alebo vrátiť sa <a href="?c=home">späť</a> na hlavnú stránku?
        </div>
    </div>
</div>

<p> <?php
$premenna = password_hash("agagag", PASSWORD_DEFAULT);
echo $premenna; ?> </p>
<p> <?php echo password_verify("adadad", $premenna); // vypise mi to true, ak sa helsa zhoduje ?> </p> 
