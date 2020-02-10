<?php

require_once "../Models/Connection.php";
require_once "../Models/Users.php";

if(isset($_POST['nome'])) {
    
    $login = addslashes($_POST['login']);
    $password = addslashes($_POST['senha']);
    $name = addslashes($_POST['nome']);
    $pass_confirm = addslashes($_POST['confirmaSenha']);

    session_start();
    $id = $_SESSION['user_id'];

    $connection = new Connection; // Instancia uma conexão PDO
    $pdo = $connection->connect(); // Conecta com o banco
    $user = new Users; // Instancia a classe Users
    $result = $user->find_user_data($id); // Recupera todas as informações do usuário logado

    

    if(empty($login) or empty($name)) {
        $field_error = "Os campos Login e Nome devem ser preenchidos!";
        header("location: ../View/HTML/Edit Profile.php");
    }

    elseif(!empty($login) && !empty($name)) {

        if(empty($password) && empty($pass_confirm)) {
            // Verifica se o usuário já está cadastrado
            $sql = $pdo->prepare("SELECT usr_cod FROM users WHERE usr_login = :p_login");
            $sql->bindValue(":p_login", $login);
            $sql->execute();
            $resul = $sql->fetchall();
           
            if(count($resul) > 0) {
                if($id == $resul[0]['usr_cod']) { // Verifica se o login que o usuário está tentando editar é seu próprio login
                    $usr_pass = $user->__get('password');
                    $user->__set('name', $name);
                    $user->__set('login', $login);
                    $user->__set('password', $result['usr_password']);
                    $user->db_update($id);
                    $success = "Dados atualizados com sucesso!";    
                    header("location: ../View/HTML/MainMenu.php?sucesso=Dados alterados com sucesso!"); 
                }
                else {       
                    header("location: ../View/HTML/Edit Profile.php?existe=Esse usuário já existe!");      
                    //return false; // usuário já cadastrado
                }
            }

            else {

                if(empty($connection->msg_error)) {         
                    $usr_pass = $user->__get('password');
                    $user->__set('name', $name);
                    $user->__set('login', $login);
                    $user->__set('password', $result['usr_password']);
                    $user->db_update($id);
                    $success = "Dados atualizados com sucesso!";    
                    header("location: ../View/HTML/MainMenu.php?sucesso=Dados alterados com sucesso!"); 
                }
                else {
                    $con_error = "Connection Error: $connection->msg_error";
                    header("location: ../View/HTML/Login.html?conec_error=".$con_error); 
                }
            }
        } 
        
        elseif(empty($password) && !empty($pass_confirm)) {
            header("location: ../View/HTML/Edit Profile.php?senha=Verifique sua senha!");
        }

        elseif(!empty($password) && empty($pass_confirm)) {
            $pass_error = "Confirme sua senha!";
            header("location: ../View/HTML/Edit Profile.php");
        }

        elseif(!empty($password) && !empty($pass_confirm)) { // Verifica se todos os campos estão preenchidos

            // Verifica se o usuário já está cadastrado
            $sql = $pdo->prepare("SELECT usr_cod FROM users WHERE usr_login = :p_login");
            $sql->bindValue(":p_login", $login);
            $sql->execute();
            $resul = $sql->fetchall();

            if(count($resul) > 0) {
                if($id == $resul[0]['usr_cod']) { // Verifica se o login que o usuário está tentando editar é seu próprio login
                    if(empty($connection->msg_error)) { // Se não houve erro de conexão, continua         
                        if($password == $pass_confirm) {
                            $user->__set('name', $name);
                            $user->__set('login', $login);
                            $user->__set('password', md5($password));
                            $user->db_update($id);
                            header("location: ../View/HTML/MainMenu.php?sucesso=Dados alterados com sucesso!"); 
                        }
            
                        else {
                            header("location: ../View/HTML/Edit Profile.php?senha=As senhas não coincidem!");
                        }
                    }
            
                    else {
                        $con_error = "Connection Error: $connection->msg_error";
                        header("location: ../View/HTML/Login.html"); 
                    }
                }

                else {
                    header("location: ../View/HTML/Edit Profile.php?existe=Esse usuário já existe!"); 
                }
            }
            

            else {      
                if(empty($connection->msg_error)) { // Se não houve erro de conexão, continua         
                    if($password == $pass_confirm) {
                        $user->__set('name', $name);
                        $user->__set('login', $login);
                        $user->__set('password', md5($password));
                        $user->db_update($id);
                        header("location: ../View/HTML/MainMenu.php?sucesso=Dados alterados com sucesso!"); 
                    }
        
                    else {

                        exit;
                        header("location: ../View/HTML/Edit Profile.php?senha=As senhas não coincidem!");
                    }
                }
        
                else {
                    $con_error = "Connection Error: $connection->msg_error";
                    header("location: ../View/HTML/Login.html"); 
                }
            }
        }
    }
}