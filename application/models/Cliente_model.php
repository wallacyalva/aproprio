<?php

class Cliente_model extends CI_Model {

    function getClienteCapa($idCliente) {
        $this->db->select("capa");
        $this->db->where('id', $idCliente);
        $picture = $this->db->get("clientes")->row(0);
        return $picture;
    }

    function getCategorias() {
        $this->db->select("*");
        $this->db->where('pai', 0);
        return $this->db->get("categorias")->result();
    }

    function getClientCompleteData($userId, $fields = false) {
        if ($fields) {
            if (is_array($fields)) {
                $fieldsStr = implode(",", $fields);
            } else {
                $fieldsStr = $fields;
            }
            $this->db->select($fieldsStr);
            $this->db->join("clientes_enderecos", "clientes.id = clientes_enderecos.clientes_id", "left");
            return $this->db->where("clientes.id", $userId)->get("clientes")->row(0);
        } else {
            $this->db->select("*,clientes_enderecos.id as id_clientes_enderecos");            
            $this->db->join("clientes_enderecos", "clientes.id = clientes_enderecos.clientes_id", "left");
            return $this->db->where("clientes.id", $userId)->get("clientes")->row(0);
        }
    }

    function getAllClients() {
        $this->db->select("*");
        return $this->db->get("clientes")->result();
    }
    
