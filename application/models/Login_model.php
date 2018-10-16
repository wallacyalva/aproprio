<?php

class Login_model extends CI_Model {

    // function __construct()
    // {
    //      // Call the Model constructor
    //      parent::__construct();
    // }

    // //get the username & password from tbl_usrs
    // function get_user($usr, $pwd)
    // {
    //      $sql = "select * from wc_usuarios where email = '" . $usr . "' and senha = '" . md5($pwd) . "'";
    //      $query = $this->db->query($sql);
    //      return $query->num_rows();
    // }
    
    function get_user($usernameEmail, $password) {
        $error = false;
        $usuarioLogin = $this->usuarioModel->getDadosByEmail($usernameEmail, array("id", "email", "senha", "rule"));
        if ($usuarioLogin) {
            //se encontrou usuario, confere a senha
            if ($usuarioLogin->senha == md5($password)) {
                //se estiver correto, joga na sessao e redireciona para o perfil
                $data = array(
                    'bs_user_id' => $usuarioLogin->id,
                    'email' => $usuarioLogin->email,
                    'rule' => $usuarioLogin->rule,
                    'is_logged_in' => true
                );
                $this->session->set_userdata($data);
                return TRUE;
            } else {
                //senha incorreta
                $error = "O username/email ou senha está incorreto.";
            }
        } else {
            //usuario invalido
            $error = "O username/email ou senha está incorreto.";
        }
        return $error;
    }

    function registerLogin($usuarioLogin) {
        $data = array(
            'bs_user_id' => $usuarioLogin["user_id"],
            'email' => $usuarioLogin["email"],
            'is_logged_in' => true
        );
        $this->session->set_userdata($data);
    }

    public function logout() {
        if (is_user_logged_in()) {
            //faz logout
            $this->session->sess_destroy();
        }
    }
}
