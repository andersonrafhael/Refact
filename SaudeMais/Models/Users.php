<?php
require_once "Connection.php";
require_once "Interfaces.php";

class Users extends Connection implements Interfaces {
    private $login, $password, $name, $entry_date;

    function __set($attribute, $value) {
        $this->$attribute = $value;
    }

    function __get($attribute) {
        return $this->$attribute;      
    }

    function find_user_data($usr_cod) {
        $result = array();
        $pdo = $this->connect();
        $sql = $pdo->prepare("SELECT * FROM users WHERE usr_cod = :p_id");
        $sql->bindValue(":p_id", $usr_cod);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function db_save() {
        $pdo = $this->connect();
        $sql = $pdo->prepare("INSERT INTO users (usr_name, usr_login, usr_password, entry_date) VALUES (?, ?, ?, str_to_date(?, '%d/%m/%Y %H:%i:%s'))");
        $sql->execute([$this->name,$this->login,$this->password,strval($this->entry_date)]); 
    }

    function db_delete($usr_cod) {
        $pdo = $this->connect();
        $sql = $pdo->prepare("DELETE FROM users WHERE usr_cod = :p_id");
        $sql->bindValue(":p_id", $usr_cod);
        $sql->execute();
    }

    function db_update($usr_cod) {
        $pdo = $this->connect();

        $sql = $pdo->prepare("UPDATE users SET usr_name = :p_name, usr_login = :p_login, usr_password = :p_password 
        WHERE usr_cod = :p_id");
        $sql->bindValue(":p_name", $this->name);
        $sql->bindValue(":p_login", $this->login);
        $sql->bindValue(":p_password", $this->password);
        $sql->bindValue(":p_id", $usr_cod);
        $sql->execute();
    }
}