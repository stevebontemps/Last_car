<?php
/**
 * Created by PhpStorm.
 * User: padbrain
 * Date: 03/07/18
 * Time: 15:17
 */

namespace Lastcar\controllers;

use \Lastcar\core\Controller;
use \Lastcar\core\Response;
use Lastcar\models\Roles;
use Lastcar\models\Trajets;
use Lastcar\models\TrajetsUser;
use Lastcar\models\Vehicules;

class SurfeurController extends Controller{

    /**
     * Affichage du formulaire de modification d'un profil utilisateur
     *
     * Les données attendues dans le formulaire sont :
     * $users : qui représente le surfeur
     * $vehicule : qui représente le véhicule du surfeur
     */
    public function updateProfilForm() {
        //  Il s'agit du profil du seurfeur
        $aDatas["users"] = $this->surfeur;

        //  Récupération de tous les modèles de véhicules
        $oVéhicle = new Vehicules();
        $aDatas['vehicules'] = $oVéhicle->getAll();
//        var_dump($aDatas['vehicules']->getMarque());

        //  Récupération du véhicule


        new Response($this->uri, $this->arrayLinear($aDatas));
    }
    
    public function updateProfilAction() {
        /*
         * recuperation des inputs dans une variable
         */
        $post = $this->inputPost();
            /*
             * on choisit le formulaire à modifier grace à la valeur du name 
             * present dans le bouton 
             */
            switch ($post){
                case (isset($post['motDePasse'])):
                    $this->modifMotDePass($post);
                    break;
                case (isset($post["infoProfil"])):
                    $this->modifInfosProfil($post);
                    break;
                case (isset($post["vehicule"])):
                    $this->modifVehicule($post);
                    break;
            }

    }
    
// function qui met à jours le mot de passe    
    private function modifMotDePass($post){
        /*
         * on verifie les entrées du formulaire
         */
        $aDatas = $this->verifForm($this->surfeur, $post);
        /*
         * si le mot de passe actuel tapé dans l'INPUT
         * est different de celui stocké dans la BDD
         * on genere un message d'erreur
         */
        if($post["mot_de_passe"] !== $this->surfeur->getMot_de_passe()){
            $aErrorMessage["mot_de_passeInError"] = "Mot de passe erroné !";
        }
        /*
         * Vérification que le nouveau mot de passe choisi corresponde bien
         * en lui demandant de retaper celui-ci dans un autre input.
         * 
         * si les deux mot de passe correspondent pas alors on genere un message d'erreur
         */
        if($post["nouveau_mot_de_passe"] !== $post['verif_mot_de_passe']) {
            $aErrorMessage["verif_mot_de_passeInError"] = "Les deux mots de passe ne correspondent pas !";
        }
        /*
         * si les informations entrer dans les input on des erreurs
         * on affiche les message en leur precisant l'endroit de l'erreur
         */
        if (!is_null($aDatas) || isset($aErrorMessage)) {
            $datas['mot_de_passe'] = $post["mot_de_passe"];
            $datas['nouveau_mot_de_passe'] = $post["nouveau_mot_de_passe"];
            $datas['verif_mot_de_passe'] = $post["verif_mot_de_passe"];
            $aDatas["error"] = $aErrorMessage;
            $aDatas["autres"] = $datas;
        }/*
         * si aucune erreur est detecter alors on met à jours le mot de passe
         * on remplace l'ancien par le nouveau
         */
        else {
            try{
                if($this->surfeur->Update(array("mot_de_passe" => $post['nouveau_mot_de_passe']))){
                    $aDatas["message"] = "Votre mot de passe a bien été modifié !";
                } 
            } catch (Exception $ex) {
                new Response("message", $aData["message"] = $ex->getMessage());
            }
        }
        $aDatas['users'] = $this->surfeur;
        new Response("/profil/form", $this->arrayLinear($aDatas));
    }
    
