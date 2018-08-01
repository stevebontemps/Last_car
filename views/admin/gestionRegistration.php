<div id="gestionInscription" class="row col-12">
    <div  class="col-3">
        <div>
            <p><a href='/manage/users/form'>Gestion utilisateurs</a></p>
            <p><strong><p>Gestion inscription</p></strong></p>
            <p><a href='/manage/evenement/form'>Outil création évènements</a></p>
        </div>
    </div>    
    
    <div class="col-9">
            <div>
                <form action="/manage/registration/form" method="post">
                    <p>Activer l'inscription de:<br/>
                        <input type="text" name="user" placeholder="email"/>
                        <input type="submit" name="activate" id="activate" value='Activer'/>
                    </p>
                </form>
            </div>
    </div>
</div>