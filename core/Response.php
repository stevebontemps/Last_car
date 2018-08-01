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
define("HOST" , "http://" . $_SERVER['SERVER_NAME']);

class Response
{
    /***************************************************
     *
     *      DECLARATIONS SECTION
     *
     **************************************************/

    /** helpers functions added to class
     * @Trait
     */
    use Utilities;

    /** array containing configured views loaded from config/views.json
     * @var array $configuredViews
     */
    private $configuredViews;

    /** current view : looks like uri in api rest format
     * @var string
     */
    private $view;

    /** path and filename of header view's part
     * @var string
     */
    private $header;

    /** path and filename of footer view's part
     * @var string
     */
    private $footer;

    /** array containing configured datas loaded from config/views.json
     * if not, had to set default values
     * @var array
     */
    private $configuredDatas = [
                                    "title"     => "Last Car",
                                    "menu"      => "menuVisiteur",
                                    "styles"    => "styles",
                                    "scripts"    => "script"
                                ];

    /** array containing objects collection from DAO
     * @var array
     */
    private $aoDatas = null;

    /** array containing input collection from form
     * @var array
     */
    private $aformDatas = null;

    /** array containing error messages collection to forms
     * @var array
     */
    private $aErrorMessages = null;

    /** array containing messages to display in views
     * @var array
     */
    private $aDisplayMessages = null;


    /***************************************************
     *
     *      CONSTRUCTOR
     *
     **************************************************/

