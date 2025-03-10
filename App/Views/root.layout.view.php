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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/styleKartonaz.css">
    <link rel="stylesheet" href="public/css/styleKontakt.css">
    <link rel="stylesheet" href="public/css/stylePrenajom.css">
    <link rel="stylesheet" href="public/css/styleZ.css">
   
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <div style = "background-color: rgb(10, 149, 95); color: white; height: 37px;">
    <?php if ($auth->isLogged()) { ?>

      <div class="dropdown d-flex flex-column align-items-end">
        <button class="btn text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Prihlaseny používateľ: <?= $auth->getLoggedUserName() ?>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="?c=users&a=profil">Profil</a></li>
          <li><a class="dropdown-item" href="?c=auth&a=logout">Odhlásenie</a></li>
        </ul>
      </div>       
        <?php } else { ?>
        <div class="dropdown d-flex flex-column align-items-end">
          <button class="btn text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          používateľ
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= \App\Config\Configuration::LOGIN_URL ?>">Prihlásenie</a>
            <li><a class="dropdown-item" href="?c=auth&a=registr">Registracia</a>
          </ul>
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

