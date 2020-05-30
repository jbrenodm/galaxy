<?php

Class User_Model extends CI_Model{
    
    public function saveUser($pNewUserData){
        return $this->db->insert("user", $pNewUserData);
    }

    public function findByEmailAndPassword($pEmail, $pSenha){
        $this->db->where('email', $pEmail);
        $this->db->where('password', $pSenha);
        
        $result = $this->db->get("user")->row_array();        		

        return $result;        
    }

    public function buscarPorID($pk){
        return $this->db->get_where("user", ["pk_user" => $pk])->row_array();
    }

}

