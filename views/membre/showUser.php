<div id="showUser">
    <div>
        <p><!--Photo --><?= $users->getPhoto(); ?></p>
        <p><!--Prénom --><?= $users->getPrenom(); ?></p>
        <p><!--Age --><?= $users->getAge(); ?></p>
        <p>Membre depuis :<?= $users->getDate_inscription(); ?></p>
    </div>
    <div>
        <p>Status:<?= $users->getVerif_profil(); ?></p> <!-- membre de confiance à faire apparaître ou pas-->
        <textarea rows="4" cols="50" placeholder="Présentez-vous en quelques mots:"></textarea>
        </p>       
        <p>Véhicule:<?= $vehicules->getMarque(); ?><?= $vehicules->getModele(); ?></p>

    </div>
</div>