    function updateCLiente($idCliente, $cliente) {
        
        //START TRANSACTION
        $this->db->trans_start();
        //UPDATE clientes
        if (isset($cliente['dataCirurgia'])) {
            $this->db->set('dataCirurgia', $cliente['dataCirurgia']);
        }
        
        if (isset($cliente['name_paciente'])) {
            $this->db->set('name_paciente', $cliente['name_paciente']);
        }
        if (isset($cliente['name_mae'])) {
            $this->db->set('name_mae', $cliente['name_mae']);
        }
        if (isset($cliente['cpf'])) {
            $this->db->set('cpf', $cliente['cpf']);
        }
        if (isset($cliente['doc_identidade'])) {
            $this->db->set('doc_identidade', $cliente['doc_identidade']);
        }
        if (isset($cliente['orgao_expedidor'])) {
            $this->db->set('orgao_expedidor', $cliente['orgao_expedidor']);
        }
        if (isset($cliente['cartao_sus'])) {
            $this->db->set('cartao_sus', $cliente['cartao_sus']);
        }
        if (isset($cliente['estado_civil'])) {
            $this->db->set('estado_civil', $cliente['estado_civil']);
        }
        if (isset($cliente['Data_nascimento'])) {
            $this->db->set('Data_nascimento', $cliente['Data_nascimento']);
        }
        if (isset($cliente['Sexo'])) {
            $this->db->set('Sexo', $cliente['Sexo']);
        }
        
        if (isset($cliente['Telefone_fixo'])) {
            $this->db->set('Telefone_fixo', $cliente['Telefone_fixo']);
        }
        if (isset($cliente['Email'])) {
            $this->db->set('Email', $cliente['Email']);
        }
        if (isset($cliente['Celular'])) {
            $this->db->set('Celular', $cliente['Celular']);
        }
        if (isset($cliente['name_responsavel'])) {
            $this->db->set('name_responsavel', $cliente['name_responsavel']);
        }
        if (isset($cliente['grau_parentesco'])) {
            $this->db->set('grau_parentesco', $cliente['grau_parentesco']);
        }
        if (isset($cliente['Telefone_responsavel'])) {
            $this->db->set('Telefone_responsavel', $cliente['Telefone_responsavel']);
        }
        if (isset($cliente['CA_paciente'])) {
            $this->db->set('CA_paciente', $cliente['CA_paciente']);
        }
        if (isset($cliente['name_medicos'])) {
            $this->db->set('name_medicos', $cliente['name_medicos']);
        }
        if (isset($cliente['Convenio'])) {
            $this->db->set('Convenio', $cliente['Convenio']);
        }
        if (isset($cliente['Observacao'])) {
            $this->db->set('Observacao', $cliente['Observacao']);
        }

        
        
        $this->db->where("id", $idCliente);
        $this->db->update('clientes'); //TABELA DE clientes
        
        if (isset($cliente['Endereco'])) {
            $this->db->set('address', $cliente['Endereco']);
        }
        if (isset($cliente['Bairro'])) {
            $this->db->set('district', $cliente['Bairro']);
        }
        if (isset($cliente['Cidade'])) {
            $this->db->set('city', $cliente['Cidade']);
        }
        if (isset($cliente['Estado'])) {
            $this->db->set('state', $cliente['Estado']);
        }
        
        $this->db->update("clientes_enderecos");
        //insere categorias adicionadas
        
        //remove categorias retiradas
        
        
        //UPDATE clientes_ENDERECOS
       
        //COMPLETE TRANSACTION
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    function updateClienteCapa($idCliente,$imagem) {
        $this->db->trans_start();

        $this->db->set('capa', $imagem);

        $this->db->where('id', $idCliente);
        $this->db->update('clientes');
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    function insertCliente($cliente) {
        //inicia transacao
        $this->db->trans_start();
        
        $this->db->set("dataCirurgia", $cliente["dataCirurgia"]);
        $this->db->set("dataCadastro", date("Y-m-d H:i:s"));
        $this->db->set("name_paciente", $cliente["name_paciente"]);
        if($cliente["foto"]){
            $this->db->set("foto", $cliente["foto"]);
        }
        $this->db->set("Email", $cliente["Email"]);
        $this->db->set("senha", md5("123123"));
        //$this->db->set("id_categoria", $cliente["categoria"]);
        $this->db->set("Celular", $cliente["Celular"]);
        $this->db->set("name_mae", $cliente["name_mae"]);
        $this->db->set("cpf", $cliente["cpf"]);
        $this->db->set("doc_identidade", $cliente["doc_identidade"]);
        $this->db->set("orgao_expedidor", $cliente["orgao_expedidor"]);
        $this->db->set("cartao_sus", $cliente["cartao_sus"]);
        $this->db->set("estado_civil", $cliente["estado_civil"]);
        $this->db->set("Data_nascimento", $cliente["Data_nascimento"]);
        $this->db->set("Sexo", $cliente["Sexo"]);
        $this->db->set("Telefone_fixo", $cliente["Telefone_fixo"]);
        $this->db->set("name_responsavel", $cliente["name_responsavel"]);
        $this->db->set("grau_parentesco", $cliente["grau_parentesco"]);
        $this->db->set("Telefone_responsavel", $cliente["Telefone_responsavel"]);
        $this->db->set("name_medicos", $cliente["name_medicos"]);
        $this->db->set("CA_paciente", $cliente["CA_paciente"]);
        $this->db->set("Convenio", $cliente["Convenio"]);
        $this->db->set("Observacao", $cliente["Observacao"]);
        
        
        
        $this->db->insert("clientes");
        $clienteId = $this->db->insert_id();
        
        //insere categorias
        // foreach ($cliente["categoria"] as $categoria) {
            //     $this->db->set("categoria", $categoria);
            //     $this->db->set("idcliente", $clienteId);
            //     $this->db->insert("clientes_categorias");
            // }
            
            //INSERE ENDERECO
            $this->db->set("zip_code", "88303000");
            $this->db->set("address", $cliente["Endereco"]);
            $this->db->set("district", $cliente["Bairro"]);
            $this->db->set("city", $cliente["Cidade"]);
            $this->db->set("state", $cliente["Estado"]);
        $this->db->set("clientes_id", $clienteId);
        $this->db->insert("clientes_enderecos");

        //complete transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            //algum erro ocorreu! 
            return false;
        }
        //retorna ID do anuncio
        return $clienteId;
    }

    function getClienteCompleteData($userId, $idCliente, $fields = false) {
        if ($fields) {
            if (is_array($fields)) {
                $fieldsStr = implode(",", $fields);
            } else {
                $fieldsStr = $fields;
            }
            $this->db->select($fieldsStr);
            $this->db->join("clientes_enderecos", "clientes.id = clientes_enderecos.clientes_id", "left");
            return $this->db->where("clientes.id", $userId)->get("clientes")->row(0);
        }else {
            $this->db->select("*,clientes.id as id_clientes");            
            $this->db->join("clientes_enderecos", "clientes.id = clientes_enderecos.clientes_id", "left");
            return $this->db->where("clientes.id", $idCliente)->get("clientes")->row(0);
        }
    }
    function getAllClienteCompleteDataByCidade($cidade) {
            // $this->db->select("*,clientes.id as id_clientes,planos.id as id_planos,clientes_enderecos.id  as clientes_enderecos_id");            
            $this->db->select("*,clientes.id as id_clientes,clientes_enderecos.id  as clientes_enderecos_id");            
            $this->db->join("clientes_enderecos", "clientes.id = clientes_enderecos.clientes_id", "left");
            // $this->db->join("planos", "planos.id = clientes.plano_id", "left");
            return $this->db->where("clientes_enderecos.city", $cidade['cidades'])->get("clientes")->result();
    }

    function getOneClienteCompleteData($userId, $idCliente = false, $fields = false) {
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
            return $this->db->where("clientes.usuarios_id", $userId)->get("clientes")->row(0);
        }
    }
/** 
* Função para apagar registro
* Quando deletado o cliente, o banco irá deletar
* os registros nas tabelas (clientes, clientes_enderecos, clientes_picture)
* DELETE ON CASCADE UPDATE ON CASCADE
* @author J.S.Júnior
* @version 0.1 
* @access public  
* @package Cliente 
* @example $this->nomeModel->deleteCliente($idRegistroCliente);
*/ 
    function deleteCliente($idCliente) {
        $this->db->where("id", $idCliente);
        $this->db->delete("clientes");
    }
/** 
* Função para buscar as imagens do cliente
* @author J.S.Júnior
* @version 0.1 
* @access public  
* @package Cliente 
* @example $this->nomeModel->getClienteImage($idCliente);
*/ 
    function getClienteImage($idCliente) {
        $this->db->select("picture,id,active");
        $this->db->where('clientes_id', $idCliente);
        $picture = $this->db->get("clientes_picture")->result();
        return $picture;
    }

    
            function updateClientePassword($idCliente, $newPassword = false) {
                if ($newPassword === false) {
                    $newPassword = generateNewPassword();
                }
                $this->db->set("senha", md5($newPassword));
                $this->db->where("id", $idCliente);
                $this->db->update("clientes");
                return $newPassword;
            }
            function updateClienteRepresentante($idCliente, $newRepresentante) {
                $this->db->set("usuarios_id", $newRepresentante);
                $this->db->where("id", $idCliente);
                $this->db->update("clientes");
                return $newRepresentante;
            }
            function getClienteDetalhesCategorias($idCliente) {            
                return $this->getClienteCategoriasArray($idCliente);
            }

