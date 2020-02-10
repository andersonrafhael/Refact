<?php

require_once "../Models/Connection.php";
require_once "../Models/Users.php";

if(isset($_POST['sim'])) {
    session_start();
    $id = $_SESSION['user_id'];
    $connection = new Connection; // Instancia uma conexão PDO
    $pdo = $connection->connect(); // Conecta com o banco
    if(empty($connection->msg_error)) { // Se não houve erro de conexão, continua
        $user = new Users;
        $user->db_delete($id);
        header("location: ../Controllers/Exit.php"); 
    }
    
    else {
        $con_error = "Connection Error: $connection->msg_error";
        header("location: ../View/HTML/Login.html"); 
    }
}

else {
    header("location: ../View/HTML/MainMenu.php");
}