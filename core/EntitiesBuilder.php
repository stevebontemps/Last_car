<?php
/**
 * Created by PhpStorm.
 * User: padbrain
 * Date: 14/06/18
 * Time: 21:19
 */

namespace Lastcar\core;

//use Lastcar\core\DatabaseConnect;
//use DatabaseConnect;

class EntitiesBuilder extends Dao
{
    use Utilities;

    protected $pdo;
    protected $aTables;

    private function query(){

        //  SÉLECTIONNE LE NOM DE TOUTES LES TABLES D'UNE BASE DE DONNÉES
//        show tables FROM beweb_db WHERE 1

        //  SÉLECTIONNE LE NOM DE TOUTES LES COLONNES D'UNE TABLE
//        SELECT COLUMN_NAME, DATA_TYPE FROM information_schema.columns WHERE table_name = 'annonces'
//        SELECT COLUMN_NAME, DATA_TYPE FROM information_schema.columns WHERE table_name = (show tables FROM beweb_db WHERE 1)


    }

    /**
     * Initialize context and generate entities files
     * EntitiesBuilder constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->pdo = parent::getPdo();
        $this->aTables = $this->getTables();
        $this->dbname = parent::getDbName();
        $this->writeEntitiesFiles();
        $this->writeDaoEntitiesFiles();
    }

    /**
     * Retrieve all the tables in database
     * @return array collection of database entities names
     */
    private function getTables() : array{
        try
        {
            $requete = "show tables FROM " . DatabaseConnect::getDBname() . " WHERE 1" ;
            $req = $this->pdo->prepare($requete);
            $req->execute();
//            var_dump($req->fetchAll());
            return($req->fetchAll());
        }
        catch (\Exception $e)
        {
            return false;
        }
    }





    /**
     * generate a file content to write in an entity file ./models/~entity.php
     *
     */
    private function writeEntitiesFiles(){
//        foreach ($this->aTables as $table){
        $table[] = "villes";
//            var_dump($table);
            //  load entity template
            $templates = file_get_contents($this->lycos("entitiesTemplate.php.txt", ROOT . "core/"));

            //  Replace {CREATED_DATE}
            $templates = str_replace("{CREATED_DATE}", date("d/m/Y"), $templates);

            //  Replace {CLASSNAME}
            $templates = str_replace("{CLASSNAME}", ucfirst($table[0]), $templates);

            //  Get attributes' Entity
            $aAttributes = $this->getEntityAttributes($table[0]);
//            var_dump($aAttributes);

            //  Generate and replace {DECLARATIONS}
            $templates = str_replace("{DECLARATIONS}", $this->declarations($aAttributes), $templates);

            //  Generate and replace  {GETTERS}
            $templates = str_replace("{GETTERS}", $this->getters($aAttributes), $templates);

            //  Generate and replace  {SETTERS}
            $templates = str_replace("{SETTERS}", $this->setters($aAttributes), $templates);

            //  Write file on Models folder
            $file = ROOT . "models/".ucfirst($table[0]).".php";
            $xfile = fopen($file, "a");
            fputs($xfile, $templates);
            fclose($xfile);
            chmod($file, 0777);
//            break;
//        }
    }

    /**
     * generate a file content to write in an DaoEntity file ./dao/Dao~Entity.php
     *
     */
    private function writeDaoEntitiesFiles(){
//            var_dump("toto");
//        foreach ($this->aTables as $table){
            $table[] = "villes";
//            var_dump($table);
            //  load entity template
            $templates = file_get_contents($this->lycos("daoEntitiesTemplate.php.txt", ROOT . "core/"));

            //  Replace {CREATED_DATE}
            $templates = str_replace("{CREATED_DATE}", date("d/m/Y"), $templates);

            //  Replace {CLASSNAME}
            $templates = str_replace("{CLASSNAME}", ucfirst($table[0]), $templates);

            //  Replace {TABLE}
            $templates = str_replace("{TABLE}", $table[0], $templates);


            //  Write file on dAO folder
            $file = ROOT . "dao/Dao".ucfirst($table[0]).".php";
//            echo($file);
            $xfile = fopen($file, "a");
            fputs($xfile, $templates);
            fclose($xfile);
            chmod($file, 0777);
//            break;
//        }
    }

