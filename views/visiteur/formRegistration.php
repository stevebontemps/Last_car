<div class='inscription' style="background-size: 100%;background-image: url('/image/plage.jpg'); width:100%;">
    <div class="container col-md-6" id='inscription'style="background-size: 100%;background-image: url('/image/plage.jpg'); width:100%;">
        <form action="/create/user" method="post">
            <p class='h4' style='color: darkblue;'>Pas encore membre ? Inscivez-vous gratuitement</p>
            <p>
                <!--il manque le genre dans la base de données-->
            <p class='h5' style='color: darkblue;'>Entrez les informations ci-dessous:</p>
            <?php
            if (isset($sexeInError))
                echo "<p class='error'>" . $sexeInError . "</p>";
            ?>
            <input type='radio' id="sexeM" name='sexe' value="male" <?php if (isset($sexe) && $sexe == "male") echo "checked=checked" ?>>
            <label for="sexeM">Homme</label>
            <input type='radio' id="sexeF" name='sexe' value="female" <?php if (isset($sexe) && $sexe == "female") echo "checked=checked" ?>>
            <label for="sexeF">Femme</label>
            </p>
            <p>
                <?php
                if (isset($prenomInError))
                    echo "<p class='error'>" . $prenomInError . "</p>";
                ?>
            <p>
                <input type='text' name="prenom" id='prenom' placeholder="Prénom" value="<?php if (isset($prenom)) echo $prenom; ?>">
                <?php
                if (isset($nomInError))
                    echo "<p class='error'>" . $nomInError . "</p>";
                ?>
                <input type='text' name="nom" id='nom' placeholder="Nom" value="<?php if (isset($nom)) echo $nom; ?>">
            </p>
            <?php
            if (isset($pseudoInError))
                echo "<p class='error'>" . $pseudoInError . "</p>";
            ?>
            <p>
                <input type="text" name="pseudo" id='pseudo' placeholder="Pseudo" value="<?php if (isset($pseudo)) echo $pseudo; ?>">
            </p>
            <?php
            if (isset($emailInError))
                echo "<p class='error'>" . $emailInError . "</p>";
            ?>
            <p>
                <input type="email" name="email" id='email' placeholder="Email" value="<?php if (isset($email)) echo $email; ?>">
            </p>
            <?php
            if (isset($mot_de_passeInError))
                echo "<p class='error'>" . $mot_de_passeInError . "</p>";
            ?>
            <p>
                <input type="password" name="mot_de_passe" id='mot_de_passe' placeholder="Mot de passe" value="<?php if (isset($mot_de_passe)) echo $mot_de_passe; ?>">
            </p>
            <?php
            if (isset($confirmPasswordInError))
                echo "<p class='error'>" . $confirmPasswordInError . "</p>";
            ?>
            <p>
                <input type="password" name="confirmPassword" id='confirmPassword' placeholder="Confirmer le mot de passe" value="<?php if (isset($confirmPassword)) echo $confirmPassword; ?>">
            </p>
            <?php
                if(isset($date_de_naissanceInError)) echo "<p class='error'>".$date_de_naissanceInError."</p>";
            ?>
            <p>
                <input type='date' name="date_de_naissance" id='date_de_naissance' placeholder="date de naissance" value="<?php if(isset($date_de_naissance))echo $date_de_naissance; ?>">

            </p>
            <input type="submit" class="btn btn-dark" value="S'inscrire"/>
        </form>
        <br>
    </div>
</div>
