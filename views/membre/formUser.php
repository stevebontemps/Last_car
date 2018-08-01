<?php
//vardump($users);
?>
<div id="tableauBordMembre" class="row col-12">
    <div id="list_profile" class="col-md-3" style="background-color: seashell;">
        <br>
        <br>
        <div class="container">
            <p class="h5">Compte</p>
            <p>Informations personnelles</p>
            <a href="/profil/user/verifications">Vérifications profil</a>
        </div>
        <br>
        <br>
        <div class="container">
            <p class="h5">Avis</p>
            <a href="/show/evaluation/received">Avis reçus</a><br/>
            <a href="/show/evaluation/given">Avis laissés</a>
        </div>
    </div>

    <div class="col-md-9" >
        <form action="/profil" method="post">
            <legend>Informations personnelles</legend>
            <div id="infosPersonnelles">
                <p> Pseudo: <?= $users->getPseudo(); ?></p>

                <p> Genre: <?= $users->getSexe(); ?> (privé par défaut) <input type="checkbox" name="genreVisibility" id="genreVisibility" <?= $users->getVisibility('genreVisibility') ?>/><label for="genreVisibility">rendre public</label></p>

                <p> Prénom: <?= $users->getPrenom(); ?> (public par défaut)<input type="checkbox" name="prenomVisibility" id="prenomVisibility"<?= $users->getVisibility('prenomVisibility') ?>/><label for="prenomVisibility">rendre public</label></p>

                <p> Nom: <?= $users->getNom(); ?> (privé par défaut) <input type="checkbox" name="nomVisibility" id="nomVisibility" <?= $users->getVisibility('nomVisibility') ?>/><label for="nomVisibility">rendre public</label></p>

                <p> Email: <?= $users->getEmail(); ?> (privé par défaut)<input type="checkbox" name="emailVisibility" id="emailVisibility"<?= $users->getVisibility('emailVisibility') ?>/><label for="emailVisibility">rendre public</label></p>

                <p><textarea rows="5" cols="45" name="mini_bio" id="mini_bio" maxlength="120" placeholder="Présentez-vous en quelques mots"><?php if($users->getMini_bio()) echo $users->getMini_bio();?></textarea></p>

                <p>cochez pour rendre vos infos publiques:</p>

                <p>Téléphone: <?= $users->getTelephone(); ?><input type="checkbox" name="telephoneVisibility" id="telephoneVisibility" <?= $users->getVisibility('telephoneVisibility') ?>/><label for="telephoneVisibility">rendre public</label></p>

                <p>Date de naissance: <?= $users->getDate_de_naissance(); ?> <input type="checkbox" name="date_de_naissanceVisibility" id="date_de_naissanceVisibility" <?= $users->getVisibility('date_de_naissanceVisibility') ?>/><label for="date_de_naissanceVisibility">rendre public</label></p>

                <p><input type="submit" name="infoProfil" value="Enregister" /></p>
            </div>
        </form>


        <form action="/profil" method="post">
            <legend>Mot de passe:</legend>

            <div id="mot_de_passe">
                <label>Actuel:</label>
                <?php
                if(isset($mot_de_passeInError)) echo "<p class='error'>".$mot_de_passeInError."</p>";
                ?>
                <input type="text" name="mot_de_passe" id="mot_de_passe"  value="<?php if(isset($mot_de_passe))echo $mot_de_passe; ?>"/>
                <p><label>Nouveau mot de passe:</label></p>
                <?php
                if(isset($nouveau_mot_de_passeInError)) echo "<p class='error'>".$nouveau_mot_de_passeInError."</p>";
                ?>
                <p>
                    <input type="text" name="nouveau_mot_de_passe" id='nouveau_mot_de_passe' placeholder="nouveau Mot de passe" value="<?php if(isset($nouveau_mot_de_passe))echo $nouveau_mot_de_passe; ?>">
                </p>
                <?php
                if(isset($verif_mot_de_passeInError)) echo "<p class='error'>".$verif_mot_de_passeInError."</p>";
                ?>
                <p>
                    <input type="text" name="verif_mot_de_passe" id='confirmPassword' placeholder="Confirmer le mot de passe" value="<?php if(isset($verif_mot_de_passe))echo $verif_mot_de_passe; ?>">
                </p>
                <p>
                <p><input type="submit" name="motDePasse"value="Enregister" /></p>
            </div>
        </form>

        <form action="/profil" method="post">
            <legend>Véhicule :</legend>
            <div id="vehicules">
                <label>Marque</label>
                <select name="marque" id="marque">
                    <option value="citroen">citroen</option>
                    <option value="renault">renault</option>
                    <option value="mercedes">mercedes</option>
                    <option value="peugeot">peugeot</option>
                </select>
                <label>Modèle</label>
                <select name="modele" id="modele">
                    <option value="saxo">saxo</option>
                    <option value="picasso">picasso</option>
                </select>
            </div>
            <p><input type="submit" name="vehicule" value="Enregister" /></p>
        </form>
    </div>
</div>
