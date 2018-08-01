<div id="email">
       <p>Important - email de confirmation</p>
       <p>Objet:email de confirmation </p>
       <p>Support Lastcar: support@lastcar.fr</p>
       <p><img src="/images/logo.png">
       <p>Lastcar</p>    
       </p>
    <?php
        if(isset($message)):
            echo "<p class='message'>" . $message . "</p>";
        endif;
    ?>
   <div>           <!-- prénom -->
       <p>Bonjour <?= $user->getPrenom(); ?></p>
       <p>Merci pour votre inscription. Veuillez cliquer sur le lien<br/>
           pour achever votre compte et ainsi confirmer la  validation<br/>
           de votre compte:</p><br/>
   </div>
   <div>
       <p><a href='<?= $user->getConfirmLink();?>'>Activation du compte</a></p>
       <!--<p><input type="submit" name="validate" id="validate" value="Activation du compte"/></p><br/>-->
   </div>
   <div>
       <p>Pour toute question, veuillez contacter l'administrateur en cliquant <a href="/create/email/admin">ici</a></p>
       <p>Cordialement<br/>
          L'équipe Lastcar !
       </p>
   
   </div>
</div>
