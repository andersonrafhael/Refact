<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Login </title>
        <link rel="stylesheet" href="../CSS/Login.css">
    </head>
    <body>
        <div id="corpo_login">
            <h1>Entrar</h1>
            <form method="POST" action="../../Controllers/Login.php">
                <input type="text" placeholder="Nome de Usuário" name="username" id="username"> 
                <input type="password" placeholder="Senha" name="senha" id="senha">
                <button type="submit" name="acessar" id="acessar">
                    <strong><span>Acessar</span></strong>
                </button>
            </form>
            
            <div>
                <a href="Cadastro.html">Ainda não é inscrito? <strong>Cadastre-se!</strong></a>
            </div>    
        </div>
    </body>
</html>

<script>
    alert('<?php echo $_GET['senha'];?>')
</script>
<script>
    alert('<?php echo $_GET['database'];?>')
</script>
<script>
    alert('<?php echo $_GET['preencha'];?>')
</script>