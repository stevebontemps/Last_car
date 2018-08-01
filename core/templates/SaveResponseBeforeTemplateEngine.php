<?php
/**
 * Created by PhpStorm.
 * User: padbrain
 * Date: 01/06/18
 * Time: 19:02
 */

namespace Lastcar\core;


define("DEFAULT_HEADER" , "defaultHeader");
define("DEFAULT_FOOTER" , "defaultFooter");

class Response
{

    use Utilities;

    /**
     * @param string $content
     */
    private $context;
    private $header;
    private $footer;
    private $title;
    private $view;

    /**
     * @var array
     */
    private $aoDatas;

    public function __construct(string $uri = null, array $aoDatas = null)
    {
        //  Retrieve views.json
        $this->context = file_get_contents(ROOT . "config/views.json");
        $this->context = json_decode($this->context, true);

        if(!is_null($uri)){
            if(array_key_exists($uri, $this->context)){
                $this->view = $this->context[$uri];
            }

            if(array_key_exists("title", $this->view)){
                $this->setTitle($this->view["title"]);
            }
        }

        //  INIT PROPERTIES FOR DIFFERENTS DOCUMENT'S PARTS

        //  HEADER
        if(!is_null($uri) && array_key_exists("header", $this->view)){
            $this->header = $this->lycos($this->view["header"] . ".php",ROOT . "views/");
        }else{
            $this->header = $this->lycos(DEFAULT_HEADER . ".php", ROOT . "views/");
        }

        //  FOOTER
        if(!is_null($uri) && array_key_exists("footer" , $this->view)){
            $this->footer = $this->lycos($this->views["footer"] . ".php", ROOT . "views/");
        }else{
            $this->footer = $this->lycos(DEFAULT_FOOTER . ".php", ROOT . "views/");
        }

        //  DATAS FROM DAO
        $this->aoDatas = $aoDatas;

        if(!preg_match("#RenderMessage$#", (new \ReflectionClass($this))->getName()))
            $this->Render();
    }

    /**
     *
     */
    final public function Render(){

        //  DATAS TO DISPLAY
        if($this->aoDatas !== null)
            foreach ($this->aoDatas as $entity => $obj){
                $$entity = $obj;
            }

        //  Définition du style de la page
//        $style = $_SERVER['SERVER_NAME'] . "/styles/styles.css";
        $title = $this->title;
        $style = "http://" . $_SERVER['SERVER_NAME'] . "/styles/styles.css";
        $script = "http://" . $_SERVER['SERVER_NAME'] . "/js/script.js";

        ob_start();
        //  renderHeader
        require_once $this->header;
        //  renderContent
        if(array_key_exists("content", $this->view)){
            foreach ($this->view["content"] as $file){
                require_once ($this->lycos($file . ".php", ROOT . "views"));
            }
        }
        //  renderFooter
        require_once $this->footer;
        ob_end_flush();
    }

    protected function setTitle($pTitle){
        $this->title = $pTitle;
    }

    protected function getTitle(){
        return $this->title;
    }

    protected function getHeader(){
        return $this->header;
    }

    protected function getFooter(){
        return $this->footer;
    }
}