<?php
    $users = new \Lastcar\models\Users();
    $messages = new \Lastcar\models\Messages();
?>
<div id="messagerie" class="row col-12">
   <div id='messagerie' name="messages"class="row inbox col-3"  style="background-color: seashell;">
        <div class="panel panel-default">
            <div class="panel-body inbox-menu">						
                <br>
                <br>
                <ul>
                    <li>
                        <p><i class="fa fa-inbox"></i> Boîte de réception <span class="label label-danger"></span></p>
                    </li>
                    <li>
                        <p><i class="fa fa-rocket"></i> Messages envoyés</p>
                    </li>
                    <li>
                        <p><i class="fa fa-trash-o"></i> Corbeille</p>
                    </li>
                </ul>
                <br>
                <a href="/messagerie/email/user/(:)/form" class="btn btn-success btn-block" style="margin-left: 30;">Rédiger Email</a>
            </div>	
        </div>
    </div>
    

    <div class="col-9">
        <p> <?= $users->getNom(); ?></p>
        <p> <?= $messages->getObjet(); ?></p>
        <p> <?= $messages->getDate(); ?></p>
        <input type="button" name="delete" id="delete" value="supprimer"/>
    </div>
</div>
