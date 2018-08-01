<?php
$users = new \Lastcar\models\Users();
$trajets = new \Lastcar\models\Trajets();
$notations = new \Lastcar\models\Notations();
?>

<div id='avis_recus' class="row col-12">
    <div class="col-3" style="background-color: seashell;">
        <br>
        <br>
        <div>
            <p class="h5">Compte</p>
            <a href="/profil/form">Informations personnelles</a><br>
            <a href="/profil/user/verifications">Vérifications profil</a>
        </div>
        <br>
        <br>
        <div>
            <p class="h5">Avis</p>
            <p>Avis reçus</p>
            <a href="/show/evaluation/given">Avis laissés</a>
        </div>
    </div>
    
    <div id='avis_reçus'class="col-9">
       
        <p><?= $users->getPhoto(); ?> <?= $users->getNom() ?></p>
        <p>Avis:<?= $notations->getAvis(); ?></p>
        <p>Message:<?= $notations->getCommentaire(); ?></p>
        <p>Date:<?= $notations->getDate_publication(); ?></p>
        
    </div>
</div>
