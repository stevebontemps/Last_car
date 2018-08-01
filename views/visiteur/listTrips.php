<div id='listTrips' class='row' >
    <div  class="col-4" style="color: orangered; background-color: whitesmoke;">
        <form action='/show/trips' method="post">
            <br>
            <label for="depart">Départ:&nbsp;</label><input type='text' data-autocomplete = "/search/trip/departure" name="depart" id='depart' placeholder="ex: Montpellier" required></p>
            <br>
            <label>Destination:&nbsp;</label><input type='text' name="destination" id='destination' placeholder="ex: Paris" required></p>
<!---->
<!--            <p>-->
<!--                <label>Date  </label><br/>-->
<!--                <input type='date' name="date_aller" id='date_aller' required>-->
<!--            </p>-->
<!--            <p>-->
<!--                <label>Heure départ</label><br/>-->
<!--                <input type='time' name="heure_depart" id='heure_depart' value="10:00" required>-->
<!--            </p>-->
<!--            <p>-->
<!--                <label>Prix maximum </label><br/>-->
<!--                <select name="tarif" id="tarif" required>-->
<!--                    <option value="2">2</option>-->
<!--                    <option value="5">5</option>-->
<!--                    <option value="10">10</option>-->
<!--                    <option value="20">20</option>-->
<!--                    <option value="50">50</option>-->
<!--                    <option value="100">100</option>-->
<!--                </select>-->
<!--                €-->
<!--            </p>-->
            <p>
                <input type="submit" class="btn btn-dark" name='search' value='Rechercher'/>
                <input type="submit" class="btn btn-outline-warning" name='alerts' id='alerts' value='Créer une alerte'/> 
                <!--l'utilisateur aura un feedback de creation d'alerte-->
            </p>
            <!--liste des covoiturages à afficher-->
        </form>
    </div >

    <div class="col-8" style="background-image: url('/image/pure.jpg');">
        <h1><?= $titre ?></h1>
        <?php
            if($trajets !== false):
                foreach ($trajets as $trajet):
//                var_dump($trajets);
        ?>
                    <div class="ficheTrajet">
                        <h2>
                            <img class="imageProfile" src="/<?= $trajet->getPhoto(); ?>" >
                            <?= $trajet->getPseudo() ?> propose le trajet suivant :
                        </h2>
                        <!--afficher en fonction si c'est un evenement ou un trajet simple-->
                        <p>Aujourd'hui à: <?= $trajet->getHeure_aller(); ?></p>
                        <p>Départ: <?= $trajet->getDepart(); ?></p>
                        <p>Destination: <?= $trajet->getDestination(); ?></p>
                        <!--page membre donc prenom-->
                            <p><input type="submit" name='book' value='Réserver'/>
                    </div>
        <?php
                endforeach;
            else:
        ?>
                    <div class="ficheTrajet">
                        <p class="message">
                            Aucun résultat ne correspond à votre recherche !
                        </p>
                    </div>
        <?php
            endif;
        ?>
    </div>
    
</div>