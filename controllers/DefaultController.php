<?php
namespace Lastcar\controllers;

use Lastcar\core\Controller;
use Lastcar\core\Response;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewController
 *
 * @author padbrain
 */
class DefaultController extends Controller{
    

    public function getDefault() {
        $vue = new Response($this->getUri());
//        $vue->Render();
    }

    public function error404() {
        $vue = new Response("/error404");
//        $vue->Render();
    }

    public function redirectAccueil(){
        if($this->security->acceptConnexion()){
            new Response("/accueil/membre");
        }else{
            new Response("/");
        }
    }
}
