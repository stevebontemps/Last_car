<?php
$users = new \Lastcar\models\Users();
?>
<div id="laisserEvaluation">
    <form action="/dashboard/user/(:)" method="post">
        <p>Cette évaluation sera transmise au membre</p>
        <p>Notez le trajet de <?= $users->getPrenom(); ?> vers <?= $trajets->getDestination(); ?>
        <ul name='avis' class="avis-echelle">
            <!-- CSS http://babylon-design.com/systeme-de-notation-par-etoiles-accessible/ -->
            <li>
                <label for="note01" title="Note&nbsp;: 1 sur 5">1</label>
                <input type="radio" name="notesA" id="note01" value="1" />
            </li>
            <li>
                <label for="note02" title="Note&nbsp;: 2 sur 5">2</label>
                <input type="radio" name="notesA" id="note02" value="2" />
            </li>
            <li>
                <label for="note03" title="Note&nbsp;: 3 sur 5">3</label>
                <input type="radio" name="notesA" id="note03" value="3" />
            </li>
            <li>
                <label for="note04" title="Note&nbsp;: 4 sur 5">4</label>
                <input type="radio" name="notesA" id="note01" value="4" />
            </li>
            <li>
                <label for="note05" title="Note&nbsp;: 5 sur 5">5</label>
                <input type="radio" name="notesA" id="note01" value="5" />
            </li>
            </p></ul>
        <textarea rows="5" cols="40" name='commentaire' id='commentaire' placeholder="Votre message:"></textarea>
        <p><input type='submit' name="validate" id='validate' value='Valider'/></p>  
    </form>
</div>