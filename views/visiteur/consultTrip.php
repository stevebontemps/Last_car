<div id="consultTrip">
    <div>
        <!--réponse de réservation à faire--> 
        <form action="" method="post">
        <p>Trajet:</p>
        <p><?= $users->getPhoto(); ?> <?= $trajets->getDepart(); ?> <?= $trajets->getDestination(); ?> <?= $trajets->date ?></p>
        <p>Prix par place: <?= $trajets->getTarif(); ?></p>
        
            <p><label>Choisir le nombre de place(s)</label><select name="places">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select></p>
            <input name='alerts' id='alerts' value='Créer une alerte'/> 
            <!--l'utilisateur aura un feedback de creation d'alerte-->
            <p><h2>Itinéraire:</h2></p>
        <!--Attention! merci de rajouter les attributs ci-dessous-->

            <p> <?="ajouter BDetape" ?> <?="ajouter BDetape" ?> <?="ajouter BDetape" ?></p>

            <input name='book' id='book' value='Réserver'/>
        </form>
    </div>
    <div id ='profilUserTrajet'>
        <p><?= $users->getPhoto(); ?> <?= $users->getPrenom(); ?> <?= $users->getAge(); ?> </p>
        <p>Véhicule: <?= $vehicules->getMarque(); ?><?= $vehicules->getModele(); ?> </p>
        <p>Avis: <?= $notations->getAvis(); ?> /5 <?= $users->getVerif_profil(); ?> </p>
        <a href='/show/user'>Voir son profil</a>
        <!--mettre rights membre et admin seulement-->
    </div>
</div>