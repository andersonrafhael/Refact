<?php

require_once "Connection.php";

class Questionnaire {
    private $cod_qst;

    function __set($attribute, $value) {
        $this->$attribute = $value;
    }

    function __get($attribute) {
        return $this->$attribute;      
    }
}