<?php

require_once "../Models/Connection.php";
require_once "../Models/SaudePublicaInfo.php";
require_once "../vendor/autoload.php";


$connection = new Connection; // Instancia uma conexão PDO
$pdo = $connection->connect(); // Conecta com o banco

if(empty($connection->msg_error)) { // Se não houve erro de conexão, continua
    $saudepublica = new SaudePublicaInfo;
    $collection_uni_saude = new \Easy\Collections\ArrayList();
    $collection_uni_saude = $saudepublica->find_hosp_data();  

    if(($collection_uni_saude) && (count($collection_uni_saude) > 0)) {
        ?>
    
        <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th style="text-align: center">Unidade de Saúde</th>
                <th style="text-align: center">Mais Informações</th>
            </tr>
        </thead>
    
        <tbody>
        <?php

        foreach($collection_uni_saude as $key => $value) {
            ?>

            <tr>
                <th><?php print_r($value['nome']); ?></th>
                <td style="text-align: center;">
                    <button type="button" class="btn btn-outline-primary view_data" id="<?php print_r($value['cod_hosp_info']); ?>">Visualizar</button>
                </td>
            </tr>

            <?php
        }  
    }

    else {
        echo "<div class='alert alert-danger' role='alert'>
                Nenhum registro encontrado!
              </div>";
        exit();
    }
}
    
else {
    $con_error = "Connection Error: $connection->msg_error";
    echo $con_error;
    exit();
}

?>
</tbody>
</table>


