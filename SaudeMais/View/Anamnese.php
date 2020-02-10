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
    <link rel="stylesheet" href="../CSS/Anamnese.css">
    <title>Anamnese</title>
</head>
<body>

    

    <br><br><br>


<form id="dados" name ="dados">
    <table class="table1" id="table1">
        <caption> <h3>Dados Pessoais</h3><br></caption>    
        <tr>
            <td widht="50%">Nome: <?php if(isset($result)) {
                                    echo $result['usr_name'];                    
                                    }?> </td>
            <td>Data Nascimento: ##/##/#### </td>
        </tr>

        <tr>
            <td>Idade: ##</td>
            <td>Sexo: #</td>
            <td>Convênio:  Unimed Maceió</td>
        </tr>

        <tr>
            <td>Endereço: ###############</td>
            <td>Telefone: 82 99999999</td>  
        </tr>
    </table>
</form>



<form id="questionario" name ="questionario" method="post" action="../../Controllers/Anamnese.php">
    <table class="table2" border=".6px" id="table2">
        <caption><br><br><h3>Histórico</h3><br></caption>
        
        <tr>
            <td>
                <h4 class="diabetes"> 1) Diabetes? </h4>
                <input type="radio" name="diabetes" value="1" /> Sim
                <br/>
                <input type="radio" name="diabetes" value="2" /> Não
                <br><br>
            </td>

            <td>
                <h4 class="hipertensao"> 2) Hipo/Hipertensão Arterial? </h4>
                <label>
                <input type="radio" name="hipertensao" value="3" /> Sim
                <br/>
                <input type="radio" name="hipertensao" value="4" /> Não
                </label>
                <br><br>
            </td>
        </tr>
        

        <tr>
            <td>
                <h4 class="tabagismo"> 3) Tabagismo? </h4>
                <label>
                <input type="radio" name="tabagismo" value="5" /> Sim
                <br/>
                <input type="radio" name="tabagismo" value="6" /> Não
                </label>
                <br><br/>
            </td>

            <td>
                <h4 class="bebida"> 4) Ingere algum tipo de bebida alcoólica? </h4>
                <label>
                <input type="radio" name="bebida" value="7" /> Sim
                <br>
                <input type="radio" name="bebida" value="8" /> Não
                </label>
                <br><br>
            </td>

        </tr>

        <tr>
            <td>
                <h4 class="atividadef"> 5) Pratica alguma atividade física? </h4>
                <label>
                <input type="radio" name="atividadef" value="9" /> Sim
                <br>
                <input type="radio" name="atividadef" value="10" /> Não
                </label>
                <br><br>
            </td>

            <td>
                <h4 class="estresse"> 6) Sofre de estresse? </h4>
                <label>
                <input type="radio" name="estresse" value="11" /> Sim
                <br/>
                <input type="radio" name="estresse" value="12" /> Não
                </label>
                <br><br/>
            </td>
        </tr>

        <tr>
            <td>
                <h4 class="gestante"> 7) Gestante? </h4>
                <label>
                <input type="radio" name="gestante" value="13" /> Sim
                <br/>
                <input type="radio" name="gestante" value="14" /> Não
                </label>
                <br><br/>
            </td>

            <td>
                <h4 class="sono"> 8) Qualidade do sono? </h4>
                <label>
                <input type="radio" name="sono" value="15" /> Boa
                <br/>
                <input type="radio" name="sono" value="16" /> Ruim
                </label>
                <br><br/>
            </td>
        </tr>
        
    </table>


    <button type="submit" name="finalizar" id="finalizar">Finalizar</button>
</form>
</body>
</html>

<script>
    alert('<?php echo $_GET['preencher'];?>')
</script>
