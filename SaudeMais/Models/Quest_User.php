<?php

require_once "Connection.php";

class Quest_User extends Connection {
    private $cod_qst; 
    private $cod_perg_resp = array();

    function __set($attribute, $value) {
        $this->$attribute = $value;
    }

    function __get($attribute) {
        return $this->$attribute;      
    }

    function db_save($usr_cod) {
        foreach($this->cod_perg_resp as $key => $value) {

            $cod_perg = $key;
            $cod_resp = $value;

            $pdo = $this->connect();

            $sql = $pdo->prepare("INSERT INTO qst_user (cod_perg_fk, cod_resp_fk, cod_qst_fk, cod_usr_fk) VALUES (?, ?, ?, ?)");
            $sql->execute([$cod_perg, $cod_resp, $this->cod_qst, $usr_cod]);
        }
        
    }
}