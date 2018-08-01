<?php
/**
 * Created by EntitiesBuilder.
 * User: padbrain
 * Date: 03/07/2018
 */

namespace Lastcar\dao;

use Lastcar\core\Dao;

class DaoTrajetsApi extends Dao
{
    public $table = "trajets";

//    public function getAllPlaces(){
//        $list = [];
//        try
//        {
//            //  RETRIEVE DEPARTURE PLACES
//
//            $requete = "SELECT DISTINCT
//                          v.Nom_commune
//                        FROM villes v ";
//
////            print_r($requete);
//            $req = $this->pdo->prepare($requete);
//            $req->execute();
//
////            var_dump($req->fetchAll());
//            foreach ($req->fetchAll() as $key => $item) {
//                $list[] = $item['Nom_commune'];
//            }
//
////            vardump($list);
//            return json_encode($list);
//
//        }
//        catch (\Exception $e)
//        {
//            return false;
//        }
//    }

    public function getAllPlaces(){
        $list = [];
        try
        {
            //  RETRIEVE DEPARTURE PLACES
            $requete = "SELECT DISTINCT
                          t.depart
                        FROM " . $this->table . " t ";

//            print_r($requete);
            $req = $this->pdo->prepare($requete);
            $req->execute();

//            var_dump($req->fetchAll());
            foreach ($req->fetchAll() as $key => $item) {
                $list[] = $item['depart'];
            }

            //  RETRIEVE DESTINATION PLACES
            $requete = "SELECT DISTINCT
                          t.destination
                        FROM " . $this->table . " t ";

//            print_r($requete);
            $req = $this->pdo->prepare($requete);
            $req->execute();

//            var_dump($req->fetchAll());
            foreach ($req->fetchAll() as $key => $item) {
                $list[] = $item['destination'];
            }

//            vardump($list);
            return json_encode($list);

        }
        catch (\Exception $e)
        {
            return false;
        }
    }
}