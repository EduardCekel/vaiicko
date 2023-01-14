<?php
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\User $user */
?>

<table class="table container mt-5 mb-5">
    <thead class="thead-light" style = "background-color: whitesmoke;">
        <tr>
        <th scope="col">Poradie</th>
        <th scope="col">Meno</th>
        <th scope="col">Priezvisko</th>
        <th scope="col">Email</th>
        <th scope="col"> </th>
        </tr>
    </thead>
    <tbody>
        
        <?php 
        $cislo = 1;
        foreach ($data['data'] as $user)
            { ?>
            <?php if ($user->getMeno() != "admin")
            { ?>
            <tr>
            <th class = "post"> <?php echo $cislo; ?></th>
            <td> <?php echo $user->getMeno();?>  </td>
            <td> <?php echo $user->getPriezvisko();?>  </td>
            <td> <?php echo $user->getEmail();?>  </td>
            <td> <a href="?c=users&a=delete&id=<?= $user->getId() ?>" class="btn btn-danger">Zmazať</a> 
            </td> 
            <?php  $cislo++; } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
