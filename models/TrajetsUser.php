<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\models;


class TrajetsUser extends Trajets
{

    private $pseudo;
    private $date_aller;
    private $tarif;
    private $role;
    private $roleShortName;
    private $lat;
    private $lng;
    private $place;
    private $type_lieu;
    private $type_trajet;


    public function __construct($idUser)
    {
//        var_dump($this);
        parent::__construct();
        $this->setId_users($idUser);
//        $this->setIdUser($idUser);
    }

    /*
     *      GETTERS
     */
    public function getIdUser(){
        return $this->idUser;
    }
    public function getPseudo(){
        return $this->pseudo;
    }
    public function getDate_aller(){
        return date("d/m/Y");
    }
    public function getTarif(){
        return $this->tarif;
    }
    public function getRole(){
        return $this->role;
    }
    public function getRoleShortName(){
        return $this->roleShortName;
    }
    public function getLat(){
        return $this->lat;
    }
    public function getLng(){
        return $this->lng;
    }
    public function getPlace(){
        return $this->place;
    }
    public function getType_lieu(){
        return $this->type_lieu;
    }
    public function getType_trajet(){
        return $this->type_trajet;
    }

            

    /*
     *      SETTERS
     */
    public function setIdUser($idUser){
        $this->idUser = $idUser;
    }
    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }
    public function setDate_aller($date_aller){
        $this->date_aller = $date_aller;
    }
    public function setTarif($tarif){
        $this->tarif = $tarif;
    }
    public function setRole($role){
        $this->role = $role;
    }
    public function setRoleShortName($roleShortName){
        $this->roleShortName = $roleShortName;
    }
    public function setLat($lat){
        $this->lat = $lat;
    }
    public function setLng($lng){
        $this->lng = $lng;
    }
    public function setPlace($place){
        $this->place = $place;
    }
    public function setType_lieu($type_lieu){
        $this->type_lieu = $type_lieu;
    }
    public function setType_trajet($type_trajet){
        $this->type_trajet = $type_trajet;
    }

            



    /*
     *      PUBLIC METHODS
     */
    public function getUserTrips(){
        $aoTrajets = ($this->dao->getUserTrips($this));
        return $aoTrajets;
    }

    public function getAllDeparts(){
        $aDepartureCities = ($this->dao->getAllDeparts($this));
        return $aDepartureCities;
    }





    /*
     *      CRUD TO SEND CUSTOMIZED EXCEPTIONS FROM FAILED QUERIES
     */
    public function Create($post) {
        $response = parent::Create($post);
        if($response == 0 ):
            throw new \Exception("La créationde vos 'Trajets' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Retrieve(){
        $response = parent::Retrieve();
        if($response == 0 ):
            throw new \Exception("La récupérationde vos 'Trajets' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Update($aPropVal){
        $response = parent::Update($aPropVal);
        if($response == 0 ):
            throw new \Exception("La mise à jourde vos 'Trajets' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Delete(){
        $response = parent::Delete();
        if($response == 0 ):
            throw new \Exception("La suppressionde vos 'Trajets' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }
}