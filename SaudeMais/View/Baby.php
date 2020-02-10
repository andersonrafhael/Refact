<?php

include "HeaderMenu.php";
require_once "../../Models/Connection.php";
require_once "../../Models/Pregnancy_Baby.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Bebê </title>
        <!--<link rel="stylesheet" href="../CSS/Baby.css">-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="../CSS/Baby.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"></script>
        

    </head>

    <body>   
        <div class="container">
            <h2>Desenvolvimento do Bebê</h2>
            <span id="conteudo"></span>
        </div>
        <script>
            $(document).ready(function(){
                $.post('../../Controllers/Baby.php', function(retorna){
                    $("#conteudo").html(retorna);
                });
            });
        </script>
    </body>
</html>

<script>
    alert('<?php echo $_GET['erro'];?>')
</script>



