<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_C extends CI_Controller {

    protected function __construct(){
        $this->load->model('User_Model');
    }

    public function newUser()
    {        
        // $this->output->enable_profiler(TRUE);

        $newUserData = [
            "name" => $this->input->post('name'),
            "surname" => $this->input->post('surname'),
            "email" => $this->input->post('email'),
            "password" => md5(trim($this->input->post('password'))),
            "password_confirm" =>  md5(trim($this->input->post('password_confirm')))
        ]; 
        
        if($this->validarDadosDeCadastro($newUserData)){            
            $this->User_Model->salvarUsuario($newUserData);
            $this->load->templateView('Usuarios/Usuarios_View.php');
        }        
    }

    protected function validarDadosDeCadastro($pnewUserData){
        $validacaoSenha = $this->comparaSenhasCadastro($pnewUserData['password'], $pnewUserData['confirma_password']);
        if(!$validacaoSenha){
            $this->session->set_flashdata('danger', 'Senhas informadas são diferentes.');
			$this->load->templateView('Usuarios/FormularioCadastroUsuario_View.php');
        }else{
            return True;
        }
    }

    protected function comparaSenhasCadastro($pSenha1, $pSenha2){
        return ($pSenha1 == $pSenha2 ? True : False);
    }
}

