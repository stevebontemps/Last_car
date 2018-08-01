<div class="" style="background-image: url('/image/connexion.jpg'); width: 100%; height: auto; padding-bottom: 5%; ">    
    <div id="loginbox" class="container mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="container panel panel-info col-md-6">
            <div class="panel-heading">
                <div class="panel-title h3 " style="color: greenyellow;"><br>Connexion</div>
                <!--<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Mot de passe oublié?</a></div>-->
            </div>     

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form action="/connexion/user" method="post" id="loginform" class="form-horizontal" role="form">
                    <?php
                    if (isset($errorCredentials)):
                        echo "<p class='error'>$errorCredentials</p>";
                    endif;
                    ?>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="logIn" id="logIn" class="form-control" value="" placeholder="adresse email ou pseudo">                                        
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control" placeholder="mot de passe">
                    </div>

                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                            <button type="submit" id="btn-login" href="/accueil/membre" class="btn btn-success">Se connecter  </button>
                            <br>
                            <a class="btn-light" title="To be continued" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="To be continued">Mot de passe</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 control h4">
                            <div style="color: darkblue; padding-bottom: 45px; font-size:85%" >
                                Vous n'avez pas encore de compte? 
                                <a class="btn btn-warning" href="/registration/user/form">
                                    Inscription 
                                </a>
                            </div>
                        </div>
                    </div>    
                </form>     
            </div>                     
        </div>  
    </div>
</div>