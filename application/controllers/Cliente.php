<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model', "usuarioModel");
        $this->load->model('cliente_model', "clienteModel");
    }

    public function new_cliente(){
        //check user logged in or not
        $this->usuarioModel->isLoggedIn();

        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);

        $data = array();
       
        $data = $this->input->post();
        if($data){
        $form_exist = isset($data);
      if($data["dataCirurgia"]==""){$form_exist = false;}
       if($data["name_paciente"]==""){$form_exist = false;}
       if($data["name_mae"]==""){$form_exist = false;}
       if($data["cpf"]==""){$form_exist = false;}
       if($data["doc_identidade"]==""){$form_exist = false;}
       if($data["orgao_expedidor"]==""){$form_exist = false;}
       if($data["cartao_sus"]==""){$form_exist = false;}
       if($data["estado_civil"]==""){$form_exist = false;}
       if($data["Data_nascimento"]==""){$form_exist = false;}
       if($data["Sexo"]==""){$form_exist = false;}
       if($data["Endereco"]==""){$form_exist = false;}
       if($data["Bairro"]==""){$form_exist = false;}
       if($data["Cidade"]==""){$form_exist = false;}
       if($data["Estado"]==""){$form_exist = false;}
       if($data["Telefone_fixo"]==""){$form_exist = false;}
       if($data["Email"]==""){$form_exist = false;}
       if($data["Celular"]==""){$form_exist = false;}
       if($data["name_responsavel"]==""){$form_exist = false;}
       if($data["grau_parentesco"]==""){$form_exist = false;}
       if($data[ "Telefone_responsavel"]==""){$form_exist = false;}
       if($data["CA_paciente"]==""){$form_exist = false;}
       if($data["name_medicos"]==""){$form_exist = false;}
       if($data["Telefone_responsavel"]==""){$form_exist = false;}
       if($data["Convenio"]==""){$form_exist = false;}
        //  if($form_exist){$form_exist = is_null($data[" "Observacao"]==""){$form_exist = false;}

            if ($form_exist) {
                $userId = $this->session->userdata("bs_user_id");
                if (!empty($_FILES))
                {
                    $config['upload_path']      = "../uploads/images_profile";
                    $config['allowed_types']    = '*';
                    $config['file_name']        = $userId . "_".time();
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload("img_capa")) {
                        $this->session->set_flashdata("msg", array("tipo" => "2", "texto" => "<strong>Ops!!!</strong>".$this->upload->display_errors()."" ));     
                        redirect("cliente/new_cliente");
                    }
                    
                    $newNameImage=$config['file_name']."".$this->upload->file_ext;

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = '../uploads/images_profile/'.$newNameImage;
                    //SE TRUE CRIA UM THUNMB DA IMAGEM
                    $config['create_thumb'] = false;
                    //SE TRUE DA UM RESIZE MANTENDO A PROPORCAO DO WIDTH
                    $config['maintain_ratio'] = false;
                    $config['width']         = 1000;
                    $config['height']       = 794;
                    
                    $this->load->library('image_lib', $config);          
                    $this->image_lib->resize();

                }

                $data["usuario"] = $userId;
                 $data["capa"] = "teste";
                $codigoCliente = $this->clienteModel->insertCliente($data);
                if($codigoCliente){
                    $data["tipo"] = 1;
                    $data["texto"] = "Novo cliente cadastrado com sucesso.";
                }else{
                    $data["tipo"] = 2;
                    $data["texto"] = "Erro ao cadastrar novo cliente.";
                }
        }else{
            $data["tipo"] = 2;
            $data["texto"] = "Formulario incompleto.";
        }
        }
        $data['user'] = $user;
        $data['categorias'] = $this->clienteModel->getCategorias();
        $this->load->view('template/header_view');
        $this->load->view('cliente/novo_cliente_view', $data);
        $this->load->view('template/footer_view');
    }

    public function uploadImageCam(){
        $image = file_get_contents('php://input');
        if(!$image)
        {
        print "ERROR: Failed to read the uploaded image data.\n";
        exit();
        }
        $name = date('YmdHis');
        $newname=  'uploads/images/pacientes/'.$name.'.jpg';
        $file = file_put_contents($newname, $image);
        if(!$file)
        {
        print "ERROR: Failed to write data to $filename, check permissions.\n";
        exit();
        }

        $url = 'http://'.$_SERVER['HTTP_HOST'].'/'.$newname;
        print "$url\n";
    }

    // resposposta_novo_usuario



    public function edit_cliente($idCliente){
        //check user logged in or not
        $this->usuarioModel->isLoggedIn();

        $idUser = $this->session->userdata("bs_user_id");
        $rule = $this->session->userdata("rule");
        $data = array();
        $data = $this->input->post();
        $postArray = $this->input->post();
        
        if($rule){
            $cliente =  $this->clienteModel->getClienteCompleteData(false, $idCliente);
        }else{
            $cliente =  $this->clienteModel->getClienteCompleteData($idUser, $idCliente);
        }



        if ($this->input->post()) {
            if ($this->input->post("new_password")) {
                $this->form_validation->set_rules('new_password', 'new_password', 'trim|required|strip_tags|min_length[6]|max_length[50]|matches[confirm_new_password]');
                $this->form_validation->set_rules('confirm_new_password', 'confirm_new_password', 'trim|required|strip_tags');
                if ($this->form_validation->run() != FALSE) {
                    $data = $this->input->post();
                    $this->clienteModel->updateClientePassword($idCliente, $data["new_password"]);
                    $this->session->set_flashdata("msg", array("tipo" => "1", "texto" => "<strong>Muito Bem!!!</strong> Senha do Cliente atualizado!" ));               
                }
            }
            else{
          

                    $postArray["todasCategorias"] = $this->clienteModel->getClienteDetalhesCategorias($idCliente);

                  $this->clienteModel->updateCliente($idCliente, $postArray);
                  $this->session->set_flashdata("msg", array("tipo" => "1", "texto" => "Paciente atualizado com <strong>Sucesso</strong>" ));      
                  redirect("cliente/todosClientes");  
           

            $cliente->dataCirurgia = $this->input->post("dataCirurgia");
            $cliente->name_paciente = $this->input->post("name_paciente");
            if($this->input->post("foto")){
                $cliente->name_paciente = $this->input->post("foto");

            }
            $cliente->name_mae  = $this->input->post("name_mae");
            $cliente->cpf     = $this->input->post("cpf");
            $cliente->address      = $this->input->post("Endereco");
            $cliente->district     = $this->input->post("district");
            $cliente->city         = $this->input->post("city");
            $cliente->state        = $this->input->post("state");
            $cliente->doc_identidade        = $this->input->post("doc_identidade");
            $cliente->orgao_expedidor       = $this->input->post("orgao_expedidor");
            $cliente->cartao_sus         = $this->input->post("cartao_sus");
            $cliente->estado_civil     = $this->input->post("estado_civil");
            $cliente->Data_nascimento      = $this->input->post("Data_nascimento");
            $cliente->Sexo       = $this->input->post("Sexo");
            $cliente->Telefone_fixo        = $this->input->post("Telefone_fixo");
            $cliente->Email    = $this->input->post("Email");
            $cliente->Celular    = $this->input->post("Celular");
            $cliente->name_responsavel    = $this->input->post("name_responsavel");
            $cliente->grau_parentesco    = $this->input->post("grau_parentesco");
            $cliente->CelulaTelefone_responsavel    = $this->input->post("Telefone_responsavel");
            $cliente->CA_paciente    = $this->input->post("CA_paciente");
            $cliente->name_medicos    = $this->input->post("name_medicos");
            $cliente->Convenio    = $this->input->post("Convenio");
            $cliente->Observacao    = $this->input->post("Observacao");
            }
        }
        

        $data["cliente"] = $cliente;

        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);
        $data['user'] = $user;
        $data['categorias'] = $this->clienteModel->getCategorias();
        $data["todasCategoriasCliente"] = $this->clienteModel->getClienteDetalhesCategorias($idCliente);
        $data['usuarios']=$this->usuarioModel->getAllUser();
        
        $this->load->view('template/header_view');
        $this->load->view('cliente/edit_cliente_view', $data);
        $this->load->view('template/footer_view');
    }

    public function my_cliente(){
        //check user logged in or not
        $this->usuarioModel->isLoggedIn();

        $idUser = $this->session->userdata("bs_user_id");

        $data   = array();

        if ($this->input->post('cliente_to_remove')){
            $idCliente = $this->input->post('cliente_to_remove');

            $files=$this->clienteModel->getClienteImage($idCliente);

            $old = getcwd(); // Save the current directory
            chdir("../uploads/images_profile");
            foreach($files as $file){
                unlink($file->picture);
            }  
            chdir($old);
            $this->clienteModel->deleteCliente($idCliente);
        }
        else if ($this->input->post('cliente_to_block')){
            $idCliente = $this->input->post('cliente_to_block');
            $this->clienteModel->updateBlockCliente($idCliente);
        }
        if($this->uri->segment(3)){
            $data['clientes']=$this->clienteModel->getClienteCompleteData($this->uri->segment(3));
        }else{
            $data['clientes']=$this->clienteModel->getClienteCompleteData();
        }

        $userId = $this->session->userdata("bs_user_id");
        $user = $this->usuarioModel->getUserCompleteData($userId);
        $data['user'] = $user;
        
        $this->load->view('template/header_view');
        $this->load->view('cliente/meus_clientes_view', $data);
        $this->load->view('template/footer_view');
    }
    
    public function todosClientes() {
        if (!is_user_logged_in()) {
            redirect("login");
        }
        $data = array();
        $data['user'] = $this->usuarioModel->getUserCompleteData($this->session->userdata("bs_user_id"));
        $data['clientes'] = $this->clienteModel->getAllClients();
        $this->load->view('template/header_view');
        $this->load->view('cliente/meus_clientes_view', $data);
        $this->load->view('template/footer_view');
    }
    
    public function changeCapaAnunciante() {
        if (!is_user_logged_in()) {
            redirect("login");
        }
        $userId = $this->session->userdata("bs_user_id");
        $idAnunciante = $this->uri->segment(3);

        $config['upload_path']      = "../uploads/images_profile/";
        $config['allowed_types']    = 'jpg|jpeg|JPG|JEPG|png|PNG';
        $config['file_name']        = $idAnunciante . "_".time();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("file")) {
            $this->session->set_flashdata("msg", array("tipo" => "2", "texto" => "<strong>Ops!!!</strong>".$this->upload->display_errors()."" ));     
            //redirect("cliente/new_cliente");
        }

        $getImage=$this->clienteModel->getClienteCapa($idAnunciante);

        if($getImage){
            $old = getcwd(); // Save the current directory
            chdir("../uploads/images_profile/");
            $file = $this->clienteModel->getClienteCapa($idAnunciante);
            $filnenewName=explode(".", $file->capa);
            if($filnenewName[0]=="no-image"){

            }else{
                // $original=$filnenewName[0].".".$filnenewName[2];
                // unlink($original);
                unlink($file->capa);
                chdir($old);
            }
        }

        $newNameImage=$config['file_name']."".$this->upload->file_ext;
        $fileFullPath=ci_site_url().'../uploads/images_profile/'.$newNameImage;
        $config['image_library'] = 'gd2';
        $config['source_image'] = '../uploads/images_profile/'.$newNameImage;
        //SE TRUE CRIA UM THUNMB DA IMAGEM
        $config['create_thumb'] = false;
        //SE TRUE DA UM RESIZE MANTENDO A PROPORCAO DO WIDTH
        $config['maintain_ratio'] = true;
        $config['width']         = 500;
        //$config['height']       = 200;
        
        $this->load->library('image_lib', $config);          
        $this->image_lib->resize();

        $this->clienteModel->updateClienteCapa($idAnunciante,$newNameImage);
       // return $fileFullPath;

       echo "<input type='hidden' name='cp_name_img' id='cp_name_img' value='".$newNameImage."'/>
       <img id='crop_image' src=".$fileFullPath." >";

    }

    public function cropCapa() {
        if (!is_user_logged_in()) {
            redirect("login");
        }
       $userId = $this->session->userdata("bs_user_id");
        $idAnunciante = $this->uri->segment(3);

       $file = $this->clienteModel->getClienteCapa($idAnunciante); 
       $pach=ci_site_url().'../uploads/images_profile/'.$file->capa;
       $pachBeCrop='../uploads/images_profile/'.$file->capa;
       
    //    echo $this->input->post("cp_img_path");
    $img_width  = 1000;
    $img_height = 794;
    
    
    $setings='{"img_width":'.$img_width.',"img_height":'.$img_height.',"x":'.$this->input->post("capa_x").',"y":'.$this->input->post("capa_y").',"height":'.$this->input->post("capa_h").',"width":'.$this->input->post("capa_w").',"rotate":0}';
    
    $params ["patch_src"] = $pachBeCrop;
    $params ["patch_dst"] = $pachBeCrop;
    $params ["setings"] = $setings;
    $params ["sigla"] = "capa";

        $this->load->library('cropavatar',$params);  
       // $this->cropavatar->crop($pachBeCrop,$pachBeCrop,$setings);
      $result= $this->cropavatar->getResult();
    
      
      $filnenewName=explode(".", $file->capa);
      $filenameAvatar=$filnenewName[0].".capa.".$filnenewName[1];
      $this->clienteModel->updateClienteCapa($idAnunciante,$filenameAvatar);

      echo "<img id='img' src='".ci_site_url().$result."' class='img-thumbnail' >";
     
    }

    public function gerarContrato(){

        if (!is_user_logged_in()) {
            redirect("login");
        }
        $idUser = $this->session->userdata("bs_user_id");
        $idAnunciante = $this->uri->segment(3);

        $cliente = $this->clienteModel->getOneClienteCompleteData($idUser, $idAnunciante);

        $mpdf = new \Mpdf\Mpdf();

$html =
'
<div style="color:brown; font-size:18px;" align="center"><strong>Termos e Condições</strong></div>
<br/>
<div style="color:black; font-size:12px;" align="center"><strong>Ao se cadastrar no WWW.ACHEIDETUDO.COM.BR, você ESTÁ DE ACORDO COM AS CONDIÇÕES E TERMOS do Website.</strong></div>
<br /><br />
<div style="color:brown; font-size:12px;" align="left"><strong>1. SERVIÇOS OFERECIDOS</strong></div>
<div style="color:black; font-size:12px;" align="justify">
1.1 Este TERMO se aplica para regular o uso do serviço oferecido pelo site ACHEIDETUDO.COM.BR entre os EMPREENDEDORES INDEPENDENTES e as EMPRESAS, qual seja, possibilitar a escolha, pelos USUÁRIOS, dessas empresas cadastradas e, via on-line, efetivar solicitações para aquisição (propaganda, venda, entrega em domicílio e retirada no local) de produtos fornecidos pelas empresas cadastradas, de acordo com o case disponibilizado, sendo possível, igualmente, aos USUÁRIOS, a efetivação do pagamento do preço dos produtos conforme anunciado e disponibilizado pelo fornecedor, não sendo em nenhum momento nossa responsabilidade o recebimento pela venda anunciada e/ou realizada e nem por qualquer outra negociação. 
1.2 O serviços consistem, portanto, em aproximar, divulgar, possibilitar orçamentos, através dos nossos sites e aplicativo, os USUÁRIOS e as Empresas cadastradas, desde logo fica esclarecido ao USUÁRIO - o qual se declara ciente - que o serviço oferecido pelo ACHEIDETUDO.COM.BR se relaciona apenas à intermediação para comercialização de produtos, não abarcando preparo, embalagem, disponibilização e entrega física (via motoboy ou outros meios) dos produtos, sendo esses quatro itens de responsabilidade integral da Empresa, a quem deverão ser direcionados quaisquer reclamos acerca de problemas decorrentes de vício, atrasos, erros de fabricação ou produção, defeito ou inexecução da feitura, preparo e entrega de produtos. 
</div>
<br /><br />
<div style="color:brown; font-size:12px;" align="left">
<strong>
2. CADASTRO
</strong></div>
<div style="color:black; font-size:12px;" align="justify">
2.1 A EMPRESA, para utilizar os serviços acima descritos, deverá ter capacidade jurídica para atos civis, bem como será exigido que esta seja cadastrada na receita federal com a razão social e deverá, necessariamente, prestar as informações exigidas no CADASTRO, assumindo integralmente a responsabilidade (inclusive cível e criminal) pela exatidão e veracidade das informações fornecidas no CADASTRO, que poderá ser verificado, a qualquer momento, pelo ACHEIDETUDO.COM.BR e o EMPREENDEDOR INDEPENDENTE. Em caso de informações incorretas, inverídicas ou não confirmadas, bem assim na hipótese da negativa em corrigi-las ou enviar documentação que comprove a correção, o ACHEIDETUDO.COM.BR se reserva o direito de não concluir o cadastramento em curso ou, ainda, de bloquear o cadastro já existente, impedindo o USUÁRIO de utilizar os serviços on-line até que, a critério do ACHEIDETUDO.COM.BR, a situação de anomalia esteja regularizada. O ACHEIDETUDO.COM.BR se reserva o direito de impedir, a seu critério, novos CADASTROS, ou cancelar os já efetuados, em caso de ser detectada anomalia que, em sua análise, seja revestida de gravidade ou demonstre tentativa deliberada de burlar as regras aqui descritas, obrigatórias para todos os USUÁRIOS. 
2.2 Efetuado, com sucesso, o CADASTRO, a EMPRESA terá acesso aos serviços por meio de login e senha, dados esses que se compromete a não divulgar a terceiros, ficando sob sua exclusiva responsabilidade qualquer solicitação de serviço que seja feita com o uso de login e senha de sua titularidade. Toda a alteração realizada será de única responsabilidade da EMPRESA. 
</div>
<br /><br />
<div style="color:brown; font-size:12px;" align="left">
<strong>
3. OBRIGAÇÕES DA EMPRESA E DO EMPREENDEDOR INDEPENDENTE
</strong></div>
<div style="color:black; font-size:12px;" align="justify">
3.1 Efetuado com sucesso o CADASTRO do EMPREENDEDOR INDEPENDENTE e da EMPRESA, estes se obrigam a não divulgar a terceiros login e senha de acesso, nem permitir o uso de tais informações por terceiros, responsabilizando-se pelas consequências do uso de login e senha de sua titularidade. Toda e qualquer responsabilidade de acesso, comercialização, promoção, anuncio, entrega, recebimento, pagamento, ressarcimento, devolução, troca e demais assuntos referentes à relação usuário e EMPRESA é de responsabilidade única da EMPRESA. 
3.2 É obrigação da EMPRESA ressaltar sempre ao USUÁRIO que forneça informações cadastrais totalmente verídicas e exatas, responsabilizando-se exclusiva e integralmente (em todas as searas jurídicas) por todo o conteúdo por si informado no item CADASTRO, mantendo atualizado o endereço para entrega dos produtos encomendados. 
3.3 O EMPREENDEDOR INDEPENDENTE se obriga, também, a pagar integralmente o preço da adesão, mensalidade e percentual de cada cliente para utilização dos serviços disponibilizados pela ACHEIDETUDO.COM.BR, de acordo com os valores estipulados no Anexo I, tendo ciência que o não pagamento acarretará a suspensão imediata dos serviços ao EMPREENDEDOR INDEPENDENTE e a vinculação imediata da EMPRESA ao site, sendo que todos os pagamentos referentes àquela EMPRESA serão repassados diretamente e integral ao ACHEIDETUDO.COM.BR, sem direito a qualquer ressarcimento para o EMPREENDEDOR INDEPENDENTE, ainda que ele coloque seus pagamentos em dia. Ocorrendo a quitação dos débitos do EMPREENDEDOR INDEPENDENTE com o ACHEIDETUDO.COM.BR, os pagamentos voltam a partir daquele momento para o EMPREENDEDOR INDEPENDENTE e a mesma volta a fazer os pagamentos proporcionais ao ACHEIDETUDO.COM.BR. A EMPRESA também se obriga a pagar integralmente sua mensalidade ao EMPREENDEDOR INDEPENDENTE, sendo que o não pagamento não o isenta do contrato ora firmado e muito menos dos pagamentos ora acordados. Em caso de não pagamento o serviço será interrompido até que seja efetuado o pagamento devido e serão tomadas as medidas cabíveis. 
3.4 Anualmente tanto EMPREENDEDOR INDEPENDENTE, EMPRESA, quanto ACHEIDETUDO.COM.BR deverão realizar a renovação do contrato desde que haja interesse mútuo. Em caso de não renovação o ACHEIDETUDO.COM.BR poderá celebrar novo vínculo com qualquer outro EMPREENDEDOR INDEPENDENTE que julgar interessante. E o EMPREENDEDOR INDEPENDENTE que anteriormente era parceiro não poderá exercer atividade similar pelo prazo de cinco anos.
3.5 Todas as tratativas, negociações, contratos, know-how, manuais, notificações, treinamentos, certidões, documentos contábeis ou qualquer informação a respeito da atividade desenvolvida são estritamente confidenciais, não podendo ser divulgadas por qualquer meio, mídia ou sob qualquer justificativa, com exceção das previstas na lei, sob pena de aplicação de multa contratual. Serão consideradas informações confidenciais todas aquelas que assim forem identificadas pelo ACHEIDETUDO.COM.BR, através de legendas ou quaisquer outras marcações, ou que, devido às circunstancias da revelação ou à própria natureza da informação, sejam consideradas confidenciais. Desde a sua concepção o presente contrato se torna também, informação confidencial, bem como possíveis anexos, e, por isso, a sua existência não poderá ser revelada a terceiros, senão mediante autorização expressa do ACHEIDETUDO.COM.BR. Em caso de violação do dever de confidencialidade, será aplicada ao violador multa sem prejuízo de indenização por perdas e danos.
</div>
<br /><br />
<div style="color:brown; font-size:12px;" align="left">
<strong>
4. OBRIGAÇÕES DO ACHEIDETUDO.COM.BR 
</strong></div>
<div style="color:black; font-size:12px;" align="justify">
4.1 Disponibilizar o espaço virtual que permita a EMPRESA devidamente cadastrada efetivar propagandas, promoções, anúncios, informações ao USUÁRIO dos meios de pagamento que possui dos produtos. 
4.2 Proteger, por meio de armazenamento em servidores ou quaisquer outros meios magnéticos de alta segurança, a confidencialidade de todas as informações e cadastros relativos aos USUÁRIOS e as EMPRESAS, assim como valores atinentes às operações financeiras advindas da operacionalização dos serviços previstos no presente TERMO. Contudo, não responderá pela reparação de prejuízos que possam ser derivados de apreensão e cooptação de dados por parte de terceiros que, rompendo os sistemas de segurança, consigam acessar essas informações. O ACHEIDETUDO.COM.BR não tem qualquer responsabilidade pelas transações e negociações efetuadas.
</div>
<br /><br />
<div style="color:brown; font-size:12px;" align="left">
<strong>
5. MODIFICAÇÕES E ACEITAÇÃO DESTE TERMO
</strong></div>
<div style="color:black; font-size:12px;" align="justify">
5.1 O presente TERMO DE USO poderá, a qualquer tempo, ter seu conteúdo, ou parte dele, modificados para adequações e inserções, tudo com vistas ao aprimoramento dos serviços disponibilizados. As novas condições entrarão em vigência assim que veiculada no site, sendo possível ao LOJISTA, USUÁRIO e as EMPRESAS manifestar oposição a quaisquer dos termos modificados, desde que o faça por escrito, através do contato de email, sendo que o ACHEIDETUDO.COM.BR é soberana em suas decisões visando o pleno desenvolvimento do negócio.  Tanto o EMPREENDEDOR INDEPENDENTE, quanto a EMPRESA e o USUÁRIO declaram ter lido, entendido e que aceitam todas as regras, condições e obrigações estabelecidas no presente TERMO.
</div>
<br /><br />
<div style="color:brown; font-size:12px;" align="left">
<strong>
6. DURAÇÃO, VALORES E RESCISÃO
</strong></div>
<div style="color:black; font-size:12px;" align="justify">
6.1 O presente contrato entre EMPREENDEDOR INDEPENDENTE e EMPRESA tem duração de ____ meses,a contar da data de assinatura deste. Os valores ajustados se referem ao pacote _____________ e em caso de rescisão será cobrado multa proporcional ao valor/tempo restante do contrato.
</div>
<br /><br />
<div style="color:brown; font-size:12px;" align="left">
<strong>
FORO DE ELEIÇÃO
</strong></div>
<div style="color:black; font-size:12px;" align="justify">
6.1 As partes elegem como competente para dirimir eventuais controvérsias que venham a surgir da interpretação e do cumprimento do presente TERMO o foro da Comarca do Conselheiro Lafaiete - MG. 
</div>
<br /><br />
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding-left:5px;
}
</style>
<table style="width: 100%; color:black; font-size:11px; border: 1px solid;">
  <tr>
    <th colspan="5">FICHA DE CADASTRO DA EMPRESA</th>
  </tr>
  <tr>
    <td colspan="3"><strong>RAZÃO SOCIAL:</strong><br /> '.$cliente->name_company.'</td>
    <td colspan="2"><strong>CNPJ:</strong><br /> '.$cliente->documento.'</td>
  </strong>
  <tr>
    <td colspan="3"><strong>FANTASIA:</strong></td>
    <td colspan="2"><strong>DATA DE ABERTURA:</strong><br /> '.$cliente->data.'</td>
  </tr>
  <tr>
    <td colspan="3"><strong>ENDEREÇO:</strong><br /> '.$cliente->address.'</td>
    <td colspan="2"><strong>BAIRRO:</strong><br /> '.$cliente->district.'</td>
  </tr>
  <tr>
    <td><strong>CIDADE:</strong><br /> '.$cliente->city.'</td>
    <td><strong>UF:</strong><br /> '.$cliente->state.'</td>
    <td><strong>CEP:</strong><br /> '.$cliente->zip_code.'</td>
    <td><strong>TEL:</strong><br /> '.$cliente->phone.'</td>
    <td><strong>CEL:</strong><br /> '.$cliente->phone2.'</td>
  </tr>
  <tr>
    <td colspan="5"><strong>EMAIL:</strong><br /> '.$cliente->email.'</td>
  </tr>
  <tr>
    <td colspan="4"><strong>ATIVIDADE ECONOMICA:</strong><br /></td>
    <td><strong>QNT FUNCIONARIOS:</strong><br /></td>
  </tr>
  <tr>
    <td colspan="4"><strong>Setor:</strong><br /> ( ) Agronegócios ( ) Indústria ( ) Comércio ( ) Serviço</td>
    <td><strong>Porte:</strong><br /> ( ) Micro ( ) Pequeno ( ) Médio ( ) Grande</td>
  </tr>
  <tr>
    <td colspan="5">
   <strong> Tipo Empreendimento:</strong><br />
    ( ) Associação ou Sindicato
    ( ) Cooperativa
    ( ) Empresário individual
    ( ) Outras
    <br />
    ( ) Ambulante 
    ( ) Artesão 
    ( ) Autônomo
    ( ) Produtor rural
    </td>
  </tr>
  <tr>
    <th colspan="5"><strong>CONTATO</strong><br /></th>
  </tr>
  <tr>
    <td colspan="3"><strong>NOME COMPLETO:</strong><br /> '.$cliente->responsible.'
    </td>
    <td colspan="2"><strong>CPF:</strong> <br /></td>
  </tr>
  <tr>
  <td colspan="2"><strong>CARGO:</strong><br /></td>
  <td><strong>ESCOLARIDADE:</strong> </td>
  <td><strong>SEXO:</strong><br /> ( ) FEMININO  ( ) MASCULINO</td>
  <td><strong>DATA NASCIMENTO:</strong><br /></td>
