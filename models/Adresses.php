<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\models;


class Adresses extends EntityModel
{
     private $id;
     private $numero;
     private $adresse;
     private $ville;
     private $code_postal;
     private $id_pays;


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
                         * @return smallint
                         */
    
                        public function getNumero()
                        {
                            return $this->numero;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getAdresse()
                        {
                            return $this->adresse;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getVille()
                        {
                            return $this->ville;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getCode_postal()
                        {
                            return $this->code_postal;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getId_pays()
                        {
                            return $this->id_pays;
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
                         * @param smallint
                         * @return bool
                         */
    
                        public function setNumero($numero)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/*-+%$)?]{1,}$#", $numero)){
                                $this->numero = $numero;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setAdresse($adresse)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $adresse)){
                                $this->adresse = $adresse;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setVille($ville)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $ville)){
                                $this->ville = $ville;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setCode_postal($code_postal)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $code_postal)){
                                $this->code_postal = $code_postal;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setId_pays($id_pays)
                        {
                           if(preg_match("#^[0-9]+#", $id_pays)){
                                $this->id_pays = $id_pays;
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
            throw new \Exception("La création de 'Adresses' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Retrieve(){
        $response = parent::Retrieve();
        if($response == 0 ):
            throw new \Exception("La récupération de 'Adresses' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Update($aPropVal){
        $response = parent::Update($aPropVal);
        if($response == 0 ):
            throw new \Exception("La mise à jour de 'Adresses' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Delete(){
        $response = parent::Delete();
        if($response == 0 ):
            throw new \Exception("La suppression de 'Adresses' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }
}