<?php
/**
 * Created by PhpStorm.
 * User: padbrain
 * Date: 14/06/18
 * Time: 21:19
 */

namespace Lastcar\models;

abstract class EntityModel implements Persistable
{
    protected $dao;
    
    public function __construct() {
//        var_dump(get_class($this));
        $childClass = explode("\\", get_class($this));
//        var_dump($childClass);
        $childClass = end($childClass);
        try
        {
        $daoToLoad = "Lastcar\\dao\\Dao".ucfirst($childClass);
//        var_dump($daoToLoad);
            $this->dao = new $daoToLoad();
        }
        catch (\Exception $e){
//            var_dump($e);
            die();
        }
    }

    public function Create($post) {
        $response = $this->dao->create($post);
//        if($response == 0 ):
//            throw new \Exception("La création n'a pas pu être effectuée !");
//        else:
            return $response;
//        endif;
    }


    public function Retrieve() {
        $result = $this->dao->retrieve($this);
        if(is_bool($result)) return FALSE;
        $this->hydrate($result);
//        var_dump($this);
        return $this;
    }
    
    public function Update($aPropVal) {
        $aPropVal['id'] = $this->getId();
        $response = $this->dao->update($aPropVal);
            return $response;
//        if($response == 0 ):
//            throw new \Exception("Aucune modification n'a été effectuée !");
//        else:
//            return $response;
//        endif;
    }
    
    public function Delete() {
        return $response = $this->dao->delete($this->getId());
    }
    
    public function getAll(){
        return $this->dao->getAll($this);
    }
    
    public function getAllBy($aPropVal) {
        return $this->dao->getAllBy($this, $aPropVal);
    }
    
    public function hydrate(array $donnees)
    {
//        var_dump($donnees);
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
    
    /** Récupère le Json issu de la BDD et retourne le tableau correspondant
     * 
     * @return array Tableau représantant la visibilité des propriétés d'un
     * profil utilisateur 
     */
    
//    public function getDecodeJson(){
//        return json_decode($this->getJSon_visibility(), true);
//    }
    
    /** Transforme un tableau en Json
     * 
     * @param type $aPropval
     * @return string représente les propiétés d'un profil utilisateur
     */
//    public function setEncodeJson($aPropval) {
////        var_dump($aPropval);
////        var_dump(json_encode($aPropval));
//        $this->setJSon_visibility(json_encode($aPropval));
//        return $this->getJSon_visibility();
//    }
}