</tr>
  <tr>
    <td colspan="3"><strong>ENDEREÇO:</strong><<br />/td>
    <td colspan="2"><strong>BAIRRO:</strong><br /></td>
  </tr>
  <tr>
    <td><strong>CIDADE:</strong><br /></td>
    <td><strong>UF:</strong><br /></td>
    <td><strong>CEP:</strong><br /></td>
    <td><strong>TEL:</strong><br /></td>
    <td><strong>CEL:</strong><br /></td>
  </tr>
  <tr>
    <td colspan="5"><strong>EMAIL:</strong><br /></td>
  </tr>
  <tr>
    <td colspan="5">
    <strong>DESEJA RECEBER INFORMAÇÃO DA ONE KING:</strong><br />   ( ) NENHUMA  ( ) E-MAIL  ( ) MALA DIRETA
    </td>
  </tr>
</table>

';


        $mpdf->WriteHTML($html);
        $mpdf->Output('contrato-'.$cliente->name_company.'.pdf',\Mpdf\Output\Destination::DOWNLOAD);
        // $mpdf->Output();
    }

    public function gerarFicha(){
        if (!is_user_logged_in()) {
            redirect("login");
        }
        $idUser = $this->session->userdata("bs_user_id");
        $idAnunciante = $this->uri->segment(3);
        $paciente = $this->clienteModel->getClientCompleteData($idAnunciante);
        // print_r('userid: ');
        // print_r($idUser);
        // print_r('pacienteid: ');
        // print_r($idAnunciante);
        // print_r('pacientedata: ');
        // print_r($paciente);
        $mpdf = new \Mpdf\Mpdf();
        $html ='
        
        <div text-align: center;><img style="max-width:500px;height:400px;margin-left:10%;" src="'.$paciente->foto.'" alt=""></div>
        <div style="margin-top: 5%; margin-left:10%;">
        <div><h3 style="margin-bottom: 30px;">'.$paciente->name_paciente.'</h3></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Email: '.$paciente->Email.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Data sirurgia: '.$paciente->dataCirurgia.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Nome Mãe: '.$paciente->name_mae.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Cpf: '.$paciente->cpf.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">RG: '.$paciente->doc_identidade.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Orgão expedidor: '.$paciente->orgao_expedidor.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Cartão Sus: '.$paciente->cartao_sus.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Estado Civil: '.$paciente->estado_civil.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Data De Nacimento: '.$paciente->Data_nascimento.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Sexo: '.$paciente->Sexo.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Telefone Fixo: '.$paciente->Telefone_fixo.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Celular: '.$paciente->Celular.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Nome Responsavel: '.$paciente->name_responsavel.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Gral de Parentesco: '.$paciente->grau_parentesco.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Telefone Responsavel: '.$paciente->Telefone_responsavel.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Nome do Medico: '.$paciente->name_medicos.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px;">Convenio: '.$paciente->Convenio.'</h5></div>
        <div><h5 style="margin: 0px 0px 10px 0px; width:250px;">Observação: '.$paciente->Observacao.'</h5></div>
        </div>
        <div style="position: absolute;top: 472px;left: 60%;">
        <div><h3 style="margin-bottom: 800px; position: relative;">Endereço</h3></div>
        <div><h5 style="position: relative; margin-top:28px;">Cep: '.$paciente->zip_code.'</h5></div>
        <div><h5 style="margin-top:10px; position: relative;">Rua: '.$paciente->address.'</h5></div>
        <div><h5 style="margin-top:10px; position: relative;">Bairro: '.$paciente->district.'</h5></div>
        <div><h5 style="margin-top:10px; position: relative;">Numero: '.$paciente->number.'</h5></div>
        <div><h5 style="margin-top:10px; position: relative;">Cidade: '.$paciente->city.'</h5></div>
        <div><h5 style="margin-top:10px; position: relative;">Estado: '.$paciente->state.'</h5></div>
        <div><h5 style="margin-top:10px; position: relative; max-width:300px; ">Complemento:'.$paciente->complement.'</h5></div>
        </div>
        
        ';
        $mpdf->WriteHTML($html);
        $mpdf->Output('contrato-.pdf',\Mpdf\Output\Destination::DOWNLOAD);
    }

}