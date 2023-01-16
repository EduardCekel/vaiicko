<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Location;

/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Post $formular */

?>

<div class="col-8 container mt-5 mb-5  offset-2" style="font-size: 100%;" id="oznamObj">
    <div class = "row" style = "height: 20%; font-weight: bold;">
        <div class="col-1">ČO</div>
        <div class="col-3">Dátum prijatia objednávky</div>
        <div class="col-3">Meno zákazníka</div>
        <div class="col-2"> </div>
        <div class="col-2"> </div>
    </div>  
    <hr style="margin-bottom: 20px;">      
        <?php 
        $cislo = 1;
        foreach ($data['data'] as $formular)
            { ?>
            <?php $zakaz = User::getOne($formular->getId_user()); ?>
            <div class="row" style="height: 80px;">
            <div class="col-1"><b> <?php echo $cislo; ?> </b></div>
            <div class="col-3"> <?php echo $formular->getDatum();?>  </div>
            <div class="col-3"> <?php echo $zakaz->getMeno()," ",$zakaz->getPriezvisko();?>  </div>
            <div class="col-2"> <a href="?c=orders&a=zobraz&id=<?= $formular->getId() ?>" class="btn btn-info">Detaily</a> </div> 
            <div class="col-2"> <a href="?c=orders&a=delete&id=<?= $formular->getId() ?>" class="btn btn-danger">Odstraniť</a> 
            </div> 
            <hr style="margin: 0;">
            <?php  $cislo++; 
            ?>
            </div>
        <?php if (isset($_SESSION['zobraz']) && $_SESSION['zobraz'] == $formular->getId())
            { 
                $product = Order::getOne( $_SESSION['zobraz']);
                $prodName = Product::getOne($product->getProduct());  
                $loc = Location::getAll('id_user = ?',[$formular->getId_user()]);  
            ?> 
            <div class="offset-2 col-7 mt-3 mb-5">
                <div class="card">
                <div class="card-body post">
                    <h5 class="card-title">Objednávka č.<?php 
                        echo $cislo-1;
                    ?></h5>
                    <p class="card-text">
                        <b>Meno zákazníka:</b> <?php echo $zakaz->getMeno()," ",$zakaz->getPriezvisko(); ?>
                        <br><b>Dátum objednania:</b> <?= $formular->getDatum() ?>
                        <br><b>Adresa doručenia:</b> <?= $loc[0]->getAdresa().", 0".$loc[0]->getPsc()." ".$loc[0]->getMesto() ?>
                        <br><b>Názov produktu:</b> <?= $prodName->getName() ?>
                        <br><b>Počet kusov:</b> <?= $product->getSizes() ?>
                    </p>
                    <div style="display: flex; justify-content: flex-end">
                    <a href="?c=orders&a=skry" class="btn btn-danger">Zavriet</a>
                    </div>
                </div>
                </div>
            </div>
            <hr style="margin-bottom: 20px;">
            <?php
            }
        } ?>
    </div>

<script src="public/js/adminOrders.js"></script>

