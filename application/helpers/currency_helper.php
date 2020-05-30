<?php
    function valorEmReais($pValor){
        return "R$ " . number_format($pValor, 2, ",", ".");
    }
?>