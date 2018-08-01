<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\models;


class Users extends EntityModel
{
     private $id;
     private $pseudo;
     private $nom;
     private $prenom;
     private $mot_de_passe;
     private $date_de_naissance;
     private $photo;
     private $date_inscription;
     private $verif_profil;
     private $autorisation_contact;
     private $JSon_visibility;
     private $mini_bio;
     private $sexe;
     private $telephone;
     private $email;
     private $id_adresses;
     private $id_vehicules;


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
    
                        public function getPrenom()
                        {
                            return $this->prenom;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getMot_de_passe()
                        {
                            return $this->mot_de_passe;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getDate_de_naissance()
                        {
                            return $this->date_de_naissance;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getPhoto()
                        {
                            return $this->photo;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getDate_inscription()
                        {
                            return $this->date_inscription;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getVerif_profil()
                        {
                            return $this->verif_profil;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getAutorisation_contact()
                        {
                            return $this->autorisation_contact;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getJSon_visibility()
                        {
                            return $this->JSon_visibility;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getMini_bio()
                        {
                            return $this->mini_bio;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getSexe()
                        {
                            return $this->sexe;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getTelephone()
                        {
                            return $this->telephone;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getEmail()
                        {
                            return $this->email;
                        }

            
                        /**
                         * @return string
                         */
    
                        public function getPseudo()
                        {
                            return $this->pseudo;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getId_adresses()
                        {
                            return $this->id_adresses;
                        }

            
                        /**
                         * @return int
                         */
    
                        public function getId_vehicules()
                        {
                            return $this->id_vehicules;
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
                         * @param string
                         * @return bool
                         */
    
                        public function setPrenom($prenom)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/\%\-\*\+\$\.)?]{1,}$#", $prenom)){
                               
                                $this->prenom = $prenom;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setMot_de_passe($mot_de_passe)
                        {
                           if(is_string($mot_de_passe)){
                                $this->mot_de_passe = $mot_de_passe;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param datetime
                         * @return bool
                         */
    
                        public function setDate_de_naissance($date_de_naissance)
                        {
                           if(preg_match("#^((\d{4})-((0[1-9])|(1[0-2]))-(((0[1-9])|(1\d)|(2\d)|(3[0-1])))[[:space:]]?(((([[:space:]])(([0-1][0-9])|([2][0-3]))(:[0-5][0-9]))((:[0-5][0-9])?))?))$#", $date_de_naissance)){
                                $this->date_de_naissance = $date_de_naissance;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setPhoto($photo)
                        {
//                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $photo)){
                           if(is_string($photo)){
                                $this->photo = $photo;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param datetime
                         * @return bool
                         */
    
                        public function setDate_inscription($date_inscription)
                        {
                           if(preg_match("#^((\d{4})-((0[1-9])|(1[0-2]))-(((0[1-9])|(1\d)|(2\d)|(3[0-1])))[[:space:]]?(((([[:space:]])(([0-1][0-9])|([2][0-3]))(:[0-5][0-9]))((:[0-5][0-9])?))?))$#", $date_inscription)){
                                $this->date_inscription = $date_inscription;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setVerif_profil($verif_profil)
                        {
                           if(preg_match("#^[0-9]+#", $verif_profil)){
                                $this->verif_profil = $verif_profil;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setAutorisation_contact($autorisation_contact)
                        {
                           if(preg_match("#^[0-9]+#", $autorisation_contact)){
                                $this->autorisation_contact = $autorisation_contact;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setJSon_visibility($JSon_visibility)
                        {
                           if(is_string($JSon_visibility)){
                                $this->JSon_visibility = $JSon_visibility;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setMini_bio($mini_bio)
                        {
                           if(is_string($mini_bio)){
                                $this->mini_bio = $mini_bio;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setSexe($sexe)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/%-\*\+$\.)?]{1,}$#", $sexe)){
                                $this->sexe = $sexe;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setTelephone($telephone)
                        {
                           if(preg_match("#^[0-9]+#", $telephone)){
                                $this->telephone = $telephone;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setEmail($email)
                        {
                           if(preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $email)){
                                $this->email = $email;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param string
                         * @return bool
                         */
    
                        public function setPseudo($pseudo)
                        {
                           if(preg_match("#^[a-zA-Z(0-9)?(/\%\-\*\+\$\.)?]{1,}$#", $pseudo)){
                                $this->pseudo = $pseudo;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setId_adresses($id_adresses)
                        {
                           if(preg_match("#^[0-9]+#", $id_adresses)){
                                $this->id_adresses = $id_adresses;
                                return true;
                           }else{
                                return false;
                           }
                        }

            
                        /**
                         * @param int
                         * @return bool
                         */
    
                        public function setId_vehicules($id_vehicules)
                        {
                           if(preg_match("#^[0-9]+#", $id_vehicules)){
                                $this->id_vehicules = $id_vehicules;
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
            throw new \Exception("La création de 'Users' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Retrieve(){
        $response = parent::Retrieve();
        if($response === FALSE):
            return false;
            throw new \Exception("La récupération de 'Users' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }

    public function Update($aPropVal){
        $response = parent::Update($aPropVal);
        return $response;
//        if($response == 0 ):
//            throw new \Exception("La mise à jour de 'Users' n'a pas pu être effectuée !");
//        else:
//            return $response;
//        endif;
    }

    public function Delete(){
        $response = parent::Delete();
        if($response == 0 ):
            throw new \Exception("La suppression de 'Users' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }
}