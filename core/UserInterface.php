<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Lastcar\core;
/**
 *
 * @author loic
 */
interface UserInterface {
    
    public function getUsername();
    public function getPassword();
    public function getRoles();
}