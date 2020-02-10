<?php

/**
 * Esta classe implementa o padrão Singleton
 * Visto que a requisição de instância pode ser feita mais
 * de uma vez, pois a comunicação com o DB é constante
 */

class Connection {
    private $server, $database, $db_login, $db_pass;
    public static $pdo;
    public $msg_error = "";

    function __construct() {
        $this->server = "localhost";
        $this->database = "saude+";
        $this->db_login = "root";
        $this->db_pass = "";   
    }

    /**
     * Testa se há instância definida na propriedade
     */
    function connect() {
		try {
			if(is_null(self::$pdo)) {
                self::$pdo = new PDO("mysql:host=".$this->server.";dbname=".$this->database, 
                $this->db_login, $this->db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			}
			return self::$pdo;
        }
        catch(PDOException $e) {
            $this->msg_error = $e->getMessage();
			//echo "Connection Error: $this->msg_error";
		}
    }
    
    function connectMaps() {
        $conn = mysqli_connect($this->server, $this->db_login, $this->db_pass, $this->database);
        $conn->set_charset("utf8");
        //mysqli_set_charset($conn, "utf8");
        return $conn;
    }
}
