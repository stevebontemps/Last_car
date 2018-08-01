<div id="outilCreationEvenements" class="row col-12">
    <div class="col-3">
        <p><a href='/manage/users/form'>Gestion utilisateurs</a></p>
        <p><a href='/manage/registration/form'>Gestion inscription</a></p>
        <p><strong><p>Outil création événements</p></strong></p>
    </div>
    <div class="col-9">
        <form action="/manage/evenement/form" method="post">
            <p>Sélectionner votre image événement:</p>
            <p><input type="file" name="photo" id="photo_evenement" size="24" onchange=";" alt="photo événement"/></p>
            <p>Date:</p>
            <p><input type="date"/></p>
            <p><textarea rows="4" cols="50" placeholder="Entrer la description:"></textarea></p>
            <p><input type="submit" name="add" id="add" value='Ajouter au site'/></p> 
        </form>
    </div>
</div>