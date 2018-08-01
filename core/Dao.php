<?php
namespace Lastcar\core;

use Lastcar\core\DatabaseConnect;
use Lastcar\Models\EntityModel;

/**
 * Cette classe sert de conteneur aux objets gérant l'accès aux données
 * Les implémentations concrètes implémenterons les interfaces
 * la connexion a la base de données est initialisée à la création
 * de l'objet via le fichier de configuration 
 * @link config/database.json fichier de configuration de l'accès axu données
 *
 * @author beweb-loic
 */
abstract class Dao implements CrudInterface, RepositoryInterface{
    /**
     * Cette propriété est une variable partagée entre toutes les instances
     * DAO ce qui evitera d'avoir plusieurs objets PDO tentant d'acceder 
     * en base de données.
     * Elle est donc privée avec un getter protected
     * @var PDO 
     */
    protected $pdo;
    protected $dbName;

    /**
     * Tous les objets DAO doivent avoir access à l'objet PDO, 
     * L'instanciation du premier objet, initialise le PDO avec les données
     * du fichier database.json
     * 
     */
    function __construct()
    {
        $this->pdo = DatabaseConnect::getInstance();
        $this->dbName = DatabaseConnect::getDBname();
    }

    /*
     *      MÉTHODES PUBLIQUES
     */

    /**
     * CRUD - Create
     * @param array $aPropVal
     */
    
    public function create(array $aPropVal){
        try
        {
            $requete = $this->insert().$this->keys($aPropVal).$this->values($aPropVal);
            $req = $this->pdo->prepare($requete);
//            var_dump($aPropVal);
//                echo $requete;
//            var_dump($req->execute());
            $req->execute($aPropVal);
            $id = $this->pdo->lastInsertId();
            var_dump($id);
            if($id != 0){
                return $id;
            } else {
                return true;
            }
        }
        catch (\PDOException $e)
        {
            if($e->errorInfo[1] == 1062)
//                throw new \Exception("L'élément que vous souhaitez créer existe déjà !");
            return false;
        }

    }

    /**
     * CRUD - Retrieve
     * @param EntityModel $oModelEntity
     * @return mixed
     */
    public function retrieve(EntityModel $oModelEntity){
        try
        {
            $this->modelObj = $oModelEntity;
            return $this->getById($this->modelObj->getId());
        }
        catch (\Exception $e)
        {
            return false;
        }

    }

    /**
     * CRUD - Update
     * @param array $aPropVal
     * @return bool
     */
    public function update(array $aPropVal){
        try
        {
            $requete = $this->updateMysql().$this->set($aPropVal).$this->whereId();
            $req = $this->pdo->prepare($requete);
            $req->execute($aPropVal);
            return $req->rowCount();
        }
        catch (\PDOException $e)
        {
            return false;
        }
    }

    /**
     * CRUD - Delete
     * @param int $pId
     * @return bool
     */
    public function delete(int $pId){
        try
        {
            $requete = "DELETE FROM `" . $this->table . "` WHERE `id`=:id";
            $req = $this->pdo->prepare($requete);
            $req->bindValue(":id", $pId, \PDO::PARAM_INT);

            $req->execute();
//            var_dump(__FILE__.":" . __LINE__);
            return $req->rowCount();
        }
        catch (\Exception $e)
        {
//            var_dump(__FILE__.":" . __LINE__);
            return false;
        }
    }

    /**
     * @param EntityModel $oModelEntity
     * @return array
     */
    public function getAll(EntityModel $oModelEntity){
        try
        {
            $this->modelObj = $oModelEntity;
            $list = [];
            $requete = "SELECT * FROM " . $this->table;
//            var_dump($requete);
            $req = $this->pdo->query($requete);
            $req->execute();

            foreach($req->fetchAll() as $data){
                $newEntity = clone $this->modelObj;
                $newEntity->hydrate($data);
                $list[] = $newEntity;
            }
            return $list;
        }
        catch (\Exception $e)
        {
            return false;
        }
    }

    /**
     * @param EntityModel $oModelEntity
     * @param array $aPropVal
     * @return array|bool
     */
    public function getAllBy(EntityModel $oModelEntity, array $aPropVal = null){
        $this->modelObj = $oModelEntity;
        $list = [];

        try
        {
            $requete = "SELECT * FROM " . $this->table . $this->whereClause($aPropVal);
//            var_dump($requete);
            $req = $this->pdo->prepare($requete);
            $req->execute($aPropVal);

            foreach($req->fetchAll() as $data){
                $newEntity = clone $this->modelObj;
                $newEntity->hydrate($data);
                $list[] = $newEntity;
            }
            if(!empty($list)) return $list;

            return false;
        }
        catch (\Exception $e)
        {
            return false;
        }
    }

        /**
     * @param $pId
     * @return mixed
     */
    public function getById($pId){
        try
        {
            $requete = "SELECT * FROM " . $this->table . " WHERE id= :id" ;
            $req = $this->pdo->prepare($requete);
            $req->bindParam(':id', $pId, \PDO::PARAM_INT);
            $req->execute();
            return($req->fetch());
        }
        catch (\Exception $e)
        {
            return false;
        }
    }

    /*
     *      MÉTHODES PRIVÉES
     */
        
    /**
     * @return string
     */
    private function insert(){
        return "INSERT INTO " . $this->table;
    }

    /**
     * @param $pArray Tableau associant Clef => Valeur
     * @return bool|string
     */
    private function keys($pArray){
        $req = " (";
        foreach($pArray as $key => $value){
            $req.= $key . ", ";
        }
        $req =substr ( $req ,  0 , -2 );
        $req.= ") ";
        return $req;
    }

    /**
     * @param $pArray Tableau associant Clef => Valeur
     * @return bool|string
     */
    private function values($pArray){
        $req = " VALUES (";
        foreach($pArray as $key => $value){
            $req.= "'" . $value . "', ";
            //$req.= ":" . $key . ", ";
        }
        $req =substr ( $req ,  0 , -2 );
        $req.= ") ";
        return $req;
    }

    /**
     * @return string
     */
    private function updateMysql(){
        return "UPDATE " . $this->table;
    }

    /**
     * @param $pArray
     * @return string
     */
    private function set($pArray){
        $req = " SET ";

        foreach ($pArray as $key => $value){
//                $req.= $key . "= '" . $value . "', ";
            $req.= $key . " = :" . $key . ", ";
        }

        $req = rtrim($req, ", ");

        $req.= " ";

        return $req;
    }

    /**
     * @return string
     */
    private function whereId(){
        return " WHERE id = :id";
    }

    /**
     * @param $pArray Tableau associant Clef => Valeur
     * @return bool|string
     */
    private function whereClause($pArray){
        $req = " WHERE ";

        foreach($pArray as $key => $value){
            $req.= $key . " = ";
            $req.= ":" . $key . " AND ";
        }
        $req =substr ( $req ,  0 , -5 );
        
        return $req;
    }
    
    /**
     * 
     * Ici l'accesseur est protected car l'objet PDO doit être accessible 
     * aux instances du DAO pour effectuer les requêtes 
     * sur le serveur de base de données.
     *  
     * @return DAO l'objet pdo stocké en variable de classe. 
     */
    protected function getPdo(){
        return $this->pdo;
    }

    /**
     *
     * Ici l'accesseur est protected car l'objet PDO doit être accessible
     * aux instances du DAO pour effectuer les requêtes
     * sur le serveur de base de données.
     *
     * @return DAO l'objet pdo stocké en variable de classe.
     */
    protected function getDbName(){
        return $this->dbName;
    }

}
