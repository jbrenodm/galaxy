<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_C extends CI_Controller {

    public function index(){
        
    }

    public function newUser()
    {        
        // $this->output->enable_profiler(TRUE);

        $newUserData = [
            "name" => $this->input->post('name'),
            "surname" => $this->input->post('surname'),
            "email" => $this->input->post('email'),
            "password" => md5(trim($this->input->post('password'))),
        ];

        $passwordConfirm = md5(trim($this->input->post('password_confirm')));
        
        if($this->validarDadosDeCadastro($newUserData, $passwordConfirm)){
            $this->load->model('User_Model');           
            $this->User_Model->saveUser($newUserData);
            $this->session->set_flashdata('success', 'Usuário cadastrado com sucesso!');
            redirect('/');
            // $this->load->templateView('Usuarios/Usuarios_View.php');
        }        
    }

    public function formularioCadastroUsuario(){
        $this->load->templateView('Usuarios/FormularioCadastrarUsuario_View.php');
    }

    protected function validarDadosDeCadastro($pNewUserData, $pPasswordConfirm){
        $validacaoSenha = $this->comparaSenhasCadastro($pNewUserData['password'], $pPasswordConfirm);
        if(!$validacaoSenha){
            $this->session->set_flashdata('danger', 'Senhas informadas são diferentes.');
            // $this->formularioCadastroUsuario();
            $this->load->templateView('Usuarios/FormularioCadastrarUsuario_View.php');
        }else{
            return True;
        }
    }

    protected function comparaSenhasCadastro($pSenha1, $pSenha2){
        return ($pSenha1 == $pSenha2 ? True : False);
    }
}

