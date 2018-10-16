        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- LEFT MENU -->
            <?php $this->load->view("template/left_menu_view", null)?>
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
            <?php $this->load->view("template/header_menu_view", null) ?>                       

                <!-- PAGE TITLE -->                    
                <div class="page-title">                    
                    <h2><span class="fa fa-cog"></span> Configurações</h2>
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
                            <form id="editPasswordMyUser" action="<?=ci_site_url();?>usuario/change_password" method="post" class="form-horizontal" role="form">       
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><strong>Alterar Senha</strong></h3>
                                        <ul class="panel-controls">
                                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nova Senha</label>
                                            <div class="col-md-10">
                                                <input type="password" name="new_password" id="new_password" class="form-control">
                                            </div>
                                        </div>                                  
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Confirmar Senha</label>
                                            <div class="col-md-10">
                                                <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control">
                                            </div>
                                        </div>                                  
                                    </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-default">Limpar</button>                                    
                                        <button class="btn btn-primary pull-right">Alterar</button>
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

        <!-- MODALS -->
        <!-- MODAL CHANGE PHOTO -->
   <!-- MODALS -->
   <div class="modal animated fadeIn" id="modal_change_photo" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                        <h4 class="modal-title" id="smallModalHead">Trocar Foto</h4>
                    </div>                    
                    <form id="cp_crop" method="post" action="<?=ci_site_url("usuario/cropPhoto")?>">
                    <div class="modal-body">
                        <div class="text-center" id="cp_target">Use form below to upload file. Only .jpg files.</div>
                        <input type="hidden" name="cp_img_path" id="cp_img_path"/>
                        <input type="hidden" name="ic_x" id="ic_x"/>
                        <input type="hidden" name="ic_y" id="ic_y"/>
                        <input type="hidden" name="ic_w" id="ic_w"/>
                        <input type="hidden" name="ic_h" id="ic_h"/>                        
                    </div>                    
                    </form>
                    <form id="cp_upload" method="post" enctype="multipart/form-data" action="<?=ci_site_url("usuario/changePhoto")?>">
                    <div class="modal-body form-horizontal form-group-separated">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nova Foto</label>
                            <div class="col-md-4">
                                <input type="file" class="fileinput btn-info" name="file" id="cp_photo" data-filename-placement="inside" title="Escolher"/>
                            </div>                            
                        </div>                        
                    </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success disabled" id="cp_accept">Salvar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL CHANGE PHOTO -->
        <!-- FOOTER -->



