<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\models;


class Trajets extends EntityModel
{
     private $id;
     private $depart;
     private $destination;
     private $date_aller;
     private $heure_aller;
     private $information;
     private $tarif;
     private $validation_trajet;
     private $retour_id;
     private $id_users;
     private $id_evenements;
     private $id_types_trajets;


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
    
                        public function getDate_aller()
                        {
                            return $this->date_aller;
                        }

            
                        /**
                         * @return time
                         */
    
                        public function getHeure_aller()
                        {
                            return $this->heure_aller;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getInformation()
                        {
                            return $this->information;
                        }

            
                        /**
                         * @return smallint
                         */
    
                        public function getTarif()
                        {
                            return $this->tarif;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getValidation_trajet()
                        {
                            return $this->validation_trajet;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getRetour_id()
                        {
                            return $this->retour_id;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getId_users()
                        {
                            return $this->id_users;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getId_evenements()
                        {
                            return $this->id_evenements;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getId_types_trajets()
                        {
                            return $this->id_types_trajets;
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
                                $this->depart = $depart;
//                                var_dump($this->depart);
                           if(is_string($depart)){
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
                                $this->destination = $destination;
//                                var_dump($this->destination);
                           if(is_string($destination)){
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param datetime
                         * @return bool
                         */
    
                        public function setDate_aller($date_aller)
                        {
                           if(preg_match("#^((\d{4})-((0[1-9])|(1[0-2]))-(((0[1-9])|(1\d)|(2\d)|(3[0-1])))[[:space:]]?(((([[:space:]])(([0-1][0-9])|([2][0-3]))(:[0-5][0-9]))((:[0-5][0-9])?))?))$#", $date_aller)){
                                $this->date_aller = $date_aller;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param time
                         * @return bool
                         */
    
                        public function setHeure_aller($heure_aller)
                        {
                           if(is_string($heure_aller)){
                                $this->heure_aller = $heure_aller;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setInformation($information)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $information)){
                                $this->information = $information;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param smallint
                         * @return bool
                         */
    
                        public function setTarif($tarif)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/*-+%$)?]{1,}$#", $tarif)){
                                $this->tarif = $tarif;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setValidation_trajet($validation_trajet)
                        {
                           if(preg_match("#^[0-9]+#", $validation_trajet)){
                                $this->validation_trajet = $validation_trajet;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setRetour_id($retour_id)
                        {
                           if(preg_match("#^[0-9]+#", $retour_id)){
                                $this->retour_id = $retour_id;
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

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setId_evenements($id_evenements)
                        {
                           if(preg_match("#^[0-9]+#", $id_evenements)){
                                $this->id_evenements = $id_evenements;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setId_types_trajets($id_types_trajets)
                        {
                           if(preg_match("#^[0-9]+#", $id_types_trajets)){
                                $this->id_types_trajets = $id_types_trajets;
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