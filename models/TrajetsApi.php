<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\models;


class TrajetsApi extends Trajets
{

    public function __construct()
    {
        parent::__construct();
    }

    /*
     *      GETTERS
     */

            

    /*
     *      SETTERS
     */

            



    /*
     *      PUBLIC METHODS
     */

    public function getAllPlaces(){
        $aDepartureCities = ($this->dao->getAllPlaces());
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