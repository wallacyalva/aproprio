<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paginas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model', "usuarioModel");
        $this->load->model('site_model', "siteModel");
    }

    public function index(){
        $data = array();
        //$textos = $this->siteModel->getAllTexts("sobrenos");

        //foreach ($textos as $text) {
            //$data[$text->nome] = $text->texto;
        //}

        $this->load->view('site/header_view',$data);
        $this->load->view('site/home_view');
        $this->load->view('site/footer_view');
    }

    public function sobrenos() {
        $data = array();
        $textos = $this->siteModel->getAllTexts("sobrenos");
        $links = $this->siteModel->getAllLinks("sobrenos");

        foreach ($textos as $text) {
            $data[$text->nome] = $text->texto;
        }
        foreach ($links as $link) {
            $data[$link->nome] = $link->link;
        }

        $this->load->view('site/header_view',$data);
        $this->load->view('site/paginas/sobrenos_view');
        $this->load->view('site/footer_view');
    }

    public function eventos() {
        $data = array();
        $textos = $this->siteModel->getAllTexts("eventos");
        $links = $this->siteModel->getAllLinks("eventos");

        foreach ($textos as $text) {
            $data[$text->nome] = $text->texto;
        }
        foreach ($links as $link) {
            $data[$link->nome] = $link->link;
        }

        $this->load->view('site/header_view',$data);
        $this->load->view('site/paginas/eventos_view');
        $this->load->view('site/footer_view');
    }

    public function grupo() {
        $data = array();
        $textos = $this->siteModel->getAllTexts("grupo");
        $links = $this->siteModel->getAllLinks("grupo");

        foreach ($textos as $text) {
            $data[$text->nome] = $text->texto;
        }
        foreach ($links as $link) {
            $data[$link->nome] = $link->link;
        }

        $this->load->view('site/header_view',$data);
        $this->load->view('site/paginas/grupo_view');
        $this->load->view('site/footer_view');
    }

    public function causas() {
        $data = array();
        $textos = $this->siteModel->getAllTexts("causas");
        $links = $this->siteModel->getAllLinks("causas");

        foreach ($textos as $text) {
            $data[$text->nome] = $text->texto;
        }
        foreach ($links as $link) {
            $data[$link->nome] = $link->link;
        }

        $this->load->view('site/header_view',$data);
        $this->load->view('site/paginas/causas_view');
        $this->load->view('site/footer_view');
    }

    public function blog() {
        $data = array();
        $textos = $this->siteModel->getAllTexts("blog");
        $links = $this->siteModel->getAllLinks("blog");

        foreach ($textos as $text) {
            $data[$text->nome] = $text->texto;
        }
        foreach ($links as $link) {
            $data[$link->nome] = $link->link;
        }

        $this->load->view('site/header_view',$data);
        $this->load->view('site/paginas/blog_view');
        $this->load->view('site/footer_view');
    }

    public function contato() {
        $data = array();
        $textos = $this->siteModel->getAllTexts("contato");
        $links = $this->siteModel->getAllLinks("contato");

        foreach ($textos as $text) {
            $data[$text->nome] = $text->texto;
        }
        foreach ($links as $link) {
            $data[$link->nome] = $link->link;
        }

        $this->load->view('site/header_view',$data);
        $this->load->view('site/paginas/contato_view');
        $this->load->view('site/footer_view');
    }

    

}