<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\models;


class Lieux extends EntityModel
{
     private $id;
     private $lat;
     private $lng;
     private $libelle;


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
                         * @return double
                         */
    
                        public function getLat()
                        {
                            return $this->lat;
                        }

            
                        /**
                         * @return double
                         */
    
                        public function getLng()
                        {
                            return $this->lng;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getLibelle()
                        {
                            return $this->libelle;
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
                         * @param double
                         * @return bool
                         */
    
                        public function setLat($lat)
                        {
                           if(preg_match("#^[0-9]{1,}\.[0-9]{1,}$#", $lat)){
                                $this->lat = $lat;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param double
                         * @return bool
                         */
    
                        public function setLng($lng)
                        {
                           if(preg_match("#^[0-9]{1,}\.[0-9]{1,}$#", $lng)){
                                $this->lng = $lng;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setLibelle($libelle)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $libelle)){
                                $this->libelle = $libelle;
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
            throw new \Exception("La création de 'Lieux' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Retrieve(){
        $response = parent::Retrieve();
        if($response == 0 ):
            throw new \Exception("La récupération de 'Lieux' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Update($aPropVal){
        $response = parent::Update($aPropVal);
        if($response == 0 ):
            throw new \Exception("La mise à jour de 'Lieux' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Delete(){
        $response = parent::Delete();
        if($response == 0 ):
            throw new \Exception("La suppression de 'Lieux' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }
}