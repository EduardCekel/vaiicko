<?php

use App\Models\User;

/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Post $formular */

?>
<div class = "uvodKontakt">
    <div class="container">
    <h1>Recenzie od zákazníkov</h1>
      <hr>
    </div>
</div> 
<?php 

  foreach ($data['data'] as $formular)
  { 
    if (isset($_SESSION['uprav']) && $_SESSION['uprav'] == $formular->getId())
    {
      ?>
      <div style="margin-top: 15px;">
        <form method="post" action="?c=posts&a=uprav">
          <div class="form-group col-7 offset-2">
            <textarea class="form-control" name="namePost" rows="4"><?php echo $formular->getPost(); ?></textarea>
          </div>
          <input class="btn btn-secondary offset-2" type="submit" name="upravPost" value="Upravit"/>
        </form>
      </div>
      <?php
    } else {
  ?>
  <div class="offset-2 col-7 mt-3">
    <div class="card">
      <div class="card-body post">
        <h5 class="card-title"><?php 

        $user = User::getOne($formular->getId_user());
        echo $user->getMeno()." ".$user->getPriezvisko(); 
        ?></h5>
        <p class="card-text"><?php echo $formular->getPost(); ?></p>
      </div>
    </div>
  </div>
  <?php 
  if (isset($_SESSION['user']) && ($user->getEmail() == $_SESSION['user'] || $_SESSION['user'] == "cekel1@stud.uniza.sk") && !isset($_SESSION['uprav']))
  {
  ?>
 <a href="?c=posts&a=delete&id=<?= $formular->getId() ?>" class="btn btn-danger offset-2">Zmazat</a>
  <?php } 
  if (isset($_SESSION['user']) && ($user->getEmail()== $_SESSION['user']) && !isset($_SESSION['uprav']))
  {
   ?> <a href="?c=posts&a=zobrazOkno&id=<?= $formular->getId() ?>" class="btn btn-info">Upravit</a> <?php
  }
}
  } 
  if ($auth->isLogged()) {
  ?>
  <form style="margin-top: 5%" action="?c=posts&a=vloz&id=<?= $auth->getLoggedUserId()?>" method="post">
    <div class="form-group col-7 offset-2">
      <label for="exampleFormControlTextarea1">Zadajte text správy</label>
        <textarea class="form-control" name="postNew" id="exampleFormControlTextarea1" rows="4"></textarea>
    </div>
        <input class="offset-2 mt-1 btn btn-light" type="submit" name="newPost" value="Odoslať" id="buttonNewPost">
  </form>
    <?php } ?>

  <footer style = " margin-top: 30px;">
    <div class="container">
        <ul>
        <li>Združená výrobné družstvo</li>
        <li>Zimná 94</li>
        <li>052 01 Spišská Nová Ves</li>
        <li>Informácie: (+421) 53/44 240 71</li>
        <li>E-mail: zdruzena@zdruzena.sk</li>
      </ul>
    </div>
  <!--<a href="https://www.facebook.com/" target="_blank"><img src="img/Facebook-logo.png" alt="logoFB"></a>-->
<div class="copyright">Združena <i class="fa fa-copyright"> 2022</i></div>
  </footer>