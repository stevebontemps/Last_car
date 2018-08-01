<?php
$users = new \Lastcar\models\Users();
$trajets = new \Lastcar\models\Trajets();
$notations = new \Lastcar\models\Notations();
?>
<div id='avis_laisses' class="row col-12">
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
            <a href="/show/evaluation/received">Avis reçus</a>
            <p>Avis laissés</p>
        </div>
    </div>
    
    <div id='avis_reçus'class="col-9">
           
        <p><?= $users->getNom(); ?> <?= $trajets->getDestination(); ?> <?= $trajets->getDate_aller(); ?> </p>
        <p>Avis:<?= $notations->getAvis(); ?></p>
        <p>Date:<?= $notations->getDate_publication(); ?></p>
        
    </div>
</div>

