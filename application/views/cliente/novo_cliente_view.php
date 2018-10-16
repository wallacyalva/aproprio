        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- LEFT MENU -->
            <?php $this->load->view("template/left_menu_view", null) ?>
            


            <!-- PAGE CONTENT -->
            <div class="page-content">
                
            <?php $this->load->view("template/header_menu_view", null) ?>                       

                <!-- PAGE TITLE -->                    
                <div class="page-title">                    
                    <h2><span class="fa fa-user"></span> Novo Paciente</h2>
                </div>
                <!-- END PAGE TITLE -->
                <?php 
                if (isset($tipo)){
                ?>
                <!-- <?= print_r($tipo)?> -->
                    <div class="col-md-12">
                        <div class="<?php if($tipo == 1){ echo "alert alert-success";}elseif($tipo == 2){echo "alert alert-danger";}?>" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <?=$texto?>.
                        </div>
                    </div>
                
                <?php } ?>
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">      
                        <div class="col-md-12">
                            <form  action="<?=ci_site_url();?>cliente/new_cliente" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">       
                                <div class="panel panel-default" style="height: 100%;">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><strong>Cadastro</strong></h3>
                <!-- <img style="width: 100px; padding-bottom: 50px;" src="assets/images/logo.png" alt=""> -->
                                        <ul class="panel-controls">
                                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                        </ul>
                                    </div>
                                        
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Data da cirurgia<span class="required">*</span></label>
                                            <div class="col-md-10">
                                                <input type="text" name="dataCirurgia" id="dataCirurgia" class="form-control" placeholder="Ano-Mes-Dia"value="">
                                            </div>
                                        </div>
                                        <h3> identificação do paciente  </h3>
                                        
                                        
                                        <div class="form-group">
                                        <label class="col-md-2 control-label">foto da paciente <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <div id="camera"></div>
                                                    <div id="fotoapend" >
                                                    <input id="ativaCamera" type=button value="ativar camera" onClick="ativarCamera()" class="activebut" style="margin-top: 15px; margin-bottom: 15px;">
                                                    <div id="tirarFoto"></div>
                                                    <div id="upload_results" style="background-color:#eee;"></div>
                                                    </div>                    
                                                    <!-- <input type="text" name="name_paciente" id="name_paciente" class="form-control" placeholder="Nome" value=""> -->
                                                </div>
                                            </div>
                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Nome da paciente <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="name_paciente" id="name_paciente" class="form-control" placeholder="Nome" value="">
                                                </div>
                                            </div>
                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Nome da mãe <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="name_mae" id="name_mae" class="form-control" placeholder="Nome da mãe" value="">
                                                </div>
                                            </div>
                                        <div class="form-group">
                                        <label class="col-md-2 control-label">CPF <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="cpf" id="cpf" class="form-control" placeholder="XXXXXXXXXX" value="">
                                                </div>
                                            </div>
                                        <div class="form-group">
                                        <label class="col-md-2 control-label">doc. identidade <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="doc_identidade" id="doc_identidade" class="form-control" placeholder="09.081.986-0" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Órgão Expedidor <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="orgao_expedidor" id="orgao_expedidor" class="form-control" placeholder="SP" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Nº Cartão do SUS <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="cartao_sus" id="cartao_sus" class="form-control"  placeholder="XXX XXXX XXXX XXXX" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Estado Civil <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="estado_civil" id="estado_civil" class="form-control" placeholder="Solteiro" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Data Nascimento <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Data_nascimento" id="Data_nascimento" class="form-control" placeholder="Ano-Mes-Dia" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Sexo <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Sexo" id="Sexo" class="form-control" placeholder="Femin" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Endereço <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Endereco" id="Endereco" class="form-control" placeholder="Rua N° " value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Bairro <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Bairro" id="Bairro" class="form-control"  placeholder="Bairro" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Cidade <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Cidade" id="Cidade" class="form-control"  placeholder="Belo Horizonte" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Estado <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Estado" id="Estado" class="form-control"  placeholder="MG" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Telefone fixo <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Telefone_fixo" id="Telefone_fixo" class="form-control"  placeholder="(41)38312143" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Email <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Email" id="Email" class="form-control" placeholder="Exemplo@Exemplo.com" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Celular <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Celular" id="Celular" class="form-control"  placeholder="(41)997576214" value="">
                                                </div>
                                            </div>
                                            
                                            <h3> Identificação do Responsável  </h3>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">nome <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="name_responsavel" id="name_responsavel" class="form-control" placeholder="Carlos dos Santo..." value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Grau de Parentesco <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="grau_parentesco" id="grau_parentesco" class="form-control" placeholder="Pai" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Telefone <span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="Telefone_responsavel" id="Telefone_responsavel" class="form-control" placeholder="(41)997576214" value="">
                                                        </div>
                                                    </div>
                                                    <h3>Situação do Paciente</h3>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Paciente com CA <span class="required">*</span></label>
                                                                <div class="col-md-10">
                                                                    <input type="text" name="CA_paciente" id="CA_paciente" class="form-control" value="">
                                                                </div>
                                                            </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Nome do(s) Médico(s)  <span class="required">*</span></label>
                                                                <div class="col-md-10">
                                                                    <input type="text" name="name_medicos" id="name_medicos" class="form-control" placeholder="Luis... e Carla... " value="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Telefone <span class="required">*</span></label>
                                                                <div class="col-md-10">
                                                                    <input type="text" name="Telefone_responsavel" id="Telefone_responsavel" class="form-control" placeholder="(41)997576214" value="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Convênio <span class="required">*</span></label>
                                                                <div class="col-md-10">
                                                                    <input type="text" name="Convenio" id="Convenio" class="form-control" placeholder="Unimed" value="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                        <label class="col-md-2 control-label">Observação <span class="required">*</span></label>
                                                                <div class="col-md-10">
                                                                    <input type="text" name="Observacao" id="Observacao" class="form-control" placeholder="tenho alergia a ... tenho cancer a ..." value="">
                                                                </div>
                                                            </div>

                                             
                                        </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-default">Limpar</button>                                    
                                        <button class="btn btn-primary pull-right">Salvar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                     </div>

                     

                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        <script type="text/javascript" src="../assets/js/webcam.js"></script>
        <script language="JavaScript">
            

            webcam.set_swf_url( '../assets/js/webcam.swf' );
            webcam.set_quality( 90 ); // JPEG quality (1 - 100)
            webcam.set_shutter_sound( false ); // play shutter click sound
            webcam.set_hook( 'onComplete', 'my_completion_handler' );
            
            function ativarCamera(){
                document.getElementById('tirarFoto').innerHTML = "<input id='tirarFoto' type=button value='tirar foto' style='margin-top: 15px; margin-bottom: 15px;' class='fotobut' onClick='take_snapshot()'>";
                document.getElementById('camera').innerHTML = webcam.get_html(320, 240);
            }

            function take_snapshot(){
                // take snapshot and upload to server
                webcam.set_api_url( '../cliente/uploadImageCam' );
                document.getElementById('upload_results').innerHTML = '<h1>Uploading...</h1>';
                webcam.snap();
            }
            
            function my_completion_handler(msg) {
                // extract URL out of PHP output
                if (msg.match(/(http\:\/\/\S+)/)) {
                    // show JPEG image in page
                    
                    document.getElementById('fotoapend').innerHTML = '<img src="'+msg+'"><input type="hide" name="foto"  value="'+msg+'">';
                    console.log(msg);
                    // reset camera for another shot
                    webcam.reset();
                    document.getElementById('camera').classList.add("hide");;
                   
                }
                else {alert("PHP Error: " + msg)};
                }
            </script>

        </div>
        <!-- END PAGE CONTAINER -->
        <!-- FOOTER -->



