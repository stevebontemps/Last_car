<!-- section itinéraire sur page d'accueil-->
<div class="connexion" style="background-size: 100%;background-image: url('/image/van.jpg'); width:100%;" >
    <div id="accueilTrajet" />
    <div class="card" style="background-color: transparent;">
        <div class="row" style="display:flex;justify-content:center;">
            <div class="col-md-4 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="text-center" style="color: darkslateblue;">
                            <br>
                            Itinéraire</h3>

                        <form class="form-signin" action="/show/list/trips" method='post'>
                            <div class="form-group">
                                <div class="input-group">
<!--                                    <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span>
                                    </span>-->
                                    <input type="text" class="form-control" name='depart' id='depart' placeholder="Départ" />
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="input-group">
                                    <!--<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>-->
                                    <input type="text" class="form-control" name='destination' id='destination' placeholder="Destination" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <!--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>-->
                                    <input type="date" class="form-control" name='date' id='date'/>
                                </div> 
                            </div>
                    </div>
                    <div class='text-center'>
                        <button name='passager' id='passager' type="submit" class="btn btn-dark" role="button" style='color: greenyellow; align-content: center; border-radius: 5%;  border: 1px solid black;'>
                            Rechercher</button>

                    </div>
                </div>
                </form>
                <br>
            </div>
        </div>
    </div>
</div> 
<br>
<br>

<!-- section recherche covoiturage-->
<div id="acceuilEvenement" class="card-block" style=" background-color: transparent; padding-top: 8%; "></div>
<div class="container-fluid col-lg-4 col-md-3 col-lg-4">
    <div class="row" style="padding-left: 21%;display:flex;justify-content:center; background-color: transparent;">

        <form class="form form-signup" role="form" action="/show/evenement/(:)/form" method='post'>
            <div class="panel panel-default">
                <div class="panel-body container-fluid">
                    <h3 class="text-right" style="color:black; text-shadow: 0 0 3px orange; padding-top: 50%;">
                        Trouver votre événement:</h3>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="nom" id="nom_evenement" class="form-control" placeholder="ex: #Festival" />
                        </div>
                        <div class='text-center'style='padding-bottom: 60%;'>
                            <button type="submit" class="btn btn-outline-warning" role="button"><image src='/image/logo.png' style='height: 36px;'/></button> 
                        </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>
</div>
<!-- section information sur Lastcar-->
<div id="acceuilDescription" class="card-fluid" style=" background-image: url('/image/black.jpg');"/>
<section id="what-we-do">
    <div class="container-fluid">
        <h2 class="section-title mb-2 h5 text-center" style='color: lightslategrey'><br>Partez avec tout ça!</h2>
        <div class="row mt-5">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                <div class="jumbotron" style='background-color: lightgoldenrodyellow;'>
                    <div class="card-block block-1" style="background-color: whitesmoke;">
                        <h4 class="card-title text-center"><b>Entraide</b></h4>
                        <p class="card-text text-center">Son but est de permettre à tous de consommer différemment en favorisant l'entraide et l'achat malin via des plateformes collaboratives !</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                <div class="jumbotron" style='background-color: lightsteelblue;'>
                    <div class="card-block block-2" style="background-color: whitesmoke;">
                        <h4 class="card-title text-center"><b>Fun</b></h4>
                        <p class="card-text text-center" >vous trouverez de nombreux bons plans</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                <div class="jumbotron" style='background-color: lightgreen;'>
                    <div class="card-block block-3" style="background-color: whitesmoke;">
                        <h4 class="card-title text-center"><b>Economie</b></h4>
                        <p class="card-text text-center">L'économie collaborative s'est considérablement développée de nos jours par le biais d'intermédiaires ou de plateformes spécialisées !</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</section>
