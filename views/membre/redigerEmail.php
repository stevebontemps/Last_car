<div id="messagerie" class="row col-12">
    <div id='messagerie' name="messages"class="row inbox col-3"  style="background-color: seashell;">
        <div class="panel panel-default">
            <div class="panel-body inbox-menu">						
                <br>
                <br>
                <ul>
                    <li>
                        <a href="/messagerie"><i class="fa fa-inbox"></i> Boîte de réception <span class="label label-danger"></span></a>
                    </li>
                    <li>
                        <p><i class="fa fa-rocket"></i> Messages envoyés</p>
                    </li>
                    <li>
                        <p><i class="fa fa-trash-o"></i> Corbeille</p>
                    </li>
                </ul>
                <br>
                <a href="#page-inbox-compose.html" class="btn btn-success btn-block" style="margin-left: 30;">Rédiger Email</a>
            </div>	
        </div>
    </div>			
    <div id="redigerEmail" class="col-9">
        <form action='/messagerie/user/(:)' method="post">
            <div class="container">


                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-body message">
                            <p class="text-center">Nouveau Message</p>
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="to" class="col-sm-1 control-label">A:</label>
                                    <div class="col-sm-11">
                                        <input type="email" class="form-control select2-offscreen" id="to" placeholder="pseudo du membre" tabindex="-1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="objet" class="col-sm-1 control-label">Objet:</label>
                                    <div class="col-sm-11">
                                        <input type="email" class="form-control select2-offscreen" id="objet" placeholder="objet" tabindex="-1">
                                    </div>
                                </div>
                            </form>
                            <br>	

                            <div class="form-group">
                                <textarea class="form-control" id="message" name="body" rows="12" placeholder="Ecrivez votre message ici"></textarea>
                            </div>

                            <div class="form-group">	
                                <button type="submit" class="btn btn-success">Envoyer</button>
                            </div>
                        </div>	
                    </div>	
                </div>	
            </div><!--/.col-->		
    </div>
</form>
</div>
</div>
<!--            <div>
                <p>Destinataire: <?= $users->getEmail(); ?></p>
            </div>
            <p>Objet:<?= $messages->getObjet(); ?> </p>
            <div>
                <p>
                    <textarea rows="4" cols="50" placeholder="Ecrivez votre texte ici ..."></textarea>    
                </p>  
            </div>
            <div>
                <p><input type="submit" name="envoyer" id="envoyer" value='Envoyer'/></p>
            </div>-->