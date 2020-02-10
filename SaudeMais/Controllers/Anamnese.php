<?php
require_once "../Models/Connection.php";
require_once "../Models/Users.php";
require_once "../Models/Quest_User.php";

$cod_qst = 1;
session_start();
$id = $_SESSION['user_id'];

if(isset($_POST)) {

    $diabetes = $_POST['diabetes'];
    $hipertensao = $_POST['hipertensao'];
    $tabagismo = $_POST['tabagismo'];
    $bebida = $_POST['bebida'];
    $atividadef = $_POST['atividadef'];
    $estresse = $_POST['estresse'];
    $gestante = $_POST['gestante'];
    $sono = $_POST['sono'];

    $perg_resp = array('1' => $diabetes, '2' => $hipertensao, '3' => $tabagismo, '4' => $bebida, '5' => $atividadef, 
    '6' => $estresse, '7' => $gestante, '8' => $sono);

    if(empty($diabetes) || empty($hipertensao) || empty($tabagismo) || empty($bebida) ||
       empty($atividadef) || empty($estresse) || empty($gestante) || empty($sono)) { // Verifica se algum dos campos está vazio
        
        header("location: ../View/HTML/Anamnese.php?preencher=É necessário que todas as perguntas sejam respondidas!");
    }

    else {
        $connection = new Connection; // Instancia uma conexão PDO
        $pdo = $connection->connect(); // Conecta com o banco
        if(empty($connection->msg_error)) { // Se não houve erro de conexão, continua
            $qst_user = new Quest_User;
            $qst_user->__set('cod_perg_resp', $perg_resp);
            $qst_user->__set('cod_qst', $cod_qst);   
            $qst_user->db_save($id); 
            header("location: ../View/HTML/MainMenu.php?anamnese_ok=Suas respostas foram salvas com sucesso!");
        }
    }
}   