<div id="editTrip" class="container col-8" style="padding-top: 2%; padding-bottom: 2%;">
    <form id="formulaire-1" method="post" action="/calcul/trip/form">
        <div>
            <p id="titre" class="h4" ><b>Itinéraire</b></p>
            <p>Utiliser la carte pour créer votre trajet</p>

            <div id='map' style='width: 700px; height: 500px;'></div>
            <br>
<!--            <p class="h4">Etapes</p>-->
<!--                <p>Augmentez vos chances de remplir votre véhicule en ajoutant<br/>  -->
<!--                des étapes où vous pouvez y déposer et récupérer des passagers.<br/>-->
<!--                <!--Rajouter le name des etapes en fonction de l'ajax-->
<!--                <input type="text" name="!!!!" placeholder="Ville étape"/><br/>-->
<!--                <input type="submit" value='Ajouter cette étape'/>-->
<!--            </p>-->
            <!-- Input hidden -->
           <p>
               <!-- lat long depart -->
               <input type="hidden" name="lat_dep" id="lat_dep" value=""/>
               <input type="hidden" name="lng_dep" id="lng_dep" value=""/>
               <!-- lat long arriver -->
               <input id="lat_arr" type="hidden" name="lat_arr" />
               <input id="lng_arr" type="hidden" name="lng_arr" />
               <!-- distance -->
               <input id="distance" type="hidden" name="distance" />
               <!-- nom depart -->
               <input id="arriver" type="hidden" name="arriver" />
               <!-- nom arriver -->
               <input id="depart" type="hidden" name="depart" />
            </p>
            
        </div>
        
        <div>
            <p class="h4">Date et horaire<p>
            
            
            <p>Date de l'aller:<br/>
                <input type="date" name='date_aller' id="date_aller"/>
                <input type="time" name='heure_aller' id="heure_aller"/>    
            </p>
          
<!--            <p>Pour dépanner les passagers, publiez aussi votre trajet retour.<p>-->
        </div>

            <input type="submit" value="Continuer" />
    </form>
</div>
