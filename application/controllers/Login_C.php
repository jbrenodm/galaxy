<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_C extends CI_Controller {

	public function index(){
		$loggedUser = $this->session->userdata("logged_user");
		
		if($loggedUser){
			$this->mostraMenuInicial($loggedUser);
		}else{
			// print_r("Entrou aqui");
			// die;
			$this->load->templateView("Padrao/FormularioLogin_View.php");	
		}
	}

	public function logar(){
		$loggedUser = $this->session->userdata("logged_user");
		
		if($loggedUser){
			$this->mostraMenuInicial($loggedUser);
		}else{
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			
			$this->load->model('User_Model');
			$loggedUser = $this->User_Model->findByEmailAndPassword($email, $password);
			if($loggedUser){
				$this->session->set_userdata(['logged_user' => $loggedUser]);
				$this->session->set_flashdata('success', 'Logado com sucesso');
				$this->load->templateView('Padrao/Menu_View.php', $loggedUser);
				// redirect("Padrao/Menu_View");
			}else{
				$this->session->set_flashdata('danger', 'Usuário ou Senha inválida.');
				redirect("/");
			}
		}		
	}

	public function mostraMenuInicial($pUsuario){
		$this->load->templateView('Padrao/Menu_View.php', $pUsuario);
	}

	public function logout(){
		$this->session->unset_userdata("logged_user");
		$this->session->set_flashdata('warning', 'Logout efetuado com sucesso');

		redirect("/");
	}

}