    /**     Loading views.json and setup context
     *      to display the current view
     *      if $uri is not set, default values are set
     *      in the declarations section
     * @param string|null $uri
     * @param array|null $aoDatas
     * @throws \ReflectionException
     */
    public function __construct(string $uri, array $aoDatas = null)
    {
        //  TRANSFORM URI TO VIEW FORMAT
        $uri = $this->setUriToViewFormat($uri);

        //  Initialize datas to display
        $this->aoDatas = $aoDatas;

        //  Loading views.json
        $this->configuredViews = file_get_contents(ROOT . "config/views.json");
        $this->configuredViews = json_decode($this->configuredViews, true);

//var_dump($uri);
//        var_dump($this->configuredViews[$uri]);
//printr($this->configuredViews);

        //  If uri is set
        if(!is_null($uri)){
            //  and exist in the configured views
//            echo __FILE__.__LINE__."<br>";
//            var_dump($uri);
//            echo __FILE__.__LINE__."<br>";
//            var_dump($this->configuredViews);
//            echo __FILE__.__LINE__."<br>";
            if(array_key_exists($uri, $this->configuredViews)){
                //  set up current view
                $this->view = $this->configuredViews[$uri];
            }
//            echo __FILE__.__LINE__."<br>";
//            var_dump($this->view);
//            echo __FILE__.__LINE__."<br>";

            //  then check for several parameters to be set

            //  Head title
            if(array_key_exists("title", $this->view)){
                $this->configuredDatas["title"] = $this->view["title"];
            }

            //  Menu file
            //  $this->configuredDatas["menu"] can't contain an array
            if(array_key_exists("menu", $this->view)){
                $this->configuredDatas["menu"] = $this->view["menu"];
            }

            //  CSS file
            //  $this->configuredDatas["styles"] mays contain an array
            if(array_key_exists("styles", $this->view)){
                $this->configuredDatas["styles"] = $this->view["styles"];
            }

            //  SCRIPT file
            //  $this->configuredDatas["script"] mays contain an array
            if(array_key_exists("scripts", $this->view)){
                $this->configuredDatas["scripts"] = $this->view["scripts"];
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


        if(preg_match("#Response$#", (new \ReflectionClass($this))->getName()))
            $this->Render();
    }


    /***************************************************
     *
     *      SETTING DATAS SECTION
     *
     **************************************************/

    /** Set Up datas from DAO
     * @param array $aoDatas
     */
    public function setDaoDatas(array $aoDatas){
        $this->aoDatas = $aoDatas;
    }


    /** Set Up datas from forms
     * @param array $aformDatas
     */
    public function setDatasForms(array $aformDatas){
        $this->aformDatas = $aformDatas;
    }


    /** Set Up error messages
     * @param array $aErrorMessages
     */
    public function setErrorMessages(array $aErrorMessages){
        $this->aErrorMessages = $aErrorMessages;
    }


    /** Set Up messages to display in views
     * @param array $aDisplayMessages
     */
    public function setDisplayMessages(array $aDisplayMessages){
        $this->aDisplayMessages = $aDisplayMessages;
    }


    /***************************************************
     *
     *      RENDERER
     *
     **************************************************/

    /**
     *
     */
    final public function Render(){

        /**
         **     PREPARE DATAS TO DISPLAY. EACH OBJECT COLLECTION HAS TO BE CONTAIN IN A KEY
         *      IN this->aoDatas
         */
//        var_dump($this->aoDatas);
        if($this->aoDatas !== null)
            foreach ($this->aoDatas as $entity => $obj){
                $$entity = $obj;
            }



        /**
         **     PREPARE CONFIGURED DATAS TO DISPLAY. EACH OBJECT COLLECTION HAS TO BE CONTAIN IN A KEY
         *      IN this->aoDatas
         */
        if($this->configuredDatas !== null)
            foreach ($this->configuredDatas as $entity => $obj){
                $$entity = $obj;
            }


        //  RENDER ======>
        ob_start();
//        echo $this->prepareCookie();
        echo $this->renderHeader();

        //  renderContent
        if(is_array($this->view["content"]) && array_key_exists("content", $this->view)){
            foreach ($this->view["content"] as $file){
//                var_dump($file);
                require_once ($this->lycos($file . ".php", ROOT . "views"));
            }
        }

        //  renderFooter
        echo $this->renderFooter();
        ob_end_flush();
        unset($_SESSION['userGroup']);
        die();
    }


    /***************************************************
     *
     *      PROTECTED METHODS SECTION
     *
     **************************************************/

    protected function setTitle($pTitle){
        $this->configuredDatas["title"] = $pTitle;
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


    /***************************************************
     *
     *      PRIVATE METHODS SECTION
     *
     **************************************************/


    /**
     **     Load header.HTML section and
     *      replace pseudoCode
     * @return mixed
     */
    private function renderHeader(){
        $htmlFile = file_get_contents($this->header);
        //  GENERATE TITLE
        $htmlFile = str_replace("{TITLE}", $this->configuredDatas["title"], $htmlFile);

        //  GENERATE STYLES
        if(is_array($this->configuredDatas["styles"])){
            $html = "";
            foreach($this->configuredDatas["styles"] as $key => $value){
                $html.= "<link 
                            rel='stylesheet' 
                            type='text/css' 
                            href='". $this->getFileOnServer($value . ".css") . "' 
                            media='screen'/>\n";
            }
        }else{
            $html = "";
            $html.= "<link 
                        rel='stylesheet' 
                        type='text/css' 
                        href='". $this->getFileOnServer($this->configuredDatas["styles"] . ".css") . "' 
                        media='screen'/>\n";
        }
        $htmlFile =  str_replace("{STYLES}", $html, $htmlFile);

        //  GENERATE MENU
        if(is_array($this->configuredDatas["menu"])){
            foreach($this->configuredDatas["menu"] as $key => $value){
                if(isset($_SESSION['userGroup']) && array_key_exists($_SESSION['userGroup'], $this->configuredDatas["menu"])){
                    $menu = file_get_contents($this->lycos($this->configuredDatas["menu"][$_SESSION['userGroup']] . ".php", ROOT . "views"));
                }
                else{
                    $menu = file_get_contents($this->lycos($this->configuredDatas["menu"]['VISITEUR'] . ".php", ROOT . "views"));
                }
            }
        }else{
            $menu = file_get_contents($this->lycos($this->configuredDatas["menu"] . ".php", ROOT . "views"));
        }
        $htmlFile = str_replace("{MENU}", $menu, $htmlFile);
        return $htmlFile;
    }

    /**
     **     Load content.HTML section and
     *      replace pseudoCode
     */

    private function renderContent(){
        //  renderContent
        $html = "";
        if(is_array($this->view["content"]) && array_key_exists("content", $this->view)){
            foreach ($this->view["content"] as $file){
                $html.= file_get_contents($this->lycos($file . ".php", ROOT . "views"));
            }
        }else{
            $html.= file_get_contents($this->lycos($this->view["content"] . ".php", ROOT . "views"));
        }
        return $html;

    }

    /**
     **     Load footer.HTML section and
     *      replace pseudoCode
     */
    private function renderFooter(){
//var_dump($this->configuredDatas["scripts"]);
        $htmlFile = file_get_contents($this->footer);
        if(is_array($this->configuredDatas["scripts"])){
            $html = "";
            foreach($this->configuredDatas["scripts"] as $key => $value){
                $html.= "<script 
                        type='text/javascript' 
                        src= '" . $this->getFileOnServer($value . ".js") . "' >
                     </script>\n";
            }
        }else{
                $html = "";
                $html.= "<script 
                            type='text/javascript' 
                            src= '" . $this->getFileOnServer($this->configuredDatas["scripts"] . ".js") . "' >
                         </script>\n";
        }
        return str_replace("{SCRIPTS}", $html, $htmlFile);

    }

    private function getFileOnServer($pFile){
        $file =  $this->lycos($pFile, ROOT . "/public");
        $replacement = "http://" . $_SERVER['SERVER_NAME'];
        return preg_replace("#^..//public#", $replacement, $file);

    }

    protected static function setUriToViewFormat($uri) {

        // RECUPERATION sous forme de tableau de l'URI d'origine
        $uri= explode("/", $uri);
        //  Le tableau est parsé
        foreach ($uri as $key=>$items){
            //  Et les valeurs entières ou le token sont remplacées
            if ((int)$items || strlen($items) > 100) {
                $uri[$key]= "(:)";
            }
        }

        //  Retourne la nouvelle URI utilisable par la classe Response
        return implode("/", $uri);
    }


    /***************************************************
     *
     *      PUBLIC STATIC METHODS SECTION
     *
     **************************************************/

    /***Récupération du contenu du fichier config/wiews.json
     *  qui contient les profils ayant des droits sur l'URI
     *  passée en paramètre.
     *  Récupèration en sortie d'un tableau contenant les profils
     *  en clefs et un booléen (true, false) en valeur.
     *  Si l'uri n'est pas définies ou qu'aucun droit n'est
     *  défini pour l'URI, la méthode renvoie NULL
     *
     * @param string $uri
     * @return array|null
     */
    public static function haveRights(string $uri){

        $uri = Response::setUriToViewFormat($uri);
        //  Récupération du contenu du fichier config/wiews.json
        $aConfig = json_decode(file_get_contents(ROOT . "config/views.json"), true);
//        echo __FILE__.__LINE__."<br>";
//        var_dump($uri);
//        var_dump($aConfig);
//        echo __FILE__.__LINE__."<br>";

        //  L'URI est elle définie
        if(isset($aConfig[$uri]) && is_array($aConfig[$uri])){
            if(isset($aConfig[$uri]["rights"]) && is_array($aConfig[$uri]["rights"])){
                return $aConfig[$uri]["rights"];
            }
        }
        return null;
    }
}