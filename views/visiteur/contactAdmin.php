<div class='col-12'  style="background-size: 100%; width:100%; background-image: url('/image/plage.jpg');">
    <div id='contactAdmin' />
    <div class="card" style="background-color: transparent;">
        <div class="row" style="display:flex;justify-content:center;">
            <div class="col-md-4 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body" style="margin-top: 100px;margin-bottom: 100px;">

                        <form action="/create/email/admin" method="post">
                            <p class="h4" style="color: orange;">Contacter l'administrateur</p>
                            <p><input type="text" name='objet' id='objet' placeholder="Objet:" /></p>
                            <p><textarea rows="4" cols="50" name="contenu" id='contenu' placeholder="Ecrivez votre message:"></textarea></p>
                            <p><input type='hidden' name='date' id='date'/></p>
                            <input type='submit' name='contactAdmin' id='contactAdmin' value='Envoyer'/>
                        </form>  

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>