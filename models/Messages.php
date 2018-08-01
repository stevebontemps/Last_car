<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\models;


class Messages extends EntityModel
{
     private $id;
     private $contenu;
     private $date;
     private $objet;
     private $statut_message;
     private $id_users;
     private $id_users_recevoir;


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
    
                        public function getContenu()
                        {
                            return $this->contenu;
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
    
                        public function getObjet()
                        {
                            return $this->objet;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getStatut_message()
                        {
                            return $this->statut_message;
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
    
                        public function getId_users_recevoir()
                        {
                            return $this->id_users_recevoir;
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
    
                        public function setContenu($contenu)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $contenu)){
                                $this->contenu = $contenu;
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
    
                        public function setObjet($objet)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $objet)){
                                $this->objet = $objet;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setStatut_message($statut_message)
                        {
                           if(preg_match("#^[0-9]+#", $statut_message)){
                                $this->statut_message = $statut_message;
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
    
                        public function setId_users_recevoir($id_users_recevoir)
                        {
                           if(preg_match("#^[0-9]+#", $id_users_recevoir)){
                                $this->id_users_recevoir = $id_users_recevoir;
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
            throw new \Exception("La création de 'Messages' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Retrieve(){
        $response = parent::Retrieve();
        if($response == 0 ):
            throw new \Exception("La récupération de 'Messages' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Update($aPropVal){
        $response = parent::Update($aPropVal);
        if($response == 0 ):
            throw new \Exception("La mise à jour de 'Messages' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Delete(){
        $response = parent::Delete();
        if($response == 0 ):
            throw new \Exception("La suppression de 'Messages' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }
}