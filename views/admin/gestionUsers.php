<?php
$users = new \Lastcar\models\Users();
?>
<div id="gestionUsers" class="row col-12">
    <div class="col-3">
        <p><strong><p>Gestion utilisateurs</p></strong></p>
        <p><a href='/manage/registration/form'>Gestion inscription</a></p>
        <p><a href='/manage/evenement/form'>Outil création événements</a></p>
    </div>
    <div class="col-9">
        <div>
            <p>Liste des membres ayant subi un blocage:</p>
            <p><?= $users->getPseudo(); ?></p>
        </div>
        <div>
            <form action="/manage/users/form" method="post">
                <p>Envoyer avertissement à (membre):<br/>
                    <input type="text" name="user" placeholder="pseudo"/>
                    <input type="submit" name="validate" id="validate" value='Valider'/>
                </p>
            </form>
        </div>
    </div>
</div>
