<?php

class Posts_model extends CI_Model {

    function insertPost($post) {
        $this->db->trans_start();

        $this->db->set("titulo", $post["titulo"]);
        $this->db->set("foto", $post["foto"]);
        $this->db->set("categoria", $post["categoria"]);
        $this->db->set("status", 1);

        $this->db->insert("posts");
        $postId = $this->db->insert_id();

        //complete transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            //algum erro ocorreu! 
            return false;
        }
        //retorna ID do anuncio
        return $postId;
    }

    function deletarPostsTimeOut() {
        $query = "DELETE FROM `wc_posts` WHERE status = 3 AND updated < DATE_SUB(NOW(), INTERVAL 10 DAY);";
        return $this->db->query($query);
    }

    function getPostsByUserId($id_usuario) {
        $this->db->select("*");
        $this->db->where("id_usuario", $id_usuario);
        return $this->db->get("posts")->result();
    }

    function aprovarPost($id_post) {
        $this->db->set("status", 2);
        $this->db->where("id", $id_post);
        return $this->db->update("posts");
    }
    
    function negarPost($id_post) {
        $this->db->set("status", 3);
        $this->db->where("id", $id_post);
        return $this->db->update("posts");
    }
    
    function getAllPostsAtivos() {
        $this->db->select("*");
        $this->db->where("status", 2);
        return $this->db->get("posts")->result();
    }

    function getAllPostsEsperandoAtivacao() {
        $this->db->select("*");
        $this->db->where("status", 1);
        return $this->db->get("posts")->result();
    }
}