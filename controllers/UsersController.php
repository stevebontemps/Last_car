<?php

/**
 * Created by PhpStorm.
 * User: padbrain
 * Date: 29/05/18
 * Time: 23:53
 */

namespace Lastcar\controllers;

use Lastcar\core\Controller;
use Lastcar\core\Response;
use Lastcar\core\Utilities;
use Lastcar\models\Groups;
use Lastcar\models\L_users_groups;
use Lastcar\models\UsersProfile;
use Lastcar\models\Users;
use Lastcar\models\Surfeur;

class UsersController extends Controller {

    public function getAll() {
        $this->displayAllUsers();
    }


    public function getById() {
        $aUserId = $this->getParamFromUri();
        $id = $aUserId["getbyid"];
//        $id = explode("/", $this->get);
//        $id = (int)end($id);
        $modelUser = new UsersProfile();
        $modelUser->setId($id);
        $user = $modelUser->Retrieve();
        $aUser["user"] = $user;
        new Response($this->setUriToViewFormat(), $aUser);
//        var_dump($oUser);
//        var_dump((array)$oUser);
    }

    public function delete() {
        $id = explode("/", $_SERVER["REQUEST_URI"]);
        $id = (int) end($id);
        $modelUser = new UsersProfile();
        $modelUser->setId($id);
        $oUser = $modelUser->remove();
//        var_dump($oUser);
    }

    public function displayAllUsers() {

        try {
            $modelUser = new UsersProfile();
            $users['users'] = $modelUser->getAll();
//          var_dump($users);
            new Response($this->uri, $users);
//            $view->Render();
        } catch (\Exception $e) {
            $e["message "] = $e->getMessage();
            new Response("message", $e);
            exit;
        }
    }


    public function createUserAction() {
        try {
            $_post = $this->inputPost();
            $aErrorMessage = null;
            $modelUser = new UsersProfile();
            $aDatas = $this->verifForm($modelUser, $_post);

            //  Vérification de l'option sexe
            if (!isset($_post['sexe'])) {
                $aErrorMessage["sexeInError"] = "Votre sexe n'est pas défini !";
            } else {
                $modelUser->setSexe($_post['sexe']);
            }

            //  Vérification du mot de passe
            if ($_post["mot_de_passe"] !== $_post["confirmPassword"]) {
                $aErrorMessage["confirmPasswordInError"] = "Les deux mots de passe ne correspondent pas !";
            }

            //  IL Y A DES ERREURS DANS LA SAISIE DU FORMULAIRE
            //  ON RÉAFFICHE LE FORMULAIRE
            if (!is_null($aDatas)) {
                if (!is_null($aErrorMessage)) {
                    $aDatas["error"] = $aErrorMessage;
                }
                new Response("/registration/user/form", $this->arrayLinear($aDatas));
            }
            //  AUCUNE ERREUR DÉTECTÉE DANS LA SAISIE DU FORMULAIRE
            else {
                unset($_post['confirmPassword']);
//var_dump(__FILE__.__LINE__);

                //  Création du nouvel utilisateur
                $userId = $modelUser->Create($_post);
                //  Récupération de l'id du groupe MEMBRE
//                $group = (new Groups())->getAllBy("short_name" => "MEMBRE");
//                //  Association du User avec le groupe membre
//                $lug = new L_users_groups();
//                $lug->Create(array(
//                   "id_groups" => $group->getId(),
//                   "id_users" => $userId
//                ));

                if ($userId > 0) {
                    //  Association de l'utilisateur avec le groupe MEMBRE
                    $this->surfeur->insertGroup($userId);
                    $this->surfeur->setId($userId);
                    $aDatas["user"] = $this->surfeur->Retrieve();
                    // genere le lien pour la validation du compte
                    $this->createConfirmEmail($aDatas["user"]);
//                    new Response("/create/user", $aDatas);
                    new Response($this->uri, $aDatas);
                } else {
                    $aDatas["message"] = "Échec Création user !";
                    new Response("/message", $aDatas);
                }
            }
        } catch (\Exception $e) {
//            var_dump($e);
            $aDatas["message"] = $e->getMessage();
            new Response("/message", $aDatas);
            exit;
        }
    }

    public function updateForm() {
        try {
            //  RÉCUPÉRER LES PARAMÈTRES CONTENUS DANS L'URI
            $userIdToModify = $this->getParamFromUri();

            $modelUser = new UsersProfile();
            $modelUser->setId($userIdToModify['user']);
            $aaDatas['users'] = $modelUser->Retrieve();

            $view = new Response($this->uri, $aaDatas);
            $view->Render();
        } catch (\Exception $e) {
            $e["message "] = $e->getMessage();
            new Response("message", $e);
        }
    }

