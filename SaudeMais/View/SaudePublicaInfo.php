<?php

include "HeaderMenu.php";

?>


<!doctype html>
<html lang="pt-br">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Informações Saúde Pública </title>
        <!--<link rel="stylesheet" href="../CSS/Baby.css">-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="../CSS/SaudePublicaInfo.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"></script>
        

    </head>

    <body>   
        <div class="container">
            <h2>Saúde+ Pública</h2>
            <span id="conteudo"></span>
        </div>

        <!-- Modal -->
        <div id="visualizar_hosp_modal" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="titulo_modal">Informações</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <span id="visualizar_info"> </span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>

        <script>
            $(document).ready(function(){
                $.post('../../Controllers/SaudePublicaInfo.php', function(retorna){
                    $("#conteudo").html(retorna);
                });
            });

            $(document).ready(function() {
              $(document).on('click', '.view_data', function(){
                var cod_hosp = $(this).attr("id");
                //alert(cod_hosp);
                // Verificar se há valor na variável cod_hosp
                
                if(cod_hosp !== '') {
                  var data = {
                    cod_hosp: cod_hosp
                  };
                  $.post('../../Controllers/Visualizar.php', data, function(retorna) {
                    // Carregar informações da unidade de saúde na janela modal
                    $('#visualizar_hosp_modal').modal('show');
                    $('#visualizar_info').html(retorna);

                  });
                }
              });    

            });
        </script>
    </body>
</html>