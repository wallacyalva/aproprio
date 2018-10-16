<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model', "usuarioModel");
        $this->load->model('site_model', "siteModel");
    }

    public function index(){
        $data = array();
        $textos = $this->siteModel->getAllTexts("inicial");
        $links = $this->siteModel->getAllLinks("inicial");

        foreach ($textos as $text) {
            $data[$text->nome] = $text->texto;
        }
        foreach ($links as $link) {
            $data[$link->nome] = $link->link;
        }

        $data["doacoes"] = $this->siteModel->getDoacoes();
        $data["eventos"] = $this->siteModel->getEventos();
        $data["campanhas"] = $this->siteModel->getCampanhas();
        $data["users"] = $this->siteModel->getUsers();
        $this->load->view('site/header_view',$data);
        $this->load->view('site/home_view');
        $this->load->view('site/footer_view');
    }

    public function alterarTexto($text_id = null)
    {
        $this->usuarioModel->isLoggedIn();

        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);
        $data['user'] = $user;

        $input = array();
        $input = $this->input->post();

        if($input) {
            $id = $input["id_texto"];
            $new_text = $input["novo_texto"];
            $result = $this->siteModel->updateText($id, $new_text);

            if($result) {
                $this->session->set_flashdata("msg", array("tipo" => "1", "texto" => "<strong>Muito Bem!!!</strong> Texto alterado com sucesso."));
            }
        }

        if($text_id) {
            $data['text_id'] = $text_id; 
            $data['text'] = $this->siteModel->getText($text_id);

            $this->load->view('template/header_view');
            $this->load->view('site/alterar_texto_view', $data);
            $this->load->view('template/footer_view');
        } else {
            $textos = $this->siteModel->getAllTexts();
            $data['textos'] = $textos;

            $this->load->view('template/header_view');
            $this->load->view('site/textos_view', $data);
            $this->load->view('template/footer_view');
        }
    }
    
    public function alterarLink($link_id = null)
    {
        $this->usuarioModel->isLoggedIn();

        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);
        $data['user'] = $user;

        $input = array();
        $input = $this->input->post();

        if($input) {
            $id = $input["id_link"];
            $new_link = $input["novo_link"];
            $result = $this->siteModel->updateLink($id, $new_link);

            if($result) {
                $this->session->set_flashdata("msg", array("tipo" => "1", "texto" => "<strong>Muito Bem!!!</strong> Link alterado com sucesso."));
            }
        }

        if($link_id) {
            $data['link_id'] = $link_id; 
            $data['link'] = $this->siteModel->getLink($link_id);

            $this->load->view('template/header_view');
            $this->load->view('site/alterar_link_view', $data);
            $this->load->view('template/footer_view');
        } else {
            $links = $this->siteModel->getAllLinks();
            $data['links'] = $links;

            $this->load->view('template/header_view');
            $this->load->view('site/links_view', $data);
            $this->load->view('template/footer_view');
        }
    }

    public function doacaoDeCabelo()
    {
        $this->usuarioModel->isLoggedIn();

        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);

        $input = array();
        $input = $this->input->post();
        
        if ($input || $_FILES) {
            $input["usuario"] = $userId;
            $this->form_validation->set_rules('titulo', 'Titulo do Post', 'required|max_length[2500]');
            $this->form_validation->set_rules('texto', 'texto do Post', 'required|max_length[200]');

            $errors = false;
            
            if ($this->form_validation->run() !== FALSE && !$errors) {

                if (!empty($_FILES)) {
                    $config['upload_path']      = 'uploads/images/doacoes';
                    $config['allowed_types']    = 'jpg|jpeg|JPG|JEPG|png|PNG';
                    $config['file_name']        = $userId . "_" . time();
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload("file_image")) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        print_r($config['upload_path']);
                        return;
                    }
                    $newNameImage = $config['file_name']."".$this->upload->file_ext;
                    $input["foto"] = "https://amorproprio.com.br/uploads/images/doacoes/".$newNameImage;
                }
                
                $postId = $this->siteModel->insertDoacao($input);

                    redirect("/site/vizualizar/doacoes_cabelo/");
                
            }
            
        }else{

            $data['user'] = $user;

            $this->load->view('template/header_view');
            $this->load->view('site/nova_doacao_view', $data);
            $this->load->view('template/footer_view');
        }
    }
    
    public function NovaCampanha()
    {
        $this->usuarioModel->isLoggedIn();

        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);

        $input = array();
        $input = $this->input->post();
        
        if ($input || $_FILES) {
            $input["usuario"] = $userId;
            $this->form_validation->set_rules('titulo', 'Titulo do Post', 'required|max_length[2500]');
            $this->form_validation->set_rules('texto', 'texto do Post', 'required|max_length[200]');

            $errors = false;
            
            if ($this->form_validation->run() !== FALSE && !$errors) {

                if (!empty($_FILES)) {
                    $config['upload_path']      = 'uploads/images/campanhas';
                    $config['allowed_types']    = 'jpg|jpeg|JPG|JEPG|png|PNG';
                    $config['file_name']        = $userId . "_" . time();
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload("file_image")) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        print_r($config['upload_path']);
                        return;
                    }
                    $newNameImage = $config['file_name']."".$this->upload->file_ext;
                    $input["foto"] = "https://amorproprio.com.br/uploads/images/campanhas/".$newNameImage;
                }
                
                $postId = $this->siteModel->insertCampanha($input);

                
                redirect("/site/vizualizar/campanhas/");
                

                // if($postId) {
                //     $this->session->set_flashdata("msg", array("tipo" => "5", "texto" => "<strong>Muito Bem!!!</strong> Anuncio criado com sucesso." ));        
                //     redirect("/");
                // } else {
                //     $this->session->set_flashdata("msg", array("tipo" => "5", "texto" => "<strong>Ops!!!</strong> Erro ao tentar criar anúncio!" ));        
                //     redirect("/");
                // }
            }
            
        }else{

            $data['user'] = $user;

            $this->load->view('template/header_view');
            $this->load->view('site/nova_campanha_view', $data);
            $this->load->view('template/footer_view');
        }
    }
    public function NovoEvento()
    {
        $this->usuarioModel->isLoggedIn();

        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);

        $input = array();
        $input = $this->input->post();
        
        if ($input || $_FILES) {
            $input["usuario"] = $userId;
            $this->form_validation->set_rules('titulo', 'Titulo do Post', 'required|max_length[2500]');
            $this->form_validation->set_rules('texto', 'texto do Post', 'required|max_length[200]');

            $errors = false;
            
            if ($this->form_validation->run() !== FALSE && !$errors) {

                if (!empty($_FILES)) {
                    $config['upload_path']      = 'uploads/images/eventos';
                    $config['allowed_types']    = 'jpg|jpeg|JPG|JEPG|png|PNG';
                    $config['file_name']        = $userId . "_" . time();
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload("file_image")) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        print_r($config['upload_path']);
                        return;
                    }
                    $newNameImage = $config['file_name']."".$this->upload->file_ext;
                    $input["foto"] = "https://amorproprio.com.br/uploads/images/eventos/".$newNameImage;
                }
                
                $postId = $this->siteModel->insertEvento($input);

                redirect("/site/vizualizar/eventos/");                

                // if($postId) {
                //     $this->session->set_flashdata("msg", array("tipo" => "5", "texto" => "<strong>Muito Bem!!!</strong> Anuncio criado com sucesso." ));        
                //     redirect("/");
                // } else {
                //     $this->session->set_flashdata("msg", array("tipo" => "5", "texto" => "<strong>Ops!!!</strong> Erro ao tentar criar anúncio!" ));        
                //     redirect("/");
                // }
            }
            
        }else{

            $data['user'] = $user;

            $this->load->view('template/header_view');
            $this->load->view('site/novo_evento_view', $data);
            $this->load->view('template/footer_view');
        }
    }
    public function NovaNoticia()
    {
        $this->usuarioModel->isLoggedIn();

        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);

        $input = array();
        $input = $this->input->post();
        
        if ($input || $_FILES) {
            $input["usuario"] = $userId;
            $this->form_validation->set_rules('titulo', 'Titulo do Post', 'required|max_length[2500]');
            $this->form_validation->set_rules('texto', 'texto do Post', 'required|max_length[200]');

            $errors = false;
            
            if ($this->form_validation->run() !== FALSE && !$errors) {

                if (!empty($_FILES)) {
                    $config['upload_path']      = 'uploads/images/noticias';
                    $config['allowed_types']    = 'jpg|jpeg|JPG|JEPG|png|PNG';
                    $config['file_name']        = $userId . "_" . time();
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload("file_image")) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        print_r($config['upload_path']);
                        return;
                    }
                    $newNameImage = $config['file_name']."".$this->upload->file_ext;
                    $input["foto"] = "https://amorproprio.com.br/uploads/images/noticias/".$newNameImage;

                }
                
                $postId = $this->siteModel->insertNoticia($input);

                redirect("/site/vizualizar/noticias/");                
                
                // if($postId) {
                //     $this->session->set_flashdata("msg", array("tipo" => "5", "texto" => "<strong>Muito Bem!!!</strong> Anuncio criado com sucesso." ));        
                //     redirect("/");
                // } else {
                //     $this->session->set_flashdata("msg", array("tipo" => "5", "texto" => "<strong>Ops!!!</strong> Erro ao tentar criar anúncio!" ));        
                //     redirect("/");
                // }
            }
            
        }else{

            $data['user'] = $user;

            $this->load->view('template/header_view');
            $this->load->view('site/nova_noticia_view', $data);
            $this->load->view('template/footer_view');
        }
    }
    public function jose(){
        $this->load->view('site/jose');
    }
    public function uploadImageCam(){
        $image = file_get_contents('php://input');
        if(!$image)
        {
        print "ERROR: Failed to read the uploaded image data.\n";
        exit();
        }
        $name = date('YmdHis');
        $newname=  'uploads/images/'.$name.'.jpg';
        $file = file_put_contents($newname, $image);
        if(!$file)
        {
        print "ERROR: Failed to write data to $filename, check permissions.\n";
        exit();
        }

        $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']).
        '/'.$newname;
        return $url;
    }
    
    public function vizualizar($tipo){
        $data = array();
        $data["tipo"] = $tipo;
        $userId = $this->session->userdata("bs_user_id");
        $data["user"] = $this->usuarioModel->getUserCompleteData($userId);
        switch($tipo){
            case "campanhas":
                $data["posts"] = $this->siteModel->getAll("campanhas");
            break;
            case "doacoes_cabelo":
                $data["posts"] = $this->siteModel->getAll("doacoes_cabelo");
            break;
            case "eventos":
                $data["posts"] = $this->siteModel->getAll("eventos");
            break;
            case "noticias":
                $data["posts"] = $this->siteModel->getAll("noticias");
            break;
        }        

        $this->load->view('template/header_view');
        $this->load->view('site/meus_posts_view', $data);
        $this->load->view('template/footer_view');
    }
    public function Excluir($id,$tipo){
        $this->siteModel->Excluir($id,$tipo);
        $this->vizualizar($tipo);
    }
}