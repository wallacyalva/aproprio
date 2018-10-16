<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tickets_model','ticketsModel');
        $this->load->model('usuario_model','usuarioModel');
    }

    public function index() {
        $this->usuarioModel->isLoggedIn();
        $id_usuario = $this->session->userdata("bs_user_id");
        $data = array();

        $data['user'] = $this->usuarioModel->getUserCompleteData($id_usuario);

        $this->load->view('template/header_view');
        $this->load->view('tickets/abrir_ticket_view', $data);
        $this->load->view('template/footer_view');
    }

    public function abrirTicket() {
        $this->usuarioModel->isLoggedIn();
        $id_usuario = $this->session->userdata("bs_user_id");
        $data = array();

        if($input_data = $this->input->post()) {
            $this->form_validation->set_rules('titulo', "Titulo", 'required|strip_tags|max_length[100]|alpha_numeric');
            $this->form_validation->set_rules('categoria', "Categoria", 'required|strip_tags|max_length[100]|alpha_numeric');
            $this->form_validation->set_rules('descricao', "Descrição", 'required|strip_tags|max_length[500]|alpha_numeric');

            if ($this->form_validation->run() != FALSE) {
                $result = $this->ticketsModel->abrirTicket($id_usuario, $input_data);
            }
        }

        $data['user'] = $this->usuarioModel->getUserCompleteData($id_usuario);
        $this->load->view('template/header_view');
        $this->load->view('tickets/abrir_ticket_view', $data);
        $this->load->view('template/footer_view');
    }

    public function ticket($id) {
        $this->usuarioModel->isLoggedIn();
        $id_usuario = $this->session->userdata("bs_user_id");
        $data = array();
        $data['id'] = $id;

        $end = false;
        $cont = 0;

        while($end == false) {
            $result = $this->ticketsModel->getTicketByTicketId($id);
            if(isset($result)) {
                if($result->pai == 0) {
                    $data["tickets"][$cont] = $result;
                    $end = true;
                } else {
                    $data["tickets"][$cont] = $result;
                    $cont++;
                    $id = $result->pai;
                }
            } else {
                redirect(ci_site_url()."usuario");
            }
        }
        
        $data['user'] = $this->usuarioModel->getUserCompleteData($id_usuario);
        $this->load->view('template/header_view');
        $this->load->view('tickets/ticket_view', $data);
        $this->load->view('template/footer_view');
    }

    public function meusTickets() {
        $this->usuarioModel->isLoggedIn();
        $id_usuario = $this->session->userdata("bs_user_id");
        $data = array();
        $data['tickets'] = $this->ticketsModel->getAllTicketsByUserId($id_usuario);
        $data['user'] = $this->usuarioModel->getUserCompleteData($id_usuario);
        $this->load->view('template/header_view');
        $this->load->view('tickets/meus_tickets_view', $data);
        $this->load->view('template/footer_view');
    }

    public function todosTickets() {
        $this->usuarioModel->isLoggedIn();
        $id_usuario = $this->session->userdata("bs_user_id");
        $data = array();
        $data['tickets'] = $this->ticketsModel->getAllTickets();
        $data['user'] = $this->usuarioModel->getUserCompleteData($id_usuario);
        $this->load->view('template/header_view');
        $this->load->view('tickets/todos_tickets_view', $data);
        $this->load->view('template/footer_view');
    }

    public function responder($id = null) {
        $this->usuarioModel->isLoggedIn();
        $id_usuario = $this->session->userdata("bs_user_id");
        $data = array();
        $data['id'] = $id;

        if($input_post = $this->input->post()) {
            $result = $this->ticketsModel->enviarResposta($input_post);
            if($result) {
                redirect(ci_site_url()."tickets/todosTickets");
            }
        }

        $end = false;
        $cont = 0;
        while($end == false) {
            $result = $this->ticketsModel->getTicketByTicketId($id);
            if($result->pai == 0) {
                $data["tickets"][$cont] = $result;
                $end = true;
            } else {
                $data["tickets"][$cont] = $result;
                $cont++;
                $id = $result->pai;
            }
        }
        
        $data['user'] = $this->usuarioModel->getUserCompleteData($id_usuario);
        $this->load->view('template/header_view');
        $this->load->view('tickets/responder_ticket_view', $data);
        $this->load->view('template/footer_view');
    }


}