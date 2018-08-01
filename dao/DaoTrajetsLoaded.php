<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\dao;

use Lastcar\core\Dao;

class DaoTrajetsLoaded extends Dao
{
    public $table = "trajets";

    public function getLastTrips($oModelEntity){

        $this->modelObj = $oModelEntity;
        $list = [];
        try
        {
            $requete = "SELECT
                          u.id id_user,
                          u.pseudo,
                          u.photo,
                          t.id,
                          t.date_aller,
                          t.heure_aller,
                          t.tarif,
                          t.depart,
                          t.destination
                        FROM
                          trajets t
                        INNER JOIN
                          users u ON u.id = t.id_users
                        LIMIT 0,5";

//            print_r($requete);
            $req = $this->pdo->prepare($requete);
            $req->execute();
//var_dump($req->fetch());

            foreach($req->fetchAll() as $data){
                $newEntity = clone $this->modelObj;
                $newEntity->hydrate($data);
                $list[] = $newEntity;
            }
//            var_dump($list);
            if(!empty($list)) return $list;

            return false;
        }
        catch (\Exception $e)
        {
            return false;
        }
    }

    public function getSelectTrips($oModelEntity){

        $this->modelObj = $oModelEntity;
//        var_dump($this->modelObj);
        $list = [];
        try
        {
            $requete = "SELECT
                          u.id id_user,
                          u.pseudo,
                          u.photo,
                          t.id,
                          t.date_aller,
                          t.heure_aller,
                          t.tarif,
                          t.depart,
                          t.destination
                        FROM
                          trajets t
                        INNER JOIN
                          users u ON u.id = t.id_users
                        WHERE
                          t.depart = '".$this->modelObj->getDepart()."'
                        AND
                          t.destination = '".$this->modelObj->getDestination()."'
                        LIMIT 0,100";

//            print_r($requete);
            $req = $this->pdo->prepare($requete);
            $req->execute();
//var_dump($req->fetch());

            foreach($req->fetchAll() as $data){
                $newEntity = clone $this->modelObj;
                $newEntity->hydrate($data);
                $list[] = $newEntity;
            }
//            var_dump($list);
            if(!empty($list)) return $list;

            return false;
        }
        catch (\Exception $e)
        {
            return false;
        }
    }
}