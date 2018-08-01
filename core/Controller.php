<?php
namespace Lastcar\core;

use Lastcar\core\SecurityMiddleware;
use Lastcar\core\Response;
use Lastcar\models\Surfeur;
//use Lastcar\models\Users;

/**
 * 
 * La classe Controller sert de conteneur pour les developpeurs souhaitant beneficier
 * d'un cadre de developpement de la couche "active".
 * Le fonctionnement est que le client web utilise le protocole http 
 * pour executer la bonne methode du controlleur.
 * Le controlleur effectue le traitement et si besoin, s'appuie sur le dao.
 * a la fin du traitement le controlleur retourne la réponse au client.
 *
 * @author loic
 */
abstract class Controller {
    
    use Utilities;
    /**
     * Cette propriété correspond a la variable superglobale $_GET, 
     * elle sera initialisée a la création d'un controlleur 
     * 
     * @var array
     */
    private $get;
    
    /**
     * Cette propriété correspond a la variable superglobale $_POST, 
     * elle sera initialisée a la création d'un controlleur
     * 
     * @var array 
     */
    private $post;

    /**
     * Cette propriété correspond a la variable superglobale $_SERVER['REQUEST_URI'],
     * elle sera initialisée a la création d'un controlleur
     *
     * @var array
     */
    protected $uri;

    /**
     *  Un pointeur vers le profil de l'utilisateur en cours
     * @var Surfeur
     *
     */
    protected $surfeur;
    
    /**
     ** Cette propriété sera initialisée lors de l'appel de la methode securityLoader()
     * @var SecurityMiddleware 
     */
    protected $security;

    /**
     *  Cette propriété contient les tableaux de collections d'objets provenant de la BDD
     *  et destinés à l'affichage dans les vues
     * @var
     */
    protected $aDatasToDisplay;

    /**
     * Cette propriété contient les messages à afficher dans les vues
     * @var
     */
    protected $aSuccessMessages;

    /**
     * Cette propriété contient les messages d'erreurs à afficher dans les vues
     * @var
     */
    protected $aErrorMessages;

    /**
     * Initialise le contexte de security.
     */
    protected function securityLoader() {
        $this->security = new SecurityMiddleware();
    }

    /**
     * Le constructeur sera invoqué a la création des objets heritant de cette classe Controller
     * ##   il initialise ses propriétés ($get, $post, $uri) avec les valeurs des superglobales.
     * ##   il récupère le jwt du client
     * ##   et initialise le profil de l'utilisateur
     *
     * 
     */
    function __construct() {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->uri = $_SERVER['REQUEST_URI'];

        //  Initialisation du contexte de sécurité
        $this->securityLoader();
        
        //  Un cookie est-il présent chez le client ?
        //  Et/Ou La connexion est elle légitime ?
        $acceptConnexion = $this->security->acceptConnexion();
//var_dump($acceptConnexion);
        //  Tableau des profils ayant des droits sur la ressource demandée
        if(!$aHaveRights = (Response::haveRights($this->uri))){
            new Response("/error404");
            die();
        }
//            echo __FILE__.__LINE__."<br>";
//var_dump($aHaveRights);
//            echo __FILE__.__LINE__."<br>";

//var_dump($aHaveRights);

        $this->surfeur = new Surfeur();

        //  S'il n'y a aucun cookie
        if(!$acceptConnexion)
        {
//            var_dump($acceptConnexion);
            //  Initialisation de l'utilisateur du site avec un profil "VISITEUR"
            $this->surfeur->setGroup("VISITEUR");

        }
        else
        {   //  sinon
            //  Initialisation de l'utilisateur du site avec le profil contenu dans le token
//            var_dump($acceptConnexion);
            $this->surfeur->init($acceptConnexion);
//            var_dump($this->surfeur);
            $this->security->generateToken($this->surfeur);
        }
//        var_dump($this->surfeur->getGroup());
        if(array_key_exists($this->surfeur->getGroup(), $aHaveRights) && $aHaveRights[$this->surfeur->getGroup()] == true){
            $_SESSION['userGroup'] = $this->surfeur->getGroup();
        }else{
            //  Affichage du formulaire de connexion
            //  Avec un message indiquant une erreur sur les identifiants
            $aDatas['errorCredentials'] = "Vous devez être connecté pour accéder à cette page !";
            new Response("/connexion/user/form", $aDatas);
//                $aDatas['message'] = "Vous devez être connecté pour accéder à cette page !";
//                new Response("/message", $aDatas);
            die();
        }
    }

    /**
     * retourne la propriété $get afin de la rendre disponible aux developpeurs
     * souhaitant étendre cette classe
     * 
     * @return array
     */
    protected function inputGet(){
        return $this->get;
    }
    
