<?php
/**
 * Created by PhpStorm.
 * User: padbrain
 * Date: 27/06/2018
 */

namespace Lastcar\dao;

use Lastcar\core\Dao;

class DaoSurfeur extends Dao
{
    public $table = "users";

    /**
     *      @param $id User id
     * @return string groupName
     */
    public function retrieveGroupShort_name($id){

        try
        {
            $requete = "SELECT 
                          g.nom, 
                          g.short_name 
                        FROM groups g 
                        INNER JOIN l_users_groups lug ON lug.id_groups = g.id 
                        INNER JOIN " . $this->table . " u ON u.id = lug.id_users
                        WHERE u.id = :id";
//            var_dump($requete);
            $req = $this->pdo->prepare($requete);
            $req->bindParam(':id', $id, \PDO::PARAM_INT);
            $req->execute();

            return ($req->fetch()['short_name']);
        }
        catch (\Exception $e)
        {
            return false;
        }
    }

    /**
     *      @param $id User id
     * @return string groupName
     */
    public function retrieveRoleShort_name($id){
        try
        {
            $requete = "SELECT 
                          r.nom, 
                          r.short_name 
                        FROM roles r
                        INNER JOIN l_users_roles lur ON lur.id = r.id 
                        INNER JOIN " . $this->table . " u ON u.id = lur.id_users
                        WHERE u.id = :id";
//            var_dump($requete);
            $req = $this->pdo->prepare($requete);
            $req->bindParam(':id', $id, \PDO::PARAM_INT);
            $req->execute();
//var_dump($req->fetch());
            return ($req->fetch()['short_name']);
        }
        catch (\Exception $e)
        {
            return false;
        }
    }


    public function insertGroup($idUser){

        try
        {
            $requete = "INSERT INTO `l_users_groups`(`id_groups`, `id_users`)
                     VALUES ((SELECT g.id FROM groups g WHERE short_name = 'MEMBRE'), :id_user)";
            var_dump($requete);
            $req = $this->pdo->prepare($requete);
            $req->bindParam(':id_user', $idUser, \PDO::PARAM_INT);
            $req->execute();

            return $req->rowCount();
        }
        catch (\Exception $e)
        {
            return false;
        }
    }
}