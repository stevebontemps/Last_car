<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\models;


class Evenements extends EntityModel
{
     private $id;
     private $nom;
     private $date;
     private $info;
     private $image;
     private $id_types_evenements;
     private $id_types_lieux;


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
    
                        public function getNom()
                        {
                            return $this->nom;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getDate()
                        {
                            return $this->date;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getInfo()
                        {
                            return $this->info;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getImage()
                        {
                            return $this->image;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getId_types_evenements()
                        {
                            return $this->id_types_evenements;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getId_types_lieux()
                        {
                            return $this->id_types_lieux;
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
    
                        public function setNom($nom)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $nom)){
                                $this->nom = $nom;
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
                         * @param string
                         * @return bool
                         */
    
                        public function setInfo($info)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $info)){
                                $this->info = $info;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setImage($image)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $image)){
                                $this->image = $image;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setId_types_evenements($id_types_evenements)
                        {
                           if(preg_match("#^[0-9]+#", $id_types_evenements)){
                                $this->id_types_evenements = $id_types_evenements;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setId_types_lieux($id_types_lieux)
                        {
                           if(preg_match("#^[0-9]+#", $id_types_lieux)){
                                $this->id_types_lieux = $id_types_lieux;
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
            throw new \Exception("La création de 'Evenements' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Retrieve(){
        $response = parent::Retrieve();
        if($response == 0 ):
            throw new \Exception("La récupération de 'Evenements' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Update($aPropVal){
        $response = parent::Update($aPropVal);
        if($response == 0 ):
            throw new \Exception("La mise à jour de 'Evenements' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Delete(){
        $response = parent::Delete();
        if($response == 0 ):
            throw new \Exception("La suppression de 'Evenements' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }
}