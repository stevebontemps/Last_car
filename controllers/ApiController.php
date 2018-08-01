<?php

/**
 * Created by PhpStorm.
 * User: padbrain
 * Date: 29/05/18
 * Time: 23:53
 */

namespace Lastcar\controllers;

use Lastcar\core\Controller;
use Lastcar\core\Response;
use Lastcar\core\Utilities;
use Lastcar\models\TrajetsApi;

class ApiController extends Controller {

    use Utilities;

    /**
     * API
     */

    public function getAllPlaces(){
//        var_dump($this->inputPost());
//        var_dump($this->inputGet());
        $entité = new TrajetsApi();
        $aResult = $entité->getAllPlaces();

        echo $aResult;
    }

    public function getAllDestinationPlaces(){
        $entité = new TrajetsApi();
        $aResult = $entité->getAllDestinations();

        echo $aResult;
    }

}