    /**
     * Retrieve all the columns' names from an entity
     * @param string $entity Name of an entity in database
     * @return array Collection of columns' names from an entity
     */
    public function getEntityAttributes(string $entity) : array{
        try
        {
            $requete = "SELECT COLUMN_NAME, DATA_TYPE FROM information_schema.columns WHERE TABLE_SCHEMA = '" . $this->dbname . "' AND TABLE_NAME = '" . $entity . "'";
//                var_dump($requete);
            $req = $this->pdo->query($requete);
            return($req->fetchAll());
//            foreach($req->fetchAll() as $column){
//                echo($this->writeGetter($column));
//                echo "<br>";
//            }
        }
        catch (\Exception $e)
        {
            return false;
        }
    }

    public function declarations(array $aAttributes){
        $buffer = "";
        foreach ($aAttributes as $attribute){
            $buffer.= "     private $" . $attribute["COLUMN_NAME"] . ";\n";
        }
        return $buffer;
    }

    /**
     * Perform a getter function according attribute's name and type
     * @param array $attribute
     * @return string
     */
    private function getters(array $aAttributes) : string{
        $buffer = "";
        foreach ($aAttributes as $attribute){
            $attributeName = $attribute["COLUMN_NAME"];

            switch ($attribute["DATA_TYPE"]){

                case "char":
                case "varchar":
                case "text":
                case "longtext":
                case "date":
                case "datetime":
                    $attributeType = "string";
                    break;

                case "int":
                case "tinyint":
                    $attributeType = "int";
                    break;

                case "double":
                case "decimal":
                    $attributeType = "double";
                    break;

                default:
                    $attributeType = $attribute["DATA_TYPE"];
                    break;
            }

            $buffer.= "
                        /**
                         * @return " . $attributeType  . "
                         */
    
                        public function get" . ucfirst($attributeName) . "()
                        {
                            return " . str_replace("$ ", "$", "$ this") . "->" . $attributeName . ";
                        }\n
            ";
        }
        return $buffer;
    }

    private function setters(array $aAttributes) : string{
        $buffer = "";
        foreach ($aAttributes as $attribute){
            $attributeName = $attribute["COLUMN_NAME"];

            switch ($attribute["DATA_TYPE"]){

                case "char":
                case "varchar":
                case "text":
                case "longtext":
                    $pattern = "#^.$#";
                    $attributeType = "string";
                    break;

                case "int":
                case "tinyint":
                    $pattern = "#^[0-9]+#";
                    $attributeType = "int";
                    break;

                case "double":
                case "decimal":
                    $pattern = "#^[0-9]{1,}\.[0-9]{1,}$#";
                    $attributeType = "double";
                    break;

                case "date":
                case "datetime":
                    $pattern = "#^((\d{4})-((0[1-9])|(1[0-2]))-(((0[1-9])|(1\d)|(2\d)|(3[0-1])))[[:space:]]?(((([[:space:]])(([0-1][0-9])|([2][0-3]))(:[0-5][0-9]))((:[0-5][0-9])?))?))$#";
                    $attributeType = "datetime";
                    break;

                default:
                    $pattern = "#^[a-zA-Z(0-9)?(/*-+%$)?]{1,}$#";
                   $attributeType = $attribute["DATA_TYPE"];
                    break;
            }

            $buffer.= "
                        /**
                         * @param " . $attributeType  . "
                         * @return bool
                         */
    
                        public function set" . ucfirst($attributeName) . "($$attributeName)
                        {
                           if(preg_match(\"$pattern\", $$attributeName)){
                                " . str_replace("$ ", "$", "$ this") . "->" . $attributeName . " = $$attributeName;
                                return true;
                           }else{
                                return false;
                           }
                        }\n
            ";
        }
        return $buffer;

    }

}