    public function updateUserAction() {
        try {
            //  RÉCUPÉRER LES PARAMÈTRES CONTENUS DANS L'URI
            $userIdToModify = $this->getParamFromUri();

            $modelUser = new UsersProfile();
            $modelUser->setId($userIdToModify['user']);
            if ($modelUser->Update() > 0) {
                $datas["message"] = "Le profil utilisateur a bien été mis à jour !";
                $view = new Response("/message", $datas);
                $view->setTitle("Message de l'application");
                $view->Render();
            }
        } catch (\Exception $e) {
            $e["message "] = $e->getMessage();
            new Response("message", $e);
            exit;
        }
    }

    public function deleteUserForm() {
        //  RÉCUPÉRER LES PARAMÈTRES CONTENUS DANS L'URI
        $userIdToModify = $this->getParamFromUri();

        $modelUser = new UsersProfile();
        $modelUser->setId($userIdToModify['user']);
//        var_dump($modelUser);
        $modelUser->Retrieve();
        $aoUser["user"] = $modelUser;
//        var_dump($aoUser);
        new Response($this->setUriToViewFormat(), $aoUser);
    }

    public function deleteUserAction() {
        try {
            //  RÉCUPÉRER LES PARAMÈTRES CONTENUS DANS L'URI
            $userIdToModify = $this->getParamFromUri();

            $modelUser = new UsersProfile();

            $modelUser->setId($userIdToModify['user']);

//            $modelUser->Delete($this);
            if ($modelUser->Delete() > 0) {
                $datas["message"] = "L'utilisateur a bien été supprimé !";
//                echo "L'utilisateur a bien été supprimé !";
                new Response($this->setUriToViewFormat(), $datas);

//                var_dump($datas);
            } else {

                echo "Impossible de supprimer";
            }
        } catch (\Exception $e) {
            $e["message "] = $e->getMessage();
            new Response("message", $e);
            exit;
        }
    }

    public function getAllBy() {
        $array = [];

        $array = array('pseudo' => 'admin');
        $affiche = new UsersProfile();
        $affiche->getAllBy($array);
    }

    public function connexionUserAction() {

        $array = $this->inputPost();
        
       

            if (preg_match("#@#", $array['logIn'])) {
                $tab['email'] = $array['logIn'];
            } else {
                $tab['pseudo'] = $array['logIn'];
            }
            $tab['mot_de_passe'] = $array['mot_de_passe'];
            
       
        //  Recherche d'un utilisateur par son email ou son pseudo
        $user = new UsersProfile();
        $oUser = $user->getAllBy($tab);

        if ($oUser !== false) {
            $this->surfeur->init($oUser[0]);
            //  Création d'un token
            $this->security->generateToken($this->surfeur);
            $_SESSION['userGroup'] = "MEMBRE";

            //  Affichage de la page d'accueil membre
//            new Response("/dashboard");
            new Response("/accueil/membre");
        } else {
            //  Réaffichage du formulaire de connexion
            //  Avec un message indiquant une erreur sur les idantifiant
            $aDatas['errorCredentials'] = "Vos identifiants ne correspondent pas à un profil utilisateur !";
            new Response("/connexion/user/form", $aDatas);
        }
    }

    // creation de la methode de deconnexion
    public function deconnexion() {
        //  Initialisation du contexte de sécurité
        $this->securityLoader();

        $this->security->deactivate();
        unset($_SESSION['userGroup']);
        new Response($this->uri);
    }


    /** function qui genere le lien de validation de compte qui sera présent dans un mail
     * 
     * 
     */
    public function createConfirmEmail($surfeur) {
        // on genere un token pour creer un lien de verification
        $mail = $this->security->generateEmailToken($surfeur);
        // concatenation de l'url et du token
        $confirmLink = "/confirmMail/" . $mail;

        $surfeur->setConfirmLink($confirmLink);
    }

    /** creation de la function qui confirme la validation du profil à l'aide du lien
     *  qui a était generer lors de la creation du profil.
     */
    public function confirmMail() {
        // on recupere le lien et on explode
        $aUri = explode("/", $this->uri);
        // recuperation du token à verifier 
        $tkn = end($aUri);

//        echo __FILE__.__LINE__."<br>";
//        var_dump($tkn);

        // appelle de la function qui vas traiter et comparer le token
        $confirmation = $this->security->acceptConfirmEmail($tkn);
        // si la verification est confirmer
        if ($confirmation) {
            $aoUser = $this->surfeur->getAllBy(array("pseudo" => $confirmation->username));
            $userId = $aoUser[0]->getId();
            $this->surfeur->setId($userId);
            // on modifi la valeur de 'verif_profil' à 1 qui confirm la validation du profil, 0 par default
            $aPropVal['verif_profil'] = 1;
            $aPropVal['id'] = (int) $userId;
            // on envoie les données et on les mets à jours
            $this->surfeur->Update($aPropVal);
            $aMessage['messageCompteActive'] = "Votre compte est maintenant activé !";
            new Response($this->uri, $aMessage);
        }
    }
    
    public function showUserProfile() {
        $userId = $this->getParamFromUri();
        $user = new UsersProfile();
        $user->setId($userId["user"]);
        $aUser['user'] = $user->Retrieve();
        new Response($this->uri, $aUser);
    }
}