            function getClienteCategoriasArray($idcliente) {
                $this->db->select("categoria");
                $this->db->where("idcliente", $idcliente);
                $categorias = $this->db->get("clientes_categorias")->result();
                $categoriasCliente = array();
                foreach ($categorias as $categoria) {
                    $categoriasCliente[] = $categoria->categoria;
                }
                return $categoriasCliente;
            }
            function getClienteCategorias($idcliente) {
                $this->db->select("categoria");
                $this->db->where("idcliente", $idcliente);
                return $this->db->get("clientes_categorias")->result();
            }
            function getClienteAtivo($idCliente) {
                $this->db->select("ativo");
                $this->db->where('id', $idCliente);
                return $this->db->get("clientes")->row(0);
            }
            function updateBlockCliente($idCliente) {        
                        //START TRANSACTION
                        $this->db->trans_start();
                        $cliente=$this->getClienteAtivo($idCliente);
                        if($cliente->ativo==1){
                            $this->db->set('ativo', 0);
                        }else{
                            $this->db->set('ativo', 1);
                        }
        
                        $this->db->where("id", $idCliente);
                        $this->db->update('clientes'); //TABELA DE clientes
                
                        //COMPLETE TRANSACTION
                        $this->db->trans_complete();
                        return $this->db->trans_status();
            }
}
