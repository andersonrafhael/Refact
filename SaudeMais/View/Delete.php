<?php
include "HeaderMenu.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Cadastro de Usuários </title>
        <link rel="stylesheet" href="../CSS/Delete.css">
    </head>
    
    <body>
        <div id="corpo_delete">
            <form method="POST" action="../../Controllers/Deletar.php">
                 
                <h2> Tem certeza que deseja excluir sua conta? </h2>
                <button type="submit" name="sim" id="sim"><strong>Sim</strong></button>
                <button type="submit" name="nao" id="nao"><strong>Não</strong></button>
            </form>   
            
        </div>           
    </body>
</html>



