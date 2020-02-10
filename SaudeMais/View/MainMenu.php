<?php

require_once "../../Models/Connection.php";
require_once "../../Models/Users.php";

session_start(); 
if(!isset($_SESSION['user_id'])) {
        header("location: Login.php");
        exit;
}

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
      <link rel="stylesheet" href="SaudeMaisNew/View/CSS/MainMenu.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Montserrat+Alternates&display=swap" rel="stylesheet">
      <script src="https://kit.fontawesome.com/8fff6865c6.js" crossorigin="anonymous"></script>
</head>
<body>
        
  <!--==========================
    Header
  ============================-->
  <header id="header">

      <input type="checkbox" id="checkbox">
      <label for="checkbox" class="menu_icon"><i class="fas fa-bars"></i></label>

      <div class="background" id="bg"></div>

      <nav class="side_menu" id="main">
            <ul>
                  <li><img src="../../Images/saudeicon.png" width="150px" id="img" class="img_user"></li>
                  <li><b>Olá, <?php echo $result['usr_login'];?></b></li>
                  <li><br><a href="../HTML/StartPage.php" class="voltar">Início</a></li>
                  <li><a href="#perfil">Perfil<span><i class="fas fa-angle-right" id="arrow"></i></span></a></li>
                  <li><a href="#saude_publica">Saúde<strong><i class="fas fa-plus" id="plus"></i></strong> Pública<span><i class="fas fa-angle-right"></i></span></a></li>
                  <li><a href="#mini_anamnese">Mini Anamnese <span><i class="fas fa-angle-right" id="arrow"></i></span></a></li>
                  <li><a href="">Campanhas e Eventos</a></li>
                  <li><a href="#minha_gestacao">Minha Gestação <span><i class="fas fa-angle-right" id="arrow"></i></span></a></li>
                  <li><a href="">Minha Saúde</a></li>
            </ul>
        
      <br>
      <a href="../../Controllers/Exit.php">Encerrar Sessão</a>
      </nav>

      <nav class="side_menu" id="perfil">
            <ul>
                  <li><a href="#" class="voltar">Voltar <span><i class="fas fa-angle-left"></i></span></a></li>
                  <li><a href="../HTML/Edit Profile.php">Editar Perfil</a></li>
                  <li><a href="../HTML/Delete.php">Excluir Conta</a></li>
            </ul>
      </nav>

      <nav class="side_menu" id="saude_publica">
            <ul>
                  <li><a href="#" class="voltar">Voltar <span><i class="fas fa-angle-left"></i></span></a></li>
                  <li><a href="Mapa.php">Mapa</a></li>
                  <li><a href="SaudePublicaInfo.php">Informações</a></li>
                  <li><a href="">Avisos</a></li>
            </ul>
      </nav>

      <nav class="side_menu" id="mini_anamnese">
          <ul> 
                  <li><a href="#" class="voltar">Voltar <span><i class="fas fa-angle-left"></i></span></a></li>
                  <li><a href="../HTML/Anamnese.php">Responder Anamnese</a></li>
                  <li><a href="">Alterar Respostas</a></li>
            </ul>
      </nav>

      <nav class="side_menu" id="minha_gestacao">
            <ul>
                  <li><a href="#" class="voltar"> <span><i class="fas fa-angle-left"></i></span>Voltar</a></li>
                  <li><a href="">Mamãe</a></li>
                  <li><a href="../HTML/Baby.php">Bebê</a></li>
            </ul>
      </nav>

      <div class="logo">
            <a href="MainMenu.php">
                  <img src="" alt="logo topo" id="logotopo">
            </a>
      </div>


      </header>

</body>
</html>

<script>
        alert('<?php echo $_GET['sucesso'];?>')
</script>
<script>
        alert('<?php echo $_GET['anamnese_ok'];?>')
</script>

