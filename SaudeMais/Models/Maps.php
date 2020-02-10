<?php

require_once "Connection.php";

class Maps extends Connection {
    private $address, $lat, $lon, $type, $name;
    function __set($attribute, $value) {
        $this->$attribute = $value;
    }

    function __get($attribute) {
        return $this->$attribute;      
    }

    function find_maps_data() {
        
        $pdo = $this->connectMaps();
        $sql = "SELECT * FROM markers";
        $resultado = mysqli_query($pdo, $sql);
        return $resultado;
   
        /*$result = array();
        $pdo = $this->connect();
        $sql = $pdo->prepare("SELECT * FROM markers");
        $sql->execute();
        $result = $sql->fetchall(PDO::FETCH_ASSOC);
        return $result;*/
    }

    function parseToXML($htmlStr) {
        $xmlStr=str_replace('<','&lt;',$htmlStr);
        $xmlStr=str_replace('>','&gt;',$xmlStr);
        $xmlStr=str_replace('"','&quot;',$xmlStr);
        $xmlStr=str_replace("'",'&#39;',$xmlStr);
        $xmlStr=str_replace("&",'&amp;',$xmlStr);
        return $xmlStr;
    }
}