<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class Login extends CI_Controller {

        public function __construct() {
           parent::__construct();
           $this->load->model('usuario_model', "usuarioModel");
           $this->load->model('login_model', "loginModel");
        }
    
        public function index(){
            $this->load->view('login/login_view');
        }
        
        
        public function check_user()
        {
            $username = $this->input->post('username_email');
            $password = $this->input->post('password');
            // json_encode($this->input->post());
            $result['status'] = $this->loginModel->get_user($username, $password);
            
            if($this->session->userdata("is_user")){
                $result['is_user'] = true;
            } else {
                $result['is_user'] = false;
            }

            if($result){
                /*set session and save name and uid*/
                $this->load->library('session');
                $userData = array(
                        'logged_in' => true 
                );
                $this->session->set_userdata($userData);
            }
            echo json_encode($result);
        }

    function registerLogin($usuarioLogin) {
        $data = array(
            'bs_user_id' => $usuarioLogin["user_id"],
            'email' => $usuarioLogin["email"],
            'is_logged_in' => true
        );
        $this->session->set_userdata($data);
    }

    public function logout() {
        if (is_user_logged_in()) {
            //faz logout
            $this->session->sess_destroy();
        }
    }

    public function recuperarSenha() {
        $post_data = $this->input->post();
        echo json_encode("true");
    }
	
	public function registrar() {
        /**
         * Cria array para variavel data.
         * Insre no array os input do post
         */
        $data = array();
        $data = $this->input->post();

            if($this->input->post()) {
                $this->form_validation->set_rules('name', "Nome", 'required|strip_tags|max_length[200]|alpha_numeric');
                    $this->usuarioModel->registerUser($data);
                    $this->session->set_flashdata("msg", array("tipo" => "1", "texto" => "<strong>Muito Bem!!!</strong> Cadastro realizado com Sucesso.." ));        
                    redirect("login");
            }
            $this->load->view('login/registrar_view');
		}
		
 
    
}