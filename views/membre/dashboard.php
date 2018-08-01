

<div id="tableauBordMembre" class="row col-12">
    <div class="col-3"  style="background-color: seashell;">
        <p><img src="<?= $user->getPhoto(); ?>"/></p>
        <?php
        if ($user->getPhoto() !== "/upload/imagesUsersPriv/img.png") {
            echo '<a href="/dashboard/delete/image"><input type="submit" name="deleteImage" value="supprimer" /></a>';
        }
        ?>
        <p id="test">modifier votre photo:</p>
        <p>
        <form action="/dashboard/update/photo" method="post" enctype="multipart/form-data">
            <!--            <input type="hidden" name="MAX_FILE_SIZE" value="9408576" />
                    <input type="file" name="photo" id="photo_user" alt="photo membre"/>
                    <input type="submit" value="Envoyer"/>-->

            <label for="photo">Image de type (jpeg, jpg, png ou gif)( max. 9 Mo) :</label><br />
            <input type="hidden" name="MAX_FILE_SIZE" value="9408576" />
            <input type="file" name="photo" id="photo"/>
            <input type="submit" value="Envoyer"/>
        </form>
        </p>
        <p><a href="/profil/user/verifications">Compléter les vérifications du profil</a></p>
        <p>Membre depuis :<?= $user->getDate_inscription() ?></p>

    </div>

    <div id='trajets' class="col-9">
        <div>
            <h2>Vos trajets</h2>
                <?php if($trajets !== false): ?>
                    <?php foreach ($trajets as $trajet): ?>
                        <p>Vous êtes <?= $trajet->getRole() ?> sur le trajet <?= $trajet->getType_trajet() ?> suivant :</p>
                        <p>Départ de : <?= $trajet->getDepart(); ?></p>
                        <p>Arrivée à : <?= $trajet->getDestination(); ?></p>
                        <p>le : <?= $trajet->getDate_aller(); ?></p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Vous n'avez aucun trajet à venir</li>
                <?php endif; ?>
        </div>
    </div>
</div>   