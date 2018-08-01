<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\models;


class L_users_trajets_roles extends EntityModel
{
     private $id_users;
     private $id_roles;
     private $id_trajets;


    /*
     *      GETTERS
     */


                        /**
                         * @return int
                         */
    
                        public function getId_users()
                        {
                            return $this->id;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getId_roles()
                        {
                            return $this->id_roles;
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
    
                        public function setId_users($id)
                        {
                           if(preg_match("#^[0-9]+#", $id)){
                                $this->id_users = $id;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setId_roles($id_roles)
                        {
                           if(preg_match("#^[0-9]+#", $id_roles)){
                                $this->id_roles = $id_roles;
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
            throw new \Exception("La création de 'L_users_trajets_roles' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Retrieve(){
        $response = parent::Retrieve();
        if($response == 0 ):
            throw new \Exception("La récupération de 'L_users_trajets_roles' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Update($aPropVal){
        $response = parent::Update($aPropVal);
        if($response == 0 ):
            throw new \Exception("La mise à jour de 'L_users_trajets_roles' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Delete(){
        $response = parent::Delete();
        if($response == 0 ):
            throw new \Exception("La suppression de 'L_users_trajets_roles' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }
}