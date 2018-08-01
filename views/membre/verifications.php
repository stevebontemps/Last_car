<?php
$users = new \Lastcar\models\Users();
?>
<div id="verificationsGestionProfilMembre"  class="row col-12">
   
    <div id="list_profile" class="col-md-3"style="background-color: seashell;">
        <br>
        <br>
        <div class="container">
            <p class="h5">Compte</p>
            <a href="/profil/form">Informations personnelles</a>
            <p>Vérifications profil</p>
        </div>
        <br>
        <br>
        <div class="container">
            <p class="h5">Avis</p>
            <a href="/show/evaluation/received">Avis reçus</a><br/>
            <a href="/show/evaluation/given">Avis laissés</a>
        </div>
    </div>
    
    <div id="verifications" class="col-md-9">
        <p class="h6"><br/><b>Vérifications</b></p>
        <p>Email<br/>
            votre email:<?= $users->getEmail() ?>
        </p>
        <p>Téléphone<br/>
            votre numéro:<?= $users->getTelephone() ?>
        </p>
        <p>Identité<br/>
            <!--ici passeport ou carte d'identité vérifié-->

            Nous avons bien vérifié votre identité grâce à votre:<?= "carte ou passeport" ?>

        </p>
        <p>
            <!-- Vous avez obtenu le status de membre de confiance-->
            <?php echo ''; ?>
        </p>
    </div>
</div>