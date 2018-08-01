<?php
session_start();
// import de la classe Routing ( pour l'utiliser)
//use Lastcar\core\Routing;
use Lastcar\core\Router;
//use Lastcar\core\EntitiesBuilder;

define("ROOT" , "../");

// pour beneficier de l'autoload de composer
include "../vendor/autoload.php";

//phpinfo();

// A chaque requete emise nous lançons le mecanisme de routage
//(new Routing())->execute();
$router = new Router();
//$router->execute();
//new EntitiesBuilder();

function vardump($pWhat){
    echo "<pre>";
    var_dump($pWhat);
    echo "</pre>";
}
