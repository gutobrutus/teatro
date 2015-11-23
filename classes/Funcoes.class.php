<?php
class Funcoes {
    public function dateToBR($dataAmericana) {
        //aaaa-mm-dd -> dd-mm-aaaa
        $d = explode('-', $dataAmericana);
        $dOk = $d[2] . '/' . $d[1] . '/' . $d[0];
        return $dOk;
    }

    public function dateToUS($dataBrasil) {
        //dd-mm-aaaa -> aaaa-mm-dd
        $d = explode('/', $dataBrasil);
        $dOk = $d[2] . '-' . $d[1] . '-' . $d[0];
        return $dOk;
    }

    public function dateTimeToBR($data_americana_his) {
        $d = explode(' ', $data_americana_his);
        $dOk = $this -> dateToBR($d[0]) . ' ' . $d[1];
        return $dOk;
    }

    public function dateTimeToUS($data_br_his) {
        $d = explode(' ', $data_br_his);
        $dOk = $this -> dateTimeToUS($d[0]) . ' ' . $d[1];
        return $dOk;
    }
    
    public function situacoes($situacao){
    switch ($situacao) {
        case 1:
            echo "Solicitado";
            break;
        case 2:
            echo "Autorizado";
            break;
        case 3:
            echo "Aguardando Pgto";
            break;
        case 4:
            echo "Confirmado";
            break;
        default:
            echo "Sem Status Cadastrado";
            break;
            
    }
    }

}
?>
