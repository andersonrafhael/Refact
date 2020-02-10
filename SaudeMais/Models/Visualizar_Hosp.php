<?php

require_once "Connection.php";
require_once "Users.php";

class Visualizar_Hosp extends Connection {
            
    function find_hosp_data($cod_hosp) {
        $result = array();
        $pdo = $this->connect();
        $sql = $pdo->prepare("SELECT * FROM hosp_info WHERE cod_hosp_info = :p_cod_hosp");
        $sql->bindValue(":p_cod_hosp", $cod_hosp);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}