<?php

include "HeaderMenu.php";
require_once "../../Models/Connection.php";
require_once "../../Models/Users.php";

$id = ($_SESSION['user_id']);
$connection = new Connection; // Instancia uma conexão PDO
$pdo = $connection->connect(); // Conecta com o banco

if(empty($connection->msg_error)) { // Se não houve erro de conexão, continua
    $user = new Users;
    $result = $user->find_user_data($id);    
}
    
else {
    $con_error = "Connection Error: $connection->msg_error";
    echo $con_error;
    //header("location: ../View/HTML/Login.html"); 
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Editar Perfil </title>
        <link rel="stylesheet" href="../CSS/Edit.css">
    </head>

    <body>
        <div class="corpo" id="corpo_edit">
            <form method="POST" action="../../Controllers/Editar Perfil.php">
                <h1> Editar Dados </h1>
                <input type="text" placeholder="Nome" name="nome" id="nome" maxlength="50"
                value="<?php if(isset($result)) {
                        echo $result['usr_name'];                    
                        }?>">
                <input type="text" placeholder="Nome de usuário" name="login" id="login" maxlength="20"
                value="<?php if(isset($result)) {
                        echo $result['usr_login'];                    
                        }?>">
                <input type="password" placeholder="Nova Senha" name="senha" id="senha" maxlength="20">
                <input type="password" placeholder="Confirme sua senha" name="confirmaSenha" id="confirmaSenha" maxlength="20">
                <button type="submit" name="atualizar" id="atualizar"><strong>Pronto!</strong></button>
            </form>   
        </div>            
    </body>
</html>

<script>
    alert('<?php echo $_GET['existe'];?>')
</script>

<script>
    alert('<?php echo $_GET['senha'];?>')
</script>



