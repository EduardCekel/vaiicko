<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/styleKartonaz.css">
    <link rel="stylesheet" href="public/css/styleKontakt.css">
    <link rel="stylesheet" href="public/css/stylePrenajom.css">
    <link rel="stylesheet" href="public/css/styleZ.css">
   
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <div style = "background-color: rgb(10, 149, 95); color: white; height: 25px;">
    <?php if ($auth->isLogged()) { ?>
        <div class="row" style="margin-left: 10px;">
          <div class = "col-2">
             Prihlaseny používateľ: <?= $auth->getLoggedUserName() ?>
          </div>
          <div class = "col-1 offset-8">
            <a class="nav-link" href="?c=users&a=profil">Profil</a>
          </div>
          <div class = "col-1">
            <a class="nav-link" href="?c=auth&a=logout">Odhlásenie</a>
          </div>
        </div>
        <?php } else { ?>
          <div class="row ">
            <div class="col-1 offset-10">
              <a class="nav-link" href="<?= \App\Config\Configuration::LOGIN_URL ?>">Prihlásenie</a>
            </div>
            <div class="col-1">
              <a class="nav-link" href="?c=auth&a=registr">Registracia</a>
            </div>
          </div>
        <?php } ?>
    </div>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="?c=home">
    <img src="public/images/zdruzena-logo.png" style = "height: 50px; width: auto;" title="<?= \App\Config\Configuration::APP_NAME ?>">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item me-4">
          <a class="nav-link" href="?c=home&a=kartonaz">Kartonáž</a>
        </li>
        <li class="nav-item me-4">
          <a class="nav-link" href="?c=home&a=prenajom">Prenájom</a>
        </li>
        <li class="nav-item me-4">
          <a class="nav-link" href="?c=home&a=zoszp">Zamestnávanie občanov so ZP</a>
        </li>
        <li class="nav-item me-4">
          <a class="nav-link" href="?c=posts&a=index">Recenzie od zákazníkov</a>
        </li>
        <?php if ($auth->isLogged() && $auth->isLoggedAdmin()) { ?>
        <li class="nav-item me-4">
          <a class="nav-link" href="?c=users&a=index">Pouzivatelia</a>
        </li>
        <li class="nav-item me-4">
          <a class="nav-link" href="?c=orders&a=admin">Objednavky</a>
        </li>
        <?php } elseif ($auth->isLogged())
        {
          ?>
        <li class="nav-item me-4">
          <a class="nav-link" href="?c=orders&a=index">Objednat</a>
        </li>
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
<div class="">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>
</body>
</html>