    private function modifInfosProfil($post){

        /*  Vérification des entrées du formulaire
         *  Après exécution de la méthode verifForm,
         *  l'objet $this->>surfeur est mis à jour avec
         *  les valeurs saisies dans le formulaire (si ces dernières
         *  ont le bon format)
         *
         *  Si toutes les données ont le bon format,
         *  $aDatas vaut null
         */
//        var_dump($this->surfeur);
        $aDatas = $this->verifForm($this->surfeur, $post);
//        var_dump($this->surfeur);
//        echo __FILE__.__LINE__;
//        var_dump($aDatas);
//        echo __FILE__.__LINE__;


        /*  Mise à jour du json représentant les données
         *  que l'utilisateur souhaite ou non rendre
         *  visibles
         */

        //  Récupération du Json sous forme de tableau pour récupérer les clefs de chaque champ
        $actualJson =$this->surfeur->getJSon_visibility();

        //  Reset des valeurs de toutes les clefs
        $actualJson = array_map(function ($value){return $value = 0;}, $actualJson);

        //  Mise à jour des valeurs des clefs avec les valeurs saisies dans le formulaire
        foreach ($post as $key => $value) {
            if(array_key_exists($key, $actualJson)){
                $actualJson[$key] = 1;
            }
        }

        //  Mise à jour de $this->>surfeur avec le nouveau Json
        $this->surfeur->setJSon_visibility($actualJson);

        /*
         *  Mise à jour du profil de $this->surfeur en BDD
         *  si aucune erreur n'a été détectée (ie : $aDatas == null
         */
        if(is_null($aDatas)){
            //  Pas d'erreur détectée
            if($this->surfeur->UpdateProfil() == 0){
                //  Aucune modification n'a été effectuée
                //  Préparation d'un message d'information
                $aDatas["message"] = "Aucune modification n'a été effectuée !";
            }
        }else{
            //  implémenter si erreur
        }
        $aDatas["users"] = $this->surfeur;
        
        new Response($this->uri."/form", $this->arrayLinear($aDatas));
    }
    
    
    private function modifVehicule($post){
        var_dump($post);
    }


    /**mise à jour de l'image
     * telechargement de l'image et insertion dans un dossier lié avcec la BDD
     */
    public function updateImage() {
        
        // si une image existe on la supprime du serveur 
        if (file_exists($this->surfeur->getPhoto())) {
            $this->deleteImageOnServeur($this->surfeur->getPhoto());
        }  
        // si on click sur valider sans ajouter de photo on forece une image d'origin
        if ($_FILES["photo"]['error']==4) {
                $name = "/upload/imagesUsersPriv/img.png";
            } else {
                // on extrait l'extention de l'image pour pouvoir la renomé
                $extension = strtolower(substr(strrchr($_FILES["photo"]['name'], '.'), 1));
                // on indique le dosssier ou vas etre enregistrer l'image dans le serveur
                $uploads_direction =  'upload/imagesUsers';
                // si l'extention est différentes des extentions autorisé 
                if (isset($extension) != ("png" || "jpeg" || "jpg" || "gif")) {

                    echo "le format de la photo n'est pas permise";
                    
                } else {

                    $tmp_name = $_FILES["photo"]["tmp_name"];
                    /* on concatene le chemin ou vas etre stocker la photo avec le nom de l'image que l'on redefinis
                     * à l'aide du pseudo de l'utilisateur pour qu'elle soit lié à l'utilisateur on ajoute ensuite un temps en second
                     * on lui rajoute son extension à la fin.
                     */
                    $name = $uploads_direction . '/' . $this->surfeur->getPseudo() . '_'  . time() . '.' . $extension;
                    /*
                     * on envoi l'image dans le dossier 
                     */
                    if (move_uploaded_file($tmp_name, $name)) {
                        echo 'Upload effectuer avec succes';
                    }
                }
            }
        
            $aPropval['photo'] = $name;
            // on met à jour la base de donnée contenant l'url de l'image que l'on a concatener
            $this->surfeur->Update($aPropval);
            
            $aDatas['user'] = $this->surfeur;
            
        header("location:/dashboard");
            new Response($this->uri, $aDatas);
        
            
    }
    /** suppression de l'image du profil
     * 
     */
    public function deleteImageProfil(){
        // on verifie que l'image existe bien
        if (file_exists($this->surfeur->getPhoto())) {
            // on appel la function qui effectue la suppression
            $result = $this->deleteImageOnServeur($this->surfeur->getPhoto());
        }  
        // si la suppression à été effectuer avec succes on la remplace par l'image d'origne
        if($result !== false){
            $aPropval['photo'] = "/upload/imagesUsersPriv/img.png";   

            $this->surfeur->Update($aPropval);
        }
        header("location:/dashboard");
    }

    /** function suppression de l'image sur le serveur
     * 
     */
    private function deleteImageOnServeur($lien) {
        // on verifie que l'image que l'on souhaite supprimer n'est pas celle imposer par le site
        if($lien!=="/upload/imagesUsersPriv/img.png"){
        
             return unlink($lien);
        }
        else{
            return false;
        }
       
        
    }
    
    public function dashboard(){

//        $role = new Roles();
//        $roleConducteur = $role->getAllBy(array("short_name" => "CONDUCTEUR"));

//var_dump($roleConducteur[0]);
//var_dump($roleConducteur[0]->getId());
//        $reflexion = new \ReflectionClass($roleConducteur[0]);
//var_dump($reflexion);


        $aDatas['user'] = $this->surfeur;
//        var_dump($this->surfeur);
        $aDatas['trajets'] = (new TrajetsUser($this->surfeur->getId()))->getUserTrips();
//        var_dump($aDatas['trajets']);
        $this->render($aDatas);
//        new Response($this->uri, $aDatas);
    }
    
    
}
