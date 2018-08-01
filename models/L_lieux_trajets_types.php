<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\models;


class L_lieux_trajets_types extends EntityModel
{
     private $id;
     private $id_lieux;
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
                         * @return int
                         */
    
                        public function getId_lieux()
                        {
                            return $this->id_lieux;
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
                         * @param int
                         * @return bool
                         */
    
                        public function setId_lieux($id_lieux)
                        {
                           if(preg_match("#^[0-9]+#", $id_lieux)){
                                $this->id_lieux = $id_lieux;
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
            throw new \Exception("La création de 'L_lieux_trajets_types' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Retrieve(){
        $response = parent::Retrieve();
        if($response == 0 ):
            throw new \Exception("La récupération de 'L_lieux_trajets_types' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Update($aPropVal){
        $response = parent::Update($aPropVal);
        if($response == 0 ):
            throw new \Exception("La mise à jour de 'L_lieux_trajets_types' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Delete(){
        $response = parent::Delete();
        if($response == 0 ):
            throw new \Exception("La suppression de 'L_lieux_trajets_types' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }
}