<?php

class Site_model extends CI_Model {

    public function __construct() {
	    parent:: __construct();
    }
    function insertDoacao($post) {
        $this->db->trans_start();

        $this->db->set("titulo", $post["titulo"]);
       
        $this->db->set("texto", $post["texto"]);
        $this->db->set("img_name", $post["foto"]);
        $this->db->set("usuario",$post["usuario"]);
        $this->db->set("link", $post["link"]);
        $postId = $this->db->insert_id();
        $this->db->set("id", $postId);
        
        $this->db->insert("doacoes_cabelo");

        //complete transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            //algum erro ocorreu! 
            return false;
        }
        //retorna ID do anuncio
        return $postId;
    }
    function getDoacoes(){
        $this->db->select("*");
        $this->db->order_by('rand()');
        $this->db->limit(3);
        return $this->db->get("doacoes_cabelo")->result();
    }
    function insertCampanha($post) {
        $this->db->trans_start();
        
        $this->db->set("titulo", $post["titulo"]);
        
        $this->db->set("texto", $post["texto"]);
        $this->db->set("img_name", $post["foto"]);
        $this->db->set("progresso", $post["progresso"]);
        $this->db->set("usuario",$post["usuario"]);
        $this->db->set("link", $post["link"]);
        $postId = $this->db->insert_id();
        $this->db->set("id", $postId);
        
        $this->db->insert("campanhas");
        
        //complete transaction
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            //algum erro ocorreu! 
            return false;
        }
        //retorna ID do anuncio
        return $postId;
    }
    function getCampanhas(){
        $this->db->select("*");
        $this->db->order_by('rand()');
        $this->db->limit(3);
        return $this->db->get("campanhas")->result();
    }
    function insertEvento($post) {
        $this->db->trans_start();
        
        $this->db->set("titulo", $post["titulo"]);
        $this->db->set("texto", $post["texto"]);
        $this->db->set("img_name", $post["foto"]);
        $this->db->set("data", $post["data"]);
        $this->db->set("usuario",$post["usuario"]);
        $this->db->set("link", $post["link"]);
        $postId = $this->db->insert_id();
        $this->db->set("id", $postId);
        
        $this->db->insert("eventos");
        
        //complete transaction
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            //algum erro ocorreu! 
            return false;
        }
        //retorna ID do anuncio
        return $postId;
    }
    function getEventos(){
        $this->db->select("*");
        $this->db->order_by('rand()');
        $this->db->limit(5);
        return $this->db->get("eventos")->result();
    }
    function insertNoticia($post) {
        $this->db->trans_start();
        
        $this->db->set("titulo", $post["titulo"]);
        $this->db->set("texto", $post["texto"]);
        $this->db->set("img_name", $post["foto"]);
        $this->db->set("usuario_id",$post["usuario"]);
        $this->db->set("link", $post["link"]);
        $postId = $this->db->insert_id();
        $this->db->set("id", $postId);
        
        $this->db->insert("noticias");
        
        //complete transaction
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            //algum erro ocorreu! 
            return false;
        }
        //retorna ID do anuncio
        return $postId;
    }
    function getNoticias(){
        $this->db->select("*");
        $this->db->order_by('rand()');
        $this->db->limit(5);
        return $this->db->get("noticias")->result();
    }
    function getUserImage($usuarioId) {
        $this->db->select("imagem");
        $this->db->where('id', $usuarioId);
        $picture = $this->db->get("usuarios")->row(0);
        return $picture;
    }
    public function getUsers(){
        $this->db->select("*");
        $this->db->order_by('rand()');
        $this->db->where("adm", 1);
        $this->db->limit(4);
        return $this->db->get("usuarios")->result();
    }
    public function getAll($onde){
        $this->db->select("*");
        return $this->db->get($onde)->result();
    }
    public function Excluir($id,$tipo){
        $this->db->where("id", $id);
        $this->db->delete($tipo);
    }
    public function getAllTexts($page = null) {
        $this->db->select("*");
        if($page) {
            $this->db->where("pagina", $page);
        }
        return $this->db->get("textos")->result();
    }
    public function getText($id) {
        $this->db->select("*");
        $this->db->where("id", $id);
        return $this->db->get("textos")->row(0);
    }
    public function updateText($id, $text) {
        $this->db->trans_start();
            $this->db->set("texto", $text);
            $this->db->where("id", $id);
            $this->db->update("textos");
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    public function getAllLinks($page = null) {
        $this->db->select("*");
        if($page) {
            $this->db->where("pagina", $page);
        }
        return $this->db->get("links")->result();
    }
    public function getLink($id) {
        $this->db->select("*");
        $this->db->where("id", $id);
        return $this->db->get("links")->row(0);
    }
    public function updateLink($id, $text) {
        $this->db->trans_start();
            $this->db->set("link", $text);
            $this->db->where("id", $id);
            $this->db->update("links");
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
  
}