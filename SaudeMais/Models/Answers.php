<?php

require_once "Connection.php";
require_once "Save.php";

class Answers {
    private $resp, $desc_resp;

    function __set($attribute, $value) {
        $this->$attribute = $value;
    }

    function __get($attribute) {
        return $this->$attribute;      
    }
}