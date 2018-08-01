<?php

namespace Lastcar\models;
    
use Lastcar\models\Users;
 
class UsersProfile extends Users
{
    
    public function Create($post) {
        $post['photo'] = "upload/imagesUsersPriv/img.png";
        $post['JSon_visibility'] = $this->setJSon_visibility($this->initJson());
//        var_dump($post);
        $response = parent::Create($post);
        if($response == 0 ):
            throw new \Exception("La création de 'Users' n'a pas pu être effectuée !");
        else:
            return $response;
        endif;
    }
    
    private function initJson() {
        
        return array(
            
                    'pseudoVisibility' => 1 ,
                    'genreVisibility' => 0 ,
                    'nomVisibility' => 0,
                    'prenomVisibility' => 0,
                    'telephoneVisibility' => 0,
                    'emailVisibility' => 0,
                    'date_de_naissanceVisibility' => 0,
                   
                );
    }

    /** Surcharge de la méthode contenue dans users
     * @param array
     */
    public function setJSon_visibility($aJSon_visibility)
    {
        if(is_array($aJSon_visibility)) $aJSon_visibility = json_encode($aJSon_visibility);
        if(parent::setJSon_visibility($aJSon_visibility)) return json_encode($aJSon_visibility);
    }

    /** Surcharge de la méthode contenue dans users
     * @return array
     */
    public function getJSon_visibility()
    {
       return json_decode(parent::getJSon_visibility(), true);
    }
    
    public function getProperty($pWhat){
        $aVisibility = $this->getJSon_visibility();
        
        $attribute = $pWhat."Visibility";
        if(array_key_exists($attribute, $aVisibility)){
            if($aVisibility[$attribute] == 0){
                return "";
            }else{
                $method = "get" . ucfirst($pWhat);
                return "<p>".ucfirst($pWhat)." : " .  $this->$method() . "</p>";
            }
        }
    }
}