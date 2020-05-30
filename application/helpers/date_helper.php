<?php

    function dataPtBrParaMySQL($pDataPtBr) {
        $partes = explode("/", $pDataPtBr);
        $dataMySQL = $partes[2].'-'.$partes[1].'-'.$partes[0];
        return $dataMySQL;
    }

    function dataMySQLParaPtBr($pDataMysql) {
        $data = new DateTime($pDataMysql);
        $dataPtBr = $data->format("d/m/Y");
        return $dataPtBr;
    }