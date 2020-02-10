<?php

require_once "Connection.php";
require_once "Save.php";

class Questions {
    private $cod_perg, $desc_perg;

    function __set($attribute, $value) {
        $this->$attribute = $value;
    }

    function __get($attribute) {
        return $this->$attribute;      
    }
}