<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model', "usuarioModel");
    }

    public function deletar($id_usuario) {
        $this->usuarioModel->deletarUsuarioById($id_usuario);
        redirect(ci_site_url()."usuario/ativarUsuarios");
    }

    public function ativar($id_usuario) {
        $this->usuarioModel->ativarUsuarioById($id_usuario);
        redirect(ci_site_url()."usuario/ativarUsuarios");
    }

    public function config() {
        $data['user'] = $this->usuarioModel->getUserCompleteData($this->session->userdata("bs_user_id"));
        $this->load->view('template/header_view');
        $this->load->view('usuario/configuracoes_view', $data);
        $this->load->view('template/footer_view');
    }

    public function dicas() {
        $data['user'] = $this->usuarioModel->getUserCompleteData($this->session->userdata("bs_user_id"));
        $this->load->view('template/header_view');
        $this->load->view('usuario/dicas_view', $data);
        $this->load->view('template/footer_view');
    }

    public function index() {
        //check user logged in or not
        $this->usuarioModel->isLoggedIn();

        $userId = $this->session->userdata("bs_user_id");
        $userRule = $this->usuarioModel->getUserRule($userId);
        $user = $this->usuarioModel->getUserCompleteData($userId);
        if ($userRule->rule == 1) {
            // $allClients = $this->usuarioModel->getAllClients();
            // $allPayedClients = $this->usuarioModel->getAllPayedClients();
            // $allNegativeClients = $this->usuarioModel->getAllNegativeClients();
        } else {
            // $allClients = $this->usuarioModel->getAllClients($userId);
            // $allPayedClients = $this->usuarioModel->getAllPayedClients($userId);
            // $allNegativeClients = $this->usuarioModel->getAllNegativeClients($userId);
        }
        
        $data = array();
        $data['user'] = $user;
        // $data['allClients'] = $allClients;
        // $data['allPayedClients'] = $allPayedClients;
        // $data['allNegativeClients'] = $allNegativeClients;

        $this->load->view('template/header_view');
        $this->load->view('usuario/dashboard_view', $data);
        $this->load->view('template/footer_view');
    }
    
    public function empreendedorClientes($empreendedorId){
        //check user logged in or not
        $this->usuarioModel->isLoggedIn();
        $idUser = $empreendedorId;
        $data   = array();

        if ($this->input->post('cliente_to_remove')){
            $idCliente = $this->input->post('cliente_to_remove');

            $files=$this->usuarioModel->getClienteImage($idCliente);

            $old = getcwd(); // Save the current directory
            chdir("../uploads/images_profile");
            foreach($files as $file){
                unlink($file->picture);
            }  
            chdir($old);
            $this->usuarioModel->deleteCliente($idCliente);
        }

        $data['clientes']=$this->usuarioModel->getClienteCompleteData($idUser);

        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);
        $data['user'] = $user;
        
        $this->load->view('template/header_view');
        $this->load->view('cliente/meus_clientes_view', $data);
        $this->load->view('template/footer_view');
    }

    public function profile(){
        //check user logged in or not
        $this->usuarioModel->isLoggedIn();
 
        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);

        $postArray = $this->input->post();
        $data = array();

        if ($this->input->post()) {
        $this->form_validation->set_rules('name', "Nome", 'required|strip_tags|max_length[200]|alpha_numeric');
        $this->form_validation->set_rules('username_email', "E-Mail", 'required');
        $this->form_validation->set_rules('phone', "Telefone", 'required|strip_tags|max_length[15]');
        $this->form_validation->set_rules('zip_code', "CEP", 'required|strip_tags|max_length[8]|cep_validate');
        $this->form_validation->set_rules('address', "Endereço", 'required|strip_tags|max_length[255]|alpha_numeric');
        $this->form_validation->set_rules('district', "Birro", 'required|strip_tags|max_length[100]|alpha_numeric');
        $this->form_validation->set_rules('city', "Cidade", 'required|strip_tags|max_length[255]|alpha_numeric');
        $this->form_validation->set_rules('state', "Estado", 'required|strip_tags|max_length[100]|alpha_numeric');
        $this->form_validation->set_rules('complement', "complemento", 'max_length[255]|strip_tags|alpha_numeric');
        $this->form_validation->set_rules('number', "Numero", 'strip_tags|max_length[20]');
        
        if ($this->form_validation->run() != FALSE) {
          //  $postArray["birthdate"] = DateTime::createFromFormat('d/m/Y', $postArray["birthdate"])->format('Y-m-d');
            $this->usuarioModel->updateUser($userId, $postArray);
            $this->session->set_flashdata("msg", array("tipo" => "1", "texto" => "<strong>Muito Bem!!!</strong> Cadastro Atualizado com Sucesso.." ));        
            redirect("usuario/profile");
        }

        $user->name         = $this->input->post("name");
        $user->zip_code     = $this->input->post("zip_code");
        $user->address      = $this->input->post("address");
        $user->district     = $this->input->post("district");
        $user->city         = $this->input->post("city");
        $user->state        = $this->input->post("state");
        $user->phone        = $this->input->post("phone");
        $user->email        = $this->input->post("username_email");
        
    }
    $success = $this->session->flashdata("successPassword");
    if ($success) {
        $data["successPassword"] = $success;
    }
    $error = $this->session->flashdata("errorPassword");
    if ($error) {
        $data["errorPassword"] = $error;
    }

        $data['user'] = $user;

        $this->load->view('template/header_view');
        $this->load->view('usuario/meus_dados_view', $data);
        $this->load->view('template/footer_view');
    }

    public function todosUsuarios() {
        $this->usuarioModel->isLoggedIn();
        $data = array();
        $data['user'] = $this->usuarioModel->getUserCompleteData($this->session->userdata("bs_user_id"));
        $data['users'] = $this->usuarioModel->getAllNotAdmUsers();
        $this->load->view('template/header_view');
        $this->load->view('usuario/meus_usuarios_view', $data);
        $this->load->view('template/footer_view');
    }

    public function ativarUsuarios() {
        $this->usuarioModel->isLoggedIn();
        $data = array();
        $data['user'] = $this->usuarioModel->getUserCompleteData($this->session->userdata("bs_user_id"));
        $data['users'] = $this->usuarioModel->getAllUnactiveUsers();
        $this->load->view('template/header_view');
        $this->load->view('usuario/ativar_usuarios_view', $data);
        $this->load->view('template/footer_view');
    }

    public function todosAdministradores() {
        $this->usuarioModel->isLoggedIn();
        $data = array();
        $data['rule'] = 1;
        $data['user'] = $this->usuarioModel->getUserCompleteData($this->session->userdata("bs_user_id"));
        $data['users'] = $this->usuarioModel->getAllUsersByRule($data['rule']);
        $this->load->view('template/header_view');
        $this->load->view('usuario/meus_usuarios_view', $data);
        $this->load->view('template/footer_view');
    }

    public function usuarios(){
        //check user logged in or not
        $this->usuarioModel->isLoggedIn();
 
        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);
        $users = $this->usuarioModel->getAllUser();
        $data = array();

        if ($this->input->post('usuario_to_remove')){
            $idUsuario = $this->input->post('usuario_to_remove');

            $getImage=$this->usuarioModel->getUserImage($idUsuario);
            if($getImage){
                $old = getcwd(); // Save the current directory
                chdir("uploads/images/users/");
                $file = $this->usuarioModel->getUserImage($idUsuario);
                $filnenewName=explode(".", $file->imagem);
                if($filnenewName[0]=="no-image"){
    
                }else{
                    $original=$filnenewName[0].".".$filnenewName[2];
                    unlink($original);
                    unlink($file->imagem);
                    chdir($old);
                }
            }

            $this->usuarioModel->deleteUsuario($idUsuario);
        }
        else if($this->input->post('usuario_to_admin')){
            $this->usuarioModel->updateUsuarioToAdmin($this->input->post('usuario_to_admin'));
        }



        $data['users'] = $users;
        $data['user'] = $user;

        $this->load->view('template/header_view');
        $this->load->view('usuario/meus_usuarios_view', $data);
        $this->load->view('template/footer_view');
    }
    public function propostas(){
        //check user logged in or not
        $this->usuarioModel->isLoggedIn();
 
        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);
        $users = $this->usuarioModel->getAllUserPropostas();
        $data = array();

        if ($this->input->post('usuario_to_remove')){
            $idUsuario = $this->input->post('usuario_to_remove');

            $getImage=$this->usuarioModel->getUserImage($idUsuario);
            if($getImage){
                $old = getcwd(); // Save the current directory
                chdir("uploads/images/users/");
                $file = $this->usuarioModel->getUserImage($idUsuario);
                $filnenewName=explode(".", $file->imagem);
                if($filnenewName[0]=="no-image"){
    
                }else{
                    $original=$filnenewName[0].".".$filnenewName[2];
                    unlink($original);
                    unlink($file->imagem);
                    chdir($old);
                }
            }

            $this->usuarioModel->deleteUsuario($idUsuario);
        }
        else if($this->input->post('usuario_to_admin')){
            $this->usuarioModel->updateUsuarioToAdmin($this->input->post('usuario_to_admin'));
        }
        else if($this->input->post('usuario_to_empreendedor')){
            $this->usuarioModel->updateUsuarioToEmp($this->input->post('usuario_to_empreendedor'));
        }



        $data['users'] = $users;
        $data['user'] = $user;

        $this->load->view('template/header_view');
        $this->load->view('usuario/propostas_view', $data);
        $this->load->view('template/footer_view');
    }


    public function new(){
        //check user logged in or not
        $this->usuarioModel->isLoggedIn();
 
        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);

        $postArray = $this->input->post();
        $data = array();

        if ($this->input->post()) {
        $this->form_validation->set_rules('name', "Nome", 'required|strip_tags|max_length[200]|alpha_numeric');
        
        if ($this->form_validation->run() != FALSE) {

            $this->usuarioModel->insertUsuario($postArray);

            $this->session->set_flashdata("msg", array("tipo" => "1", "texto" => "<strong>Muito Bem!!!</strong> Usuário Cadastro Atualizado com Sucesso.." ));        
            redirect("usuario/new");
        }
        
    }
        $data['user'] = $user;

        $this->load->view('template/header_view');
        $this->load->view('usuario/new_usuario_view', $data);
        $this->load->view('template/footer_view');
    }

    public function editar(){
        //check user logged in or not
        $this->usuarioModel->isLoggedIn();
 
        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);
        $user_empreendedor = $this->usuarioModel->getUserCompleteData($this->uri->segment(3));


        $postArray = $this->input->post();
        $data = array();

        if ($this->input->post()) {
        $this->form_validation->set_rules('name', "Nome", 'required|strip_tags|max_length[200]|alpha_numeric');
        
        if ($this->form_validation->run() != FALSE) {

            $this->usuarioModel->updateUserAdmin($userId, $this->uri->segment(3), $postArray);

            $this->session->set_flashdata("msg", array("tipo" => "1", "texto" => "<strong>Muito Bem!!!</strong> Empreendedor Atualizado com Sucesso.." ));        
            redirect("usuario/editar/".$this->uri->segment(3));
        }
        
    }
        $data['user'] = $user;
        $data['useEmpreendedor'] = $user_empreendedor;

        $this->load->view('template/header_view');
        $this->load->view('usuario/editar_usuario_view', $data);
        $this->load->view('template/footer_view');
    }



    public function change_password() {
        if (!is_user_logged_in()) {
            redirect("login");
        }
        $this->form_validation->set_rules('new_password', 'new_password', 'trim|required|strip_tags|min_length[6]|max_length[50]|matches[confirm_new_password]');
        $this->form_validation->set_rules('confirm_new_password', 'confirm_new_password', 'trim|required|strip_tags');
        if ($this->form_validation->run() != FALSE) {
            $data = $this->input->post();
            $userId = $this->session->userdata("bs_user_id");

            $this->usuarioModel->updateUserPassword($userId, $data["new_password"]);

            $this->session->set_flashdata("msg", array("tipo" => "1", "texto" => "<strong>Muito Bem!</strong> Senha Atualizada com Sucesso" ));
            redirect("usuario/profile");
        }
        $error = '';
        foreach ($_POST as $key => $field) {
            if (form_error($key)) {
                $error .= strip_tags(form_error($key));
                break;
            }
        }
        if (!$error) {
            $error = $this->lang->line("all_fields_required");
        }
        $this->session->set_flashdata("msg", array("tipo" => "2", "texto" => "<strong>Ops!!!</strong> Ocorreu um erro ao tentar ataulizar sua senha." ));        
        redirect("usuario/profile");
    }


    public function changePhoto() {
        if (!is_user_logged_in()) {
            redirect("login");
        }
        $userId = $this->session->userdata("bs_user_id");

        $config['upload_path']      = "uploads/images/users/";
        $config['allowed_types']    = 'jpg|jpeg|JPG|JEPG|png|PNG';
        $config['file_name']        = $userId . "_".time();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("file")) {
            $this->session->set_flashdata("msg", array("tipo" => "2", "texto" => "<strong>Ops!!!</strong>".$this->upload->display_errors()."" ));     
            //redirect("cliente/new_cliente");
        }
        $getImage=$this->usuarioModel->getUserImage($userId);
        if($getImage){
            $old = getcwd(); // Save the current directory
            chdir("uploads/images/users/");
            $file = $this->usuarioModel->getUserImage($userId);
            $filnenewName=explode(".", $file->imagem);
            if($filnenewName[0]=="no-image"){

            }else{
                $original=$filnenewName[0].".".$filnenewName[2];
                unlink($original);
                unlink($file->imagem);
                chdir($old);
            }
        }

        $newNameImage=$config['file_name']."".$this->upload->file_ext;
        $fileFullPath=ci_site_url().'uploads/images/users/'.$newNameImage;
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'uploads/images/users/'.$newNameImage;
        //SE TRUE CRIA UM THUNMB DA IMAGEM
        $config['create_thumb'] = false;
        //SE TRUE DA UM RESIZE MANTENDO A PROPORCAO DO WIDTH
        $config['maintain_ratio'] = true;
        $config['width']         = 500;
        //$config['height']       = 200;
        
        $this->load->library('image_lib', $config);          
        $this->image_lib->resize();

        $this->usuarioModel->updateUserImage($userId,$newNameImage);
       // return $fileFullPath;

       echo "<input type='hidden' name='cp_name_img' id='cp_name_img' value='".$newNameImage."'/>
       <img id='crop_image' src=".$fileFullPath." >";

    }

    public function cropPhoto() {
        if (!is_user_logged_in()) {
            redirect("login");
        }
       $userId = $this->session->userdata("bs_user_id");
       
       $file = $this->usuarioModel->getUserImage($userId); 
       $pach=ci_site_url().'uploads/images/users/'.$file->imagem;
       $pachBeCrop='uploads/images/users/'.$file->imagem;
       
    //    echo $this->input->post("cp_img_path");
    $img_width  = 220;
    $img_height = 220;
    
    
    $setings='{"img_width":'.$img_width.',"img_height":'.$img_height.',"x":'.$this->input->post("ic_x").',"y":'.$this->input->post("ic_y").',"height":'.$this->input->post("ic_h").',"width":'.$this->input->post("ic_w").',"rotate":0}';
    
    $params ["patch_src"] = $pachBeCrop;
    $params ["patch_dst"] = $pachBeCrop;
    $params ["setings"] = $setings;
    $params ["sigla"] = "avatar";

        $this->load->library('cropavatar',$params);  
       // $this->cropavatar->crop($pachBeCrop,$pachBeCrop,$setings);
      $result= $this->cropavatar->getResult();
    
      
      $filnenewName=explode(".", $file->imagem);
      $filenameAvatar=$filnenewName[0].".avatar.".$filnenewName[1];
      $this->usuarioModel->updateUserImage($userId,$filenameAvatar);

      echo "<img id='img' src='".ci_site_url().$result."' class='img-thumbnail' >";
     
    }
}