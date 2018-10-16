        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- LEFT MENU -->
            <?php $this->load->view("template/left_menu_view", null) ?>
            


            <!-- PAGE CONTENT -->
            <div class="page-content">
                
            <?php $this->load->view("template/header_menu_view", null) ?>                       

                <!-- PAGE TITLE -->                    
                <div class="page-title">                    
                    <h2><span class="fa fa-user"></span> Editar Paciente</h2>
                </div>
                <!-- END PAGE TITLE -->
                <?php 
                $msg = $this->session->flashdata('msg');
                if ($msg){
                ?>
                
                    <div class="col-md-12">
                        <div class="<?php if($msg['tipo']==1){ echo "alert alert-success";}elseif($msg['tipo']==2){echo "alert alert-danger";}?>" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <?=$msg['texto']?>.
                        </div>
                    </div>
                
                <?php } ?>
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">      
                        <div class="col-md-12">
                            <form id="editFormCliente"   enctype="multipart/form-data" method="post" class="form-horizontal" role="form">       
                                <div class="panel panel-default">
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
                                                <input type="text" name="dataCirurgia" id="dataCirurgia" class="form-control" value="<?=$cliente->dataCirurgia?>">
                                            </div>
                                        </div>
                                        <h3> identificação do paciente  </h3>
                                        
                                        
                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Nome da paciente <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="name_paciente" id="name_paciente" class="form-control" value="<?=$cliente->name_paciente?>">
                                                </div>
                                            </div>
                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Nome da mãe <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="name_mae" id="name_mae" class="form-control" value="<?=$cliente->name_mae?>">
                                                </div>
                                            </div>
                                        <div class="form-group">
                                        <label class="col-md-2 control-label">CPF <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="cpf" id="cpf" class="form-control" value="<?=$cliente->cpf?>">
                                                </div>
                                            </div>
                                        <div class="form-group">
                                        <label class="col-md-2 control-label">doc. identidade <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="doc_identidade" id="doc_identidade" class="form-control" value="<?=$cliente->doc_identidade?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Órgão Expedidor <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="orgao_expedidor" id="orgao_expedidor" class="form-control" value="<?=$cliente->orgao_expedidor?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Nº Cartão do SUS <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="cartao_sus" id="cartao_sus" class="form-control" value="<?=$cliente->cartao_sus?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Estado Civil <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="estado_civil" id="estado_civil" class="form-control" value="<?=$cliente->estado_civil?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Data Nascimento <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Data_nascimento" id="Data_nascimento" class="form-control" value="<?=$cliente->Data_nascimento?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Sexo <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Sexo" id="Sexo" class="form-control" value="<?=$cliente->Sexo?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Endereço <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Endereco" id="Endereco" class="form-control" value="<?=$cliente->address?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Bairro <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Bairro" id="Bairro" class="form-control" value="<?=$cliente->district?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Cidade <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Cidade" id="Cidade" class="form-control" value="<?=$cliente->city?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Estado <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Estado" id="Estado" class="form-control" value="<?=$cliente->state?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Telefone fixo <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Telefone_fixo" id="Telefone_fixo" class="form-control" value="<?=$cliente->Telefone_fixo?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Email <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Email" id="Email" class="form-control" value="<?=$cliente->Email?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Celular <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Celular" id="Celular" class="form-control" value="<?=$cliente->Celular?>">
                                                </div>
                                            </div>
                                            
                                            <h3> Identificação do Responsável  </h3>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">nome <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="name_responsavel" id="name_responsavel" class="form-control" value="<?=$cliente->name_responsavel?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <label class="col-md-2 control-label">Grau de Parentesco <span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="grau_parentesco" id="grau_parentesco" class="form-control" value="<?=$cliente->grau_parentesco?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Telefone <span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="Telefone_responsavel" id="Telefone_responsavel" class="form-control" value="<?=$cliente->Telefone_responsavel?>">
                                                        </div>
                                                    </div>
                                                    <h3>Situação do Paciente</h3>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Paciente com CA <span class="required">*</span></label>
                                                                <div class="col-md-10">
                                                                    <input type="text" name="CA_paciente" id="CA_paciente" class="form-control" value="<?=$cliente->CA_paciente?>">
                                                                </div>
                                                            </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Nome do(s) Médico(s)  <span class="required">*</span></label>
                                                                <div class="col-md-10">
                                                                    <input type="text" name="name_medicos" id="name_medicos" class="form-control" value="<?=$cliente->name_medicos?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Convênio <span class="required">*</span></label>
                                                                <div class="col-md-10">
                                                                    <input type="text" name="Convenio" id="Convenio" class="form-control" value="<?=$cliente->Convenio?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                        <label class="col-md-2 control-label">Observação <span class="required">*</span></label>
                                                                <div class="col-md-10">
                                                                    <input type="text" name="Observacao" id="Observacao" class="form-control" value="<?=$cliente->Observacao?>">
                                                                </div>
                                                            </div>

                                             
                                        </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-default">Limpar</button>                                    
                                        <button class="btn btn-primary pull-right" id="edit_cliente">Salvar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                     </div>

                     

                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- FOOTER -->



