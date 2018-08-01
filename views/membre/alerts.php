<?php
    $alerts = new \Lastcar\models\Alerts();
?>
<!--<div id="alerts" class="container col-10">-->
<div id="alerts" class="row col-12">
    <div id='list_alert' class="container">
        <br>
        <p class="h6">Vos alertes</p>
        <!--créer une boucle d'alertes-->
        <p><ul>
            <li><p name='alert' id='alert'<?= $alerts->getDepart(); ?> <?= $alerts->getDestination(); ?> <?= $alerts->getDate(); ?>></p><input type="submit" name="delete" id="delete" value="supprimer"/></li>
        </ul></p>
    </div>
    
    <div class="container"  style="background-color: seashell;">
        <div id='info_alert'>
        <p>
            Comment créer une alerte ?
        </p>
        <p>
            1.Aller dans <a href="/show/trips" >Recherche trajet</a><br/>
            2.Renseigner la date et cliquer sur "créer une alerte"
        </p>
    </div>
    </div>
</div>