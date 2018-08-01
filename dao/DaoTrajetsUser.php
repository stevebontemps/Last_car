<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\dao;

use Lastcar\core\Dao;

class DaoTrajetsUser extends Dao
{
    public $table = "trajets";

    public function getUserTrips($oModelEntity){
        $this->modelObj = $oModelEntity;
        $id = $this->modelObj ->getId_users();
        $list = [];
        try
        {
            $requete = "SELECT DISTINCT 
                          u.id id_user, u.pseudo,
                          t.date_aller, t.tarif, t.depart, t.destination,
                          r.nom role, r.short_name roleShortName, 
                          tt.type_trajet
                        FROM " . $this->table . " t 
                        
                        INNER JOIN types_trajets tt ON tt.id = t.id_types_trajets
                        
                        INNER JOIN l_users_trajets_roles lutr ON lutr.id_trajets = t.id
                        INNER JOIN roles r ON r.id = lutr.id_roles
                        INNER JOIN users u ON u.id = lutr.id_users
                        
                        WHERE u.id = :id";

//            print_r($requete);
            $req = $this->pdo->prepare($requete);
            $req->bindParam(':id', $id, \PDO::PARAM_INT);
            $req->execute();
//var_dump($req->fetch());

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
}