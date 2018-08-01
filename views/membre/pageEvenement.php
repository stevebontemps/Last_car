<?php
    $evenements = new \Lastcar\models\Evenements();
    $users = new \Lastcar\models\Users();
    $trajets = new \Lastcar\models\Trajets();
?>
<div id="pageEvenement"class="container col-8" style="background-color: lightgoldenrodyellow">
    <div class="card bg-dark text-white">
        <img class="card-img" src="/image/fest.png" alt="Card image"><p><?= $evenements->getImage(); ?></p>
        <div class="card-img-overlay">
            <h5 class="card-title">Nom de l'événemet:</h5><p><?= $evenements->getNom(); ?></p>
            <p class="card-text">Date:<?= $evenements->getDate(); ?></p>
            <p class="card-text">Info:<?= $evenements->getInfo(); ?></p>
        </div>
    </div>

    <div id="from" style="background-color: whitesmoke">
        <p class="h4"><label>Trouver un trajet à partir de:</label><input type='text'name='depart' id='depart'>
        <input type='submit'name='depart' id='depart'value="voir"></p>
    </div>

    <div>
        <p class="h4">Liste de trajets existants:</p>
        <div>
            <p><?= $users->getPhoto(); ?></p>
            <p><?= $users->getNom(); ?></p>
            <p>Départ: <?= $trajets->getDepart(); ?></p> 
            <p>Destination: <?= $trajets->getDestination(); ?></p> 
            <p>Départ: </p>
            <p><input type="button" name="voir" id="voir" value="voir"></p>
        </div>
    </div>
</div>