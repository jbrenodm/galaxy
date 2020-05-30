<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

    public function templateView($pNomeView, $pDadosParaView = array()) {
        $this->view("Padrao/Cabecalho_View.php");
        $this->view($pNomeView, $pDadosParaView);
        $this->view("Padrao/Rodape_View.php");
    }

}