<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\models;


class Alerts extends EntityModel
{
     private $id;
     private $depart;
     private $destination;
     private $date;
     private $traitement;
     private $id_users;


    /*
     *      GETTERS
     */


                        /**
                         * @return int
                         */
    
                        public function getId()
                        {
                            return $this->id;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getDepart()
                        {
                            return $this->depart;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getDestination()
                        {
                            return $this->destination;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getDate()
                        {
                            return $this->date;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getTraitement()
                        {
                            return $this->traitement;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getId_users()
                        {
                            return $this->id_users;
                        }

            

    /*
     *      SETTERS
     */


                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setId($id)
                        {
                           if(preg_match("#^[0-9]+#", $id)){
                                $this->id = $id;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setDepart($depart)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $depart)){
                                $this->depart = $depart;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setDestination($destination)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $destination)){
                                $this->destination = $destination;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param datetime
                         * @return bool
                         */
    
                        public function setDate($date)
                        {
                           if(preg_match("#^((\d{4})-((0[1-9])|(1[0-2]))-(((0[1-9])|(1\d)|(2\d)|(3[0-1])))[[:space:]]?(((([[:space:]])(([0-1][0-9])|([2][0-3]))(:[0-5][0-9]))((:[0-5][0-9])?))?))$#", $date)){
                                $this->date = $date;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setTraitement($traitement)
                        {
                           if(preg_match("#^[0-9]+#", $traitement)){
                                $this->traitement = $traitement;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setId_users($id_users)
                        {
                           if(preg_match("#^[0-9]+#", $id_users)){
                                $this->id_users = $id_users;
                                return true;
                           }else{
                                return false;
                           }
                        }

            



    /*
     *      CRUD TO SEND CUSTOMIZED EXCEPTIONS FROM FAILED QUERIES
     */
    public function Create($post) {
        $response = parent::Create($post);
        if($response == 0 ):
            throw new \Exception("La création de 'Alerts' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Retrieve(){
        $response = parent::Retrieve();
        if($response == 0 ):
            throw new \Exception("La récupération de 'Alerts' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Update($aPropVal){
        $response = parent::Update($aPropVal);
        if($response == 0 ):
            throw new \Exception("La mise à jour de 'Alerts' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Delete(){
        $response = parent::Delete();
        if($response == 0 ):
            throw new \Exception("La suppression de 'Alerts' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }
}