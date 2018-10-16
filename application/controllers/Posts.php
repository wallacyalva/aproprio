<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('posts_model', 'postsModel');
        $this->load->model('usuario_model','usuarioModel');
    }

    public function index(){
        $this->usuarioModel->isLoggedIn();
        $idUsuario = $this->session->userdata("bs_user_id");
        $data = array();

        $data['posts'] = $this->postsModel->getAllPostsAtivos();
        $data['user'] = $this->usuarioModel->getUserCompleteData($idUsuario);

        $this->load->view('template/header_view');
        $this->load->view('posts/lista_posts_view', $data);
        $this->load->view('template/footer_view');
    }

    public function meusPosts($id = false) {
        $this->usuarioModel->isLoggedIn();
        $data = array();

        if($id) {
            $data['posts'] = $this->postsModel->getPostsByUserId($id);
        } else {
            $data['posts'] = $this->postsModel->getPostsByUserId($this->session->userdata("bs_user_id"));
        }
        
        $data['user'] = $this->usuarioModel->getUserCompleteData($this->session->userdata("bs_user_id"));
        $this->load->view('template/header_view');
        $this->load->view('posts/meus_posts_view', $data);
        $this->load->view('template/footer_view');
    }

    public function deletarPostsTimeOut() {
        return $this->postsModel->deletarPostsTimeOut();
    }

    public function negar($id_post) {
        $this->postsModel->negarPost($id_post);
        redirect(ci_site_url()."posts");
    }

    public function aprovar($id_post) {
        $this->postsModel->aprovarPost($id_post);
        redirect(ci_site_url()."posts");
    }

    public function aprovarPost(){
        $this->usuarioModel->isLoggedIn();
        $idUsuario = $this->session->userdata("bs_user_id");
        $data = array();

        $data['posts'] = $this->postsModel->getAllPostsEsperandoAtivacao();
        $data['user'] = $this->usuarioModel->getUserCompleteData($idUsuario);

        $this->load->view('template/header_view');
        $this->load->view('posts/aprovar_posts_view', $data);
        $this->load->view('template/footer_view');
    }

    public function solicitarPost() {
        $this->usuarioModel->isLoggedIn();
        $idUsuario = $this->session->userdata("bs_user_id");
        $data = array();

        $input = array();
        $input = $this->input->post();

        if ($input && $_FILES) {

            $this->form_validation->set_rules('titulo', 'Titulo do Post', 'required|max_length[2500]');
            $this->form_validation->set_rules('categoria', 'Categoria do Post', 'required|max_length[200]');

            $errors = false;
            
            if ($this->form_validation->run() !== FALSE && !$errors) {

                if (!empty($_FILES)) {

                    $config['upload_path']      = 'uploads/images/posts';
                    $config['allowed_types']    = 'jpg|jpeg|JPG|JEPG|png|PNG';
                    $config['file_name']        = $idUsuario . "_" . time();
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload("file_foto")) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        print_r($config['upload_path']);
                        return;
                    }
                    $newNameImage = $config['file_name']."".$this->upload->file_ext;
                }

                $input["foto"] = $newNameImage;

                
                $postId = $this->postsModel->insertPost($input);

                if($postId) {
                    $this->session->set_flashdata("msg", array("tipo" => "1", "texto" => "<strong>Muito Bem!!!</strong> Promoção inserida com sucesso." ));        
                    redirect("posts");
                } else {
                    $this->session->set_flashdata("msg", array("tipo" => "2", "texto" => "<strong>Ops!!!</strong> Erro ao tentar Criar Promoção!" ));        
                    redirect("posts");
                }
            }
        }
        $data['user'] = $this->usuarioModel->getUserCompleteData($idUsuario);

        $this->load->view('template/header_view');
        $this->load->view('posts/novo_post_view', $data);
        $this->load->view('template/footer_view');
    }

}