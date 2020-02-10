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
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Montserrat+Alternates&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/8fff6865c6.js" crossorigin="anonymous"></script>

  <!-- Favicons -->
  <link href="../../img/favicon.png" rel="icon">
  <link href="../../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="../../lib/venobox/venobox.css" rel="stylesheet">


  <!-- Main Stylesheet File -->
  <link href="../../css/style.css" rel="stylesheet">

</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">Saúde<strong><i class="fas fa-plus" id="plus"></i></strong></a></h1>
         <a href="#intro"><img src="../../img/logo.png" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#prev">Saúde Preventiva</a></li>
          <li><a href="#news">Notícias</a></li>
          <li><a href="#contact">Contato</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>


    <input type="checkbox" id="checkbox">
    <label for="checkbox" class="menu_icon"><i class="fas fa-bars"></i></label>

    <div class="background" id="bg"></div>

    <nav class="side_menu" id="main">
      <ul>
        <li><img src="../../Images/saudeicon.png" width="150px" id="img" class="img_user"></li>
        <li><b>Olá, <?php echo $result['usr_login'];?></b></li>
        <li><br><a href="StartPage.php" class="voltar">Início</a></li>
        <li><a href="#perfil">Perfil<span><i class="fas fa-angle-right" id="arrow"></i></span></a></li>
        <li><a href="#saude_publica">Saúde<strong><i class="fas fa-plus" id="plus"></i></strong> Pública<span><i class="fas fa-angle-right"></i></span></a></li>
        <li><a href="#mini_anamnese">Mini Anamnese <span><i class="fas fa-angle-right" id="arrow"></i></span></a></li>
        <li><a href="CampanhasEventos.php">Campanhas e Eventos</a></li>
        <li><a href="#minha_gestacao">Minha Gestação <span><i class="fas fa-angle-right" id="arrow"></i></span></a></li>
        <li><a href="MinhaSaude.php">Minha Saúde</a></li>
      </ul>
        
      <br>

      <a href="../../Controllers/Exit.php">Encerrar Sessão</a>

    </nav>

    <nav class="side_menu" id="perfil">
      <ul>
        <li><a href="#" class="voltar">Voltar <span><i class="fas fa-angle-left"></i></span></a></li>
        <li><a href="Edit Profile.php">Editar Perfil</a></li>
        <li><a href="Delete.php">Excluir Conta</a></li>
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
        <li><a href="Anamnese.php">Responder Anamnese</a></li>
        <li><a href="">Alterar Respostas</a></li>
      </ul>
    </nav>

    <nav class="side_menu" id="minha_gestacao">
      <ul>
        <li><a href="#" class="voltar"> <span><i class="fas fa-angle-left"></i></span>Voltar</a></li>
        <li><a href="">Mamãe</a></li>
        <li><a href="Baby.php">Bebê</a></li>
      </ul>
    </nav>
  </header>
  <!-- End Header -->

  

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Uncomment below i you want to use a preloader -->
 <div id="preloader"></div> 

<!-- JavaScript Libraries -->
<script src="../../lib/jquery/jquery.min.js"></script>
<script src="../../lib/jquery/jquery-migrate.min.js"></script>
<script src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../lib/easing/easing.min.js"></script>
<script src="../../lib/superfish/hoverIntent.js"></script>
<script src="../../lib/superfish/superfish.min.js"></script>
<script src="../../lib/wow/wow.min.js"></script>
<script src="../../lib/waypoints/waypoints.min.js"></script>
<script src="../../lib/counterup/counterup.min.js"></script>
<script src="../../lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../../lib/isotope/isotope.pkgd.min.js"></script>
<script src="../../lib/lightbox/js/lightbox.min.js"></script>
<script src="../../lib/touchSwipe/jquery.touchSwipe.min.js"></script>
<script>src="../../lib/venobox/venobox.min.js"</script>

<!-- Contact Form JavaScript File -->
<script src="../../contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="../../js/main.js"></script>

</body>
</html>