    /**
     * retourne la propriété $post afin de la rendre disponible aux developpeurs
     * souhaitant étendre cette classe
     * 
     * @return array
     */
    protected function inputPost() {
        return $this->post;
    }

    /**
     * La ressource à exécuter
     * @return array
     */
    protected function getUri(){
        return $this->uri;
    }

    /**
     * Rendu de la vue
     * @param $uri
     */
    protected function render($aDatas, $uri = null){
//var_dump($aDatas);
        $uri = (is_null($uri))? $this->uri : $uri;
        //  Linéarisation des Datas attendues par la vue
//        $aDatas = null;
//        $aDatas['displayBddDatas']  = (isset($this->aDatasToDisplay))?$this->aDatasToDisplay:null;
//        $aDatas['successMessages']  = (isset($this->aSuccessMessages))?$this->aSuccessMessages:null;
//        $aDatas['errorMessages']  = (isset($this->aErrorMessages))?$this->aErrorMessages:null;
//        $aDatas = (isset($aData))?$this->arrayLinear($aDatas):null;

        //  Rendu de la vue
        new Response($uri, $aDatas);
    }

    /**
     * Affiche une vue sans paramètre à afficher
     */
    public function showForm(){
        $vue = new Response($this->uri);
    }

    /**
     * Extrait les paramètres de l'URI et retourne un tableau
     * avec les éléments ciblés en clefs et leur valeur (id) associées
     * @return array
     */
    protected function getParamFromUri() : array{
        //  RÉCUPÉRATION DE L'URI DANS UN TABLEAU
        $uri = explode("/", rtrim($this->uri, "/"));

        //  $aParams EST LA RÉPONSE RETOUNÉE EN FIN DE TRAITEMENT
        $aParams = [];

        //  Chaque élément de l'URI est traité
        foreach ($uri as $value){
            //  et récupéré dans un tableau sous forme de
            if((int)$value > 0){
                //  valeur
                if(isset($key)) $aParams[strtolower($key)] = $value;
            }else{
                //  ou de clef
                $key = $value;
            }
        }
        //  Le tableau de paramètres est retourné
        return $aParams;
    }

    /**
     * Plus utilisée : à supprimer après confirmation tests
     * @return string
     */
    protected function setUriToViewFormat():string {
        
        // RECUPERATION sous forme de tableau de l'URI d'origine
        $uri= explode("/", $this->uri);

        //  Le tableau est parsé
        foreach ($uri as $key=>$items){
            //  Et les valeurs entières sont remplacées
            if ((int)$items) {
               $uri[$key]= "(:)";
            }
        }

        //  Retourne la nouvelle URI utilisable par la classe Response
        return implode("/", $uri);
    }

    /**
     * Vérification des formats des champs des formulaires postés
     * @param $entity : l'entité persistante de référence
     * @param $param : les données à vérifier. Typiquement => $this->post
     * @return null
     */
    protected function verifForm($entity, $param = null) {

        //  Initialisation par défaut de $param avec les valeurs postées par un formulaire
        if(is_null($param)) $param = $this->inputPost();

        //  Initialisation de la valeur de retour de la réponse renvoyée par la méthode
        $response = null;
        //  Tableau des messages d'erreurs à retourner
        $message = null;

        //  Pour chaque champ du formulaire
        foreach($param as $key => $value){
            //  COnstruction du nom de la méthode associées au champ à contrôler
            $function = "set". ucfirst($key);

            //  Si une méthode est associée au champ à contrôler en cours
            if(method_exists($entity, $function)){
                //  Mémorisation du champ et de sa valeur en cas d'erreur de format
                $datas[$key] = $value;

                //  Appel de la méthode de vérification dans l'entité correspondante associée
                if(!call_user_func(array($entity, $function), $value)){
                    //  Un retour à false dénère un message en retour
                    $message[$key."InError"] = "Votre " . str_replace("_", " ", $key) . " n'est pas valide !";
                //                   echo __FILE__.__LINE__;
                //                   var_dump($message);
                //                   echo __FILE__.__LINE__;
                }
                //  S'il existe des messages, initialisation de la réponse dans un tableau de tableaux
                if(!is_null($message)){
                   $response["datas"] = $datas;
                   $response["message"] = $message;
                }
           }
        }
//                   echo __FILE__.__LINE__;
//        var_dump($response);
//                   echo __FILE__.__LINE__;
        return $response;
    }
    
    protected function arrayLinear($array){
        //  Méthode provenant de Utilities
        return $this->array_linear($array);
    }

}
