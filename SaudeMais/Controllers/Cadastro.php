<?php
require_once "../Models/Connection.php";
require_once "../Models/Users.php";
date_default_timezone_set('America/Maceio');


if(isset($_POST['nome'])) {
    $login = addslashes($_POST['login']);
    $password = addslashes($_POST['senha']);
    $name = addslashes($_POST['nome']);
    $pass_confirm = addslashes($_POST['confirmaSenha']);
    $entry_date = date('d/m/Y H:i:s', time());

    if(!empty($login) && !empty($name) && !empty($password) && !empty($pass_confirm)) { // Verifica se todos os campos estão preenchidos
        $connection = new Connection; // Instancia uma conexão PDO
        $pdo = $connection->connect(); // Conecta com o banco
        if(empty($connection->msg_error)) { // Se não houve erro de conexão, continua
            
            if($password == $pass_confirm) {
                // Verifica se o usuário já está cadastrado
                $sql = $pdo->prepare("SELECT usr_login FROM users WHERE usr_login = :p_login");
                $sql->bindValue(":p_login", $login);
                $sql->execute();

                if($sql->rowCount() > 0) {
                    $usr_error = "Esse usuário já existe!";         
                    header("location: ../View/HTML/Cadastro.html");      
                    //return false; // usuário já cadastrado
                }

                else {
                    $user = new Users;
                    $user->__set('name', $name);
                    $user->__set('login', $login);
                    $user->__set('password', md5($password));
                    $user->__set('date', $entry_date);
                    $user->db_save();
                    $success = "Cadastro realizado com sucesso!";
                    header("location: ../View/HTML/Login.php"); 
                }
            }

            else {
                $pass_error = "As senhas não coincidem!";
                echo $pass_error;  
                header("location: ../View/HTML/Cadastro.html");
            }
        }

        else {
            $con_error = "Connection Error: $connection->msg_error";
            header("location: ../View/HTML/Cadastro.html"); 
        }
    }

    else {
        $field_error = "Todos os campos devem ser preenchidos!";
        header("location: ../View/HTML/Cadastro.html");
    }
}
