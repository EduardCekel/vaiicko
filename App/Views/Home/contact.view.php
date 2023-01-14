<?php
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Formular $formular */
?>
<div class = "uvodKontakt">
    <div class="container">
    <h1>Kontakt</h1>
      <hr>
    </div>
</div> 
<div class = "container">  
    <p><b>Adresa:</b> Zimná 94, 052 01 Spišská Nová Ves</p>
    <p><b>Informácie:</b> (+421)53/44 240 71</p>
    <p><b>Obchodný úsek:</b> (+421)905 928 337</p>
    <p><b>Výrobný úsek:</b> (+421)915 965 709</p>
    <p><b>Fax:</b> (+421)53/44 652 45</p>
    <p><b>E-mail:</b> zdruzena@zdruzena.sk</p>
</div>
<div class = "container">
    <h3>Kontaktný formulár</h3> 
    <form method="post">
      <label for="fname">Meno a priezvisko*</label><br>
      <input type="text" name="fname" value="meno priezvisko"><br>
      <label for="fname">E-mail*</label><br>
      <input type="text" name="femail" value="e-mail"><br><br>
      <label for="fname">Správa/požiadavka*</label><br>
      <input type="text" name="ftext"><br><br>
      <input type="submit" value="Odoslať">
    </form>  
</div>  

<?php 

        foreach ($data['data'] as $formular)
            { ?>
            <p> <?php echo $formular->getPost(); ?> </p>
        <?php } ?>



  <footer>
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