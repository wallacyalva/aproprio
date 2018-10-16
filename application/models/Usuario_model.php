<?php

class Usuario_model extends CI_Model {

    public function __construct() {
	    parent:: __construct();
    }

    function registerUser($data) {
        //inicia transacao
        $this->db->trans_start();

        //INSERE O USUARIO
        $this->db->set("name", $data["name"]);
        $this->db->set("email", $data["email"]);
        $this->db->set("senha", md5($data["password"]));
        $this->db->set("imagem", "no-image.jpg");
        $this->db->set("rule", 1);
        $this->db->set("adm", 0);
        $this->db->set("ativo", 1); //Quando setado pra 1 o user já sai ativado
        $this->db->insert("usuarios");
        $isLastInsert = $this->db->insert_id();

        //INSERE O ENDERECO
        $this->db->set("zip_code", $data["postalcode"]);
        $this->db->set("address", $data["street"]);
        $this->db->set("district    ", $data["district"]);
        $this->db->set("city", $data["city"]);
        $this->db->set("state", $data["state"]);
        $this->db->set("usuarios_id", $isLastInsert);
        $this->db->insert("usuarios_enderecos");

        //complete transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            //algum erro ocorreu! 
            return false;
        }
    }

    function ativarUsuarioById($id_usuario) {
        $this->db->set("ativo", 1);
        $this->db->where("id", $id_usuario);
        return $this->db->update("usuarios");
    }

    function deletarUsuarioById($id_usuario) {
        $this->db->select("*");
        $this->db->where("id", $id_usuario);
        return $this->db->delete("usuarios");
    }

    function getAllUsersByRule($rule) {
        $this->db->select("*");
        $this->db->where("rule", $rule);
        return $this->db->get("usuarios")->result();
    }

    function getAllNotAdmUsers() {
        $this->db->select("*");
        $this->db->where("usuarios.adm != 1");
        return $this->db->get("usuarios")->result();
    }

    function getAllUnactiveUsers() {
        $this->db->select("*");
        $this->db->where("ativo", 0);
        return $this->db->get("usuarios")->result();
    }

    function deleteCliente($idCliente) {
        $this->db->where("id", $idCliente);
        $this->db->delete("clientes");
    }

    function getClienteImage($idCliente) {
        $this->db->select("picture,id,active");
        $this->db->where('clientes_id', $idCliente);
        $picture = $this->db->get("clientes_picture")->result();
        return $picture;
    }

    function getClienteCompleteData($userId, $idCliente = false, $fields = false) {
        if ($fields) {
            if (is_array($fields)) {
                $fieldsStr = implode(",", $fields);
            } else {
                $fieldsStr = $fields;
            }
            $this->db->select($fieldsStr);
            $this->db->join("clientes_enderecos", "clientes.id = clientes_enderecos.clientes_id", "left");
            return $this->db->where("clientes.usuarios_id", $userId)->get("clientes")->row(0);
        } else if($idCliente) {
            $this->db->select("*,clientes.descricao as descricao,clientes.id as id_clientes,planos.id as id_planos,clientes_enderecos.id  as clientes_enderecos_id");            
            $this->db->join("clientes_enderecos", "clientes.id = clientes_enderecos.clientes_id", "left");
            $this->db->join("planos", "planos.id = clientes.plano_id", "left");
            $this->db->where("clientes.id", $idCliente);
            $this->db->where("clientes.usuarios_id", $userId);
            return $this->db->get("clientes")->row(0);
        } else {
            $this->db->select("*,clientes.id as id_clientes,planos.id as id_planos,clientes_enderecos.id  as clientes_enderecos_id");            
            $this->db->join("clientes_enderecos", "clientes.id = clientes_enderecos.clientes_id", "left");
            $this->db->join("planos", "planos.id = clientes.plano_id", "left");
            return $this->db->where("clientes.usuarios_id", $userId)->get("clientes")->result();
        }
    }
    
	function getDadosByEmail($usuarioEmail, $fields) {
        if ($fields) {
            if (is_array($fields)) {
                $fieldsStr = implode(",", $fields);
            } else {
                $fieldsStr = $fields;
            }
            return $this->db->select($fieldsStr)->where("email", $usuarioEmail)->get("usuarios")->row(0);
        } else {
            $this->db->where("id", $usuarioEmail)->get("usuarios")->row(0);
        }
    }
    
    function getUserImage($usuarioId) {
        $this->db->select("imagem");
        $this->db->where('id', $usuarioId);
        $picture = $this->db->get("usuarios")->row(0);
        return $picture;
    }

    function updateUserImage($usuarioId,$imagem) {
        $this->db->trans_start();

        $this->db->set('imagem', $imagem);

        $this->db->where('id', $usuarioId);
        $this->db->update('usuarios');
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
	   
    public function checkUsuario($email, $password) {
		$password = md5($password);
		$this->db->select('email', 'senha');
		$this->db->from('usuarios');
		$this->db->where('email', $email);
		$this->db->where('senha', $password);
		$query = $this->db->get();
		return $query->num_rows() == 1 ? true:false;
    }
	
	function getUserCompleteData($userId, $fields = false) {
        if ($fields) {
            if (is_array($fields)) {
                $fieldsStr = implode(",", $fields);
            } else {
                $fieldsStr = $fields;
            }
            $this->db->select($fieldsStr);
            $this->db->join("usuarios_enderecos", "usuarios.id = usuarios_enderecos.usuarios_id", "left");
            return $this->db->where("usuarios.id", $userId)->get("usuarios")->row(0);
        } else {
            $this->db->select("*,usuarios_enderecos.id as id_usuarios_enderecos");            
            $this->db->join("usuarios_enderecos", "usuarios.id = usuarios_enderecos.usuarios_id", "left");
            return $this->db->where("usuarios.id", $userId)->get("usuarios")->row(0);
        }
    }

    function getRandonUserCompleteData($fields = false) {
        if ($fields) {
            if (is_array($fields)) {
                $fieldsStr = implode(",", $fields);
            } else {
                $fieldsStr = $fields;
            }
            $this->db->select($fieldsStr);
            $this->db->join("usuarios_enderecos", "usuarios.id = usuarios_enderecos.usuarios_id", "left");
            return $this->db->where("usuarios.id", $userId)->get("usuarios")->row(0);
        } else {
            $this->db->select("*,usuarios_enderecos.id as id_usuarios_enderecos");            
            $this->db->join("usuarios_enderecos", "usuarios.id = usuarios_enderecos.usuarios_id", "left");
            $this->db->order_by("RAND(), usuarios.id ASC");
            return $this->db->get("usuarios")->row(0);
        }
    }
	
    function getAllClients($userId = false) {
        $this->db->distinct();
        if($userId) {
            $this->db->where("id", $userId);
            $total = $this->db->count_all_results("clientes");
            return $total;
        } else {
            $total = $this->db->count_all_results("clientes");
            return $total;
        }
    }
    
    function getAllPayedClients($userId = false) {
        $this->db->distinct();
        if($userId) {
            $this->db->where("id", $userId);
            $this->db->where("id !=", 0);
            $total = $this->db->count_all_results("clientes");
            return $total;
        } else {
            $this->db->where("plano_id !=", 0);            
            $total = $this->db->count_all_results("clientes");
            return $total;
        }
    }
    
    function getAllNegativeClients($userId = false) {
        $this->db->distinct();
        if($userId) {
            $this->db->where("usuarios_pai", $userId);
            $this->db->where("status_mensalidade", 2);
            $total = $this->db->count_all_results("financeiro_clientes");
            return $total;
        } else {
            $this->db->where("status_mensalidade", 2);            
            $total = $this->db->count_all_results("financeiro_clientes");
            return $total;
        }
    }
    
	function getAllUser() {
        $this->db->select("*");
        return $this->db->get("usuarios")->result();
	}
	function getAllUserPropostas() {
        $this->db->select("*");
        $this->db->where('rule', 5);
        return $this->db->get("usuarios")->result();
	}
    
    function getUserRule($userId) {
        $this->db->select("rule");
        return $this->db->get("usuarios")->row(0);
	}
    
    function deleteUsuario($idUsuario) {
        $this->db->where("id", $idUsuario);
        $this->db->delete("usuarios");
    }

    function updateUser($userId, $usuario) {
        
                //START TRANSACTION
                $this->db->trans_start();
                //UPDATE clientes
                if (isset($usuario['name'])) {
                    $this->db->set('name', $usuario['name']);
                }
        
                $this->db->set('phone', $usuario['phone']);
        
                if (isset($usuario['username_email'])) {
                    $this->db->set('email', $usuario['username_email']);
                }

                $this->db->where("id", $userId);
                $this->db->update('usuarios'); //TABELA DE clientes
        
                //UPDATE clientes_ENDERECOS
                $this->db->set('zip_code', $usuario["zip_code"]);
                $this->db->set('address', $usuario["address"]);
                $this->db->set('district', $usuario["district"]);
                $this->db->set('city', $usuario["city"]);
                $this->db->set('state', $usuario["state"]);
                $this->db->where('usuarios_id', $userId);
                $this->db->update('usuarios_enderecos'); //TABELA DE ENDERECO DE clientes
        
                //COMPLETE TRANSACTION
                $this->db->trans_complete();
                return $this->db->trans_status();
    }

    function updateUserAdmin($idUser,$idUserUpdate, $usuario) {
        
        //START TRANSACTION
        $this->db->trans_start();
        //UPDATE clientes
        if (isset($usuario['name'])) {
            $this->db->set('name', $usuario['name']);
        }
        if (isset($usuario['password'])) {
            $this->db->set('senha', md5($usuario['password']));
        }

        $this->db->set('phone', $usuario['phone']);

        if (isset($usuario['username_email'])) {
            $this->db->set('email', $usuario['username_email']);
        }

        $this->db->where("id", $idUserUpdate);
        $this->db->update('usuarios'); //TABELA DE clientes

        //UPDATE clientes_ENDERECOS
        $this->db->set('zip_code', $usuario["zip_code"]);
        $this->db->set('address', $usuario["address"]);
        $this->db->set('district', $usuario["district"]);
        $this->db->set('city', $usuario["city"]);
        $this->db->set('state', $usuario["state"]);
        $this->db->where('usuarios_id', $idUserUpdate);
        $this->db->update('usuarios_enderecos'); //TABELA DE ENDERECO DE clientes

        //COMPLETE TRANSACTION
        $this->db->trans_complete();
        return $this->db->trans_status();
}

    function insertUsuario($dados) {
        //inicia transacao
        $this->db->trans_start();

        $this->db->set("email", $dados["username_email"]);
        $this->db->set("senha", md5($dados["password"]));
        $this->db->set("rule", 3);
        $this->db->set("name", $dados["name"]);
        $this->db->set("phone", $dados["phone"]);
        $this->db->set("imagem", "no-image.jpg");

        $this->db->insert("usuarios");
        $idUsuario = $this->db->insert_id();


        //INSERE ENDERECO
        $this->db->set("zip_code", $dados["zip_code"]);
        $this->db->set("address", $dados["address"]);
        $this->db->set("district", $dados["district"]);
        $this->db->set("city", $dados["city"]);
        $this->db->set("state", $dados["state"]);
        $this->db->set("usuarios_id", $idUsuario);
        $this->db->insert("usuarios_enderecos");

        //complete transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            //algum erro ocorreu! 
            return false;
        }
        //retorna ID do anuncio
        return $idUsuario;
    }

        function updateUserPassword($userId, $newPassword = false) {
                if ($newPassword === false) {
                    $newPassword = generateNewPassword();
                }
                $this->db->set("senha", md5($newPassword));
                $this->db->where("id", $userId);
                $this->db->update("usuarios");
                return $newPassword;
            }

    public function isLoggedIn()
	{
		if(!$this->session->has_userdata('logged_in')){
			redirect('login/logout');
		}
    }
    function getOneUserRule($idUser) {
        $this->db->select("rule");
        $this->db->where('id', $idUser);
        return $this->db->get("usuarios")->row(0);
	}
    function updateUsuarioToAdmin($userId) {        
        //START TRANSACTION
        $this->db->trans_start();
        $rule=$this->getOneUserRule($userId);
        if($rule->rule==1){
            $this->db->set('rule', 3);
        }else{
            $this->db->set('rule', 1);
        }

        $this->db->where("id", $userId);
        $this->db->update('usuarios'); //TABELA DE clientes

        //COMPLETE TRANSACTION
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function updateUsuarioToEmp($userId) {        
        //START TRANSACTION
        $this->db->trans_start();
        $rule=$this->getOneUserRule($userId);
        if($rule->rule==5){
            $this->db->set('rule', 3);
        }else{
            $this->db->set('rule', 5);
        }

        $this->db->where("id", $userId);
        $this->db->update('usuarios'); //TABELA DE clientes

        //COMPLETE TRANSACTION
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

}
