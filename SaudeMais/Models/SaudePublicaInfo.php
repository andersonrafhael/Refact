<?php

require_once "Connection.php";
require_once "Users.php";

class SaudePublicaInfo extends Connection {
    private $cod_hosp, $nome, $horario, $especialidades, $contato;

    function __set($attribute, $value) {
        $this->$attribute = $value;
    }

    function __get($attribute) {
        return $this->$attribute;      
    }
            
    function find_hosp_data() {
        $pdo = new Connection;
        $result = array();
        $pdo = $this->connect();
        $sql = $pdo->prepare("SELECT * FROM hosp_info");
        $sql->execute();
        $result = $sql->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }

}