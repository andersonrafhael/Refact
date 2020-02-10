<?php

require_once "../Models/Connection.php";
require_once "../Models/Visualizar_Hosp.php";

if(isset($_POST['cod_hosp'])) {
    $resultado = '';
    $hosp_info = new Visualizar_Hosp;
    $cod_hosp = addslashes($_POST['cod_hosp']);
    $result = $hosp_info->find_hosp_data($cod_hosp);

    $resultado .= '<dl class="row">';

    $resultado .= '<dt class="col-sm-3">Horário</dt>';
    $resultado .= '<dd class="col-sm-9">'.$result['horario'].'</dd>';

    $resultado .= '<dt class="col-sm-3">Contato</dt>';
    $resultado .= '<dd class="col-sm-9">'.$result['contato'].'</dd>';

    $resultado .= '<dt class="col-sm-3">Especialidades Clínicas</dt>';
    $resultado .= '<dd class="col-sm-9">'.$result['especialidades'].'</dd>';

    $resultado .= '</dl>';

    echo $resultado;
}
