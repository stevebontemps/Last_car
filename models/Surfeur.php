<?php
/**
 * Created by PhpStorm.
 * User: padbrain
 * Date: 01/07/18
 * Time: 16:08
 */

namespace Lastcar\models;

use Lastcar\core\UserInterface;

class Surfeur extends Users implements UserInterface
{
    private $group = "VISITEUR";
    private $role;
    private $confirmLink;

    public function init($tknORbdd){
        //  Objet token ou BDD
        $obj = new \ReflectionClass($tknORbdd);

        //  Définir quel est l'objet manipulé
        if(preg_match("#UsersProfile$#", $obj->getName())){
            $pseudo = $tknORbdd->getPseudo();
        }else{
            $pseudo = $tknORbdd->username;
        }
        //  Récupération du profil utilisateur par le pseudo
        $aoTempUser = $this->getAllBy(array("pseudo"=>$pseudo));
//        var_dump($aoTempUser);
        if($aoTempUser){
            $tempUser = $aoTempUser[0];

            //  L'instance en cours devient le surfeur
            $this->setId($tempUser->getId());
            $this->Retrieve();

            //  Récupération, en BDD du groupe auquel appartient l'utilisateur
            $this->setGroup($this->dao->retrieveGroupShort_name($this->getId()));

            //  Récupération, en BDD du role auquel appartient l'utilisateur
            $this->setRole($this->dao->retrieveRoleShort_name($this->getId()));
//            var_dump($this->getGroup());

            unset($aoTempUser);
        }

    }


    /**
     *  Préparation du tableau $aPropVal attendu par
     *  le CRUD
     *  @return int
     */

    public function UpdateProfil(){

        //  les valeurs pouvant être mise à jour par le profil sont les suivantes
        $aPropVal = array(
                            "JSon_visibility" => parent::getJSon_visibility(),
                            "mini_bio" => $this->getMini_bio(),
                            "mot_de_passe" => $this->getPassword()
                        );
//        var_dump($aPropVal);
        return parent::Update($aPropVal);
    }


    /** Surcharge de la méthode contenue dans users
     * Le mot de passe ne peut pas être nul
     * @param string
     * @return bool
     */

    public function setMot_de_passe($mot_de_passe)
    {
        if(empty($mot_de_passe)) return false;
        return parent::setMot_de_passe($mot_de_passe);
    }

    /** Surcharge de la méthode contenue dans users
     * @param array
     */
    public function setJSon_visibility($aJSon_visibility)
    {
        if(is_array($aJSon_visibility)) $aJSon_visibility = json_encode($aJSon_visibility);
        parent::setJSon_visibility($aJSon_visibility);
    }

    /** Surcharge de la méthode contenue dans users
     * @return array
     */
    public function getJSon_visibility()
    {
        $tempJson = preg_replace('#^"{#', '{', parent::getJSon_visibility());
        $tempJson = preg_replace('#}"?"$#', '}', $tempJson);
        $tempJson = preg_replace('#\\\\#', '', $tempJson);
//var_dump($tempJson);
        return json_decode($tempJson, true);
    }

    /**
     * @param string
     * @return string
     */
    public function getVisibility($pWhat)
    {
        $aJson = $this->getJSon_visibility();
//        var_dump($this->getJSon_visibility());
        if(array_key_exists($pWhat, $aJson)){
            if($aJson[$pWhat] == 1){
                return "checked = 'checked'";
            }else{
                return "";
            }
        }
    }
    
    public function setConfirmLink($link){
        $this->confirmLink = $link;
    }
    
    public function getConfirmLink(){
        return $this->confirmLink;
    }

    /**
     * @return String
     */

    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @param $group
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return String
     */
    public function getPassword()
    {
        return $this->getMot_de_passe();
    }

    /**
     * @return String
     */
    public function getUsername()
    {
        return $this->getPseudo();
    }

    /**
     * @return String
     */
    public function getRoles()
    {
        return $this->role;
    }

    /**
     * @return Object collection
     */
    public function getAllBy($aPropVal){
        return $this->dao->getAllBy($this, $aPropVal);
    }

    public function insertGroup($idUser) {
        return $this->dao->insertGroup($idUser);
    }

    public function getNom(){

    }

}