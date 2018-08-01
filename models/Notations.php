<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\models;


class Notations extends EntityModel
{
     private $id;
     private $avis;
     private $commentaire;
     private $date_publication;
     private $id_trajets;


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
                         * @return int
                         */
    
                        public function getAvis()
                        {
                            return $this->avis;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getCommentaire()
                        {
                            return $this->commentaire;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getDate_publication()
                        {
                            return $this->date_publication;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getId_trajets()
                        {
                            return $this->id_trajets;
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
                         * @param int
                         * @return bool
                         */
    
                        public function setAvis($avis)
                        {
                           if(preg_match("#^[0-9]+#", $avis)){
                                $this->avis = $avis;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setCommentaire($commentaire)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $commentaire)){
                                $this->commentaire = $commentaire;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param datetime
                         * @return bool
                         */
    
                        public function setDate_publication($date_publication)
                        {
                           if(preg_match("#^((\d{4})-((0[1-9])|(1[0-2]))-(((0[1-9])|(1\d)|(2\d)|(3[0-1])))[[:space:]]?(((([[:space:]])(([0-1][0-9])|([2][0-3]))(:[0-5][0-9]))((:[0-5][0-9])?))?))$#", $date_publication)){
                                $this->date_publication = $date_publication;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setId_trajets($id_trajets)
                        {
                           if(preg_match("#^[0-9]+#", $id_trajets)){
                                $this->id_trajets = $id_trajets;
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
            throw new \Exception("La création de 'Notations' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Retrieve(){
        $response = parent::Retrieve();
        if($response == 0 ):
            throw new \Exception("La récupération de 'Notations' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Update($aPropVal){
        $response = parent::Update($aPropVal);
        if($response == 0 ):
            throw new \Exception("La mise à jour de 'Notations' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Delete(){
        $response = parent::Delete();
        if($response == 0 ):
            throw new \Exception("La suppression de 'Notations' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }
}