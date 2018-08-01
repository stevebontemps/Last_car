<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\models;


class Vehicules extends EntityModel
{
     private $id;
     private $marque;
     private $type;
     private $modele;
     private $annee;
     private $immatriculation;


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
    
                        public function getMarque()
                        {
                            return $this->marque;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getModele()
                        {
                            return $this->modele;
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
    
                        public function setMarque($marque)
                        {
                           if(is_string($marque)){
                                $this->marque = $marque;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setModele($modele)
                        {
                           if(is_string($modele)){
                                $this->modele = $modele;
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
            throw new \Exception("La création de 'Vehicules' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Retrieve(){
        $response = parent::Retrieve();
        if($response == 0 ):
            throw new \Exception("La récupération de 'Vehicules' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Update($aPropVal){
        $response = parent::Update($aPropVal);
        if($response == 0 ):
            throw new \Exception("La mise à jour de 'Vehicules' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Delete(){
        $response = parent::Delete();
        if($response == 0 ):
            throw new \Exception("La suppression de 'Vehicules' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }
}