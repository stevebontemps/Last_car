<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\models;


class TrajetsLoaded extends Trajets
{
//     private $id;
//     private $depart;
//     private $destination;
//     private $date_aller;
//     private $heure_aller;
//     private $information;
//     private $tarif;
//     private $validation_trajet;
//     private $retour_id;
//     private $id_users;
//     private $id_evenements;
//     private $id_types_trajets;

     private $id_user;
     private $pseudo;
     private $photo;


    /*
     *      GETTERS
     */

    public function getId_user(){
        return $this->id_user;
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function getPhoto(){
        return $this->photo;
    }

            

    /*
     *      SETTERS
     */

    public function setId_user($idUser){
        $this->id_user = $idUser;
    }

    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

    public function setPhoto($photo){
        $this->photo = $photo;
    }



    /*
     *      PUBLIC METHODS
     */

    public function getLastTrips(){
        $aoLastTrips = ($this->dao->getLastTrips($this));
//        var_dump($aoLastTrips);
        return $aoLastTrips;
    }

    public function getSelectTrips(){
        $aoLastTrips = ($this->dao->getSelectTrips($this));
//        var_dump($aoLastTrips);
        return $aoLastTrips;
    }

            



    /*
     *      CRUD TO SEND CUSTOMIZED EXCEPTIONS FROM FAILED QUERIES
     */
    public function Create($post) {
        $response = parent::Create($post);
        if($response == 0 ):
            throw new \Exception("La création de 'Trajets' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Retrieve(){
        $response = parent::Retrieve();
        if($response == 0 ):
            throw new \Exception("La récupération de 'Trajets' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Update($aPropVal){
        $response = parent::Update($aPropVal);
        if($response == 0 ):
            throw new \Exception("La mise à jour de 'Trajets' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Delete(){
        $response = parent::Delete();
        if($response == 0 ):
            throw new \Exception("La suppression de 'Trajets' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }
}