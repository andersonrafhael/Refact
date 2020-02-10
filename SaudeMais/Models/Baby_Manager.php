<?php

require_once "Connection.php";
require_once "Users.php";


class Baby_Manager extends Connection implements ISearch {
    private $week, $size, $weight, $desc;

    function __set($attribute, $value) {
        $this->$attribute = $value;
    }

    function __get($attribute) {
        return $this->$attribute;      
    }

    function db_search() {
        $result = array();
        $pdo = $this->connect();
        $sql = $pdo->prepare("SELECT * FROM baby");
        $sql->execute();
        $result = $sql->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }

}