<?php

namespace Lastcar\models;

interface Persistable {
   public function Create($post);
   public function Retrieve();
   public function Update($aPropVal);
   public function Delete();
   
}
