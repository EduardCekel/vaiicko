<?php

use App\Models\User;

/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Post $formular */

?>

<table class="table container mt-5 mb-5">
    <thead>
        <tr >
        <th  scope="col">č. objednávky</th>
        <th  scope="col">Dátum prijatia objednávky</th>
        <th scope="col">Meno zákazníka</th>
        <th scope="col"> </th>
        </tr>
    </thead>
    <tbody>
        
        <?php 
        $cislo = 1;
        foreach ($data['data'] as $formular)
            { ?>
            <?php $zakaz = User::getOne($formular->getId_user()); ?>
            <tr>
            <th class = "post"> <?php echo $cislo; ?></th>
            <td> <?php echo $formular->getDatum();?>  </td>
            <td> <?php echo $zakaz->getMeno()," ",$zakaz->getPriezvisko();?>  </td>
            <td> <a href="?c=orders&a=zobraz&id=<?= $formular->getId() ?>" class="btn btn-info">Zobraziť detaily</a> 
            </td> 
            <?php  $cislo++; 
            ?>
            </tr>
        <?php if (isset($_SESSION['zobraz']) && $_SESSION['zobraz'] == $formular->getId())
            { ?> <tr> <td> <?php
                echo $_SESSION['zobraz'];
                unset($_SESSION['zobraz']);
                ?></td> </tr> <?php
            }
        } ?>
    </tbody>
</table>

