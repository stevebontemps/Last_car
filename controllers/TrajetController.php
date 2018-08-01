<?php

namespace Lastcar\controllers;

use Lastcar\core\Controller;
use Lastcar\core\Response;
use Lastcar\models\L_users_trajets_roles;
use Lastcar\models\Roles;
use Lastcar\models\Trajets;
use Lastcar\models\Lieux;
use Lastcar\models\L_lieux_trajets_types;
use Lastcar\models\TrajetsLoaded;
use Lastcar\models\TrajetsUser;

class TrajetController extends Controller {
    
    
    private function calculTrip($distance) {
        
        try {
           
            $calcul = $distance * 5 / 100;
            $resultat = $calcul * 1.40;
            
            $post = $this->inputPost();
            
            $prixPassager = ($resultat * 25) /100;
            
            return (ceil($prixPassager));
            
        } catch (\Exception $e) {
//            vardump($e);
            $aDatas["message"] = $e->getMessage();
            new Response("/message", $aDatas);
            exit;
        }
            
    }

    public function getInfo(){
        $post = $this->inputPost();
//        var_dump($post);
        $prix = $this->calculTrip($post['distance']);
        $trajet = new Trajets();
        $trajet->setDepart($post['depart']);
        $trajet->setDestination($post['arriver']);
        $trajet->setHeure_aller($post['heure_aller']);
        $heure = ", Heure : ".$post['date_aller'] . " " . $post['heure_aller'];
        $data = array("prix" => $prix, "trajets" => $trajet, "heure" => $heure, "post" => $post);
        new Response($this->uri, $data);
    }

    public function addTrajet(){
        $post = $this->inputPost();
//        var_dump($post);
        $depart = new Lieux();
        $id_depart = $depart->Create(array(
            "lat" => $post['lat_d'],
            "lng" => $post['lng_d'],
            "libelle" => $post['depart']
        ));

        $arrive = new Lieux();
        $id_arriver = $arrive->Create(array(
            "lat" => $post['lat_a'],
            "lng" => $post['lng_a'],
            "libelle" => $post['arriver']
        ));

        $trajet = new Trajets();
        $id_trajet = $trajet->Create(array(
            "depart" => $post['depart'],
            "destination" => $post['arriver'],
            "date_aller" => $post['date'],
            "heure_aller" => $post['heure'],
            "information" => $post['information'],
            "tarif" => $post['price'],
            "id_users" => $this->surfeur->getId(),
            "id_types_trajets" => "1"
        ));

        $liaison_depart = new L_lieux_trajets_types();
        $liaison_depart->Create(array(
            "id" => $id_trajet,
            "id_lieux" => $id_depart,
            "id_types_lieux" => "1"
        ));

        $liaison_arriver = new L_lieux_trajets_types();
        $liaison_arriver->Create(array(
            "id" => $id_trajet,
            "id_lieux" => $id_arriver,
            "id_types_lieux" => "2"
        ));

        $role = new Roles();
        $roleConducteur = $role->getAllBy(array("short_name" => "CONDUCTEUR"));

        $liaison_role = new L_users_trajets_roles();
        $liaison_role->Create(array(
            "id_users" => $this->surfeur->getId(),
            "id_roles" => $roleConducteur[0]->getId(),
            "id_trajets" => $id_trajet
        ));

        header("location:/dashboard");
    }

    public function showListTrips(){
        $aDatas['titre'] = "Les derniers trajets";
        $aDatas['user'] = $this->surfeur;
        $entity = new TrajetsLoaded();
        $aDatas['trajets'] = $entity->getLastTrips();
//var_dump($aDatas);
        $this->render($aDatas);

    }

    public function showSelectTrips(){
        $post = $this->inputPost();
        $aDatas['titre'] = "Trajets recherchés";
        $aDatas['user'] = $this->surfeur;
        $entity = new TrajetsLoaded();
        $entity->setDepart($post['depart']);
        $entity->setDestination($post['destination']);
        $aDatas['trajets'] = $entity->getSelectTrips();
//var_dump($aDatas);

        $this->render($aDatas);

    }
    
}

