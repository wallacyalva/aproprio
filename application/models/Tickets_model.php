<?php

class Tickets_model extends CI_Model {

    function abrirTicket($id_usuario, $input_data) {
        $this->db->set("titulo", $input_data["titulo"]);
        $this->db->set("categoria", $input_data["categoria"]);
        $this->db->set("descricao", $input_data["descricao"]);
        $this->db->set("status", 1);
        $this->db->set("id_usuario", $id_usuario);
        $this->db->set("pai", 0);
        return $this->db->insert("tickets"); 
    }

    function atualizarTicket($id_usuario, $input_data, $pai) {
        $this->db->set("titulo", $input_data["titulo"]);
        $this->db->set("categoria", $input_data["categoria"]);
        $this->db->set("descricao", $input_data["descricao"]);
        $this->db->set("status", 1);
        $this->db->set("id_usuario", $id_usuario);
        $this->db->set("pai", $pai);
        return $this->db->insert("tickets"); 
    }

    function responderTicket($id_ticket, $resposta) {
        $this->db->set("resposta", $resposta);
        $this->db->set("status", 0);
        return $this->db->update("tickets");
    }

    function getTicketByTicketId($id_ticket) {
        $this->db->select("*");
        $this->db->where("id", $id_ticket);
        return $this->db->get("tickets")->row(0);
    } 

    function getAllTicketsByUserId($id_usuario) {
        $this->db->select("*");
        $this->db->where("id_usuario", $id_usuario);
        return $this->db->get("tickets")->result();
    }

    function enviarResposta($dados) {
        $this->db->set("resposta", $dados["resposta"]);
        $this->db->set("status", 1);
        $this->db->where("id", $dados["id"]);
        return $this->db->update("tickets");
    }

    function getAllTickets() {
        $this->db->select("*");
        return $this->db->get("tickets")->result();
    }
}