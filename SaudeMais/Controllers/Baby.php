<?php

require_once "../Models/Connection.php";
require_once "../Models/Users.php";
require_once "../Models/Pregnancy_Baby.php";
require_once "../vendor/autoload.php";

$connection = new Connection; // Instancia uma conexão PDO
$pdo = $connection->connect(); // Conecta com o banco

if(empty($connection->msg_error)) { // Se não houve erro de conexão, continua
    $baby = new Pregnancy_Baby;
    $collection_baby = new \Easy\Collections\ArrayList();
    $collection_baby = $baby->find_baby_data();  

    if(($collection_baby) && (count($collection_baby) > 0)) {
        ?>
    
        <table class="table table-sm table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th style="text-align: center; width: 3%">Semana</th>
                <th style="text-align: center; width: 200px">Tamanho</th>
                <th style="text-align: center; width: 3%"> Peso</th>
                <th style="text-align: center; width: 500px">Descrição</th>
            </tr>
        </thead>
    
        <tbody>
        <?php

        foreach($collection_baby as $key => $value) {
            ?>

            <tr>
                <th style="text-align: center"><?php print_r($value['semana']); ?></th>
                <td style="text-align: center"><?php print_r($value['tamanho']); ?></td>
                <td style="text-align: center"><?php print_r($value['peso']); ?></td>
                <td><?php print_r($value['descricao']); ?></td>
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


