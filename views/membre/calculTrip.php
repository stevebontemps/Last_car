<div id="calculTrajet" class="container col-8">
    <form action="/calcul/trip/form/add" method='post'>
    <div>
        <p class="h4">Calculer prix par passager:</p>
        <p>Prix: <?= $prix ?></p>
        <input type="hidden" name="price" value="<?= $prix ?>">
        <!--API calcul trajet à mettre en place ici-->
    </div>  
    <div id='evenement'>
        <p>Vous vous rendez à un évènement culturel ? <br/> Trouvez plus facilement des passagers 
            en rentrant # l'hashtag de votre sortie loisir ! </p>
        <label>#<input type="text" id="nom_evenement" name="nom" placeholder="FestivalCoachella"/></label>

    </div>  
    <div>
        <textarea name='information' id='information' placeholder="Information sur le trajet ..."></textarea>
    </div>  
    <div>
        <!--API Géolocalisation-->
    </div>  
    <div>
        <p>Récapitulatif</p>
        <p>Départ: <?= $trajets->getDepart(); ?> <?= $heure ?></p>
        <input type="hidden" name="depart" id="depart" value="<?= $trajets->getDepart() ?>">
        <input type="hidden" name="lat_d" value="<?= $post['lat_dep'] ?>">
        <input type="hidden" name="lng_d" value="<?= $post['lng_dep'] ?>">
        <p>Arrivée: <?= $trajets->getDestination(); ?></p>
        <input type="hidden" name="lat_a" value="<?= $post['lat_arr'] ?>">
        <input type="hidden" name="lng_a" value="<?= $post['lng_arr'] ?>">
        <input type="hidden" name="arriver" value="<?= $post['arriver'] ?>">
        <input type="hidden" name="date" value="<?= $post['date_aller'] ?>">
        <input type="hidden" name="heure" value="09:00:00">
        <a href="editTrip.php">Modifier</a>

   </div>
   <input type='submit' name='publish' id="publish" value='Mettre en ligne'/>
   </form>
</div>